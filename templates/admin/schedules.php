<?php
$pageTitle = 'Schedules';
$activeNav = 'schedules';
require TEMPLATES . '/partials/dashboard-top.php';

$year      = 2026;
$month     = 3; // April (0-indexed)
$firstDay  = (int)(new DateTime("$year-04-01"))->format('w');
$daysInMonth = (int)(new DateTime("$year-04-01"))->format('t');
$today     = 10;
$daysOfWeek = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
?>

<h5 class="fw-semibold mb-3">April 2026</h5>

<div class="calendar-grid">
    <!-- Day headers -->
    <?php foreach ($daysOfWeek as $dow): ?>
    <div class="cal-header"><?= h($dow) ?></div>
    <?php endforeach; ?>

    <!-- Empty cells before first day -->
    <?php for ($i = 0; $i < $firstDay; $i++): ?>
    <div class="cal-cell empty"></div>
    <?php endfor; ?>

    <!-- Day cells -->
    <?php for ($d = 1; $d <= $daysInMonth; $d++):
        $isToday  = ($d === $today);
        $dayEvents = array_filter($scheduleEvents, fn($e) => $e['date'] === $d);
    ?>
    <div class="cal-cell <?= $isToday ? 'today' : '' ?>">
        <span class="cal-day <?= $isToday ? 'today-dot' : '' ?>"><?= $d ?></span>
        <?php foreach ($dayEvents as $ev): ?>
        <div class="cal-event <?= h($ev['color']) ?>" title="<?= h($ev['tech']) ?>">
            <?= h($ev['title']) ?>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endfor; ?>
</div>

<?php require TEMPLATES . '/partials/dashboard-bottom.php'; ?>
