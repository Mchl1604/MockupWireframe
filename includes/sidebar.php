<?php
$baseUrl = $baseUrl ?? '';
$requestPath = app_current_path();
$segments = explode('/', trim($requestPath, '/'));
$sidebarRole = in_array($segments[0] ?? '', ['admin', 'client', 'tech'], true) ? $segments[0] : '';

$sidebarMenus = [
    'admin' => [
        ['label' => 'Dashboard', 'href' => '/admin/dashboard', 'icon' => 'bi-speedometer2'],
        ['label' => 'Service Requests', 'href' => '/admin/requests', 'icon' => 'bi-inbox'],
        ['label' => 'Quotations', 'href' => '/admin/quotations', 'icon' => 'bi-receipt'],
        ['label' => 'Projects', 'href' => '/admin/projects', 'icon' => 'bi-folder2-open'],
        ['label' => 'Schedules', 'href' => '/admin/schedules', 'icon' => 'bi-calendar-event'],
        ['label' => 'Technicians', 'href' => '/admin/technicians', 'icon' => 'bi-tools'],
        ['label' => 'Reports', 'href' => '/admin/reports', 'icon' => 'bi-graph-up'],
        ['label' => 'Configuration', 'href' => '/admin/configuration', 'icon' => 'bi-sliders2'],
        ['label' => 'Chat', 'href' => '/admin/chat', 'icon' => 'bi-chat-dots'],
    ],
    'client' => [
        ['label' => 'My Projects', 'href' => '/client/projects', 'icon' => 'bi-folder2-open'],
        ['label' => 'Request Service', 'href' => '/client/request', 'icon' => 'bi-plus-circle'],
        ['label' => 'Chat', 'href' => '/client/chat', 'icon' => 'bi-chat-dots'],
    ],
    'tech' => [
        ['label' => 'My Schedule', 'href' => '/tech/schedule', 'icon' => 'bi-calendar2-week'],
        ['label' => 'My Projects', 'href' => '/tech/projects', 'icon' => 'bi-folder2-open'],
        ['label' => 'Reports', 'href' => '/tech/reports', 'icon' => 'bi-graph-up'],
        ['label' => 'Attendance', 'href' => '/tech/attendance', 'icon' => 'bi-clock-history'],
    ],
];

if ($sidebarRole === '') {
    return;
}

$roleLabel = ucfirst($sidebarRole);
$currentPage = $requestPath;
?>
<aside class="sidebar" id="sidebar" aria-label="<?php echo htmlspecialchars($roleLabel, ENT_QUOTES, 'UTF-8'); ?> navigation">


    <div class="p-3 sidebar-nav-wrap">
        <div class="text-uppercase small text-white-50 fw-semibold mb-2 sidebar-section-title">Navigation</div>
        <nav class="nav flex-column gap-1">
            <?php foreach ($sidebarMenus[$sidebarRole] as $item): ?>
            <a class="nav-link<?php echo $currentPage === $item['href'] ? ' active' : ''; ?>" href="<?php echo htmlspecialchars(app_url($item['href']), ENT_QUOTES, 'UTF-8'); ?>">
                <i class="bi <?php echo htmlspecialchars($item['icon'], ENT_QUOTES, 'UTF-8'); ?> me-2"></i>
                <span class="sidebar-link-text"><?php echo htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8'); ?></span>
            </a>
            <?php endforeach; ?>
        </nav>
    </div>

    <div class="sidebar-logout-wrap">
        <a href="<?php echo htmlspecialchars(app_url('/'), ENT_QUOTES, 'UTF-8'); ?>" class="nav-link">
            <i class="bi bi-box-arrow-right me-2"></i>
            <span class="sidebar-link-text">Logout</span>
        </a>
    </div>
</aside>
<div class="sidebar-overlay" id="sidebarOverlay"></div>