<?php $pageTitle = 'Submit Report'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<main class="container py-4 flex-grow-1">
    <?php if (!empty($_GET['submitted'])): ?>
        <div class="alert alert-success"><i class="bi bi-check-circle me-2"></i>Report submitted successfully.</div>
    <?php endif; ?>

    <h2 class="h4 fw-bold mb-3">Submit Report</h2>
    <form method="POST" action="<?php echo htmlspecialchars(app_url('/tech/reports'), ENT_QUOTES, 'UTF-8'); ?>" class="card border-0 shadow-sm needs-validation" novalidate>
        <div class="card-body">
            <input type="hidden" name="action" value="submit_report">
            <div class="row g-3">
                <div class="col-md-6"><label class="form-label">Project</label><select class="form-select" name="project" required><option value="">Select project</option><option>PRJ-1001 - Makati Office VRF</option><option>PRJ-1003 - Warehouse Ducting</option></select></div>
                <div class="col-md-6"><label class="form-label">Report Type</label><select class="form-select" name="type" required><option value="">Select type</option><option>Daily Progress</option><option>Issue Report</option><option>Completion</option></select></div>
                <div class="col-12"><label class="form-label">Description</label><textarea class="form-control" rows="4" name="description" required></textarea></div>
                <div class="col-12"><label class="form-label">Materials Used</label><input class="form-control" name="materials" placeholder="Copper pipe, insulation"></div>
            </div>
        </div>
        <div class="card-footer bg-white d-flex justify-content-end"><button class="btn btn-primary" type="submit">Submit</button></div>
    </form>
</main>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
