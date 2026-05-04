<?php $pageTitle = 'Schedules'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<?php
$schedules = [
    [
        'projectId' => 'PRJ-1001',
        'projectName' => 'Aircon Installation - ACME Holdings',
        'startDate' => 21,
        'endDate' => 21,
        'leadTechnician' => 'Tech. Mario Santos',
        'technicians' => ['Tech. Mario Santos', 'Tech. Carlo Reyes'],
        'color' => 'bg-primary',
    ],
    [
        'projectId' => 'PRJ-1002',
        'projectName' => 'Aircon Repair - J. Dela Cruz',
        'startDate' => 5,
        'endDate' => 10,
        'leadTechnician' => 'Tech. Lito Ramos',
        'technicians' => ['Tech. Lito Ramos'],
        'color' => 'bg-success',
    ],
    [
        'projectId' => 'PRJ-1004',
        'projectName' => 'Aircon Installation - Northline Foods',
        'startDate' => 14,
        'endDate' => 22,
        'leadTechnician' => 'Tech. Carl Dominguez',
        'technicians' => ['Tech. Carl Dominguez'],
        'color' => 'bg-info',
    ],
    [
        'projectId' => 'PRJ-1006',
        'projectName' => 'Ducting Installation - Grand Arc Tower',
        'startDate' => 24,
        'endDate' => 30,
        'leadTechnician' => 'Tech. Anne Mendoza',
        'technicians' => ['Tech. Anne Mendoza'],
        'color' => 'bg-danger',
    ],
];

// Build a map of dates to schedules for calendar display
$dateToSchedules = [];
foreach ($schedules as $schedule) {
    for ($day = $schedule['startDate']; $day <= $schedule['endDate']; $day++) {
        if (!isset($dateToSchedules[$day])) {
            $dateToSchedules[$day] = [];
        }
        $dateToSchedules[$day][] = $schedule;
    }
}

// Available projects for scheduling
$availableProjects = [
    ['id' => 'PRJ-1001', 'name' => 'Aircon Installation - ACME Holdings', 'service' => 'Aircon Installation', 'phase' => 'Assessment', 'status' => 'Scheduled'],
    ['id' => 'PRJ-1002', 'name' => 'Aircon Repair - J. Dela Cruz', 'service' => 'Aircon Repair', 'phase' => 'Project Completion', 'status' => 'Completed', 'requiredTechnicians' => 1, 'estimatedDays' => 6],
    ['id' => 'PRJ-1003', 'name' => 'Ducting Installation - Metro Storage', 'service' => 'Ducting Installation', 'phase' => 'Project Execution', 'status' => 'Scheduled', 'requiredTechnicians' => 4, 'estimatedDays' => 4],
    ['id' => 'PRJ-1004', 'name' => 'Aircon Installation - Northline Foods', 'service' => 'Aircon Installation', 'phase' => 'Project Execution', 'status' => 'Ongoing', 'requiredTechnicians' => 3, 'estimatedDays' => 3],
    ['id' => 'PRJ-1005', 'name' => 'Ducting Fabrication - BluePeak IT', 'service' => 'Ducting Fabrication', 'phase' => 'Project Execution', 'status' => 'Scheduled', 'requiredTechnicians' => 5, 'estimatedDays' => 5],
    ['id' => 'PRJ-1006', 'name' => 'Ducting Installation - Grand Arc Tower', 'service' => 'Ducting Installation', 'phase' => 'Project Execution', 'status' => 'Scheduled', 'requiredTechnicians' => 3, 'estimatedDays' => 4],
];

// All technicians with their skills
$technicians = [
    ['name' => 'Tech. Mario Santos', 'skills' => ['Aircon Installation', 'Ducting Installation', 'Ducting Fabrication']],
    ['name' => 'Tech. Carlo Reyes', 'skills' => ['Aircon Installation', 'Ducting Installation']],
    ['name' => 'Tech. Lito Ramos', 'skills' => ['Aircon Repair', 'Ducting Fabrication']],
    ['name' => 'Tech. Carl Dominguez', 'skills' => ['Aircon Installation']],
    ['name' => 'Tech. Anne Mendoza', 'skills' => ['Ducting Installation', 'Ducting Installation']],
    ['name' => 'Tech. John Gonzales', 'skills' => ['Ducting Fabrication']],
];

?>
<main class="container py-4 flex-grow-1">
    <h2 class="h4 fw-bold mb-3">Project Schedules</h2>
    
        <div class="mb-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#scheduleProjectModal">
                <i class="bi bi-plus-circle me-2"></i>Schedule Project
            </button>
        </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white d-flex justify-content-center align-items-center gap-2 flex-wrap">
            <button type="button" class="btn btn-outline-secondary btn-sm" id="calendarPrevMonthBtn" aria-label="Previous month" title="Previous month">
                <i class="bi bi-chevron-left"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary btn-sm px-3" id="calendarMonthPickerBtn" data-bs-toggle="modal" data-bs-target="#calendarMonthPickerModal">
                <strong id="calendarMonthLabel">April 2026</strong>
            </button>
            <button type="button" class="btn btn-outline-secondary btn-sm" id="calendarNextMonthBtn" aria-label="Next month" title="Next month">
                <i class="bi bi-chevron-right"></i>
            </button>
        </div>
        <div class="card-body">
            <div class="calendar-grid bg-white" id="scheduleCalendarGrid"></div>
        </div>
    </div>
</main>

<div class="modal fade" id="calendarMonthPickerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Select Month and Year</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-7">
                        <label for="calendarMonthSelect" class="form-label">Month</label>
                        <select class="form-select" id="calendarMonthSelect">
                            <option value="0">January</option>
                            <option value="1">February</option>
                            <option value="2">March</option>
                            <option value="3">April</option>
                            <option value="4">May</option>
                            <option value="5">June</option>
                            <option value="6">July</option>
                            <option value="7">August</option>
                            <option value="8">September</option>
                            <option value="9">October</option>
                            <option value="10">November</option>
                            <option value="11">December</option>
                        </select>
                    </div>
                    <div class="col-5">
                        <label for="calendarYearSelect" class="form-label">Year</label>
                        <select class="form-select" id="calendarYearSelect"></select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="calendarMonthPickerApplyBtn">Apply</button>
            </div>
        </div>
    </div>
