<?php $pageTitle = 'Project Details'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<?php
$id = $_GET['id'] ?? 'PRJ-1001';
$status = $_GET['status'] ?? 'Ongoing';
$statusKey = strtolower(trim($status));

$statusClassMap = [
    'ongoing' => 'bg-primary',
    'completed' => 'bg-success',
    'assigned' => 'bg-primary',
    'for assessment' => 'bg-warning text-dark',
    'drafting quotation' => 'bg-secondary',
    'quotation to be approved' => 'bg-warning text-dark',
    'pending' => 'bg-danger',
    'scheduled' => 'bg-info text-dark',
];

$projectMetadata = [
    'PRJ-1001' => ['client' => 'ACME Holdings', 'service' => 'Aircon Installation', 'timeline' => 'Apr 14, 2026', 'target' => 'Apr 22, 2026', 'address' => '12 Jupiter Ave, Makati City'],
    'PRJ-1002' => ['client' => 'J. Dela Cruz', 'service' => 'Aircon Repair', 'timeline' => 'Apr 05 - Apr 10, 2026', 'target' => 'Apr 10, 2026', 'address' => '88 Sampaguita St, Pasig City'],
    'PRJ-1003' => ['client' => 'Metro Storage', 'service' => 'Ducting Installation', 'timeline' => 'Apr 15 - Apr 25, 2026', 'target' => 'Apr 25, 2026', 'address' => '45 Pioneer Rd, Mandaluyong City'],
    'PRJ-1004' => ['client' => 'Northline Foods', 'service' => 'Aircon Installation', 'timeline' => 'Apr 27 - Apr 30, 2026', 'target' => 'Apr 30, 2026', 'address' => '102 Ortigas Ave, Quezon City'],
    'PRJ-1005' => ['client' => 'BluePeak IT', 'service' => 'Ducting Fabrication', 'timeline' => 'May 01 - May 10, 2026', 'target' => 'May 10, 2026', 'address' => '7th Floor, Delta Tech Park, Taguig City'],
    'PRJ-1006' => ['client' => 'Grand Arc Tower', 'service' => 'Ducting Installation', 'timeline' => 'Apr 12 - Apr 14, 2026', 'target' => 'Apr 14, 2026', 'address' => 'Grand Arc Tower, BGC, Taguig City'],
];

$quotationByProject = [
    'PRJ-1001' => [
        'id' => 'QT-101',
        'status' => 'Sent',
        'laborCost' => 55000,
        'materials' => [
            ['name' => 'Copper Pipe', 'qty' => 8, 'unit' => 'roll', 'unitCost' => 8500],
            ['name' => 'Insulation', 'qty' => 10, 'unit' => 'roll', 'unitCost' => 4200],
            ['name' => 'Circuit Breaker', 'qty' => 6, 'unit' => 'pc', 'unitCost' => 3000],
        ],
    ],
    'PRJ-1002' => [
        'id' => 'QT-102',
        'status' => 'Approved',
        'laborCost' => 18000,
        'materials' => [
            ['name' => 'Dual Capacitor', 'qty' => 2, 'unit' => 'pc', 'unitCost' => 4500],
            ['name' => 'Fan Motor', 'qty' => 1, 'unit' => 'pc', 'unitCost' => 6500],
        ],
    ],
    'PRJ-1003' => [
        'id' => 'QT-103',
        'status' => 'Draft',
        'laborCost' => 26000,
        'materials' => [
            ['name' => 'GI Sheet', 'qty' => 12, 'unit' => 'sheet', 'unitCost' => 4200],
            ['name' => 'Angle Bar', 'qty' => 14, 'unit' => 'pc', 'unitCost' => 1900],
            ['name' => 'Duct Sealant', 'qty' => 7, 'unit' => 'tube', 'unitCost' => 900],
        ],
    ],
    'PRJ-1004' => [
        'id' => 'QT-104',
        'status' => 'Approved',
        'laborCost' => 31500,
        'materials' => [
            ['name' => 'Split-Type AC Unit', 'qty' => 4, 'unit' => 'unit', 'unitCost' => 22500],
            ['name' => 'Copper Tubing', 'qty' => 6, 'unit' => 'roll', 'unitCost' => 6200],
        ],
    ],
    'PRJ-1005' => [
        'id' => 'QT-105',
        'status' => 'Sent',
        'laborCost' => 41000,
        'materials' => [
            ['name' => 'Flexible Duct', 'qty' => 5, 'unit' => 'roll', 'unitCost' => 3600],
            ['name' => 'Diffuser Grill', 'qty' => 8, 'unit' => 'pc', 'unitCost' => 1450],
            ['name' => 'Fasteners Set', 'qty' => 12, 'unit' => 'box', 'unitCost' => 850],
        ],
    ],
    'PRJ-1006' => [
        'id' => 'QT-106',
        'status' => 'Pending',
        'laborCost' => 22000,
        'materials' => [
            ['name' => 'Flexible Duct', 'qty' => 5, 'unit' => 'roll', 'unitCost' => 3600],
            ['name' => 'Diffuser Grill', 'qty' => 8, 'unit' => 'pc', 'unitCost' => 1450],
        ],
    ],
];

