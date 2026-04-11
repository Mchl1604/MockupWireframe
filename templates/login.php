<?php $pageTitle = 'Login'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require TEMPLATES . '/partials/head.php'; ?>
</head>
<body class="bg-light min-vh-100 d-flex align-items-center py-4">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-10 col-md-7 col-lg-5">

            <?php if (!empty($_GET['registered'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>Account created! Please sign in.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>

            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5">
                    <!-- Logo -->
                    <div class="text-center mb-4">
                        <div class="mx-auto mb-3 d-flex align-items-center justify-content-center rounded-3"
                             style="width:52px;height:52px;background:#2563eb;">
                            <i class="bi bi-wind text-white fs-3"></i>
                        </div>
                        <h4 class="fw-bold mb-1">Welcome Back</h4>
                        <p class="text-muted small">Sign in to Coliconstruct Engineering Services</p>
                    </div>

                    <!-- Form -->
                    <form method="POST" action="<?= h(url('/login')) ?>" class="needs-validation" novalidate>
                        <?= csrfField() ?>
                        <input type="hidden" name="action" value="login">

                        <div class="mb-3">
                            <label class="form-label fw-medium">Email</label>
                            <input type="email" class="form-control" name="email"
                                   placeholder="you@email.com" value="user@coliconstruct.com" required>
                            <div class="invalid-feedback">Please enter a valid email.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-medium">Password</label>
                            <input type="password" class="form-control" name="password"
                                   placeholder="••••••••" value="password" required>
                            <div class="invalid-feedback">Please enter your password.</div>
                        </div>

                        <!-- Demo role switcher -->
                        <div class="mb-4">
                            <label class="form-label fw-medium">Login as <span class="text-muted">(Demo)</span></label>
                            <div class="d-flex gap-2" id="roleButtons">
                                <?php foreach (['client', 'admin', 'technician'] as $r): ?>
                                <button type="button"
                                    class="btn btn-outline-primary btn-sm flex-fill text-capitalize role-btn <?= $r === 'client' ? 'active' : '' ?>"
                                    data-role="<?= h($r) ?>">
                                    <?= h($r) ?>
                                </button>
                                <?php endforeach; ?>
                            </div>
                            <input type="hidden" name="role" id="roleInput" value="client">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Sign In</button>
                    </form>

                    <p class="text-center text-muted small mt-3 mb-0">
                        Don't have an account?
                        <a href="<?= h(url('/register')) ?>" class="text-primary fw-medium text-decoration-none">Register here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require TEMPLATES . '/partials/footer.php'; ?>

<script>
document.querySelectorAll('.role-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
        document.querySelectorAll('.role-btn').forEach(b => b.classList.remove('active', 'btn-primary'));
        document.querySelectorAll('.role-btn').forEach(b => b.classList.add('btn-outline-primary'));
        btn.classList.add('active', 'btn-primary');
        btn.classList.remove('btn-outline-primary');
        document.getElementById('roleInput').value = btn.dataset.role;
    });
});
</script>
</body>
</html>
