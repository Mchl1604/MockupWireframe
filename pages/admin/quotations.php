<?php $pageTitle = 'Quotations'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<?php
$quotes = [
    [
        'id' => 'QT-101',
        'project' => 'PRJ-1001',
        'client' => 'ACME Holdings',
        'amount' => 245000,
        'status' => 'Pending Approval',
        'laborCost' => 55000,
        'materials' => [
            ['name' => 'Copper Pipe', 'qty' => 8, 'unit' => 'roll', 'unitCost' => 8500],
            ['name' => 'Insulation', 'qty' => 10, 'unit' => 'roll', 'unitCost' => 4200],
            ['name' => 'Circuit Breaker', 'qty' => 6, 'unit' => 'pc', 'unitCost' => 3000],
        ],
    ],
    [
        'id' => 'QT-102',
        'project' => 'PRJ-1002',
        'client' => 'J. Dela Cruz',
        'amount' => 78500,
        'status' => 'Approved',
        'laborCost' => 18000,
        'materials' => [
            ['name' => 'Dual Capacitor', 'qty' => 2, 'unit' => 'pc', 'unitCost' => 4500],
            ['name' => 'Fan Motor', 'qty' => 1, 'unit' => 'pc', 'unitCost' => 6500],
        ],
    ],
    [
        'id' => 'QT-103',
        'project' => 'PRJ-1003',
        'client' => 'Metro Storage',
        'amount' => 113000,
        'status' => 'Draft',
        'laborCost' => 26000,
        'materials' => [
            ['name' => 'GI Sheet', 'qty' => 12, 'unit' => 'sheet', 'unitCost' => 4200],
            ['name' => 'Angle Bar', 'qty' => 14, 'unit' => 'pc', 'unitCost' => 1900],
            ['name' => 'Duct Sealant', 'qty' => 7, 'unit' => 'tube', 'unitCost' => 900],
        ],
    ],
];

