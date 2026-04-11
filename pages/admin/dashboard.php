<?php $pageTitle = 'Admin Dashboard'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>

<main class="container py-4 my-auto">
    <h2 class="h4 fw-bold mb-3">Dashboard</h2>
    <div class="row g-3">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <p class="text-muted mb-1">Projects</p>
                    <h3 class="mb-0">3</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <p class="text-muted mb-1">Pending Approval</p>
                    <h3 class="mb-0">1</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <p class="text-muted mb-1">Active Technicians</p>
                    <h3 class="mb-0">6</h3>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
