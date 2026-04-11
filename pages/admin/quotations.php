<?php $pageTitle = 'Quotations'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php
$quotes = [
    ['id' => 'QT-101', 'project' => 'PRJ-1001', 'client' => 'ACME Holdings', 'amount' => 245000, 'status' => 'Sent'],
    ['id' => 'QT-102', 'project' => 'PRJ-1002', 'client' => 'J. Dela Cruz', 'amount' => 78500, 'status' => 'Approved'],
    ['id' => 'QT-103', 'project' => 'PRJ-1003', 'client' => 'Metro Storage', 'amount' => 113000, 'status' => 'Draft'],
];
?>
<main class="container py-4 my-auto">
    <h2 class="h4 fw-bold mb-3">Quotations</h2>
    <div class="table-responsive card border-0 shadow-sm">
        <table class="table table-hover mb-0">
            <thead class="table-light"><tr><th>Quotation</th><th>Project</th><th>Client</th><th>Total</th><th>Status</th></tr></thead>
            <tbody>
            <?php foreach ($quotes as $q): ?>
                <tr>
                    <td><?php echo htmlspecialchars($q['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($q['project'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($q['client'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>₱<?php echo number_format((float) $q['amount'], 2); ?></td>
                    <td><span class="badge <?php echo $q['status'] === 'Approved' ? 'bg-success' : ($q['status'] === 'Sent' ? 'bg-primary' : 'bg-secondary'); ?>"><?php echo htmlspecialchars($q['status'], ENT_QUOTES, 'UTF-8'); ?></span></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
