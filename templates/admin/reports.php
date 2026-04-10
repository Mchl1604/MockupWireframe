<?php
$pageTitle = 'Reports';
$activeNav = 'reports';
require TEMPLATES . '/partials/dashboard-top.php';
?>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Date</th>
                        <th>Project</th>
                        <th>Project Lead</th>
                        <th>Type</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reports as $r): ?>
                    <tr>
                        <td class="small"><?= h($r['date']) ?></td>
                        <td class="fw-medium"><?= h($r['project']) ?></td>
                        <td><?= h($r['projectLead']) ?></td>
                        <td><?= statusBadge($r['type']) ?></td>
                        <td class="text-end">
                            <button class="btn btn-outline-secondary btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#reportModal<?= h($r['id']) ?>">
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

<!-- Report modals -->
<?php foreach ($reports as $r): ?>
<div class="modal fade" id="reportModal<?= h($r['id']) ?>" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= statusBadge($r['type']) ?> &nbsp; <?= h($r['project']) ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body small">
                <dl class="row mb-0">
                    <dt class="col-4 text-muted">Date</dt>         <dd class="col-8"><?= h($r['date']) ?></dd>
                    <dt class="col-4 text-muted">Project Lead</dt> <dd class="col-8"><?= h($r['projectLead']) ?></dd>
                    <dt class="col-4 text-muted">Description</dt>  <dd class="col-8"><?= h($r['description']) ?></dd>
                </dl>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?php require TEMPLATES . '/partials/dashboard-bottom.php'; ?>
