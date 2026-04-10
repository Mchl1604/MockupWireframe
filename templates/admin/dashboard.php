<?php
$pageTitle = 'Dashboard';
$activeNav = 'dashboard';
require TEMPLATES . '/partials/dashboard-top.php';

$stats = [
    ['title' => 'Total Projects',          'value' => 24, 'icon' => 'bi-folder-kanban', 'color' => 'text-primary',   'bg' => '#eff6ff'],
    ['title' => 'Pending Requests',         'value' => 8,  'icon' => 'bi-file-earmark',  'color' => 'text-warning',   'bg' => '#fffbeb'],
    ['title' => 'Active Projects',          'value' => 12, 'icon' => 'bi-clock',         'color' => 'text-primary',   'bg' => '#eff6ff'],
    ['title' => 'Available Technicians',    'value' => 3,  'icon' => 'bi-wrench',        'color' => 'text-success',   'bg' => '#f0fdf4'],
];

$barData = [
    ['month' => 'Jan', 'projects' => 4],
    ['month' => 'Feb', 'projects' => 6],
    ['month' => 'Mar', 'projects' => 8],
    ['month' => 'Apr', 'projects' => 5],
];

$statusCounts = [
    'Completed'      => 10,
    'Ongoing'        => 8,
    'To be Approved' => 6,
];
?>

<!-- Stats row -->
<div class="row g-3 mb-4">
    <?php foreach ($stats as $s): ?>
    <div class="col-sm-6 col-xl-3">
        <div class="card border-0 shadow-sm stat-card">
            <div class="card-body d-flex align-items-center gap-3">
                <div class="stat-icon" style="background:<?= h($s['bg']) ?>;">
                    <i class="<?= h($s['icon']) ?> fs-4 <?= h($s['color']) ?>"></i>
                </div>
                <div>
                    <h3 class="fw-bold mb-0"><?= $s['value'] ?></h3>
                    <p class="text-muted small mb-0"><?= h($s['title']) ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<!-- Charts row -->
<div class="row g-4">
    <!-- Bar chart (pure CSS/HTML approximation) -->
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white fw-semibold small">Projects by Month</div>
            <div class="card-body d-flex align-items-end gap-3 pb-2" style="height:240px;">
                <?php $maxVal = max(array_column($barData, 'projects')); ?>
                <?php foreach ($barData as $d): ?>
                <div class="d-flex flex-column align-items-center flex-grow-1">
                    <span class="small text-muted mb-1"><?= $d['projects'] ?></span>
                    <div class="w-100 rounded-top" style="background:#2563eb;height:<?= round($d['projects'] / $maxVal * 160) ?>px;"></div>
                    <span class="small text-muted mt-1"><?= h($d['month']) ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Status summary -->
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white fw-semibold small">Project Status</div>
            <div class="card-body">
                <?php
                $total  = array_sum($statusCounts);
                $colors = ['Completed' => '#16a34a', 'Ongoing' => '#2563eb', 'To be Approved' => '#d97706'];
                foreach ($statusCounts as $label => $count):
                    $pct = $total > 0 ? round($count / $total * 100) : 0;
                    $col = $colors[$label] ?? '#6b7280';
                ?>
                <div class="mb-3">
                    <div class="d-flex justify-content-between small mb-1">
                        <span class="fw-medium"><?= h($label) ?></span>
                        <span class="text-muted"><?= $count ?> (<?= $pct ?>%)</span>
                    </div>
                    <div class="progress" style="height:10px;">
                        <div class="progress-bar" role="progressbar"
                             style="width:<?= $pct ?>%;background:<?= h($col) ?>;"
                             aria-valuenow="<?= $pct ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <?php endforeach; ?>

                <hr>
                <!-- Recent activity list -->
                <p class="fw-semibold small mb-2">Recent Projects</p>
                <?php foreach (array_slice($projects, 0, 3) as $p): ?>
                <div class="d-flex justify-content-between align-items-center py-1 border-bottom small">
                    <span class="text-truncate me-2"><?= h($p['name']) ?></span>
                    <?= statusBadge($p['status']) ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php require TEMPLATES . '/partials/dashboard-bottom.php'; ?>
