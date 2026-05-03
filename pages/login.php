<?php $pageTitle = 'Login'; ?>
<?php include __DIR__ . '/../includes/head.php'; ?>
<body class="bg-light min-vh-100 d-flex flex-column">

<div class="container py-5 my-auto">
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
                    <div class="text-center mb-4">
                        <img src="<?php echo htmlspecialchars(($baseUrl !== '' ? $baseUrl : '') . '/assets/img/coliconstruct-logo.svg', ENT_QUOTES, 'UTF-8'); ?>" alt="Coliconstruct" class="auth-logo mb-3">
                        <h4 class="fw-bold mb-1">Welcome Back</h4>
                        <p class="text-muted small">Sign in to Coliconstruct Engineering Services</p>
                    </div>

                    <form method="POST" action="<?php echo htmlspecialchars(app_url('/login'), ENT_QUOTES, 'UTF-8'); ?>" class="needs-validation" novalidate>
                        <input type="hidden" name="action" value="login">

                        <div class="mb-3">
                            <label class="form-label fw-medium">Email</label>
                            <input type="email" class="form-control" name="email"
                                   placeholder="you@email.com" required>
                            <div class="invalid-feedback">Please enter a valid email.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-medium">Password</label>
                            <input type="password" class="form-control" name="password"
                                   placeholder="••••••••" required>
                            <div class="invalid-feedback">Please enter your password.</div>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-medium">Login as <span class="text-muted">(Demo)</span></label>
                            <div class="d-flex gap-2" id="roleButtons">
                                <?php foreach (['client', 'admin', 'technician'] as $r): ?>
                                <button type="button"
                                    class="btn btn-outline-primary btn-sm flex-fill text-capitalize role-btn <?php echo $r === 'client' ? 'active' : ''; ?>"
                                    data-role="<?php echo htmlspecialchars($r, ENT_QUOTES, 'UTF-8'); ?>">
                                    <?php echo htmlspecialchars($r, ENT_QUOTES, 'UTF-8'); ?>
                                </button>
                                <?php endforeach; ?>
                            </div>
                            <input type="hidden" name="role" id="roleInput" value="client">
                        </div>
                       
                        <button type="submit" class="btn btn-primary w-100">Sign In</button>
                    </form>

                    <p class="text-center text-muted small mt-3 mb-0">
                        Don't have an account?
                        <a href="<?php echo htmlspecialchars(app_url('/register'), ENT_QUOTES, 'UTF-8'); ?>" class="text-primary fw-medium text-decoration-none">Register here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

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


