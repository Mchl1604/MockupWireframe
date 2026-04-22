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
    ['id' => 'PRJ-1010', 'name' => 'Aircon Installation - Vertex Plaza', 'client' => 'Vertex Plaza', 'status' => 'Pending Contract Upload', 'service' => 'Aircon Installation'],
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
    'pending contract upload' => 'text-bg-warning',
    'for assessment' => 'text-bg-info',
    'drafting quotation' => 'text-bg-secondary',
    'pending schedule' => 'text-bg-dark',
    'scheduled' => 'text-bg-danger',
    'on hold' => 'text-bg-warning',
    'onhold' => 'text-bg-warning',
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
    'Vertex Plaza' => 'Commercial',
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
                $statusWithSchedule = ['for assessment', 'scheduled', 'in progress', 'ongoing', 'on hold', 'onhold', 'completed'];
                $projectTab = 'ongoing';
                if ($statusKey === 'for assessment') {
                    $projectTab = 'assessment';
                } elseif (in_array($statusKey, ['drafting quotation', 'pending quotation approval', 'pending contract upload', 'pending schedule'], true)) {
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
                $canToggleHold = !in_array($statusKey, ['completed', 'cancelled'], true);
                $isOnHold = in_array($statusKey, ['on hold', 'onhold'], true);
                $canSubmitCompletion = $statusKey === 'in progress';
                ?>
                <tr
                    data-project-tab="<?php echo htmlspecialchars($projectTab, ENT_QUOTES, 'UTF-8'); ?>"
                    data-status-key="<?php echo htmlspecialchars($statusKey, ENT_QUOTES, 'UTF-8'); ?>"
                    data-status-label="<?php echo htmlspecialchars($statusLabel, ENT_QUOTES, 'UTF-8'); ?>"
                    data-project-id="<?php echo htmlspecialchars($p['id'], ENT_QUOTES, 'UTF-8'); ?>"
                >
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
                            <a class="btn btn-sm btn-primary view-project-btn" title="View Details" aria-label="View Details" href="<?php echo htmlspecialchars(app_url('/admin/project', ['id' => $p['id'], 'status' => $p['status']]), ENT_QUOTES, 'UTF-8'); ?>"><i class="bi bi-eye"></i></a>
                            
                            <?php if ($canToggleHold): ?>
                            <button
                                type="button"
                                class="btn btn-sm <?php echo $isOnHold ? 'btn-success' : 'btn-warning'; ?> toggle-hold-btn"
                                title="<?php echo $isOnHold ? 'Resume Project' : 'Set On Hold'; ?>"
                                aria-label="<?php echo $isOnHold ? 'Resume Project' : 'Set On Hold'; ?>"
                            ><i class="bi <?php echo $isOnHold ? 'bi-play-circle' : 'bi-pause-circle'; ?>"></i></button>
                            <?php endif; ?>
                            <?php if ($canSubmitCompletion): ?>
                            <button type="button" class="btn btn-sm btn-success mark-completed-btn" title="Submit Completion Report" aria-label="Submit Completion Report" data-project-id="<?php echo htmlspecialchars($p['id'], ENT_QUOTES, 'UTF-8'); ?>" data-bs-toggle="modal" data-bs-target="#completionReportModal"><i class="bi bi-check2-circle"></i></button>
                            <?php endif; ?>
                            <button type="button" class="btn btn-sm btn-danger" title="Archive" aria-label="Archive"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
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
                <div class="mb-3">
                    <label for="completionReportDescription" class="form-label">Completion Report Description</label>
                    <textarea class="form-control" id="completionReportDescription" rows="5" placeholder="Describe the completed work, issues resolved, and final notes..."></textarea>
                </div>
                <div class="mb-0">
                    <label for="completionReportPhotos" class="form-label">Pictures</label>
                    <input class="form-control" type="file" id="completionReportPhotos" accept="image/*" multiple>
                    <div class="form-text">You can attach one or more pictures.</div>
                </div>
                <input type="hidden" id="completionProjectId" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="saveCompletionReportBtn">Save Completion Report</button>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const projectSearch = document.getElementById('projectSearch');
    const projectTabs = document.querySelectorAll('#projectTabs [data-project-tab]');
    const tableBody = document.getElementById('projectsTableBody');
    const rows = Array.from(document.querySelectorAll('#projectsTableBody tr'));
    const completionProjectId = document.getElementById('completionProjectId');
    const completionReportDescription = document.getElementById('completionReportDescription');
    const completionReportPhotos = document.getElementById('completionReportPhotos');
    const saveCompletionReportBtn = document.getElementById('saveCompletionReportBtn');
    const completionReportModalEl = document.getElementById('completionReportModal');
    let activeTab = 'all';
    const allOrder = {
        'for assessment': 1,
        'drafting quotation': 2,
        'pending quotation approval': 3,
        'quotation to be approved': 3,
        'pending contract upload': 4,
        'pending schedule': 5,
        'scheduled': 6,
        'in progress': 7,
        'ongoing': 7,
        'on hold': 8,
        'onhold': 8,
        'completed': 9,
        'cancelled': 10,
    };
    const preparingOrder = {
        'drafting quotation': 1,
        'pending quotation approval': 2,
        'pending contract upload': 3,
        'pending schedule': 4,
    };
    const ongoingOrder = {
        'scheduled': 4,
        'in progress': 5,
        'ongoing': 5,
        'on hold': 6,
        'onhold': 6,
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

    if (tableBody) {
        tableBody.addEventListener('click', function (event) {
            const completionButton = event.target.closest('.mark-completed-btn');
            if (completionButton) {
                if (completionProjectId) {
                    completionProjectId.value = completionButton.getAttribute('data-project-id') || '';
                }
                return;
            }

            const toggleButton = event.target.closest('.toggle-hold-btn');
            if (!toggleButton) {
                return;
            }

            const row = toggleButton.closest('tr');
            if (!row) {
                return;
            }

            const currentStatusKey = getRowStatusKey(row);
            const isOnHold = currentStatusKey === 'on hold' || currentStatusKey === 'onhold';
            const currentStatusLabel = row.getAttribute('data-status-label') || '';
            let nextStatusKey = 'on hold';
            let nextStatusLabel = 'On Hold';

            if (isOnHold) {
                const previousStatusKey = row.getAttribute('data-previous-status-key');
                const previousStatusLabel = row.getAttribute('data-previous-status-label');
                if (!previousStatusKey || !previousStatusLabel) {
                    return;
                }
                nextStatusKey = previousStatusKey;
                nextStatusLabel = previousStatusLabel;
            } else {
                row.setAttribute('data-previous-status-key', currentStatusKey);
                row.setAttribute('data-previous-status-label', currentStatusLabel);
            }

            row.setAttribute('data-status-key', nextStatusKey);
            row.setAttribute('data-status-label', nextStatusLabel);

            const statusBadge = row.querySelector('td:nth-child(5) .badge');
            if (statusBadge) {
                const statusClassMap = {
                    'ongoing': 'text-bg-primary',
                    'in progress': 'text-bg-primary',
                    'for assessment': 'text-bg-info',
                    'drafting quotation': 'text-bg-secondary',
                    'pending quotation approval': 'text-bg-warning',
                    'quotation to be approved': 'text-bg-warning',
                    'pending contract upload': 'text-bg-warning',
                    'pending schedule': 'text-bg-dark',
                    'scheduled': 'text-bg-danger',
                    'on hold': 'text-bg-warning',
                    'onhold': 'text-bg-warning',
                    'completed': 'text-bg-success',
                    'cancelled': 'text-bg-danger',
                };
                statusBadge.className = 'badge rounded-pill ' + (statusClassMap[nextStatusKey] || 'text-bg-light');
                statusBadge.textContent = nextStatusLabel;
            }

            toggleButton.className = 'btn btn-sm ' + (nextStatusKey === 'on hold' ? 'btn-success' : 'btn-warning') + ' toggle-hold-btn';
            toggleButton.title = nextStatusKey === 'on hold' ? 'Resume Project' : 'Set On Hold';
            toggleButton.setAttribute('aria-label', nextStatusKey === 'on hold' ? 'Resume Project' : 'Set On Hold');
            toggleButton.innerHTML = '<i class="bi ' + (nextStatusKey === 'on hold' ? 'bi-play-circle' : 'bi-pause-circle') + '"></i>';

            const viewDetailsLink = row.querySelector('.view-project-btn');
            if (viewDetailsLink) {
                const parsedUrl = new URL(viewDetailsLink.href, window.location.origin);
                parsedUrl.searchParams.set('status', nextStatusLabel);
                viewDetailsLink.href = parsedUrl.pathname + parsedUrl.search;
            }

            applyProjectFilters();
        });
    }

    if (saveCompletionReportBtn) {
        saveCompletionReportBtn.addEventListener('click', function () {
            const selectedProjectId = completionProjectId ? completionProjectId.value : '';
            if (!selectedProjectId) {
                return;
            }

            const matchedRow = rows.find(function (row) {
                return row.getAttribute('data-project-id') === selectedProjectId;
            });
            if (!matchedRow) {
                return;
            }

            matchedRow.setAttribute('data-status-key', 'completed');
            matchedRow.setAttribute('data-status-label', 'Completed');
            matchedRow.setAttribute('data-project-tab', 'completed');

            const statusBadge = matchedRow.querySelector('td:nth-child(5) .badge');
            if (statusBadge) {
                statusBadge.className = 'badge rounded-pill text-bg-success';
                statusBadge.textContent = 'Completed';
            }

            const holdButton = matchedRow.querySelector('.toggle-hold-btn');
            if (holdButton) {
                holdButton.remove();
            }

            const completeButton = matchedRow.querySelector('.mark-completed-btn');
            if (completeButton) {
                completeButton.remove();
            }

            const viewDetailsLink = matchedRow.querySelector('.view-project-btn');
            if (viewDetailsLink) {
                const parsedUrl = new URL(viewDetailsLink.href, window.location.origin);
                parsedUrl.searchParams.set('status', 'Completed');
                viewDetailsLink.href = parsedUrl.pathname + parsedUrl.search;
            }

            if (completionReportDescription) {
                completionReportDescription.value = '';
            }
            if (completionReportPhotos) {
                completionReportPhotos.value = '';
            }
            if (completionProjectId) {
                completionProjectId.value = '';
            }

            if (completionReportModalEl && window.bootstrap && window.bootstrap.Modal) {
                window.bootstrap.Modal.getOrCreateInstance(completionReportModalEl).hide();
            }

            activeTab = 'completed';
            const completedTab = document.querySelector('#projectTabs [data-project-tab="completed"]');
            projectTabs.forEach(function (btn) {
                btn.classList.toggle('active', btn === completedTab);
            });

            applyProjectFilters();
        });
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