</div>
<!-- Schedule Project Modal (Redesigned) -->
<div class="modal fade" id="scheduleProjectModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content schedule-modal-redesigned">
            <!-- Modal Header -->
            <div class="modal-header border-bottom">
                <div>
                    <h5 class="modal-title">Schedule Project</h5>
                    <small class="text-muted">Create and manage project schedules with multiple date ranges</small>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="scheduleProjectForm" class="schedule-form">
                    <div class="row g-4">
                        <!-- LEFT: Project Info (Select + Details) -->
                        <div class="col-lg-6">
                            <div class="info-card mb-3">
                                <label for="projectSelect" class="form-label fw-600 mb-2">
                                    <i class="bi bi-briefcase me-2"></i>Select Project
                                </label>
                                <select class="form-select form-select-lg" id="projectSelect" required>
                                    <option value="">-- Choose a project --</option>
                                    <?php foreach ($availableProjects as $proj): ?>
                                        <option
                                            value="<?php echo htmlspecialchars($proj['id'], ENT_QUOTES, 'UTF-8'); ?>"
                                            data-service="<?php echo htmlspecialchars($proj['service'], ENT_QUOTES, 'UTF-8'); ?>"
                                            data-phase="<?php echo htmlspecialchars($proj['phase'], ENT_QUOTES, 'UTF-8'); ?>"
                                            data-required-technicians="<?php echo htmlspecialchars((string) ($proj['requiredTechnicians'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>"
                                            data-estimated-days="<?php echo htmlspecialchars((string) ($proj['estimatedDays'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>"
                                            data-status="<?php echo htmlspecialchars((string) ($proj['status'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>"
                                        >
                                            <?php echo htmlspecialchars($proj['id'] . ' - ' . $proj['name'], ENT_QUOTES, 'UTF-8'); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div id="projectDetailsDisplay" class="project-details-box" style="display: none;">
                                <div class="detail-row mb-2">
                                    <span class="detail-label">Service Type:</span>
                                    <span id="detailServiceType" class="detail-value badge bg-info bg-opacity-10 text-info">-</span>
                                </div>
                                <div class="detail-row mb-2">
                                    <span class="detail-label">Phase:</span>
                                    <span id="detailPhase" class="detail-value badge bg-warning bg-opacity-10 text-warning">-</span>
                                </div>
                                <div class="detail-row mb-2">
                                    <span class="detail-label">Required Technicians:</span>
                                    <span id="detailRequiredTechs" class="detail-value">-</span>
                                </div>
                                <div class="detail-row">
                                    <span class="detail-label">Est. Duration:</span>
                                    <span id="detailDays" class="detail-value">- days</span>
                                </div>
                            </div>
                        </div>

                        <!-- RIGHT: Assign Team (highlighted) + Scheduling below -->
                        <div class="col-lg-6">
                            <div class="schedule-section-header mb-3">
                                <span class="badge bg-primary-soft text-primary-dark">ASSIGN TEAM</span>
                                <div class="section-divider"></div>
                            </div>

                            <div class="info-card mb-4">
                                <!-- Selected Technicians List -->
                                <label class="form-label small fw-500">Team Members</label>
                                <ul id="selectedTechniciansList" class="tech-list mb-3">
                                    <li class="text-muted small">No technicians selected yet.</li>
                                </ul>
                                <!-- Lead Technician (moved to bottom of assign team block) -->
                                <label for="leadTechnicianSelect" class="form-label small fw-500">Lead Technician</label>
                                <select class="form-select" id="leadTechnicianSelect" required>
                                    <option value="">-- Select lead --</option>
                                </select>
                                <!-- Add Technician -->
                                <label for="technicianPicker" class="form-label small fw-500">Add Technician</label>
                                <select class="form-select form-select-sm mb-3" id="technicianPicker">
                                    <option value="">-- Select to add --</option>
                                </select>
                                <small class="text-muted d-block mt-2 mb-3">Suitable technicians shown first.</small>

                                
                            </div>

                            <!-- Scheduling Section Header -->
                            <div class="schedule-section-header mb-3">
                                <span class="badge bg-success-soft text-success-dark">SCHEDULING</span>
                                <div class="section-divider"></div>
                            </div>

                            <!-- Date Ranges Container -->
                            <div class="date-ranges-container mb-4">
                                <div id="dateRangesWrapper">
                                    <!-- Date range cards will be inserted here by JavaScript -->
                                </div>
                                <button type="button" class="btn btn-outline-primary btn-sm w-100 mt-3" id="addDateRangeBtn">
                                    <i class="bi bi-plus-circle me-2"></i>Add Date Range
                                </button>
                            </div>

                            <!-- Timeline Visualization -->
                            <div class="timeline-section mb-4" id="timelineSection" style="display: none;">
                                <label class="form-label small fw-500 mb-2">
                                    <i class="bi bi-calendar-event me-2"></i>Timeline Overview
                                </label>
                                <p class="mb-0 text-muted small" id="timelineTotalDaysText">Total Scheduled Days: 0</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer border-top">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-2"></i>Cancel
                </button>
                <button type="button" class="btn btn-primary" id="saveScheduleBtn" onclick="saveSchedule()">
                    <i class="bi bi-calendar-check me-2"></i>Save Schedule
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Template for Date Range Card (hidden, used by JavaScript) -->
<template id="dateRangeTemplate">
    <div class="date-range-card mb-3">
        <div class="card card-sm border-start-4 border-start-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <span class="badge bg-primary-soft text-primary-dark me-2">Range</span>
                    <button type="button" class="btn btn-sm btn-outline-danger remove-range-btn" title="Remove this date range">
                        <i class="bi bi-trash3"></i>
                    </button>
                </div>
                <div class="row g-2">
                    <div class="col-6">
                        <label class="form-label small fw-500">Start Date</label>
                        <input type="date" class="form-control form-control-sm start-date-input" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label small fw-500">End Date</label>
                        <input type="date" class="form-control form-control-sm end-date-input" required>
                    </div>
                </div>
                <small class="text-muted d-block mt-2 duration-display">Duration: - days</small>
            </div>
        </div>
    </div>
</template>

<!-- Template for Detail Date Range Card (hidden, used by JavaScript) -->
<template id="detailDateRangeTemplate">
    <div class="date-range-card mb-3">
        <div class="card card-sm border-start-4 border-start-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <span class="badge bg-primary-soft text-primary-dark me-2">Range</span>
                    <button type="button" class="btn btn-sm btn-outline-danger detail-remove-range-btn" title="Remove this date range">
                        <i class="bi bi-trash3"></i>
                    </button>
                </div>
                <div class="row g-2">
                    <div class="col-6">
                        <label class="form-label small fw-500">Start Date</label>
                        <input type="date" class="form-control form-control-sm detail-start-date-input" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label small fw-500">End Date</label>
                        <input type="date" class="form-control form-control-sm detail-end-date-input" required>
                    </div>
                </div>
                <small class="text-muted d-block mt-2 detail-duration-display">Duration: - days</small>
            </div>
        </div>
    </div>
</template>

