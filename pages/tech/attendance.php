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
        <div class="card-body d-flex gap-2 flex-wrap align-items-center">
            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#logAttendanceModal">
                <i class="bi bi-plus-circle me-1"></i>Log Attendance
            </button>

            <div class="w-100 mt-3">
                <div class="d-flex align-items-center gap-2">
                    <label class="small text-muted mb-0 me-1">Month</label>
                    <select id="attendanceMonth" class="form-select form-select-sm" style="width:140px;">
                        <option value="">All months</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                    <label class="small text-muted mb-0 me-1">Year</label>
                    <select id="attendanceYear" class="form-select form-select-sm" style="width:110px;">
                        <option value="">All years</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026" selected>2026</option>
                        <option value="2027">2027</option>
                    </select>
                    <label class="small text-muted mb-0 me-1">Project</label>
                    <select id="attendanceProjectFilter" class="form-select form-select-sm" style="width:140px;">
                        <option value="">All projects</option>
                        <?php foreach ($attendanceProjects as $projectId): ?>
                            <option value="<?php echo htmlspecialchars($projectId, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($projectId, ENT_QUOTES, 'UTF-8'); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button class="btn btn-sm btn-outline-secondary" id="applyAttendanceFilter">Filter</button>
                    <button class="btn btn-sm btn-outline-secondary" id="clearAttendanceFilter">Clear</button>
                </div>
            </div>
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

    // Filter controls
    const monthSelect = document.getElementById('attendanceMonth');
    const yearSelect = document.getElementById('attendanceYear');
    const projectFilter = document.getElementById('attendanceProjectFilter');
    const applyBtn = document.getElementById('applyAttendanceFilter');
    const clearBtn = document.getElementById('clearAttendanceFilter');


    function parseRowDate(text) {
        // Expect formats like 'Apr 10, 2026' or 'May 01, 2026'
        const d = new Date(text);
        if (isNaN(d)) return null;
        const mm = String(d.getMonth() + 1).padStart(2, '0');
        const yyyy = String(d.getFullYear());
        return { month: mm, year: yyyy };
    }

    function applyFilter() {
        const selMonth = monthSelect ? monthSelect.value : '';
        const selYear = yearSelect ? yearSelect.value : '';
        const selProject = projectFilter ? projectFilter.value : '';

        const rows = tableBody.querySelectorAll('tr');
        rows.forEach(function (row) {
            const proj = row.cells[0] ? row.cells[0].textContent.trim() : '';
            const dateText = row.cells[1] ? row.cells[1].textContent.trim() : '';
            const parsed = parseRowDate(dateText);

            let visible = true;
            if (selProject && proj !== selProject) visible = false;
            if (selMonth && parsed && parsed.month !== selMonth) visible = false;
            if (selYear && parsed && parsed.year !== selYear) visible = false;

            row.style.display = visible ? '' : 'none';
        });
    }

    if (applyBtn) applyBtn.addEventListener('click', applyFilter);
    if (clearBtn) {
        clearBtn.addEventListener('click', function () {
            if (monthSelect) monthSelect.value = '';
            if (yearSelect) yearSelect.value = '';
            if (projectFilter) projectFilter.value = '';
            applyFilter();
        });
    }

    // modal filters removed — filters live in the card above the table
});
</script>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
