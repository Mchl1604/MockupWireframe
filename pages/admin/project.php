<?php $pageTitle = 'Admin Project Details'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<?php
$id = $_GET['id'] ?? 'PRJ-1001';
?>
<main class="container py-4 flex-grow-1">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 fw-bold mb-0">Project Details</h2>
        <a href="<?php echo htmlspecialchars(app_url('/admin/projects'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-outline-secondary btn-sm">Back to Projects</a>
    </div>

    <div class="card border-0 shadow-sm mb-3">
        <div class="card-body row g-3">
            <div class="col-md-4"><small class="text-muted d-block">Project ID</small><strong><?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?></strong></div>
            <div class="col-md-4"><small class="text-muted d-block">Client</small><strong>ACME Holdings</strong></div>
            <div class="col-md-4"><small class="text-muted d-block">Status</small><span class="badge bg-primary">Ongoing</span></div>
            <div class="col-md-6"><small class="text-muted d-block">Service Type</small><strong>AC Installation</strong></div>
            <div class="col-md-6"><small class="text-muted d-block">Timeline</small><strong>Apr 10 - Apr 18</strong></div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-lg-6"><div class="card border-0 shadow-sm h-100"><div class="card-header bg-white"><strong>Assigned Team</strong></div><ul class="list-group list-group-flush"><li class="list-group-item">Engr. Mario Santos</li><li class="list-group-item">Tech. Carlo Reyes</li></ul></div></div>
        <div class="col-lg-6"><div class="card border-0 shadow-sm h-100"><div class="card-header bg-white"><strong>Latest Report</strong></div><div class="card-body"><p class="mb-1"><strong>Progress:</strong> 65%</p><p class="mb-0 text-muted small">Ducting and piping installation in progress. Electrical checks completed.</p></div></div></div>
    </div>
</main>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