<!-- Calendar Project Details Modal (Redesigned with Two-Column Layout) -->
<div class="modal fade" id="calendarProjectDetailsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content schedule-modal-redesigned">
            <!-- Modal Header -->
            <div class="modal-header border-bottom">
                <div>
                    <h5 class="modal-title">Scheduled Project Details</h5>
                    <small class="text-muted">View and edit scheduled project information</small>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="detailScheduleProjectForm" class="schedule-form">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="row g-3 mb-3">
                                <div class="col-lg-6">
                                    <!-- Project Info Section Header -->
                                    <div class="schedule-section-header mb-3">
                                        <span class="badge bg-primary-soft text-primary-dark">PROJECT INFO</span>
                                        <div class="section-divider"></div>
                                    </div>

                                    <!-- Project Details Card -->
                                    <div class="info-card mb-4">
                                        <div class="detail-row mb-2">
                                            <span class="detail-label">Project ID:</span>
                                            <span id="detailProjectId" class="detail-value fw-600">-</span>
                                        </div>
                                        <div class="detail-row mb-3">
                                            <span class="detail-label">Project Name:</span>
                                            <span id="detailProjectName" class="detail-value fw-600">-</span>
                                        </div>
                                    </div>
                                    <div id="projectDetailsDisplayDetail" class="project-details-box mb-0" style="display: none;">
                                        <div class="detail-row mb-2">
                                            <span class="detail-label">Service Type:</span>
                                            <span id="detailServiceTypeDisplay" class="detail-value badge bg-info bg-opacity-10 text-info">-</span>
                                        </div>
                                        <div class="detail-row mb-2">
                                            <span class="detail-label">Phase:</span>
                                            <span id="detailPhaseDisplay" class="detail-value badge bg-warning bg-opacity-10 text-warning">-</span>
                                        </div>
                                        <div class="detail-row mb-2">
                                            <span class="detail-label">Status:</span>
                                            <span id="detailStatusDisplay" class="detail-value badge bg-secondary bg-opacity-10 text-secondary">-</span>
                                        </div>
                                        <div class="detail-row mb-2">
                                            <span class="detail-label">Required Technicians:</span>
                                            <span id="detailRequiredTechsDisplay" class="detail-value">-</span>
                                        </div>
                                        <div class="detail-row">
                                            <span class="detail-label">Est. Duration:</span>
                                            <span id="detailDaysDisplay" class="detail-value">- days</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <!-- Assign Team Header -->
                            <div class="schedule-section-header mb-3">
                                <span class="badge bg-primary-soft text-primary-dark">ASSIGN TEAM</span>
                                <div class="section-divider"></div>
                            </div>

                            <div class="info-card mb-4">
                                <!-- Selected Technicians List -->
                                <label class="form-label small fw-500">Team Members</label>
                                <ul id="detailAssignedTechnicians" class="tech-list mb-3">
                                    <li class="text-muted small">No technicians assigned.</li>
                                </ul>
                                <!-- Lead Technician (moved to bottom) -->
                                <label for="detailLeadSelect" class="form-label small fw-500">Lead Technician</label>
                                <select class="form-select" id="detailLeadSelect" required>
                                    <option value="">-- Select lead --</option>
                                </select>

                                <!-- Add Technician -->
                                <label for="detailTechnicianPicker" class="form-label small fw-500">Add Technician</label>
                                <select class="form-select form-select-sm mb-3" id="detailTechnicianPicker">
                                    <option value="">-- Select to add --</option>
                                </select>
                                <small class="text-muted d-block mt-2 mb-3">Suitable technicians shown first.</small>

                                
                            </div>

                            <!-- Scheduling Section Header -->
                            <div class="schedule-section-header mb-3">
                                <span class="badge bg-success-soft text-success-dark">SCHEDULING</span>
                                <div class="section-divider"></div>
                            </div>

                            <!-- Date Ranges Display Container -->
                            <div id="detailDateRangesWrapper" class="date-ranges-container mb-4">
                                <!-- Date range cards will be rendered here -->
                            </div>

                            <!-- Add Date Range Button -->
                            <button type="button" class="btn btn-sm btn-outline-primary mb-4" id="addDetailDateRangeBtn">
                                <i class="bi bi-plus-circle me-2"></i>Add Date Range
                            </button>

                            <!-- Timeline Visualization -->
                            <div class="timeline-section" id="detailTimelineSection" style="display: none;">
                                <label class="form-label small fw-500 mb-2">
                                    <i class="bi bi-calendar-event me-2"></i>Timeline Overview
                                </label>
                                <p class="mb-0 text-muted small" id="detailTimelineTotalDaysText">Total Scheduled Days: 0</p>
                            </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer border-top">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-2"></i>Close
                </button>
                <button type="button" class="btn btn-primary" id="saveDetailChangesBtn">
                    <i class="bi bi-calendar-check me-2"></i>Save Changes
                </button>
            </div>
        </div>
    </div>
</div>

<script>
const availableProjects = <?php echo json_encode($availableProjects); ?>;
const technicians = <?php echo json_encode($technicians); ?>;
const scheduleData = <?php echo json_encode($schedules); ?>;
const selectedTechnicians = [];
let leadTechnician = '';
let currentDetailProjectId = '';
let detailLeadTechnician = '';
let detailSelectedTechnicians = [];

function renderProjectPhaseNote(project) {
    // Deprecated: phase note display removed - details shown in project details box
}

function getStatusBadgeClass(status) {
    const normalized = String(status || '').trim().toLowerCase();
    if (normalized === 'completed') {
        return 'badge bg-success bg-opacity-10 text-success';
    }
    if (normalized === 'ongoing') {
        return 'badge bg-primary bg-opacity-10 text-primary';
    }
    if (normalized === 'scheduled') {
        return 'badge bg-warning bg-opacity-10 text-warning';
    }
    return 'badge bg-secondary bg-opacity-10 text-secondary';
}

function dayToDateValue(day) {
    const dayString = String(day).padStart(2, '0');
    return `2026-04-${dayString}`;
}

function dateValueToDay(dateValue) {
    const date = new Date(dateValue);
    return Number.isNaN(date.getTime()) ? NaN : date.getDate();
}

function getProjectService(projectId) {
    const project = availableProjects.find(item => item.id === projectId);
    return project ? project.service : '';
}

function splitTechniciansForProject(projectId) {
    const requiredService = getProjectService(projectId);
    const suggested = [];
    const others = [];

    technicians.forEach(tech => {
        if (requiredService && tech.skills.includes(requiredService)) {
            suggested.push(tech);
        } else {
            others.push(tech);
        }
    });

    return { suggested, others };
}

function renderCalendarFromData() {
    renderCalendarGrid();
}

const calendarBaseYear = 2026;
const calendarBaseMonthIndex = 3;
let calendarViewDate = new Date(calendarBaseYear, calendarBaseMonthIndex, 1);

function isTodayDate(year, monthIndex, day) {
    const today = new Date();
    return today.getFullYear() === year && today.getMonth() === monthIndex && today.getDate() === day;
}

function updateCalendarHeaderLabel() {
    const label = document.getElementById('calendarMonthLabel');
    if (!label) {
        return;
    }

    const monthYear = calendarViewDate.toLocaleDateString('en-US', {
        month: 'long',
        year: 'numeric'
    });
    label.textContent = monthYear;
}

function getSchedulesForViewedMonth(day, year, monthIndex) {
    if (year !== calendarBaseYear || monthIndex !== calendarBaseMonthIndex) {
        return [];
    }

    return scheduleData.filter(schedule => day >= Number(schedule.startDate) && day <= Number(schedule.endDate));
}

