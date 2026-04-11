<?php $pageTitle = 'Reports'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php
$reports = [
    ['id' => 'REP-9001', 'project' => 'PRJ-1001', 'author' => 'Mario Santos', 'date' => 'Apr 12, 2026'],
    ['id' => 'REP-9002', 'project' => 'PRJ-1002', 'author' => 'Carlo Reyes', 'date' => 'Apr 09, 2026'],
];
?>
<main class="container py-4 my-auto">
    <h2 class="h4 fw-bold mb-3">Project Reports</h2>
    <div class="table-responsive card border-0 shadow-sm">
        <table class="table table-hover mb-0">
            <thead class="table-light"><tr><th>Report ID</th><th>Project</th><th>Technician</th><th>Date</th></tr></thead>
            <tbody>
                <?php foreach ($reports as $r): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($r['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($r['project'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($r['author'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($r['date'], ENT_QUOTES, 'UTF-8'); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
