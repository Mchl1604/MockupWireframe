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

                        <?php if (($_GET['error'] ?? '') === 'terms'): ?>
                        <div class="alert alert-danger small mb-3">Please agree to the Terms and Conditions before registering.</div>
                        <?php endif; ?>

                        <div class="mb-2">
                            <label class="form-label fw-medium d-block">Client Type</label>
                            <div class="d-flex flex-wrap gap-3">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="radio" name="client_type" id="clientTypeIndividual" value="individual" checked required>
                                    <label class="form-check-label" for="clientTypeIndividual">Residential</label>
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

                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" value="1" name="terms_agreed" id="termsAgreed" required>
                            <label class="form-check-label small" for="termsAgreed">
                                By registering, you agree to our <button type="button" class="btn btn-link p-0 align-baseline fw-medium text-decoration-none" data-bs-toggle="modal" data-bs-target="#termsModal">Terms and Conditions</button>.
                            </label>
                            <div class="invalid-feedback">You must agree to the Terms and Conditions to continue.</div>
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

<div class="modal fade" id="termsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Terms and Conditions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Please read these Terms and Conditions carefully before registering or using the Coliconstruct Engineering Services Online Project Management System.</p>

                <h6 class="fw-bold mt-3">1. ACCEPTANCE OF TERMS</h6>
                <p>By registering as a client on the Coliconstruct Engineering Services Online Project Management System, you agree to be bound by these Terms and Conditions. If you do not agree to any part of these terms, you must not proceed with registration or use the system.</p>

                <h6 class="fw-bold mt-3">2. ELIGIBILITY</h6>
                <p class="mb-2">To register as a client, you must:</p>
                <ul>
                    <li>Be at least 18 years of age or a duly authorized representative of a company or organization;</li>
                    <li>Provide accurate, complete, and up-to-date information during registration; and</li>
                    <li>Have the legal capacity to enter into a binding agreement.</li>
                </ul>

                <h6 class="fw-bold mt-3">3. ACCOUNT REGISTRATION AND SECURITY</h6>
                <ol>
                    <li>You are required to provide your full name, valid contact number, email address, and service location during registration.</li>
                    <li>You are responsible for maintaining the confidentiality of your account credentials. You must not share your username or password with any third party.</li>
                    <li>You agree to notify the administrator immediately of any unauthorized use of your account.</li>
                    <li>Coliconstruct Engineering Services reserves the right to deactivate or terminate any account found to be in violation of these Terms and Conditions.</li>
                </ol>

                <h6 class="fw-bold mt-3">4. USE OF THE SYSTEM</h6>
                <p>Your account is strictly for personal or authorized business use in relation to your HVAC service needs with Coliconstruct Engineering Services.</p>
                <p class="mb-2">You are permitted to:</p>
                <ul>
                    <li>Submit service requests for HVAC installation, maintenance, repair, and related services;</li>
                    <li>View the status and progress of your approved projects;</li>
                    <li>Review and respond to quotations submitted by the administrator; and</li>
                    <li>Communicate with the administrator through the system's chat feature.</li>
                </ul>
                <p class="mb-2">You must not use the system to:</p>
                <ul>
                    <li>Submit false, misleading, or fraudulent service requests;</li>
                    <li>Attempt to access accounts, data, or system areas not assigned to you;</li>
                    <li>Upload harmful, offensive, or illegal content; or</li>
                    <li>Interfere with the system's operations or security.</li>
                </ul>

                <h6 class="fw-bold mt-3">5. SERVICE REQUESTS AND QUOTATIONS</h6>
                <ol>
                    <li>Submitting a service request does not guarantee immediate approval. All requests are subject to review and approval by the administrator.</li>
                    <li>Upon approval of your request, an assessment will be conducted by an assigned technician before a quotation is generated.</li>
                    <li>You have the right to review, approve, or reject the quotation provided. Project execution will only proceed upon your approval of the quotation.</li>
                    <li>Coliconstruct Engineering Services reserves the right to reject any service request without obligation to provide a detailed explanation.</li>
                </ol>

                <h6 class="fw-bold mt-3">6. PROJECT MONITORING AND REPORTS</h6>
                <ol>
                    <li>Once a project is approved and ongoing, you may monitor its progress through the system, including viewing progress reports and assessment reports submitted by technicians.</li>
                    <li>All project information, reports, and documents accessible through your account are intended solely for your reference and must not be shared with unauthorized parties.</li>
                </ol>

                <h6 class="fw-bold mt-3">7. DATA PRIVACY</h6>
                <ol>
                    <li>Coliconstruct Engineering Services is committed to protecting your personal information in accordance with Republic Act No. 10173, otherwise known as the Data Privacy Act of 2012.</li>
                    <li>By registering, you consent to the collection, storage, and use of your personal information for purposes directly related to the management of your service requests and projects.</li>
                    <li>Your personal data will not be disclosed to third parties without your consent, except as required by law.</li>
                    <li>You have the right to access, correct, or request the deletion of your personal data by contacting the system administrator.</li>
                </ol>

                <h6 class="fw-bold mt-3">8. COMMUNICATION</h6>
                <ol>
                    <li>All official communication regarding your projects shall be conducted through the system's built-in chat and notification features.</li>
                    <li>You are responsible for regularly checking your account for updates, messages, and notifications related to your service requests and ongoing projects.</li>
                </ol>

                <h6 class="fw-bold mt-3">9. INTELLECTUAL PROPERTY</h6>
                <p>All content, design, and features of the Online Project Management System are the property of Coliconstruct Engineering Services. You must not reproduce, copy, or distribute any part of the system without prior written permission.</p>

                <h6 class="fw-bold mt-3">10. LIMITATION OF LIABILITY</h6>
                <ol>
                    <li>Coliconstruct Engineering Services shall not be liable for any loss or damage arising from your inability to access the system due to internet connectivity issues, scheduled maintenance, or circumstances beyond the company's control.</li>
                    <li>The company is not responsible for any misuse of the system by the registered client.</li>
                </ol>

                <h6 class="fw-bold mt-3">11. AMENDMENTS</h6>
                <p>Coliconstruct Engineering Services reserves the right to update or modify these Terms and Conditions at any time. Continued use of the system after any changes constitute your acceptance of the revised terms. Clients will be notified of significant changes through the system.</p>

                <h6 class="fw-bold mt-3">12. TERMINATION</h6>
                <p>The company may suspend or terminate your account at its discretion if you are found to have violated any of these Terms and Conditions, provided false information during registration, or engaged in any activity that may harm the company, its employees, or other clients.</p>

                <h6 class="fw-bold mt-3">13. GOVERNING LAW</h6>
                <p>These Terms and Conditions shall be governed by and construed in accordance with the laws of the Republic of the Philippines. Any disputes arising from the use of this system shall be subject to the jurisdiction of the appropriate courts in Cavite, Philippines.</p>

                <h6 class="fw-bold mt-3">14. CONTACT</h6>
                <p class="mb-0">For questions or concerns regarding these Terms and Conditions, please contact the administrator through the system's chat feature or reach Coliconstruct Engineering Services at: 20 NHA Commercial and Industrial Compound, Barangay Gavino Maderan, Luzon Avenue, General Mariano Alvarez, Cavite.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">I Understand</button>
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
