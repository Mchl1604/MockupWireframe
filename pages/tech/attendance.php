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
            <thead class="table-light"><tr><th>Project ID</th><th>Date</th><th>Time In</th><th>Time Out</th><th>Status</th><th>Remarks</th></tr></thead>
            <tbody id="attendanceTableBody">
                <tr>
                    <td>PRJ-1003</td>
                    <td>Apr 10, 2026</td>
                    <td>08:00 AM</td>
                    <td>05:00 PM</td>
                    <td><span class="badge text-bg-success">Present</span></td>
                    <td class="remarks-cell"><span class="badge text-bg-success">Confirmed</span></td>
                </tr>
                <tr>
                    <td>PRJ-1001</td>
                    <td>Apr 11, 2026</td>
                    <td>08:15 AM</td>
                    <td>05:05 PM</td>
                    <td><span class="badge text-bg-success">Present</span></td>
                    <td class="remarks-cell"><span class="badge text-bg-success">Confirmed</span></td>
                </tr>
                <tr>
                    <td>PRJ-1004</td>
                    <td>Apr 12, 2026</td>
                    <td>-</td>
                    <td>-</td>
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

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="attendanceDate" class="form-label">Date</label>
                            <input type="text" id="attendanceDate" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Time</label>
                            <input type="text" id="attendanceTimeDisplay" class="form-control" readonly>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Type</label>
                            <input type="hidden" id="attendanceTypeHidden" value="Time In">
                            <div class="d-flex gap-2" id="attendanceTypeCards">
                                <div class="card attendance-type-card border border-2 border-primary" data-type="Time In" style="cursor:pointer;">
                                    <div class="card-body py-2 text-center">Time In</div>
                                </div>
                                <div class="card attendance-type-card" data-type="Time Out" style="cursor:pointer;">
                                    <div class="card-body py-2 text-center">Time Out</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveAttendanceBtn">Save</button>
            </div>
        </div>
    </div>
</div>



<script>
document.addEventListener('DOMContentLoaded', function () {
    const saveBtn = document.getElementById('saveAttendanceBtn');
    const projectSelect = document.getElementById('attendanceProject');
    const dateInput = document.getElementById('attendanceDate');
    const timeDisplay = document.getElementById('attendanceTimeDisplay');
    const typeHidden = document.getElementById('attendanceTypeHidden');
    const typeCards = document.querySelectorAll('.attendance-type-card');
    const tableBody = document.getElementById('attendanceTableBody');
    const modalEl = document.getElementById('logAttendanceModal');

    if (!saveBtn || !projectSelect || !dateInput || !timeDisplay || !typeHidden || !tableBody || !modalEl) return;

    function statusBadgeHtml(status) {
        const badgeClass = status === 'Absent' ? 'text-bg-danger' : 'text-bg-success';
        return '<span class="badge ' + badgeClass + '">' + status + '</span>';
    }

    function remarksBadgeHtml(remark) {
        const badgeClass = remark === 'Confirmed' ? 'text-bg-success' : 'text-bg-warning';
        return '<span class="badge ' + badgeClass + '">' + remark + '</span>';
    }

    function formatTimeLabel(timeValue) {
        if (!timeValue || String(timeValue).indexOf(':') === -1) return '-';
        const parts = String(timeValue).split(':');
        let hours = Number(parts[0]);
        const minutes = parts[1] || '00';
        if (Number.isNaN(hours)) return '-';
        const suffix = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        if (hours === 0) hours = 12;
        return String(hours).padStart(2, '0') + ':' + minutes + ' ' + suffix;
    }

    function getTodayDateLabel() {
        const now = new Date();
        return now.toLocaleDateString([], { month: 'short', day: '2-digit', year: 'numeric' });
    }

    function getNowTimeValue() {
        const now = new Date();
        const hh = String(now.getHours()).padStart(2, '0');
        const mm = String(now.getMinutes()).padStart(2, '0');
        return hh + ':' + mm;
    }

    function findRow(projectId, dateLabel) {
        const rows = tableBody.querySelectorAll('tr');
        for (const r of rows) {
            const proj = r.cells[0] ? r.cells[0].textContent.trim() : '';
            const dateText = r.cells[1] ? r.cells[1].textContent.trim() : '';
            if (proj === projectId && dateText === dateLabel) return r;
        }
        return null;
    }

    // Type card click handling
    typeCards.forEach(function (card) {
        card.addEventListener('click', function () {
            typeCards.forEach(c => c.classList.remove('border-2', 'border-primary'));
            card.classList.add('border-2', 'border-primary');
            const t = card.dataset.type || 'Time In';
            if (typeHidden) typeHidden.value = t;
        });
    });

    saveBtn.addEventListener('click', function () {
        const projectId = projectSelect.value.trim();
        const timeVal = getNowTimeValue();
        const typeVal = typeHidden.value || 'Time In';

        if (!projectId) { projectSelect.focus(); return; }

        const dateLabel = dateInput.value || getTodayDateLabel();
        const existing = findRow(projectId, dateLabel);

        if (typeVal === 'Time In') {
            if (existing && existing.cells[2] && existing.cells[2].textContent.trim() !== '-') {
                alert('Time In already recorded for this project today.');
                return;
            }

            if (existing) {
                existing.cells[2].textContent = formatTimeLabel(timeVal);
            } else {
                const row = document.createElement('tr');
                row.innerHTML = '<td>' + projectId + '</td>'
                    + '<td>' + dateLabel + '</td>'
                    + '<td>' + formatTimeLabel(timeVal) + '</td>'
                    + '<td>-</td>'
                    + '<td>' + statusBadgeHtml('Present') + '</td>'
                    + '<td class="remarks-cell">' + remarksBadgeHtml('Confirmed') + '</td>';
                tableBody.prepend(row);
            }
        } else { // Time Out
            if (existing) {
                existing.cells[3].textContent = formatTimeLabel(timeVal);
            } else {
                const row = document.createElement('tr');
                row.innerHTML = '<td>' + projectId + '</td>'
                    + '<td>' + dateLabel + '</td>'
                    + '<td>-</td>'
                    + '<td>' + formatTimeLabel(timeVal) + '</td>'
                    + '<td>' + statusBadgeHtml('Present') + '</td>'
                    + '<td class="remarks-cell">' + remarksBadgeHtml('Confirmed') + '</td>';
                tableBody.prepend(row);
            }
        }

        // reset and close
        projectSelect.value = '';
        if (timeDisplay) timeDisplay.value = '';
        if (typeHidden) typeHidden.value = 'Time In';
        // reset card styles
        typeCards.forEach(c => c.classList.remove('border-2', 'border-primary'));
        if (typeCards[0]) typeCards[0].classList.add('border-2', 'border-primary');
        const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
        modal.hide();
    });

    // populate date when modal shows
    modalEl.addEventListener('show.bs.modal', function () {
        dateInput.value = getTodayDateLabel();
        if (timeDisplay) timeDisplay.value = formatTimeLabel(getNowTimeValue());
        if (typeHidden) typeHidden.value = 'Time In';
        // set initial card selection
        typeCards.forEach(c => c.classList.remove('border-2', 'border-primary'));
        if (typeCards[0]) typeCards[0].classList.add('border-2', 'border-primary');
    });

    // Filter controls
    const monthSelect = document.getElementById('attendanceMonth');
    const yearSelect = document.getElementById('attendanceYear');
    const projectFilter = document.getElementById('attendanceProjectFilter');
    const applyBtn = document.getElementById('applyAttendanceFilter');
    const clearBtn = document.getElementById('clearAttendanceFilter');

    function parseRowDate(text) {
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
