<?php $pageTitle = 'Home'; ?>
<?php include __DIR__ . '/../includes/head.php'; ?>
<body class="home-page">
<?php include __DIR__ . '/../includes/navbar.php'; ?>

<section class="hero-section text-white py-5">
    <div class="container py-5 text-center">
        <h1 class="display-4 fw-bold mb-3">Professional HVAC Solutions</h1>
        <p class="lead mb-4 opacity-90 mx-auto" style="max-width:580px;">
            Coliconstruct Engineering Services provides expert Aircon Installation,
            ducting, and repair for residential and commercial clients.
        </p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="<?php echo htmlspecialchars(app_url('/register'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-warning btn-lg fw-semibold">Get Started</a>
            <a href="<?php echo htmlspecialchars(app_url('/login'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-outline-light btn-lg">Client Portal</a>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Our Services</h2>
        <div class="row g-4">
            <?php
            $servicesOverview = [
                ['icon' => 'bi-wind', 'title' => 'Aircon Installation', 'desc' => 'Professional split-type and window-type Aircon Installation for residential and commercial spaces.'],
                ['icon' => 'bi-wrench', 'title' => 'Aircon Repair', 'desc' => 'Expert diagnosis and repair services for all AC brands and models.'],
                ['icon' => 'bi-clipboard-check', 'title' => 'Aircon Cleaning', 'desc' => 'Scheduled maintenance programs to keep your systems running efficiently.'],
                ['icon' => 'bi-grid', 'title' => 'Ducting Installation', 'desc' => 'Custom fabrication and installation of ventilation duct systems.'],
            ];
            foreach ($servicesOverview as $svc): ?>
            <div class="col-sm-6 col-lg-3">
                <div class="card h-100 text-center border-0 shadow-sm hover-card">
                    <div class="card-body p-4">
                        <div class="mx-auto mb-3 d-flex align-items-center justify-content-center rounded-circle"
                             style="width:56px;height:56px;background:#eff6ff;">
                            <i class="<?php echo htmlspecialchars($svc['icon'], ENT_QUOTES, 'UTF-8'); ?> fs-3 text-primary"></i>
                        </div>
                        <h5 class="fw-semibold mb-2"><?php echo htmlspecialchars($svc['title'], ENT_QUOTES, 'UTF-8'); ?></h5>
                        <p class="text-muted small mb-0"><?php echo htmlspecialchars($svc['desc'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="py-5" style="background:#f8fafc;">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Why Choose Us</h2>
        <div class="row g-4 justify-content-center">
            <?php
            $features = [
                ['icon' => 'bi-calendar-check', 'title' => 'Project Tracking', 'desc' => 'Monitor your projects in real-time from request to completion.'],
                ['icon' => 'bi-chat-dots', 'title' => 'Direct Communication', 'desc' => 'Chat directly with your assigned technicians and admin team.'],
                ['icon' => 'bi-shield-check', 'title' => 'Quality Assurance', 'desc' => 'Detailed reports and documentation for every service performed.'],
            ];
            foreach ($features as $feat): ?>
            <div class="col-md-4">
                <div class="d-flex gap-3">
                    <div class="d-flex align-items-center justify-content-center rounded-3 flex-shrink-0"
                         style="width:48px;height:48px;background:#eff6ff;">
                        <i class="<?php echo htmlspecialchars($feat['icon'], ENT_QUOTES, 'UTF-8'); ?> fs-4 text-primary"></i>
                    </div>
                    <div>
                        <h6 class="fw-semibold mb-1"><?php echo htmlspecialchars($feat['title'], ENT_QUOTES, 'UTF-8'); ?></h6>
                        <p class="text-muted small mb-0"><?php echo htmlspecialchars($feat['desc'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<?php include __DIR__ . '/../includes/footer.php'; ?>


