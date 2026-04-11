<?php $pageTitle = 'Project Details'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<?php $projectId = $_GET['id'] ?? 'PRJ-1001'; ?>
<main class="container py-4 flex-grow-1">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 fw-bold mb-0">Project Details</h2>
        <a href="<?php echo htmlspecialchars(app_url('/tech/projects'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-outline-secondary btn-sm">Back to My Projects</a>
    </div>
    <div class="card border-0 shadow-sm"><div class="card-body">
        <p class="mb-2"><strong>Project ID:</strong> <?php echo htmlspecialchars($projectId, ENT_QUOTES, 'UTF-8'); ?></p>
        <p class="mb-2"><strong>Client:</strong> ACME Holdings</p>
        <p class="mb-2"><strong>Service:</strong> AC Installation</p>
        <p class="mb-0 text-muted">Site works are ongoing. Please complete indoor unit piping before final testing.</p>
    </div></div>
</main>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
