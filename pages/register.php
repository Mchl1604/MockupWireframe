<?php $pageTitle = 'Register'; ?>
<?php include __DIR__ . '/../includes/head.php'; ?>
<body class="bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../includes/navbar.php'; ?>

<div class="container py-3 py-md-4 my-auto">
    <div class="row justify-content-center">
        <div class="col-sm-11 col-md-10 col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-3 p-md-4">
                    <div class="text-center mb-3">
                        <img src="<?php echo htmlspecialchars(($baseUrl !== '' ? $baseUrl : '') . '/assets/img/coliconstruct-logo.svg', ENT_QUOTES, 'UTF-8'); ?>" alt="Coliconstruct" class="auth-logo mb-2">
                        <h4 class="fw-bold mb-1">Create Account</h4>
                        <p class="text-muted small">Register as a client to request HVAC services</p>
                    </div>

                    <form method="POST" action="<?php echo htmlspecialchars(app_url('/register'), ENT_QUOTES, 'UTF-8'); ?>" class="needs-validation" novalidate>
                        <input type="hidden" name="action" value="register">

                        <div class="mb-2">
                            <label class="form-label fw-medium d-block">Client Type</label>
                            <div class="d-flex flex-wrap gap-3">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="radio" name="client_type" id="clientTypeIndividual" value="individual" checked required>
                                    <label class="form-check-label" for="clientTypeIndividual">Individual Client</label>
                                </div>
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="radio" name="client_type" id="clientTypeCompany" value="company_representative" required>
                                    <label class="form-check-label" for="clientTypeCompany">Company Representative</label>
                                </div>
                            </div>
                            <div class="invalid-feedback d-block" id="clientTypeFeedback" style="display:none;">Please select your client type.</div>
                        </div>

                        <div class="mb-2 d-none" id="companyNameWrap">
                            <label class="form-label fw-medium">Company Name</label>
                            <input type="text" class="form-control" name="company_name" id="companyNameInput" placeholder="ABC Corporation" disabled>
                            <div class="invalid-feedback">Please enter your company name.</div>
                        </div>

                        <div class="row g-2">
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Full Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Juan Dela Cruz" required>
                                <div class="invalid-feedback">Please enter your name.</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-medium">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="you@email.com" required>
                                <div class="invalid-feedback">Please enter a valid email.</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-medium">Contact Number</label>
                                <input type="tel" class="form-control" name="phone" placeholder="09171234567" required>
                                <div class="invalid-feedback">Please enter your contact number.</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-medium">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="123 Main St, Makati City" required>
                                <div class="invalid-feedback">Please enter your address.</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-medium">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="••••••••" required minlength="8">
                                <div class="invalid-feedback">Password must be at least 8 characters.</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-medium">Confirm Password</label>
                                <input type="password" class="form-control" name="confirm_password" placeholder="••••••••" required minlength="8">
                                <div class="invalid-feedback">Password must be at least 8 characters.</div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mt-3">Register</button>
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    const companyOption = document.getElementById('clientTypeCompany');
    const individualOption = document.getElementById('clientTypeIndividual');
    const companyNameWrap = document.getElementById('companyNameWrap');
    const companyNameInput = document.getElementById('companyNameInput');

    if (!companyOption || !individualOption || !companyNameWrap || !companyNameInput) return;

    function toggleCompanyField() {
        const isCompany = companyOption.checked;
        companyNameWrap.classList.toggle('d-none', !isCompany);
        companyNameInput.disabled = !isCompany;
        companyNameInput.required = isCompany;

        if (!isCompany) {
            companyNameInput.value = '';
            companyNameInput.classList.remove('is-invalid');
        }
    }

    companyOption.addEventListener('change', toggleCompanyField);
    individualOption.addEventListener('change', toggleCompanyField);
    toggleCompanyField();
});
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>
