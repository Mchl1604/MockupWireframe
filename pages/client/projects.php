<?php $pageTitle = 'My Projects'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>

<main class="container py-4 flex-grow-1">
    <h2 class="h4 fw-bold mb-3">My Services</h2>

    <?php
    $projects = [
        [
            'id' => 'COL-2026-0001',
            'name' => 'Aircon Installation - ACME Holdings',
            'serviceType' => 'Aircon Installation',
            'status' => 'In Progress',
            'timeline' => 'Apr 10, 2026 - Apr 18, 2026',
            'address' => 'Makati Business District',
            'description' => 'Installation of aircon units for multi-floor office spaces.',
            'quotation' => [
                'materials' => [
                    ['name' => 'Copper Pipe', 'qty' => 3, 'unit' => 'roll', 'cost' => 4500],
                    ['name' => 'Rubber Insulation', 'qty' => 4, 'unit' => 'roll', 'cost' => 1800],
                    ['name' => 'Circuit Breaker', 'qty' => 2, 'unit' => 'pc', 'cost' => 1200],
                ],
                'materialsCost' => 7500,
                'laborCost' => 6000,
                'totalCost' => 13500,
            ],
            'progressReports' => [
                [
                    'date' => 'Apr 11, 2026',
                    'technician' => 'Tech. Carlo Reyes',
                    'report' => 'Indoor units mounted on levels 2 and 3. Refrigerant lines routed for first zone.',
                ],
                [
                    'date' => 'Apr 12, 2026',
                    'technician' => 'Engr. Mario Santos',
                    'report' => 'Pressure testing completed for installed lines. No leakage observed.',
                ],
            ],
        ],
        [
            'id' => 'COL-2026-0002',
            'name' => 'Aircon Repair - J. Dela Cruz',
            'serviceType' => 'Aircon Repair',
            'status' => 'Completed',
            'timeline' => 'Apr 1, 2026 - Apr 2, 2026',
            'address' => 'Taguig City Residential Tower',
            'description' => 'Troubleshooting and repair of split-type condenser and indoor unit.',
            'quotation' => [
                'materials' => [
                    ['name' => 'Dual Capacitor', 'qty' => 1, 'unit' => 'pc', 'cost' => 950],
                    ['name' => 'Contact Cleaner', 'qty' => 1, 'unit' => 'can', 'cost' => 320],
                ],
                'materialsCost' => 1270,
                'laborCost' => 2500,
                'totalCost' => 3770,
            ],
            'progressReports' => [
                [
                    'date' => 'Apr 1, 2026',
                    'technician' => 'Tech. Lea Cruz',
                    'report' => 'Detected faulty capacitor and loose terminal. Replaced capacitor and secured wiring.',
                ],
                [
                    'date' => 'Apr 2, 2026',
                    'technician' => 'Tech. Lea Cruz',
                    'report' => 'Unit tested under full load for 45 minutes. Cooling restored and stable.',
                ],
            ],
        ],
        [
            'id' => 'COL-2026-0003',
            'name' => 'Ducting Installation - Metro Storage',
            'serviceType' => 'Ducting Installation',
            'status' => 'Awaiting Quotation Approval',
            'timeline' => 'Apr 20, 2026 - Apr 27, 2026',
            'address' => 'Caloocan Industrial Park',
            'description' => 'Fabrication and installation of rectangular ducts for ventilation.',
            'quotation' => [
                'materials' => [
                    ['name' => 'GI Sheet', 'qty' => 18, 'unit' => 'sheet', 'cost' => 16200],
                    ['name' => 'Angle Bar', 'qty' => 16, 'unit' => 'pc', 'cost' => 4800],
                    ['name' => 'Duct Sealant', 'qty' => 8, 'unit' => 'tube', 'cost' => 2000],
                ],
                'materialsCost' => 23000,
                'laborCost' => 12000,
                'totalCost' => 35000,
            ],
            'progressReports' => [],
        ],
        [
            'id' => 'COL-2026-0007',
            'name' => 'Aircon Installation - Greenfield Offices',
            'serviceType' => 'Aircon Installation',
            'status' => 'Pending Schedule',
            'timeline' => '',
            'address' => 'Bonifacio Global City',
            'description' => 'Installation of aircon units for new office branch expansion.',
            'quotation' => [
                'materials' => [
                    ['name' => 'Copper Pipe', 'qty' => 4, 'unit' => 'roll', 'cost' => 6000],
                    ['name' => 'Rubber Insulation', 'qty' => 4, 'unit' => 'roll', 'cost' => 2200],
                    ['name' => 'Circuit Breaker', 'qty' => 3, 'unit' => 'pc', 'cost' => 1800],
                ],
                'materialsCost' => 10000,
                'laborCost' => 8500,
                'totalCost' => 18500,
            ],
            'progressReports' => [],
        ],
        [
            'id' => 'COL-2026-0008',
            'name' => 'Ducting Installation - Zenith Tower',
            'serviceType' => 'Ducting Installation',
            'status' => 'In Progress',
            'timeline' => 'May 6, 2026 - May 14, 2026',
            'address' => 'Mandaluyong Business Park',
            'description' => 'Ducting retrofit for improved ventilation efficiency and air quality control.',
            'quotation' => [],
            'progressReports' => [
                [
                    'date' => 'May 7, 2026',
                    'technician' => 'Tech. Paolo Mendoza',
                    'report' => 'Main trunk line supports were installed and alignment checks passed on floors 8 to 10.',
                ],
                [
                    'date' => 'May 9, 2026',
                    'technician' => 'Tech. Nina Velasco',
                    'report' => 'Branch duct sections connected and initial airflow balancing started for east wing zones.',
                ],
            ],
        ],
        [
            'id' => 'COL-2026-0004',
            'name' => 'Aircon Repair - Northline Foods',
            'serviceType' => 'Aircon Repair',
            'status' => 'For Assessment',
            'timeline' => 'April 15, 2026',
            'address' => 'Quezon City Mall Complex',
            'description' => 'Repair and maintenance of multiple air-conditioning units in the mall complex.',
            'quotation' => [],
            'progressReports' => [],
        ],
        [
            'id' => 'COL-2026-0005',
            'name' => 'Ducting Installation - BluePeak IT',
            'serviceType' => 'Ducting Installation',
            'status' => 'Pending',
            'timeline' => 'Apr 22, 2026 - Apr 30, 2026',
            'address' => 'Pasay Hotel District',
            'description' => 'Installation of ducting system for improved ventilation coverage.',
            'quotation' => [
                'materials' => [
                    ['name' => 'GI Sheet', 'qty' => 10, 'unit' => 'sheet', 'cost' => 9000],
                    ['name' => 'Angle Bar', 'qty' => 12, 'unit' => 'pc', 'cost' => 3600],
                    ['name' => 'Duct Sealant', 'qty' => 4, 'unit' => 'tube', 'cost' => 1000],
                ],
                'materialsCost' => 13600,
                'laborCost' => 8000,
                'totalCost' => 21600,
            ],
            'progressReports' => [],
        ],
        [
            'id' => 'COL-2026-0006',
            'name' => 'Aircon Installation - Grand Arc Tower',
            'serviceType' => 'Aircon Installation',
            'status' => 'For Approval',
            'timeline' => 'Apr 24, 2026 - Apr 30, 2026',
            'address' => 'Ortigas Center',
            'description' => 'Replacement of aircon system for office building in Ortigas Center.',
            'quotation' => [],
            'progressReports' => [],
        ],
        [
            'id' => 'COL-2026-0009',
            'name' => 'Aircon Repair - Hillcrest Suites',
            'serviceType' => 'Aircon Repair',
            'status' => 'Cancelled',
            'timeline' => 'Apr 8, 2026',
            'address' => 'Muntinlupa City',
            'description' => 'Repair and diagnosis of air-conditioning system at hotel facility.',
            'cancellationReason' => 'Rejected the quotation.',
            'quotation' => [],
            'progressReports' => [],
        ],
    ];

    $statusOrder = [
        'For Approval' => 1,
        'For Assessment' => 2,
        'Awaiting Quotation Approval' => 3,
        'Pending Schedule' => 4,
        'Pending' => 5,
        'In Progress' => 6,
        'Completed' => 7,
        'Quotation Rejected' => 8,
    ];

    usort($projects, function ($left, $right) use ($statusOrder) {
        $leftRank = $statusOrder[$left['status']] ?? 999;
        $rightRank = $statusOrder[$right['status']] ?? 999;

        if ($leftRank === $rightRank) {
            return strcmp($left['name'], $right['name']);
        }

        return $leftRank <=> $rightRank;
    });

    $requestStatuses = [
        'For Approval',
    ];

    $requestProjects = array_values(array_filter($projects, function ($project) use ($requestStatuses) {
        return in_array($project['status'], $requestStatuses, true);
    }));

    $ongoingStatuses = [
        'In Progress',
        'For Assessment',
        'Awaiting Quotation Approval',
        'Pending Schedule',
        'Pending',
    ];

    $ongoingProjects = array_values(array_filter($projects, function ($project) use ($ongoingStatuses) {
        return in_array($project['status'], $ongoingStatuses, true);
    }));

    $completedProjects = array_values(array_filter($projects, function ($project) {
        return $project['status'] === 'Completed';
    }));

    $cancelledProjects = array_values(array_filter($projects, function ($project) {
        return $project['status'] === 'Cancelled';
    }));

    $badgeClassForStatus = function ($status) {
        if ($status === 'In Progress') {
            return 'bg-primary';
        }
        if ($status === 'Completed') {
            return 'bg-success';
        }
        if ($status === 'Quotation Rejected' || $status === 'Cancelled') {
            return 'bg-danger';
        }
        if ($status === 'For Assessment') {
            return 'bg-info text-dark';
        }
        if ($status === 'Pending' || $status === 'Pending Schedule' || $status === 'Scheduled') {
            return 'bg-secondary';
        }

        return 'bg-warning text-dark';
    };
    ?>

    <div class="card border-0 shadow-sm">
        <div class="card-body pb-0">
            <ul class="nav nav-tabs" id="clientProjectTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="requests-tab" data-bs-toggle="tab" data-bs-target="#requests-pane" type="button" role="tab" aria-controls="requests-pane" aria-selected="true">
                        Requests
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="ongoing-tab" data-bs-toggle="tab" data-bs-target="#ongoing-pane" type="button" role="tab" aria-controls="ongoing-pane" aria-selected="false">
                        Ongoing
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed-pane" type="button" role="tab" aria-controls="completed-pane" aria-selected="false">
                        Completed
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="cancelled-tab" data-bs-toggle="tab" data-bs-target="#cancelled-pane" type="button" role="tab" aria-controls="cancelled-pane" aria-selected="false">
                        Cancelled
                    </button>
                </li>
            </ul>
        </div>

        <div class="tab-content" id="clientProjectTabsContent">
            <div class="tab-pane fade show active" id="requests-pane" role="tabpanel" aria-labelledby="requests-tab" tabindex="0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Reference No</th>
                                <th>Service Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (empty($requestProjects)): ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">No requests found.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($requestProjects as $project): ?>
                                <?php $status = $project['status']; ?>
                                <?php $displayStatus = $status === 'For Approval' ? 'Pending' : $status; ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($project['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($project['serviceType'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td>
                                        <span class="badge <?php echo htmlspecialchars($badgeClassForStatus($displayStatus), ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($displayStatus, ENT_QUOTES, 'UTF-8'); ?></span>
                                    </td>
                                    <td>
                                        <a
                                            href="<?php echo htmlspecialchars(app_url('/client/project', ['id' => $project['id'], 'status' => $project['status']]), ENT_QUOTES, 'UTF-8'); ?>"
                                            class="btn btn-outline-primary btn-sm"
                                            title="View Details"
                                            aria-label="View Details"
                                        >
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <button
                                            type="button"
                                            class="btn btn-outline-danger btn-sm ms-2"
                                            data-cancel-project
                                        >
                                            Cancel
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="ongoing-pane" role="tabpanel" aria-labelledby="ongoing-tab" tabindex="0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Reference No</th>
                                <th>Service Type</th>
                                <th>Status</th>
                                <th>Estimated Timeline</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="ongoing-projects-body">
                        <?php if (empty($ongoingProjects)): ?>
                            <tr class="js-empty-ongoing-row">
                                <td colspan="5" class="text-center text-muted py-4">No in progress projects found.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($ongoingProjects as $project): ?>
                                <?php $status = $project['status']; ?>
                                <?php $displayStatus = $status === 'Pending' ? 'Scheduled' : $status; ?>
                                <?php $timelineDisplay = $status === 'Awaiting Quotation Approval' ? '' : ($project['timeline'] ?? 'TBD'); ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($project['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($project['serviceType'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td>
                                        <span class="badge <?php echo htmlspecialchars($badgeClassForStatus($displayStatus), ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($displayStatus, ENT_QUOTES, 'UTF-8'); ?></span>
                                    </td>
                                    <td><?php echo htmlspecialchars($timelineDisplay, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td>
                                        <a
                                            href="<?php echo htmlspecialchars(app_url('/client/project', ['id' => $project['id'], 'status' => $project['status']]), ENT_QUOTES, 'UTF-8'); ?>"
                                            class="btn btn-outline-primary btn-sm"
                                            title="View Details"
                                            aria-label="View Details"
                                        >
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <?php if (($project['id'] ?? '') === 'COL-2026-0008' && $status === 'In Progress'): ?>
                                            <button type="button" class="btn btn-success btn-sm ms-2 js-service-complete" data-service-complete>Service Completed</button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="completed-pane" role="tabpanel" aria-labelledby="completed-tab" tabindex="0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Reference No</th>
                                <th>Service Type</th>
                                <th>Service Timeline</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="completed-projects-body">
                        <?php if (empty($completedProjects)): ?>
                            <tr class="js-empty-completed-row">
                                <td colspan="4" class="text-center text-muted py-4">No completed projects found.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($completedProjects as $project): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($project['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($project['serviceType'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($project['timeline'] ?? 'TBD', ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td>
                                        <a
                                            href="<?php echo htmlspecialchars(app_url('/client/project', ['id' => $project['id'], 'status' => $project['status']]), ENT_QUOTES, 'UTF-8'); ?>"
                                            class="btn btn-outline-primary btn-sm"
                                            title="View Details"
                                            aria-label="View Details"
                                        >
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="cancelled-pane" role="tabpanel" aria-labelledby="cancelled-tab" tabindex="0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Reference No</th>
                                <th>Service Type</th>
                                <th>Service Timeline</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="cancelled-projects-body">
                        <?php if (empty($cancelledProjects)): ?>
                            <tr class="js-empty-cancelled-row">
                                <td colspan="5" class="text-center text-muted py-4">No cancelled projects found.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($cancelledProjects as $project): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($project['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($project['serviceType'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($project['timeline'] ?? 'TBD', ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td>
                                        <span class="badge <?php echo htmlspecialchars($badgeClassForStatus($project['status']), ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($project['status'], ENT_QUOTES, 'UTF-8'); ?></span>
                                    </td>
                                    <td>
                                        <a
                                            href="<?php echo htmlspecialchars(app_url('/client/project', ['id' => $project['id'], 'status' => $project['status']]), ENT_QUOTES, 'UTF-8'); ?>"
                                            class="btn btn-outline-primary btn-sm"
                                            title="View Details"
                                            aria-label="View Details"
                                        >
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const cancelButtons = document.querySelectorAll('[data-cancel-project]');
    const ongoingBody = document.getElementById('ongoing-projects-body');
    const completedBody = document.getElementById('completed-projects-body');
    const detailsBaseUrl = '<?php echo htmlspecialchars(app_url('/client/project'), ENT_QUOTES, 'UTF-8'); ?>';

    function createViewLink(projectId) {
        const link = document.createElement('a');
        link.href = detailsBaseUrl + '?id=' + encodeURIComponent(projectId);
        link.className = 'btn btn-outline-primary btn-sm';
        link.title = 'View Details';
        link.setAttribute('aria-label', 'View Details');
        link.innerHTML = '<i class="bi bi-eye"></i>';
        return link;
    }

    function ensureOngoingEmptyRow() {
        if (!ongoingBody) return;
        const hasRows = ongoingBody.querySelectorAll('tr:not(.js-empty-ongoing-row)').length > 0;
        const existing = ongoingBody.querySelector('.js-empty-ongoing-row');
        if (hasRows && existing) {
            existing.remove();
            return;
        }
        if (!hasRows && !existing) {
            ongoingBody.innerHTML = '<tr class="js-empty-ongoing-row"><td colspan="5" class="text-center text-muted py-4">No in progress projects found.</td></tr>';
        }
    }

    cancelButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            const row = btn.closest('tr');
            if (!row) return;

            const shouldCancel = window.confirm('Cancel this request?');
            if (!shouldCancel) return;

            const statusBadge = row.querySelector('span.badge');
            if (statusBadge) {
                statusBadge.textContent = 'Cancelled';
                statusBadge.className = 'badge bg-danger';
            }

            btn.disabled = true;
            btn.textContent = 'Cancelled';
        });
    });

    if (ongoingBody) {
        ongoingBody.addEventListener('click', function (event) {
            const completeButton = event.target.closest('[data-service-complete]');
            if (!completeButton) return;

            const row = completeButton.closest('tr');
            if (!row) return;

            const cells = row.querySelectorAll('td');
            if (cells.length < 2) return;

            const projectId = (cells[0].textContent || '').trim();
            const serviceType = (cells[1].textContent || '').trim();
            const timelineCell = cells[3] ? (cells[3].textContent || '').trim() : 'TBD';

            const emptyRow = completedBody ? completedBody.querySelector('.js-empty-completed-row') : null;
            if (emptyRow) emptyRow.remove();

            if (completedBody) {
                const completedRow = document.createElement('tr');
                completedRow.innerHTML = '' +
                    '<td>' + projectId + '</td>' +
                    '<td>' + serviceType + '</td>' +
                    '<td>' + (timelineCell || 'TBD') + '</td>' +
                    '<td></td>';

                const actionCell = completedRow.querySelector('td:last-child');
                if (actionCell) {
                    actionCell.appendChild(createViewLink(projectId));
                }

                completedBody.appendChild(completedRow);
            }

            row.remove();

            ensureOngoingEmptyRow();
        });
    }
});
</script>

<?php include __DIR__ . '/../../includes/footer.php'; ?>


