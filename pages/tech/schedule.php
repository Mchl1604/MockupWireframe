<?php $pageTitle = 'My Schedule'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<?php
$techSchedules = [
    [
        'projectId' => 'PRJ-1001',
        'startDate' => '2026-04-14',
        'endDate' => '2026-04-14',
        'title' => 'Aircon Installation - ACME Holdings',
        'location' => 'ACME Corporate Center, 120 Ayala Avenue, Bel-Air, Makati City, Metro Manila',
        'status' => 'For Assessment',
        'color' => 'warning',
        'tasks' => [
            [
                'dateStarted' => '2026-04-14',
                'dueDate' => '2026-04-14',
                'description' => 'Site assessment and equipment pull-out measurements.',
                'status' => 'Incomplete',
            ],
        ],
    ],
    [
        'projectId' => 'PRJ-1003',
        'startDate' => '2026-04-15',
        'endDate' => '2026-04-25',
        'title' => 'Ducting Installation - Metro Storage',
        'location' => 'Metro Storage Warehouse, 88 Shaw Boulevard, San Antonio, Pasig City, Metro Manila',
        'status' => 'In Progress',
        'color' => 'primary',
        'tasks' => [
            [
                'dateStarted' => '2026-04-15',
                'dueDate' => '2026-04-21',
                'description' => 'Deliver copper piping materials to the site and verify quantities before installation.',
                'status' => 'Incomplete',
            ],
            [
                'dateStarted' => '2026-04-17',
                'dueDate' => '2026-04-22',
                'description' => 'Inspect and confirm all indoor and outdoor unit mounting points based on layout plan.',
                'status' => 'Incomplete',
            ],
            [
                'dateStarted' => '2026-04-20',
                'dueDate' => '2026-04-24',
                'description' => 'Finalize retrofit layout with lead technician and mark revisions on site plan.',
                'status' => 'Incomplete',
            ],
        ],
    ],
    [
        'projectId' => 'PRJ-1004',
        'startDate' => '2026-04-27',
        'endDate' => '2026-04-30',
        'title' => 'Aircon Installation - Northline Foods',
        'location' => 'Northline Foods Building, 45 Jade Drive, Ortigas Center, Pasig City, Metro Manila',
        'status' => 'Assigned',
        'color' => 'success',
        'tasks' => [
            [
                'dateStarted' => '2026-04-27',
                'dueDate' => '2026-04-28',
                'description' => 'Install indoor AC units and wall brackets.',
                'status' => 'Incomplete',
            ],
            [
                'dateStarted' => '2026-04-29',
                'dueDate' => '2026-04-30',
                'description' => 'Connect copper lines and electrical wiring.',
                'status' => 'Incomplete',
            ],
            [
                'dateStarted' => '2026-04-30',
                'dueDate' => '2026-04-30',
                'description' => 'System pressure test and commissioning support.',
                'status' => 'Incomplete',
            ],
        ],
    ],
    [
        'projectId' => 'PRJ-1005',
        'startDate' => '2026-05-01',
        'endDate' => '2026-05-10',
        'title' => 'Ducting Fabrication - BluePeak IT',
        'location' => 'BluePeak IT Hub, 210 Pioneer Street, Barangka Ilaya, Mandaluyong City, Metro Manila',
        'status' => 'Assigned',
        'color' => 'warning',
        'tasks' => [
            [
                'dateStarted' => '2026-05-01',
                'dueDate' => '2026-05-04',
                'description' => 'Cut and fold GI sheets for branch ducts.',
                'status' => 'Incomplete',
            ],
            [
                'dateStarted' => '2026-05-04',
                'dueDate' => '2026-05-07',
                'description' => 'Fabricate elbows and reducers in shop.',
                'status' => 'Incomplete',
            ],
            [
                'dateStarted' => '2026-05-07',
                'dueDate' => '2026-05-10',
                'description' => 'Deliver prefabricated sections to site.',
                'status' => 'Incomplete',
            ],
            [
                'dateStarted' => '2026-05-10',
                'dueDate' => '2026-05-10',
                'description' => 'Install fabricated ducts and complete punch list.',
                'status' => 'Incomplete',
            ],
        ],
    ],
];
?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>

