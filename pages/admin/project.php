<?php $pageTitle = 'Admin Project Details'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<?php
$id = $_GET['id'] ?? 'PRJ-1001';
$status = $_GET['status'] ?? 'Ongoing';
$statusKey = strtolower(trim($status));
$preparingStatuses = ['drafting quotation', 'pending quotation approval', 'quotation to be approved', 'pending schedule'];
$isPreparingStatus = in_array($statusKey, $preparingStatuses, true);
$canEditSchedule = !in_array($statusKey, array_merge($preparingStatuses, ['completed', 'cancelled']), true);
$statusClassMap = [
    'ongoing' => 'bg-primary',
    'in progress' => 'bg-primary',
    'completed' => 'bg-success',
    'to be approved' => 'bg-warning text-dark',
    'pending quotation approval' => 'bg-warning text-dark',
    'quotation to be approved' => 'bg-warning text-dark',
    'scheduled' => 'bg-danger',
    'pending schedule' => 'bg-dark',
    'for assessment' => 'bg-info text-dark',
    'drafting quotation' => 'bg-secondary',
    'cancelled' => 'bg-danger',
];
$canViewQuotation = in_array($statusKey, ['ongoing', 'in progress', 'scheduled', 'completed', 'to be approved', 'pending quotation approval', 'quotation to be approved', 'pending schedule'], true);

$projectMetadata = [
    'PRJ-1001' => ['client' => 'ACME Holdings', 'service' => 'Aircon Installation', 'timeline' => 'Apr 21, 2026', 'target' => 'Apr 21, 2026', 'location' => '112 Meridian Ave, Makati City'],
    'PRJ-1002' => ['client' => 'J. Dela Cruz', 'service' => 'Aircon Repair', 'timeline' => 'Apr 05 - Apr 10, 2026', 'target' => 'Apr 10, 2026', 'location' => 'Blk 4 Lot 9 Greenfield Homes, Pasig City'],
    'PRJ-1003' => ['client' => 'Metro Storage', 'service' => 'Ducting Installation', 'timeline' => '', 'target' => 'TBD', 'location' => '45 Pioneer Rd, Mandaluyong City'],
    'PRJ-1004' => ['client' => 'Northline Foods', 'service' => 'Aircon Installation', 'timeline' => 'Apr 14 - Apr 22, 2026', 'target' => 'Apr 22, 2026', 'location' => '8 Westbank Ave, Quezon City'],
    'PRJ-1005' => ['client' => 'BluePeak IT', 'service' => 'Ducting Fabrication', 'timeline' => '', 'target' => 'TBD', 'location' => '11 East Ridge Dr, Taguig City'],
    'PRJ-1006' => ['client' => 'Grand Arc Tower', 'service' => 'Ducting Installation', 'timeline' => 'Apr 12 - Apr 14, 2026', 'target' => 'Apr 14, 2026', 'location' => '900 Aurora Blvd, Cubao, Quezon City'],
    'PRJ-1007' => ['client' => 'Riverside Mall', 'service' => 'Ducting Installation', 'timeline' => '', 'target' => 'TBD', 'location' => '120 Riverside Ave, Mandaluyong City'],
    'PRJ-1008' => ['client' => 'Hillcrest Suites', 'service' => 'Aircon Repair', 'timeline' => '', 'target' => 'Cancelled', 'location' => '89 Northfield St, Pasig City'],
    'PRJ-1009' => ['client' => 'Westline Depot', 'service' => 'Ducting Fabrication', 'timeline' => '', 'target' => 'Cancelled', 'location' => '22 Harbor Ave, Manila City'],
];
$currentProject = $projectMetadata[$id] ?? ['client' => 'Unknown', 'service' => 'Aircon Installation', 'timeline' => '', 'target' => 'TBD', 'location' => 'Address unavailable'];
$projectTitle = $currentProject['service'] . ' - ' . $currentProject['client'];

$cancellationReasonByProject = [
    'PRJ-1008' => 'Client rejected quotation due to budget constraints.',
    'PRJ-1009' => 'Admin cancelled project due to incomplete permit requirements.',
];
$projectCancellationReason = $cancellationReasonByProject[$id] ?? '';

