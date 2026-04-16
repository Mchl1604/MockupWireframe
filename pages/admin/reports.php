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
        'approvedQuotationsTrend' => [
            120000, 135000, 128000, 142000, 155000, 167000, 160000, 178000, 186000, 194000, 210000, 225000,
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
                                    <span class="text-muted small">Requests, Ongoing, Pending, Completed</span>
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

                        <div class="col-lg-6">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0 fw-bold">Request Trend</h6>
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
                                    <h6 class="mb-0 fw-bold">Accomplished Project Trend</h6>
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
                                    <h6 class="mb-0 fw-bold">Approved Quotations Trend</h6>
                                </div>
                                <div class="card-body">
                                    <div style="position: relative; height: 320px;">
                                        <canvas id="approvedQuotationsChart"></canvas>
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

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
<script>
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
        new Chart(requestTrendCanvas, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($systemReports['months']); ?>,
                datasets: [{
                    label: 'Requests',
                    data: <?php echo json_encode($systemReports['requestTrend']); ?>,
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
        new Chart(accomplishedTrendCanvas, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($systemReports['months']); ?>,
                datasets: [{
                    label: 'Completed Projects',
                    data: <?php echo json_encode($systemReports['accomplishedTrend']); ?>,
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

    const approvedQuotationsCanvas = document.getElementById('approvedQuotationsChart');
    if (approvedQuotationsCanvas) {
        new Chart(approvedQuotationsCanvas, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($systemReports['months']); ?>,
                datasets: [{
                    label: 'Approved Quotations Amount',
                    data: <?php echo json_encode($systemReports['approvedQuotationsTrend']); ?>,
                    borderColor: '#fd7e14',
                    backgroundColor: 'rgba(253, 126, 20, 0.12)',
                    tension: 0.35,
                    fill: true,
                    pointBackgroundColor: '#fd7e14',
                    pointRadius: 4,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '₱' + value.toLocaleString();
                            }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return '₱' + Number(context.raw).toLocaleString();
                            }
                        }
                    }
                }
            }
        });
    }

    function esc(str) {
        const d = document.createElement('div');
        d.textContent = str;
        return d.innerHTML;
    }
</script>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
