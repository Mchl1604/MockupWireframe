<?php
$currentPath = app_current_path();
$pathSegments = explode('/', trim($currentPath, '/'));
$isPanelRoute = in_array($pathSegments[0] ?? '', ['admin', 'client', 'tech'], true);
?>

<?php if (!$isPanelRoute): ?>
<footer class="bg-dark text-white py-4">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <h5 class="fw-bold mb-2">Coliconstruct Engineering</h5>
                <p class="text-white-50 small mb-0">Professional HVAC solutions since 2018.</p>
            </div>
            <div class="col-md-4">
                <h6 class="fw-semibold mb-2">Contact</h6>
                <p class="text-white-50 small mb-1">info@coliconstruct.com</p>
                <p class="text-white-50 small mb-0">(02) 8123-4567</p>
            </div>
            <div class="col-md-4">
                <h6 class="fw-semibold mb-2">Address</h6>
                <p class="text-white-50 small mb-0">20 NHA Commercial and
Industrial Compound, Barangay Gavino Maderan, Luzon Avenue, General Mariano
Alvarez, Cavite.</p>
            </div>
        </div>
        <hr class="border-white border-opacity-10 my-4">
        <p class="text-center text-white-50 small mb-0">
            &copy; <?php echo date('Y'); ?> Coliconstruct Engineering Services. All rights reserved.
        </p>
    </div>
</footer>
<?php endif; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo htmlspecialchars(($baseUrl !== '' ? $baseUrl : '') . '/assets/js/app.js', ENT_QUOTES, 'UTF-8'); ?>"></script>
</body>
</html>
