<?php $pageTitle = '404 Not Found'; ?>
<?php include __DIR__ . '/../includes/head.php'; ?>
<body class="min-vh-100 d-flex flex-column bg-light">
<?php include __DIR__ . '/../includes/navbar.php'; ?>

<div class="container my-auto">
    <div class="text-center px-4 py-5">
        <h1 class="display-1 fw-bold text-primary">404</h1>
        <h4 class="fw-semibold mb-3">Page Not Found</h4>
        <p class="text-muted mb-4">
            The page you're looking for doesn't exist or has been moved.
        </p>
        <a href="<?php echo htmlspecialchars(app_url('/'), ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-primary">Go Home</a>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
