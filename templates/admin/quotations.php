<?php
$pageTitle = 'Quotations';
$activeNav = 'quotations';
require TEMPLATES . '/partials/dashboard-top.php';
?>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Qt No.</th>
                        <th>Project ID</th>
                        <th>Service</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($projects as $p): ?>
                    <tr style="cursor:pointer;"
                        data-quotation="<?= h(json_encode($p)) ?>">
                        <td class="fw-medium"><?= h($p['quotationId']) ?></td>
                        <td class="text-muted small"><?= h($p['id']) ?></td>
                        <td><?= h($p['serviceType']) ?></td>
                        <td><?= peso($p['quotation']['total']) ?></td>
                        <td><?= statusBadge($p['status']) ?></td>
                        <td class="text-end">
                            <button class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-eye me-1"></i>View
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Quotation Detail Modal -->
<div class="modal fade" id="quotationModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Quotation <span id="qt-id"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row g-2 mb-3 small">
                    <div class="col-4 text-muted">Project ID</div>  <div class="col-8" id="qt-project"></div>
                    <div class="col-4 text-muted">Client</div>      <div class="col-8" id="qt-client"></div>
                    <div class="col-4 text-muted">Service</div>     <div class="col-8" id="qt-service"></div>
                </div>

                <!-- Materials list -->
                <div id="qt-materials-wrapper" class="mb-3">
                    <h6 class="fw-semibold small mb-2">Materials</h6>
                    <ul class="list-group list-group-flush" id="qt-materials-list"></ul>
                </div>

                <div class="border-top pt-3">
                    <div class="d-flex justify-content-between small mb-1">
                        <span class="text-muted">Materials Cost</span>
                        <span id="qt-materials-cost"></span>
                    </div>
                    <div class="d-flex justify-content-between small mb-2">
                        <span class="text-muted">Labor Cost</span>
                        <span id="qt-labor"></span>
                    </div>
                    <div class="d-flex justify-content-between fw-bold border-top pt-2">
                        <span>Total</span>
                        <span id="qt-total"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm">Approve &amp; Send</button>
                <button class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php require TEMPLATES . '/partials/dashboard-bottom.php'; ?>