$projectOptions = ['PRJ-1001', 'PRJ-1002', 'PRJ-1003', 'PRJ-1004', 'PRJ-1005', 'PRJ-1006'];

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
];
?>
<main class="container py-4 flex-grow-1">
    <div class="d-flex align-items-center justify-content-between gap-3 mb-3 flex-wrap">
        <h2 class="h4 fw-bold mb-0">Quotations</h2>
        <div class="d-flex align-items-center justify-content-end gap-2 flex-nowrap ms-auto">
            <input type="search" id="quotationSearch" class="form-control form-control-sm flex-shrink-0" placeholder="Search quotations..." style="width: 260px;">
            <button type="button" class="btn btn-outline-secondary btn-sm flex-shrink-0" data-bs-toggle="modal" data-bs-target="#quotationArchivesModal">
                <i class="bi bi-archive me-1"></i>View Archives
            </button>
            <button type="button" class="btn btn-primary btn-sm flex-shrink-0" data-bs-toggle="modal" data-bs-target="#createQuotationModal">
                <i class="bi bi-plus-circle me-1"></i>Create Quotation
            </button>
        </div>
    </div>

    <div class="table-responsive card border-0 shadow-sm">
        <table class="table table-hover mb-0">
            <thead class="table-light"><tr><th>Quotation</th><th>Project</th><th>Client</th><th>Total</th><th>Status</th><th class="text-end">Action</th></tr></thead>
            <tbody id="activeQuotationsBody">
            <?php foreach ($quotes as $q): ?>
                <tr data-quote-id="<?php echo htmlspecialchars($q['id'], ENT_QUOTES, 'UTF-8'); ?>" data-quote='<?php echo htmlspecialchars(json_encode($q), ENT_QUOTES, 'UTF-8'); ?>'>
                    <td><?php echo htmlspecialchars($q['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($q['project'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($q['client'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>₱<?php echo number_format((float) $q['amount'], 2); ?></td>
                    <td><span class="badge quote-status-badge <?php echo $q['status'] === 'Approved' ? 'bg-success' : ($q['status'] === 'Pending Approval' ? 'bg-primary' : 'bg-secondary'); ?>"><?php echo htmlspecialchars($q['status'], ENT_QUOTES, 'UTF-8'); ?></span></td>
                    <td class="text-end">
                        <div class="d-flex justify-content-end flex-wrap gap-1 quote-actions">
                            <?php if ($q['status'] === 'Draft'): ?>
                                <button type="button" class="btn btn-primary btn-sm" data-send-quote>Send Quotation</button>
                            <?php endif; ?>
                            <button type="button" class="btn btn-outline-secondary btn-sm" title="View Details" aria-label="View Details" data-quote='<?php echo htmlspecialchars(json_encode($q), ENT_QUOTES, 'UTF-8'); ?>'><i class="bi bi-eye"></i></button>
                            <button type="button" class="btn btn-outline-danger btn-sm" title="Archive" aria-label="Archive" data-archive-quote><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="quotationDetailsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header">
                    <h5 class="modal-title">Quotation Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="row g-3">
                        <div class="col-6"><small class="text-muted d-block">Quotation</small><strong id="qd-id"></strong></div>
                        <div class="col-6"><small class="text-muted d-block">Project</small><strong id="qd-project"></strong></div>
                        <div class="col-md-6">
                            <label class="form-label"></label>
                            <button type="button" class="btn btn-outline-primary w-100" id="qd-view-assessment-btn">
                                <i class="bi bi-file-text me-1"></i>View Assessment Report
                            </button>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"></label>
                            <button type="button" class="btn btn-outline-primary w-100" id="qd-auto-generate-btn">
                                <i class="bi bi-magic me-1"></i>Auto Generate Quotation
                            </button>
                        </div>
                        <div class="col-12"><small class="text-muted d-block">Client</small><strong id="qd-client"></strong></div>
                        <div class="col-12"><small class="text-muted d-block">Status</small><span id="qd-status" class="badge"></span></div>
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <small class="text-muted d-block mb-0">Materials</small>
                                <button type="button" class="btn btn-outline-primary btn-sm" id="qd-add-material" style="display:none;">
                                    <i class="bi bi-plus-circle me-1"></i>Add Material
                                </button>
                            </div>
                            <div class="table-responsive border rounded">
                                <table class="table table-sm mb-0 align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="min-width: 150px;">Material</th>
                                            <th style="width:80px;">Qty</th>
                                            <th style="width:90px;">Unit</th>
                                            <th class="text-end" style="width:120px;">Unit Cost</th>
                                            <th class="text-start" style="width:120px;">Total Cost</th>
                                            <th class="text-start" style="width:80px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="qd-materials"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-md-end">
                            <div class="w-100" style="max-width: 360px;">
                                <div class="mb-3">
                                    <small class="text-muted d-block text-start">Labor Cost</small>
                                    <input type="number" class="form-control text-end" id="qd-labor-input" min="0" step="0.01">
                                </div>
                                <div>
                                    <small class="text-muted d-block text-start">Total Cost</small>
                                    <input type="text" class="form-control text-end" id="qd-total" readonly tabindex="-1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="qd-save-changes" style="display:none;">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="quotationArchivesModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header">
                    <h5 class="modal-title">Archived Quotations</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive border rounded">
                        <table class="table table-sm mb-0">
                            <thead class="table-light"><tr><th>Quotation</th><th>Project</th><th>Client</th><th>Total</th><th>Status</th></tr></thead>
                            <tbody id="archivedQuotationsBody"></tbody>
                        </table>
                    </div>
                    <p class="small text-muted mb-0 mt-2" id="archiveEmptyText">No archived quotations yet.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createQuotationModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header">
                    <h5 class="modal-title">Create Quotation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Quotation ID</label>
                                <input type="text" class="form-control" placeholder="QT-104" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Project ID</label>
                                <select class="form-select" id="quotationProjectId">
                                    <option value="" selected disabled>Select project ID</option>
                                    <?php foreach ($projectOptions as $projectId): ?>
                                        <option value="<?php echo htmlspecialchars($projectId, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($projectId, ENT_QUOTES, 'UTF-8'); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"></label>
                                <button type="button" class="btn btn-outline-primary w-100" id="viewAssessmentBtn">
                                    <i class="bi bi-file-text me-1"></i>View Assessment Report
                                </button>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"></label>
                                <button type="button" class="btn btn-outline-primary w-100">
                                    <i class="bi bi-magic me-1"></i>Auto Generate Quotation
                                </button>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <label class="form-label mb-0">Materials</label>
                                    <button type="button" class="btn btn-outline-primary btn-sm" id="addMaterialRow">
                                        <i class="bi bi-plus-circle me-1"></i>Add Material
                                    </button>
                                </div>
                                <div class="table-responsive border rounded">
                                    <table class="table table-sm mb-0 align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th style="min-width: 280px;">Material</th>
                                                <th style="width: 80px;">Qty</th>
                                                <th style="width: 90px;">Unit</th>
                                                <th style="width: 120px;">Unit Cost</th>
                                                <th style="width: 120px;">Total Cost</th>
                                                <th class="text-start" style="width: 80px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="materialsRows"></tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-md-end">
                                <div class="w-100" style="max-width: 360px;">
                                    <div class="mb-3">
                                        <label class="form-label d-block text-start">Labor Cost</label>
                                        <input type="number" class="form-control text-end" id="createQuotationLaborCost" min="0" step="0.01" placeholder="0.00">
                                    </div>
                                    <div>
                                        <label class="form-label d-block text-start">Total Cost</label>
                                        <input type="text" class="form-control text-end" id="createQuotationTotalCost" value="₱0.00" readonly tabindex="-1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" rows="3" placeholder="Additional quotation details"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save Quotation</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="assessmentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content border-0 shadow">
                <div class="modal-header">
                    <h5 class="modal-title">Assessment Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="assessmentEmptyState" class="alert alert-light border mb-0" style="display:none;">
                        Select a project first to view its assessment report.
                    </div>
                    <div id="assessmentContent">
                        <div class="row g-3 mb-3">
                            <div class="col-md-6"><small class="text-muted d-block">Project</small><strong id="assessment-project"></strong></div>
                            <div class="col-md-6"><small class="text-muted d-block">Assessed By</small><strong id="assessment-technician"></strong></div>
                            <div class="col-md-6"><small class="text-muted d-block">Assessment Date</small><strong id="assessment-date"></strong></div>
                            <div class="col-md-6"><small class="text-muted d-block">Required Number of Technicians</small><strong id="assessment-technicians"></strong></div>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted d-block mb-2"><strong>Key Findings</strong></small>
                            <ul class="small mb-0" id="assessment-findings"></ul>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-12">
                                <small class="text-muted d-block mb-2"><strong>Materials Needed</strong></small>
                                <div class="table-responsive border rounded">
                                    <table class="table table-sm mb-0">
                                        <thead class="table-light"><tr><th>Material</th><th>Qty</th><th>Unit</th></tr></thead>
                                        <tbody id="assessment-materials"></tbody>
                                    </table>
                                </div>

                                <div class="mt-3">
                                    <small class="text-muted d-block">Assessment Summary</small>
                                    <p class="mb-0" id="assessment-summary"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-12">
                                <small class="text-muted d-block mb-2"><strong>Project Timeline</strong></small>
                                <div class="border rounded p-3 bg-light h-100 d-flex align-items-center justify-content-center">
                                    <div class="text-center">
                                        <div class="h5 mb-1" id="assessment-days"></div>
                                        <small class="text-muted">Estimated Working Days</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const rowsContainer = document.getElementById('materialsRows');
    const addRowButton = document.getElementById('addMaterialRow');
    const detailsModalEl = document.getElementById('quotationDetailsModal');
    const archivesBody = document.getElementById('archivedQuotationsBody');
    const activeBody = document.getElementById('activeQuotationsBody');
    const archiveEmptyText = document.getElementById('archiveEmptyText');
    const qdLaborInput = document.getElementById('qd-labor-input');
    const qdSaveChanges = document.getElementById('qd-save-changes');
    const qdAddMaterial = document.getElementById('qd-add-material');
    const quotationSearch = document.getElementById('quotationSearch');
    const createQuotationLaborCost = document.getElementById('createQuotationLaborCost');
    const createQuotationTotalCost = document.getElementById('createQuotationTotalCost');
    const quotationProjectId = document.getElementById('quotationProjectId');
    const viewAssessmentBtn = document.getElementById('viewAssessmentBtn');
    const assessmentModalEl = document.getElementById('assessmentModal');
    const assessmentEmptyState = document.getElementById('assessmentEmptyState');
    const assessmentContent = document.getElementById('assessmentContent');
    const assessmentProject = document.getElementById('assessment-project');
    const assessmentTechnician = document.getElementById('assessment-technician');
    const assessmentDate = document.getElementById('assessment-date');
    const assessmentTechnicians = document.getElementById('assessment-technicians');
    const assessmentSummary = document.getElementById('assessment-summary');
    const assessmentFindings = document.getElementById('assessment-findings');
    const assessmentMaterials = document.getElementById('assessment-materials');
    const assessmentDays = document.getElementById('assessment-days');
    const qdViewAssessmentBtn = document.getElementById('qd-view-assessment-btn');
    const qdAutoGenerateBtn = document.getElementById('qd-auto-generate-btn');

    const assetBasePath = '<?php echo htmlspecialchars(app_url('/assets/img/'), ENT_QUOTES, 'UTF-8'); ?>';
    const assessmentData = <?php echo json_encode($assessmentByProject, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>;

    let activeQuote = null;
    let activeQuoteRow = null;
    let activeQuoteViewButton = null;
    let assessmentModal = null;

    if (quotationSearch) {
        quotationSearch.addEventListener('input', function () {
            const query = this.value.toLowerCase().trim();
            document.querySelectorAll('#activeQuotationsBody tr').forEach(function (row) {
                row.style.display = row.textContent.toLowerCase().includes(query) ? '' : 'none';
            });
        });
    }

    function formatCurrency(value) {
        return '₱' + Number(value || 0).toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    function statusBadgeClass(status) {
        if (status === 'Approved') return 'bg-success';
        if (status === 'Pending Approval') return 'bg-primary';
        return 'bg-secondary';
    }

    function computeMaterialsTotal(quote) {
        if (!quote || !Array.isArray(quote.materials)) return 0;
        return quote.materials.reduce(function (sum, item) {
            const qty = Number(item.qty || 0);
            const unitCost = Number(item.unitCost || 0);
            return sum + (qty * unitCost);
        }, 0);
    }

    function renderDetailsMaterials(materials, isDraft) {
        if (!detailsModalEl) return;
        const materialsBody = detailsModalEl.querySelector('#qd-materials');
        if (!materialsBody) return;

        if (!Array.isArray(materials) || materials.length === 0) {
            if (isDraft) {
                materialsBody.innerHTML = '';
            } else {
                materialsBody.innerHTML = '<tr><td colspan="6" class="small text-muted">No materials listed.</td></tr>';
            }
            return;
        }

        if (isDraft) {
            materialsBody.innerHTML = materials.map(function (item) {
                const totalCost = Number(item.qty || 0) * Number(item.unitCost || 0);
                return '<tr>' +
                    '<td><input type="text" class="form-control form-control-sm qd-material-name" value="' + (item.name || '') + '"></td>' +
                    '<td><input type="number" class="form-control form-control-sm qd-material-qty" min="1" step="1" value="' + Number(item.qty || 1) + '"></td>' +
                    '<td><input type="text" class="form-control form-control-sm qd-material-unit" value="' + (item.unit || '') + '" readonly tabindex="-1"></td>' +
                    '<td><input type="number" class="form-control form-control-sm text-end qd-material-cost" min="0" step="0.01" value="' + Number(item.unitCost || 0) + '" readonly tabindex="-1"></td>' +
                    '<td><input type="text" class="form-control form-control-sm text-start qd-material-total" value="' + formatCurrency(totalCost) + '" readonly tabindex="-1"></td>' +
                    '<td class="text-start"><button type="button" class="btn btn-outline-danger btn-sm" data-qd-remove-material><i class="bi bi-trash"></i></button></td>' +
                    '</tr>';
            }).join('');
            return;
        }

        materialsBody.innerHTML = materials.map(function (item) {
            const totalCost = Number(item.qty || 0) * Number(item.unitCost || 0);
            return '<tr>' +
                '<td class="small">' + (item.name || '') + '</td>' +
                '<td class="small">' + (item.qty || '') + '</td>' +
                '<td class="small">' + (item.unit || '') + '</td>' +
                '<td class="small text-end">₱' + Number(item.unitCost || 0).toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + '</td>' +
                '<td class="small text-start">₱' + totalCost.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + '</td>' +
                '<td></td>' +
                '</tr>';
        }).join('');
    }

    function updateDraftMaterialTotal(row) {
        if (!row) return;
        const qtyEl = row.querySelector('.qd-material-qty');
        const costEl = row.querySelector('.qd-material-cost');
        const totalEl = row.querySelector('.qd-material-total');
        if (!qtyEl || !costEl || !totalEl) return;

        const total = Number(qtyEl.value || 0) * Number(costEl.value || 0);
        totalEl.value = formatCurrency(total);
    }

    function addDraftMaterialRow() {
        if (!detailsModalEl) return;
        const materialsBody = detailsModalEl.querySelector('#qd-materials');
        if (!materialsBody) return;

        const row = document.createElement('tr');
        row.innerHTML = '' +
            '<td><input type="text" class="form-control form-control-sm qd-material-name" placeholder="Material name"></td>' +
            '<td><input type="number" class="form-control form-control-sm qd-material-qty" min="1" step="1" value="1"></td>' +
            '<td><input type="text" class="form-control form-control-sm qd-material-unit" placeholder="pc"></td>' +
            '<td><input type="number" class="form-control form-control-sm text-end qd-material-cost" min="0" step="0.01" value="0"></td>' +
            '<td><input type="text" class="form-control form-control-sm text-end qd-material-total" value="' + formatCurrency(0) + '" readonly tabindex="-1"></td>' +
            '<td class="text-end"><button type="button" class="btn btn-outline-danger btn-sm" data-qd-remove-material><i class="bi bi-trash"></i></button></td>';
        materialsBody.appendChild(row);
        updateDraftMaterialTotal(row);
    }

    function syncActiveRow() {
        if (!activeQuote || !activeQuoteRow) return;

        const cells = activeQuoteRow.querySelectorAll('td');
        if (cells.length >= 5) {
            cells[3].textContent = formatCurrency(activeQuote.amount || 0);
            const statusBadge = cells[4].querySelector('.quote-status-badge');
            if (statusBadge) {
                statusBadge.textContent = activeQuote.status || '';
                statusBadge.className = 'badge quote-status-badge ' + statusBadgeClass(activeQuote.status || '');
            }
        }

        if (activeQuoteViewButton) {
            activeQuoteViewButton.dataset.quote = JSON.stringify(activeQuote);
        }

        const actionsWrap = activeQuoteRow.querySelector('.quote-actions');
        if (!actionsWrap) return;

        const existingSendButton = actionsWrap.querySelector('button[data-send-quote]');
        if (activeQuote.status === 'Draft' && !existingSendButton) {
            const sendButton = document.createElement('button');
            sendButton.type = 'button';
            sendButton.className = 'btn btn-primary btn-sm';
            sendButton.setAttribute('data-send-quote', '');
            sendButton.textContent = 'Send';
            const archiveButton = actionsWrap.querySelector('button[data-archive-quote]');
            if (archiveButton) actionsWrap.insertBefore(sendButton, archiveButton);
            else actionsWrap.appendChild(sendButton);
        }

        if (activeQuote.status !== 'Draft' && existingSendButton) {
            existingSendButton.remove();
        }
    }

    function createMaterialRow() {
        const tr = document.createElement('tr');
        tr.innerHTML = '' +
            '<td><input type="text" class="form-control form-control-sm" placeholder="Material name"></td>' +
            '<td><input type="number" class="form-control form-control-sm" min="1" step="1" value="1"></td>' +
            '<td><input type="text" class="form-control form-control-sm" placeholder="pc" readonly tabindex="-1"></td>' +
            '<td><input type="number" class="form-control form-control-sm" min="0" step="0.01" placeholder="0.00" readonly tabindex="-1"></td>' +
            '<td><input type="text" class="form-control form-control-sm text-start" value="' + formatCurrency(0) + '" readonly tabindex="-1"></td>' +
            '<td class="text-start"><button type="button" class="btn btn-outline-danger btn-sm" data-remove-row><i class="bi bi-trash"></i></button></td>';
        rowsContainer.appendChild(tr);
        updateCreateQuotationTotal();
    }

    function updateCreateQuotationTotal() {
        if (!createQuotationTotalCost || !rowsContainer) return;

        let materialsTotal = 0;
        rowsContainer.querySelectorAll('tr').forEach(function (row) {
            const qtyEl = row.querySelector('td:nth-child(2) input');
            const costEl = row.querySelector('td:nth-child(4) input');
            if (!qtyEl || !costEl) return;

            materialsTotal += Number(qtyEl.value || 0) * Number(costEl.value || 0);
        });

        const laborCost = Number(createQuotationLaborCost ? createQuotationLaborCost.value : 0);
        createQuotationTotalCost.value = formatCurrency(materialsTotal + laborCost);
    }

    if (rowsContainer && addRowButton) {
        addRowButton.addEventListener('click', createMaterialRow);

        rowsContainer.addEventListener('click', function (event) {
            const btn = event.target.closest('[data-remove-row]');
            if (!btn) return;
            const row = btn.closest('tr');
            if (!row) return;
            row.remove();

            if (rowsContainer.children.length === 0) {
                createMaterialRow();
                return;
            }

            updateCreateQuotationTotal();
        });

        rowsContainer.addEventListener('input', function (event) {
            const row = event.target.closest('tr');
            if (!row) return;
            const qtyEl = row.querySelector('td:nth-child(2) input');
            const costEl = row.querySelector('td:nth-child(4) input');
            const totalEl = row.querySelector('td:nth-child(5) input');
            if (!qtyEl || !costEl || !totalEl) return;
            totalEl.value = formatCurrency(Number(qtyEl.value || 0) * Number(costEl.value || 0));
            updateCreateQuotationTotal();
        });

        createMaterialRow();
    }

    if (createQuotationLaborCost) {
        createQuotationLaborCost.addEventListener('input', updateCreateQuotationTotal);
    }

    function renderAssessmentReport(projectId) {
        if (!assessmentModalEl) return false;

        const assessment = assessmentData[projectId];
        const hasAssessment = !!assessment;

        if (assessmentEmptyState) {
            assessmentEmptyState.style.display = hasAssessment ? 'none' : '';
        }

        if (assessmentContent) {
            assessmentContent.style.display = hasAssessment ? '' : 'none';
        }

        if (!hasAssessment) {
            return false;
        }

        const selectedProjectLabel = quotationProjectId && quotationProjectId.value ? quotationProjectId.value : projectId;
        if (assessmentProject) assessmentProject.textContent = selectedProjectLabel;
        if (assessmentTechnician) assessmentTechnician.textContent = assessment.technician || '';
        if (assessmentDate) assessmentDate.textContent = assessment.date || '';
        if (assessmentTechnicians) assessmentTechnicians.textContent = String(assessment.requiredTechnicians || 1);
        if (assessmentSummary) assessmentSummary.textContent = assessment.summary || '';
        if (assessmentDays) assessmentDays.textContent = String(assessment.estimatedDays || 0);

        if (assessmentFindings) {
            assessmentFindings.innerHTML = Array.isArray(assessment.findings) && assessment.findings.length > 0
                ? assessment.findings.map(function (finding) {
                    return '<li>' + String(finding || '') + '</li>';
                }).join('')
                : '<li class="text-muted">No findings available.</li>';
        }

        if (assessmentMaterials) {
            assessmentMaterials.innerHTML = Array.isArray(assessment.materials) && assessment.materials.length > 0
                ? assessment.materials.map(function (material) {
                    return '<tr>' +
                        '<td>' + String(material.name || '') + '</td>' +
                        '<td>' + String(material.qty || '') + '</td>' +
                        '<td>' + String(material.unit || '') + '</td>' +
                        '</tr>';
                }).join('')
                : '<tr><td colspan="3" class="text-muted small">No materials listed.</td></tr>';
        }

        // photos removed from modal — no action required

        return true;
    }

    if (assessmentModalEl && typeof bootstrap !== 'undefined') {
        assessmentModal = bootstrap.Modal.getOrCreateInstance(assessmentModalEl);
    }

    if (viewAssessmentBtn) {
        viewAssessmentBtn.addEventListener('click', function () {
            const projectId = quotationProjectId ? quotationProjectId.value : '';
            const hasAssessment = renderAssessmentReport(projectId);

            if (assessmentModal) {
                assessmentModal.show();
            }

            if (!hasAssessment && assessmentEmptyState) {
                assessmentEmptyState.style.display = '';
            }
        });
    }

    if (qdViewAssessmentBtn) {
        qdViewAssessmentBtn.addEventListener('click', function () {
            const projectId = activeQuote && activeQuote.project ? activeQuote.project : (document.getElementById('qd-project') ? document.getElementById('qd-project').textContent.trim() : '');
            if (!projectId) return;
            if (!assessmentData[projectId]) {
                // auto-generate using activeQuote materials if available
                const materials = activeQuote && Array.isArray(activeQuote.materials) ? activeQuote.materials.map(function (m) { return { name: m.name || '', qty: m.qty || 0, unit: m.unit || '' }; }) : [];
                assessmentData[projectId] = {
                    date: new Date().toLocaleDateString('en-US', { month: 'short', day: '2-digit', year: 'numeric' }),
                    technician: 'Auto-generated',
                    requiredTechnicians: 1,
                    summary: 'Auto-generated assessment for draft quotation.',
                    findings: ['Auto-generated assessment created from draft quotation.'],
                    materials: materials,
                    estimatedDays: Math.max(1, Math.ceil((materials.length || 0) / 3))
                };
            }
            renderAssessmentReport(projectId);
            if (assessmentModal) assessmentModal.show();
        });
    }

    if (qdAutoGenerateBtn) {
        qdAutoGenerateBtn.addEventListener('click', function () {
            // populate create modal with draft's materials and open create modal
            if (!activeQuote) return;
            // open create modal
            const createModalEl = document.getElementById('createQuotationModal');
            if (!createModalEl) return;
            // set project select value if present
            const projectSelect = createModalEl.querySelector('#quotationProjectId');
            if (projectSelect) {
                for (let i = 0; i < projectSelect.options.length; i++) {
                    if (projectSelect.options[i].value === activeQuote.project) projectSelect.selectedIndex = i;
                }
            }
            // populate materialsRows
            const materialsRows = createModalEl.querySelector('#materialsRows');
            if (materialsRows) {
                materialsRows.innerHTML = '';
                const mats = Array.isArray(activeQuote.materials) ? activeQuote.materials : [];
                mats.forEach(function (m) {
                    const tr = document.createElement('tr');
                    tr.innerHTML = '' +
                        '<td><input type="text" class="form-control form-control-sm" value="' + (m.name || '') + '"></td>' +
                        '<td><input type="number" class="form-control form-control-sm" min="1" step="1" value="' + (m.qty || 1) + '"></td>' +
                        '<td><input type="text" class="form-control form-control-sm" value="' + (m.unit || '') + '" readonly tabindex="-1"></td>' +
                        '<td><input type="number" class="form-control form-control-sm" min="0" step="0.01" value="' + (m.unitCost || 0) + '" readonly tabindex="-1"></td>' +
                        '<td><input type="text" class="form-control form-control-sm text-start" value="' + formatCurrency((m.qty || 0) * (m.unitCost || 0)) + '" readonly tabindex="-1"></td>' +
                        '<td class="text-start"><button type="button" class="btn btn-outline-danger btn-sm" data-remove-row><i class="bi bi-trash"></i></button></td>';
                    materialsRows.appendChild(tr);
                });
                // trigger update total
                const event = new Event('input', { bubbles: true });
                materialsRows.dispatchEvent(event);
            }
            new bootstrap.Modal(createModalEl).show();
        });
    }

    if (qdSaveChanges) {
        qdSaveChanges.addEventListener('click', function () {
            if (!activeQuote || !qdLaborInput || activeQuote.status !== 'Draft') return;

            const materialsBody = detailsModalEl ? detailsModalEl.querySelector('#qd-materials') : null;
            if (materialsBody) {
                const updatedMaterials = [];
                materialsBody.querySelectorAll('tr').forEach(function (row) {
                    const nameEl = row.querySelector('.qd-material-name');
                    const qtyEl = row.querySelector('.qd-material-qty');
                    const unitEl = row.querySelector('.qd-material-unit');
                    const costEl = row.querySelector('.qd-material-cost');
                    if (!nameEl || !qtyEl || !unitEl || !costEl) return;

                    const name = (nameEl.value || '').trim();
                    if (!name) return;

                    updatedMaterials.push({
                        name: name,
                        qty: Number(qtyEl.value || 0),
                        unit: (unitEl.value || '').trim(),
                        unitCost: Number(costEl.value || 0),
                    });
                });
                activeQuote.materials = updatedMaterials;
            }

            activeQuote.laborCost = Number(qdLaborInput.value || 0);
            const materialsTotal = computeMaterialsTotal(activeQuote);
            activeQuote.amount = materialsTotal + Number(activeQuote.laborCost || 0);

            if (detailsModalEl) {
                detailsModalEl.querySelector('#qd-total').value = formatCurrency(activeQuote.amount || 0);
            }

            syncActiveRow();
        });
    }

    if (qdAddMaterial) {
        qdAddMaterial.addEventListener('click', function () {
            if (!activeQuote || activeQuote.status !== 'Draft') return;
            addDraftMaterialRow();
        });
    }

    if (detailsModalEl) {
        detailsModalEl.addEventListener('click', function (event) {
            const removeBtn = event.target.closest('[data-qd-remove-material]');
            if (!removeBtn) return;
            if (!activeQuote || activeQuote.status !== 'Draft') return;

            const row = removeBtn.closest('tr');
            if (!row) return;
            row.remove();
        });

        detailsModalEl.addEventListener('input', function (event) {
            const row = event.target.closest('tr');
            if (!row) return;
            if (!row.querySelector('.qd-material-total')) return;
            updateDraftMaterialTotal(row);
        });
    }

    if (activeBody) {
        activeBody.addEventListener('click', function (event) {
            const rowViewAssessmentBtn = event.target.closest('button[data-view-assessment]');
            if (rowViewAssessmentBtn) {
                const projectId = rowViewAssessmentBtn.getAttribute('data-project') || (rowViewAssessmentBtn.closest('tr') && rowViewAssessmentBtn.closest('tr').querySelector('td:nth-child(2)') ? rowViewAssessmentBtn.closest('tr').querySelector('td:nth-child(2)').textContent.trim() : '');
                if (projectId) {
                    // auto-generate basic assessment if missing
                    if (!assessmentData[projectId]) {
                        const row = rowViewAssessmentBtn.closest('tr');
                        let materials = [];
                        const viewButton = row ? row.querySelector('[data-quote]') : null;
                        if (viewButton) {
                            try {
                                const quote = JSON.parse(viewButton.dataset.quote || '{}');
                                materials = Array.isArray(quote.materials) ? quote.materials.map(function (m) { return { name: m.name || '', qty: m.qty || 0, unit: m.unit || '' }; }) : [];
                            } catch (e) {
                                materials = [];
                            }
                        }
                        assessmentData[projectId] = {
                            date: new Date().toLocaleDateString('en-US', { month: 'short', day: '2-digit', year: 'numeric' }),
                            technician: 'Auto-generated',
                            requiredTechnicians: 1,
                            summary: 'Auto-generated assessment for draft quotation.',
                            findings: ['Auto-generated assessment created from draft quotation.'],
                            materials: materials,
                            estimatedDays: Math.max(1, Math.ceil((materials.length || 0) / 3))
                        };
                    }

                    renderAssessmentReport(projectId);
                    if (assessmentModal) assessmentModal.show();
                }
                return;
            }
            const viewBtn = event.target.closest('[data-quote]');
            if (viewBtn && detailsModalEl && typeof bootstrap !== 'undefined') {
                const quote = JSON.parse(viewBtn.dataset.quote || '{}');
                activeQuote = quote;
                activeQuoteRow = viewBtn.closest('tr');
                activeQuoteViewButton = viewBtn;

                detailsModalEl.querySelector('#qd-id').textContent = quote.id || '';
                detailsModalEl.querySelector('#qd-project').textContent = quote.project || '';
                detailsModalEl.querySelector('#qd-client').textContent = quote.client || '';
                detailsModalEl.querySelector('#qd-total').value = formatCurrency(quote.amount || 0);
                if (qdLaborInput) {
                    qdLaborInput.value = Number(quote.laborCost || 0);
                    qdLaborInput.disabled = quote.status !== 'Draft';
                }
                if (qdSaveChanges) {
                    qdSaveChanges.style.display = quote.status === 'Draft' ? '' : 'none';
                }
                if (qdAddMaterial) {
                    qdAddMaterial.style.display = quote.status === 'Draft' ? '' : 'none';
                }
                if (qdAutoGenerateBtn) {
                    qdAutoGenerateBtn.style.display = quote.status === 'Draft' ? '' : 'none';
                }

                const materials = Array.isArray(quote.materials) ? quote.materials : [];
                renderDetailsMaterials(materials, quote.status === 'Draft');

                const statusEl = detailsModalEl.querySelector('#qd-status');
                const status = quote.status || '';
                statusEl.textContent = status;
                statusEl.className = 'badge ' + statusBadgeClass(status);

                new bootstrap.Modal(detailsModalEl).show();
                return;
            }

            const sendBtn = event.target.closest('button[data-send-quote]');
            if (sendBtn) {
                const row = sendBtn.closest('tr');
                if (!row) return;
                const viewButton = row.querySelector('[data-quote]');
                if (!viewButton) return;

                const quote = JSON.parse(viewButton.dataset.quote || '{}');
                quote.status = 'Pending Approval';
                viewButton.dataset.quote = JSON.stringify(quote);

                const statusBadge = row.querySelector('.quote-status-badge');
                if (statusBadge) {
                    statusBadge.textContent = 'Pending Approval';
                    statusBadge.className = 'badge quote-status-badge ' + statusBadgeClass('Pending Approval');
                }

                sendBtn.remove();

                if (activeQuote && activeQuote.id === quote.id && detailsModalEl) {
                    activeQuote = quote;
                    activeQuoteRow = row;
                    activeQuoteViewButton = viewButton;
                    detailsModalEl.querySelector('#qd-status').textContent = 'Pending Approval';
                    detailsModalEl.querySelector('#qd-status').className = 'badge ' + statusBadgeClass('Pending Approval');
                    if (qdLaborInput) qdLaborInput.disabled = true;
                    if (qdSaveChanges) qdSaveChanges.style.display = 'none';
                }
                return;
            }

            const archiveBtn = event.target.closest('button[data-archive-quote]');
            if (!archiveBtn || !archivesBody) return;

            const row = archiveBtn.closest('tr');
            if (!row) return;
            const cells = row.querySelectorAll('td');
            if (cells.length < 5) return;

            const archivedRow = document.createElement('tr');
            archivedRow.innerHTML =
                '<td>' + cells[0].innerHTML + '</td>' +
                '<td>' + cells[1].innerHTML + '</td>' +
                '<td>' + cells[2].innerHTML + '</td>' +
                '<td>' + cells[3].innerHTML + '</td>' +
                '<td>' + cells[4].innerHTML + '</td>';
            archivesBody.appendChild(archivedRow);
            row.remove();

            if (archiveEmptyText) {
                archiveEmptyText.style.display = archivesBody.children.length ? 'none' : '';
            }
        });
    }
});
</script>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
