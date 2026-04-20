<?php
$baseUrl = $baseUrl ?? '';
$requestPath = app_current_path();
$segments = explode('/', trim($requestPath, '/'));
$sidebarRole = in_array($segments[0] ?? '', ['admin', 'client', 'tech', 'lead-technician'], true) ? $segments[0] : '';

$panelUserByRole = [
    'admin' => 'Michael Capanayan',
    'client' => 'Juan Dela Cruz',
    'tech' => 'Carlos Reyes',
    'lead-technician' => 'Mark Santos',
];
$panelUserName = $panelUserByRole[$sidebarRole] ?? 'User';
$panelRoleLabel = $sidebarRole === 'lead-technician' ? 'Lead Technician' : ucfirst($sidebarRole);
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
        <div class="ms-auto panel-user-card">
            <div class="panel-user-name"><?php echo htmlspecialchars($panelUserName, ENT_QUOTES, 'UTF-8'); ?></div>
            <div class="panel-user-role"><?php echo htmlspecialchars($panelRoleLabel, ENT_QUOTES, 'UTF-8'); ?></div>
        </div>
        <?php else: ?>
        <div class="ms-auto d-flex gap-2 flex-wrap justify-content-end">
            <a href="<?php echo htmlspecialchars(app_url('/'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-outline-secondary btn-sm">Home</a>
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
