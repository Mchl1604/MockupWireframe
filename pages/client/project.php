<?php $pageTitle = 'Project Details'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>

<?php
$projectId = trim((string) ($_GET['id'] ?? 'COL-2026-0001'));
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
            ['date' => 'Apr 11, 2026', 'report' => 'Indoor units mounted on levels 2 and 3. Refrigerant lines routed for first zone.'],
            ['date' => 'Apr 12, 2026', 'report' => 'Pressure testing completed for installed lines. No leakage observed.'],
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
            ['date' => 'Apr 1, 2026', 'report' => 'Detected faulty capacitor and loose terminal. Replaced capacitor and secured wiring.'],
            ['date' => 'Apr 2, 2026', 'report' => 'Unit tested under full load for 45 minutes. Cooling restored and stable.'],
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
            ['date' => 'May 7, 2026', 'report' => 'Main trunk line supports were installed and alignment checks passed on floors 8 to 10.'],
            ['date' => 'May 9, 2026', 'report' => 'Branch duct sections connected and initial airflow balancing started for east wing zones.'],
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

$project = $projects[0];
foreach ($projects as $candidate) {
    if (($candidate['id'] ?? '') === $projectId) {
        $project = $candidate;
        break;
    }
}

$status = (string) ($project['status'] ?? '');
$statusKey = strtolower(trim($status));
$displayStatus = $status === 'Pending' ? 'Scheduled' : $status;
$badgeClass = 'bg-warning text-dark';
if ($displayStatus === 'In Progress') {
    $badgeClass = 'bg-primary';
} elseif ($displayStatus === 'Completed') {
    $badgeClass = 'bg-success';
} elseif ($displayStatus === 'Quotation Rejected' || $displayStatus === 'Cancelled') {
    $badgeClass = 'bg-danger';
} elseif ($displayStatus === 'For Assessment') {
    $badgeClass = 'bg-info text-dark';
} elseif ($displayStatus === 'Pending Schedule' || $displayStatus === 'Scheduled') {
    $badgeClass = 'bg-secondary';
}

$hideQuotationButtonStatuses = ['for approval', 'for assessment', 'awaiting quotation approval'];
$showQuotationButton = !in_array($statusKey, $hideQuotationButtonStatuses, true);
$autoOpenQuotation = $statusKey === 'awaiting quotation approval';

$quotation = is_array($project['quotation'] ?? null) ? $project['quotation'] : [];
$quotationMaterials = is_array($quotation['materials'] ?? null) ? $quotation['materials'] : [];
$hasQuotation = $quotationMaterials !== [];

$showProgressSection = $statusKey === 'in progress' || $statusKey === 'completed';
$progressReports = is_array($project['progressReports'] ?? null) ? $project['progressReports'] : [];
usort($progressReports, function ($left, $right) {
    $leftDate = strtotime((string) ($left['date'] ?? '')) ?: 0;
    $rightDate = strtotime((string) ($right['date'] ?? '')) ?: 0;
    return $rightDate <=> $leftDate;
});

$timelineLabel = $statusKey === 'for assessment' ? 'Assessment Schedule' : 'Estimated Timeline';
$timelineValue = trim((string) ($project['timeline'] ?? ''));
if ($statusKey === 'for approval' || $statusKey === 'awaiting quotation approval') {
    $timelineValue = '';
}

$cancellationReasonByProject = [
    'PRJ-1008' => 'Client rejected quotation due to budget constraints.',
    'PRJ-1009' => 'Admin cancelled project due to incomplete permit requirements.',
];
$projectCancellationReason = (string) ($project['cancellationReason'] ?? ($cancellationReasonByProject[$projectId] ?? ''));
?>

