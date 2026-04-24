<?php $pageTitle = 'Reports'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<?php
    $assetBasePath = (isset($baseUrl) && $baseUrl !== '' ? $baseUrl : '') . '/assets/img/';

    // Technician Reports Data
    $technicianReports = [
        [
            'id' => 'REP-001',
            'projectId' => 'PRJ-1001',
            'technician' => 'Mario Santos',
            'type' => 'Progress',
            'date' => 'Apr 12, 2026',
            'details' => 'Completed installation phase. AC unit installed and tested. Ready for final inspection.',
            'image' => $assetBasePath . 'imageSample.png',
            'estimatedDays' => null,
            'materials' => null
        ],
        [
            'id' => 'REP-002',
            'projectId' => 'PRJ-1002',
            'technician' => 'Carlo Reyes',
            'type' => 'Incident',
            'date' => 'Apr 10, 2026',
            'details' => 'Encountered delay due to faulty parts delivery. Expected to resume work on Apr 15.',
            'image' => $assetBasePath . 'imageSample.png',
            'estimatedDays' => null,
            'materials' => null
        ],
        [
            'id' => 'REP-003',
            'projectId' => 'PRJ-1003',
            'technician' => 'Juan Delgado',
            'type' => 'Assessment',
            'date' => 'Apr 09, 2026',
            'details' => 'Initial site assessment completed. System specifications noted. Client requirements confirmed.',
            'image' => $assetBasePath . 'imageSample.png',
            'estimatedDays' => 5,
            'materials' => [
                ['name' => 'AC Unit', 'quantity' => 1, 'unit' => 'pc'],
                ['name' => 'Copper Pipe', 'quantity' => 2, 'unit' => 'roll'],
                ['name' => 'Bracket', 'quantity' => 2, 'unit' => 'set'],
                ['name' => 'Circuit Breaker', 'quantity' => 1, 'unit' => 'pc'],
                ['name' => 'Flexible PVC', 'quantity' => 1, 'unit' => 'pc']
            ]
        ],
        [
            'id' => 'REP-004',
            'projectId' => 'PRJ-1004',
            'technician' => 'Ana Rodriguez',
            'type' => 'Progress',
            'date' => 'Apr 08, 2026',
            'details' => 'Ducting installation 60% complete. On schedule for completion by Apr 20.',
            'image' => $assetBasePath . 'imageSample.png',
            'estimatedDays' => null,
            'materials' => null
        ],
        [
            'id' => 'REP-005',
            'projectId' => 'PRJ-1005',
            'technician' => 'Mario Santos',
            'type' => 'Incident',
            'date' => 'Apr 07, 2026',
            'details' => 'Unforeseen issue encountered with electrical connections. Investigating solution with team.',
            'image' => $assetBasePath . 'imageSample.png',
            'estimatedDays' => null,
            'materials' => null
        ]
    ];

    // System Report Graph Data
    $systemReports = [
        'currentProjects' => [
            'requests' => 9,
            'ongoing' => 11,
            'pending' => 6,
            'completed' => 15,
        ],
        'months' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        'requestTrend' => [4, 6, 5, 7, 8, 9, 11, 10, 12, 13, 14, 15],
        'accomplishedTrend' => [2, 3, 4, 5, 5, 6, 7, 8, 10, 11, 13, 15],
        'years' => ['2022', '2023', '2024', '2025', '2026'],
        'requestTrendYearly' => [58, 74, 95, 121, 139],
        'accomplishedTrendYearly' => [41, 59, 78, 104, 126],
        'quotationStatus' => [
            ['client' => 'ACME Holdings', 'service' => 'Aircon Installation', 'status' => 'Approved', 'price' => 225000],
            ['client' => 'Metro Storage', 'service' => 'Ducting Installation', 'status' => 'Pending', 'price' => 168500],
            ['client' => 'Northline Foods', 'service' => 'Aircon Installation', 'status' => 'Approved', 'price' => 192000],
            ['client' => 'BluePeak IT', 'service' => 'Ducting Fabrication', 'status' => 'Pending', 'price' => 153750],
            ['client' => 'Vertex Plaza', 'service' => 'Aircon Installation', 'status' => 'Approved', 'price' => 207300],
            ['client' => 'Riverside Mall', 'service' => 'Ducting Installation', 'status' => 'Pending', 'price' => 176900],
        ],
        'completedProjects' => [
            ['projectId' => 'PRJ-1002', 'client' => 'J. Dela Cruz', 'leadTechnician' => 'Carlo Reyes', 'serviceType' => 'Aircon Repair', 'completedDate' => '2026-04-10'],
            ['projectId' => 'PRJ-1006', 'client' => 'Grand Arc Tower', 'leadTechnician' => 'Ana Rodriguez', 'serviceType' => 'Ducting Installation', 'completedDate' => '2026-04-14'],
            ['projectId' => 'PRJ-1011', 'client' => 'Northline Foods', 'leadTechnician' => 'Mario Santos', 'serviceType' => 'Aircon Installation', 'completedDate' => '2026-04-18'],
            ['projectId' => 'PRJ-1012', 'client' => 'Vertex Plaza', 'leadTechnician' => 'Juan Delgado', 'serviceType' => 'Aircon Installation', 'completedDate' => '2026-04-20'],
            ['projectId' => 'PRJ-1014', 'client' => 'Westline Depot', 'leadTechnician' => 'Ana Rodriguez', 'serviceType' => 'Ducting Fabrication', 'completedDate' => '2026-04-22'],
        ],
    ];
