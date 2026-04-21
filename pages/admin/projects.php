<?php $pageTitle = 'Admin Projects'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<?php
$projects = [
    ['id' => 'PRJ-1001', 'name' => 'Aircon Installation - ACME Holdings', 'client' => 'ACME Holdings', 'status' => 'For Assessment', 'service' => 'Aircon Installation'],
    ['id' => 'PRJ-1002', 'name' => 'Aircon Repair - J. Dela Cruz', 'client' => 'J. Dela Cruz', 'status' => 'Completed', 'service' => 'Aircon Repair'],
    ['id' => 'PRJ-1003', 'name' => 'Ducting Installation - Metro Storage', 'client' => 'Metro Storage', 'status' => 'Pending Quotation Approval', 'service' => 'Ducting Installation'],
    ['id' => 'PRJ-1004', 'name' => 'Aircon Installation - Northline Foods', 'client' => 'Northline Foods', 'status' => 'In progress', 'service' => 'Aircon Installation'],
    ['id' => 'PRJ-1005', 'name' => 'Ducting Fabrication - BluePeak IT', 'client' => 'BluePeak IT', 'status' => 'Drafting Quotation', 'service' => 'Ducting Fabrication'],
    ['id' => 'PRJ-1007', 'name' => 'Ducting Installation - Riverside Mall', 'client' => 'Riverside Mall', 'status' => 'Pending Schedule', 'service' => 'Ducting Installation'],
    ['id' => 'PRJ-1006', 'name' => 'Ducting Installation - Grand Arc Tower', 'client' => 'Grand Arc Tower', 'status' => 'Scheduled', 'service' => 'Ducting Installation'],
    ['id' => 'PRJ-1008', 'name' => 'Aircon Repair - Hillcrest Suites', 'client' => 'Hillcrest Suites', 'status' => 'Cancelled', 'service' => 'Aircon Repair', 'cancellationReason' => 'Client rejected quotation due to budget constraints.'],
    ['id' => 'PRJ-1009', 'name' => 'Ducting Fabrication - Westline Depot', 'client' => 'Westline Depot', 'status' => 'Cancelled', 'service' => 'Ducting Fabrication', 'cancellationReason' => 'Admin cancelled project due to incomplete permit requirements.'],
];

$statusClassMap = [
    'ongoing' => 'text-bg-primary',
    'in progress' => 'text-bg-primary',
    'completed' => 'text-bg-success',
    'pending quotation approval' => 'text-bg-warning',
    'quotation to be approved' => 'text-bg-warning',
    'for assessment' => 'text-bg-info',
    'drafting quotation' => 'text-bg-secondary',
    'pending schedule' => 'text-bg-dark',
    'scheduled' => 'text-bg-danger',
    'cancelled' => 'text-bg-danger',
];

$projectScheduleMap = [
    'PRJ-1001' => 'Apr 21, 2026',
    'PRJ-1002' => 'Apr 05 - Apr 10, 2026',
    'PRJ-1004' => 'Apr 14 - Apr 22, 2026',
    'PRJ-1006' => 'Apr 12 - Apr 14, 2026',
    'PRJ-1008' => 'Cancelled',
    'PRJ-1009' => 'Cancelled',
];

