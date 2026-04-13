<?php $pageTitle = 'Admin Projects'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<?php
$projects = [
    ['id' => 'PRJ-1001', 'name' => 'Makati Office Aircon Installation', 'client' => 'ACME Holdings', 'status' => 'For Assessment', 'service' => 'Aircon Installation'],
    ['id' => 'PRJ-1002', 'name' => 'Condo AC Unit Repair', 'client' => 'J. Dela Cruz', 'status' => 'Completed', 'service' => 'AC Unit Repair'],
    ['id' => 'PRJ-1003', 'name' => 'Warehouse Ductwork Installation', 'client' => 'Metro Storage', 'status' => 'Quotation to be approved', 'service' => 'Ductwork Installation'],
    ['id' => 'PRJ-1004', 'name' => 'Pasig Split-Type AC Upgrade', 'client' => 'Northline Foods', 'status' => 'For Assessment', 'service' => 'Split-Type AC Unit Installation'],
    ['id' => 'PRJ-1005', 'name' => 'Server Room Ventilation Retrofit', 'client' => 'BluePeak IT', 'status' => 'Drafting Quotation', 'service' => 'Ventilation System Retrofit'],
    ['id' => 'PRJ-1006', 'name' => 'Grand Arc Tower Lobby Ventilation', 'client' => 'Grand Arc Tower', 'status' => 'Pending', 'service' => 'Ventilation System Inspection'],
];

$statusClassMap = [
    'ongoing' => 'text-bg-primary',
    'completed' => 'text-bg-success',
    'quotation to be approved' => 'text-bg-warning',
    'for assessment' => 'text-bg-info',
    'drafting quotation' => 'text-bg-secondary',
    'pending' => 'text-bg-danger',
];
?>
<main class="container py-4 flex-grow-1">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <h2 class="h4 fw-bold mb-0">Projects</h2>
        <input type="search" id="projectSearch" class="form-control form-control-sm" placeholder="Search projects..." style="max-width: 280px;">
    </div>
    <div class="table-responsive card border-0 shadow-sm">
        <table class="table table-hover mb-0">
            <thead class="table-light"><tr><th>ID</th><th>Name</th><th>Client</th><th>Status</th><th>Action</th></tr></thead>
            <tbody id="projectsTableBody">
            <?php foreach ($projects as $p): ?>
                <tr>
                    <td><?php echo htmlspecialchars($p['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($p['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($p['client'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <?php $statusKey = strtolower(trim($p['status'])); ?>
                        <span class="badge rounded-pill <?php echo htmlspecialchars($statusClassMap[$statusKey] ?? 'text-bg-light', ENT_QUOTES, 'UTF-8'); ?>">
                            <?php echo htmlspecialchars($p['status'], ENT_QUOTES, 'UTF-8'); ?>
                        </span>
                    </td>
                    <td><a class="btn btn-sm btn-outline-primary" href="<?php echo htmlspecialchars(app_url('/admin/project', ['id' => $p['id'], 'status' => $p['status']]), ENT_QUOTES, 'UTF-8'); ?>">View Details</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const projectSearch = document.getElementById('projectSearch');
    if (projectSearch) {
        projectSearch.addEventListener('input', function () {
            const query = this.value.toLowerCase().trim();
            document.querySelectorAll('#projectsTableBody tr').forEach(function (row) {
                row.style.display = row.textContent.toLowerCase().includes(query) ? '' : 'none';
            });
        });
    }
});
</script>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
