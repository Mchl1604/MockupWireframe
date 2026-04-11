<?php $pageTitle = 'Admin Projects'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php
$projects = [
    ['id' => 'PRJ-1001', 'name' => 'Makati Office VRF', 'client' => 'ACME Holdings', 'status' => 'Ongoing'],
    ['id' => 'PRJ-1002', 'name' => 'Condo Repair', 'client' => 'J. Dela Cruz', 'status' => 'Completed'],
    ['id' => 'PRJ-1003', 'name' => 'Warehouse Ducting', 'client' => 'Metro Storage', 'status' => 'To be Approved'],
];
?>
<main class="container py-4 my-auto">
    <h2 class="h4 fw-bold mb-3">Projects</h2>
    <div class="table-responsive card border-0 shadow-sm">
        <table class="table table-hover mb-0">
            <thead class="table-light"><tr><th>ID</th><th>Name</th><th>Client</th><th>Status</th><th></th></tr></thead>
            <tbody>
            <?php foreach ($projects as $p): ?>
                <tr>
                    <td><?php echo htmlspecialchars($p['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($p['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($p['client'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($p['status'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a class="btn btn-sm btn-outline-primary" href="<?php echo htmlspecialchars($baseUrl . '/admin/project?id=' . rawurlencode($p['id']), ENT_QUOTES, 'UTF-8'); ?>">View</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
