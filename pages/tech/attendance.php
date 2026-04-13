<?php $pageTitle = 'Attendance'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<?php
$attendanceProjects = ['PRJ-1001', 'PRJ-1003', 'PRJ-1004', 'PRJ-1005'];
?>
<main class="container py-4 flex-grow-1">
    <div class="d-flex justify-content-between align-items-center mb-3"><h2 class="h4 fw-bold mb-0">Attendance</h2><span class="badge text-bg-primary" id="liveClock"></span></div>

    <div class="card border-0 shadow-sm mb-3">
        <div class="card-body d-flex gap-2 flex-wrap">
            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#logAttendanceModal">
                <i class="bi bi-plus-circle me-1"></i>Log Attendance
            </button>
            <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#confirmAttendanceModal">
                <i class="bi bi-check2-square me-1"></i>Confirm Attendance
            </button>
        </div>
    </div>

    <div class="table-responsive card border-0 shadow-sm">
        <table class="table table-hover mb-0">
            <thead class="table-light"><tr><th>Project ID</th><th>Date</th><th>Status</th><th>Remarks</th></tr></thead>
            <tbody id="attendanceTableBody">
                <tr>
                    <td>PRJ-1003</td>
                    <td>Apr 10, 2026</td>
                    <td><span class="badge text-bg-success">Present</span></td>
                    <td class="remarks-cell"><span class="badge text-bg-success">Confirmed</span></td>
                </tr>
                <tr>
                    <td>PRJ-1001</td>
                    <td>Apr 11, 2026</td>
                    <td><span class="badge text-bg-success">Present</span></td>
                    <td class="remarks-cell"><span class="badge text-bg-success">Confirmed</span></td>
                </tr>
                <tr>
                    <td>PRJ-1004</td>
                    <td>Apr 12, 2026</td>
                    <td><span class="badge text-bg-danger">Absent</span></td>
                    <td class="remarks-cell"><span class="badge text-bg-warning">Pending</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</main>

