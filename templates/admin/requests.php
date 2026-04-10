<?php
$pageTitle = 'Service Requests';
$activeNav = 'requests';
require TEMPLATES . '/partials/dashboard-top.php';
?>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Service</th>
                        <th>Address</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($requests as $r): ?>
                    <tr>
                        <td class="text-muted small"><?= h($r['id']) ?></td>
                        <td class="fw-medium"><?= h($r['client']) ?></td>
                        <td><?= h($r['service']) ?></td>
                        <td class="text-muted small"><?= h($r['address']) ?></td>
                        <td class="small"><?= h($r['date']) ?></td>
                        <td><?= statusBadge($r['status']) ?></td>
                        <td class="text-end">
                            <div class="d-flex gap-1 justify-content-end">
                                <button class="btn btn-outline-secondary btn-sm"
                                        title="View"
                                        data-request="<?= h(json_encode($r)) ?>">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-outline-success btn-sm" title="Approve">
                                    <i class="bi bi-check-lg"></i>
                                </button>
                                <button class="btn btn-outline-danger btn-sm" title="Reject">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- View Request Modal -->
<div class="modal fade" id="requestModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Request Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <dl class="row small mb-0">
                    <dt class="col-4 text-muted">Request ID</dt>    <dd class="col-8" id="req-id"></dd>
                    <dt class="col-4 text-muted">Client</dt>        <dd class="col-8" id="req-client"></dd>
                    <dt class="col-4 text-muted">Service</dt>       <dd class="col-8" id="req-service"></dd>
                    <dt class="col-4 text-muted">Address</dt>       <dd class="col-8" id="req-address"></dd>
                    <dt class="col-4 text-muted">Date</dt>          <dd class="col-8" id="req-date"></dd>
                    <dt class="col-4 text-muted">Phone</dt>         <dd class="col-8" id="req-phone"></dd>
                    <dt class="col-4 text-muted">Description</dt>   <dd class="col-8" id="req-desc"></dd>
                </dl>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-sm">Approve</button>
                <button class="btn btn-danger btn-sm">Reject</button>
                <button class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php require TEMPLATES . '/partials/dashboard-bottom.php'; ?>
