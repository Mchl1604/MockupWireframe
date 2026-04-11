<?php $pageTitle = 'Service Requests'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php
$requests = [
    ['id' => 'REQ-001', 'client' => 'ACME Holdings', 'service' => 'AC Installation', 'date' => 'Apr 12, 2026', 'status' => 'Pending'],
    ['id' => 'REQ-002', 'client' => 'J. Dela Cruz', 'service' => 'AC Repair', 'date' => 'Apr 13, 2026', 'status' => 'Approved'],
    ['id' => 'REQ-003', 'client' => 'Metro Storage', 'service' => 'Ducting', 'date' => 'Apr 14, 2026', 'status' => 'Rejected'],
];
?>
<main class="container py-4 my-auto">
    <h2 class="h4 fw-bold mb-3">Service Requests</h2>
    <div class="table-responsive card border-0 shadow-sm">
        <table class="table table-hover mb-0">
            <thead class="table-light"><tr><th>ID</th><th>Client</th><th>Service</th><th>Date</th><th>Status</th></tr></thead>
            <tbody>
            <?php foreach ($requests as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($item['client'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($item['service'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($item['date'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><span class="badge <?php echo $item['status'] === 'Pending' ? 'bg-warning text-dark' : ($item['status'] === 'Approved' ? 'bg-success' : 'bg-danger'); ?>"><?php echo htmlspecialchars($item['status'], ENT_QUOTES, 'UTF-8'); ?></span></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
