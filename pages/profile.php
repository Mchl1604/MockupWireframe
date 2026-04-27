<?php
$requestPath = app_current_path();
$segments = explode('/', trim($requestPath, '/'));
$currentRole = $segments[0] ?? '';

if (!app_is_panel_role($currentRole)) {
    http_response_code(404);
    include __DIR__ . '/404.php';
    return;
}

$profile = app_get_user_profile($currentRole);
$isTechnicianProfile = app_is_technician_role($currentRole);
$specialtyOptions = app_technician_specialty_options();
$selectedSpecialties = app_normalize_specialties($profile['specialties'] ?? []);
$approvedSpecialtyExample = 'aircon installation';
$pageTitle = 'Edit Profile';
$error = (string) ($_GET['error'] ?? '');
$updated = isset($_GET['updated']);

$errorMessage = '';
if ($error === 'first_name') {
    $errorMessage = 'First name is required.';
} elseif ($error === 'last_name') {
    $errorMessage = 'Last name is required.';
} elseif ($error === 'email') {
    $errorMessage = 'Please provide a valid email address.';
} elseif ($error === 'contact_number') {
    $errorMessage = 'Please provide a valid contact number.';
} elseif ($error === 'address') {
    $errorMessage = 'Address is required.';
} elseif ($error === 'old_password_required') {
    $errorMessage = 'Please enter your old password before setting a new one.';
} elseif ($error === 'old_password_incorrect') {
    $errorMessage = 'Old password is incorrect.';
} elseif ($error === 'password_length') {
    $errorMessage = 'New password must be at least 8 characters.';
} elseif ($error === 'password_mismatch') {
    $errorMessage = 'New password and confirm password do not match.';
}

$backPathByRole = [
    'admin' => '/admin/dashboard',
    'client' => '/client/projects',
    'tech' => '/tech/projects',
    'lead-technician' => '/lead-technician/projects',
];
$backPath = $backPathByRole[$currentRole] ?? '/';
?>
<?php include __DIR__ . '/../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../includes/navbar.php'; ?>
<?php include __DIR__ . '/../includes/sidebar.php'; ?>

