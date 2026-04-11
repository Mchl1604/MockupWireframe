<?php
if (php_sapi_name() === 'cli-server') {
    $file = __DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    if (is_file($file)) {
        return false;
    }
}

session_start();

define('BASE_PATH', __DIR__);
$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
$scriptDir = rtrim($scriptDir, '/');
if ($scriptDir === '.' || $scriptDir === '/') {
    $scriptDir = '';
}
define('APP_BASE_URL', $scriptDir);

require BASE_PATH . '/src/helpers.php';
require BASE_PATH . '/src/auth.php';

$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
if (APP_BASE_URL !== '' && str_starts_with($requestPath, APP_BASE_URL)) {
    $requestPath = substr($requestPath, strlen(APP_BASE_URL)) ?: '/';
}
$path = '/' . ltrim($requestPath, '/');
$path = rtrim($path, '/') ?: '/';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    if ($action === 'login') {
        $role = $_POST['role'] ?? 'client';
        if (!in_array($role, ['client', 'admin', 'technician'], true)) {
            $role = 'client';
        }
        loginUser($role);
        redirect(match ($role) {
            'admin' => '/admin/dashboard',
            'technician' => '/tech/schedule',
            default => '/client/projects',
        });
    }
    if ($action === 'register') {
        redirect('/login?registered=1');
    }
}

if ($path === '/logout') {
    logoutUser();
    redirect('/');
}

$redirects = ['/client' => '/client/projects', '/admin' => '/admin/dashboard', '/tech' => '/tech/schedule'];
if (isset($redirects[$path])) {
    redirect($redirects[$path]);
}

function pageStart(string $title, string $bodyClass = ''): void {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= h($title) ?> - Coliconstruct</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="<?= h(url('/assets/css/app.css')) ?>">
    </head>
    <body class="<?= h($bodyClass) ?>">
    <?php
}

function pageEnd(): void {
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= h(url('/assets/js/app.js')) ?>"></script>
    </body>
    </html>
    <?php
}

function topNav(?string $role = null): void {
    ?>
    <nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?= h(url('/')) ?>">Coliconstruct</a>
            <div class="ms-auto d-flex gap-2">
                <?php if ($role === null): ?>
                    <a href="<?= h(url('/login')) ?>" class="btn btn-outline-primary btn-sm">Login</a>
                    <a href="<?= h(url('/register')) ?>" class="btn btn-primary btn-sm">Register</a>
                <?php else: ?>
                    <span class="badge text-bg-light border text-capitalize align-self-center"><?= h($role) ?></span>
                    <a href="<?= h(url('/logout')) ?>" class="btn btn-outline-danger btn-sm">Logout</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <?php
}

$projects = [
    ['id' => 'PRJ-001', 'name' => 'Makati Office VRF', 'serviceType' => 'AC Installation', 'status' => 'Ongoing', 'timeline' => 'Apr 10 - Apr 18'],
    ['id' => 'PRJ-002', 'name' => 'Condo Split-Type Repair', 'serviceType' => 'AC Repair', 'status' => 'Completed', 'timeline' => 'Apr 1 - Apr 2'],
    ['id' => 'PRJ-003', 'name' => 'Warehouse Ducting', 'serviceType' => 'Ducting Systems', 'status' => 'To be Approved', 'timeline' => 'Apr 20 - Apr 27'],
];