<main class="container py-4 flex-grow-1">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 fw-bold mb-0">Project Details</h2>
        <div class="d-flex gap-2">
            <a href="<?php echo htmlspecialchars(app_url('/client/projects'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-outline-secondary btn-sm">Back to Projects</a>
        </div>
    </div>

    <div class="card border-0 shadow-sm mb-3">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-4">
                    <small class="text-muted d-block">Reference No</small>
                    <strong><?php echo htmlspecialchars($project['id'], ENT_QUOTES, 'UTF-8'); ?></strong>

                    <div class="mt-4">
                        <small class="text-muted d-block">Project Name</small>
                        <strong><?php echo htmlspecialchars($project['name'], ENT_QUOTES, 'UTF-8'); ?></strong>
                    </div>
                </div>

                <div class="col-md-4">
                    <small class="text-muted d-block">Service</small>
                    <strong><?php echo htmlspecialchars($project['serviceType'], ENT_QUOTES, 'UTF-8'); ?></strong>

                    <?php if ($timelineValue !== ''): ?>
                        <div class="mt-4">
                            <small class="text-muted d-block"><?php echo htmlspecialchars($timelineLabel, ENT_QUOTES, 'UTF-8'); ?></small>
                            <strong><?php echo htmlspecialchars($timelineValue, ENT_QUOTES, 'UTF-8'); ?></strong>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-md-4">
                    <small class="text-muted d-block">Status</small>
                    <div class="mt-1">
                        <span id="project-status-badge" class="badge <?php echo htmlspecialchars($badgeClass, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($displayStatus, ENT_QUOTES, 'UTF-8'); ?></span>
                    </div>
                    <?php if ($statusKey === 'cancelled' && $projectCancellationReason !== ''): ?>
                        <div class="alert alert-danger py-2 px-3 mt-3 mb-0 small">
                            <strong class="d-block mb-1">Cancellation Reason</strong>
                            <?php echo htmlspecialchars($projectCancellationReason, ENT_QUOTES, 'UTF-8'); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-md-6">
                    <small class="text-muted d-block">Address</small>
                    <strong><?php echo htmlspecialchars((string) ($project['address'] ?? 'N/A'), ENT_QUOTES, 'UTF-8'); ?></strong>
                </div>
                <div class="col-12">
                    <small class="text-muted d-block">Description</small>
                    <p class="mb-0"><?php echo htmlspecialchars((string) ($project['description'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
            </div>
        </div>
    </div>

    <?php if ($showQuotationButton): ?>
        <div class="d-flex justify-content-start mb-3">
            <button type="button" id="toggleQuotationBtn" class="btn btn-primary btn-sm">View Quotation</button>
        </div>
    <?php endif; ?>

    <div class="card border-0 shadow-sm mb-3" id="quotationSection" style="display:<?php echo $autoOpenQuotation ? '' : 'none'; ?>;">
        <div class="card-header bg-white"><strong>Cost Quotation</strong></div>
        <div class="card-body">
                <?php if (!$hasQuotation): ?>
                <p class="small text-muted mb-0">No quotation submitted by admin yet.</p>
            <?php else: ?>
                <div class="table-responsive border rounded mb-3">
                    <table class="table table-sm mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Material</th>
                                <th style="width: 110px;">Qty</th>
                                <th style="width: 110px;">Unit</th>
                                <th class="text-end" style="width: 130px;">Cost</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($quotationMaterials as $item): ?>
                                <tr>
                                    <td class="small"><?php echo htmlspecialchars((string) ($item['name'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td class="small"><?php echo htmlspecialchars((string) ($item['qty'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td class="small"><?php echo htmlspecialchars((string) ($item['unit'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td class="small text-end">PHP <?php echo number_format((float) ($item['cost'] ?? 0), 2); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="row g-2">
                    <div class="col-md-4"><small class="text-muted d-block">Material Cost</small><strong>PHP <?php echo number_format((float) ($quotation['materialsCost'] ?? 0), 2); ?></strong></div>
                    <div class="col-md-4"><small class="text-muted d-block">Labor Cost</small><strong>PHP <?php echo number_format((float) ($quotation['laborCost'] ?? 0), 2); ?></strong></div>
                    <div class="col-md-4"><small class="text-muted d-block">Total Cost</small><strong>PHP <?php echo number_format((float) ($quotation['totalCost'] ?? 0), 2); ?></strong></div>
                </div>
                <?php if ($statusKey === 'awaiting quotation approval'): ?>
                    <div class="mt-3 d-flex justify-content-end gap-2" id="quotation-actions">
                        <button type="button" class="btn btn-danger btn-sm" id="quotation-reject">Decline</button>
                        <button type="button" class="btn btn-success btn-sm" id="quotation-approve">Accept</button>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

    <?php if ($showProgressSection): ?>
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white"><strong>Progress Report</strong></div>
            <div class="card-body">
                <?php if (empty($progressReports)): ?>
                    <p class="small text-muted mb-0">No progress report submitted yet.</p>
                <?php else: ?>
                    <?php foreach ($progressReports as $entry): ?>
                        <div class="border rounded p-3 mb-2 bg-white">
                            <small class="text-muted d-block">Date</small>
                            <div class="small mb-2"><?php echo htmlspecialchars((string) ($entry['date'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></div>
                            <small class="text-muted d-block">Description</small>
                            <div class="small mb-2"><?php echo htmlspecialchars((string) ($entry['report'] ?? ''), ENT_QUOTES, 'UTF-8'); ?></div>
                            <small class="text-muted d-block">Picture</small>
                            <div>
                                <img src="<?php echo htmlspecialchars(($baseUrl !== '' ? $baseUrl : '') . '/assets/img/imageSample.png', ENT_QUOTES, 'UTF-8'); ?>" alt="Progress report photo" class="img-thumbnail mt-1" style="width:120px;height:120px;object-fit:cover;">
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const quotationButton = document.getElementById('toggleQuotationBtn');
    const quotationSection = document.getElementById('quotationSection');
    if (!quotationButton || !quotationSection) return;

    quotationButton.addEventListener('click', function () {
        const isHidden = quotationSection.style.display === 'none';
        quotationSection.style.display = isHidden ? '' : 'none';
        quotationButton.textContent = isHidden ? 'Hide Quotation' : 'View Quotation';
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const approveBtn = document.getElementById('quotation-approve');
    const rejectBtn = document.getElementById('quotation-reject');
    const statusBadge = document.getElementById('project-status-badge');
    const actionsWrap = document.getElementById('quotation-actions');

    function setStatusTextAndClass(text, className) {
        if (!statusBadge) return;
        statusBadge.textContent = text;
        statusBadge.className = 'badge ' + className;
    }

    if (approveBtn) {
        approveBtn.addEventListener('click', function () {
            setStatusTextAndClass('Pending', 'bg-secondary');
            if (actionsWrap) actionsWrap.style.display = 'none';
            approveBtn.disabled = true;
            if (rejectBtn) rejectBtn.disabled = true;
        });
    }

    if (rejectBtn) {
        rejectBtn.addEventListener('click', function () {
            setStatusTextAndClass('Quotation Rejected', 'bg-danger');
            if (actionsWrap) actionsWrap.style.display = 'none';
            rejectBtn.disabled = true;
            if (approveBtn) approveBtn.disabled = true;
        });
    }
});
</script>

<?php include __DIR__ . '/../../includes/footer.php'; ?>


