<?php $pageTitle = 'Materials'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php
$materials = [
    ['name' => 'Copper Pipe', 'stock' => 32, 'unit' => 'rolls'],
    ['name' => 'AC Unit 2HP', 'stock' => 11, 'unit' => 'pcs'],
    ['name' => 'Duct Sealant', 'stock' => 25, 'unit' => 'tubes'],
];
?>
<main class="container py-4 my-auto">
    <div class="d-flex justify-content-between align-items-center mb-3"><h2 class="h4 fw-bold mb-0">Materials</h2><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addMaterialModal">Add Material</button></div>
    <div class="table-responsive card border-0 shadow-sm">
        <table class="table table-hover mb-0">
            <thead class="table-light"><tr><th>Name</th><th>Stock</th><th>Unit</th></tr></thead>
            <tbody>
                <?php foreach ($materials as $m): ?>
                    <tr><td><?php echo htmlspecialchars($m['name'], ENT_QUOTES, 'UTF-8'); ?></td><td><?php echo htmlspecialchars((string) $m['stock'], ENT_QUOTES, 'UTF-8'); ?></td><td><?php echo htmlspecialchars($m['unit'], ENT_QUOTES, 'UTF-8'); ?></td></tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="addMaterialModal" tabindex="-1" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Add Material</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body"><form class="needs-validation" novalidate><div class="mb-3"><label class="form-label">Material Name</label><input class="form-control" required></div><div class="mb-3"><label class="form-label">Quantity</label><input class="form-control" type="number" min="1" required></div><button type="submit" class="btn btn-primary">Save</button></form></div></div></div></div>
</main>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