?>
<main class="container py-4 flex-grow-1">
    <h2 class="h4 fw-bold mb-3">Reports</h2>
    
    <div class="card border-0 shadow-sm">
        <!-- Tabs Navigation -->
        <ul class="nav nav-tabs" id="reportsTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="technician-tab" data-bs-toggle="tab" data-bs-target="#technician-pane" type="button" role="tab" aria-controls="technician-pane" aria-selected="true">Technician Reports</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="system-tab" data-bs-toggle="tab" data-bs-target="#system-pane" type="button" role="tab" aria-controls="system-pane" aria-selected="false">System Reports</button>
            </li>
        </ul>

        <!-- Tabs Content -->
        <div class="tab-content" id="reportsTabContent">
            <!-- Technician Reports Tab -->
            <div class="tab-pane fade show active" id="technician-pane" role="tabpanel" aria-labelledby="technician-tab" tabindex="0">
                <div class="p-3">
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                        <h3 class="h5 fw-bold mb-0">Technician Reports</h3>
                        <input type="search" id="technicianReportSearch" class="form-control form-control-sm" placeholder="Search reports..." style="max-width: 280px;">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Report ID</th>
                                    <th>Project ID</th>
                                    <th>Technician</th>
                                    <th>Type of Report</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="technicianReportsTableBody">
                                <?php foreach ($technicianReports as $report): ?>
                                    <tr>
                                        <td><code><?php echo htmlspecialchars($report['id'], ENT_QUOTES, 'UTF-8'); ?></code></td>
                                        <td><?php echo htmlspecialchars($report['projectId'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($report['technician'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><span class="badge bg-info"><?php echo htmlspecialchars($report['type'], ENT_QUOTES, 'UTF-8'); ?></span></td>
                                        <td><?php echo htmlspecialchars($report['date'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary viewReportBtn" 
                                                    data-id="<?php echo htmlspecialchars($report['id'], ENT_QUOTES, 'UTF-8'); ?>"
                                                    data-project="<?php echo htmlspecialchars($report['projectId'], ENT_QUOTES, 'UTF-8'); ?>"
                                                    data-technician="<?php echo htmlspecialchars($report['technician'], ENT_QUOTES, 'UTF-8'); ?>"
                                                    data-type="<?php echo htmlspecialchars($report['type'], ENT_QUOTES, 'UTF-8'); ?>"
                                                    data-date="<?php echo htmlspecialchars($report['date'], ENT_QUOTES, 'UTF-8'); ?>"
                                                    data-details="<?php echo htmlspecialchars($report['details'], ENT_QUOTES, 'UTF-8'); ?>"
                                                    data-image="<?php echo htmlspecialchars($report['image'], ENT_QUOTES, 'UTF-8'); ?>"
                                                    data-materials="<?php echo htmlspecialchars(json_encode($report['materials']), ENT_QUOTES, 'UTF-8'); ?>"
                                                    data-estimated-days="<?php echo htmlspecialchars($report['estimatedDays'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                                                    data-bs-toggle="modal" data-bs-target="#viewReportModal" title="View Details" aria-label="View Details"><i class="bi bi-eye"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- System Reports Tab -->
            <div class="tab-pane fade" id="system-pane" role="tabpanel" aria-labelledby="system-tab" tabindex="0">
                <div class="p-3">
                    <div class="row g-3">
                       
                        <div class="col-12">
                            <div class="card border-0 shadow-sm">
                                
                                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0 fw-bold">Current Projects Breakdown</h6>
                                    <div class="d-flex align-items-center gap-2 ms-auto justify-content-end">
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#generateReportModal">
                                            <i class="bi bi-file-earmark-text me-1"></i>Generate Report
                                        </button>
                                        <span class="text-muted small">Requests, Ongoing, Pending, Completed</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-lg-5">
                                            <div style="position: relative; height: 320px;">
                                                <canvas id="currentProjectsPie"></canvas>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="row g-2">
                                                <?php foreach ($systemReports['currentProjects'] as $label => $value): ?>
                                                    <div class="col-md-6">
                                                        <div class="border rounded p-3 bg-light d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <div class="fw-bold text-capitalize"><?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?></div>
                                                                <div class="text-muted small">Current project status</div>
                                                            </div>
                                                            <div class="fw-bold"><?php echo (int) $value; ?></div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="d-flex justify-content-end">
                                <div class="btn-group" role="group" aria-label="Report period toggle" id="reportPeriodToggle">
                                    <button type="button" class="btn btn-outline-primary btn-sm active" data-report-period="monthly">Monthly</button>
                                    <button type="button" class="btn btn-outline-primary btn-sm" data-report-period="yearly">Yearly</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0 fw-bold">Project Requests</h6>
                                </div>
                                <div class="card-body">
                                    <div style="position: relative; height: 300px;">
                                        <canvas id="requestTrendChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0 fw-bold">Accomplished Projects</h6>
                                </div>
                                <div class="card-body">
                                    <div style="position: relative; height: 300px;">
                                        <canvas id="accomplishedTrendChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0 fw-bold">Quotation Status</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Client</th>
                                                    <th>Service</th>
                                                    <th>Price</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($systemReports['quotationStatus'] as $quotation): ?>
                                                    <?php $statusKey = strtolower($quotation['status']); ?>
                                                    <tr>
                                                        <td><?php echo htmlspecialchars($quotation['client'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td><?php echo htmlspecialchars($quotation['service'], ENT_QUOTES, 'UTF-8'); ?></td>
                                                        <td>PHP <?php echo number_format((float) ($quotation['price'] ?? 0), 2); ?></td>
                                                        <td>
                                                            <span class="badge <?php echo $statusKey === 'approved' ? 'bg-success' : 'bg-warning text-dark'; ?>">
                                                                <?php echo htmlspecialchars($quotation['status'], ENT_QUOTES, 'UTF-8'); ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- View Report Modal -->
<div class="modal fade" id="viewReportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Report Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                <div class="row g-3">
                    <div class="col-md-7">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Report ID</label>
                                <p id="reportDetailId" class="form-control-plaintext mb-0"></p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Project ID</label>
                                <p id="reportDetailProject" class="form-control-plaintext mb-0"></p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Technician</label>
                                <p id="reportDetailTechnician" class="form-control-plaintext mb-0"></p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Type of Report</label>
                                <p id="reportDetailType" class="form-control-plaintext mb-0"></p>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Date</label>
                                <p id="reportDetailDate" class="form-control-plaintext mb-0"></p>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Details</label>
                                <p id="reportDetailContent" class="form-control-plaintext mb-0"></p>
                            </div>
                            <div class="col-12" id="estimatedDaysSection" style="display: none;">
                                <label class="form-label fw-bold">Estimated Working Days</label>
                                <p id="reportEstimatedDays" class="form-control-plaintext mb-0"></p>
                            </div>
                            <div class="col-12" id="materialsSection" style="display: none;">
                                <label class="form-label fw-bold">Materials Needed</label>
                                <div class="table-responsive">
                                    <table class="table table-sm table-hover mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Material</th>
                                                <th>Quantity</th>
                                                <th>Unit</th>
                                            </tr>
                                        </thead>
                                        <tbody id="reportMaterialsList">
                                            <!-- Materials will be inserted here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <label class="form-label fw-bold">Attached Image</label>
                        <div id="reportAttachment" class="border rounded p-2 bg-light text-center">
                            <img id="reportImage" src="" alt="Report attachment" class="img-fluid rounded w-100">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="generateReportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header">
                <h5 class="modal-title">Generate Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="generateReportForm" class="needs-validation" novalidate>
                <div class="modal-body">
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label for="reportTypeInput" class="form-label">Report Type</label>
                            <select id="reportTypeInput" class="form-select" required>
                                <option value="" selected disabled>Select report type</option>
                                <option value="Completed Projects">Completed Projects</option>
                                <option value="Project Requests">Project Requests</option>
                                <option value="Technician Reports">Technician Reports</option>
                                <option value="Quotation Report">Quotation Report</option>
                            </select>
                            <div class="invalid-feedback">Report type is required.</div>
                        </div>
                        <div class="col-md-4">
                            <label for="reportStartDateInput" class="form-label">Start Date</label>
                            <input type="date" id="reportStartDateInput" class="form-control" required>
                            <div class="invalid-feedback">Start date is required.</div>
                        </div>
                        <div class="col-md-4">
                            <label for="reportEndDateInput" class="form-label">End Date</label>
                            <input type="date" id="reportEndDateInput" class="form-control" required>
                            <div class="invalid-feedback">End date is required.</div>
                        </div>
                        <div class="col-md-4" id="reportTechnicianWrap" style="display: none;">
                            <label for="reportTechnicianInput" class="form-label">Technician</label>
                            <select id="reportTechnicianInput" class="form-select">
                                <option value="" selected disabled>Select technician</option>
                                <option value="Mario Santos">Mario Santos</option>
                                <option value="Carlo Reyes">Carlo Reyes</option>
                                <option value="Juan Delgado">Juan Delgado</option>
                                <option value="Ana Rodriguez">Ana Rodriguez</option>
                            </select>
                            <div class="invalid-feedback">Please select a technician.</div>
                        </div>
                    </div>

                    <div id="generatedReportResult" class="border rounded p-3 bg-light" style="display: none;">
                        <div class="bg-white border rounded p-4" id="generatedReportPreview">
                            <div class="d-flex align-items-center justify-content-between gap-3 pb-3 border-bottom">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="<?php echo htmlspecialchars($assetBasePath . 'coliconstruct-logo.svg', ENT_QUOTES, 'UTF-8'); ?>" alt="Coliconstruct Logo" style="width: 60px; height: 60px; object-fit: contain;">
                                    <div>
                                        <div class="fw-bold fs-5 text-dark">Coliconstruct Engineering Services</div>
                                        <div class="text-muted small">Technical and Project Management Report</div>
                                    </div>
                                </div>
                                <div class="text-end small text-muted">
                                    <div>Generated on <span id="generatedReportCreatedAt"></span></div>
                                </div>
                            </div>
                            <div class="pt-3">
                                <h5 class="fw-bold mb-3" id="generatedReportTitle">Report</h5>
                                <div class="row g-2 mb-3 small">
                                    <div class="col-12"><strong>Report Type:</strong> <span id="generatedReportType"></span></div>
                                    <div class="col-12"><strong>Date Range:</strong> <span id="generatedReportDateRange"></span></div>
                                </div>
                                <div id="generatedReportBody" class="small"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-outline-secondary" id="printGeneratedReportBtn" disabled>Print</button>
                        <button type="button" class="btn btn-outline-success" id="exportGeneratedReportBtn" disabled>Export</button>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Generate</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
<script>
    let requestTrendChartInstance = null;
    let accomplishedTrendChartInstance = null;
    let activeReportPeriod = 'monthly';

    const monthlyLabels = <?php echo json_encode($systemReports['months']); ?>;
    const monthlyRequestTrend = <?php echo json_encode($systemReports['requestTrend']); ?>;
    const monthlyAccomplishedTrend = <?php echo json_encode($systemReports['accomplishedTrend']); ?>;

    const yearlyLabels = <?php echo json_encode($systemReports['years']); ?>;
    const yearlyRequestTrend = <?php echo json_encode($systemReports['requestTrendYearly']); ?>;
    const yearlyAccomplishedTrend = <?php echo json_encode($systemReports['accomplishedTrendYearly']); ?>;
    const quotationStatusData = <?php echo json_encode($systemReports['quotationStatus']); ?>;
    const technicianProjectsData = <?php echo json_encode($technicianReports); ?>;
    const completedProjectsData = <?php echo json_encode($systemReports['completedProjects']); ?>;

    document.querySelectorAll('.viewReportBtn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.getElementById('reportDetailId').textContent = this.dataset.id;
            document.getElementById('reportDetailProject').textContent = this.dataset.project;
            document.getElementById('reportDetailTechnician').textContent = this.dataset.technician;
            document.getElementById('reportDetailType').textContent = this.dataset.type;
            document.getElementById('reportDetailDate').textContent = this.dataset.date;
            document.getElementById('reportDetailContent').textContent = this.dataset.details;

            document.getElementById('reportImage').src = this.dataset.image || '<?php echo htmlspecialchars($assetBasePath . 'imageSample.png', ENT_QUOTES, 'UTF-8'); ?>';

            // Display Materials and Estimated Days (Assessment only)
            const reportType = this.dataset.type;
            const materials = JSON.parse(this.dataset.materials || 'null');
            const estimatedDays = this.dataset.estimatedDays;

            const materialsSection = document.getElementById('materialsSection');
            const estimatedDaysSection = document.getElementById('estimatedDaysSection');

            if (reportType === 'Assessment' && materials) {
                materialsSection.style.display = 'block';
                const materialsList = document.getElementById('reportMaterialsList');
                materialsList.innerHTML = '';
                materials.forEach(mat => {
                    const row = document.createElement('tr');
                    row.innerHTML = `<td>${esc(mat.name)}</td><td>${mat.quantity}</td><td>${esc(mat.unit)}</td>`;
                    materialsList.appendChild(row);
                });

                if (estimatedDays) {
                    estimatedDaysSection.style.display = 'block';
                    document.getElementById('reportEstimatedDays').textContent = estimatedDays + ' days';
                } else {
                    estimatedDaysSection.style.display = 'none';
                }
            } else {
                materialsSection.style.display = 'none';
                estimatedDaysSection.style.display = 'none';
            }
        });
    });

    const technicianReportSearch = document.getElementById('technicianReportSearch');
    if (technicianReportSearch) {
        technicianReportSearch.addEventListener('input', function () {
            const query = this.value.toLowerCase().trim();
            document.querySelectorAll('#technicianReportsTableBody tr').forEach(function (row) {
                row.style.display = row.textContent.toLowerCase().includes(query) ? '' : 'none';
            });
        });
    }

    const currentProjectsPieCanvas = document.getElementById('currentProjectsPie');
    if (currentProjectsPieCanvas) {
        new Chart(currentProjectsPieCanvas, {
            type: 'doughnut',
            data: {
                labels: ['Requests', 'Ongoing', 'Pending', 'Completed'],
                datasets: [{
                    data: [
                        <?php echo (int) $systemReports['currentProjects']['requests']; ?>,
                        <?php echo (int) $systemReports['currentProjects']['ongoing']; ?>,
                        <?php echo (int) $systemReports['currentProjects']['pending']; ?>,
                        <?php echo (int) $systemReports['currentProjects']['completed']; ?>
                    ],
                    backgroundColor: ['#0d6efd', '#198754', '#fd7e14', '#6f42c1'],
                    borderWidth: 0,
                    hoverOffset: 6,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '62%',
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    }

    const requestTrendCanvas = document.getElementById('requestTrendChart');
    if (requestTrendCanvas) {
        requestTrendChartInstance = new Chart(requestTrendCanvas, {
            type: 'line',
            data: {
                labels: monthlyLabels,
                datasets: [{
                    label: 'Requests',
                    data: monthlyRequestTrend,
                    borderColor: '#0d6efd',
                    backgroundColor: 'rgba(13, 110, 253, 0.12)',
                    tension: 0.35,
                    fill: true,
                    pointBackgroundColor: '#0d6efd',
                    pointRadius: 4,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    const accomplishedTrendCanvas = document.getElementById('accomplishedTrendChart');
    if (accomplishedTrendCanvas) {
        accomplishedTrendChartInstance = new Chart(accomplishedTrendCanvas, {
            type: 'line',
            data: {
                labels: monthlyLabels,
                datasets: [{
                    label: 'Completed Projects',
                    data: monthlyAccomplishedTrend,
                    borderColor: '#198754',
                    backgroundColor: 'rgba(25, 135, 84, 0.12)',
                    tension: 0.35,
                    fill: true,
                    pointBackgroundColor: '#198754',
                    pointRadius: 4,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    const reportPeriodToggleButtons = document.querySelectorAll('#reportPeriodToggle [data-report-period]');
    reportPeriodToggleButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const selectedPeriod = button.getAttribute('data-report-period') || 'monthly';
            activeReportPeriod = selectedPeriod;
            reportPeriodToggleButtons.forEach(function (btn) {
                btn.classList.toggle('active', btn === button);
            });

            const nextLabels = selectedPeriod === 'yearly' ? yearlyLabels : monthlyLabels;
            const nextRequestData = selectedPeriod === 'yearly' ? yearlyRequestTrend : monthlyRequestTrend;
            const nextAccomplishedData = selectedPeriod === 'yearly' ? yearlyAccomplishedTrend : monthlyAccomplishedTrend;

            if (requestTrendChartInstance) {
                requestTrendChartInstance.data.labels = nextLabels;
                requestTrendChartInstance.data.datasets[0].data = nextRequestData;
                requestTrendChartInstance.update();
            }

            if (accomplishedTrendChartInstance) {
                accomplishedTrendChartInstance.data.labels = nextLabels;
                accomplishedTrendChartInstance.data.datasets[0].data = nextAccomplishedData;
                accomplishedTrendChartInstance.update();
            }
        });
    });

    const generateReportModalEl = document.getElementById('generateReportModal');
    const generateReportForm = document.getElementById('generateReportForm');
    const reportTypeInput = document.getElementById('reportTypeInput');
    const reportStartDateInput = document.getElementById('reportStartDateInput');
    const reportEndDateInput = document.getElementById('reportEndDateInput');
    const reportTechnicianWrap = document.getElementById('reportTechnicianWrap');
    const reportTechnicianInput = document.getElementById('reportTechnicianInput');
    const generatedReportResult = document.getElementById('generatedReportResult');
    const generatedReportPreview = document.getElementById('generatedReportPreview');
    const generatedReportTitle = document.getElementById('generatedReportTitle');
    const generatedReportType = document.getElementById('generatedReportType');
    const generatedReportDateRange = document.getElementById('generatedReportDateRange');
    const generatedReportCreatedAt = document.getElementById('generatedReportCreatedAt');
    const generatedReportBody = document.getElementById('generatedReportBody');
    const printGeneratedReportBtn = document.getElementById('printGeneratedReportBtn');
    const exportGeneratedReportBtn = document.getElementById('exportGeneratedReportBtn');

    function setReportActionButtonsEnabled(enabled) {
        if (printGeneratedReportBtn) {
            printGeneratedReportBtn.disabled = !enabled;
        }
        if (exportGeneratedReportBtn) {
            exportGeneratedReportBtn.disabled = !enabled;
        }
    }

    function formatDateForReport(dateValue) {
        if (!dateValue) {
            return '';
        }
        const parsedDate = new Date(dateValue + 'T00:00:00');
        if (Number.isNaN(parsedDate.getTime())) {
            return dateValue;
        }
        return parsedDate.toLocaleDateString('en-US', { month: 'short', day: '2-digit', year: 'numeric' });
    }

    function parseReportDateValue(dateValue) {
        if (!dateValue) {
            return null;
        }
        const parsed = new Date(dateValue);
        return Number.isNaN(parsed.getTime()) ? null : parsed;
    }

    function isDateWithinRange(dateValue, startDateValue, endDateValue) {
        const targetDate = parseReportDateValue(dateValue);
        const startDate = parseReportDateValue(startDateValue);
        const endDate = parseReportDateValue(endDateValue);

        if (!targetDate || !startDate || !endDate) {
            return false;
        }

        targetDate.setHours(0, 0, 0, 0);
        startDate.setHours(0, 0, 0, 0);
        endDate.setHours(23, 59, 59, 999);

        return targetDate >= startDate && targetDate <= endDate;
    }

    function getBlueTableHeadClass() {
        return 'style="background-color: #0d6efd; color: #ffffff;"';
    }

    function buildTrendTableMarkup(title, labels, values) {
        if (!labels.length || !values.length) {
            return '<p class="mb-0">No data available for ' + esc(title) + '.</p>';
        }

        const rows = labels.map(function (label, index) {
            return '<tr><td>' + esc(label) + '</td><td>' + Number(values[index] || 0) + '</td></tr>';
        }).join('');

        return '<div class="table-responsive"><table class="table table-sm table-bordered mb-0">'
            + '<thead ' + getBlueTableHeadClass() + '><tr><th>Period</th><th>Total</th></tr></thead>'
            + '<tbody>' + rows + '</tbody>'
            + '</table></div>';
    }

    function buildTechnicianProjectsTableMarkup(selectedTechnician, startDateValue, endDateValue) {
        const filteredRows = technicianProjectsData.filter(function (item) {
            const technicianMatches = (item.technician || '') === selectedTechnician;
            return technicianMatches && isDateWithinRange(item.date, startDateValue, endDateValue);
        });

        if (!filteredRows.length) {
            return '<p class="mb-0">No technician projects found for the selected technician and date range.</p>';
        }

        const rows = filteredRows.map(function (item) {
            return '<tr>'
                + '<td>' + esc(item.id || '') + '</td>'
                + '<td>' + esc(item.projectId || '') + '</td>'
                + '<td>' + esc(item.technician || '') + '</td>'
                + '<td>' + esc(item.type || '') + '</td>'
                + '<td>' + esc(item.date || '') + '</td>'
                + '</tr>';
        }).join('');

        return '<div class="table-responsive"><table class="table table-sm table-bordered mb-0">'
            + '<thead ' + getBlueTableHeadClass() + '><tr><th>Report ID</th><th>Project ID</th><th>Technician</th><th>Type</th><th>Date</th></tr></thead>'
            + '<tbody>' + rows + '</tbody>'
            + '</table></div>';
    }

    function buildCompletedProjectsTableMarkup(startDateValue, endDateValue) {
        const filteredRows = completedProjectsData.filter(function (item) {
            return isDateWithinRange(item.completedDate, startDateValue, endDateValue);
        });

        if (!filteredRows.length) {
            return '<p class="mb-0">No completed projects found within the selected date range.</p>';
        }

        const rows = filteredRows.map(function (item) {
            return '<tr>'
                + '<td>' + esc(item.projectId || '') + '</td>'
                + '<td>' + esc(item.client || '') + '</td>'
                + '<td>' + esc(item.leadTechnician || '') + '</td>'
                + '<td>' + esc(item.serviceType || '') + '</td>'
                + '<td>' + esc(formatDateForReport(item.completedDate || '')) + '</td>'
                + '</tr>';
        }).join('');

        return '<div class="table-responsive"><table class="table table-sm table-bordered mb-0">'
            + '<thead ' + getBlueTableHeadClass() + '><tr><th>Project ID</th><th>Client</th><th>Lead Technician</th><th>Service Type</th><th>Completed Date</th></tr></thead>'
            + '<tbody>' + rows + '</tbody>'
            + '</table></div>';
    }

    function buildQuotationTableMarkup() {
        if (!quotationStatusData.length) {
            return '<p class="mb-0">No quotation data available.</p>';
        }
        return '<div class="table-responsive"><table class="table table-sm table-bordered mb-0">'
            + '<thead ' + getBlueTableHeadClass() + '><tr><th>Client</th><th>Service</th><th>Price</th><th>Status</th></tr></thead><tbody>'
            + quotationStatusData.map(function (row) {
                const status = (row.status || '').toLowerCase();
                const statusClass = status === 'approved' ? 'bg-success' : 'bg-warning text-dark';
                const price = Number(row.price || 0);
                const formattedPrice = 'PHP ' + price.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                return '<tr><td>' + esc(row.client || '') + '</td><td>' + esc(row.service || '') + '</td><td>' + formattedPrice + '</td><td><span class="badge ' + statusClass + '">' + esc(row.status || '') + '</span></td></tr>';
            }).join('')
            + '</tbody></table></div>';
    }

    function buildGeneratedReportBody(reportType, startDateValue, endDateValue, selectedTechnician) {
        const periodLabel = activeReportPeriod === 'yearly' ? 'Yearly' : 'Monthly';
        const labels = periodLabel === 'Yearly' ? yearlyLabels : monthlyLabels;
        const requestData = periodLabel === 'Yearly' ? yearlyRequestTrend : monthlyRequestTrend;

        if (reportType === 'Completed Projects') {
            return buildCompletedProjectsTableMarkup(startDateValue, endDateValue);
        }
        if (reportType === 'Project Requests') {
            return buildTrendTableMarkup('Project Requests (' + periodLabel + ')', labels, requestData);
        }
        if (reportType === 'Technician Reports') {
            return buildTechnicianProjectsTableMarkup(selectedTechnician, startDateValue, endDateValue);
        }
        if (reportType === 'Quotation Report') {
            return buildQuotationTableMarkup();
        }
        return '<p class="mb-0">No report body available.</p>';
    }

    if (reportTypeInput) {
        reportTypeInput.addEventListener('change', function () {
            const selectedType = reportTypeInput.value;
            const requiresTechnician = selectedType === 'Technician Reports';

            if (reportTechnicianWrap) {
                reportTechnicianWrap.style.display = requiresTechnician ? '' : 'none';
            }

            if (reportTechnicianInput) {
                reportTechnicianInput.required = requiresTechnician;
                if (!requiresTechnician) {
                    reportTechnicianInput.value = '';
                }
            }
        });
    }

    if (generateReportForm) {
        generateReportForm.addEventListener('submit', function (event) {
            event.preventDefault();

            const hasValidDateRange = !reportStartDateInput || !reportEndDateInput || !reportStartDateInput.value || !reportEndDateInput.value || reportEndDateInput.value >= reportStartDateInput.value;
            if (!hasValidDateRange && reportEndDateInput) {
                reportEndDateInput.setCustomValidity('End date must be on or after start date.');
            } else if (reportEndDateInput) {
                reportEndDateInput.setCustomValidity('');
            }

            if (!generateReportForm.checkValidity()) {
                generateReportForm.classList.add('was-validated');
                return;
            }

            const selectedType = reportTypeInput ? reportTypeInput.value : '';
            const selectedTechnician = reportTechnicianInput ? reportTechnicianInput.value : '';
            const startDateLabel = formatDateForReport(reportStartDateInput ? reportStartDateInput.value : '');
            const endDateLabel = formatDateForReport(reportEndDateInput ? reportEndDateInput.value : '');
            const generatedAtLabel = new Date().toLocaleString('en-US', {
                month: 'short', day: '2-digit', year: 'numeric', hour: '2-digit', minute: '2-digit'
            });

            if (generatedReportType) {
                generatedReportType.textContent = selectedType;
            }
            if (generatedReportTitle) {
                generatedReportTitle.textContent = selectedType + ' Report';
            }
            if (generatedReportDateRange) {
                generatedReportDateRange.textContent = startDateLabel + ' - ' + endDateLabel;
            }
            if (generatedReportCreatedAt) {
                generatedReportCreatedAt.textContent = generatedAtLabel;
            }
            if (generatedReportBody) {
                generatedReportBody.innerHTML = buildGeneratedReportBody(
                    selectedType,
                    reportStartDateInput ? reportStartDateInput.value : '',
                    reportEndDateInput ? reportEndDateInput.value : '',
                    selectedTechnician
                );
            }
            if (generatedReportResult) {
                generatedReportResult.style.display = 'block';
            }
            setReportActionButtonsEnabled(true);
        });
    }

    if (printGeneratedReportBtn) {
        printGeneratedReportBtn.addEventListener('click', function () {
            if (!generatedReportPreview || !generatedReportResult || generatedReportResult.style.display === 'none') {
                return;
            }

            const printWindow = window.open('', '_blank');
            if (!printWindow) {
                return;
            }
            printWindow.document.write('<!doctype html><html><head><meta charset="utf-8"><title>Generated Report</title>');
            printWindow.document.write('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">');
            printWindow.document.write('</head><body class="p-4 bg-white">' + generatedReportPreview.outerHTML + '</body></html>');
            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
        });
    }

    if (exportGeneratedReportBtn) {
        exportGeneratedReportBtn.addEventListener('click', function () {
            if (!generatedReportPreview || !generatedReportType || !generatedReportDateRange) {
                return;
            }

            const exportHtml = '<!doctype html><html><head><meta charset="utf-8"><title>Generated Report</title>'
                + '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">'
                + '</head><body class="p-4 bg-white">' + generatedReportPreview.outerHTML + '</body></html>';
            const exportBlob = new Blob([exportHtml], { type: 'text/html;charset=utf-8' });
            const exportUrl = URL.createObjectURL(exportBlob);
            const exportLink = document.createElement('a');
            exportLink.href = exportUrl;
            exportLink.download = 'generated-report.html';
            document.body.appendChild(exportLink);
            exportLink.click();
            exportLink.remove();
            URL.revokeObjectURL(exportUrl);
        });
    }

    if (generateReportModalEl) {
        generateReportModalEl.addEventListener('hidden.bs.modal', function () {
            if (generateReportForm) {
                generateReportForm.reset();
                generateReportForm.classList.remove('was-validated');
            }
            if (generatedReportResult) {
                generatedReportResult.style.display = 'none';
            }
            if (reportEndDateInput) {
                reportEndDateInput.setCustomValidity('');
            }
            if (reportTechnicianWrap) {
                reportTechnicianWrap.style.display = 'none';
            }
            if (reportTechnicianInput) {
                reportTechnicianInput.required = false;
            }
            setReportActionButtonsEnabled(false);
        });
    }

    function esc(str) {
        const d = document.createElement('div');
        d.textContent = str;
        return d.innerHTML;
    }
</script>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
