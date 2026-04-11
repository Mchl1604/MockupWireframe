<?php
$pageTitle = 'Request Service';
$activeNav = 'request';
require TEMPLATES . '/partials/dashboard-top.php';
?>

<?php if (!empty($_GET['submitted'])): ?>
<div class="text-center py-5">
    <i class="bi bi-check-circle-fill text-success" style="font-size:4rem;"></i>
    <h3 class="fw-bold mt-3 mb-2">Request Submitted!</h3>
    <p class="text-muted mb-4">We'll review your request and get back to you shortly.</p>
    <a href="<?= h(url('/client/request')) ?>" class="btn btn-primary">Submit Another Request</a>
</div>
<?php else: ?>

<p class="text-muted mb-4">Select a service and fill out the details below.</p>

<!-- Service cards -->
<div class="row g-3 mb-4">
    <?php foreach ($services as $svc): ?>
    <div class="col-sm-6 col-lg-4">
        <div class="card service-card h-100" data-service-id="<?= h($svc['id']) ?>">
            <div class="card-body p-3">
                <h6 class="fw-semibold mb-1"><?= h($svc['name']) ?></h6>
                <p class="text-muted small mb-0"><?= h($svc['description']) ?></p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<!-- Request form (hidden until a service is selected) -->
<div id="requestForm" style="display:none;">
    <div class="card">
        <div class="card-header bg-white fw-semibold">Service Request Details</div>
        <div class="card-body">
            <form method="POST" action="<?= h(url('/client/request')) ?>" class="needs-validation" novalidate>
                <?= csrfField() ?>
                <input type="hidden" name="action" value="request_service">
                <input type="hidden" name="service" id="selectedService" value="">

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <label class="form-label fw-medium">Full Name</label>
                        <input type="text" class="form-control" name="name"
                               value="<?= h(currentUser()['name'] ?? '') ?>" required>
                        <div class="invalid-feedback">Required.</div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label fw-medium">Phone Number</label>
                        <input type="tel" class="form-control" name="phone"
                               placeholder="09171234567" required>
                        <div class="invalid-feedback">Required.</div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-medium">Address</label>
                    <input type="text" class="form-control" name="address"
                           placeholder="123 Main St, Makati City" required>
                    <div class="invalid-feedback">Required.</div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-medium">Description</label>
                    <textarea class="form-control" name="description" rows="3"
                              placeholder="Describe your service needs..."></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-medium">Preferred Schedule</label>
                    <input type="date" class="form-control" name="schedule"
                           min="<?= date('Y-m-d') ?>">
                </div>

                <!-- Materials table (shown by JS for applicable services) -->
                <div id="materialsSection" style="display:none;" class="mb-3">
                    <label class="form-label fw-medium">Required Materials</label>
                    <table class="table table-sm table-bordered">
                        <thead class="table-light">
                            <tr><th>Material</th><th>Qty</th><th>Unit</th></tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

                <button type="submit" class="btn btn-primary">Submit Request</button>
            </form>
        </div>
    </div>
</div>

<?php endif; ?>

<?php require TEMPLATES . '/partials/dashboard-bottom.php'; ?>
