<?php $pageTitle = 'Attendance'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<?php
$attendanceProjects = ['PRJ-1001', 'PRJ-1003', 'PRJ-1004', 'PRJ-1005'];
?>
<main class="container py-4 flex-grow-1">
    <div class="d-flex justify-content-between align-items-center mb-3"><h2 class="h4 fw-bold mb-0">Attendance</h2></div>

    <div class="card border-0 shadow-sm mb-3">
        <div class="card-body d-flex gap-2 flex-wrap">
            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#logAttendanceModal">
                <i class="bi bi-plus-circle me-1"></i>Log Attendance
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
                        <label for="attendanceProject" class="form-label">Project ID</label>
                        <select id="attendanceProject" class="form-select" required>
                            <option value="">Select project</option>
                            <?php foreach ($attendanceProjects as $projectId): ?>
                                <option value="<?php echo htmlspecialchars($projectId, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($projectId, ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php endforeach; ?>
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



<script>
document.addEventListener('DOMContentLoaded', function () {
    const saveBtn = document.getElementById('saveAttendanceBtn');
    const projectSelect = document.getElementById('attendanceProject');
    const tableBody = document.getElementById('attendanceTableBody');
    const modalEl = document.getElementById('logAttendanceModal');

    if (!saveBtn || !projectSelect || !tableBody || !modalEl) return;

    function statusBadgeHtml(status) {
        const badgeClass = status === 'Absent' ? 'text-bg-danger' : 'text-bg-success';
        return '<span class="badge ' + badgeClass + '">' + status + '</span>';
    }

    function remarksBadgeHtml(remark) {
        const badgeClass = remark === 'Confirmed' ? 'text-bg-success' : 'text-bg-warning';
        return '<span class="badge ' + badgeClass + '">' + remark + '</span>';
    }

    saveBtn.addEventListener('click', function () {
        const projectId = projectSelect.value.trim();
        if (!projectId) {
            projectSelect.focus();
            return;
        }

        const status = 'Present';
        const now = new Date();
        const dateLabel = now.toLocaleDateString([], { month: 'short', day: '2-digit', year: 'numeric' });
        const row = document.createElement('tr');
        row.innerHTML = '<td>' + projectId + '</td>'
            + '<td>' + dateLabel + '</td>'
            + '<td>' + statusBadgeHtml(status) + '</td>'
            + '<td class="remarks-cell">' + remarksBadgeHtml('Confirmed') + '</td>';
        tableBody.prepend(row);

        projectSelect.value = '';
        const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
        modal.hide();
    });
});
</script>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