switch ($path) {
    case '/':
        pageStart('Home');
        topNav();
        ?>
        <section class="hero-section text-white py-5">
            <div class="container py-5 text-center">
                <h1 class="display-5 fw-bold mb-3">Simple HVAC Service Portal</h1>
                <p class="lead mb-4">Built with plain PHP, Bootstrap, CSS, and JS.</p>
                <a href="<?= h(url('/login')) ?>" class="btn btn-warning btn-lg">Open Portal</a>
            </div>
        </section>
        <?php
        pageEnd();
        break;

    case '/login':
        pageStart('Login', 'bg-light min-vh-100 d-flex align-items-center');
        ?>
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <?php if (!empty($_GET['registered'])): ?>
                        <div class="alert alert-success">Account created. Please sign in.</div>
                    <?php endif; ?>
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-3 text-center">Sign In</h4>
                            <form method="post" action="<?= h(url('/login')) ?>" class="needs-validation" novalidate>
                                <?= csrfField() ?>
                                <input type="hidden" name="action" value="login">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" required value="user@coliconstruct.com">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" required value="password">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Login as</label>
                                    <select class="form-select" name="role">
                                        <option value="client">Client</option>
                                        <option value="admin">Admin</option>
                                        <option value="technician">Technician</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary w-100" type="submit">Sign In</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        pageEnd();
        break;

    case '/register':
        pageStart('Register', 'bg-light min-vh-100 d-flex align-items-center');
        ?>
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-3 text-center">Register</h4>
                            <form method="post" action="<?= h(url('/register')) ?>" class="needs-validation" novalidate>
                                <?= csrfField() ?>
                                <input type="hidden" name="action" value="register">
                                <div class="mb-3"><input class="form-control" name="name" placeholder="Full Name" required></div>
                                <div class="mb-3"><input class="form-control" name="email" type="email" placeholder="Email" required></div>
                                <div class="mb-3"><input class="form-control" name="password" type="password" placeholder="Password" required></div>
                                <button class="btn btn-primary w-100" type="submit">Create Account</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        pageEnd();
        break;

    case '/client/projects':
        requireAuth('client');
        pageStart('Client Projects');
        topNav('client');
        ?>
        <main class="container py-4">
            <h2 class="h4 fw-bold mb-3">My Projects</h2>
            <div class="table-responsive card border-0 shadow-sm">
                <table class="table table-hover mb-0">
                    <thead class="table-light"><tr><th>Name</th><th>Service</th><th>Status</th><th>Timeline</th></tr></thead>
                    <tbody>
                    <?php foreach ($projects as $project): ?>
                        <tr>
                            <td><?= h($project['name']) ?></td>
                            <td><?= h($project['serviceType']) ?></td>
                            <td><?= statusBadge($project['status']) ?></td>
                            <td><?= h($project['timeline']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
        <?php
        pageEnd();
        break;

    case '/admin/dashboard':
        requireAuth('admin');
        pageStart('Admin Dashboard');
        topNav('admin');
        ?>
        <main class="container py-4">
            <h2 class="h4 fw-bold mb-3">Dashboard</h2>
            <div class="row g-3">
                <div class="col-md-4"><div class="card border-0 shadow-sm"><div class="card-body"><p class="text-muted mb-1">Projects</p><h3 class="mb-0"><?= count($projects) ?></h3></div></div></div>
                <div class="col-md-4"><div class="card border-0 shadow-sm"><div class="card-body"><p class="text-muted mb-1">Pending Approval</p><h3 class="mb-0">1</h3></div></div></div>
                <div class="col-md-4"><div class="card border-0 shadow-sm"><div class="card-body"><p class="text-muted mb-1">Active Technicians</p><h3 class="mb-0">6</h3></div></div></div>
            </div>
        </main>
        <?php
        pageEnd();
        break;

    case '/tech/schedule':
        requireAuth('technician');
        pageStart('Technician Schedule');
        topNav('technician');
        ?>
        <main class="container py-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h4 fw-bold mb-0">My Schedule</h2>
                <span class="badge text-bg-primary" id="liveClock"></span>
            </div>
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Mon:</strong> Makati Office VRF - Site inspection</li>
                        <li class="list-group-item"><strong>Tue:</strong> Warehouse Ducting - Material prep</li>
                        <li class="list-group-item"><strong>Wed:</strong> Condo Split-Type - Follow-up</li>
                    </ul>
                </div>
            </div>
        </main>
        <?php
        pageEnd();
        break;

    default:
        http_response_code(404);
        pageStart('404', 'bg-light min-vh-100 d-flex align-items-center justify-content-center');
        ?>
        <div class="text-center px-3">
            <h1 class="display-4 fw-bold text-primary">404</h1>
            <p class="text-muted">Page not found.</p>
            <a class="btn btn-primary" href="<?= h(url('/')) ?>">Go Home</a>
        </div>
        <?php
        pageEnd();
        break;
}