<div class="modal fade" id="logAttendanceModal" tabindex="-1" aria-labelledby="logAttendanceLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logAttendanceLabel">Log Attendance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="logAttendanceForm">
                    <div class="mb-3">
                        <label for="attendanceProject" class="form-label">Project</label>
                        <select id="attendanceProject" class="form-select" required>
                            <option value="">Select project</option>
                            <?php foreach ($attendanceProjects as $projectId): ?>
                                <option value="<?php echo htmlspecialchars($projectId, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($projectId, ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-0">
                        <label for="attendanceStatus" class="form-label">Status</label>
                        <select id="attendanceStatus" class="form-select" required>
                            <option value="Present">Present</option>
                            <option value="Absent">Absent</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveAttendanceBtn">Save Attendance</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmAttendanceModal" tabindex="-1" aria-labelledby="confirmAttendanceLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmAttendanceLabel">Confirm Technician Attendance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="confirmProject" class="form-label">Project</label>
                        <select id="confirmProject" class="form-select">
                            <option value="">Select project</option>
                            <?php foreach ($attendanceProjects as $projectId): ?>
                                <option value="<?php echo htmlspecialchars($projectId, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($projectId, ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Date</label>
                        <input id="confirmDate" class="form-control" type="text" readonly>
                    </div>
                </div>

                <div class="table-responsive border rounded">
                    <table class="table table-sm mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Technician</th>
                                <th>Status</th>
                                <th>Remarks</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="confirmTechnicianTableBody">
                            <tr>
                                <td colspan="4" class="text-center text-muted py-3">Select a project to load attendance list.</td>
                            </tr>
                        </tbody>
                    </table>
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
    const saveBtn = document.getElementById('saveAttendanceBtn');
    const projectSelect = document.getElementById('attendanceProject');
    const statusSelect = document.getElementById('attendanceStatus');
    const tableBody = document.getElementById('attendanceTableBody');
    const modalEl = document.getElementById('logAttendanceModal');
    const confirmProject = document.getElementById('confirmProject');
    const confirmDate = document.getElementById('confirmDate');
    const confirmTableBody = document.getElementById('confirmTechnicianTableBody');

    if (!saveBtn || !projectSelect || !statusSelect || !tableBody || !modalEl) return;

    const projectTechnicians = {
        'PRJ-1001': ['Engr. Mark Santos', 'Tech. Carlo Reyes'],
        'PRJ-1003': ['Engr. Mark Santos', 'Tech. Carlo Reyes', 'Tech. Anne Mendoza'],
        'PRJ-1004': ['Engr. Mark Santos', 'Tech. Carl Dominguez'],
        'PRJ-1005': ['Engr. Mark Santos', 'Tech. John Gonzales']
    };

    function statusBadgeHtml(status) {
        const badgeClass = status === 'Absent' ? 'text-bg-danger' : 'text-bg-success';
        return '<span class="badge ' + badgeClass + '">' + status + '</span>';
    }

    function remarksBadgeHtml(remark) {
        const badgeClass = remark === 'Confirmed' ? 'text-bg-success' : 'text-bg-warning';
        return '<span class="badge ' + badgeClass + '">' + remark + '</span>';
    }

    function todayLabel() {
        return new Date().toLocaleDateString([], { month: 'short', day: '2-digit', year: 'numeric' });
    }

    function renderConfirmTable(projectId) {
        if (!confirmTableBody) return;
        const technicians = projectTechnicians[projectId] || [];

        if (!projectId || !technicians.length) {
            confirmTableBody.innerHTML = '<tr><td colspan="4" class="text-center text-muted py-3">Select a project to load attendance list.</td></tr>';
            return;
        }

        confirmTableBody.innerHTML = technicians.map(function (tech, index) {
            const status = index % 3 === 0 ? 'Absent' : 'Present';
            return '<tr>'
                + '<td>' + tech + '</td>'
                + '<td>' + statusBadgeHtml(status) + '</td>'
                + '<td class="confirm-remarks-cell">' + remarksBadgeHtml('Pending') + '</td>'
                + '<td><button type="button" class="btn btn-sm btn-primary confirm-tech-btn"><i class="bi bi-check2 me-1"></i>Confirm</button></td>'
                + '</tr>';
        }).join('');
    }

    function syncMainTableRemarks(projectId) {
        const today = todayLabel();
        if (!confirmTableBody) return;

        const pendingInModal = confirmTableBody.querySelectorAll('.confirm-tech-btn:not([disabled])').length > 0;
        const newRemark = pendingInModal ? 'Pending' : 'Confirmed';

        tableBody.querySelectorAll('tr').forEach(function (row) {
            const projectCell = row.children[0];
            const dateCell = row.children[1];
            const remarksCell = row.querySelector('.remarks-cell');
            if (!projectCell || !dateCell || !remarksCell) return;
            if (projectCell.textContent.trim() === projectId && dateCell.textContent.trim() === today) {
                remarksCell.innerHTML = remarksBadgeHtml(newRemark);
            }
        });
    }

    saveBtn.addEventListener('click', function () {
        const projectId = projectSelect.value.trim();
        if (!projectId) {
            projectSelect.focus();
            return;
        }

        const status = statusSelect.value === 'Absent' ? 'Absent' : 'Present';
        const now = new Date();
        const dateLabel = now.toLocaleDateString([], { month: 'short', day: '2-digit', year: 'numeric' });
        const row = document.createElement('tr');
        row.innerHTML = '<td>' + projectId + '</td>'
            + '<td>' + dateLabel + '</td>'
            + '<td>' + statusBadgeHtml(status) + '</td>'
            + '<td class="remarks-cell">' + remarksBadgeHtml('Pending') + '</td>';
        tableBody.prepend(row);

        projectSelect.value = '';
        statusSelect.value = 'Present';
        const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
        modal.hide();
    });

    if (confirmDate) {
        confirmDate.value = todayLabel();
    }

    if (confirmProject) {
        confirmProject.addEventListener('change', function () {
            renderConfirmTable(confirmProject.value);
            if (confirmProject.value.trim()) {
                syncMainTableRemarks(confirmProject.value.trim());
            }
        });
    }

    if (confirmTableBody) {
        confirmTableBody.addEventListener('click', function (event) {
            const btn = event.target.closest('.confirm-tech-btn');
            if (!btn || btn.disabled) return;

            const selectedProject = confirmProject ? confirmProject.value.trim() : '';
            const row = btn.closest('tr');
            const remarksCell = row ? row.querySelector('.confirm-remarks-cell') : null;
            if (!selectedProject || !row || !remarksCell) return;

            remarksCell.innerHTML = remarksBadgeHtml('Confirmed');
            btn.className = 'btn btn-sm btn-outline-success confirm-tech-btn';
            btn.disabled = true;
            btn.innerHTML = '<i class="bi bi-check2-circle me-1"></i>Confirmed';

            syncMainTableRemarks(selectedProject);
        });
    }
});
</script>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