$clientTypeMap = [
    'ACME Holdings' => 'Commercial',
    'J. Dela Cruz' => 'Residential',
    'Metro Storage' => 'Commercial',
    'Northline Foods' => 'Commercial',
    'BluePeak IT' => 'Commercial',
    'Riverside Mall' => 'Commercial',
    'Grand Arc Tower' => 'Commercial',
    'Hillcrest Suites' => 'Commercial',
    'Westline Depot' => 'Commercial',
];
?>
<main class="container py-4 flex-grow-1">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <h2 class="h4 fw-bold mb-0">Projects</h2>
        <div class="d-flex flex-nowrap align-items-center gap-2 ms-auto">
            
            <input type="search" id="projectSearch" class="form-control form-control-sm" placeholder="Search projects..." style="width: 280px; max-width: 100%;">
            <a class="btn btn-outline-secondary btn-sm" href="<?php echo htmlspecialchars(app_url('/admin/projects', ['view' => 'archives']), ENT_QUOTES, 'UTF-8'); ?>">View Archives</a>
        </div>
    </div>
    <ul class="nav nav-tabs mb-3" id="projectTabs">
        <li class="nav-item">
            <button type="button" class="nav-link active" data-project-tab="all">All</button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link" data-project-tab="assessment">Assessment</button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link" data-project-tab="preparing">Preparing</button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link" data-project-tab="ongoing">Ongoing</button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link" data-project-tab="completed">Completed</button>
        </li>
        <li class="nav-item">
            <button type="button" class="nav-link" data-project-tab="cancelled">Cancelled</button>
        </li>
    </ul>
    <div class="table-responsive card border-0 shadow-sm">
        <table class="table table-hover mb-0">
            <thead class="table-light"><tr><th>ID</th><th>Service Type</th><th>Client</th><th>Client Type</th><th>Status</th><th class="project-schedule-col">Schedule</th><th>Action</th></tr></thead>
            <tbody id="projectsTableBody">
            <?php foreach ($projects as $p): ?>
                <?php
                $statusKey = strtolower(trim($p['status']));
                $statusWithSchedule = ['for assessment', 'scheduled', 'in progress', 'ongoing', 'completed'];
                $projectTab = 'ongoing';
                if ($statusKey === 'for assessment') {
                    $projectTab = 'assessment';
                } elseif (in_array($statusKey, ['drafting quotation', 'pending quotation approval', 'pending schedule'], true)) {
                    $projectTab = 'preparing';
                } elseif ($statusKey === 'completed') {
                    $projectTab = 'completed';
                } elseif ($statusKey === 'cancelled') {
                    $projectTab = 'cancelled';
                }
                $statusLabel = $statusKey === 'ongoing' ? 'In progress' : $p['status'];
                $scheduleLabel = in_array($statusKey, $statusWithSchedule, true)
                    ? ($projectScheduleMap[$p['id']] ?? 'TBD')
                    : ($statusKey === 'cancelled' ? 'Cancelled' : '');
                $clientType = $clientTypeMap[$p['client']] ?? 'Unknown';
                ?>
                <tr data-project-tab="<?php echo htmlspecialchars($projectTab, ENT_QUOTES, 'UTF-8'); ?>" data-status-key="<?php echo htmlspecialchars($statusKey, ENT_QUOTES, 'UTF-8'); ?>">
                    <td><?php echo htmlspecialchars($p['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($p['service'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($p['client'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($clientType, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <span class="badge rounded-pill <?php echo htmlspecialchars($statusClassMap[$statusKey] ?? 'text-bg-light', ENT_QUOTES, 'UTF-8'); ?>">
                            <?php echo htmlspecialchars($statusLabel, ENT_QUOTES, 'UTF-8'); ?>
                        </span>
                    </td>
                    <td class="project-schedule-col"><?php echo htmlspecialchars($scheduleLabel, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <div class="d-flex flex-wrap gap-1">
                            <a class="btn btn-sm btn-outline-primary" title="View Details" aria-label="View Details" href="<?php echo htmlspecialchars(app_url('/admin/project', ['id' => $p['id'], 'status' => $p['status']]), ENT_QUOTES, 'UTF-8'); ?>"><i class="bi bi-eye"></i></a>
                            <button type="button" class="btn btn-sm btn-outline-danger" title="Archive" aria-label="Archive"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const projectSearch = document.getElementById('projectSearch');
    const projectTabs = document.querySelectorAll('#projectTabs [data-project-tab]');
    const tableBody = document.getElementById('projectsTableBody');
    const rows = Array.from(document.querySelectorAll('#projectsTableBody tr'));
    let activeTab = 'all';
    const allOrder = {
        'for assessment': 1,
        'drafting quotation': 2,
        'pending quotation approval': 3,
        'quotation to be approved': 3,
        'pending schedule': 4,
        'scheduled': 5,
        'in progress': 6,
        'ongoing': 6,
        'completed': 7,
        'cancelled': 8,
    };
    const preparingOrder = {
        'drafting quotation': 1,
        'pending quotation approval': 2,
        'pending schedule': 3,
    };
    const ongoingOrder = {
        'scheduled': 4,
        'in progress': 5,
        'ongoing': 5,
    };
    const cancelledOrder = {
        'cancelled': 1,
    };

    rows.forEach(function (row, index) {
        row.dataset.originalIndex = String(index);
    });

    function getRowTab(row) {
        return row.getAttribute('data-project-tab') || 'assessment';
    }

    function getRowStatusKey(row) {
        return row.getAttribute('data-status-key') || '';
    }

    function applyProjectFilters() {
        const query = projectSearch ? projectSearch.value.toLowerCase().trim() : '';
        const hideScheduleColumn = activeTab === 'preparing' || activeTab === 'cancelled';

        document.querySelectorAll('.project-schedule-col').forEach(function (cell) {
            cell.style.display = hideScheduleColumn ? 'none' : '';
        });

        rows.forEach(function (row) {
            const rowTab = getRowTab(row);
            const matchesTab = activeTab === 'all' || rowTab === activeTab;
            const matchesSearch = row.textContent.toLowerCase().includes(query);
            row.style.display = matchesTab && matchesSearch ? '' : 'none';
        });

        const sortedRows = rows.slice().sort(function (a, b) {
            if (activeTab === 'all') {
                const aOrder = allOrder[getRowStatusKey(a)] ?? 999;
                const bOrder = allOrder[getRowStatusKey(b)] ?? 999;
                if (aOrder !== bOrder) {
                    return aOrder - bOrder;
                }
                return Number(a.dataset.originalIndex) - Number(b.dataset.originalIndex);
            }

            if (activeTab !== 'ongoing' && activeTab !== 'preparing' && activeTab !== 'cancelled') {
                return Number(a.dataset.originalIndex) - Number(b.dataset.originalIndex);
            }

            if (activeTab === 'preparing') {
                const aOrder = preparingOrder[getRowStatusKey(a)] ?? 999;
                const bOrder = preparingOrder[getRowStatusKey(b)] ?? 999;
                if (aOrder !== bOrder) {
                    return aOrder - bOrder;
                }
                return Number(a.dataset.originalIndex) - Number(b.dataset.originalIndex);
            }

            if (activeTab === 'cancelled') {
                const aOrder = cancelledOrder[getRowStatusKey(a)] ?? 999;
                const bOrder = cancelledOrder[getRowStatusKey(b)] ?? 999;
                if (aOrder !== bOrder) {
                    return aOrder - bOrder;
                }
                return Number(a.dataset.originalIndex) - Number(b.dataset.originalIndex);
            }

            const aOrder = ongoingOrder[getRowStatusKey(a)] ?? 999;
            const bOrder = ongoingOrder[getRowStatusKey(b)] ?? 999;
            if (aOrder !== bOrder) {
                return aOrder - bOrder;
            }

            return Number(a.dataset.originalIndex) - Number(b.dataset.originalIndex);
        });

        sortedRows.forEach(function (row) {
            if (tableBody) {
                tableBody.appendChild(row);
            }
        });
    }

    if (projectSearch) {
        projectSearch.addEventListener('input', applyProjectFilters);
    }

    projectTabs.forEach(function (tabButton) {
        tabButton.addEventListener('click', function () {
            activeTab = tabButton.getAttribute('data-project-tab') || 'all';
            projectTabs.forEach(function (btn) {
                btn.classList.toggle('active', btn === tabButton);
            });
            applyProjectFilters();
        });
    });

    applyProjectFilters();
});
</script>
<?php include __DIR__ . '/../../includes/footer.php'; ?>


