<?php
if (php_sapi_name() === 'cli-server') {
    $file = __DIR__ . parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
    if (is_file($file)) {
        return false;
    }
}

$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
$scriptDir = rtrim($scriptDir, '/');
if ($scriptDir === '.' || $scriptDir === '/') {
    $scriptDir = '';
}
$baseUrl = $scriptDir;

$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
if ($baseUrl !== '' && strpos($requestPath, $baseUrl) === 0) {
    $requestPath = substr($requestPath, strlen($baseUrl));
}
$path = '/' . ltrim($requestPath, '/');
$path = rtrim($path, '/') ?: '/';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($path === '/register' && $action === 'register') {
        header('Location: ' . $baseUrl . '/login?registered=1');
        exit;
    }

    if ($path === '/login' && $action === 'login') {
        header('Location: ' . $baseUrl . '/');
        exit;
    }
}

$routes = [
    '/' => __DIR__ . '/pages/index.php',
    '/login' => __DIR__ . '/pages/login.php',
    '/register' => __DIR__ . '/pages/register.php',
];

if (isset($routes[$path])) {
    include $routes[$path];
    exit;
}

http_response_code(404);
include __DIR__ . '/pages/404.php';
