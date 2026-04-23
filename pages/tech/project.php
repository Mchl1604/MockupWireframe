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
    'to be approved' => 'bg-warning text-dark',
    'quotation to be approved' => 'bg-warning text-dark',
    'pending' => 'bg-danger',
    'for assessment' => 'bg-info text-dark',
    'drafting quotation' => 'bg-secondary',
    'scheduled' => 'bg-info text-dark',
];
$canViewQuotation = in_array($statusKey, ['ongoing', 'completed', 'to be approved', 'quotation to be approved', 'pending'], true);

$projectMetadata = [
    'PRJ-1001' => ['client' => 'ACME Holdings', 'service' => 'Aircon Installation', 'timeline' => 'Apr 14', 'target' => 'Apr 14, 2026'],
    'PRJ-1002' => ['client' => 'J. Dela Cruz', 'service' => 'Aircon Repair', 'timeline' => 'Apr 05 - Apr 10', 'target' => 'Apr 10, 2026'],
    'PRJ-1003' => ['client' => 'Metro Storage', 'service' => 'Ducting Installation', 'timeline' => 'Apr 15 - Apr 25', 'target' => 'Apr 25, 2026'],
    'PRJ-1004' => ['client' => 'Northline Foods', 'service' => 'Aircon Installation', 'timeline' => 'Apr 27 - Apr 30', 'target' => 'April 30, 2026'],
    'PRJ-1005' => ['client' => 'BluePeak IT', 'service' => 'Ducting Fabrication', 'timeline' => 'May 01 - May 10', 'target' => 'May 10, 2026'],
    'PRJ-1006' => ['client' => 'Grand Arc Tower', 'service' => 'Ducting Installation', 'timeline' => 'Apr 12 - Apr 14', 'target' => 'Apr 14, 2026'],
];
$currentProject = $projectMetadata[$id] ?? ['client' => 'Unknown', 'service' => 'Aircon Installation', 'timeline' => 'TBD', 'target' => 'TBD'];

$quotationByProject = [
    'PRJ-1001' => [
        'id' => 'QT-101',
        'client' => 'ACME Holdings',
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
        'client' => 'J. Dela Cruz',
        'status' => 'Approved',
        'laborCost' => 18000,
        'materials' => [
            ['name' => 'Dual Capacitor', 'qty' => 2, 'unit' => 'pc', 'unitCost' => 4500],
            ['name' => 'Fan Motor', 'qty' => 1, 'unit' => 'pc', 'unitCost' => 6500],
        ],
    ],
    'PRJ-1003' => [
        'id' => 'QT-103',
        'client' => 'Metro Storage',
        'status' => 'Draft',
        'laborCost' => 26000,
        'materials' => [
            ['name' => 'GI Sheet', 'qty' => 12, 'unit' => 'sheet', 'unitCost' => 4200],
            ['name' => 'Angle Bar', 'qty' => 14, 'unit' => 'pc', 'unitCost' => 1900],
            ['name' => 'Duct Sealant', 'qty' => 7, 'unit' => 'tube', 'unitCost' => 900],
        ],
    ],
    'PRJ-1006' => [
        'id' => 'QT-104',
        'client' => 'Grand Arc Tower',
        'status' => 'Pending',
        'laborCost' => 22000,
        'materials' => [
            ['name' => 'Flexible Duct', 'qty' => 5, 'unit' => 'roll', 'unitCost' => 3600],
            ['name' => 'Diffuser Grill', 'qty' => 8, 'unit' => 'pc', 'unitCost' => 1450],
        ],
    ],
];
$projectQuotation = $quotationByProject[$id] ?? null;

if ($projectQuotation !== null) {
    $materialsTotal = 0;
    foreach ($projectQuotation['materials'] as $material) {
        $materialsTotal += (float) $material['qty'] * (float) $material['unitCost'];
    }
    $quotationTotal = $materialsTotal + (float) $projectQuotation['laborCost'];
}

