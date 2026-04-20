<?php
require_once __DIR__ . '/includes/app.php';

if (php_sapi_name() === 'cli-server') {
    $requestedPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
    $resolvedFile = realpath(__DIR__ . $requestedPath);
    $basePath = realpath(__DIR__);

    if (
        $resolvedFile !== false &&
        $basePath !== false &&
        strpos($resolvedFile, $basePath . DIRECTORY_SEPARATOR) === 0 &&
        is_file($resolvedFile)
    ) {
        return false;
    }
}

$path = app_current_path();
if ($path === '/index.php') {
    $path = '/';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($path === '/register' && $action === 'register') {
        header('Location: ' . app_url('/login', ['registered' => 1]));
        exit;
    }

    if ($path === '/login' && $action === 'login') {
        $role = $_POST['role'] ?? 'client';

        if ($role === 'admin') {
            header('Location: ' . app_url('/admin/dashboard'));
            exit;
        }

        if ($role === 'technician') {
            header('Location: ' . app_url('/tech/schedule'));
            exit;
        }

        header('Location: ' . app_url('/client/projects'));
        exit;
    }

    if ($path === '/client/request' && $action === 'request_service') {
        header('Location: ' . app_url('/client/request', ['submitted' => 1]));
        exit;
    }

    if ($path === '/tech/reports' && $action === 'submit_report') {
        header('Location: ' . app_url('/tech/reports', ['submitted' => 1]));
        exit;
    }

    if ($path === '/lead-technician/reports' && $action === 'submit_report') {
        header('Location: ' . app_url('/lead-technician/reports', ['submitted' => 1]));
        exit;
    }
}

if ($path === '/client') {
    header('Location: ' . app_url('/client/projects'));
    exit;
}

if ($path === '/admin') {
    header('Location: ' . app_url('/admin/dashboard'));
    exit;
}

if ($path === '/tech') {
    header('Location: ' . app_url('/tech/schedule'));
    exit;
}

if ($path === '/lead-technician') {
    header('Location: ' . app_url('/lead-technician/schedule'));
    exit;
}

$routes = [
    '/' => __DIR__ . '/pages/index.php',
    '/login' => __DIR__ . '/pages/login.php',
    '/register' => __DIR__ . '/pages/register.php',
    '/client/request' => __DIR__ . '/pages/client/request.php',
    '/client/projects' => __DIR__ . '/pages/client/projects.php',
    '/client/project' => __DIR__ . '/pages/client/project.php',
    '/client/chat' => __DIR__ . '/pages/client/chat.php',
    '/admin/dashboard' => __DIR__ . '/pages/admin/dashboard.php',
    '/admin/requests' => __DIR__ . '/pages/admin/requests.php',
    '/admin/quotations' => __DIR__ . '/pages/admin/quotations.php',
    '/admin/projects' => __DIR__ . '/pages/admin/projects.php',
    '/admin/project' => __DIR__ . '/pages/admin/project.php',
    '/admin/schedules' => __DIR__ . '/pages/admin/schedules.php',
    '/admin/technicians' => __DIR__ . '/pages/admin/technicians.php',
    '/admin/configuration' => __DIR__ . '/pages/admin/configuration.php',
    '/admin/reports' => __DIR__ . '/pages/admin/reports.php',
    '/admin/materials' => __DIR__ . '/pages/admin/materials.php',
    '/admin/users' => __DIR__ . '/pages/admin/users.php',
    '/admin/chat' => __DIR__ . '/pages/admin/chat.php',
    '/tech/schedule' => __DIR__ . '/pages/tech/schedule.php',
    '/tech/projects' => __DIR__ . '/pages/tech/projects.php',
    '/tech/project' => __DIR__ . '/pages/tech/project.php',
    '/tech/reports' => __DIR__ . '/pages/tech/reports.php',
    '/tech/attendance' => __DIR__ . '/pages/tech/attendance.php',
    '/lead-technician/schedule' => __DIR__ . '/pages/lead-technician/schedule.php',
    '/lead-technician/projects' => __DIR__ . '/pages/lead-technician/projects.php',
    '/lead-technician/project' => __DIR__ . '/pages/lead-technician/project.php',
    '/lead-technician/reports' => __DIR__ . '/pages/lead-technician/reports.php',
    '/lead-technician/attendance' => __DIR__ . '/pages/lead-technician/attendance.php',
];

if (isset($routes[$path])) {
    include $routes[$path];
    exit;
}

http_response_code(404);
include __DIR__ . '/pages/404.php';