$statusesWithSchedule = ['for assessment', 'scheduled', 'in progress', 'ongoing', 'completed'];
$displaySchedule = in_array($statusKey, $statusesWithSchedule, true)
    ? ($currentProject['timeline'] !== '' ? $currentProject['timeline'] : 'TBD')
    : 'Not yet scheduled';

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
        'status' => 'Pending Approval',
        'laborCost' => 26000,
        'materials' => [
            ['name' => 'GI Sheet', 'qty' => 12, 'unit' => 'sheet', 'unitCost' => 4200],
            ['name' => 'Angle Bar', 'qty' => 14, 'unit' => 'pc', 'unitCost' => 1900],
            ['name' => 'Duct Sealant', 'qty' => 7, 'unit' => 'tube', 'unitCost' => 900],
        ],
    ],
    'PRJ-1004' => [
        'id' => 'QT-105',
        'client' => 'Northline Foods',
        'status' => 'Sent',
        'laborCost' => 38500,
        'materials' => [
            ['name' => 'Split-Type Indoor Unit Bracket', 'qty' => 4, 'unit' => 'set', 'unitCost' => 2800],
            ['name' => 'Copper Tubing Kit', 'qty' => 6, 'unit' => 'set', 'unitCost' => 5200],
            ['name' => 'Drain Hose', 'qty' => 8, 'unit' => 'pc', 'unitCost' => 650],
        ],
    ],
    'PRJ-1006' => [
        'id' => 'QT-104',
        'client' => 'Grand Arc Tower',
        'status' => 'Scheduled',
        'laborCost' => 22000,
        'materials' => [
            ['name' => 'Flexible Duct', 'qty' => 5, 'unit' => 'roll', 'unitCost' => 3600],
            ['name' => 'Diffuser Grill', 'qty' => 8, 'unit' => 'pc', 'unitCost' => 1450],
        ],
    ],
    'PRJ-1007' => [
        'id' => 'QT-106',
        'client' => 'Riverside Mall',
        'status' => 'Approved',
        'laborCost' => 30500,
        'materials' => [
            ['name' => 'Spiral Duct', 'qty' => 9, 'unit' => 'length', 'unitCost' => 3200],
            ['name' => 'Volume Damper', 'qty' => 12, 'unit' => 'pc', 'unitCost' => 1250],
            ['name' => 'Duct Insulation', 'qty' => 7, 'unit' => 'roll', 'unitCost' => 2800],
        ],
    ],
];
$projectQuotation = $quotationByProject[$id] ?? null;

if ($projectQuotation !== null && in_array($statusKey, ['ongoing', 'scheduled'], true)) {
    $projectQuotation['status'] = 'Approved';
}

if ($projectQuotation !== null) {
    $materialsTotal = 0;
    foreach ($projectQuotation['materials'] as $material) {
        $materialsTotal += (float) $material['qty'] * (float) $material['unitCost'];
    }
    $quotationTotal = $materialsTotal + (float) $projectQuotation['laborCost'];
}

