<?php $pageTitle = 'Schedules'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<main class="container py-4 my-auto">
    <h2 class="h4 fw-bold mb-3">Schedules</h2>
    <div class="calendar-grid bg-white shadow-sm">
        <?php foreach (['Sun','Mon','Tue','Wed','Thu','Fri','Sat'] as $d): ?><div class="cal-header"><?php echo htmlspecialchars($d, ENT_QUOTES, 'UTF-8'); ?></div><?php endforeach; ?>
        <?php for ($i = 1; $i <= 35; $i++): ?>
            <div class="cal-cell <?php echo $i === 15 ? 'today' : ''; ?>">
                <div class="cal-day <?php echo $i === 15 ? 'today-dot' : ''; ?>"><?php echo $i <= 30 ? $i : ''; ?></div>
                <?php if ($i === 12): ?><div class="cal-event bg-primary">PRJ-1001 Site Visit</div><?php endif; ?>
                <?php if ($i === 18): ?><div class="cal-event bg-warning">Client Meeting</div><?php endif; ?>
                <?php if ($i === 22): ?><div class="cal-event bg-success">Commissioning</div><?php endif; ?>
            </div>
        <?php endfor; ?>
    </div>
</main>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
