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
            'id' => 'PRJ-1001',
            'name' => 'AC Installation - ACME Holdings',
            'serviceType' => 'AC Installation',
            'status' => 'Ongoing',
            'timeline' => 'Apr 10 - Apr 18',
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
            'id' => 'PRJ-1002',
            'name' => 'AC Repair - J. Dela Cruz',
            'serviceType' => 'AC Repair',
            'status' => 'Completed',
            'timeline' => 'Apr 1 - Apr 2',
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
            'id' => 'PRJ-1003',
            'name' => 'Ducting Systems - Metro Storage',
            'serviceType' => 'Ducting Systems',
            'status' => 'Awaiting Quotation Approval',
            'timeline' => 'Apr 20 - Apr 27',
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
            'id' => 'PRJ-1004',
            'name' => 'Aircon Services - Northline Foods',
            'serviceType' => 'Aircon Services',
            'status' => 'For Assessment',
            'timeline' => 'Apr 15 - Apr 17',
            'address' => 'Quezon City Mall Complex',
            'description' => 'Initial site assessment for multiple air-conditioning units in the mall.',
            'quotation' => [],
            'progressReports' => [],
        ],
        [
            'id' => 'PRJ-1005',
            'name' => 'Ducting Systems - BluePeak IT',
            'serviceType' => 'Ducting Systems',
            'status' => 'Pending',
            'timeline' => 'Apr 22 - Apr 30',
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
            'id' => 'PRJ-1006',
            'name' => 'AC Installation - Grand Arc Tower',
            'serviceType' => 'AC Installation',
            'status' => 'For Approval',
            'timeline' => 'Apr 25 - Apr 29',
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
        'Pending' => 4,
        'Ongoing' => 5,
        'Completed' => 6,
        'Quotation Rejected' => 7,
    ];

    usort($projects, function ($left, $right) use ($statusOrder) {
        $leftRank = $statusOrder[$left['status']] ?? 999;
        $rightRank = $statusOrder[$right['status']] ?? 999;

        if ($leftRank === $rightRank) {
            return strcmp($left['name'], $right['name']);
        }

        return $leftRank <=> $rightRank;
    });
    ?>

    <div class="table-responsive card border-0 shadow-sm">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Service</th>
                    <th>Status</th>
                    <th>Timeline</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($projects as $project): ?>
                <?php
                $status = $project['status'];
                $statusClass = 'bg-warning text-dark';
                if ($status === 'Ongoing') {
                    $statusClass = 'bg-primary';
                } elseif ($status === 'Completed') {
                    $statusClass = 'bg-success';
                } elseif ($status === 'Quotation Rejected') {
                    $statusClass = 'bg-danger';
                } elseif ($status === 'For Assessment') {
                    $statusClass = 'bg-info text-dark';
                } elseif ($status === 'For Approval') {
                    $statusClass = 'bg-warning text-dark';
                } elseif ($status === 'Pending') {
                    $statusClass = 'bg-secondary';
                }
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($project['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($project['serviceType'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <span class="badge <?php echo htmlspecialchars($statusClass, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($status, ENT_QUOTES, 'UTF-8'); ?></span>
                    </td>
                    <td><?php echo htmlspecialchars($project['timeline'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <button
                            type="button"
                            class="btn btn-outline-primary btn-sm"
                            data-project='<?php echo htmlspecialchars(json_encode($project), ENT_QUOTES, 'UTF-8'); ?>'
                        >
                            View
                        </button>
                        <?php if ($status === 'Completed'): ?>
                            <button type="button" class="btn btn-success btn-sm ms-2">
                                Confirm Completion
                            </button>
                        <?php endif; ?>
                        
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
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
                        <div class="col-md-6"><small class="text-muted d-block">Status</small><span id="pv-status" class="badge"></span></div>
                        <div class="col-md-6"><small class="text-muted d-block">Project Name</small><strong id="pv-name"></strong></div>
                        <div class="col-md-6"><small class="text-muted d-block">Service</small><strong id="pv-service"></strong></div>
                        <div class="col-md-6"><small class="text-muted d-block">Timeline</small><strong id="pv-timeline"></strong></div>
                        <div class="col-md-6"><small class="text-muted d-block">Address</small><strong id="pv-address"></strong></div>
                        <div class="col-12"><small class="text-muted d-block">Description</small><p class="mb-0" id="pv-description"></p></div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="button" class="btn btn-outline-secondary btn-sm" id="pv-view-quotation">View Quotation</button>
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
                        <div class="col-12 mt-2">
                            <hr class="my-2">
                            <small class="text-muted d-block mb-2">Progress Reports (Technicians)</small>
                            <div class="table-responsive border rounded">
                                <table class="table table-sm mb-0 align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 140px;">Date</th>
                                            <th style="width: 190px;">Technician</th>
                                            <th>Report</th>
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
    const modalEl = document.getElementById('projectViewModal');
    if (!modalEl || typeof bootstrap === 'undefined') return;

    const modal = new bootstrap.Modal(modalEl);
    const viewQuotationBtn = modalEl.querySelector('#pv-view-quotation');
    const quotationSection = modalEl.querySelector('#pv-quotation-section');
    const quotationMaterials = modalEl.querySelector('#pv-quotation-materials');
    const quotationEmpty = modalEl.querySelector('#pv-quotation-empty');
    const quotationSummary = modalEl.querySelector('#pv-quotation-summary');
    const materialCostEl = modalEl.querySelector('#pv-materials-cost');
    const laborCostEl = modalEl.querySelector('#pv-labor-cost');
    const totalCostEl = modalEl.querySelector('#pv-total-cost');
    const quotationActions = modalEl.querySelector('#pv-quotation-actions');
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
        else if (status === 'Ongoing') statusEl.classList.add('bg-primary');
        else if (status === 'Quotation Rejected') statusEl.classList.add('bg-danger');
        else statusEl.classList.add('bg-warning', 'text-dark');
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
            '<button type="button" class="btn btn-outline-danger btn-sm" data-quotation-action="reject">Reject Quotation</button>' +
            '<button type="button" class="btn btn-success btn-sm" data-quotation-action="approve">Approve Quotation</button>';
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
            const progressBody = modalEl.querySelector('#pv-progress-body');
            const progressEmpty = modalEl.querySelector('#pv-progress-empty');
            const progressReports = Array.isArray(data.progressReports) ? data.progressReports : [];

            if (quotationSection) quotationSection.style.display = 'none';
            if (viewQuotationBtn) viewQuotationBtn.textContent = 'View Quotation';
            if (quotationActions) quotationActions.innerHTML = '';

            modalEl.querySelector('#pv-name').textContent = data.name || '';
            modalEl.querySelector('#pv-service').textContent = data.serviceType || '';
            modalEl.querySelector('#pv-timeline').textContent = data.timeline || '';
            modalEl.querySelector('#pv-address').textContent = data.address || '';
            modalEl.querySelector('#pv-description').textContent = data.description || '';

            if (progressBody) {
                if (progressReports.length === 0) {
                    progressBody.innerHTML = '';
                    if (progressEmpty) progressEmpty.style.display = '';
                } else {
                    if (progressEmpty) progressEmpty.style.display = 'none';
                    progressBody.innerHTML = progressReports.map(function (entry) {
                        return '<tr>' +
                            '<td class="small">' + (entry.date || '') + '</td>' +
                            '<td class="small">' + (entry.technician || '') + '</td>' +
                            '<td class="small">' + (entry.report || '') + '</td>' +
                            '</tr>';
                    }).join('');
                }
            }

            applyStatusBadge(statusEl, status);
            renderQuotationActions();

            modal.show();
        });
    });
});
</script>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
