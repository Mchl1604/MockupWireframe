<?php
$pageTitle = 'Submit Report';
$activeNav = 'reports';
require TEMPLATES . '/partials/dashboard-top.php';

$sampleMaterials = [
    ['name' => 'AC Unit',      'unit' => 'pc'],
    ['name' => 'Copper Pipe',  'unit' => 'roll'],
    ['name' => 'Bracket',      'unit' => 'set'],
];
?>

<?php if (!empty($_GET['submitted'])): ?>
<div class="text-center py-5">
    <div class="mx-auto mb-3 d-flex align-items-center justify-content-center rounded-circle"
         style="width:72px;height:72px;background:#f0fdf4;">
        <i class="bi bi-upload fs-1 text-success"></i>
    </div>
    <h3 class="fw-bold mb-2">Report Submitted!</h3>
    <p class="text-muted mb-4">Your report has been sent to the admin for review.</p>
    <a href="<?= h(url('/tech/reports')) ?>" class="btn btn-primary">Submit Another Report</a>
</div>
<?php else: ?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white fw-semibold">Create New Report</div>
            <div class="card-body">
                <form method="POST" action="<?= h(url('/tech/reports')) ?>"
                      class="needs-validation" novalidate enctype="multipart/form-data">
                    <?= csrfField() ?>
                    <input type="hidden" name="action" value="submit_report">

                    <div class="row g-3 mb-3">
                        <div class="col-sm-6">
                            <label class="form-label fw-medium">Project</label>
                            <select class="form-select" name="project" required>
                                <option value="">Select project…</option>
                                <option value="PRJ-001">Office AC Installation</option>
                                <option value="PRJ-002">Warehouse Ducting System</option>
                                <option value="PRJ-004">Preventive Maintenance Contract</option>
                            </select>
                            <div class="invalid-feedback">Please select a project.</div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label fw-medium">Report Type</label>
                            <select class="form-select" name="type" required>
                                <option value="">Select type…</option>
                                <option value="Assessment">Assessment</option>
                                <option value="Progress">Progress</option>
                                <option value="Incident">Incident</option>
                            </select>
                            <div class="invalid-feedback">Please select a type.</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-medium">Description</label>
                        <textarea class="form-control" name="description" rows="4"
                                  placeholder="Describe your findings, progress, or incident..." required></textarea>
                        <div class="invalid-feedback">Please add a description.</div>
                    </div>

                    <!-- Materials used -->
                    <div class="mb-3">
                        <label class="form-label fw-medium">Materials Used</label>
                        <table class="table table-sm table-bordered">
                            <thead class="table-light">
                                <tr><th>Material</th><th>Quantity</th><th>Unit</th></tr>
                            </thead>
                            <tbody>
                                <?php foreach ($sampleMaterials as $idx => $m): ?>
                                <tr>
                                    <td class="small align-middle"><?= h($m['name']) ?></td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm"
                                               name="mat_qty[<?= $idx ?>]" min="0" placeholder="0" style="width:80px;">
                                    </td>
                                    <td class="small align-middle"><?= h($m['unit']) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Image upload -->
                    <div class="mb-4">
                        <label class="form-label fw-medium">Attach Images</label>
                        <div class="border border-dashed rounded p-4 text-center" style="border-style:dashed!important;">
                            <i class="bi bi-image fs-1 text-muted d-block mb-2"></i>
                            <p class="text-muted small mb-2">Drag &amp; drop images here or click to browse</p>
                            <label class="btn btn-outline-secondary btn-sm">
                                Choose Files
                                <input type="file" name="images[]" multiple accept="image/*" class="d-none">
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit Report</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>

<?php require TEMPLATES . '/partials/dashboard-bottom.php'; ?>
