<?php $pageTitle = 'Technician Schedule'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>

<main class="container py-4 my-auto">
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

<?php include __DIR__ . '/../../includes/footer.php'; ?>