$assetBasePath = ($baseUrl !== '' ? $baseUrl : '') . '/assets/img/';
$teamByProject = [
    'PRJ-1001' => ['Tech. Mark Santos', 'Tech. Carlo Reyes'],
    'PRJ-1002' => ['Tech. Mark Santos', 'Tech. Carlo Reyes'],
    'PRJ-1003' => ['Tech. Mark Santos', 'Tech. Carlo Reyes', 'Tech. Anne Mendoza'],
    'PRJ-1004' => ['Tech. Mark Santos', 'Tech. Carlo Reyes'],
    'PRJ-1005' => ['Tech. Mark Santos', 'Tech. Carlo Reyes'],
    'PRJ-1006' => ['Tech. Mark Santos', 'Tech. Carlo Reyes', 'Tech. Lito Ramos'],
];
$projectTeam = $teamByProject[$id] ?? [];

$reportsByProject = [
    'PRJ-1002' => [
        [
            'type' => 'Progress Report',
            'date' => 'Apr 09, 2026',
            'technician' => 'Tech. Lito Ramos',
            'summary' => 'Condenser fan motor replacement completed and cooling performance normalized.',
            'photos' => ['imageSample.png'],
        ],
    ],
    'PRJ-1006' => [
        [
            'type' => 'Progress Report',
            'date' => 'Apr 10, 2026',
            'technician' => 'Tech. Anne Mendoza',
            'summary' => 'Initial inspection done; airflow balancing required on two branch ducts.',
            'photos' => ['imageSample.png', 'imageSample.png'],
        ],
    ],
];
$projectReports = $reportsByProject[$id] ?? [];

if ($statusKey === 'ongoing') {
    $projectReports = [
        [
            'type' => 'Progress Report',
            'date' => 'Apr 19, 2026',
            'technician' => 'Tech. Mark Santos',
            'summary' => 'Indoor unit mounting completed for Zones 1 and 2. Routing for drain lines finalized.',
            'photos' => ['imageSample.png'],
        ],
        [
            'type' => 'Progress Report',
            'date' => 'Apr 18, 2026',
            'technician' => 'Tech. Carlo Reyes',
            'summary' => 'Copper piping for main trunk installed and pressure test passed with no leakage detected.',
            'photos' => ['imageSample.png'],
        ],
        [
            'type' => 'Progress Report',
            'date' => 'Apr 17, 2026',
            'technician' => 'Tech. Anne Mendoza',
            'summary' => 'Electrical rough-in completed and breaker assignments labeled for all aircon circuits.',
            'photos' => ['imageSample.png'],
        ],
        [
            'type' => 'Incident Report',
            'date' => 'Apr 16, 2026',
            'technician' => 'Tech. Mark Santos',
            'summary' => 'Minor ceiling access delay due to blocked service hatch. Resolved after coordination with site admin.',
            'photos' => ['imageSample.png'],
        ],
    ];
}

$progressReports = array_values(array_filter($projectReports, function ($report) {
    return $report['type'] === 'Progress Report';
}));
usort($progressReports, function ($a, $b) {
    return strtotime($b['date']) <=> strtotime($a['date']);
});

$incidentReports = array_values(array_filter($projectReports, function ($report) {
    return $report['type'] === 'Incident Report';
}));
usort($incidentReports, function ($a, $b) {
    return strtotime($b['date']) <=> strtotime($a['date']);
});