$teamByProject = [
    'PRJ-1001' => ['Engr. Mark Santos', 'Tech. Carlo Reyes'],
    'PRJ-1002' => ['Engr. Mark Santos', 'Tech. Lito Ramos'],
    'PRJ-1003' => ['Engr. Mark Santos', 'Tech. Carlo Reyes', 'Tech. Anne Mendoza'],
    'PRJ-1004' => ['Engr. Mark Santos', 'Tech. Carl Dominguez', 'Tech. Lito Ramos'],
    'PRJ-1005' => ['Engr. Mark Santos', 'Tech. John Gonzales'],
    'PRJ-1006' => ['Engr. Mark Santos', 'Tech. Anne Mendoza', 'Tech. Lito Ramos'],
];

$taskBoardByProject = [
    'PRJ-1001' => [
        ['title' => 'Deliver copper piping set', 'assignee' => 'Tech. Carlo Reyes', 'status' => 'In Progress', 'dateCreated' => 'Apr 10, 2026'],
        ['title' => 'Prepare indoor unit mounting points', 'assignee' => 'Tech. Mark Dela Cruz', 'status' => 'Done', 'dateCreated' => 'Apr 11, 2026'],
    ],
    'PRJ-1002' => [
        ['title' => 'Replace fan motor', 'assignee' => 'Tech. Lito Ramos', 'status' => 'Done', 'dateCreated' => 'Apr 08, 2026'],
        ['title' => 'Test cooling cycle', 'assignee' => 'Tech. Lito Ramos', 'status' => 'In Progress', 'dateCreated' => 'Apr 09, 2026'],
    ],
    'PRJ-1003' => [
        ['title' => 'Measure duct layout', 'assignee' => 'Tech. Anne Mendoza', 'status' => 'In Progress', 'dateCreated' => 'Apr 09, 2026'],
        ['title' => 'Check installation points', 'assignee' => 'Tech. Carlo Reyes', 'status' => 'Pending', 'dateCreated' => 'Apr 10, 2026'],
        ['title' => 'Validate sealant stock', 'assignee' => 'Tech. Anne Mendoza', 'status' => 'Done', 'dateCreated' => 'Apr 11, 2026'],
    ],
    'PRJ-1004' => [
        ['title' => 'Inspect mounting brackets', 'assignee' => 'Tech. Carl Dominguez', 'status' => 'Pending', 'dateCreated' => 'Apr 12, 2026'],
        ['title' => 'Stage unit delivery', 'assignee' => 'Tech. Lito Ramos', 'status' => 'In Progress', 'dateCreated' => 'Apr 13, 2026'],
    ],
    'PRJ-1005' => [
        ['title' => 'Confirm retrofit layout', 'assignee' => 'Tech. John Gonzales', 'status' => 'In Progress', 'dateCreated' => 'Apr 14, 2026'],
        ['title' => 'Prepare duct accessories', 'assignee' => 'Tech. John Gonzales', 'status' => 'Pending', 'dateCreated' => 'Apr 15, 2026'],
    ],
    'PRJ-1006' => [
        ['title' => 'Record airflow readings', 'assignee' => 'Tech. Anne Mendoza', 'status' => 'Done', 'dateCreated' => 'Apr 10, 2026'],
        ['title' => 'Inspect diffuser locations', 'assignee' => 'Tech. Lito Ramos', 'status' => 'In Progress', 'dateCreated' => 'Apr 11, 2026'],
    ],
];

$progressReportsByProject = [
    'PRJ-1001' => [
        ['date' => 'Apr 12, 2026', 'technician' => 'Tech. Carlo Reyes', 'summary' => 'Site survey completed and installation zones confirmed.', 'photos' => ['imageSample.png', 'imageSample.png']],
        ['date' => 'Apr 14, 2026', 'technician' => 'Engr. Mark Santos', 'summary' => 'Assessment reviewed with the client and service recommendations finalized.', 'photos' => ['imageSample.png']],
    ],
    'PRJ-1003' => [
        ['date' => 'Apr 13, 2026', 'technician' => 'Tech. Anne Mendoza', 'summary' => 'Duct measurements validated and material requirements listed for quotation.', 'photos' => ['imageSample.png']],
    ],
    'PRJ-1006' => [
        ['date' => 'Apr 11, 2026', 'technician' => 'Tech. Lito Ramos', 'summary' => 'Ventilation assessment completed; airflow readings recorded for review.', 'photos' => ['imageSample.png', 'imageSample.png']],
    ],
];

