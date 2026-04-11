<?php
$pageTitle = 'My Projects';
$activeNav = 'projects';
require TEMPLATES . '/partials/dashboard-top.php';
?>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Project Name</th>
                        <th>Service Type</th>
                        <th>Status</th>
                        <th>Timeline</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($projects as $p): ?>
                    <tr>
                        <td class="fw-medium"><?= h($p['name']) ?></td>
                        <td><?= h($p['serviceType']) ?></td>
                        <td><?= statusBadge($p['status']) ?></td>
                        <td class="text-muted small"><?= h($p['timeline']) ?></td>
                        <td class="text-end">
                            <a href="<?= h(url('/client/project?id=' . urlencode($p['id']))) ?>"
                               class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-eye me-1"></i>View
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require TEMPLATES . '/partials/dashboard-bottom.php'; ?>