$assessmentByProject = [
    'PRJ-1001' => [
        'date' => 'Apr 08, 2026',
        'technician' => 'Tech. Mark Santos',
        'requiredTechnicians' => 2,
        'summary' => 'Aircon system assessment completed. Building has 3 zones requiring individual indoor units. Existing electrical capacity adequate. Installation timeline: 8 days.',
        'photos' => ['imageSample.png', 'imageSample.png', 'imageSample.png'],
        'findings' => [
            'Optimal placement for indoor units identified',
            'Electrical panel can support new load',
            'Room for outdoor condenser unit available',
        ],
        'materials' => [
            ['name' => 'Copper Pipe', 'qty' => 8, 'unit' => 'roll'],
            ['name' => 'Insulation', 'qty' => 10, 'unit' => 'roll'],
            ['name' => 'Circuit Breaker', 'qty' => 6, 'unit' => 'pc'],
        ],
        'estimatedDays' => 8,
    ],
    'PRJ-1002' => [
        'date' => 'Apr 07, 2026',
        'technician' => 'Tech. Lito Ramos',
        'requiredTechnicians' => 1,
        'summary' => 'Aircon Repair assessment. Identified failing capacitor and worn fan motor. Parts in stock. Estimated repair time: 3 hours.',
        'photos' => ['imageSample.png'],
        'findings' => [
            'Capacitor needs replacement',
            'Fan motor showing wear',
            'Refrigerant charge within normal range',
        ],
        'materials' => [
            ['name' => 'Dual Capacitor', 'qty' => 2, 'unit' => 'pc'],
            ['name' => 'Fan Motor', 'qty' => 1, 'unit' => 'pc'],
        ],
        'estimatedDays' => 1,
    ],
    'PRJ-1003' => [
        'date' => 'Apr 09, 2026',
        'technician' => 'Tech. Mark Santos',
        'requiredTechnicians' => 3,
        'summary' => 'Warehouse ducting assessment. Measurements completed for all zones. Existing ductwork requires partial replacement due to rust and deterioration.',
        'photos' => ['imageSample.png', 'imageSample.png'],
        'findings' => [
            'Ductwork diameter: 12 inches (adequate)',
            'Rust detected in 40% of existing ducts',
            'New spiral duct estimated length: 250 linear feet',
        ],
        'materials' => [
            ['name' => 'GI Sheet', 'qty' => 12, 'unit' => 'sheet'],
            ['name' => 'Angle Bar', 'qty' => 14, 'unit' => 'pc'],
            ['name' => 'Duct Sealant', 'qty' => 7, 'unit' => 'tube'],
        ],
        'estimatedDays' => 10,
    ],
    'PRJ-1006' => [
        'date' => 'Apr 10, 2026',
        'technician' => 'Tech. Anne Mendoza',
        'requiredTechnicians' => 2,
        'summary' => 'Lobby ventilation system assessment. System is undersized for current usage. Recommend upgrade to handle increased occupancy.',
        'photos' => ['imageSample.png'],
        'findings' => [
            'Current CFM rating: 1500',
            'Required CFM for occupancy: 2200',
            'New system can be installed without major modifications',
        ],
        'materials' => [
            ['name' => 'Flexible Duct', 'qty' => 5, 'unit' => 'roll'],
            ['name' => 'Diffuser Grill', 'qty' => 8, 'unit' => 'pc'],
        ],
        'estimatedDays' => 3,
    ],
];
$projectAssessment = $assessmentByProject[$id] ?? null;
$canViewAssessment = $statusKey !== 'for assessment';
$isCompletedProject = $statusKey === 'completed';
$projectTitle = $currentProject['service'] . ' - ' . $currentProject['client'];
$showTasksTab = $statusKey !== 'for assessment';
$projectTimeline = $currentProject['timeline'];
if (!preg_match('/\b\d{4}\b/', $projectTimeline)) {
    $projectTimeline .= ', 2026';
}
?>
<main class="container py-4 flex-grow-1">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 fw-bold mb-0">Project Details</h2>
        <a href="<?php echo htmlspecialchars(app_url('/tech/projects'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-outline-secondary btn-sm">Back to My Projects</a>
    </div>

    <div class="card border-0 shadow-sm mb-3">
        <div class="card-body py-3 px-3 px-md-4">
            <div class="d-flex flex-wrap justify-content-between align-items-start gap-3">
                <div>
                    <h3 class="h5 fw-bold mb-2"><?php echo htmlspecialchars($projectTitle, ENT_QUOTES, 'UTF-8'); ?></h3>
                    <div class="d-flex flex-wrap align-items-center gap-2 text-muted">
                        <span><?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?></span>
                        <span>&bull;</span>
                        <span><?php echo htmlspecialchars($projectTimeline, ENT_QUOTES, 'UTF-8'); ?></span>
                    </div>
                    <div class="mt-2">
                        <span class="badge rounded-pill text-bg-light border"><?php echo htmlspecialchars($currentProject['service'], ENT_QUOTES, 'UTF-8'); ?></span>
                    </div>
                </div>
                <span class="badge <?php echo htmlspecialchars($statusClassMap[$statusKey] ?? 'bg-light text-dark', ENT_QUOTES, 'UTF-8'); ?> px-3 py-2 align-self-start"><?php echo htmlspecialchars($status, ENT_QUOTES, 'UTF-8'); ?></span>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body pb-0">
            <ul class="nav nav-tabs" id="projectDetailTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-pane" type="button" role="tab" aria-controls="details-pane" aria-selected="true">Project Details</button>
                </li>
                <?php if ($showTasksTab): ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="tasks-tab" data-bs-toggle="tab" data-bs-target="#tasks-pane" type="button" role="tab" aria-controls="tasks-pane" aria-selected="false">My Tasks</button>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="tab-content p-3 pt-3">
            <div class="tab-pane fade show active" id="details-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                <div class="row g-3">
                    <div class="col-12">
                        <small class="text-muted d-block mb-2"><strong>Assigned Team</strong></small>
                        <?php if (empty($projectTeam)): ?>
                            <div class="text-muted small">No technicians assigned.</div>
                        <?php else: ?>
                            <ul class="list-group list-group-flush">
                                <?php foreach ($projectTeam as $index => $tech): ?>
                                    <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                        <span><?php echo htmlspecialchars($tech, ENT_QUOTES, 'UTF-8'); ?></span>
                                        <?php if ($index === 0): ?>
                                            <span class="badge bg-primary">Lead</span>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h3 class="h6 fw-bold mb-0">Reports</h3>
                    </div>
                    <ul class="nav nav-tabs mb-3" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="progressTab" data-bs-toggle="tab" data-bs-target="#progressReports" type="button" role="tab" aria-controls="progressReports" aria-selected="true">Progress Report</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="incidentTab" data-bs-toggle="tab" data-bs-target="#incidentReports" type="button" role="tab" aria-controls="incidentReports" aria-selected="false">Incident Report</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="progressReports" role="tabpanel" aria-labelledby="progressTab">
                            <?php
                                if (!empty($progressReports)):
                            ?>
                                <div class="row g-3">
                                    <?php foreach ($progressReports as $report): ?>
                                        <div class="col-12">
                                            <div class="border rounded p-3">
                                                <div class="mb-2">
                                                    <div class="small text-muted">Date</div>
                                                    <div class="fw-bold"><?php echo htmlspecialchars($report['date'], ENT_QUOTES, 'UTF-8'); ?></div>
                                                </div>
                                                <div class="mb-2">
                                                    <div class="small text-muted">Description</div>
                                                    <div class="small text-muted"><?php echo htmlspecialchars($report['summary'], ENT_QUOTES, 'UTF-8'); ?></div>
                                                </div>
                                                <div class="small text-muted mb-2">Picture</div>
                                                <div class="row g-2">
                                                    <?php foreach ($report['photos'] as $photo): ?>
                                                        <div class="col-6 col-md-4 col-lg-3">
                                                            <img src="<?php echo htmlspecialchars($assetBasePath . $photo, ENT_QUOTES, 'UTF-8'); ?>" alt="Report photo" class="img-fluid rounded border report-photo">
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <p class="mb-0 text-muted">No progress reports submitted yet.</p>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane fade" id="incidentReports" role="tabpanel" aria-labelledby="incidentTab">
                            <?php
                                if (!empty($incidentReports)):
                            ?>
                                <div class="row g-3">
                                    <?php foreach ($incidentReports as $report): ?>
                                        <div class="col-12">
                                            <div class="border rounded p-3">
                                                <div class="mb-2">
                                                    <div class="small text-muted">Date</div>
                                                    <div class="fw-bold"><?php echo htmlspecialchars($report['date'], ENT_QUOTES, 'UTF-8'); ?></div>
                                                </div>
                                                <div class="mb-2">
                                                    <div class="small text-muted">Description</div>
                                                    <div class="small text-muted"><?php echo htmlspecialchars($report['summary'], ENT_QUOTES, 'UTF-8'); ?></div>
                                                </div>
                                                <div class="small text-muted mb-2">Picture</div>
                                                <div class="row g-2">
                                                    <?php foreach ($report['photos'] as $photo): ?>
                                                        <div class="col-6 col-md-4 col-lg-3">
                                                            <img src="<?php echo htmlspecialchars($assetBasePath . $photo, ENT_QUOTES, 'UTF-8'); ?>" alt="Report photo" class="img-fluid rounded border report-photo">
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <p class="mb-0 text-muted">No incident reports submitted yet.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php if ($showTasksTab): ?>
                <div class="tab-pane fade" id="tasks-pane" role="tabpanel" aria-labelledby="tasks-tab" tabindex="0">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover mb-0">
                            <thead class="table-light"><tr><th>Task</th><th>Status</th><th>Date Created</th><th>Due</th><th>Action</th></tr></thead>
                            <tbody id="taskTableBody"></tbody>
                        </table>
                    </div>
                    <div id="tasksEmptyState" class="text-muted small d-none mt-3">No tasks assigned to you on this project.</div>
                </div>
            <?php endif; ?>

        </div>
    </div>

