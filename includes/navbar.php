<?php
$baseUrl = $baseUrl ?? '';
$requestPath = app_current_path();
$segments = explode('/', trim($requestPath, '/'));
$sidebarRole = app_is_panel_role($segments[0] ?? '') ? $segments[0] : '';

$panelProfile = $sidebarRole !== '' ? app_get_user_profile($sidebarRole) : ['name' => 'User', 'email' => 'user@coliconstruct.local'];
$panelUserName = $panelProfile['name'];
$panelRoleLabel = app_role_label($sidebarRole);
$panelEmail = $panelProfile['email'];
$isHomePage = $requestPath === '/';
$isAboutPage = $requestPath === '/about';
$isServicesPage = $requestPath === '/services';
?>
<nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm sticky-top app-navbar">
    <div class="container-fluid px-3 px-lg-4 d-flex align-items-center">
        <div class="d-flex align-items-center gap-2">
            <a class="navbar-brand d-flex align-items-center gap-2 fw-bold mb-0" href="<?php echo htmlspecialchars(app_url('/'), ENT_QUOTES, 'UTF-8'); ?>">
                <img src="<?php echo htmlspecialchars(($baseUrl !== '' ? $baseUrl : '') . '/assets/img/coliconstruct-logo.svg', ENT_QUOTES, 'UTF-8'); ?>" alt="Coliconstruct" class="app-logo-sm">
                <span class="app-brand-text">Coliconstruct</span>
            </a>
            <?php if ($sidebarRole !== ''): ?>
            <button type="button" class="btn btn-outline-secondary btn-sm d-inline-flex align-items-center justify-content-center" id="sidebarToggle" aria-label="Toggle sidebar">
                <i class="bi bi-list fs-5"></i>
            </button>
            <?php endif; ?>
        </div>
        <?php if ($sidebarRole !== ''): ?>
        <div class="ms-auto dropdown panel-user-dropdown">
            <button class="btn panel-user-toggle dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="panel-user-identity">
                    <div class="panel-user-name"><?php echo htmlspecialchars($panelUserName, ENT_QUOTES, 'UTF-8'); ?></div>
                    <div class="panel-user-role"><?php echo htmlspecialchars($panelRoleLabel, ENT_QUOTES, 'UTF-8'); ?></div>
                </div>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow-sm mt-2">
                <li class="px-3 py-2">
                    <div class="fw-semibold small"><?php echo htmlspecialchars($panelUserName, ENT_QUOTES, 'UTF-8'); ?></div>
                    <div class="text-muted small"><?php echo htmlspecialchars($panelRoleLabel, ENT_QUOTES, 'UTF-8'); ?></div>
                    <div class="text-muted small"><?php echo htmlspecialchars($panelEmail, ENT_QUOTES, 'UTF-8'); ?></div>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item" href="<?php echo htmlspecialchars(app_url('/' . $sidebarRole . '/profile'), ENT_QUOTES, 'UTF-8'); ?>">
                        <i class="bi bi-person me-2"></i>Edit Profile
                    </a>
                </li>
                
            </ul>
        </div>
        <?php else: ?>
        <div class="ms-auto d-flex gap-2 flex-wrap justify-content-end">
            <a href="<?php echo htmlspecialchars(app_url('/'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-sm <?php echo $isHomePage ? 'btn-primary' : 'btn-outline-secondary'; ?>">Home</a>
            <a href="<?php echo htmlspecialchars(app_url('/services'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-sm <?php echo $isServicesPage ? 'btn-primary' : 'btn-outline-secondary'; ?>">Services</a>
            <a href="<?php echo htmlspecialchars(app_url('/about'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-sm <?php echo $isAboutPage ? 'btn-primary' : 'btn-outline-secondary'; ?>">About</a>
            <a href="<?php echo htmlspecialchars(app_url('/client/projects'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-outline-secondary btn-sm">Client</a>
            <a href="<?php echo htmlspecialchars(app_url('/admin/dashboard'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-outline-secondary btn-sm">Admin</a>
            <a href="<?php echo htmlspecialchars(app_url('/tech/schedule'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-outline-secondary btn-sm">Technician</a>
            <a href="<?php echo htmlspecialchars(app_url('/lead-technician/schedule'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-outline-secondary btn-sm">Lead Technician</a>
            <a href="<?php echo htmlspecialchars(app_url('/login'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-outline-primary btn-sm">Login</a>
            <a href="<?php echo htmlspecialchars(app_url('/register'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-primary btn-sm">Register</a>
        </div>
        <?php endif; ?>
    </div>
</nav>
