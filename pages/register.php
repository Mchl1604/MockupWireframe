<?php $pageTitle = 'Register'; ?>
<?php include __DIR__ . '/../includes/head.php'; ?>
<body class="bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../includes/navbar.php'; ?>

<div class="container py-5 my-auto">
    <div class="row justify-content-center">
        <div class="col-sm-10 col-md-7 col-lg-5">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <img src="<?php echo htmlspecialchars(($baseUrl !== '' ? $baseUrl : '') . '/assets/img/coliconstruct-logo.svg', ENT_QUOTES, 'UTF-8'); ?>" alt="Coliconstruct" class="auth-logo mb-3">
                        <h4 class="fw-bold mb-1">Create Account</h4>
                        <p class="text-muted small">Register as a client to request HVAC services</p>
                    </div>

                    <form method="POST" action="<?php echo htmlspecialchars(app_url('/register'), ENT_QUOTES, 'UTF-8'); ?>" class="needs-validation" novalidate>
                        <input type="hidden" name="action" value="register">

                        <div class="mb-3">
                            <label class="form-label fw-medium">Full Name</label>
                            <input type="text" class="form-control" name="name"
                                   placeholder="Juan Dela Cruz" required>
                            <div class="invalid-feedback">Please enter your name.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-medium">Email</label>
                            <input type="email" class="form-control" name="email"
                                   placeholder="you@email.com" required>
                            <div class="invalid-feedback">Please enter a valid email.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-medium">Password</label>
                            <input type="password" class="form-control" name="password"
                                   placeholder="••••••••" required minlength="8">
                            <div class="invalid-feedback">Password must be at least 8 characters.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-medium">Contact Number</label>
                            <input type="tel" class="form-control" name="phone"
                                   placeholder="09171234567" required>
                            <div class="invalid-feedback">Please enter your contact number.</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-medium">Address</label>
                            <input type="text" class="form-control" name="address"
                                   placeholder="123 Main St, Makati City" required>
                            <div class="invalid-feedback">Please enter your address.</div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>

                    <p class="text-center text-muted small mt-3 mb-0">
                        Already have an account?
                        <a href="<?php echo htmlspecialchars(app_url('/login'), ENT_QUOTES, 'UTF-8'); ?>" class="text-primary fw-medium text-decoration-none">Sign in</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
