<?php $pageTitle = 'Submit Report'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<?php
$reportsList = [
    ['id' => 'REP-001', 'project' => 'PRJ-1001', 'type' => 'Assessment Report', 'date' => 'Apr 18, 2026', 'status' => 'Submitted', 'description' => 'Initial assessment completed.', 'technicians' => 3, 'working_days' => 5, 'materials' => [['name' => 'Copper Tubing', 'quantity' => 50, 'unit' => 'meters'], ['name' => 'Refrigerant R-410A', 'quantity' => 10, 'unit' => 'kg'], ['name' => 'Installation Kit', 'quantity' => 2, 'unit' => 'set']]],
    ['id' => 'REP-002', 'project' => 'PRJ-1003', 'type' => 'Progress Report', 'date' => 'Apr 17, 2026', 'status' => 'Submitted', 'description' => 'Installation progress on schedule. 40% completion.', 'pictures' => ['./assets/img/imageSample.png', './assets/img/imageSample.png', './assets/img/imageSample.png']],
    ['id' => 'REP-003', 'project' => 'PRJ-1004', 'type' => 'Incident Report', 'date' => 'Apr 16, 2026', 'status' => 'Submitted', 'description' => 'Minor issue with Unit 2 connector. Resolved with spare parts.', 'pictures' => ['./assets/img/imageSample.png', './assets/img/imageSample.png']],
    ['id' => 'REP-004', 'project' => 'PRJ-1005', 'type' => 'Progress Report', 'date' => 'Apr 15, 2026', 'status' => 'Submitted', 'description' => 'Ventilation system retrofit phase 2 initiated.', 'pictures' => ['./assets/img/imageSample.png']],
    ['id' => 'REP-005', 'project' => 'PRJ-1001', 'type' => 'Progress Report', 'date' => 'Apr 14, 2026', 'status' => 'Submitted', 'description' => 'Installation started. Foundation preparation completed.', 'pictures' => ['./assets/img/imageSample.png', './assets/img/imageSample.png']],
];
?>
<main class="container py-4 flex-grow-1">
    <?php if (!empty($_GET['submitted'])): ?>
        <div class="alert alert-success"><i class="bi bi-check-circle me-2"></i>Report submitted successfully.</div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 fw-bold mb-0">Submit New Report</h2>
    </div>
    <form method="POST" action="<?php echo htmlspecialchars(app_url('/lead-technician/reports'), ENT_QUOTES, 'UTF-8'); ?>" class="card border-0 shadow-sm needs-validation" novalidate enctype="multipart/form-data">
        <div class="card-body">
            <input type="hidden" name="action" value="submit_report">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Project</label>
                    <select class="form-select" name="project" required>
                        <option value="">Select project</option>
                        <option value="PRJ-1001">PRJ-1001 - Aircon Installation - ACME Holdings</option>
                        <option value="PRJ-1003">PRJ-1003 - Ductwork Installation - Metro Storage</option>
                        <option value="PRJ-1004">PRJ-1004 - Split-Type AC Unit Installation - Northline Foods</option>
                        <option value="PRJ-1005">PRJ-1005 - Ventilation System Retrofit - BluePeak IT</option>
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

    <div class="card border-0 shadow-sm mt-4">
        <div class="card-header bg-white border-bottom">
            <h5 class="mb-0">My Reports</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Report ID</th>
                        <th>Project</th>
                        <th>Type</th>
                        <th>Date</th>
                        <th style="width: 80px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reportsList as $report): ?>
                    <tr>
                        <td><strong><?php echo htmlspecialchars($report['id'], ENT_QUOTES, 'UTF-8'); ?></strong></td>
                        <td><?php echo htmlspecialchars($report['project'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <?php
                            $badgeClass = 'text-bg-info';
                            if ($report['type'] === 'Incident Report') {
                                $badgeClass = 'text-bg-danger';
                            } elseif ($report['type'] === 'Progress Report') {
                                $badgeClass = 'text-bg-primary';
                            }
                            ?>
                            <span class="badge <?php echo $badgeClass; ?>"><?php echo htmlspecialchars($report['type'], ENT_QUOTES, 'UTF-8'); ?></span>
                        </td>
                        <td><?php echo htmlspecialchars($report['date'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-outline-primary view-report-btn" data-report-id="<?php echo htmlspecialchars($report['id'], ENT_QUOTES, 'UTF-8'); ?>" data-bs-toggle="modal" data-bs-target="#reportDetailsModal" title="View details">
                                <i class="bi bi-eye"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<div class="modal fade" id="reportDetailsModal" tabindex="-1" aria-labelledby="reportDetailsLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reportDetailsLabel">Report Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Report ID</label>
                        <div id="modalReportId" class="form-control-plaintext">-</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Project</label>
                        <div id="modalProject" class="form-control-plaintext">-</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Report Type</label>
                        <div id="modalType" class="form-control-plaintext">-</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Date</label>
                        <div id="modalDate" class="form-control-plaintext">-</div>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold">Description</label>
                        <div id="modalDescription" class="form-control-plaintext" style="white-space: pre-wrap;">-</div>
                    </div>
                    
                    <div id="assessmentDetailsSection" class="col-12 d-none">
                        <hr class="my-2">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Number of Technicians</label>
                                <div id="modalTechnicians" class="form-control-plaintext">-</div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Estimated Working Days</label>
                                <div id="modalWorkingDays" class="form-control-plaintext">-</div>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Materials Needed</label>
                                <div class="table-responsive border rounded">
                                    <table class="table table-sm mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Material</th>
                                                <th style="width: 100px;">Quantity</th>
                                                <th style="width: 80px;">Unit</th>
                                            </tr>
                                        </thead>
                                        <tbody id="modalMaterialsTable">
                                            <tr>
                                                <td colspan="3" class="text-center text-muted py-2">No materials</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div id="picturesSection" class="col-12 d-none">
                        <hr class="my-2">
                        <label class="form-label fw-bold">Pictures</label>
                        <div id="modalPictures" class="d-flex flex-wrap gap-2">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const reportsList = <?php echo json_encode($reportsList); ?>;
    const viewReportBtns = document.querySelectorAll('.view-report-btn');
    const reportDetailsModal = document.getElementById('reportDetailsModal');

    if (viewReportBtns && reportDetailsModal) {
        viewReportBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                const reportId = btn.getAttribute('data-report-id');
                const report = reportsList.find(function (r) { return r.id === reportId; });

                if (report) {
                    document.getElementById('modalReportId').textContent = report.id;
                    document.getElementById('modalProject').textContent = report.project;
                    document.getElementById('modalType').textContent = report.type;
                    document.getElementById('modalDate').textContent = report.date;
                    document.getElementById('modalDescription').textContent = report.description;

                    const assessmentSection = document.getElementById('assessmentDetailsSection');
                    const picturesSection = document.getElementById('picturesSection');

                    if (report.type === 'Assessment Report') {
                        assessmentSection.classList.remove('d-none');
                        picturesSection.classList.add('d-none');

                        document.getElementById('modalTechnicians').textContent = report.technicians || '-';
                        document.getElementById('modalWorkingDays').textContent = report.working_days || '-';

                        const materialsTable = document.getElementById('modalMaterialsTable');
                        if (report.materials && report.materials.length > 0) {
                            materialsTable.innerHTML = report.materials.map(function (material) {
                                return '<tr>'
                                    + '<td>' + material.name + '</td>'
                                    + '<td>' + material.quantity + '</td>'
                                    + '<td>' + material.unit + '</td>'
                                    + '</tr>';
                            }).join('');
                        } else {
                            materialsTable.innerHTML = '<tr><td colspan="3" class="text-center text-muted py-2">No materials</td></tr>';
                        }
                    } else {
                        assessmentSection.classList.add('d-none');
                        picturesSection.classList.remove('d-none');

                        const picturesContainer = document.getElementById('modalPictures');
                        picturesContainer.innerHTML = '';
                        if (report.pictures && report.pictures.length > 0) {
                            report.pictures.forEach(function (pic) {
                                const img = document.createElement('img');
                                img.src = pic;
                                img.alt = 'Report picture';
                                img.style.maxWidth = '150px';
                                img.style.maxHeight = '150px';
                                img.classList.add('border', 'rounded');
                                picturesContainer.appendChild(img);
                            });
                        } else {
                            picturesContainer.innerHTML = '<div class="text-muted">No pictures</div>';
                        }
                    }
                }
            });
        });
    }

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
