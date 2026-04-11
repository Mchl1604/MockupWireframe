<?php $pageTitle = 'Home'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php require TEMPLATES . '/partials/head.php'; ?>
</head>
<body>

<!-- ---- Navbar ---- -->
<nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="<?= h(url('/')) ?>">
            <div style="width:34px;height:34px;background:#2563eb;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                <i class="bi bi-wind text-white"></i>
            </div>
            Coliconstruct
        </a>
        <div class="ms-auto d-flex gap-2">
            <a href="<?= h(url('/login')) ?>" class="btn btn-outline-primary btn-sm">Login</a>
            <a href="<?= h(url('/register')) ?>" class="btn btn-primary btn-sm">Register</a>
        </div>
    </div>
</nav>

<!-- ---- Hero ---- -->
<section class="hero-section text-white py-5">
    <div class="container py-5 text-center">
        <h1 class="display-4 fw-bold mb-3">Professional HVAC Solutions</h1>
        <p class="lead mb-4 opacity-90 mx-auto" style="max-width:580px;">
            Coliconstruct Engineering Services provides expert AC installation, maintenance,
            ducting, and repair for residential and commercial clients.
        </p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="<?= h(url('/register')) ?>" class="btn btn-warning btn-lg fw-semibold">Get Started</a>
            <a href="<?= h(url('/login')) ?>"    class="btn btn-outline-light btn-lg">Client Portal</a>
        </div>
    </div>
</section>

<!-- ---- Services ---- -->
<section class="py-5 bg-white">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Our Services</h2>
        <div class="row g-4">
            <?php
            $servicesOverview = [
                ['icon' => 'bi-wind',          'title' => 'AC Installation',       'desc' => 'Professional split-type and window-type AC installation for residential and commercial spaces.'],
                ['icon' => 'bi-wrench',         'title' => 'AC Repair',             'desc' => 'Expert diagnosis and repair services for all AC brands and models.'],
                ['icon' => 'bi-clipboard-check','title' => 'Preventive Maintenance','desc' => 'Scheduled maintenance programs to keep your systems running efficiently.'],
                ['icon' => 'bi-grid',           'title' => 'Ducting Systems',       'desc' => 'Custom fabrication and installation of ventilation duct systems.'],
            ];
            foreach ($servicesOverview as $svc): ?>
            <div class="col-sm-6 col-lg-3">
                <div class="card h-100 text-center border-0 shadow-sm hover-card">
                    <div class="card-body p-4">
                        <div class="mx-auto mb-3 d-flex align-items-center justify-content-center rounded-circle"
                             style="width:56px;height:56px;background:#eff6ff;">
                            <i class="<?= h($svc['icon']) ?> fs-3 text-primary"></i>
                        </div>
                        <h5 class="fw-semibold mb-2"><?= h($svc['title']) ?></h5>
                        <p class="text-muted small mb-0"><?= h($svc['desc']) ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ---- Why Choose Us ---- -->
<section class="py-5" style="background:#f8fafc;">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Why Choose Us</h2>
        <div class="row g-4 justify-content-center">
            <?php
            $features = [
                ['icon' => 'bi-calendar-check', 'title' => 'Project Tracking',       'desc' => 'Monitor your projects in real-time from request to completion.'],
                ['icon' => 'bi-chat-dots',       'title' => 'Direct Communication',   'desc' => 'Chat directly with your assigned technicians and admin team.'],
                ['icon' => 'bi-shield-check',    'title' => 'Quality Assurance',      'desc' => 'Detailed reports and documentation for every service performed.'],
            ];
            foreach ($features as $feat): ?>
            <div class="col-md-4">
                <div class="d-flex gap-3">
                    <div class="d-flex align-items-center justify-content-center rounded-3 flex-shrink-0"
                         style="width:48px;height:48px;background:#eff6ff;">
                        <i class="<?= h($feat['icon']) ?> fs-4 text-primary"></i>
                    </div>
                    <div>
                        <h6 class="fw-semibold mb-1"><?= h($feat['title']) ?></h6>
                        <p class="text-muted small mb-0"><?= h($feat['desc']) ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ---- Footer ---- -->
<footer class="bg-dark text-white py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <h5 class="fw-bold mb-2">Coliconstruct Engineering</h5>
                <p class="text-white-50 small mb-0">Professional HVAC solutions since 2015.</p>
            </div>
            <div class="col-md-4">
                <h6 class="fw-semibold mb-2">Contact</h6>
                <p class="text-white-50 small mb-1">info@coliconstruct.com</p>
                <p class="text-white-50 small mb-0">(02) 8123-4567</p>
            </div>
            <div class="col-md-4">
                <h6 class="fw-semibold mb-2">Address</h6>
                <p class="text-white-50 small mb-0">123 Engineering Ave, Makati City, Philippines</p>
            </div>
        </div>
        <hr class="border-white border-opacity-10 my-4">
        <p class="text-center text-white-50 small mb-0">
            &copy; <?= date('Y') ?> Coliconstruct Engineering Services. All rights reserved.
        </p>
    </div>
</footer>

<?php require TEMPLATES . '/partials/footer.php'; ?>
</body>
</html>
