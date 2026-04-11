<?php
/**
 * Dashboard sidebar partial
 * Requires: $role (string), $activeNav (string)
 */
$user = currentUser();

$clientNav = [
    ['url' => '/client/request',  'icon' => 'bi-send',          'label' => 'Request Service'],
    ['url' => '/client/projects', 'icon' => 'bi-folder-kanban', 'label' => 'My Projects'],
    ['url' => '/client/chat',     'icon' => 'bi-chat-dots',     'label' => 'Chat'],
];

$adminNav = [
    ['url' => '/admin/dashboard',   'icon' => 'bi-speedometer2',  'label' => 'Dashboard'],
    ['url' => '/admin/requests',    'icon' => 'bi-file-earmark',  'label' => 'Requests'],
    ['url' => '/admin/quotations',  'icon' => 'bi-clipboard-check','label' => 'Quotations'],
    ['url' => '/admin/projects',    'icon' => 'bi-folder-kanban', 'label' => 'Projects'],
    ['url' => '/admin/schedules',   'icon' => 'bi-calendar-week', 'label' => 'Schedules'],
    ['url' => '/admin/technicians', 'icon' => 'bi-wrench',        'label' => 'Technicians'],
    ['url' => '/admin/reports',     'icon' => 'bi-file-text',     'label' => 'Reports'],
    ['url' => '/admin/materials',   'icon' => 'bi-box-seam',      'label' => 'Materials'],
    ['url' => '/admin/users',       'icon' => 'bi-people',        'label' => 'Users'],
    ['url' => '/admin/chat',        'icon' => 'bi-chat-dots',     'label' => 'Chat'],
];

$techNav = [
    ['url' => '/tech/schedule',   'icon' => 'bi-calendar-week', 'label' => 'My Schedule'],
    ['url' => '/tech/projects',   'icon' => 'bi-folder-kanban', 'label' => 'My Projects'],
    ['url' => '/tech/reports',    'icon' => 'bi-file-text',     'label' => 'Reports'],
    ['url' => '/tech/attendance', 'icon' => 'bi-clock',         'label' => 'Attendance'],
];

$roleLabels = [
    'client'     => 'Client Portal',
    'admin'      => 'Admin Panel',
    'technician' => 'Technician Portal',
];

$nav = $clientNav;
if ($role === 'admin') {
    $nav = $adminNav;
} elseif ($role === 'technician') {
    $nav = $techNav;
}
$roleLabel = $roleLabels[$role] ?? '';
?>
<!-- Sidebar -->
<nav id="sidebar" class="sidebar d-flex flex-column">
    <!-- Brand -->
    <div class="sidebar-brand d-flex align-items-center px-3 py-4">
        <div class="brand-icon me-2">
            <i class="bi bi-wind"></i>
        </div>
        <div>
            <div class="fw-bold text-white lh-1">Coliconstruct</div>
            <div class="text-white-50 small"><?= h($roleLabel) ?></div>
        </div>
    </div>

    <!-- Nav items -->
    <ul class="nav flex-column flex-grow-1 px-2">
        <?php foreach ($nav as $item): ?>
            <?php
            $isActive = $activeNav === basename($item['url']);
            $liClass  = $isActive ? 'nav-item active' : 'nav-item';
            $aClass   = $isActive ? 'nav-link active' : 'nav-link';
            ?>
            <li class="<?= $liClass ?>">
                <a href="<?= h(url($item['url'])) ?>" class="<?= $aClass ?>">
                    <i class="<?= h($item['icon']) ?> me-2"></i>
                    <span><?= h($item['label']) ?></span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- User footer -->
    <div class="sidebar-footer d-flex align-items-center gap-2 px-3 py-3 border-top border-white border-opacity-10">
        <div class="avatar-sm">
            <?= h($user['initials'] ?? '?') ?>
        </div>
        <div class="flex-grow-1 min-width-0">
            <div class="text-white small fw-medium text-truncate"><?= h($user['name'] ?? '') ?></div>
            <div class="text-white-50 small text-capitalize"><?= h($role) ?></div>
        </div>
        <a href="<?= h(url('/logout')) ?>" class="text-white-50 text-decoration-none" title="Logout">
            <i class="bi bi-box-arrow-right"></i>
        </a>
    </div>
</nav>