$assetBasePath = ($baseUrl !== '' ? $baseUrl : '') . '/assets/img/';
$teamByProject = [
    'PRJ-1001' => ['Engr. Mario Santos', 'Tech. Carlo Reyes'],
    'PRJ-1002' => ['Tech. Lito Ramos'],
    'PRJ-1003' => ['Engr. Mario Santos', 'Tech. Carlo Reyes', 'Tech. Anne Mendoza'],
    'PRJ-1004' => ['Tech. Carl Dominguez'],
    'PRJ-1005' => ['Engr. Mario Santos', 'Tech. John Gonzales'],
    'PRJ-1006' => ['Tech. Anne Mendoza', 'Tech. Lito Ramos'],
];
$projectTeam = $teamByProject[$id] ?? [];
if ($isPreparingStatus) {
    $projectTeam = [];
}

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
    'PRJ-1004' => [
        [
            'type' => 'Progress Report',
            'date' => 'Apr 16, 2026',
            'technician' => 'Tech. Carl Dominguez',
            'summary' => 'Two indoor units were mounted and refrigerant lines were pressure-tested. No leaks detected and electrical rough-ins are complete for remaining units.',
            'photos' => ['imageSample.png', 'imageSample.png'],
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
$leadTechnician = !empty($projectTeam) ? $projectTeam[0] : null;

$assessmentByProject = [
    'PRJ-1001' => [
        'date' => 'Apr 08, 2026',
        'technician' => 'Engr. Mario Santos',
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
        'technician' => 'Engr. Mario Santos',
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
    'PRJ-1004' => [
        'date' => 'Apr 13, 2026',
        'technician' => 'Tech. Carl Dominguez',
        'requiredTechnicians' => 2,
        'summary' => 'Site assessment completed for split-type AC upgrade. Wall locations are suitable for four indoor units and condenser placement is clear of obstructions.',
        'photos' => ['imageSample.png', 'imageSample.png'],
        'findings' => [
            'Existing electrical trunk line can support added AC load',
            'Condensate drainage path is available on both floors',
            'Minor wall patching required after bracket anchoring',
        ],
        'materials' => [
            ['name' => 'Copper Tubing Kit', 'qty' => 6, 'unit' => 'set'],
            ['name' => 'Drain Hose', 'qty' => 8, 'unit' => 'pc'],
            ['name' => 'Wall Bracket', 'qty' => 4, 'unit' => 'set'],
        ],
        'estimatedDays' => 9,
    ],
    'PRJ-1005' => [
        'date' => 'Apr 11, 2026',
        'technician' => 'Tech. John Gonzales',
        'requiredTechnicians' => 2,
        'summary' => 'Ventilation retrofit assessment completed for server room cooling support. Current airflow is below required load for peak operation and needs system upgrade.',
        'photos' => ['imageSample.png', 'imageSample.png'],
        'findings' => [
            'Existing airflow distribution is uneven near rack rows',
            'Return path needs balancing to improve circulation',
            'Retrofit can be done without major ceiling reconstruction',
        ],
        'materials' => [
            ['name' => 'Flexible Duct', 'qty' => 6, 'unit' => 'roll'],
            ['name' => 'Insulation', 'qty' => 4, 'unit' => 'roll'],
            ['name' => 'Diffuser Grill', 'qty' => 6, 'unit' => 'pc'],
        ],
        'estimatedDays' => 6,
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
    'PRJ-1007' => [
        'date' => 'Apr 15, 2026',
        'technician' => 'Engr. Mario Santos',
        'requiredTechnicians' => 3,
        'summary' => 'Mall branch duct assessment completed. Quotation is approved and project is ready for crew scheduling and site mobilization.',
        'photos' => ['imageSample.png', 'imageSample.png'],
        'findings' => [
            'Main trunk routing is cleared for installation',
            'Ceiling access windows are available per zone',
            'Weekend night shift is recommended to minimize disruption',
        ],
        'materials' => [
            ['name' => 'Spiral Duct', 'qty' => 9, 'unit' => 'length'],
            ['name' => 'Volume Damper', 'qty' => 12, 'unit' => 'pc'],
            ['name' => 'Duct Insulation', 'qty' => 7, 'unit' => 'roll'],
        ],
        'estimatedDays' => 7,
    ],
];
$projectAssessment = $assessmentByProject[$id] ?? null;
$canViewAssessment = $statusKey !== 'for assessment';
$canViewTechnicianReports = in_array($statusKey, ['in progress', 'ongoing', 'completed'], true);
$canViewTaskBoard = in_array($statusKey, ['in progress', 'completed'], true);

$taskBoardByProject = [
    'PRJ-1001' => [
        ['title' => 'Deliver copper piping set', 'assignee' => 'Tech. Carlo Reyes', 'status' => 'In Progress', 'dateCreated' => 'Apr 10, 2026'],
        ['title' => 'Prepare indoor unit mounting points', 'assignee' => 'Tech. Carlo Reyes', 'status' => 'Done', 'dateCreated' => 'Apr 11, 2026'],
    ],
    'PRJ-1002' => [
        ['title' => 'Replace fan motor', 'assignee' => 'Tech. Lito Ramos', 'status' => 'Done', 'dateCreated' => 'Apr 08, 2026'],
        ['title' => 'Test cooling cycle', 'assignee' => 'Tech. Lito Ramos', 'status' => 'In Progress', 'dateCreated' => 'Apr 09, 2026'],
    ],
    'PRJ-1003' => [
        ['title' => 'Measure duct layout', 'assignee' => 'Tech. Anne Mendoza', 'status' => 'In Progress', 'dateCreated' => 'Apr 09, 2026'],
        ['title' => 'Check installation points', 'assignee' => 'Tech. Carlo Reyes', 'status' => 'Pending', 'dateCreated' => 'Apr 10, 2026'],
    ],
    'PRJ-1004' => [
        ['title' => 'Inspect mounting brackets', 'assignee' => 'Tech. Carl Dominguez', 'status' => 'Pending', 'dateCreated' => 'Apr 12, 2026'],
        ['title' => 'Stage unit delivery', 'assignee' => 'Tech. Carl Dominguez', 'status' => 'In Progress', 'dateCreated' => 'Apr 13, 2026'],
    ],
    'PRJ-1005' => [
        ['title' => 'Confirm retrofit layout', 'assignee' => 'Tech. John Gonzales', 'status' => 'In Progress', 'dateCreated' => 'Apr 14, 2026'],
        ['title' => 'Prepare duct accessories', 'assignee' => 'Tech. John Gonzales', 'status' => 'Pending', 'dateCreated' => 'Apr 15, 2026'],
    ],
    'PRJ-1006' => [
        ['title' => 'Record airflow readings', 'assignee' => 'Tech. Anne Mendoza', 'status' => 'Done', 'dateCreated' => 'Apr 10, 2026'],
        ['title' => 'Inspect diffuser locations', 'assignee' => 'Tech. Lito Ramos', 'status' => 'In Progress', 'dateCreated' => 'Apr 11, 2026'],
    ],
    'PRJ-1007' => [
        ['title' => 'Verify branch route clearance', 'assignee' => 'Tech. Carlo Reyes', 'status' => 'Pending', 'dateCreated' => 'Apr 16, 2026'],
        ['title' => 'Prepare damper placement guide', 'assignee' => 'Tech. Anne Mendoza', 'status' => 'In Progress', 'dateCreated' => 'Apr 17, 2026'],
    ],
];
$projectTasks = $canViewTaskBoard ? ($taskBoardByProject[$id] ?? []) : [];

if ($statusKey === 'completed') {
    foreach ($projectTasks as &$task) {
        $task['status'] = 'Completed';
    }
    unset($task);
}

$quotationsModuleUrl = app_url('/admin/quotations', ['project' => $id]);
$schedulesModuleUrl = app_url('/admin/schedules', ['project' => $id, 'tab' => 'projects']);
?>
<main class="container py-4 flex-grow-1">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 fw-bold mb-0">Project Details</h2>
        <a href="<?php echo htmlspecialchars(app_url('/admin/projects'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-outline-secondary btn-sm">Back to Projects</a>
    </div>

    <div class="card border-0 shadow-sm mb-3 compact-project-overview">
        <div class="card-body">
            <div class="d-flex flex-wrap justify-content-between align-items-start gap-2 mb-2">
                <h3 class="h4 fw-bold mb-0"><?php echo htmlspecialchars($projectTitle, ENT_QUOTES, 'UTF-8'); ?></h3>
                <span class="badge rounded-pill px-3 py-2 <?php echo htmlspecialchars($statusClassMap[$statusKey] ?? 'bg-light text-dark', ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($status, ENT_QUOTES, 'UTF-8'); ?></span>
            </div>
            <div class="d-flex flex-wrap align-items-center gap-3 text-muted mb-2 compact-project-meta">
                <span><i class="bi bi-bar-chart-steps me-1"></i><?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?></span>
                <span><i class="bi bi-geo-alt me-1"></i><?php echo htmlspecialchars($currentProject['location'], ENT_QUOTES, 'UTF-8'); ?></span>
            </div>
            <div class="d-flex flex-wrap align-items-center gap-2 compact-project-meta">
                <span class="badge rounded-pill text-bg-light border"><?php echo htmlspecialchars($currentProject['service'], ENT_QUOTES, 'UTF-8'); ?></span>
                <span class="text-muted"><?php echo htmlspecialchars($displaySchedule, ENT_QUOTES, 'UTF-8'); ?></span>
            </div>
            <?php if ($statusKey === 'cancelled' && $projectCancellationReason !== ''): ?>
            <div class="alert alert-danger mt-3 mb-0 py-2 px-3 small">
                <strong>Cancellation Reason:</strong> <?php echo htmlspecialchars($projectCancellationReason, ENT_QUOTES, 'UTF-8'); ?>
            </div>
            <?php endif; ?>
            <div class="d-flex flex-wrap gap-2 mt-3 pt-2 border-top">
                <?php if ($canViewAssessment): ?>
                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#assessmentPanel" aria-expanded="false" aria-controls="assessmentPanel" title="View Assessment Report">
                    <i class="bi bi-file-earmark-text me-1"></i>Assessment
                </button>
                <?php endif; ?>
                <?php if ($statusKey === 'drafting quotation'): ?>
                <a href="<?php echo htmlspecialchars($quotationsModuleUrl, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-sm btn-primary" title="Go to Quotations">
                    <i class="bi bi-box-arrow-up-right me-1"></i>Go to Quotation
                </a>
                <?php endif; ?>
                <?php if ($canViewQuotation): ?>
                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#projectQuotationPanel" aria-expanded="false" aria-controls="projectQuotationPanel" title="View Quotation">
                    <i class="bi bi-receipt me-1"></i><?php echo $statusKey === 'pending quotation approval' ? 'Show Quotation' : 'Quotation'; ?>
                </button>
                <?php endif; ?>
                <?php if ($statusKey === 'pending schedule'): ?>
                <a href="<?php echo htmlspecialchars($schedulesModuleUrl, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-sm btn-primary" title="Schedule Project">
                    <i class="bi bi-calendar-event me-1"></i>Schedule Project
                </a>
                <?php endif; ?>
            </div>
            <div id="overviewActionPanels" class="mt-3"></div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-lg-6"><div class="card border-0 shadow-sm h-100"><div class="card-header bg-white d-flex justify-content-between align-items-center"><strong>Assigned Team</strong><?php if ($canEditSchedule): ?><a href="<?php echo htmlspecialchars($schedulesModuleUrl, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-calendar-week me-1"></i>Edit Schedule</a><?php endif; ?></div><div class="card-body"><ul class="list-group list-group-flush" id="technicianList" style="display: none;"></ul><div id="technicianEmptyMsg" class="text-muted small"><?php echo $isPreparingStatus ? 'No technicians should be assigned while project is in Preparing.' : 'No technicians assigned yet.'; ?></div></div></div></div>
    </div>

    <?php if ($canViewTechnicianReports): ?>
    <div class="card border-0 shadow-sm mt-3">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <strong>Technician Reports</strong>
           
        </div>
        <div class="card-body">
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
                        $progressReports = array_filter($projectReports, function($r) { return $r['type'] === 'Progress Report'; });
                        if (!empty($progressReports)): 
                    ?>
                        <div class="row g-3">
                            <?php foreach ($progressReports as $report): ?>
                                <div class="col-12">
                                    <div class="border rounded p-3">
                                        <div class="d-flex flex-wrap justify-content-between gap-2 mb-2">
                                            <div>
                                                <strong><?php echo htmlspecialchars($report['technician'], ENT_QUOTES, 'UTF-8'); ?></strong>
                                                <div class="small text-muted">Submitted <?php echo htmlspecialchars($report['date'], ENT_QUOTES, 'UTF-8'); ?></div>
                                            </div>
                                        </div>
                                        <p class="mb-2 small text-muted"><?php echo htmlspecialchars($report['summary'], ENT_QUOTES, 'UTF-8'); ?></p>
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
                        $incidentReports = array_filter($projectReports, function($r) { return $r['type'] === 'Incident Report'; });
                        if (!empty($incidentReports)): 
                    ?>
                        <div class="row g-3">
                            <?php foreach ($incidentReports as $report): ?>
                                <div class="col-12">
                                    <div class="border rounded p-3">
                                        <div class="d-flex flex-wrap justify-content-between gap-2 mb-2">
                                            <div>
                                                <strong><?php echo htmlspecialchars($report['technician'], ENT_QUOTES, 'UTF-8'); ?></strong>
                                                <div class="small text-muted">Submitted <?php echo htmlspecialchars($report['date'], ENT_QUOTES, 'UTF-8'); ?></div>
                                            </div>
                                        </div>
                                        <p class="mb-2 small text-muted"><?php echo htmlspecialchars($report['summary'], ENT_QUOTES, 'UTF-8'); ?></p>
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

            <?php if ($canViewTaskBoard): ?>
            <hr>
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <h3 class="h6 mb-1 fw-bold">Tasks</h3>
                    <div class="small text-muted" id="taskProgressSummary">
                        <?php echo count(array_filter($projectTasks, static function ($task) {
                            $taskStatus = strtolower((string) ($task['status'] ?? ''));
                            return $taskStatus === 'done' || $taskStatus === 'completed';
                        })); ?>/<?php echo count($projectTasks); ?> task completed
                    </div>
                </div>
                <?php if ($statusKey !== 'completed'): ?>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#assignTaskModal">Assign Task</button>
                <?php endif; ?>
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
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <?php if ($canViewAssessment): ?>
    <div class="collapse mt-3" id="assessmentPanel">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white"><strong>Assessment Report</strong></div>
            <div class="card-body">
                <?php if ($projectAssessment !== null): ?>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6"><small class="text-muted d-block">Assessed By</small><strong><?php echo htmlspecialchars($projectAssessment['technician'], ENT_QUOTES, 'UTF-8'); ?></strong></div>
                        <div class="col-md-6"><small class="text-muted d-block">Assessment Date</small><strong><?php echo htmlspecialchars($projectAssessment['date'], ENT_QUOTES, 'UTF-8'); ?></strong></div>
                        <div class="col-md-6"><small class="text-muted d-block">Required Number of Technicians</small><strong><?php echo htmlspecialchars((string) ($projectAssessment['requiredTechnicians'] ?? 1), ENT_QUOTES, 'UTF-8'); ?></strong></div>
                        <div class="col-12"><small class="text-muted d-block">Assessment Summary</small><p class="mb-0"><?php echo htmlspecialchars($projectAssessment['summary'], ENT_QUOTES, 'UTF-8'); ?></p></div>
                    </div>

                    <div class="mb-3">
                        <small class="text-muted d-block mb-2"><strong>Key Findings</strong></small>
                        <ul class="small">
                            <?php foreach ($projectAssessment['findings'] as $finding): ?>
                                <li><?php echo htmlspecialchars($finding, ENT_QUOTES, 'UTF-8'); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <small class="text-muted d-block mb-2"><strong>Materials Needed</strong></small>
                            <div class="table-responsive border rounded">
                                <table class="table table-sm mb-0">
                                    <thead class="table-light"><tr><th>Material</th><th>Qty</th><th>Unit</th></tr></thead>
                                    <tbody>
                                    <?php foreach ($projectAssessment['materials'] as $material): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($material['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars((string) $material['qty'], ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?php echo htmlspecialchars($material['unit'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <small class="text-muted d-block mb-2"><strong>Project Timeline</strong></small>
                            <div class="border rounded p-3 bg-light">
                                <div class="text-center">
                                    <div class="h5 mb-1"><?php echo htmlspecialchars((string) $projectAssessment['estimatedDays'], ENT_QUOTES, 'UTF-8'); ?></div>
                                    <small class="text-muted">Estimated Working Days</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <small class="text-muted d-block mb-2"><strong>Assessment Photos</strong></small>
                        <div class="row g-2">
                            <?php foreach ($projectAssessment['photos'] as $photo): ?>
                                <div class="col-6 col-md-4 col-lg-3">
                                    <img src="<?php echo htmlspecialchars($assetBasePath . $photo, ENT_QUOTES, 'UTF-8'); ?>" alt="Assessment photo" class="img-fluid rounded border report-photo">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <p class="mb-0 text-muted">No assessment report is available for this project.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if ($canViewQuotation): ?>
    <div class="collapse mt-3" id="projectQuotationPanel">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <strong>Project Quotation</strong>
            </div>
            <div class="card-body">
                <?php if ($projectQuotation !== null): ?>
                    <div class="row g-3 mb-3 align-items-end">
                        <div class="col-md-4"><small class="text-muted d-block">Quotation ID</small><strong><?php echo htmlspecialchars($projectQuotation['id'], ENT_QUOTES, 'UTF-8'); ?></strong></div>
                        <div class="col-md-4"><small class="text-muted d-block">Client</small><strong><?php echo htmlspecialchars($projectQuotation['client'], ENT_QUOTES, 'UTF-8'); ?></strong></div>
                        <div class="col-md-4"><small class="text-muted d-block">Status</small><span class="badge <?php echo htmlspecialchars($projectQuotation['status'] === 'Approved' ? 'bg-success' : ($projectQuotation['status'] === 'Sent' ? 'bg-primary' : 'bg-secondary'), ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($projectQuotation['status'], ENT_QUOTES, 'UTF-8'); ?></span></div>
                    </div>

                    <div class="table-responsive border rounded">
                        <table class="table table-sm mb-0">
                            <thead class="table-light"><tr><th>Material</th><th>Qty</th><th>Unit</th><th class="text-end">Unit Cost</th><th class="text-end">Subtotal</th></tr></thead>
                            <tbody>
                            <?php foreach ($projectQuotation['materials'] as $material): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($material['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars((string) $material['qty'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($material['unit'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td class="text-end">PHP <?php echo number_format((float) $material['unitCost'], 2); ?></td>
                                    <td class="text-end">PHP <?php echo number_format((float) $material['qty'] * (float) $material['unitCost'], 2); ?></td>
                                </tr>
                            <?php endforeach; ?>
                                <tr class="table-light fw-bold">
                                    <td colspan="3">Labor Cost</td>
                                    <td class="text-end" colspan="2">PHP <?php echo number_format((float) $projectQuotation['laborCost'], 2); ?></td>
                                </tr>
                                <tr class="table-light fw-bold">
                                    <td colspan="3">Total</td>
                                    <td class="text-end" colspan="2">PHP <?php echo number_format((float) $quotationTotal, 2); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="mb-0 text-muted">No quotation is tied to this project yet.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    
</main>

<div class="modal fade" id="cancelProjectModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header">
                <h5 class="modal-title">Cancel Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-2">Are you sure you want to cancel this project?</p>
                <p class="small text-muted mb-3">Project: <?php echo htmlspecialchars($projectTitle, ENT_QUOTES, 'UTF-8'); ?></p>
                <label for="cancelProjectReason" class="form-label">Reason for cancellation</label>
                <textarea id="cancelProjectReason" class="form-control" rows="4" placeholder="Enter reason" required></textarea>
                <div class="invalid-feedback d-none" id="cancelProjectReasonError">Please provide a reason before confirming.</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Keep Project</button>
                <button type="button" class="btn btn-danger" id="confirmCancelProjectBtn">Confirm Cancel Project</button>
            </div>
        </div>
    </div>
</div>

<?php if ($canViewTaskBoard): ?>
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
                            <?php foreach ($projectTeam as $member): ?>
                                <option value="<?php echo htmlspecialchars($member, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($member, ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                            <?php if (empty($projectTeam)): ?>
                                <option value="">No technicians available</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="taskDueDate" class="form-label">Due Date</label>
                        <input type="date" id="taskDueDate" class="form-control">
                    </div>
                    <div class="col-12">
                        <label for="taskDescription" class="form-label">Task Description</label>
                        <textarea id="taskDescription" class="form-control" rows="4"></textarea>
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

<div class="modal fade" id="viewTaskModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow overflow-hidden">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Task Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-light">
                <div class="row g-3">
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
                        <div id="viewTaskDescription" class="border rounded p-3 bg-white">No description provided.</div>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const overviewActionPanels = document.getElementById('overviewActionPanels');
    const assessmentPanel = document.getElementById('assessmentPanel');
    const projectQuotationPanel = document.getElementById('projectQuotationPanel');

    if (overviewActionPanels) {
        if (assessmentPanel) {
            overviewActionPanels.appendChild(assessmentPanel);
        }
        if (projectQuotationPanel) {
            overviewActionPanels.appendChild(projectQuotationPanel);
        }
    }

    const projectTeam = <?php echo json_encode($projectTeam); ?>;
    const technicianList = document.getElementById('technicianList');
    const technicianEmptyMsg = document.getElementById('technicianEmptyMsg');
    const cancelProjectBtn = document.getElementById('cancelProjectBtn');
    const cancelProjectReason = document.getElementById('cancelProjectReason');
    const cancelProjectReasonError = document.getElementById('cancelProjectReasonError');
    const confirmCancelProjectBtn = document.getElementById('confirmCancelProjectBtn');
    const cancelProjectModalEl = document.getElementById('cancelProjectModal');
    const projectStatusBadge = document.querySelector('.compact-project-overview .badge.rounded-pill.px-3.py-2');
    const canViewTaskBoard = <?php echo json_encode($canViewTaskBoard, JSON_UNESCAPED_SLASHES); ?>;
    const isCompletedProject = <?php echo json_encode($statusKey === 'completed', JSON_UNESCAPED_SLASHES); ?>;
    const initialTasks = <?php echo json_encode(array_values($projectTasks), JSON_UNESCAPED_SLASHES); ?>;
    const assetImageBasePath = <?php echo json_encode(($baseUrl !== '' ? $baseUrl : '') . '/assets/img/', JSON_UNESCAPED_SLASHES); ?>;
    const taskTableBody = document.getElementById('taskTableBody');
    const tasksEmptyState = document.getElementById('tasksEmptyState');
    const saveTaskBtn = document.getElementById('saveTaskBtn');
    const taskTitle = document.getElementById('taskTitle');
    const taskAssignee = document.getElementById('taskAssignee');
    const taskDueDate = document.getElementById('taskDueDate');
    const taskDescription = document.getElementById('taskDescription');
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
        const key = String(status || '').toLowerCase();
        if (isCompletedProject) {
            return 'Completed';
        }

        return key === 'done' || key === 'completed' ? 'Completed' : 'Pending';
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
            accomplishedDate: isCompletedProject
                ? (task.accomplishedDate || task.dateCreated || new Date().toLocaleDateString('en-US', { month: 'short', day: '2-digit', year: 'numeric' }))
                : (task.accomplishedDate || ''),
        };
    }).sort(function (left, right) {
        return String(right.dateCreated || '').localeCompare(String(left.dateCreated || ''));
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
        return String(status || '').toLowerCase() === 'completed' ? 'bg-success' : 'bg-secondary';
    }

    function getTaskPreviewImageSource(task) {
        if (String(task.status || '').toLowerCase() !== 'completed') {
            return '';
        }

        return assetImageBasePath + 'imageSample.png';
    }

    function renderTasks() {
        if (!canViewTaskBoard || !taskTableBody) {
            return;
        }

        taskTableBody.innerHTML = tasks.map(function (task, index) {
            const isCompleted = String(task.status || '').toLowerCase() === 'completed';

            return '<tr>'
                + '<td>' + escapeHtml(task.title) + '</td>'
                + '<td>' + escapeHtml(task.assignee) + '</td>'
                + '<td>' + escapeHtml(task.dueDate || task.dateCreated) + '</td>'
                + '<td><span class="badge ' + taskStatusClass(task.status) + '">' + escapeHtml(task.status) + '</span></td>'
                + '<td class="text-start">'
                + '<button type="button" class="btn btn-sm btn-primary view-task-btn me-1" data-task-index="' + index + '" title="View Task"><i class="bi bi-eye"></i></button>'
                + (isCompleted || isCompletedProject
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
        if (summaryNode && canViewTaskBoard) {
            summaryNode.textContent = doneCount + '/' + tasks.length + ' task completed';
        }
    }

    let cancelProjectModal = null;
    if (cancelProjectModalEl && typeof bootstrap !== 'undefined') {
        cancelProjectModal = bootstrap.Modal.getOrCreateInstance(cancelProjectModalEl);
    }

    function renderTeam() {
        technicianList.innerHTML = '';
        
        if (projectTeam.length === 0) {
            technicianList.style.display = 'none';
            technicianEmptyMsg.style.display = 'block';
        } else {
            technicianList.style.display = 'block';
            technicianEmptyMsg.style.display = 'none';
            
            projectTeam.forEach((tech, index) => {
                const li = document.createElement('li');
                li.className = 'list-group-item d-flex justify-content-between align-items-center';
                li.innerHTML = `
                    <div>
                        ${tech}
                        ${index === 0 ? '<span class="badge bg-primary ms-2">Lead</span>' : ''}
                    </div>
                `;
                technicianList.appendChild(li);
            });
        }
    }

    if (confirmCancelProjectBtn) {
        confirmCancelProjectBtn.addEventListener('click', function () {
            const reason = cancelProjectReason ? cancelProjectReason.value.trim() : '';
            if (!reason) {
                if (cancelProjectReasonError) {
                    cancelProjectReasonError.classList.remove('d-none');
                }
                if (cancelProjectReason) {
                    cancelProjectReason.classList.add('is-invalid');
                    cancelProjectReason.focus();
                }
                return;
            }

            if (cancelProjectReasonError) {
                cancelProjectReasonError.classList.add('d-none');
            }
            if (cancelProjectReason) {
                cancelProjectReason.classList.remove('is-invalid');
            }

            if (projectStatusBadge) {
                projectStatusBadge.className = 'badge rounded-pill px-3 py-2 bg-danger';
                projectStatusBadge.textContent = 'Cancelled';
            }

            const mainContainer = document.querySelector('main.container');
            if (mainContainer) {
                const alertHtml = '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
                    + '<strong>Project cancelled.</strong> Reason: ' + reason.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
                    + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
                    + '</div>';
                mainContainer.insertAdjacentHTML('afterbegin', alertHtml);
            }

            if (cancelProjectBtn) {
                cancelProjectBtn.disabled = true;
                cancelProjectBtn.textContent = 'Project Cancelled';
            }

            if (cancelProjectModal) {
                cancelProjectModal.hide();
            }
        });
    }

    if (cancelProjectModalEl) {
        cancelProjectModalEl.addEventListener('hidden.bs.modal', function () {
            if (cancelProjectReasonError) {
                cancelProjectReasonError.classList.add('d-none');
            }
            if (cancelProjectReason) {
                cancelProjectReason.classList.remove('is-invalid');
            }
        });
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

            if (!title || !assignee || !dueDate || isCompletedProject) {
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

    renderTeam();
    renderTasks();
    updateTaskProgress();
});
</script>

<div class="container-fluid pb-4 px-4">
    <?php if ($statusKey !== 'cancelled'): ?>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-danger" id="cancelProjectBtn" data-bs-toggle="modal" data-bs-target="#cancelProjectModal">
                Cancel Project
            </button>
        </div>
    <?php endif; ?>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>


