<nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="<?php echo htmlspecialchars($baseUrl . '/', ENT_QUOTES, 'UTF-8'); ?>">
            <div style="width:34px;height:34px;background:#2563eb;border-radius:8px;display:flex;align-items:center;justify-content:center;">
                <i class="bi bi-wind text-white"></i>
            </div>
            Coliconstruct
        </a>
        <div class="ms-auto d-flex gap-2">
            <a href="<?php echo htmlspecialchars($baseUrl . '/', ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-outline-secondary btn-sm">Home</a>
            <a href="<?php echo htmlspecialchars($baseUrl . '/login', ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-outline-primary btn-sm">Login</a>
            <a href="<?php echo htmlspecialchars($baseUrl . '/register', ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-primary btn-sm">Register</a>
        </div>
    </div>
</nav>
