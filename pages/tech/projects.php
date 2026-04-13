<?php $pageTitle = 'My Projects'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<?php
$projects = [
    ['id' => 'PRJ-1001', 'name' => 'Aircon Installation - ACME Holdings', 'status' => 'For Assessment'],
    ['id' => 'PRJ-1003', 'name' => 'Ductwork Installation - Metro Storage', 'status' => 'Assigned'],
    ['id' => 'PRJ-1004', 'name' => 'Split-Type AC Unit Installation - Northline Foods', 'status' => 'Assigned'],
    ['id' => 'PRJ-1005', 'name' => 'Ventilation System Retrofit - BluePeak IT', 'status' => 'Assigned'],
];

$statusClassMap = [
    'ongoing' => 'text-bg-primary',
    'scheduled' => 'text-bg-info',
    'completed' => 'text-bg-success',
    'pending' => 'text-bg-danger',
    'for assessment' => 'text-bg-warning',
    'drafting quotation' => 'text-bg-secondary',
    'quotation to be approved' => 'text-bg-warning',
    'in progress' => 'text-bg-success',
    'assigned' => 'text-bg-primary',
];
?>
<main class="container py-4 flex-grow-1">
    <h2 class="h4 fw-bold mb-3">My Projects</h2>
    <div class="table-responsive card border-0 shadow-sm">
        <table class="table table-hover mb-0"><thead class="table-light"><tr><th>ID</th><th>Project</th><th>Status</th><th>Action</th></tr></thead><tbody>
            <?php foreach ($projects as $p): ?>
                <tr>
                    <td><?php echo htmlspecialchars($p['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($p['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <?php $statusKey = strtolower(trim($p['status'])); ?>
                        <span class="badge rounded-pill <?php echo htmlspecialchars($statusClassMap[$statusKey] ?? 'text-bg-light', ENT_QUOTES, 'UTF-8'); ?>">
                            <?php echo htmlspecialchars($p['status'], ENT_QUOTES, 'UTF-8'); ?>
                        </span>
                    </td>
                    <td><a class="btn btn-sm btn-outline-primary" title="View Project Details" href="<?php echo htmlspecialchars(app_url('/tech/project', ['id' => $p['id'], 'status' => $p['status']]), ENT_QUOTES, 'UTF-8'); ?>">View Details</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody></table>
    </div>
</main>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