<main class="container py-4 py-md-5 flex-grow-1 profile-edit-page">
    <div class="d-flex align-items-center mb-4 profile-page-title-wrap">
        <a href="<?php echo htmlspecialchars(app_url($backPath), ENT_QUOTES, 'UTF-8'); ?>" class="profile-page-back-link" aria-label="Go back">
            <i class="bi bi-arrow-left"></i>
        </a>
        <h2 class="h4 fw-bold mb-0 ms-2">Edit Profile</h2>
    </div>

    <?php if ($updated): ?>
    <div class="alert alert-success border-success-subtle" role="alert">
        Profile updated successfully.
    </div>
    <?php endif; ?>

    <?php if ($errorMessage !== ''): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo htmlspecialchars($errorMessage, ENT_QUOTES, 'UTF-8'); ?>
    </div>
    <?php endif; ?>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4 p-md-5 profile-card-body">
            <div class="profile-color-banner mb-4">
                <h3 class="h6 fw-semibold text-primary mb-1">Account Information</h3>
                <p class="small mb-0">Update your personal details, contact information, and password.</p>
            </div>

            <form method="post" action="<?php echo htmlspecialchars(app_url('/' . $currentRole . '/profile'), ENT_QUOTES, 'UTF-8'); ?>" class="needs-validation" novalidate>
                <input type="hidden" name="action" value="update_profile">

                <div class="row g-3 mb-1">
                    <div class="col-md-6">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="first_name" value="<?php echo htmlspecialchars($profile['first_name'], ENT_QUOTES, 'UTF-8'); ?>" required>
                        <div class="invalid-feedback">Please enter your first name.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="last_name" value="<?php echo htmlspecialchars($profile['last_name'], ENT_QUOTES, 'UTF-8'); ?>" required>
                        <div class="invalid-feedback">Please enter your last name.</div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="profileEmail" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="profileEmail" name="email" value="<?php echo htmlspecialchars($profile['email'], ENT_QUOTES, 'UTF-8'); ?>" required>
                    <div class="invalid-feedback">Please enter a valid email address.</div>
                </div>

                <div class="mb-3">
                    <label for="contactNumber" class="form-label">Contact Number</label>
                    <input type="text" class="form-control" id="contactNumber" name="contact_number" value="<?php echo htmlspecialchars($profile['contact_number'], ENT_QUOTES, 'UTF-8'); ?>" required>
                    <div class="invalid-feedback">Please enter your contact number.</div>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required><?php echo htmlspecialchars($profile['address'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                    <div class="invalid-feedback">Please enter your address.</div>
                </div>

                <?php if ($isTechnicianProfile): ?>
                <hr>
                <div class="d-flex align-items-center justify-content-between mb-2 gap-2 flex-wrap">
                    <h3 class="h6 fw-semibold text-primary mb-0">Specialties</h3>
                    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#specialtyModal">
                        Edit
                    </button>
                </div>
                <p class="small text-muted mb-2">Use Edit to add or remove specialties.</p>

                <div id="specialtyList" class="list-group mb-2" data-approved-example="<?php echo htmlspecialchars($approvedSpecialtyExample, ENT_QUOTES, 'UTF-8'); ?>">
                    <div class="list-group-item d-flex align-items-center justify-content-between gap-2" data-specialty="<?php echo htmlspecialchars($approvedSpecialtyExample, ENT_QUOTES, 'UTF-8'); ?>" data-approved-example-item="1">
                        <span class="text-capitalize"><?php echo htmlspecialchars($approvedSpecialtyExample, ENT_QUOTES, 'UTF-8'); ?></span>
                    </div>
                    <?php foreach ($selectedSpecialties as $specialty): ?>
                    <?php if ($specialty === $approvedSpecialtyExample) { continue; } ?>
                    <div class="list-group-item d-flex align-items-center justify-content-between gap-2" data-specialty="<?php echo htmlspecialchars($specialty, ENT_QUOTES, 'UTF-8'); ?>">
                        <span class="text-capitalize"><?php echo htmlspecialchars($specialty, ENT_QUOTES, 'UTF-8'); ?></span>
                        <span class="badge text-bg-warning">To Be Approved</span>
                    </div>
                    <?php endforeach; ?>
                </div>

                <p id="specialtyEmptyState" class="small text-muted mb-3<?php echo $selectedSpecialties !== [] ? ' d-none' : ''; ?>">No specialties pending approval yet.</p>

                <div id="specialtyHiddenInputs">
                    <?php foreach ($selectedSpecialties as $specialty): ?>
                    <input type="hidden" name="specialties[]" value="<?php echo htmlspecialchars($specialty, ENT_QUOTES, 'UTF-8'); ?>">
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <hr>
                <h3 class="h6 fw-semibold text-primary mb-3">Change Password</h3>
                <p class="small text-muted mb-3">Leave password fields blank if you do not want to change your password.</p>

                <div class="mb-3">
                    <label for="oldPassword" class="form-label">Old Password</label>
                    <input type="password" class="form-control" id="oldPassword" name="old_password" autocomplete="current-password">
                </div>

                <div class="mb-3">
                    <label for="newPassword" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="newPassword" name="new_password" minlength="8" autocomplete="new-password">
                </div>

                <div class="mb-4">
                    <label for="confirmPassword" class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirm_password" minlength="8" autocomplete="new-password">
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php if ($isTechnicianProfile): ?>
<div class="modal fade" id="specialtyModal" tabindex="-1" aria-labelledby="specialtyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-6" id="specialtyModalLabel">Edit Specialties</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="small text-muted mb-3">Choose specialties to list on your profile. Selected specialties are marked as To Be Approved.</p>
                <div class="d-grid gap-2">
                    <?php foreach ($specialtyOptions as $specialty): ?>
                    <?php $specialtyId = 'specialty-modal-' . preg_replace('/[^a-z0-9]+/i', '-', strtolower($specialty)); ?>
                    <div class="form-check border rounded px-3 py-2 bg-white">
                        <input
                            class="form-check-input specialty-modal-checkbox"
                            type="checkbox"
                            value="<?php echo htmlspecialchars($specialty, ENT_QUOTES, 'UTF-8'); ?>"
                            id="<?php echo htmlspecialchars($specialtyId, ENT_QUOTES, 'UTF-8'); ?>"
                            <?php echo in_array($specialty, $selectedSpecialties, true) ? 'checked' : ''; ?>
                        >
                        <label class="form-check-label text-capitalize" for="<?php echo htmlspecialchars($specialtyId, ENT_QUOTES, 'UTF-8'); ?>">
                            <?php echo htmlspecialchars($specialty, ENT_QUOTES, 'UTF-8'); ?>
                        </label>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="specialtyModalSave">Save</button>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php include __DIR__ . '/../includes/footer.php'; ?>
