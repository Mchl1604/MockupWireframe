<?php
$pageTitle = 'Technicians';
$activeNav = 'technicians';
require TEMPLATES . '/partials/dashboard-top.php';
?>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Skills</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($technicians as $t): ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar-sm"><?= h($t['avatar']) ?></div>
                                <span class="fw-medium"><?= h($t['name']) ?></span>
                            </div>
                        </td>
                        <td class="text-muted small"><?= h($t['skill']) ?></td>
                        <td><?= statusBadge($t['status']) ?></td>
                        <td class="text-end">
                            <div class="d-flex gap-1 justify-content-end">
                                <button class="btn btn-outline-secondary btn-sm" title="Schedule">
                                    <i class="bi bi-calendar-week"></i>
                                </button>
                                <button class="btn btn-outline-secondary btn-sm" title="View">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-outline-secondary btn-sm" title="Edit">
                                    <i class="bi bi-pencil"></i>
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

<?php require TEMPLATES . '/partials/dashboard-bottom.php'; ?>
