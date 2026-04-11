<?php $pageTitle = 'Attendance'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<main class="container py-4 flex-grow-1">
    <div class="d-flex justify-content-between align-items-center mb-3"><h2 class="h4 fw-bold mb-0">Attendance</h2><span class="badge text-bg-primary" id="liveClock"></span></div>

    <div class="card border-0 shadow-sm mb-3">
        <div class="card-body d-flex gap-2 flex-wrap">
            <button class="btn btn-success" type="button">Time In</button>
            <button class="btn btn-outline-danger" type="button">Time Out</button>
        </div>
    </div>

    <div class="table-responsive card border-0 shadow-sm">
        <table class="table table-hover mb-0">
            <thead class="table-light"><tr><th>Date</th><th>Time In</th><th>Time Out</th><th>Hours</th></tr></thead>
            <tbody>
                <tr><td>Apr 10, 2026</td><td>08:00 AM</td><td>05:00 PM</td><td>8.0</td></tr>
                <tr><td>Apr 11, 2026</td><td>08:10 AM</td><td>05:06 PM</td><td>7.9</td></tr>
                <tr><td>Apr 12, 2026</td><td>07:56 AM</td><td>05:15 PM</td><td>8.2</td></tr>
            </tbody>
        </table>
    </div>
</main>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
