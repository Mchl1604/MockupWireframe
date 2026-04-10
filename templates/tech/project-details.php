<?php
$id      = $_GET['id'] ?? '';
$project = findProject($id, $projects);

if (!$project) {
    $pageTitle = 'Not Found';
    $activeNav = 'projects';
    require TEMPLATES . '/partials/dashboard-top.php';
    echo '<p class="text-muted">Project not found.</p>';
    require TEMPLATES . '/partials/dashboard-bottom.php';
    return;
}

$pageTitle   = 'Project Details';
$activeNav   = 'projects';
$projReports = projectReports($project['name'], $reports);

require TEMPLATES . '/partials/dashboard-top.php';
?>

<a href="/tech/projects" class="btn btn-outline-secondary btn-sm mb-4">
    <i class="bi bi-arrow-left me-1"></i>Back
</a>

<div class="row g-4">
    <!-- Project Info -->
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white fw-semibold"><?= h($project['name']) ?></div>
            <div class="card-body">
                <?php
                $info = [
                    'Project ID'   => $project['id'],
                    'Quotation ID' => $project['quotationId'],
                    'Client'       => $project['client'],
                    'Service Type' => $project['serviceType'],
                    'Timeline'     => $project['timeline'],
                ];
                foreach ($info as $label => $value): ?>
                <div class="d-flex justify-content-between py-2 border-bottom small">
                    <span class="text-muted"><?= h($label) ?></span>
                    <span class="fw-medium"><?= h($value) ?></span>
                </div>
                <?php endforeach; ?>
                <div class="d-flex justify-content-between py-2 border-bottom small">
                    <span class="text-muted">Status</span>
                    <?= statusBadge($project['status']) ?>
                </div>
                <p class="text-muted small mt-3 mb-0"><?= h($project['description']) ?></p>
            </div>
        </div>
    </div>

    <!-- Assigned Technicians -->
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white fw-semibold">Assigned Technicians</div>
            <div class="card-body">
                <?php foreach ($project['technicians'] as $tech): ?>
                <div class="d-flex align-items-center gap-2 py-2 border-bottom">
                    <div class="avatar-sm"><?= h(initials($tech)) ?></div>
                    <span class="small"><?= h($tech) ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Materials -->
    <?php if (!empty($project['materials'])): ?>
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white fw-semibold">Materials</div>
            <div class="card-body p-0">
                <table class="table table-sm mb-0">
                    <thead class="table-light">
                        <tr><th>Material</th><th>Qty</th><th>Unit</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach ($project['materials'] as $m): ?>
                        <tr>
                            <td class="small"><?= h($m['name']) ?></td>
                            <td class="small"><?= h($m['qty']) ?></td>
                            <td class="small"><?= h($m['unit']) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<!-- My Reports for this project -->
<div class="card border-0 shadow-sm mt-4">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <span class="fw-semibold">Reports for this Project</span>
        <a href="/tech/reports" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg me-1"></i>Submit Report
        </a>
    </div>
    <div class="card-body">
        <?php if (empty($projReports)): ?>
        <p class="text-muted small mb-0">No reports yet.</p>
        <?php else: ?>
        <div class="d-flex flex-column gap-3">
            <?php foreach ($projReports as $rep): ?>
            <div class="border rounded p-3">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <?= statusBadge($rep['type']) ?>
                    <span class="text-muted small"><?= h($rep['date']) ?></span>
                </div>
                <p class="small mb-0"><?= h($rep['description']) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php require TEMPLATES . '/partials/dashboard-bottom.php'; ?>