$reportFeedByProject = [
    'PRJ-1001' => [
        ['type' => 'Progress Report', 'date' => 'Apr 18, 2026', 'technician' => 'Tech. Carlo Reyes', 'summary' => 'Installation is underway and the first unit set has been mounted.', 'photos' => ['imageSample.png']],
        ['type' => 'Progress Report', 'date' => 'Apr 17, 2026', 'technician' => 'Tech. Anne Mendoza', 'summary' => 'Materials staged and line routing completed for the west wing.', 'photos' => ['imageSample.png', 'imageSample.png']],
        ['type' => 'Progress Report', 'date' => 'Apr 16, 2026', 'technician' => 'Tech. Lito Ramos', 'summary' => 'Indoor unit locations measured and confirmed with the client.', 'photos' => ['imageSample.png']],
        ['type' => 'Incident Report', 'date' => 'Apr 15, 2026', 'technician' => 'Engr. Mark Santos', 'summary' => 'Minor delay due to access restrictions, resolved after coordination with building admin.', 'photos' => ['imageSample.png']],
    ],
    'PRJ-1002' => [
        ['type' => 'Progress Report', 'date' => 'Apr 09, 2026', 'technician' => 'Tech. Lito Ramos', 'summary' => 'Replacement parts installed and system test performed successfully.', 'photos' => ['imageSample.png']],
        ['type' => 'Incident Report', 'date' => 'Apr 08, 2026', 'technician' => 'Tech. Lito Ramos', 'summary' => 'Existing fan motor needed full replacement after inspection.', 'photos' => ['imageSample.png']],
    ],
    'PRJ-1003' => [
        ['type' => 'Progress Report', 'date' => 'Apr 19, 2026', 'technician' => 'Tech. Anne Mendoza', 'summary' => 'Final duct measurements reviewed and site marking completed.', 'photos' => ['imageSample.png']],
        ['type' => 'Progress Report', 'date' => 'Apr 18, 2026', 'technician' => 'Tech. Carlo Reyes', 'summary' => 'Duct sections staged and installation path cleared.', 'photos' => ['imageSample.png']],
        ['type' => 'Progress Report', 'date' => 'Apr 17, 2026', 'technician' => 'Engr. Mark Santos', 'summary' => 'Client walkthrough finished and work scope confirmed.', 'photos' => ['imageSample.png', 'imageSample.png']],
        ['type' => 'Incident Report', 'date' => 'Apr 16, 2026', 'technician' => 'Tech. Anne Mendoza', 'summary' => 'Minor surface rust found on existing supports and tagged for removal.', 'photos' => ['imageSample.png']],
    ],
    'PRJ-1004' => [
        ['type' => 'Progress Report', 'date' => 'Apr 16, 2026', 'technician' => 'Tech. Carl Dominguez', 'summary' => 'Unit delivery received and mounting area cleared.', 'photos' => ['imageSample.png']],
        ['type' => 'Incident Report', 'date' => 'Apr 15, 2026', 'technician' => 'Tech. Lito Ramos', 'summary' => 'One bracket set was short on delivery and scheduled for replacement.', 'photos' => ['imageSample.png']],
    ],
    'PRJ-1005' => [
        ['type' => 'Progress Report', 'date' => 'Apr 15, 2026', 'technician' => 'Tech. John Gonzales', 'summary' => 'Retrofit layout finalized and access points mapped.', 'photos' => ['imageSample.png']],
        ['type' => 'Incident Report', 'date' => 'Apr 14, 2026', 'technician' => 'Tech. John Gonzales', 'summary' => 'One section of the ceiling needed extra clearance before installation.', 'photos' => ['imageSample.png']],
    ],
    'PRJ-1006' => [
        ['type' => 'Progress Report', 'date' => 'Apr 11, 2026', 'technician' => 'Tech. Lito Ramos', 'summary' => 'Assessment completed; airflow readings and recommendations documented.', 'photos' => ['imageSample.png', 'imageSample.png']],
    ],
];

$currentProject = $projectMetadata[$id] ?? ['client' => 'Unknown Client', 'service' => 'Aircon Installation', 'timeline' => 'TBD', 'target' => 'TBD', 'address' => 'N/A'];
$projectQuotation = $quotationByProject[$id] ?? null;
$projectTeam = $teamByProject[$id] ?? [];
$projectTasks = $statusKey === 'for assessment' ? [] : ($taskBoardByProject[$id] ?? []);
$projectMaterials = $projectQuotation['materials'] ?? [];
$progressReports = $progressReportsByProject[$id] ?? [];
$projectReports = $statusKey === 'assigned' ? [] : ($reportFeedByProject[$id] ?? []);
$isAssessmentProject = $statusKey === 'for assessment';

if ($statusKey === 'assigned') {
    foreach ($projectTasks as &$task) {
        $task['status'] = 'Pending';
    }
    unset($task);
}

