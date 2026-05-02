<?php $pageTitle = 'Project Details'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>

<?php
$project = [
    'id' => $_GET['id'] ?? 'PRJ-1001',
    'name' => 'Aircon Installation - ACME Holdings',
    'status' => 'Ongoing',
    'timeline' => 'Apr 10 - Apr 18',
    'serviceType' => 'Aircon Installation',
];
$quotation = [
    'materialsCost' => 23000,
    'laborCost' => 12000,
    'totalCost' => 35000,
];
$isPendingSchedule = strcasecmp($project['status'], 'Pending Schedule') === 0;
$materials = [
    ['name' => 'Copper Pipe', 'qty' => 3, 'unit' => 'rolls'],
    ['name' => 'Insulation', 'qty' => 2, 'unit' => 'rolls'],
    ['name' => 'Circuit Breaker', 'qty' => 2, 'unit' => 'pcs'],
];
?>

<main class="container py-4 flex-grow-1">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 fw-bold mb-0">Project Details</h2>
        <div class="d-flex gap-2">
            <?php if ($isPendingSchedule): ?>
                <a href="#quotationSection" class="btn btn-primary btn-sm">View Quotation</a>
            <?php endif; ?>
            <a href="<?php echo htmlspecialchars(app_url('/client/projects'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-outline-secondary btn-sm">Back to Projects</a>
        </div>
    </div>

    <div class="card border-0 shadow-sm mb-3">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-4"><small class="text-muted d-block">Project ID</small><strong><?php echo htmlspecialchars($project['id'], ENT_QUOTES, 'UTF-8'); ?></strong></div>
                <div class="col-md-4"><small class="text-muted d-block">Service</small><strong><?php echo htmlspecialchars($project['serviceType'], ENT_QUOTES, 'UTF-8'); ?></strong></div>
                <div class="col-md-4"><small class="text-muted d-block">Status</small><span class="badge bg-primary"><?php echo htmlspecialchars($project['status'], ENT_QUOTES, 'UTF-8'); ?></span></div>
                <div class="col-md-6"><small class="text-muted d-block">Name</small><strong><?php echo htmlspecialchars($project['name'], ENT_QUOTES, 'UTF-8'); ?></strong></div>
                <div class="col-md-6"><small class="text-muted d-block">Timeline</small><strong><?php echo htmlspecialchars($project['timeline'], ENT_QUOTES, 'UTF-8'); ?></strong></div>
            </div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white"><strong>Assigned Technicians</strong></div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Engr. Mario Santos</li>
                    <li class="list-group-item">Tech. Carlo Reyes</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white"><strong>Materials</strong></div>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead><tr><th>Name</th><th>Qty</th><th>Unit</th></tr></thead>
                        <tbody>
                            <?php foreach ($materials as $item): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars((string) $item['qty'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($item['unit'], ENT_QUOTES, 'UTF-8'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php if ($isPendingSchedule): ?>
        <div class="card border-0 shadow-sm mt-3" id="quotationSection">
            <div class="card-header bg-white"><strong>Quotation</strong></div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <small class="text-muted d-block">Materials Cost</small>
                        <strong>₱<?php echo number_format((float) $quotation['materialsCost'], 2); ?></strong>
                    </div>
                    <div class="col-md-4">
                        <small class="text-muted d-block">Labor Cost</small>
                        <strong>₱<?php echo number_format((float) $quotation['laborCost'], 2); ?></strong>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <small class="text-muted d-block">Total Cost</small>
                        <strong class="text-primary">₱<?php echo number_format((float) $quotation['totalCost'], 2); ?></strong>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</main>

<?php include __DIR__ . '/../../includes/footer.php'; ?>