function renderCalendarGrid() {
    const grid = document.getElementById('scheduleCalendarGrid');
    if (!grid) {
        return;
    }

    updateCalendarHeaderLabel();
    grid.innerHTML = '';

    ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'].forEach(dayName => {
        const header = document.createElement('div');
        header.className = 'cal-header';
        header.textContent = dayName;
        grid.appendChild(header);
    });

    const year = calendarViewDate.getFullYear();
    const monthIndex = calendarViewDate.getMonth();
    const firstDayOfWeek = new Date(year, monthIndex, 1).getDay();
    const daysInMonth = new Date(year, monthIndex + 1, 0).getDate();
    const totalCells = Math.ceil((firstDayOfWeek + daysInMonth) / 7) * 7;

    for (let index = 0; index < totalCells; index += 1) {
        const day = index - firstDayOfWeek + 1;
        const inCurrentMonth = day >= 1 && day <= daysInMonth;
        const isToday = inCurrentMonth && isTodayDate(year, monthIndex, day);

        const cell = document.createElement('div');
        cell.className = `cal-cell ${isToday ? 'today' : ''}`;

        const dayLabel = document.createElement('div');
        dayLabel.className = `cal-day ${isToday ? 'today-dot' : ''}`;
        dayLabel.textContent = inCurrentMonth ? String(day) : '';
        cell.appendChild(dayLabel);

        if (inCurrentMonth) {
            const daySchedules = getSchedulesForViewedMonth(day, year, monthIndex);
            daySchedules.forEach(schedule => {
                const button = document.createElement('button');
                button.type = 'button';
                button.className = `cal-event ${schedule.color} border-0 w-100 text-start`;
                button.setAttribute('title', `${schedule.projectName} (${schedule.startDate}-${schedule.endDate})`);
                button.setAttribute('data-project-id', schedule.projectId);
                button.textContent = schedule.projectId;
                cell.appendChild(button);
            });
        }

        grid.appendChild(cell);
    }
}

const calendarPrevMonthBtn = document.getElementById('calendarPrevMonthBtn');
if (calendarPrevMonthBtn) {
    calendarPrevMonthBtn.addEventListener('click', function () {
        calendarViewDate = new Date(calendarViewDate.getFullYear(), calendarViewDate.getMonth() - 1, 1);
        renderCalendarGrid();
    });
}

const calendarNextMonthBtn = document.getElementById('calendarNextMonthBtn');
if (calendarNextMonthBtn) {
    calendarNextMonthBtn.addEventListener('click', function () {
        calendarViewDate = new Date(calendarViewDate.getFullYear(), calendarViewDate.getMonth() + 1, 1);
        renderCalendarGrid();
    });
}

const calendarMonthPickerModal = document.getElementById('calendarMonthPickerModal');
const calendarMonthSelect = document.getElementById('calendarMonthSelect');
const calendarYearSelect = document.getElementById('calendarYearSelect');
const calendarMonthPickerApplyBtn = document.getElementById('calendarMonthPickerApplyBtn');

function populateCalendarYearOptions() {
    if (!calendarYearSelect) {
        return;
    }

    calendarYearSelect.innerHTML = '';
    const currentYear = calendarViewDate.getFullYear();
    for (let year = currentYear - 10; year <= currentYear + 10; year += 1) {
        const option = document.createElement('option');
        option.value = String(year);
        option.textContent = String(year);
        calendarYearSelect.appendChild(option);
    }
}

if (calendarMonthPickerModal) {
    calendarMonthPickerModal.addEventListener('show.bs.modal', function () {
        populateCalendarYearOptions();

        if (calendarMonthSelect) {
            calendarMonthSelect.value = String(calendarViewDate.getMonth());
        }

        if (calendarYearSelect) {
            calendarYearSelect.value = String(calendarViewDate.getFullYear());
        }
    });
}

if (calendarMonthPickerApplyBtn) {
    calendarMonthPickerApplyBtn.addEventListener('click', function () {
        if (!calendarMonthSelect || !calendarYearSelect) {
            return;
        }

        const selectedMonth = Number(calendarMonthSelect.value);
        const selectedYear = Number(calendarYearSelect.value);

        if (!Number.isInteger(selectedMonth) || !Number.isInteger(selectedYear)) {
            return;
        }

        calendarViewDate = new Date(selectedYear, selectedMonth, 1);
        renderCalendarGrid();
        bootstrap.Modal.getOrCreateInstance(calendarMonthPickerModal).hide();
    });
}

function renderDetailAssignedTechnicians() {
    const assignedList = document.getElementById('detailAssignedTechnicians');
    if (detailSelectedTechnicians.length === 0) {
        assignedList.innerHTML = '<li class="list-group-item text-muted">No technicians assigned.</li>';
        return;
    }

    assignedList.innerHTML = detailSelectedTechnicians.map((name, index) => {
        const isLead = name === detailLeadTechnician && index === 0;
        const leadBadge = isLead ? '<span class="badge bg-primary ms-2">Lead</span>' : '';
        const action = isLead
            ? '<span class="text-muted small">Lead is required</span>'
            : `<button type="button" class="btn btn-sm btn-outline-danger" data-detail-tech-index="${index}">Remove</button>`;
        return `<li class="list-group-item d-flex justify-content-between align-items-center"><span>${name}${leadBadge}</span>${action}</li>`;
    }).join('');
}

function buildDetailLeadDropdown(projectId) {
    const leadSelect = document.getElementById('detailLeadSelect');
    const { suggested, others } = splitTechniciansForProject(projectId);
    let html = '<option value="">-- Select lead technician --</option>';

    if (suggested.length > 0) {
        html += '<optgroup label="Suggested Leads">';
        suggested.forEach(tech => {
            html += `<option value="${tech.name}">${tech.name} (Suggested)</option>`;
        });
        html += '</optgroup>';
    }

    if (others.length > 0) {
        html += '<optgroup label="Other Technicians">';
        others.forEach(tech => {
            html += `<option value="${tech.name}">${tech.name}</option>`;
        });
        html += '</optgroup>';
    }

    leadSelect.innerHTML = html;
    leadSelect.value = detailLeadTechnician;
}

function buildDetailTechnicianPicker(projectId) {
    const picker = document.getElementById('detailTechnicianPicker');
    const { suggested, others } = splitTechniciansForProject(projectId);
    let html = '<option value="">-- Select technician to add --</option>';

    if (suggested.length > 0) {
        html += '<optgroup label="Suggested Technicians">';
        suggested.forEach(tech => {
            if (!detailSelectedTechnicians.includes(tech.name)) {
                html += `<option value="${tech.name}">${tech.name} (Suggested)</option>`;
            }
        });
        html += '</optgroup>';
    }

    if (others.length > 0) {
        html += '<optgroup label="Other Technicians">';
        others.forEach(tech => {
            if (!detailSelectedTechnicians.includes(tech.name)) {
                html += `<option value="${tech.name}">${tech.name}</option>`;
            }
        });
        html += '</optgroup>';
    }

    picker.innerHTML = html;
}

function getScheduleByProjectId(projectId) {
    return scheduleData.find(schedule => schedule.projectId === projectId) || null;
}

