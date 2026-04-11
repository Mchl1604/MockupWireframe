<?php $pageTitle = 'Technicians'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php
$techs = [
    ['name' => 'Mario Santos', 'skill' => 'VRF Installation', 'status' => 'Available'],
    ['name' => 'Carlo Reyes', 'skill' => 'Ducting', 'status' => 'Assigned'],
    ['name' => 'Jude Flores', 'skill' => 'Electrical', 'status' => 'On Leave'],
];
?>
<main class="container py-4 my-auto">
    <h2 class="h4 fw-bold mb-3">Technicians</h2>
    <div class="table-responsive card border-0 shadow-sm">
        <table class="table table-hover mb-0">
            <thead class="table-light"><tr><th>Name</th><th>Specialty</th><th>Status</th></tr></thead>
            <tbody>
                <?php foreach ($techs as $tech): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($tech['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($tech['skill'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><span class="badge <?php echo $tech['status'] === 'Available' ? 'bg-success' : ($tech['status'] === 'Assigned' ? 'bg-primary' : 'bg-secondary'); ?>"><?php echo htmlspecialchars($tech['status'], ENT_QUOTES, 'UTF-8'); ?></span></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
