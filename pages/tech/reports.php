<?php $pageTitle = 'Submit Report'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<main class="container py-4 flex-grow-1">
    <?php if (!empty($_GET['submitted'])): ?>
        <div class="alert alert-success"><i class="bi bi-check-circle me-2"></i>Report submitted successfully.</div>
    <?php endif; ?>

    <h2 class="h4 fw-bold mb-3">Submit Report</h2>
    <form method="POST" action="<?php echo htmlspecialchars(app_url('/tech/reports'), ENT_QUOTES, 'UTF-8'); ?>" class="card border-0 shadow-sm needs-validation" novalidate enctype="multipart/form-data">
        <div class="card-body">
            <input type="hidden" name="action" value="submit_report">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Project</label>
                    <select class="form-select" name="project" required>
                        <option value="">Select project</option>
                        <option value="PRJ-1001">PRJ-1001 - Aircon Installation - ACME Holdings</option>
                        <option value="PRJ-1003">PRJ-1003 - Ducting Installation - Metro Storage</option>
                        <option value="PRJ-1004">PRJ-1004 - Aircon Installation - Northline Foods</option>
                        <option value="PRJ-1005">PRJ-1005 - Ducting Fabrication - BluePeak IT</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Report Type</label>
                    <select class="form-select" name="type" id="reportType" required>
                        <option value="">Select type</option>
                        <option value="Assessment Report">Assessment Report</option>
                        <option value="Progress Report">Progress Report</option>
                        <option value="Incident Report">Incident Report</option>
                    </select>
                </div>

                <div class="col-12 d-none" id="assessmentFields">
                    <div class="border rounded-3 p-3 bg-light-subtle">
                        <h3 class="h6 mb-3">Assessment Report Details</h3>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Number of Technicians</label>
                                <input type="number" class="form-control" min="1" step="1" id="requiredTechnicians" name="required_technicians" disabled>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Estimated Working Days</label>
                                <input type="number" class="form-control" min="1" step="1" id="estimatedDays" name="estimated_days" disabled>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" rows="4" id="assessmentDescription" name="assessment_description" disabled></textarea>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <label class="form-label mb-0">Materials Needed</label>
                                    <button type="button" class="btn btn-sm btn-outline-primary" id="addMaterialRow">
                                        <i class="bi bi-plus-lg me-1"></i>Add Material
                                    </button>
                                </div>
                                <div class="table-responsive border rounded">
                                    <table class="table table-sm mb-0" id="materialsTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Material</th>
                                                <th style="width: 120px;">Quantity</th>
                                                <th style="width: 70px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control form-control-sm" name="assessment_material_name[]" disabled></td>
                                                <td><input type="number" class="form-control form-control-sm" min="1" step="1" name="assessment_material_qty[]" disabled></td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-sm btn-outline-danger material-remove" title="Remove row">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 d-none" id="workReportFields">
                    <div class="border rounded-3 p-3 bg-light-subtle">
                        <h3 class="h6 mb-3">Progress / Incident Details</h3>
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" rows="4" id="workDescription" name="work_description" disabled></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Upload Pictures</label>
                                <input type="file" class="form-control" id="workPhotos" name="report_photos[]" accept="image/*" multiple disabled>
                                <small class="text-muted">You can select multiple images.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-white d-flex justify-content-end"><button class="btn btn-primary" type="submit">Submit</button></div>
    </form>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const reportType = document.getElementById('reportType');
    const assessmentFields = document.getElementById('assessmentFields');
    const workReportFields = document.getElementById('workReportFields');
    const requiredTechnicians = document.getElementById('requiredTechnicians');
    const estimatedDays = document.getElementById('estimatedDays');
    const assessmentDescription = document.getElementById('assessmentDescription');
    const workDescription = document.getElementById('workDescription');
    const workPhotos = document.getElementById('workPhotos');
    const addMaterialRowBtn = document.getElementById('addMaterialRow');
    const materialsTableBody = document.querySelector('#materialsTable tbody');

    function setSectionState(sectionEl, enabled) {
        sectionEl.classList.toggle('d-none', !enabled);
        sectionEl.querySelectorAll('input, textarea, select, button').forEach(function (field) {
            if (!field.classList.contains('material-remove') && field.id !== 'addMaterialRow') {
                field.disabled = !enabled;
            }
        });
    }

    function applyReportTypeState() {
        const selectedType = reportType ? reportType.value : '';
        const isAssessment = selectedType === 'Assessment Report';
        const isWorkReport = selectedType === 'Progress Report' || selectedType === 'Incident Report';

        setSectionState(assessmentFields, isAssessment);
        setSectionState(workReportFields, isWorkReport);

        if (requiredTechnicians) requiredTechnicians.required = isAssessment;
        if (estimatedDays) estimatedDays.required = isAssessment;
        if (assessmentDescription) assessmentDescription.required = isAssessment;
        if (workDescription) workDescription.required = isWorkReport;
        if (workPhotos) workPhotos.required = isWorkReport;
    }

    function addMaterialRow() {
        if (!materialsTableBody) return;
        const row = document.createElement('tr');
        row.innerHTML = ''
            + '<td><input type="text" class="form-control form-control-sm" name="assessment_material_name[]"></td>'
            + '<td><input type="number" class="form-control form-control-sm" min="1" step="1" name="assessment_material_qty[]"></td>'
            + '<td class="text-center">'
            + '    <button type="button" class="btn btn-sm btn-outline-danger material-remove" title="Remove row">'
            + '        <i class="bi bi-trash"></i>'
            + '    </button>'
            + '</td>';

        if (assessmentFields.classList.contains('d-none')) {
            row.querySelectorAll('input').forEach(function (input) {
                input.disabled = true;
            });
        }

        materialsTableBody.appendChild(row);
    }

    if (addMaterialRowBtn) {
        addMaterialRowBtn.addEventListener('click', addMaterialRow);
    }

    if (materialsTableBody) {
        materialsTableBody.addEventListener('click', function (event) {
            const btn = event.target.closest('.material-remove');
            if (!btn) return;
            const rows = materialsTableBody.querySelectorAll('tr');
            if (rows.length === 1) return;
            btn.closest('tr').remove();
        });
    }

    if (reportType) {
        reportType.addEventListener('change', applyReportTypeState);
    }

    applyReportTypeState();
});
</script>
<?php include __DIR__ . '/../../includes/footer.php'; ?>