function openCalendarProjectDetails(projectId) {
    const schedule = getScheduleByProjectId(projectId);
    if (!schedule) {
        return;
    }

    currentDetailProjectId = schedule.projectId;
    detailLeadTechnician = schedule.leadTechnician || (schedule.technicians[0] || '');
    detailSelectedTechnicians = schedule.technicians && schedule.technicians.length > 0 ? [...schedule.technicians] : [];
    if (detailLeadTechnician && !detailSelectedTechnicians.includes(detailLeadTechnician)) {
        detailSelectedTechnicians.unshift(detailLeadTechnician);
    }
    if (detailLeadTechnician) {
        detailSelectedTechnicians = [detailLeadTechnician, ...detailSelectedTechnicians.filter(name => name !== detailLeadTechnician)];
    }

    document.getElementById('detailProjectId').textContent = schedule.projectId;
    document.getElementById('detailProjectName').textContent = schedule.projectName;

    // Store schedule for loading into date ranges after modal opens
    pendingDetailSchedule = schedule;

    // Populate project details display
    const project = availableProjects.find(p => p.id === schedule.projectId);
    if (project) {
        document.getElementById('detailServiceTypeDisplay').textContent = project.service || 'N/A';
        document.getElementById('detailPhaseDisplay').textContent = project.phase || 'Assessment';
        const statusDisplay = document.getElementById('detailStatusDisplay');
        statusDisplay.textContent = project.status || 'Scheduled';
        statusDisplay.className = `detail-value ${getStatusBadgeClass(project.status || 'Scheduled')}`;
        document.getElementById('detailRequiredTechsDisplay').textContent = (project.requiredTechnicians || '-');
        document.getElementById('detailDaysDisplay').textContent = (project.estimatedDays || '-') + ' days';
        document.getElementById('projectDetailsDisplayDetail').style.display = 'block';
    }

    buildDetailLeadDropdown(schedule.projectId);
    renderDetailAssignedTechnicians();
    buildDetailTechnicianPicker(schedule.projectId);

    // Make detail modal read-only if project is completed
    const isDetailEditable = !(project && String(project.status || '').toLowerCase() === 'completed');
    setDetailModalEditable(isDetailEditable);

    bootstrap.Modal.getOrCreateInstance(document.getElementById('calendarProjectDetailsModal')).show();
}

/**
 * Update duration display for detail modal
 */
function updateDetailDurationDisplay() {
    const startDate = document.getElementById('detailStartDate').value;
    const endDate = document.getElementById('detailEndDate').value;
    const durationDisplay = document.getElementById('detailDurationDisplay');

    if (!startDate || !endDate) {
        durationDisplay.textContent = 'Duration: - days';
        return;
    }

    const start = new Date(startDate);
    const end = new Date(endDate);
    
    if (isNaN(start) || isNaN(end)) {
        durationDisplay.textContent = 'Duration: - days';
        return;
    }

    if (start > end) {
        durationDisplay.textContent = 'Duration: Invalid range';
        durationDisplay.style.color = '#ef4444';
        return;
    }

    const diffTime = end.getTime() - start.getTime();
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
    durationDisplay.textContent = `Duration: ${diffDays} day${diffDays !== 1 ? 's' : ''}`;
    durationDisplay.style.color = '#6b7280';
}

document.getElementById('detailLeadSelect').addEventListener('change', function () {
    detailLeadTechnician = this.value;
    detailSelectedTechnicians = detailSelectedTechnicians.filter(name => name !== detailLeadTechnician);
    if (detailLeadTechnician) {
        detailSelectedTechnicians.unshift(detailLeadTechnician);
    }
    renderDetailAssignedTechnicians();
    buildDetailTechnicianPicker(currentDetailProjectId);
});

document.getElementById('detailTechnicianPicker').addEventListener('change', function () {
    const selectedName = this.value;
    if (!selectedName || detailSelectedTechnicians.includes(selectedName)) {
        this.value = '';
        return;
    }
    detailSelectedTechnicians.push(selectedName);
    renderDetailAssignedTechnicians();
    buildDetailTechnicianPicker(currentDetailProjectId);
    this.value = '';
});

document.getElementById('detailAssignedTechnicians').addEventListener('click', function (event) {
    const button = event.target.closest('button[data-detail-tech-index]');
    if (!button) {
        return;
    }
    const index = Number(button.getAttribute('data-detail-tech-index'));
    if (!Number.isInteger(index) || index < 0 || index >= detailSelectedTechnicians.length) {
        return;
    }
    detailSelectedTechnicians.splice(index, 1);
    renderDetailAssignedTechnicians();
    buildDetailTechnicianPicker(currentDetailProjectId);
});

document.getElementById('saveDetailChangesBtn').addEventListener('click', function () {
    const schedule = getScheduleByProjectId(currentDetailProjectId);
    if (!schedule) {
        return;
    }

    // Get dates from the first date range
    if (detailDateRanges.length === 0) {
        alert('Please add at least one date range.');
        return;
    }

    const firstRange = detailDateRanges[0];
    const startDay = dateValueToDay(firstRange.startInput.value);
    const endDay = dateValueToDay(firstRange.endInput.value);

    if (!detailLeadTechnician || detailSelectedTechnicians.length === 0 || Number.isNaN(startDay) || Number.isNaN(endDay)) {
        alert('Please set start/end dates and assign technicians including a lead.');
        return;
    }

    if (startDay > endDay) {
        alert('Start date must be before end date.');
        return;
    }

    schedule.startDate = startDay;
    schedule.endDate = endDay;
    schedule.leadTechnician = detailLeadTechnician;
    schedule.technicians = [detailLeadTechnician, ...detailSelectedTechnicians.filter(name => name !== detailLeadTechnician)];

    renderCalendarFromData();
    bootstrap.Modal.getOrCreateInstance(document.getElementById('calendarProjectDetailsModal')).hide();
});

// ========================================================
// Detail Modal - Multiple Date Ranges & Timeline
// ========================================================

let detailDateRanges = [];
let pendingDetailSchedule = null;

// Initialize the detail modal when it opens
const calendarProjectDetailsModal = document.getElementById('calendarProjectDetailsModal');
if (calendarProjectDetailsModal) {
    calendarProjectDetailsModal.addEventListener('show.bs.modal', function() {
        // Reset detail date ranges
        detailDateRanges = [];
        const wrapper = document.getElementById('detailDateRangesWrapper');
        if (wrapper) wrapper.innerHTML = '';
        
        // Add first date range
        addNewDetailDateRange();
        
        // If there's a pending schedule to load, populate the first range with its dates
        if (pendingDetailSchedule) {
            setTimeout(() => {
                if (detailDateRanges.length > 0) {
                    const firstRange = detailDateRanges[0];
                    firstRange.startInput.value = dayToDateValue(pendingDetailSchedule.startDate);
                    firstRange.endInput.value = dayToDateValue(pendingDetailSchedule.endDate);
                    updateDetailRangeDurationDisplay(firstRange.id);
                    updateDetailTimelineVisualization();
                }
                pendingDetailSchedule = null;
            }, 0);
        }
    });
}

/**
 * Add a new date range card to the detail modal
 */
