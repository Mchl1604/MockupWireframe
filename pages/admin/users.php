<?php $pageTitle = 'Users'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<?php
$users = [
    ['name' => 'Juan Dela Cruz', 'email' => 'juan@example.com', 'role' => 'Client'],
    ['name' => 'Admin One', 'email' => 'admin@coliconstruct.com', 'role' => 'Admin'],
    ['name' => 'Mario Santos', 'email' => 'mario@coliconstruct.com', 'role' => 'Technician'],
];
?>
<main class="container py-4 flex-grow-1">
    <div class="d-flex justify-content-between align-items-center mb-3"><h2 class="h4 fw-bold mb-0">Users</h2><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addUserModal">Add User</button></div>
    <div class="table-responsive card border-0 shadow-sm">
        <table class="table table-hover mb-0"><thead class="table-light"><tr><th>Name</th><th>Email</th><th>Role</th></tr></thead><tbody>
            <?php foreach ($users as $u): ?>
                <tr><td><?php echo htmlspecialchars($u['name'], ENT_QUOTES, 'UTF-8'); ?></td><td><?php echo htmlspecialchars($u['email'], ENT_QUOTES, 'UTF-8'); ?></td><td><span class="badge bg-secondary"><?php echo htmlspecialchars($u['role'], ENT_QUOTES, 'UTF-8'); ?></span></td></tr>
            <?php endforeach; ?>
        </tbody></table>
    </div>

    <div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Add User</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body"><form class="needs-validation" novalidate><div class="mb-3"><label class="form-label">Full Name</label><input class="form-control" required></div><div class="mb-3"><label class="form-label">Email</label><input class="form-control" type="email" required></div><div class="mb-3"><label class="form-label">Role</label><select class="form-select" required><option value="">Select role</option><option>Client</option><option>Admin</option><option>Technician</option></select></div><button class="btn btn-primary" type="submit">Save User</button></form></div></div></div></div>
</main>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
