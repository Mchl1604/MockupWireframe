<?php
$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
$scriptDir = rtrim($scriptDir, '/');
if ($scriptDir === '.' || $scriptDir === '/') {
    $scriptDir = '';
}
$baseUrl = $scriptDir;

function app_normalize_path(string $path): string
{
    $path = '/' . ltrim($path, '/');
    $path = preg_replace('#/+#', '/', $path) ?? $path;

    return rtrim($path, '/') ?: '/';
}

function app_current_path(): string
{
    global $baseUrl;

    $requestPath = isset($_GET['route']) ? (string) $_GET['route'] : (parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/');
    if ($baseUrl !== '' && strpos($requestPath, $baseUrl) === 0) {
        $requestPath = substr($requestPath, strlen($baseUrl));
    }

    return app_normalize_path($requestPath);
}

function app_url(string $path = '/', array $query = []): string
{
    global $baseUrl;

    $url = ($baseUrl !== '' ? $baseUrl : '') . '/index.php?route=' . rawurlencode(app_normalize_path($path));

    if (!empty($query)) {
        $url .= '&' . http_build_query($query);
    }

    return $url;
}