function addNewDetailDateRange() {
    const template = document.getElementById('detailDateRangeTemplate');
    if (!template) return;

    const clone = template.content.cloneNode(true);
    const wrapper = document.getElementById('detailDateRangesWrapper');
    if (!wrapper) return;

    // Create a unique ID for this date range
    const rangeId = 'detail-range-' + Date.now() + '-' + Math.random();
    const rangeCard = clone.querySelector('.date-range-card');
    rangeCard.id = rangeId;
    rangeCard.dataset.rangeId = rangeId;

    // Get input elements from the cloned template
    const startInput = clone.querySelector('.detail-start-date-input');
    const endInput = clone.querySelector('.detail-end-date-input');
    const removeBtn = clone.querySelector('.detail-remove-range-btn');
    const durationDisplay = clone.querySelector('.detail-duration-display');

    // Add event listeners for date inputs
    startInput.addEventListener('change', function() {
        updateDetailRangeDurationDisplay(rangeId);
        updateDetailTimelineVisualization();
    });

    endInput.addEventListener('change', function() {
        updateDetailRangeDurationDisplay(rangeId);
        updateDetailTimelineVisualization();
    });

    // Remove button handler
    removeBtn.addEventListener('click', function(e) {
        e.preventDefault();
        removeDetailDateRange(rangeId);
    });

    wrapper.appendChild(clone);
    detailDateRanges.push({ id: rangeId, startInput, endInput, durationDisplay });
    updateDetailTimelineVisualization();
}

/**
 * Remove a date range card from the detail modal
 */
function removeDetailDateRange(rangeId) {
    const rangeCard = document.getElementById(rangeId);
    if (rangeCard) {
        rangeCard.remove();
    }
    detailDateRanges = detailDateRanges.filter(range => range.id !== rangeId);
    
    // If no ranges left, add one back
    if (detailDateRanges.length === 0) {
        addNewDetailDateRange();
    } else {
        updateDetailTimelineVisualization();
    }
}

/**
 * Update duration display for a specific detail date range
 */
function updateDetailRangeDurationDisplay(rangeId) {
    const range = detailDateRanges.find(r => r.id === rangeId);
    if (!range) return;

    const startDate = range.startInput.value;
    const endDate = range.endInput.value;
    const durationDisplay = range.durationDisplay;

    if (!startDate || !endDate) {
        durationDisplay.textContent = 'Duration: - days';
        return;
    }

    const start = new Date(startDate);
    const end = new Date(endDate);
    
    if (isNaN(start) || isNaN(end) || start > end) {
        durationDisplay.textContent = 'Duration: Invalid range';
        return;
    }

    const diffDays = Math.ceil((end.getTime() - start.getTime()) / (1000 * 60 * 60 * 24)) + 1;
    durationDisplay.textContent = `Duration: ${diffDays} day${diffDays !== 1 ? 's' : ''}`;
}

/**
 * Update timeline visualization for detail modal with all date ranges
 */
function updateDetailTimelineVisualization() {
    const timelineSection = document.getElementById('detailTimelineSection');
    const totalDaysText = document.getElementById('detailTimelineTotalDaysText');

    if (!timelineSection || !totalDaysText) return;

    // Collect all valid date ranges
    const validRanges = detailDateRanges
        .map(range => ({
            start: range.startInput.value,
            end: range.endInput.value
        }))
        .filter(range => range.start && range.end && new Date(range.start) <= new Date(range.end));

    // Show/hide timeline section
    if (validRanges.length === 0) {
        timelineSection.style.display = 'none';
        totalDaysText.textContent = 'Total Scheduled Days: 0';
        return;
    }

    timelineSection.style.display = 'block';
    const totalDays = validRanges.reduce((sum, range) => {
        const start = new Date(range.start);
        const end = new Date(range.end);
        const diffDays = Math.ceil((end.getTime() - start.getTime()) / (1000 * 60 * 60 * 24)) + 1;
        return sum + diffDays;
    }, 0);
    totalDaysText.textContent = `Total Scheduled Days: ${totalDays}`;
}

// Add Date Range button event listener
document.getElementById('addDetailDateRangeBtn').addEventListener('click', function() {
    addNewDetailDateRange();
});

document.querySelector('.calendar-grid').addEventListener('click', function (event) {
    const target = event.target.closest('.cal-event[data-project-id]');
    if (!target) {
        return;
    }

    openCalendarProjectDetails(target.getAttribute('data-project-id'));
});

renderCalendarFromData();

function splitTechniciansByService(requiredService) {
    const suggestedTechs = [];
    const otherTechs = [];

    technicians.forEach(tech => {
        if (tech.skills.includes(requiredService)) {
            suggestedTechs.push(tech);
        } else {
            otherTechs.push(tech);
        }
    });

    return { suggestedTechs, otherTechs };
}

function buildLeadDropdown(requiredService) {
    const leadSelect = document.getElementById('leadTechnicianSelect');
    const { suggestedTechs, otherTechs } = splitTechniciansByService(requiredService);
    let html = '<option value="">-- Select lead technician --</option>';

    if (suggestedTechs.length > 0) {
        html += '<optgroup label="Suggested Leads">';
        suggestedTechs.forEach(tech => {
            html += `<option value="${tech.name}">${tech.name} (Suggested)</option>`;
        });
        html += '</optgroup>';
    }

    if (otherTechs.length > 0) {
        html += '<optgroup label="Other Technicians">';
        otherTechs.forEach(tech => {
            html += `<option value="${tech.name}">${tech.name}</option>`;
        });
        html += '</optgroup>';
    }

    leadSelect.innerHTML = html;
}

function buildTechnicianPicker(requiredService) {
    const technicianPicker = document.getElementById('technicianPicker');
    const { suggestedTechs, otherTechs } = splitTechniciansByService(requiredService);
    let pickerHtml = '<option value="">-- Select technician to add --</option>';

    if (suggestedTechs.length > 0) {
        pickerHtml += '<optgroup label="Suggested Technicians">';
        suggestedTechs.forEach(tech => {
            if (tech.name !== leadTechnician) {
                pickerHtml += `<option value="${tech.name}">${tech.name} (Suggested)</option>`;
            }
        });
        pickerHtml += '</optgroup>';
    }

    if (otherTechs.length > 0) {
        pickerHtml += '<optgroup label="Other Technicians">';
        otherTechs.forEach(tech => {
            if (tech.name !== leadTechnician) {
                pickerHtml += `<option value="${tech.name}">${tech.name}</option>`;
            }
        });
        pickerHtml += '</optgroup>';
    }

    technicianPicker.innerHTML = pickerHtml;
}

function renderSelectedTechnicians() {
    const selectedList = document.getElementById('selectedTechniciansList');
    if (selectedTechnicians.length === 0) {
        selectedList.innerHTML = '<li class="list-group-item text-muted" id="emptyTechnicianItem">No technicians selected yet.</li>';
        return;
    }

    selectedList.innerHTML = selectedTechnicians.map((name, index) => {
        const isLead = name === leadTechnician && index === 0;
        return `
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>${name} ${isLead ? '<span class="badge bg-primary ms-2">Lead</span>' : ''}</span>
                ${isLead ? '<span class="text-muted small">Lead is required</span>' : `<button type="button" class="btn btn-sm btn-outline-danger" data-tech-index="${index}">Remove</button>`}
            </li>
        `;
    }).join('');
}

