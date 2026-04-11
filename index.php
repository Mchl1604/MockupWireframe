<?php
/**
 * Coliconstruct Engineering Services - PHP Web Application
 * Entry point / router for Apache (XAMPP) and PHP built-in server.
 *
 * Run from project root:
 *   php -S localhost:8000 index.php
 *
 * All non-static requests are routed here.
 */

// Serve static files directly when using the PHP built-in server
if (php_sapi_name() === 'cli-server') {
    $file = __DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if (is_file($file)) {
        return false; // let the built-in server serve it
    }
}

// Bootstrap
session_start();

define('BASE_PATH', __DIR__);
define('TEMPLATES', BASE_PATH . '/templates');

$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
$scriptDir = rtrim($scriptDir, '/');
if ($scriptDir === '.' || $scriptDir === '/') {
    $scriptDir = '';
}
define('APP_BASE_URL', $scriptDir);

require BASE_PATH . '/src/helpers.php';
require BASE_PATH . '/src/auth.php';
require BASE_PATH . '/src/data.php';

// ---------------------------------------------------------------------------
// Determine the request path (strip query string)
// ---------------------------------------------------------------------------
$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
if (APP_BASE_URL !== '' && str_starts_with($requestPath, APP_BASE_URL)) {
    $requestPath = substr($requestPath, strlen(APP_BASE_URL)) ?: '/';
}
$path = '/' . ltrim($requestPath, '/');
$path = rtrim($path, '/') ?: '/';

// ---------------------------------------------------------------------------
// Handle POST actions before routing
// ---------------------------------------------------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'login') {
        $role = $_POST['role'] ?? 'client';
        if (!in_array($role, ['client', 'admin', 'technician'], true)) {
            $role = 'client';
        }
        loginUser($role);
        $dest = match ($role) {
            'admin'      => '/admin/dashboard',
            'technician' => '/tech/schedule',
            default      => '/client/projects',
        };
        redirect($dest);
    }

    if ($action === 'register') {
        // Demo: just redirect to login
        redirect('/login?registered=1');
    }

    if ($action === 'request_service') {
        redirect('/client/request?submitted=1');
    }

    if ($action === 'submit_report') {
        redirect('/tech/reports?submitted=1');
    }
}

// ---------------------------------------------------------------------------
// Logout
// ---------------------------------------------------------------------------
if ($path === '/logout') {
    logoutUser();
    redirect('/');
}

// ---------------------------------------------------------------------------
// Simple redirects
// ---------------------------------------------------------------------------
$redirects = [
    '/client' => '/client/projects',
    '/admin'  => '/admin/dashboard',
    '/tech'   => '/tech/schedule',
];
if (isset($redirects[$path])) {
    redirect($redirects[$path]);
}

// ---------------------------------------------------------------------------
// Route map: path => [template, required_role(s)]
// ---------------------------------------------------------------------------
$routes = [
    // Public
    '/'                   => ['landing',                null],
    '/login'              => ['login',                  null],
    '/register'           => ['register',               null],

    // Client
    '/client/request'     => ['client/request',         'client'],
    '/client/projects'    => ['client/projects',        'client'],
    '/client/project'     => ['client/project-details', 'client'],
    '/client/chat'        => ['client/chat',            'client'],

    // Admin
    '/admin/dashboard'    => ['admin/dashboard',        'admin'],
    '/admin/requests'     => ['admin/requests',         'admin'],
    '/admin/quotations'   => ['admin/quotations',       'admin'],
    '/admin/projects'     => ['admin/projects',         'admin'],
    '/admin/project'      => ['admin/project-details',  'admin'],
    '/admin/schedules'    => ['admin/schedules',        'admin'],
    '/admin/technicians'  => ['admin/technicians',      'admin'],
    '/admin/reports'      => ['admin/reports',          'admin'],
    '/admin/materials'    => ['admin/materials',        'admin'],
    '/admin/users'        => ['admin/users',            'admin'],
    '/admin/chat'         => ['admin/chat',             'admin'],

    // Technician
    '/tech/schedule'      => ['tech/schedule',          'technician'],
    '/tech/projects'      => ['tech/projects',          'technician'],
    '/tech/project'       => ['tech/project-details',   'technician'],
    '/tech/reports'       => ['tech/reports',           'technician'],
    '/tech/attendance'    => ['tech/attendance',        'technician'],
];

// ---------------------------------------------------------------------------
// Dispatch
// ---------------------------------------------------------------------------
if (!isset($routes[$path])) {
    http_response_code(404);
    require TEMPLATES . '/404.php';
    exit;
}

[$template, $requiredRole] = $routes[$path];

if (!preg_match('/^[a-z0-9\\/-]+$/i', $template) || str_contains($template, '..')) {
    http_response_code(400);
    exit('Invalid route template.');
}

require TEMPLATES . '/' . $template . '.php';
