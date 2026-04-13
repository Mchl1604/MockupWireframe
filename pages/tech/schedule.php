<?php $pageTitle = 'Technician Schedule'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<?php
$techSchedules = [
    [
        'projectId' => 'PRJ-1001',
        'startDate' => '2026-04-14',
        'endDate' => '2026-04-14',
        'title' => 'Aircon Installation - ACME Holdings - Assessment',
        'location' => 'Makati City',
        'status' => 'Assigned',
        'color' => 'primary',
    ],
    [
        'projectId' => 'PRJ-1003',
        'startDate' => '2026-04-15',
        'endDate' => '2026-04-25',
        'title' => 'Ductwork Installation - Metro Storage',
        'location' => 'Pasig Warehouse',
        'status' => 'Assigned',
        'color' => 'warning',
    ],
    [
        'projectId' => 'PRJ-1004',
        'startDate' => '2026-04-27',
        'endDate' => '2026-04-30',
        'title' => 'Split-Type AC Unit Installation - Northline Foods',
        'location' => 'Ortigas, Pasig',
        'status' => 'Assigned',
        'color' => 'success',
    ],
    [
        'projectId' => 'PRJ-1005',
        'startDate' => '2026-05-01',
        'endDate' => '2026-05-10',
        'title' => 'Ventilation System Retrofit - BluePeak IT',
        'location' => 'Mandaluyong',
        'status' => 'Assigned',
        'color' => 'warning',
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
    const schedules = <?php echo json_encode($techSchedules, JSON_UNESCAPED_SLASHES); ?>;
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
        return schedules.filter(function (item) {
            return dateKey >= item.startDate && dateKey <= item.endDate;
        });
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
            return '<li class="list-group-item px-0">'
                + '<p class="small text-primary fw-semibold mb-1">' + escapeHtml(item.projectId || 'N/A') + '</p>'
                + '<p class="fw-semibold small mb-1">' + escapeHtml(item.title) + '</p>'
                + '<p class="small mb-1 text-secondary"><i class="bi bi-calendar-range me-1"></i>' + escapeHtml(item.startDate) + ' to ' + escapeHtml(item.endDate) + '</p>'
                + '<p class="small mb-1 text-secondary"><i class="bi bi-geo-alt me-1"></i>' + escapeHtml(item.location) + '</p>'
                + '<span class="badge text-bg-light border">' + escapeHtml(item.status) + '</span>'
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

<?php include __DIR__ . '/../../includes/footer.php'; ?>
