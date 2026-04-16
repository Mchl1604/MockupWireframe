<?php $pageTitle = 'My Projects'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<?php
$projects = [
    ['id' => 'PRJ-1001', 'name' => 'Aircon Installation - ACME Holdings', 'status' => 'For Assessment'],
    ['id' => 'PRJ-1003', 'name' => 'Ductwork Installation - Metro Storage', 'status' => 'Ongoing'],
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
                    <td>
                        <a class="btn btn-sm btn-outline-primary" title="View Details" aria-label="View Details" href="<?php echo htmlspecialchars(app_url('/tech/project', ['id' => $p['id'], 'status' => $p['status']]), ENT_QUOTES, 'UTF-8'); ?>"><i class="bi bi-eye"></i></a>
                        <?php if ($statusKey === 'ongoing'): ?>
                            <button
                                type="button"
                                class="btn btn-sm btn-success ms-2"
                                data-bs-toggle="modal"
                                data-bs-target="#completionReportModal"
                            >
                                Mark as Completed
                            </button>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody></table>
    </div>
</main>

<div class="modal fade" id="completionReportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header">
                <h5 class="modal-title">Completion Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info small mb-3">
                    Write the completion details for the selected ongoing project. This form is UI only.
                </div>
                <div class="mb-3">
                    <label for="completionReportDescription" class="form-label">Completion Report Description</label>
                    <textarea class="form-control" id="completionReportDescription" rows="5" placeholder="Describe the completed work, issues resolved, and final notes..."></textarea>
                </div>
                <div class="mb-0">
                    <label for="completionReportPhotos" class="form-label">Pictures</label>
                    <input class="form-control" type="file" id="completionReportPhotos" accept="image/*" multiple>
                    <div class="form-text">You can attach one or more pictures.</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success">Save Completion Report</button>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
