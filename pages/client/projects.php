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
            'name' => 'Airon Installation - ACME Holdings',
            'serviceType' => 'Airon Installation',
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
            'name' => 'AC Repair - J. Dela Cruz',
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
            'name' => 'Ducting Systems - Metro Storage',
            'serviceType' => 'Ducting Systems',
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
            'description' => 'Awaiting schedule confirmation before onsite service deployment.',
            'quotation' => [],
            'progressReports' => [],
        ],
        [
            'id' => 'COL-2026-0008',
            'name' => 'Ventilation Upgrade - Zenith Tower',
            'serviceType' => 'Ducting Systems',
            'status' => 'In Progress',
            'timeline' => 'May 6, 2026 - May 14, 2026',
            'address' => 'Mandaluyong Business Park',
            'description' => 'Ongoing ducting retrofit for improved ventilation efficiency.',
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
            'name' => 'Airon Repair - Northline Foods',
            'serviceType' => 'Airon Repair',
            'status' => 'For Assessment',
            'timeline' => 'April 15, 2026',
            'address' => 'Quezon City Mall Complex',
            'description' => 'Initial site assessment for multiple air-conditioning units in the mall.',
            'quotation' => [],
            'progressReports' => [],
        ],
        [
            'id' => 'COL-2026-0005',
            'name' => 'Ducting Systems - BluePeak IT',
            'serviceType' => 'Ducting Systems',
            'status' => 'Pending',
            'timeline' => 'Apr 22, 2026 - Apr 30, 2026',
            'address' => 'Pasay Hotel District',
            'description' => 'Waiting for schedule confirmation and start date approval.',
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
            'name' => 'Airon Installation - Grand Arc Tower',
            'serviceType' => 'Airon Installation',
            'status' => 'For Approval',
            'timeline' => 'Apr 24, 2026 - Apr 30, 2026',
            'address' => 'Ortigas Center',
            'description' => 'Replacement project awaiting final approval before mobilization.',
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
                                        <button
                                            type="button"
                                            class="btn btn-outline-primary btn-sm"
                                            title="View Details"
                                            aria-label="View Details"
                                            data-project='<?php echo htmlspecialchars(json_encode($project), ENT_QUOTES, 'UTF-8'); ?>'
                                        >
                                            <i class="bi bi-eye"></i>
                                        </button>
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
                                        <button
                                            type="button"
                                            class="btn btn-outline-primary btn-sm"
                                            title="View Details"
                                            aria-label="View Details"
                                            data-project='<?php echo htmlspecialchars(json_encode($project), ENT_QUOTES, 'UTF-8'); ?>'
                                        >
                                            <i class="bi bi-eye"></i>
                                        </button>
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
                                        <button
                                            type="button"
                                            class="btn btn-outline-primary btn-sm"
                                            title="View Details"
                                            aria-label="View Details"
                                            data-project='<?php echo htmlspecialchars(json_encode($project), ENT_QUOTES, 'UTF-8'); ?>'
                                        >
                                            <i class="bi bi-eye"></i>
                                        </button>
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

    <div class="modal fade" id="projectViewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header">
                    <h5 class="modal-title">Project Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        
                        <div class="col-md-6"><small class="text-muted d-block">Project Name</small><strong id="pv-name"></strong></div>
                        <div class="col-md-6"><small class="text-muted d-block">Status</small><span id="pv-status" class="badge"></span></div>
                        <div class="col-md-6"><small class="text-muted d-block">Service</small><strong id="pv-service"></strong></div>
                        <div class="col-md-6" id="pv-timeline-wrap"><small class="text-muted d-block" id="pv-timeline-label">Estimated Timeline</small><strong id="pv-timeline"></strong></div>
                        <div class="col-md-6"><small class="text-muted d-block">Address</small><strong id="pv-address"></strong></div>
                        <div class="col-12"><small class="text-muted d-block">Description</small><p class="mb-0" id="pv-description"></p></div>
                        <div class="col-12 d-flex justify-content-start" id="pv-view-quotation-wrap">
                            <button type="button" class="btn btn-primary btn-sm" id="pv-view-quotation">View Quotation</button>
                        </div>
                        <div class="col-12" id="pv-quotation-section" style="display:none;">
                            <hr class="my-2">
                            <small class="text-muted d-block mb-2">Admin Quotation</small>
                            <div class="table-responsive border rounded mb-2">
                                <table class="table table-sm mb-0 align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Material</th>
                                            <th style="width: 110px;">Qty</th>
                                            <th style="width: 110px;">Unit</th>
                                            <th class="text-end" style="width: 130px;">Cost</th>
                                        </tr>
                                    </thead>
                                    <tbody id="pv-quotation-materials"></tbody>
                                </table>
                            </div>
                            <p class="small text-muted mb-2" id="pv-quotation-empty" style="display:none;">No quotation submitted by admin yet.</p>
                            <div class="row g-2" id="pv-quotation-summary" style="display:none;">
                                <div class="col-md-4"><small class="text-muted d-block">Material Cost</small><strong id="pv-materials-cost"></strong></div>
                                <div class="col-md-4"><small class="text-muted d-block">Labor Cost</small><strong id="pv-labor-cost"></strong></div>
                                <div class="col-md-4"><small class="text-muted d-block">Total Cost</small><strong id="pv-total-cost"></strong></div>
                            </div>
                            <div class="d-flex justify-content-end gap-2 mt-3" id="pv-quotation-actions" style="display:none;"></div>
                        </div>
                        <div class="col-12 mt-2" id="pv-progress-section">
                            <hr class="my-2">
                            <div class="fw-bold mb-2">Progress Report</div>
                            <div class="table-responsive border rounded">
                                <table class="table table-sm mb-0 align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 140px;">Date</th>
                                            <th>Report</th>
                                            <th style="width: 120px;">Picture</th>
                                        </tr>
                                    </thead>
                                    <tbody id="pv-progress-body"></tbody>
                                </table>
                            </div>
                            <p class="small text-muted mb-0 mt-2" id="pv-progress-empty" style="display:none;">No progress report submitted yet.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const projectButtons = document.querySelectorAll('[data-project]');
    const cancelButtons = document.querySelectorAll('[data-cancel-project]');
    const ongoingBody = document.getElementById('ongoing-projects-body');
    const completedBody = document.getElementById('completed-projects-body');
    const modalEl = document.getElementById('projectViewModal');
    if (!modalEl || typeof bootstrap === 'undefined') return;

    const modal = new bootstrap.Modal(modalEl);
    const viewQuotationWrap = modalEl.querySelector('#pv-view-quotation-wrap');
    const viewQuotationBtn = modalEl.querySelector('#pv-view-quotation');
    const quotationSection = modalEl.querySelector('#pv-quotation-section');
    const quotationMaterials = modalEl.querySelector('#pv-quotation-materials');
    const quotationEmpty = modalEl.querySelector('#pv-quotation-empty');
    const quotationSummary = modalEl.querySelector('#pv-quotation-summary');
    const materialCostEl = modalEl.querySelector('#pv-materials-cost');
    const laborCostEl = modalEl.querySelector('#pv-labor-cost');
    const totalCostEl = modalEl.querySelector('#pv-total-cost');
    const quotationActions = modalEl.querySelector('#pv-quotation-actions');
    const timelineWrap = modalEl.querySelector('#pv-timeline-wrap');
    const timelineLabel = modalEl.querySelector('#pv-timeline-label');
    const timelineValue = modalEl.querySelector('#pv-timeline');
    const progressSection = modalEl.querySelector('#pv-progress-section');
    const progressBody = modalEl.querySelector('#pv-progress-body');
    const progressEmpty = modalEl.querySelector('#pv-progress-empty');
    const progressImagePath = '<?php echo htmlspecialchars(($baseUrl !== '' ? $baseUrl : '') . '/assets/img/imageSample.png', ENT_QUOTES, 'UTF-8'); ?>';
    let activeProjectData = null;
    let activeProjectButton = null;

    function esc(str) {
        const d = document.createElement('div');
        d.textContent = str;
        return d.innerHTML;
    }

    function formatCurrency(value) {
        return 'PHP ' + Number(value || 0).toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    function applyStatusBadge(statusEl, status) {
        if (!statusEl) return;
        statusEl.textContent = status;
        statusEl.className = 'badge';
        if (status === 'Completed') statusEl.classList.add('bg-success');
        else if (status === 'In Progress') statusEl.classList.add('bg-primary');
        else if (status === 'Quotation Rejected' || status === 'Cancelled') statusEl.classList.add('bg-danger');
        else if (status === 'Pending' || status === 'Pending Schedule' || status === 'Scheduled') statusEl.classList.add('bg-secondary');
        else statusEl.classList.add('bg-warning', 'text-dark');
    }

    function normalizeStatus(status) {
        return String(status || '').trim().toLowerCase();
    }

    function oneDayFromTimeline(timeline) {
        const value = String(timeline || '').trim();
        if (!value) return '';
        if (value.indexOf('-') === -1) return value;
        return value.split('-')[0].trim();
    }

    function renderTimelineField(status, timeline) {
        if (!timelineWrap || !timelineLabel || !timelineValue) return;

        const statusKey = normalizeStatus(status);
        const hideTimeline = statusKey === 'for approval' || statusKey === 'awaiting quotation approval';

        if (hideTimeline) {
            timelineWrap.style.display = 'none';
            timelineValue.textContent = '';
            return;
        }

        timelineWrap.style.display = '';

        if (statusKey === 'for assessment') {
            timelineLabel.textContent = 'Assessment Schedule';
            timelineValue.textContent = oneDayFromTimeline(timeline) || 'TBD';
            return;
        }

        timelineLabel.textContent = 'Estimated Timeline';
        timelineValue.textContent = String(timeline || '').trim() || 'TBD';
    }

    function shouldShowQuotationButton(status) {
        const statusKey = normalizeStatus(status);
        const hideStatuses = ['for approval', 'for assessment'];
        return !hideStatuses.includes(statusKey);
    }

    function shouldShowProgressSection(status) {
        const statusKey = normalizeStatus(status);
        return statusKey === 'in progress' || statusKey === 'completed';
    }

    function parseProgressDate(value) {
        const parsed = Date.parse(String(value || '').trim());
        return Number.isNaN(parsed) ? 0 : parsed;
    }

    function createViewButton(projectData) {
        const button = document.createElement('button');
        button.type = 'button';
        button.className = 'btn btn-outline-primary btn-sm';
        button.title = 'View Details';
        button.setAttribute('aria-label', 'View Details');
        button.dataset.project = JSON.stringify(projectData);
        button.innerHTML = '<i class="bi bi-eye"></i>';

        button.addEventListener('click', function () {
            const data = JSON.parse(button.dataset.project || '{}');
            activeProjectData = data;
            activeProjectButton = button;
            const statusEl = modalEl.querySelector('#pv-status');
            const status = data.status || '';
            const progressReports = Array.isArray(data.progressReports) ? data.progressReports.slice() : [];

            if (quotationSection) quotationSection.style.display = 'none';
            if (viewQuotationBtn) viewQuotationBtn.textContent = 'View Quotation';
            if (quotationActions) quotationActions.innerHTML = '';

            const showQuotationButton = shouldShowQuotationButton(status);
            if (viewQuotationWrap) {
                viewQuotationWrap.style.display = showQuotationButton ? '' : 'none';
                viewQuotationWrap.hidden = !showQuotationButton;
            }
            if (viewQuotationBtn) {
                viewQuotationBtn.style.display = showQuotationButton ? '' : 'none';
                viewQuotationBtn.hidden = !showQuotationButton;
            }

            modalEl.querySelector('#pv-name').textContent = data.name || '';
            modalEl.querySelector('#pv-service').textContent = data.serviceType || '';
            modalEl.querySelector('#pv-address').textContent = data.address || '';
            modalEl.querySelector('#pv-description').textContent = data.description || '';
            renderTimelineField(status, data.timeline || '');

            if (progressSection) {
                progressSection.style.display = shouldShowProgressSection(status) ? '' : 'none';
            }

            progressReports.sort(function (left, right) {
                return parseProgressDate(right.date) - parseProgressDate(left.date);
            });

            if (progressBody) {
                if (progressReports.length === 0) {
                    progressBody.innerHTML = '';
                    if (progressEmpty) progressEmpty.style.display = '';
                } else {
                    if (progressEmpty) progressEmpty.style.display = 'none';
                    progressBody.innerHTML = progressReports.map(function (entry) {
                        return '<tr>' +
                            '<td class="small">' + esc(entry.date || '') + '</td>' +
                            '<td class="small">' + esc(entry.report || '') + '</td>' +
                            '<td class="small"><img src="' + esc(progressImagePath) + '" alt="Progress report photo" class="img-thumbnail" style="width:72px;height:72px;object-fit:cover;"></td>' +
                            '</tr>';
                    }).join('');
                }
            }

            applyStatusBadge(statusEl, status);
            renderQuotationActions();

            modal.show();
        });

        return button;
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

    function addCompletedRow(projectData) {
        if (!completedBody) return;
        const emptyRow = completedBody.querySelector('.js-empty-completed-row');
        if (emptyRow) emptyRow.remove();

        const row = document.createElement('tr');
        const timeline = String(projectData.timeline || '').trim() || 'TBD';

        const refCell = document.createElement('td');
        refCell.textContent = projectData.id || '';
        row.appendChild(refCell);

        const serviceCell = document.createElement('td');
        serviceCell.textContent = projectData.serviceType || '';
        row.appendChild(serviceCell);

        const timelineCell = document.createElement('td');
        timelineCell.textContent = timeline;
        row.appendChild(timelineCell);

        const actionCell = document.createElement('td');
        const viewButton = createViewButton(projectData);
        actionCell.appendChild(viewButton);
        row.appendChild(actionCell);

        completedBody.appendChild(row);
    }

    function updateProjectStatus(nextStatus) {
        if (!activeProjectData) return;
        activeProjectData.status = nextStatus;
        const statusEl = modalEl.querySelector('#pv-status');
        applyStatusBadge(statusEl, nextStatus);

        if (activeProjectButton) {
            activeProjectButton.dataset.project = JSON.stringify(activeProjectData);
            const rowStatusEl = activeProjectButton.closest('tr') ? activeProjectButton.closest('tr').querySelector('span.badge') : null;
            applyStatusBadge(rowStatusEl, nextStatus);
        }

        renderQuotationActions();
        if (viewQuotationWrap) {
            viewQuotationWrap.style.display = shouldShowQuotationButton(nextStatus) ? '' : 'none';
        }
        if (quotationSection && !shouldShowQuotationButton(nextStatus)) {
            quotationSection.style.display = 'none';
        }
        if (progressSection) {
            progressSection.style.display = shouldShowProgressSection(nextStatus) ? '' : 'none';
        }
    }

    function renderQuotationActions() {
        if (!quotationActions) return;
        const shouldShow = activeProjectData && activeProjectData.status === 'Awaiting Quotation Approval';

        if (!shouldShow) {
            quotationActions.innerHTML = '';
            quotationActions.style.display = 'none';
            return;
        }

        quotationActions.innerHTML = '' +
            '<button type="button" class="btn btn-danger btn-sm" data-quotation-action="reject">Decline</button>' +
            '<button type="button" class="btn btn-success btn-sm" data-quotation-action="approve">Accept</button>';
        quotationActions.style.display = '';
    }

    function renderQuotation(projectData) {
        const quotation = projectData && projectData.quotation ? projectData.quotation : null;
        const materials = quotation && Array.isArray(quotation.materials) ? quotation.materials : [];

        if (!quotation || materials.length === 0) {
            if (quotationMaterials) quotationMaterials.innerHTML = '';
            if (quotationSummary) quotationSummary.style.display = 'none';
            if (quotationEmpty) quotationEmpty.style.display = '';
            return;
        }

        if (quotationEmpty) quotationEmpty.style.display = 'none';
        if (quotationMaterials) {
            quotationMaterials.innerHTML = materials.map(function (item) {
                return '<tr>' +
                    '<td class="small">' + esc(item.name || '') + '</td>' +
                    '<td class="small">' + esc(String(item.qty || '')) + '</td>' +
                    '<td class="small">' + esc(item.unit || '') + '</td>' +
                    '<td class="small text-end">' + esc(formatCurrency(item.cost || 0)) + '</td>' +
                    '</tr>';
            }).join('');
        }

        if (quotationSummary) quotationSummary.style.display = '';
        if (materialCostEl) materialCostEl.textContent = formatCurrency(quotation.materialsCost || 0);
        if (laborCostEl) laborCostEl.textContent = formatCurrency(quotation.laborCost || 0);
        if (totalCostEl) totalCostEl.textContent = formatCurrency(quotation.totalCost || 0);
        renderQuotationActions();
    }

    if (viewQuotationBtn) {
        viewQuotationBtn.addEventListener('click', function () {
            if (!quotationSection) return;
            const isHidden = quotationSection.style.display === 'none';
            quotationSection.style.display = isHidden ? '' : 'none';
            viewQuotationBtn.textContent = isHidden ? 'Hide Quotation' : 'View Quotation';
            if (isHidden) renderQuotation(activeProjectData);
        });
    }

    if (quotationActions) {
        quotationActions.addEventListener('click', function (event) {
            const actionButton = event.target.closest('[data-quotation-action]');
            if (!actionButton) return;
            const action = actionButton.dataset.quotationAction;
            if (action === 'approve') updateProjectStatus('Pending');
            if (action === 'reject') updateProjectStatus('Quotation Rejected');
        });
    }

    projectButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            const data = JSON.parse(btn.dataset.project || '{}');
            activeProjectData = data;
            activeProjectButton = btn;
            const statusEl = modalEl.querySelector('#pv-status');
            const status = data.status || '';
            const progressReports = Array.isArray(data.progressReports) ? data.progressReports.slice() : [];

            if (quotationSection) quotationSection.style.display = 'none';
            if (viewQuotationBtn) viewQuotationBtn.textContent = 'View Quotation';
            if (quotationActions) quotationActions.innerHTML = '';

            const showQuotationButton = shouldShowQuotationButton(status);
            if (viewQuotationWrap) {
                viewQuotationWrap.style.display = showQuotationButton ? '' : 'none';
                viewQuotationWrap.hidden = !showQuotationButton;
            }
            if (viewQuotationBtn) {
                viewQuotationBtn.style.display = showQuotationButton ? '' : 'none';
                viewQuotationBtn.hidden = !showQuotationButton;
            }

            modalEl.querySelector('#pv-name').textContent = data.name || '';
            modalEl.querySelector('#pv-service').textContent = data.serviceType || '';
            modalEl.querySelector('#pv-address').textContent = data.address || '';
            modalEl.querySelector('#pv-description').textContent = data.description || '';
            renderTimelineField(status, data.timeline || '');

            if (progressSection) {
                progressSection.style.display = shouldShowProgressSection(status) ? '' : 'none';
            }

            progressReports.sort(function (left, right) {
                return parseProgressDate(right.date) - parseProgressDate(left.date);
            });

            if (progressBody) {
                if (progressReports.length === 0) {
                    progressBody.innerHTML = '';
                    if (progressEmpty) progressEmpty.style.display = '';
                } else {
                    if (progressEmpty) progressEmpty.style.display = 'none';
                    progressBody.innerHTML = progressReports.map(function (entry) {
                        return '<tr>' +
                            '<td class="small">' + esc(entry.date || '') + '</td>' +
                            '<td class="small">' + esc(entry.report || '') + '</td>' +
                            '<td class="small"><img src="' + esc(progressImagePath) + '" alt="Progress report photo" class="img-thumbnail" style="width:72px;height:72px;object-fit:cover;"></td>' +
                            '</tr>';
                    }).join('');
                }
            }

            applyStatusBadge(statusEl, status);
            renderQuotationActions();

            modal.show();
        });
    });

    cancelButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            const row = btn.closest('tr');
            if (!row) return;

            const viewButton = row.querySelector('[data-project]');
            if (!viewButton) return;

            const shouldCancel = window.confirm('Cancel this request?');
            if (!shouldCancel) return;

            const data = JSON.parse(viewButton.dataset.project || '{}');
            data.status = 'Cancelled';
            viewButton.dataset.project = JSON.stringify(data);

            const statusBadge = row.querySelector('span.badge');
            applyStatusBadge(statusBadge, 'Cancelled');

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

            const viewButton = row.querySelector('[data-project]');
            if (!viewButton) return;

            const data = JSON.parse(viewButton.dataset.project || '{}');
            if (data.status !== 'In Progress') return;

            data.status = 'Completed';
            addCompletedRow(data);
            row.remove();

            ensureOngoingEmptyRow();
        });
    }
});
</script>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