<main class="container py-4 flex-grow-1">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 fw-bold mb-0">My Schedule</h2>
        
    </div>

    <div class="card border-0 shadow-sm tech-calendar-card">
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-3">
                <div>
                    <p class="text-secondary small mb-1">Calendar View</p>
                    <h3 class="h5 mb-0" id="techMonthLabel">April 2026</h3>
                </div>
                <div class="btn-group" role="group" aria-label="Calendar month navigation">
                    <button type="button" class="btn btn-outline-secondary" id="techPrevMonth">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button type="button" class="btn btn-outline-secondary" id="techCurrentMonth">Today</button>
                    <button type="button" class="btn btn-outline-secondary" id="techNextMonth">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-lg-8">
                    <div class="calendar-grid" id="techCalendarGrid" aria-label="Technician schedule calendar"></div>
                </div>
                <div class="col-lg-4">
                    <div class="border rounded-3 p-3 bg-white h-100">
                        <p class="text-secondary small mb-1">Selected Date</p>
                        <h4 class="h6 fw-semibold mb-3" id="techSelectedDateLabel">No date selected</h4>
                        <ul class="list-group list-group-flush" id="techDayScheduleList">
                            <li class="list-group-item px-0 text-secondary">Select a date to see assignments.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    window.schedules = <?php echo json_encode($techSchedules, JSON_UNESCAPED_SLASHES); ?>;
    const schedules = window.schedules;
    const monthLabel = document.getElementById('techMonthLabel');
    const calendarGrid = document.getElementById('techCalendarGrid');
    const selectedDateLabel = document.getElementById('techSelectedDateLabel');
    const dayScheduleList = document.getElementById('techDayScheduleList');
    const prevBtn = document.getElementById('techPrevMonth');
    const nextBtn = document.getElementById('techNextMonth');
    const todayBtn = document.getElementById('techCurrentMonth');

    if (!monthLabel || !calendarGrid || !selectedDateLabel || !dayScheduleList) return;

    const weekdays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    const today = new Date();
    let viewedDate = new Date(today.getFullYear(), today.getMonth(), 1);
    let selectedDateKey = formatDateKey(today);

    function formatDateKey(dateObj) {
        const year = dateObj.getFullYear();
        const month = String(dateObj.getMonth() + 1).padStart(2, '0');
        const day = String(dateObj.getDate()).padStart(2, '0');
        return year + '-' + month + '-' + day;
    }

    function getSchedulesByDate(dateKey) {
        const groupedByProject = {};

        schedules.forEach(function (item) {
            const tasks = Array.isArray(item.tasks) ? item.tasks : [];

            tasks.forEach(function (task) {
                const taskStartDate = task && task.dateStarted ? String(task.dateStarted) : '';
                const taskDueDate = task && task.dueDate ? String(task.dueDate) : taskStartDate;

                if (task && taskStartDate !== '' && taskDueDate !== '' && dateKey >= taskStartDate && dateKey <= taskDueDate) {
                    const projectKey = String(item.projectId || 'N/A');

                    if (!groupedByProject[projectKey]) {
                        groupedByProject[projectKey] = {
                            projectId: item.projectId,
                            title: item.title,
                            location: item.location,
                            status: item.status,
                            color: item.color,
                            startDate: item.startDate,
                            endDate: item.endDate,
                            tasks: [],
                        };
                    }

                    groupedByProject[projectKey].tasks.push({
                        startDate: taskStartDate,
                        dueDate: taskDueDate,
                        description: task.description || '',
                        status: task.status || 'Incomplete',
                    });
                }
            });
        });

        return Object.keys(groupedByProject).map(function (projectKey) {
            return groupedByProject[projectKey];
        });
    }

    function getStatusBadgeClass(status) {
        const statusKey = String(status || '').toLowerCase().trim();
        if (statusKey === 'in progress') return 'text-bg-success';
        if (statusKey === 'assigned') return 'text-bg-primary';
        if (statusKey === 'for assessment') return 'text-bg-warning';
        return 'text-bg-light border';
    }

    function formatTaskDate(value) {
        const raw = String(value || '').trim();
        if (!raw) return '';

        const dateObj = new Date(raw + 'T00:00:00');
        if (Number.isNaN(dateObj.getTime())) return raw;

        return dateObj.toLocaleDateString([], { month: 'long', day: '2-digit', year: 'numeric' });
    }

    function renderSelectedDay(dateObj) {
        const dateKey = formatDateKey(dateObj);
        const daySchedules = getSchedulesByDate(dateKey);
        const dateText = dateObj.toLocaleDateString([], { weekday: 'long', month: 'long', day: 'numeric', year: 'numeric' });
        selectedDateLabel.textContent = dateText;

        if (!daySchedules.length) {
            dayScheduleList.innerHTML = '<li class="list-group-item px-0 text-secondary">No assignment for this date.</li>';
            return;
        }

        dayScheduleList.innerHTML = daySchedules.map(function (item) {
            const taskItems = (Array.isArray(item.tasks) ? item.tasks : []).map(function (task) {
                const rangeStart = formatTaskDate(task.startDate || dateKey);
                const rangeEnd = formatTaskDate(task.dueDate || dateKey);

                const left = '<div>'
                    + '<p class="fw-semibold mb-1 text-primary">' + escapeHtml(rangeStart || (task.startDate || dateKey)) + ' - ' + escapeHtml(rangeEnd || (task.dueDate || dateKey)) + '</p>'
                    + '<p class="mb-0">' + escapeHtml(task.description || 'No task description provided.') + '</p>'
                    + '</div>';

                let right = '';
                const projInProgress = String(item.status || '').toLowerCase() === 'in progress';
                const taskCompleted = String(task.status || '').toLowerCase() === 'completed';

                if (projInProgress && !taskCompleted) {
                    right = '<div class="ms-2">'
                        + '<button type="button" class="btn btn-sm btn-primary complete-task-btn" '
                        + 'data-project="' + escapeHtml(item.projectId) + '" '
                        + 'data-start="' + escapeHtml(task.startDate) + '" '
                        + 'data-due="' + escapeHtml(task.dueDate) + '" '
                        + 'data-desc="' + escapeHtml(task.description) + '">'
                        + 'Complete'
                        + '</button>'
                        + '</div>';
                } else if (taskCompleted) {
                    right = '<div class="ms-2"><span class="badge text-bg-success">Completed</span></div>';
                }

                return '<div class="small mb-2 p-2 border-start border-3 border-primary rounded-2 bg-white shadow-sm text-dark d-flex justify-content-between align-items-start">' + left + right + '</div>';
            }).join('');

            return '<li class="list-group-item px-0">'
                + '<p class="small text-primary fw-semibold mb-1">' + escapeHtml(item.projectId || 'N/A') + '</p>'
                + '<p class="fw-semibold small mb-1">' + escapeHtml(item.title) + '</p>'
                + '<p class="small mb-2 text-secondary"><i class="bi bi-geo-alt me-1"></i>' + escapeHtml(item.location) + '</p>'
                + '<div class="mb-2"><span class="badge ' + getStatusBadgeClass(item.status) + '">' + escapeHtml(item.status) + '</span></div>'
                + '<p class="fw-bold fs-6 mb-2"><i class="bi bi-list-task me-1"></i>Tasks</p>'
                + '<div class="mb-2">' + taskItems + '</div>'
                + '</li>';
        }).join('');
    }

    function renderCalendar() {
        const year = viewedDate.getFullYear();
        const month = viewedDate.getMonth();
        const firstDay = new Date(year, month, 1);
        const lastDay = new Date(year, month + 1, 0);
        const startWeekday = firstDay.getDay();
        const daysInMonth = lastDay.getDate();
        const totalCells = Math.ceil((startWeekday + daysInMonth) / 7) * 7;

        monthLabel.textContent = firstDay.toLocaleDateString([], { month: 'long', year: 'numeric' });
        calendarGrid.innerHTML = '';

        weekdays.forEach(function (dayName) {
            const headerCell = document.createElement('div');
            headerCell.className = 'cal-header';
            headerCell.textContent = dayName;
            calendarGrid.appendChild(headerCell);
        });

        for (let cellIndex = 0; cellIndex < totalCells; cellIndex++) {
            const dayNumber = cellIndex - startWeekday + 1;
            const cell = document.createElement('button');
            cell.type = 'button';
            cell.className = 'cal-cell text-start border-0';

            if (dayNumber < 1 || dayNumber > daysInMonth) {
                cell.classList.add('empty');
                calendarGrid.appendChild(cell);
                continue;
            }

            const thisDate = new Date(year, month, dayNumber);
            const thisDateKey = formatDateKey(thisDate);
            const isToday = thisDateKey === formatDateKey(today);
            const isSelected = thisDateKey === selectedDateKey;
            const daySchedules = getSchedulesByDate(thisDateKey);

            if (isToday) cell.classList.add('today');
            if (isSelected) cell.classList.add('tech-cal-selected');

            const dayPill = document.createElement('div');
            dayPill.className = 'cal-day' + (isToday ? ' today-dot' : '');
            dayPill.textContent = String(dayNumber);
            cell.appendChild(dayPill);

            daySchedules.slice(0, 2).forEach(function (schedule) {
                const tag = document.createElement('div');
                tag.className = 'cal-event bg-' + schedule.color;
                tag.textContent = schedule.projectId || 'N/A';
                cell.appendChild(tag);
            });

            if (daySchedules.length > 2) {
                const moreTag = document.createElement('div');
                moreTag.className = 'small text-secondary mt-1';
                moreTag.textContent = '+' + (daySchedules.length - 2) + ' more';
                cell.appendChild(moreTag);
            }

            cell.addEventListener('click', function () {
                selectedDateKey = thisDateKey;
                renderCalendar();
                renderSelectedDay(thisDate);
            });

            calendarGrid.appendChild(cell);
        }

        const selectedParts = selectedDateKey.split('-').map(Number);
        renderSelectedDay(new Date(selectedParts[0], selectedParts[1] - 1, selectedParts[2]));
    }

    function escapeHtml(value) {
        const temp = document.createElement('div');
        temp.textContent = value == null ? '' : String(value);
        return temp.innerHTML;
    }

    prevBtn.addEventListener('click', function () {
        viewedDate = new Date(viewedDate.getFullYear(), viewedDate.getMonth() - 1, 1);
        renderCalendar();
    });

    nextBtn.addEventListener('click', function () {
        viewedDate = new Date(viewedDate.getFullYear(), viewedDate.getMonth() + 1, 1);
        renderCalendar();
    });

    todayBtn.addEventListener('click', function () {
        viewedDate = new Date(today.getFullYear(), today.getMonth(), 1);
        selectedDateKey = formatDateKey(today);
        renderCalendar();
    });

    renderCalendar();
});
</script>

