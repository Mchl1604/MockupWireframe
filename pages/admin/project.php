<?php $pageTitle = 'Admin Project Details'; ?>
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
];
$canViewQuotation = in_array($statusKey, ['ongoing', 'completed', 'to be approved', 'quotation to be approved', 'pending'], true);

$projectMetadata = [
    'PRJ-1001' => ['client' => 'ACME Holdings', 'service' => 'VRF System Installation', 'timeline' => 'Apr 10 - Apr 18', 'target' => 'Apr 18, 2026'],
    'PRJ-1002' => ['client' => 'J. Dela Cruz', 'service' => 'AC Unit Repair', 'timeline' => 'Apr 05 - Apr 10', 'target' => 'Apr 10, 2026'],
    'PRJ-1003' => ['client' => 'Metro Storage', 'service' => 'Ductwork Installation', 'timeline' => 'Apr 15 - Apr 25', 'target' => 'Apr 25, 2026'],
    'PRJ-1004' => ['client' => 'Northline Foods', 'service' => 'Split-Type AC Unit Installation', 'timeline' => 'Pending Assessment', 'target' => 'TBD'],
    'PRJ-1005' => ['client' => 'BluePeak IT', 'service' => 'Ventilation System Retrofit', 'timeline' => 'May 01 - May 10', 'target' => 'May 10, 2026'],
    'PRJ-1006' => ['client' => 'Grand Arc Tower', 'service' => 'Ventilation System Inspection', 'timeline' => 'Apr 12 - Apr 14', 'target' => 'Apr 14, 2026'],
];
$currentProject = $projectMetadata[$id] ?? ['client' => 'Unknown', 'service' => 'Service Type', 'timeline' => 'TBD', 'target' => 'TBD'];

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
    'PRJ-1001' => ['Engr. Mario Santos', 'Tech. Carlo Reyes'],
    'PRJ-1002' => ['Tech. Lito Ramos'],
    'PRJ-1003' => ['Engr. Mario Santos', 'Tech. Carlo Reyes', 'Tech. Anne Mendoza'],
    'PRJ-1004' => ['Tech. Carl Dominguez'],
    'PRJ-1005' => ['Engr. Mario Santos', 'Tech. John Gonzales'],
    'PRJ-1006' => ['Tech. Anne Mendoza', 'Tech. Lito Ramos'],
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
$leadTechnician = !empty($projectTeam) ? $projectTeam[0] : null;

$assessmentByProject = [
    'PRJ-1001' => [
        'date' => 'Apr 08, 2026',
        'technician' => 'Engr. Mario Santos',
        'summary' => 'VRF system assessment completed. Building has 3 zones requiring individual indoor units. Existing electrical capacity adequate. Installation timeline: 8 days.',
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
        'summary' => 'AC unit repair assessment. Identified failing capacitor and worn fan motor. Parts in stock. Estimated repair time: 3 hours.',
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
?>
<main class="container py-4 flex-grow-1">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 fw-bold mb-0">Project Details</h2>
        <a href="<?php echo htmlspecialchars(app_url('/admin/projects'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-outline-secondary btn-sm">Back to Projects</a>
    </div>

    <div class="card border-0 shadow-sm mb-3">
        <div class="card-body row g-3 align-items-start">
            <div class="col-md-4"><small class="text-muted d-block">Project ID</small><strong><?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?></strong></div>
            <div class="col-md-4"><small class="text-muted d-block">Client</small><strong><?php echo htmlspecialchars($currentProject['client'], ENT_QUOTES, 'UTF-8'); ?></strong></div>
            <div class="col-md-4"><small class="text-muted d-block">Status</small><span class="badge <?php echo htmlspecialchars($statusClassMap[$statusKey] ?? 'bg-light text-dark', ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($status, ENT_QUOTES, 'UTF-8'); ?></span></div>
            <div class="col-md-4"><small class="text-muted d-block">Service Type</small><strong><?php echo htmlspecialchars($currentProject['service'], ENT_QUOTES, 'UTF-8'); ?></strong></div>
            <div class="col-md-4"><small class="text-muted d-block">Timeline</small><strong class="d-block"><?php echo htmlspecialchars($currentProject['timeline'], ENT_QUOTES, 'UTF-8'); ?></strong></div>
            <div class="col-md-4"><small class="text-muted d-block">Target Completion</small><strong class="d-block"><?php echo htmlspecialchars($currentProject['target'], ENT_QUOTES, 'UTF-8'); ?></strong></div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-lg-6"><div class="card border-0 shadow-sm h-100"><div class="card-header bg-white d-flex justify-content-between align-items-center"><strong>Assigned Team</strong><button type="button" class="btn btn-sm btn-outline-primary" id="addTechnicianBtn"><i class="bi bi-plus-circle me-1"></i>Add</button></div><div class="card-body"><ul class="list-group list-group-flush" id="technicianList" style="display: none;"></ul><div id="technicianEmptyMsg" class="text-muted small">No technicians assigned yet.</div></div></div></div>
    </div>

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
        </div>
    </div>

    <?php if ($canViewAssessment): ?>
    <div class="mt-3">
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#assessmentPanel" aria-expanded="false" aria-controls="assessmentPanel">View Assessment Report</button>
    </div>
    <div class="collapse mt-3" id="assessmentPanel">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white"><strong>Assessment Report</strong></div>
            <div class="card-body">
                <?php if ($projectAssessment !== null): ?>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6"><small class="text-muted d-block">Assessed By</small><strong><?php echo htmlspecialchars($projectAssessment['technician'], ENT_QUOTES, 'UTF-8'); ?></strong></div>
                        <div class="col-md-6"><small class="text-muted d-block">Assessment Date</small><strong><?php echo htmlspecialchars($projectAssessment['date'], ENT_QUOTES, 'UTF-8'); ?></strong></div>
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
    <div class="mt-3">
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#projectQuotationPanel" aria-expanded="false" aria-controls="projectQuotationPanel">View Quotation</button>
    </div>
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
                        <div class="col-md-6"><small class="text-muted d-block">Labor Cost</small><strong class="d-block">PHP <?php echo number_format((float) $projectQuotation['laborCost'], 2); ?></strong></div>
                        <div class="col-md-6 text-md-end"><small class="text-muted d-block">Total</small><strong class="d-block">PHP <?php echo number_format((float) $quotationTotal, 2); ?></strong></div>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const projectTeam = <?php echo json_encode($projectTeam); ?>;
    const technicianList = document.getElementById('technicianList');
    const technicianEmptyMsg = document.getElementById('technicianEmptyMsg');
    const addTechnicianBtn = document.getElementById('addTechnicianBtn');

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
                    <button type="button" class="btn btn-sm btn-outline-danger remove-tech" data-index="${index}">Remove</button>
                `;
                technicianList.appendChild(li);
            });
        }
        
        document.querySelectorAll('.remove-tech').forEach(btn => {
            btn.addEventListener('click', function() {
                const index = this.getAttribute('data-index');
                projectTeam.splice(index, 1);
                renderTeam();
            });
        });
    }

    addTechnicianBtn.addEventListener('click', function() {
        const name = prompt('Enter technician name:');
        if (name && name.trim()) {
            projectTeam.push(name.trim());
            renderTeam();
        }
    });

    renderTeam();
});
</script>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