document.getElementById('selectedTechniciansList').addEventListener('click', function (event) {
    const button = event.target.closest('button[data-tech-index]');
    if (!button) {
        return;
    }

    const index = Number(button.getAttribute('data-tech-index'));
    if (Number.isInteger(index) && index >= 0 && index < selectedTechnicians.length) {
        selectedTechnicians.splice(index, 1);
        renderSelectedTechnicians();
    }
});

document.getElementById('technicianPicker').addEventListener('change', function () {
    const selectedTech = this.value;
    if (!selectedTech || selectedTech === leadTechnician) {
        return;
    }

    if (!selectedTechnicians.includes(selectedTech)) {
        selectedTechnicians.push(selectedTech);
        renderSelectedTechnicians();
    }

    this.value = '';
});

document.getElementById('leadTechnicianSelect').addEventListener('change', function () {
    leadTechnician = this.value;
    const selectedProjectId = document.getElementById('projectSelect').value;
    const selectedProject = availableProjects.find(p => p.id === selectedProjectId);

    // Keep only non-lead technicians, then place lead first
    const others = selectedTechnicians.filter(name => name !== leadTechnician);
    selectedTechnicians.length = 0;
    if (leadTechnician) {
        selectedTechnicians.push(leadTechnician);
    }
    others.forEach(name => {
        if (name !== leadTechnician) {
            selectedTechnicians.push(name);
        }
    });
    renderSelectedTechnicians();

    if (selectedProject) {
        buildTechnicianPicker(selectedProject.service);
    }
});



function saveSchedule() {
    const projectId = document.getElementById('projectSelect').value;
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;
    const selectedTechs = [...selectedTechnicians];
    
    if (!projectId || !leadTechnician || !startDate || !endDate || selectedTechs.length === 0) {
        alert('Please fill in all fields, assign a lead technician, and select at least one technician');
        return;
    }
    
    const startDay = new Date(startDate).getDate();
    const endDay = new Date(endDate).getDate();
    
    if (startDay > endDay) {
        alert('Start date must be before end date');
        return;
    }
    
    alert('Schedule saved! (Project: ' + projectId + ', Start: Apr ' + startDay + ', End: Apr ' + endDay + ', Technicians: ' + selectedTechs.join(', ') + ')');
    document.getElementById('scheduleProjectForm').reset();
    selectedTechnicians.length = 0;
    leadTechnician = '';
    renderSelectedTechnicians();
    document.getElementById('leadTechnicianSelect').innerHTML = '<option value="">-- Select lead technician --</option>';
    document.getElementById('technicianPicker').innerHTML = '<option value="">-- Select technician to add --</option>';
    bootstrap.Modal.getOrCreateInstance(document.getElementById('scheduleProjectModal')).hide();
}

// ========================================================
// Redesigned Schedule Modal - Date Ranges & Timeline
// ========================================================

// Store for multiple date ranges
let dateRanges = [];
let selectedProjectForModal = null;

// Initialize the modal when it opens
const scheduleProjectModal = document.getElementById('scheduleProjectModal');
if (scheduleProjectModal) {
    scheduleProjectModal.addEventListener('show.bs.modal', function() {
        // Reset state when modal opens
        dateRanges = [];
        selectedProjectForModal = null;
        document.getElementById('projectSelect').value = '';
        addNewDateRange();
        renderProjectDetails(null);
        updateTimelineVisualization();
        // Ensure modal is editable by default when opening
        setScheduleModalEditable(true);
    });
}

/**
 * Add a new date range card
 */
function addNewDateRange() {
    const template = document.getElementById('dateRangeTemplate');
    if (!template) return;

    const clone = template.content.cloneNode(true);
    const wrapper = document.getElementById('dateRangesWrapper');
    if (!wrapper) return;

    // Create a unique ID for this date range
    const rangeId = 'range-' + Date.now() + '-' + Math.random();
    const rangeCard = clone.querySelector('.date-range-card');
    rangeCard.id = rangeId;
    rangeCard.dataset.rangeId = rangeId;

    // Get input elements from the cloned template
    const startInput = clone.querySelector('.start-date-input');
    const endInput = clone.querySelector('.end-date-input');
    const removeBtn = clone.querySelector('.remove-range-btn');
    const durationDisplay = clone.querySelector('.duration-display');

    // Add event listeners for date inputs
    startInput.addEventListener('change', function() {
        updateDurationDisplay(rangeId);
        updateTimelineVisualization();
    });

    endInput.addEventListener('change', function() {
        updateDurationDisplay(rangeId);
        updateTimelineVisualization();
    });

    // Remove button handler
    removeBtn.addEventListener('click', function(e) {
        e.preventDefault();
        removeDateRange(rangeId);
    });

    wrapper.appendChild(clone);
    dateRanges.push({ id: rangeId, startInput, endInput, durationDisplay });
    updateTimelineVisualization();
}

/**
 * Remove a date range card
 */
function removeDateRange(rangeId) {
    const card = document.getElementById(rangeId);
    if (card) {
        card.remove();
    }
    
    dateRanges = dateRanges.filter(range => range.id !== rangeId);
    
    // Ensure at least one date range exists
    if (dateRanges.length === 0) {
        addNewDateRange();
    } else {
        updateTimelineVisualization();
    }
}

/**
 * Update duration display for a specific date range
 */
function updateDurationDisplay(rangeId) {
    const range = dateRanges.find(r => r.id === rangeId);
    if (!range) return;

    const startDate = range.startInput.value;
    const endDate = range.endInput.value;

    if (!startDate || !endDate) {
        range.durationDisplay.textContent = 'Duration: - days';
        return;
    }

    const start = new Date(startDate);
    const end = new Date(endDate);
    
    if (isNaN(start) || isNaN(end)) {
        range.durationDisplay.textContent = 'Duration: - days';
        return;
    }

    if (start > end) {
        range.durationDisplay.textContent = 'Duration: Invalid range';
        range.durationDisplay.style.color = '#ef4444';
        return;
    }

    const diffTime = end.getTime() - start.getTime();
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
    range.durationDisplay.textContent = `Duration: ${diffDays} day${diffDays !== 1 ? 's' : ''}`;
    range.durationDisplay.style.color = '#6b7280';
}

/**
 * Update timeline visualization based on date ranges
 */
function updateTimelineVisualization() {
    const timelineSection = document.getElementById('timelineSection');
    const totalDaysText = document.getElementById('timelineTotalDaysText');

    if (!timelineSection || !totalDaysText) return;

    // Collect all valid date ranges
    const validRanges = dateRanges
        .map(range => ({
            start: range.startInput.value,
            end: range.endInput.value
        }))
        .filter(range => range.start && range.end && new Date(range.start) <= new Date(range.end));

    // Show/hide timeline section
    if (validRanges.length === 0) {
        timelineSection.style.display = 'none';
        totalDaysText.textContent = 'Total Scheduled Days: 0';
        return;
    }

    timelineSection.style.display = 'block';
    const totalDays = validRanges.reduce((sum, range) => {
        const start = new Date(range.start);
        const end = new Date(range.end);
        const diffDays = Math.ceil((end.getTime() - start.getTime()) / (1000 * 60 * 60 * 24)) + 1;
        return sum + diffDays;
    }, 0);
    totalDaysText.textContent = `Total Scheduled Days: ${totalDays}`;
}

