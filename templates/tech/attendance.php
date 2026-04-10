<?php
$pageTitle = 'Attendance';
$activeNav = 'attendance';
require TEMPLATES . '/partials/dashboard-top.php';
?>

<div class="row justify-content-center">
    <div class="col-lg-9">
        <!-- Today's attendance card -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white fw-semibold">Today's Attendance</div>
            <div class="card-body d-flex align-items-center gap-4 flex-wrap">
                <div class="text-center">
                    <p class="text-muted small mb-1">Current Time</p>
                    <p class="h3 fw-bold mb-0" id="liveClock">08:00 AM</p>
                    <p class="text-muted small">April 10, 2026</p>
                </div>
                <div class="d-flex gap-2 flex-wrap">
                    <button class="btn btn-success">
                        <i class="bi bi-clock me-2"></i>Time In
                    </button>
                    <button class="btn btn-outline-secondary">
                        <i class="bi bi-clock me-2"></i>Time Out
                    </button>
                </div>
            </div>
        </div>

        <!-- History table -->
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white fw-semibold">Attendance History</div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Date</th>
                                <th>Project</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                                <th>Status</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($attendance as $a): ?>
                            <tr>
                                <td class="small"><?= h($a['date']) ?></td>
                                <td class="small"><?= h($a['project']) ?></td>
                                <td class="small"><?= h($a['timeIn']) ?></td>
                                <td class="small"><?= h($a['timeOut']) ?></td>
                                <td><?= statusBadge($a['status']) ?></td>
                                <td class="text-muted small"><?= h($a['remarks'] ?: '—') ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require TEMPLATES . '/partials/dashboard-bottom.php'; ?>
