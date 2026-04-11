<?php $pageTitle = 'My Projects'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>

<main class="container py-4 my-auto">
    <h2 class="h4 fw-bold mb-3">My Projects</h2>

    <?php
    $projects = [
        ['name' => 'Makati Office VRF', 'serviceType' => 'AC Installation', 'status' => 'Ongoing', 'timeline' => 'Apr 10 - Apr 18'],
        ['name' => 'Condo Split-Type Repair', 'serviceType' => 'AC Repair', 'status' => 'Completed', 'timeline' => 'Apr 1 - Apr 2'],
        ['name' => 'Warehouse Ducting', 'serviceType' => 'Ducting Systems', 'status' => 'To be Approved', 'timeline' => 'Apr 20 - Apr 27'],
    ];
    ?>

    <div class="table-responsive card border-0 shadow-sm">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Service</th>
                    <th>Status</th>
                    <th>Timeline</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($projects as $project): ?>
                <tr>
                    <td><?php echo htmlspecialchars($project['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($project['serviceType'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <?php if ($project['status'] === 'Ongoing'): ?>
                            <span class="badge bg-primary"><?php echo htmlspecialchars($project['status'], ENT_QUOTES, 'UTF-8'); ?></span>
                        <?php elseif ($project['status'] === 'Completed'): ?>
                            <span class="badge bg-success"><?php echo htmlspecialchars($project['status'], ENT_QUOTES, 'UTF-8'); ?></span>
                        <?php else: ?>
                            <span class="badge bg-warning text-dark"><?php echo htmlspecialchars($project['status'], ENT_QUOTES, 'UTF-8'); ?></span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlspecialchars($project['timeline'], ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