/**
 * Render project details in the left column
 */
function renderProjectDetails(projectId) {
    const detailsDisplay = document.getElementById('projectDetailsDisplay');
    if (!detailsDisplay) return;

    if (!projectId) {
        detailsDisplay.style.display = 'none';
        return;
    }

    const project = availableProjects.find(p => p.id === projectId);
    if (!project) {
        detailsDisplay.style.display = 'none';
        return;
    }

    document.getElementById('detailServiceType').textContent = project.service || 'N/A';
    document.getElementById('detailPhase').textContent = project.phase || 'Assessment';
    document.getElementById('detailRequiredTechs').textContent = (project.requiredTechnicians || '-');
    document.getElementById('detailDays').textContent = (project.estimatedDays || '-') + ' days';

    detailsDisplay.style.display = 'block';
}

/**
 * Update technician list in modal
 */
function updateModalTechniciansList() {
    const selectedList = document.getElementById('selectedTechniciansList');
    const leadSelect = document.getElementById('leadTechnicianSelect');
    
    if (!selectedList) return;

    if (selectedTechnicians.length === 0) {
        selectedList.innerHTML = '<li class="text-muted small" style="padding: 0.75rem; background: #f3f4f6; border-radius: 6px;">No technicians selected yet.</li>';
        return;
    }

    selectedList.innerHTML = selectedTechnicians.map((name, index) => {
        const isLead = name === leadTechnician;
        return `
            <li class="tech-list-item" style="background: #f3f4f6; padding: 0.75rem; border-radius: 6px; margin-bottom: 0.5rem; display: flex; justify-content: space-between; align-items: center; font-size: 0.875rem; color: #374151;">
                <span>${name}${isLead ? ' <span class="badge bg-primary" style="font-size: 0.7rem; padding: 0.3rem 0.6rem; margin-left: 0.5rem;">Lead</span>' : ''}</span>
                ${!isLead ? `<button type="button" class="btn btn-sm btn-link text-danger p-0 remove-tech-btn" data-tech-index="${index}" style="text-decoration: none;"><i class="bi bi-trash3"></i></button>` : ''}
            </li>
        `;
    }).join('');

    // Add event listeners to remove buttons
    document.querySelectorAll('.remove-tech-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const index = parseInt(this.getAttribute('data-tech-index'));
            selectedTechnicians.splice(index, 1);
            updateModalTechniciansList();
        });
    });
}

// Event listeners for project selection in redesigned modal
document.getElementById('projectSelect').addEventListener('change', function() {
    const selectedProjectId = this.value;
    selectedProjectForModal = selectedProjectId;

    selectedTechnicians.length = 0;
    leadTechnician = '';
    updateModalTechniciansList();
    renderProjectDetails(selectedProjectId);
    
    if (!selectedProjectId) {
        document.getElementById('leadTechnicianSelect').innerHTML = '<option value="">-- Select lead --</option>';
        document.getElementById('technicianPicker').innerHTML = '<option value="">-- Select to add --</option>';
        return;
    }

    const project = availableProjects.find(p => p.id === selectedProjectId);
    if (project) {
        buildLeadDropdown(project.service);
        buildTechnicianPicker(project.service);
    }
    // Make modal read-only if project is completed
    const isEditable = !(project && String(project.status || '').toLowerCase() === 'completed');
    setScheduleModalEditable(isEditable);
});

function setScheduleModalEditable(isEditable) {
    const lead = document.getElementById('leadTechnicianSelect');
    const picker = document.getElementById('technicianPicker');
    const addBtn = document.getElementById('addDateRangeBtn');
    const saveBtn = document.getElementById('saveScheduleBtn');

    if (lead) lead.disabled = !isEditable;
    if (picker) picker.disabled = !isEditable;
    if (addBtn) addBtn.disabled = !isEditable;
    if (saveBtn) saveBtn.disabled = !isEditable;

    // disable existing date inputs and remove buttons
    document.querySelectorAll('#dateRangesWrapper .start-date-input, #dateRangesWrapper .end-date-input').forEach(el => el.disabled = !isEditable);
    document.querySelectorAll('#dateRangesWrapper .remove-range-btn').forEach(btn => btn.disabled = !isEditable);
}

function setDetailModalEditable(isEditable) {
    const lead = document.getElementById('detailLeadSelect');
    const picker = document.getElementById('detailTechnicianPicker');
    const addBtn = document.getElementById('addDetailDateRangeBtn');
    const saveBtn = document.getElementById('saveDetailChangesBtn');

    if (lead) lead.disabled = !isEditable;
    if (picker) picker.disabled = !isEditable;
    if (addBtn) addBtn.disabled = !isEditable;
    if (saveBtn) saveBtn.disabled = !isEditable;

    // disable existing detail date inputs and remove buttons
    document.querySelectorAll('#detailDateRangesWrapper .detail-start-date-input, #detailDateRangesWrapper .detail-end-date-input').forEach(el => el.disabled = !isEditable);
    document.querySelectorAll('#detailDateRangesWrapper .detail-remove-range-btn').forEach(btn => btn.disabled = !isEditable);
}

// Add date range button
const addDateRangeBtn = document.getElementById('addDateRangeBtn');
if (addDateRangeBtn) {
    addDateRangeBtn.addEventListener('click', function(e) {
        e.preventDefault();
        addNewDateRange();
    });
}

// Update technician list display when lead or technicians change
const originalLeadChangeHandler = document.getElementById('leadTechnicianSelect');
if (originalLeadChangeHandler) {
    originalLeadChangeHandler.addEventListener('change', function() {
        leadTechnician = this.value;
        const selectedProjectId = document.getElementById('projectSelect').value;
        const selectedProject = availableProjects.find(p => p.id === selectedProjectId);

        // Reorganize technicians with lead first
        const others = selectedTechnicians.filter(name => name !== leadTechnician);
        selectedTechnicians.length = 0;
        if (leadTechnician) {
            selectedTechnicians.push(leadTechnician);
        }
        others.forEach(name => {
            if (name !== leadTechnician) {
                selectedTechnicians.push(name);
            }
        });
        
        updateModalTechniciansList();

        if (selectedProject) {
            buildTechnicianPicker(selectedProject.service);
        }
    });
}

// Update technician picker
const technicianPicker = document.getElementById('technicianPicker');
if (technicianPicker) {
    technicianPicker.addEventListener('change', function() {
        const selectedTech = this.value;
        if (!selectedTech || selectedTechnicians.includes(selectedTech)) {
            this.value = '';
            return;
        }

        selectedTechnicians.push(selectedTech);
        updateModalTechniciansList();

        const selectedProjectId = document.getElementById('projectSelect').value;
        if (selectedProjectId) {
            const project = availableProjects.find(p => p.id === selectedProjectId);
            if (project) {
                buildTechnicianPicker(project.service);
            }
        }

        this.value = '';
    });
}
</script>

<?php include __DIR__ . '/../../includes/footer.php'; ?>


