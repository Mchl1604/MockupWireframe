<?php $pageTitle = 'Request Service'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>

<main class="container py-4 my-auto">
    <?php if (!empty($_GET['submitted'])): ?>
        <div class="alert alert-success"><i class="bi bi-check-circle me-2"></i>Service request submitted successfully.</div>
    <?php endif; ?>

    <h2 class="h4 fw-bold mb-3">Request Service</h2>

    <div class="row g-3 mb-3">
        <div class="col-md-4"><div class="card service-card border h-100" data-service-id="ac-install"><div class="card-body"><h6 class="mb-1">AC Installation</h6><p class="small text-muted mb-0">Split-type and commercial units.</p></div></div></div>
        <div class="col-md-4"><div class="card service-card border h-100" data-service-id="ac-repair"><div class="card-body"><h6 class="mb-1">AC Repair</h6><p class="small text-muted mb-0">Diagnosis and repair service.</p></div></div></div>
        <div class="col-md-4"><div class="card service-card border h-100" data-service-id="ducting"><div class="card-body"><h6 class="mb-1">Ducting Systems</h6><p class="small text-muted mb-0">Fabrication and installation.</p></div></div></div>
    </div>

    <div id="requestForm" style="display:none;">
        <form method="POST" action="<?php echo htmlspecialchars($baseUrl . '/client/request', ENT_QUOTES, 'UTF-8'); ?>" class="card border-0 shadow-sm needs-validation" novalidate>
            <div class="card-body">
                <input type="hidden" name="action" value="request_service">
                <input type="hidden" id="selectedService" name="service" value="">
                <div class="row g-3">
                    <div class="col-md-6"><label class="form-label">Project Name</label><input required type="text" name="project" class="form-control" placeholder="Makati Office HVAC"></div>
                    <div class="col-md-6"><label class="form-label">Preferred Date</label><input required type="date" name="date" class="form-control"></div>
                    <div class="col-12"><label class="form-label">Address</label><input required type="text" name="address" class="form-control" placeholder="123 Main Street, Makati"></div>
                    <div class="col-12"><label class="form-label">Notes</label><textarea class="form-control" rows="3" name="notes" placeholder="Describe your requirements"></textarea></div>
                </div>
            </div>
            <div class="card-footer bg-white d-flex justify-content-end"><button class="btn btn-primary" type="submit">Submit Request</button></div>
        </form>
    </div>

    <div class="card border-0 shadow-sm mt-3" id="materialsSection" style="display:none;">
        <div class="card-header bg-white"><strong>Suggested Materials</strong></div>
        <div class="table-responsive">
            <table class="table mb-0">
                <thead><tr><th>Material</th><th>Qty</th><th>Unit</th></tr></thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