</main>

<div class="modal fade" id="completeTaskModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header">
                <h5 class="modal-title">Complete Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="taskDescription" class="form-label">Completion Details</label>
                    <textarea class="form-control" id="taskDescription" rows="4" placeholder="Describe the work completed..."></textarea>
                </div>
                <div class="mb-0">
                    <label for="taskProofPhoto" class="form-label">Proof Photo</label>
                    <input class="form-control" type="file" id="taskProofPhoto" accept="image/*">
                    <div class="form-text">Upload a photo as proof of completion.</div>
                </div>
                <input type="hidden" id="completeTaskIndex" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="saveCompleteTaskBtn">Complete Task</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewTaskModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header">
                <h5 class="modal-title">Task Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="small text-muted mb-1">Task</div>
                        <div id="viewTaskTitle" class="border rounded p-2 bg-light">-</div>
                    </div>
                    <div class="col-md-6">
                        <div class="small text-muted mb-1">Status</div>
                        <div id="viewTaskStatus" class="border rounded p-2 bg-light">-</div>
                    </div>
                    <div class="col-md-6">
                        <div class="small text-muted mb-1">Date Created</div>
                        <div id="viewTaskDateCreated" class="border rounded p-2 bg-light">-</div>
                    </div>
                    <div class="col-md-6">
                        <div class="small text-muted mb-1">Due Date</div>
                        <div id="viewTaskDueDate" class="border rounded p-2 bg-light">-</div>
                    </div>
                    <div class="col-12">
                        <div class="small text-muted mb-1">Details</div>
                        <div id="viewTaskDetails" class="border rounded p-2 bg-light">No additional details available.</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const isCompletedProject = <?php echo json_encode($isCompletedProject); ?>;
    const taskTableBody = document.getElementById('taskTableBody');
    const tasksEmptyState = document.getElementById('tasksEmptyState');
    const saveCompleteTaskBtn = document.getElementById('saveCompleteTaskBtn');
    const taskDescription = document.getElementById('taskDescription');
    const taskProofPhoto = document.getElementById('taskProofPhoto');
    const completeTaskIndex = document.getElementById('completeTaskIndex');
    const viewTaskTitle = document.getElementById('viewTaskTitle');
    const viewTaskStatus = document.getElementById('viewTaskStatus');
    const viewTaskDateCreated = document.getElementById('viewTaskDateCreated');
    const viewTaskDueDate = document.getElementById('viewTaskDueDate');
    const viewTaskDetails = document.getElementById('viewTaskDetails');

    const tasks = [
        { title: 'Deliver copper piping set', status: 'Incomplete', dateCreated: 'Apr 10, 2026', dueDate: 'Apr 21, 2026', details: 'Deliver copper piping materials to the site and verify quantities before installation.' },
        { title: 'Check installation points', status: 'Incomplete', dateCreated: 'Apr 10, 2026', dueDate: 'Apr 22, 2026', details: 'Inspect and confirm all indoor and outdoor unit mounting points based on layout plan.' },
        { title: 'Confirm retrofit layout', status: 'Incomplete', dateCreated: 'Apr 14, 2026', dueDate: 'Apr 24, 2026', details: 'Finalize retrofit layout with lead technician and mark revisions on site plan.' }
    ];

    if (isCompletedProject) {
        tasks.forEach(function (task) {
            task.status = 'Completed';
        });
    }

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
        if (key === 'completed') return 'bg-success';
        return 'bg-secondary';
    }

    function renderTasks() {
        if (!taskTableBody) return;

        taskTableBody.innerHTML = tasks.map(function (task, index) {
            return '<tr>'
                + '<td class="small">' + escapeHtml(task.title) + '</td>'
                + '<td><span class="badge ' + taskStatusClass(task.status) + '">' + escapeHtml(task.status) + '</span></td>'
                + '<td class="small">' + escapeHtml(task.dateCreated) + '</td>'
                + '<td class="small">' + escapeHtml(task.dueDate || '-') + '</td>'
                + '<td class="text-start">'
                + '<button type="button" class="btn btn-sm btn-outline-primary view-task-btn me-1" data-task-index="' + index + '" data-bs-toggle="modal" data-bs-target="#viewTaskModal" title="View Details" aria-label="View Details"><i class="bi bi-eye"></i></button>'
                + (String(task.status || '').toLowerCase() === 'completed'
                    ? ''
                    : '<button type="button" class="btn btn-sm btn-success complete-task-btn" data-task-index="' + index + '" data-bs-toggle="modal" data-bs-target="#completeTaskModal">Complete</button>')
                + '</td>'
                + '</tr>';
        }).join('');

        if (tasksEmptyState) {
            tasksEmptyState.classList.toggle('d-none', tasks.length > 0);
        }
    }

    if (taskTableBody) {
        taskTableBody.addEventListener('click', function (event) {
            const viewButton = event.target.closest('.view-task-btn');
            if (viewButton) {
                const taskIndex = Number(viewButton.getAttribute('data-task-index'));
                if (!Number.isNaN(taskIndex) && tasks[taskIndex]) {
                    const task = tasks[taskIndex];
                    if (viewTaskTitle) viewTaskTitle.textContent = task.title || '-';
                    if (viewTaskStatus) viewTaskStatus.textContent = task.status || '-';
                    if (viewTaskDateCreated) viewTaskDateCreated.textContent = task.dateCreated || '-';
                    if (viewTaskDueDate) viewTaskDueDate.textContent = task.dueDate || '-';
                    if (viewTaskDetails) viewTaskDetails.textContent = task.details || 'No additional details available.';
                }
                return;
            }

            const button = event.target.closest('.complete-task-btn');
            if (!button) return;
            completeTaskIndex.value = button.getAttribute('data-task-index');
        });
    }

    if (saveCompleteTaskBtn) {
        saveCompleteTaskBtn.addEventListener('click', function () {
            const taskIndex = Number(completeTaskIndex.value);
            if (Number.isNaN(taskIndex) || !tasks[taskIndex]) return;

            tasks[taskIndex].status = 'Completed';
            renderTasks();

            taskDescription.value = '';
            taskProofPhoto.value = '';
            completeTaskIndex.value = '';

            const modalEl = document.getElementById('completeTaskModal');
            if (modalEl && window.bootstrap && window.bootstrap.Modal) {
                window.bootstrap.Modal.getOrCreateInstance(modalEl).hide();
            }
        });
    }

    renderTasks();
});
</script>

<?php include __DIR__ . '/../../includes/footer.php'; ?>