$materialsTotal = 0;
if ($projectQuotation !== null) {
    foreach ($projectQuotation['materials'] as $material) {
        $materialsTotal += (float) $material['qty'] * (float) $material['unitCost'];
    }
}
?>
<main class="container py-4 flex-grow-1">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
        <div>
            <h2 class="h4 fw-bold mb-1">Project Details</h2>
        </div>
        <a href="<?php echo htmlspecialchars(app_url('/lead-technician/projects'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-outline-secondary btn-sm">Back to Projects</a>
    </div>

    <div class="card border-0 shadow-sm mb-3">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-1">
                <h3 class="h5 fw-bold mb-0"><?php echo htmlspecialchars($currentProject['service'], ENT_QUOTES, 'UTF-8'); ?> - <?php echo htmlspecialchars($currentProject['client'], ENT_QUOTES, 'UTF-8'); ?></h3>
                <span class="badge <?php echo htmlspecialchars($statusClassMap[$statusKey] ?? 'bg-light text-dark', ENT_QUOTES, 'UTF-8'); ?> px-3 py-2"><?php echo htmlspecialchars($status, ENT_QUOTES, 'UTF-8'); ?></span>
            </div>
            <div class="small text-muted d-flex flex-wrap align-items-center gap-2 mb-2">
                <span><i class="bi bi-upc me-1"></i><?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?></span>
                <span class="text-secondary">-</span>
                <span><i class="bi bi-geo-alt me-1"></i><?php echo htmlspecialchars($currentProject['address'], ENT_QUOTES, 'UTF-8'); ?></span>
            </div>
            <div class="small d-flex flex-wrap align-items-center gap-2">
                <span class="badge rounded-pill text-bg-light border"><?php echo htmlspecialchars($currentProject['service'], ENT_QUOTES, 'UTF-8'); ?></span>
                <span class="text-muted"><?php echo htmlspecialchars($currentProject['timeline'], ENT_QUOTES, 'UTF-8'); ?></span>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body pb-0">
            <ul class="nav nav-tabs" id="projectDetailTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-pane" type="button" role="tab" aria-controls="details-pane" aria-selected="true">Project Details</button>
                </li>
                <?php if (!$isAssessmentProject): ?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tasks-tab" data-bs-toggle="tab" data-bs-target="#tasks-pane" type="button" role="tab" aria-controls="tasks-pane" aria-selected="false">Tasks</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="materials-tab" data-bs-toggle="tab" data-bs-target="#materials-pane" type="button" role="tab" aria-controls="materials-pane" aria-selected="false">Materials</button>
                </li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="tab-content p-3 pt-3">
            <div class="tab-pane fade show active" id="details-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="border rounded-3 p-3 h-100 bg-white">
                            <h3 class="h6 mb-3 fw-bold">Assigned Team</h3>
                            <?php if (empty($projectTeam)): ?>
                                <div class="text-muted small">No technicians assigned yet.</div>
                            <?php else: ?>
                                <div class="list-group list-group-flush">
                                    <?php foreach ($projectTeam as $index => $member): ?>
                                        <div class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                            <span><?php echo htmlspecialchars($member, ENT_QUOTES, 'UTF-8'); ?></span>
                                            <?php if ($index === 0): ?>
                                                <span class="badge bg-primary">Lead</span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mt-3">
                    <div class="card-body" id="reportsCardBody">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                            <div>
                                <h3 class="h6 mb-1 fw-bold">Reports</h3>
                                <div class="small text-muted">
                                    <?php echo $isAssessmentProject ? 'Create an assessment report for this project.' : 'Progress and incident reports for the project.'; ?>
                                </div>
                            </div>
                            <?php if ($isAssessmentProject): ?>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createAssessmentModal">Create Assessment</button>
                            <?php else: ?>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createReportModal">Create Report</button>
                            <?php endif; ?>
                        </div>

                        <?php if ($isAssessmentProject): ?>
                            <div class="text-muted small mb-0">No assessment report submitted yet.</div>
                        <?php else: ?>
                            <ul class="nav nav-tabs mb-3" id="reportTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="progress-report-tab" data-bs-toggle="tab" data-bs-target="#progress-report-pane" type="button" role="tab" aria-controls="progress-report-pane" aria-selected="true">Progress Report</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="incident-report-tab" data-bs-toggle="tab" data-bs-target="#incident-report-pane" type="button" role="tab" aria-controls="incident-report-pane" aria-selected="false">Incident Report</button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="progress-report-pane" role="tabpanel" aria-labelledby="progress-report-tab" tabindex="0">
                                    <div id="progressReportEntries"></div>
                                </div>
                                <div class="tab-pane fade" id="incident-report-pane" role="tabpanel" aria-labelledby="incident-report-tab" tabindex="0">
                                    <div id="incidentReportEntries"></div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

            <?php if (!$isAssessmentProject): ?>
            <div class="tab-pane fade" id="tasks-pane" role="tabpanel" aria-labelledby="tasks-tab" tabindex="0">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                    <div>
                        <h3 class="h6 mb-1 fw-bold">Assigned Tasks</h3>
                        <div class="small text-muted" id="taskProgressSummary">
                            <?php echo count(array_filter($projectTasks, static function ($task) {
                                $taskStatus = strtolower((string) ($task['status'] ?? ''));
                                return $taskStatus === 'done' || $taskStatus === 'completed';
                            })); ?>/<?php echo count($projectTasks); ?> task completed
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#assignTaskModal">Assign Task</button>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Task</th>
                                <th>Assigned To</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="taskTableBody"></tbody>
                    </table>
                </div>
                <div id="tasksEmptyState" class="text-muted small d-none">No tasks assigned yet.</div>
            </div>

            <div class="tab-pane fade" id="materials-pane" role="tabpanel" aria-labelledby="materials-tab" tabindex="0">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                    <div>
                        <h3 class="h6 mb-1 fw-bold">Materials</h3>
                        <div class="small text-muted">Read-only list of quotation materials.</div>
                    </div>
                </div>

                <?php if ($projectQuotation === null): ?>
                    <div class="alert alert-light border mb-0">No materials available for this project.</div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Material</th>
                                    <th>Quantity</th>
                                    <th>Unit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($projectMaterials as $material): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($material['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars((string) ($material['qty'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars((string) ($material['unit'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php if (!$isAssessmentProject): ?>
<div class="modal fade" id="assignTaskModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow overflow-hidden">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Assign Task</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-light">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="taskTitle" class="form-label">Task Title</label>
                        <input type="text" id="taskTitle" class="form-control" placeholder="Describe the task">
                    </div>
                    <div class="col-md-6">
                        <label for="taskAssignee" class="form-label">Assign To</label>
                        <select id="taskAssignee" class="form-select">
                            <?php foreach (array_slice($projectTeam, 1) as $member): ?>
                                <option value="<?php echo htmlspecialchars($member, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($member, ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                            <?php if (count($projectTeam) <= 1): ?>
                                <option value="">No technicians available</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="taskDueDate" class="form-label">Due Date</label>
                        <input type="date" id="taskDueDate" class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="taskDescription" class="form-label text-primary fw-semibold">Task Description</label>
                        <textarea id="taskDescription" class="form-control border-primary-subtle" rows="4"></textarea>
                        <div class="form-text text-muted"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-white">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveTaskBtn">Save Task</button>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if (!$isAssessmentProject): ?>
<div class="modal fade" id="viewTaskModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow overflow-hidden">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Task Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-light">
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <div class="small text-dark mb-1 fw-semibold">Task Title</div>
                        <div id="viewTaskTitle" class="border rounded p-2 bg-white">No task title provided.</div>
                    </div>
                    <div class="col-md-6">
                        <div class="small text-dark mb-1 fw-semibold">Status</div>
                        <div id="viewTaskStatus" class="border rounded p-2 bg-white">Pending</div>
                    </div>
                    <div class="col-md-6">
                        <div class="small text-dark mb-1 fw-semibold">Assigned Technician</div>
                        <div id="viewTaskAssignee" class="border rounded p-2 bg-white">No assignee provided.</div>
                    </div>
                    <div class="col-md-6">
                        <div class="small text-dark mb-1 fw-semibold">Due Date</div>
                        <div id="viewTaskDueDate" class="border rounded p-2 bg-white">No due date provided.</div>
                    </div>
                    <div class="col-12">
                        <div class="small text-dark mb-1 fw-semibold">Description</div>
                        <div id="viewTaskDescription" class="border rounded p-3 bg-white">This task requires full execution notes, step-by-step progress, and completion validation details for proper project tracking.</div>
                    </div>
                    <div class="col-md-6 d-none" id="viewTaskAccomplishedWrapper">
                        <div class="small text-dark mb-1 fw-semibold">Date Accomplished</div>
                        <div id="viewTaskAccomplishedDate" class="border rounded p-2 bg-success-subtle text-success-emphasis">-</div>
                    </div>
                    <div class="col-12">
                        <div class="small text-dark mb-1 fw-semibold">Image</div>
                        <div class="border rounded p-3 bg-white">
                            <img id="viewTaskImage" src="" alt="Task image" class="img-fluid rounded border d-none">
                            <div id="viewTaskImageEmpty" class="text-muted small">No image attached.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-white">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if ($isAssessmentProject): ?>
<div class="modal fade" id="createAssessmentModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header">
                <h5 class="modal-title">Create Assessment Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label" for="assessmentTechnicians">Number of Technicians</label>
                        <input type="number" class="form-control" min="1" step="1" id="assessmentTechnicians">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="assessmentDays">Estimated Working Days</label>
                        <input type="number" class="form-control" min="1" step="1" id="assessmentDays">
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="assessmentDescription">Description</label>
                        <textarea class="form-control" rows="4" id="assessmentDescription"></textarea>
                    </div>
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label class="form-label mb-0">Materials Needed</label>
                            <button type="button" class="btn btn-sm btn-outline-primary" id="addAssessmentMaterialRow">
                                <i class="bi bi-plus-lg me-1"></i>Add Material
                            </button>
                        </div>
                        <div class="table-responsive border rounded">
                            <table class="table table-sm mb-0" id="assessmentMaterialsTable">
                                <thead class="table-light">
                                    <tr>
                                        <th>Material</th>
                                        <th style="width: 120px;">Quantity</th>
                                        <th style="width: 70px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control form-control-sm" name="assessment_material_name[]"></td>
                                        <td><input type="number" class="form-control form-control-sm" min="1" step="1" name="assessment_material_qty[]"></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-sm btn-outline-danger assessment-material-remove" title="Remove row">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveAssessmentBtn">Save Assessment</button>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if (!$isAssessmentProject): ?>
<div class="modal fade" id="createReportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header">
                <h5 class="modal-title">Create Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="reportType">Report Type</label>
                        <select class="form-select" id="reportType">
                            <option value="">Select type</option>
                            <option value="Progress Report">Progress Report</option>
                            <option value="Incident Report">Incident Report</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="workDescription">Description</label>
                        <textarea class="form-control" id="workDescription" rows="4" placeholder="Describe the progress or incident"></textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="workPhotos">Upload Pictures</label>
                        <input type="file" class="form-control" id="workPhotos" accept="image/*" multiple>
                        <small class="text-muted">You can select multiple images.</small>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveReportBtn">Save Report</button>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const isAssessmentProject = <?php echo json_encode($isAssessmentProject, JSON_UNESCAPED_SLASHES); ?>;
    const initialTasks = <?php echo json_encode(array_values($projectTasks), JSON_UNESCAPED_SLASHES); ?>;
    const initialReports = <?php echo json_encode(array_values($projectReports), JSON_UNESCAPED_SLASHES); ?>;
    const assetImageBasePath = <?php echo json_encode(($baseUrl !== '' ? $baseUrl : '') . '/assets/img/', JSON_UNESCAPED_SLASHES); ?>;
    const taskTableBody = document.getElementById('taskTableBody');
    const tasksEmptyState = document.getElementById('tasksEmptyState');
    const saveTaskBtn = document.getElementById('saveTaskBtn');
    const taskTitle = document.getElementById('taskTitle');
    const taskAssignee = document.getElementById('taskAssignee');
    const taskDueDate = document.getElementById('taskDueDate');
    const taskDescription = document.getElementById('taskDescription');
    const saveReportBtn = document.getElementById('saveReportBtn');
    const reportType = document.getElementById('reportType');
    const workDescription = document.getElementById('workDescription');
    const workPhotos = document.getElementById('workPhotos');
    const progressReportEntries = document.getElementById('progressReportEntries');
    const incidentReportEntries = document.getElementById('incidentReportEntries');
    const addAssessmentMaterialRow = document.getElementById('addAssessmentMaterialRow');
    const assessmentMaterialsBody = document.querySelector('#assessmentMaterialsTable tbody');
    const saveAssessmentBtn = document.getElementById('saveAssessmentBtn');
    const assessmentDescription = document.getElementById('assessmentDescription');
    const assessmentTechnicians = document.getElementById('assessmentTechnicians');
    const assessmentDays = document.getElementById('assessmentDays');
    const viewTaskTitle = document.getElementById('viewTaskTitle');
    const viewTaskStatus = document.getElementById('viewTaskStatus');
    const viewTaskAssignee = document.getElementById('viewTaskAssignee');
    const viewTaskDueDate = document.getElementById('viewTaskDueDate');
    const viewTaskDescription = document.getElementById('viewTaskDescription');
    const viewTaskImage = document.getElementById('viewTaskImage');
    const viewTaskImageEmpty = document.getElementById('viewTaskImageEmpty');
    const viewTaskAccomplishedWrapper = document.getElementById('viewTaskAccomplishedWrapper');
    const viewTaskAccomplishedDate = document.getElementById('viewTaskAccomplishedDate');

    function normalizeTaskStatus(status) {
        return String(status || '').toLowerCase() === 'done' || String(status || '').toLowerCase() === 'completed'
            ? 'Completed'
            : 'Pending';
    }

    function buildDetailedTaskDescription(title, assignee, dueDate) {
        const safeTitle = String(title || 'this task').trim();
        const safeAssignee = String(assignee || 'assigned technician').trim();
        const safeDueDate = String(dueDate || 'the due date').trim();

        return 'Complete ' + safeTitle + ' by coordinating with ' + safeAssignee + ', documenting major steps performed, validating outputs against project requirements, and finalizing all checks before ' + safeDueDate + '.';
    }

    const tasks = initialTasks.map(function (task) {
        return {
            title: task.title || '',
            assignee: task.assignee || '',
            status: normalizeTaskStatus(task.status),
            dateCreated: task.dateCreated || '',
            dueDate: task.dueDate || task.dateCreated || '',
            description: task.description || buildDetailedTaskDescription(task.title, task.assignee, task.dueDate || task.dateCreated),
            image: task.image || '',
            accomplishedDate: task.accomplishedDate || '',
        };
    }).sort(function (left, right) {
        return String(right.dateCreated || '').localeCompare(String(left.dateCreated || ''));
    });
    const reports = initialReports.slice().sort(function (left, right) {
        return new Date(right.date) - new Date(left.date);
    });

    function escapeHtml(value) {
        return String(value || '')
            .replaceAll('&', '&amp;')
            .replaceAll('<', '&lt;')
            .replaceAll('>', '&gt;')
            .replaceAll('"', '&quot;')
            .replaceAll("'", '&#39;');
    }

    function taskStatusClass(status) {
        const key = String(status || '').toLowerCase();
        if (key === 'completed') {
            return 'bg-success';
        }
        return 'bg-secondary';
    }

    function renderTasks() {
        if (!taskTableBody) {
            return;
        }

        taskTableBody.innerHTML = tasks.map(function (task, index) {
            const isCompleted = String(task.status || '').toLowerCase() === 'completed';
            return '<tr>'
                + '<td>' + escapeHtml(task.title) + '</td>'
                + '<td>' + escapeHtml(task.assignee) + '</td>'
                + '<td>' + escapeHtml(task.dateCreated) + '</td>'
                + '<td><span class="badge ' + taskStatusClass(task.status) + '">' + escapeHtml(task.status) + '</span></td>'
                + '<td class="text-start">'
                + '<button type="button" class="btn btn-sm btn-primary view-task-btn me-1" data-task-index="' + index + '" title="View Task"><i class="bi bi-eye"></i></button>'
                + (isCompleted
                    ? ''
                    : '<button type="button" class="btn btn-sm btn-success mark-done-btn" data-task-index="' + index + '">Mark as Done</button>')
                + '</td>'
                + '</tr>';
        }).join('');

        if (tasksEmptyState) {
            tasksEmptyState.classList.toggle('d-none', tasks.length > 0);
        }
    }

    function updateTaskProgress() {
        const doneCount = tasks.filter(function (task) {
            return String(task.status || '').toLowerCase() === 'completed';
        }).length;
        const summaryNode = document.getElementById('taskProgressSummary');
        if (summaryNode && !isAssessmentProject) {
            summaryNode.textContent = doneCount + '/' + tasks.length + ' task completed';
        }
    }

    function resolveTaskImageSource(imageValue) {
        const image = String(imageValue || '').trim();
        if (!image) {
            return '';
        }
        if (image.startsWith('blob:') || image.startsWith('data:') || image.startsWith('http://') || image.startsWith('https://') || image.startsWith('/')) {
            return image;
        }
        return assetImageBasePath + image;
    }

    function getTaskPreviewImageSource(task) {
        if (String(task.status || '').toLowerCase() !== 'completed') {
            return '';
        }

        return assetImageBasePath + 'imageSample.png';
    }

    function renderReportCards(reportList) {
        if (!Array.isArray(reportList) || reportList.length === 0) {
            return '<div class="text-muted small">No reports submitted yet.</div>';
        }

        return '<div class="row g-3">' + reportList.map(function (report) {
            const photos = Array.isArray(report.photos) ? report.photos : [];
            const badgeClass = report.type === 'Incident Report' ? 'bg-danger' : 'bg-primary';

            return '<div class="col-12">'
                + '<div class="border rounded-3 p-3 bg-white h-100">'
                + '<div class="d-flex align-items-center gap-2 mb-1"><strong>' + escapeHtml(report.type) + '</strong><span class="badge ' + badgeClass + '">' + escapeHtml(report.type) + '</span></div>'
                + '<div class="small text-muted mb-2">' + escapeHtml(report.technician) + ' - ' + escapeHtml(report.date) + '</div>'
                + '<p class="mb-2 small text-muted">' + escapeHtml(report.summary) + '</p>'
                + (photos.length > 0
                    ? '<div class="row g-2">' + photos.map(function (photo) {
                        return '<div class="col-6 col-md-4"><img src="' + escapeHtml(<?php echo json_encode(($baseUrl !== '' ? $baseUrl : '') . '/assets/img/', JSON_UNESCAPED_SLASHES); ?> + photo) + '" alt="Report photo" class="img-fluid rounded border"></div>';
                    }).join('') + '</div>'
                    : '')
                + '</div>'
                + '</div>';
        }).join('') + '</div>';
    }

    function renderReports() {
        if (!progressReportEntries || !incidentReportEntries) {
            return;
        }

        const sourceReports = reports.slice().sort(function (left, right) {
            return new Date(right.date) - new Date(left.date);
        });
        const progressOnly = sourceReports.filter(function (report) {
            return report.type === 'Progress Report';
        });
        const incidentOnly = sourceReports.filter(function (report) {
            return report.type === 'Incident Report';
        });

        progressReportEntries.innerHTML = renderReportCards(progressOnly).replace('No reports submitted yet.', 'No progress reports submitted yet.');
        incidentReportEntries.innerHTML = renderReportCards(incidentOnly).replace('No reports submitted yet.', 'No incident reports submitted yet.');
    }

    function addAssessmentMaterialTableRow() {
        if (!assessmentMaterialsBody) {
            return;
        }

        const row = document.createElement('tr');
        row.innerHTML = ''
            + '<td><input type="text" class="form-control form-control-sm" name="assessment_material_name[]"></td>'
            + '<td><input type="number" class="form-control form-control-sm" min="1" step="1" name="assessment_material_qty[]"></td>'
            + '<td class="text-center">'
            + '    <button type="button" class="btn btn-sm btn-outline-danger assessment-material-remove" title="Remove row">'
            + '        <i class="bi bi-trash"></i>'
            + '    </button>'
            + '</td>';
        assessmentMaterialsBody.appendChild(row);
    }

    function resetAssessmentModal() {
        if (assessmentTechnicians) {
            assessmentTechnicians.value = '';
        }
        if (assessmentDays) {
            assessmentDays.value = '';
        }
        if (assessmentDescription) {
            assessmentDescription.value = '';
        }
        if (assessmentMaterialsBody) {
            const rows = assessmentMaterialsBody.querySelectorAll('tr');
            rows.forEach(function (row, index) {
                if (index === 0) {
                    row.querySelectorAll('input').forEach(function (input) {
                        input.value = '';
                    });
                } else {
                    row.remove();
                }
            });
        }
    }

    if (taskTableBody) {
        taskTableBody.addEventListener('click', function (event) {
            const button = event.target.closest('.mark-done-btn');
            if (button) {
                const taskIndex = Number(button.getAttribute('data-task-index'));
                if (Number.isNaN(taskIndex) || !tasks[taskIndex]) {
                    return;
                }

                tasks[taskIndex].status = 'Completed';
                tasks[taskIndex].accomplishedDate = new Date().toLocaleDateString('en-US', { month: 'short', day: '2-digit', year: 'numeric' });
                renderTasks();
                updateTaskProgress();
                return;
            }

            const viewButton = event.target.closest('.view-task-btn');
            if (!viewButton) {
                return;
            }

            const taskIndex = Number(viewButton.getAttribute('data-task-index'));
            if (Number.isNaN(taskIndex) || !tasks[taskIndex]) {
                return;
            }

            const task = tasks[taskIndex];
            const imageSrc = getTaskPreviewImageSource(task);
            const isCompleted = String(task.status || '').toLowerCase() === 'completed';
            const statusText = isCompleted ? 'Completed' : 'Incomplete';
            const statusBadgeClass = isCompleted ? 'text-bg-success' : 'text-bg-warning';

            if (viewTaskTitle) {
                viewTaskTitle.textContent = task.title || 'No task title provided.';
            }
            if (viewTaskStatus) {
                viewTaskStatus.innerHTML = '<span class="badge ' + statusBadgeClass + '">' + statusText + '</span>';
            }
            if (viewTaskAssignee) {
                viewTaskAssignee.textContent = task.assignee || 'No assignee provided.';
            }
            if (viewTaskDueDate) {
                viewTaskDueDate.textContent = task.dueDate || 'No due date provided.';
            }
            if (viewTaskDescription) {
                viewTaskDescription.textContent = task.description || buildDetailedTaskDescription(task.title, task.assignee, task.dueDate);
            }
            if (viewTaskImage && viewTaskImageEmpty) {
                if (imageSrc) {
                    viewTaskImage.src = imageSrc;
                    viewTaskImage.classList.remove('d-none');
                    viewTaskImageEmpty.classList.add('d-none');
                } else {
                    viewTaskImage.src = '';
                    viewTaskImage.classList.add('d-none');
                    viewTaskImageEmpty.classList.remove('d-none');
                }
            }
            if (viewTaskAccomplishedWrapper && viewTaskAccomplishedDate) {
                if (isCompleted) {
                    viewTaskAccomplishedWrapper.classList.remove('d-none');
                    viewTaskAccomplishedDate.textContent = task.accomplishedDate || new Date().toLocaleDateString('en-US', { month: 'short', day: '2-digit', year: 'numeric' });
                } else {
                    viewTaskAccomplishedWrapper.classList.add('d-none');
                    viewTaskAccomplishedDate.textContent = '-';
                }
            }

            const modalEl = document.getElementById('viewTaskModal');
            if (modalEl && window.bootstrap && window.bootstrap.Modal) {
                window.bootstrap.Modal.getOrCreateInstance(modalEl).show();
            }
        });
    }

    if (saveTaskBtn) {
        saveTaskBtn.addEventListener('click', function () {
            const title = taskTitle ? taskTitle.value.trim() : '';
            const assignee = taskAssignee ? taskAssignee.value.trim() : '';
            const dueDate = taskDueDate ? taskDueDate.value : '';
            const description = taskDescription ? taskDescription.value.trim() : '';

            if (!title || !assignee || !dueDate) {
                return;
            }

            const formattedDueDate = new Date(dueDate + 'T00:00:00').toLocaleDateString('en-US', { month: 'short', day: '2-digit', year: 'numeric' });
            const detailedDescription = description.length > title.length
                ? description
                : 'Complete ' + title + ' with clear execution steps, coordination details, and verification notes for ' + assignee + '.';

            tasks.unshift({
                title: title,
                assignee: assignee,
                status: 'Pending',
                dateCreated: formattedDueDate,
                dueDate: formattedDueDate,
                description: detailedDescription,
                image: '',
                accomplishedDate: '',
            });

            if (taskTitle) {
                taskTitle.value = '';
            }
            if (taskDueDate) {
                taskDueDate.value = '';
            }
            if (taskDescription) {
                taskDescription.value = '';
            }

            renderTasks();
            updateTaskProgress();

            const modalEl = document.getElementById('assignTaskModal');
            if (modalEl && window.bootstrap && window.bootstrap.Modal) {
                window.bootstrap.Modal.getOrCreateInstance(modalEl).hide();
            }
        });
    }

    if (saveReportBtn) {
        saveReportBtn.addEventListener('click', function () {
            const selectedType = reportType ? reportType.value : '';
            const description = workDescription ? workDescription.value.trim() : '';
            if (!selectedType || !description) {
                return;
            }

            reports.unshift({
                type: selectedType,
                date: new Date().toLocaleDateString('en-US', { month: 'short', day: '2-digit', year: 'numeric' }),
                technician: 'Engr. Mark Santos',
                summary: description,
                photos: [],
            });

            if (reportType) {
                reportType.value = '';
            }
            if (workDescription) {
                workDescription.value = '';
            }
            if (workPhotos) {
                workPhotos.value = '';
            }

            const modalEl = document.getElementById('createReportModal');
            if (modalEl && window.bootstrap && window.bootstrap.Modal) {
                window.bootstrap.Modal.getOrCreateInstance(modalEl).hide();
            }

            renderReports();
        });
    }

    if (addAssessmentMaterialRow) {
        addAssessmentMaterialRow.addEventListener('click', addAssessmentMaterialTableRow);
    }

    if (assessmentMaterialsBody) {
        assessmentMaterialsBody.addEventListener('click', function (event) {
            const removeBtn = event.target.closest('.assessment-material-remove');
            if (!removeBtn) {
                return;
            }

            const rows = assessmentMaterialsBody.querySelectorAll('tr');
            if (rows.length === 1) {
                return;
            }

            removeBtn.closest('tr').remove();
        });
    }

    if (saveAssessmentBtn) {
        saveAssessmentBtn.addEventListener('click', function () {
            const modalEl = document.getElementById('createAssessmentModal');
            if (modalEl && window.bootstrap && window.bootstrap.Modal) {
                window.bootstrap.Modal.getOrCreateInstance(modalEl).hide();
            }
            resetAssessmentModal();
        });
    }

    renderTasks();
    updateTaskProgress();
    if (!isAssessmentProject) {
        renderReports();
    }
});
</script>

<?php include __DIR__ . '/../../includes/footer.php'; ?>

