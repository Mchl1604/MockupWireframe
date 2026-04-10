<?php
$pageTitle = 'User Management';
$activeNav = 'users';
require TEMPLATES . '/partials/dashboard-top.php';
?>

<div class="d-flex justify-content-end mb-3">
    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addUserModal">
        <i class="bi bi-plus-lg me-1"></i>Add User
    </button>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $u): ?>
                    <tr>
                        <td class="fw-medium"><?= h($u['name']) ?></td>
                        <td class="text-muted small"><?= h($u['email']) ?></td>
                        <td><?= statusBadge($u['role']) ?></td>
                        <td><?= statusBadge($u['status']) ?></td>
                        <td class="text-muted small"><?= h($u['createdAt']) ?></td>
                        <td class="text-end">
                            <button class="btn btn-outline-secondary btn-sm" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Full Name</label>
                        <input type="text" class="form-control" required placeholder="Full name">
                        <div class="invalid-feedback">Required.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Email</label>
                        <input type="email" class="form-control" required placeholder="user@email.com">
                        <div class="invalid-feedback">Valid email required.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Role</label>
                        <select class="form-select" required>
                            <option value="">Select role…</option>
                            <option>Client</option>
                            <option>Technician</option>
                            <option>Admin</option>
                        </select>
                        <div class="invalid-feedback">Required.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Password</label>
                        <input type="password" class="form-control" required minlength="8" placeholder="••••••••">
                        <div class="invalid-feedback">Min 8 characters.</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm">Create User</button>
                <button class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<?php require TEMPLATES . '/partials/dashboard-bottom.php'; ?>
