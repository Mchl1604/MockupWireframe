<?php $pageTitle = 'Services'; ?>
<?php include __DIR__ . '/../includes/head.php'; ?>
<body>
<?php include __DIR__ . '/../includes/navbar.php'; ?>
<?php $assetBase = ($baseUrl !== '' ? $baseUrl : '') . '/'; ?>

<section class="py-5" style="background:#f8fafc;">
    <div class="container">
        <div class="text-center mb-5">
            <p class="text-primary fw-bold small mb-2">OUR SERVICES</p>
            <h1 class="display-6 fw-bold mb-3">Complete HVAC Service Catalog</h1>
            <p class="text-muted mx-auto" style="max-width:720px;">
                Choose from installation, repair, cleaning, and ducting services for residential and commercial spaces.
            </p>
        </div>

        <?php
        $serviceCards = [
            [
                'title' => 'Aircon Installation',
                'desc' => 'Professional setup for split, window, and ceiling cassette systems with proper testing and balancing.',
                'file' => 'assets/img/29472573_1886287614717830_6583482397096935424_n.jpg',
                'alt' => 'Technician installing a ceiling cassette unit'
            ],
            [
                'title' => 'Aircon Repair',
                'desc' => 'Fast fault diagnosis and repair for leaks, electrical issues, insufficient cooling, and abnormal operation.',
                'file' => 'assets/img/485767805_9971022552910922_5179210964471853517_n.jpg',
                'alt' => 'Technician repairing a ceiling air conditioning unit'
            ],
            [
                'title' => 'Aircon Cleaning',
                'desc' => 'Deep cleaning and preventive maintenance to improve airflow, hygiene, and energy efficiency.',
                'file' => 'assets/img/37295105_2035281156485141_2584649359534587904_n.jpg',
                'alt' => 'Technicians cleaning ventilation and HVAC systems'
            ],
            [
                'title' => 'Ducting Fabrication',
                'desc' => 'Custom-built ducting sections prepared for your building layout and airflow requirements.',
                'file' => 'assets/img/68263097_2656966464316604_273684301172703232_n.jpg',
                'alt' => 'Team working on outdoor HVAC setup with ducting routes'
            ],
            [
                'title' => 'Ducting Installation',
                'desc' => 'On-site duct installation with secure supports, insulation checks, and system alignment.',
                'file' => 'assets/img/494017113_1263499305784703_6682180095149738356_n.jpg',
                'alt' => 'Outdoor unit with gauges and HVAC line installation'
            ],
            
        ];
        ?>

        <div class="row g-4">
            <?php foreach ($serviceCards as $svc): ?>
            <div class="col-md-6 col-xl-4">
                <div class="card h-100 border-0 shadow-sm">
                    <img
                        src="<?php echo htmlspecialchars($assetBase . $svc['file'], ENT_QUOTES, 'UTF-8'); ?>"
                        class="card-img-top"
                        alt="<?php echo htmlspecialchars($svc['alt'], ENT_QUOTES, 'UTF-8'); ?>"
                        loading="lazy"
                        style="height:220px;object-fit:cover;"
                        onerror="this.onerror=null;this.src='<?php echo htmlspecialchars($assetBase . 'assets/img/imageSample.png', ENT_QUOTES, 'UTF-8'); ?>';"
                    >
                    <div class="card-body p-4">
                        <h2 class="h5 fw-bold mb-2"><?php echo htmlspecialchars($svc['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
                        <p class="text-muted mb-0"><?php echo htmlspecialchars($svc['desc'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
