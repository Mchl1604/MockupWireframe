<?php
$pageTitle = 'Materials';
$activeNav = 'materials';
require TEMPLATES . '/partials/dashboard-top.php';
?>

<div class="d-flex justify-content-end mb-3">
    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addMaterialModal">
        <i class="bi bi-plus-lg me-1"></i>Add Material
    </button>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Date Added</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($materials as $m): ?>
                    <tr>
                        <td class="fw-medium"><?= h($m['name']) ?></td>
                        <td><?= h($m['category']) ?></td>
                        <td><?= peso($m['price']) ?></td>
                        <td class="text-muted small"><?= h($m['dateAdded']) ?></td>
                        <td class="text-end">
                            <div class="d-flex gap-1 justify-content-end">
                                <button class="btn btn-outline-secondary btn-sm" title="View">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-outline-secondary btn-sm" title="Archive">
                                    <i class="bi bi-archive"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Material Modal -->
<div class="modal fade" id="addMaterialModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Material</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Name</label>
                        <input type="text" class="form-control" required placeholder="Material name">
                        <div class="invalid-feedback">Required.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Category</label>
                        <select class="form-select" required>
                            <option value="">Select category…</option>
                            <option>AC Installation</option>
                            <option>Ducting</option>
                            <option>AC Repair</option>
                            <option>General</option>
                        </select>
                        <div class="invalid-feedback">Required.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Price (₱)</label>
                        <input type="number" class="form-control" required min="0" step="0.01" placeholder="0.00">
                        <div class="invalid-feedback">Required.</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm">Save Material</button>
                <button class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<?php require TEMPLATES . '/partials/dashboard-bottom.php'; ?>