<!-- Complete Task Modal -->
<div class="modal fade" id="completeTaskModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header">
                <h5 class="modal-title">Complete Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="completeTaskDescription" class="form-label">Completion Details</label>
                    <textarea class="form-control" id="completeTaskDescription" rows="4" placeholder="Describe the work completed..."></textarea>
                </div>
                <div class="mb-0">
                    <label for="completeTaskPhoto" class="form-label">Proof Photo</label>
                    <input class="form-control" type="file" id="completeTaskPhoto" accept="image/*">
                    <div class="small text-muted mt-1">Upload a photo as proof of completion.</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="saveCompleteTaskBtn" class="btn btn-success">Complete Task</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    let currentComplete = { projectId: null, start: null, due: null, desc: null };
    const modalEl = document.getElementById('completeTaskModal');
    const saveBtn = document.getElementById('saveCompleteTaskBtn');
    const completeDesc = document.getElementById('completeTaskDescription');

    const dayListEl = document.getElementById('techDayScheduleList');
    if (dayListEl) {
        dayListEl.addEventListener('click', function (e) {
            const btn = e.target.closest('.complete-task-btn');
            if (!btn) return;

            currentComplete.projectId = btn.getAttribute('data-project');
            currentComplete.start = btn.getAttribute('data-start');
            currentComplete.due = btn.getAttribute('data-due');
            currentComplete.desc = btn.getAttribute('data-desc');

            if (completeDesc) completeDesc.value = '';

            if (modalEl && window.bootstrap && window.bootstrap.Modal) {
                window.bootstrap.Modal.getOrCreateInstance(modalEl).show();
            }
        });
    }

    if (saveBtn) {
        saveBtn.addEventListener('click', function () {
            if (!currentComplete.projectId) return;

            const all = window.schedules || [];
            for (let i = 0; i < all.length; i++) {
                const proj = all[i];
                if (String(proj.projectId) === String(currentComplete.projectId)) {
                    for (let t = 0; t < proj.tasks.length; t++) {
                        const task = proj.tasks[t];
                        if (String(task.dateStarted) === String(currentComplete.start) && String(task.dueDate) === String(currentComplete.due) && String(task.description) === String(currentComplete.desc)) {
                            task.status = 'Completed';
                        }
                    }
                }
            }

            // reload to reflect in-memory data rendering
            if (modalEl && window.bootstrap && window.bootstrap.Modal) {
                window.bootstrap.Modal.getOrCreateInstance(modalEl).hide();
            }
            location.reload();
        });
    }
});
</script>

<?php include __DIR__ . '/../../includes/footer.php'; ?>


