<?php $pageTitle = 'Technicians'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<?php $defaultProfilePath = ($baseUrl !== '' ? $baseUrl : '') . '/assets/img/defaultProfile.png'; ?>
<?php
$techs = [
    ['name' => 'Mark Santos', 'skills' => ['Aircon Installation', 'Ducting Installation'], 'status' => 'Available', 'address' => '123 Sampaguita St., Makati City', 'phone' => '0917-555-0101', 'email' => 'mark.santos@example.com'],
    ['name' => 'Carlo Reyes', 'skills' => ['Aircon Repair', 'Aircon Cleaning'], 'status' => 'Assigned', 'address' => '45 Rizal Ave., Pasig City', 'phone' => '0918-555-0202', 'email' => 'carlo.reyes@example.com'],
    ['name' => 'Jude Flores', 'skills' => ['Aircon Installation', 'Aircon Repair'], 'status' => 'On Leave', 'address' => '88 Bonifacio Rd., Quezon City', 'phone' => '0919-555-0303', 'email' => 'jude.flores@example.com'],
    ['name' => 'Lito Ramos', 'skills' => ['Aircon Cleaning', 'Ducting Fabrication'], 'status' => 'Available', 'address' => '16 Laurel St., Taguig City', 'phone' => '0917-555-0404', 'email' => 'lito.ramos@example.com'],
    ['name' => 'Carl Dominguez', 'skills' => ['Aircon Installation', 'Aircon Cleaning'], 'status' => 'Assigned', 'address' => '22 Mabini Ave., Manila City', 'phone' => '0918-555-0505', 'email' => 'carl.dominguez@example.com'],
    ['name' => 'Anne Mendoza', 'skills' => ['Aircon Repair', 'Ducting Installation'], 'status' => 'Available', 'address' => '77 Roxas Blvd., Pasay City', 'phone' => '0919-555-0606', 'email' => 'anne.mendoza@example.com'],
    ['name' => 'John Gonzales', 'skills' => ['Aircon Cleaning', 'Aircon Installation'], 'status' => 'Assigned', 'address' => '5 Aurora Blvd., Marikina City', 'phone' => '0917-555-0707', 'email' => 'john.gonzales@example.com'],
    ['name' => 'Paolo Herrera', 'skills' => ['Aircon Repair', 'Ducting Fabrication'], 'status' => 'Available', 'address' => '104 Osmena Hwy., Paranaque City', 'phone' => '0918-555-0808', 'email' => 'paolo.herrera@example.com'],
    ['name' => 'Nina Cortez', 'skills' => ['Aircon Cleaning', 'Aircon Repair'], 'status' => 'On Leave', 'address' => '19 Kalayaan Ave., Makati City', 'phone' => '0919-555-0909', 'email' => 'nina.cortez@example.com'],
    ['name' => 'Ben Navarro', 'skills' => ['Ducting Installation', 'Ducting Fabrication'], 'status' => 'Available', 'address' => '31 Macapagal Blvd., Pasig City', 'phone' => '0917-555-1010', 'email' => 'ben.navarro@example.com'],
    ['name' => 'Claire Santos', 'skills' => ['Aircon Installation', 'Aircon Cleaning'], 'status' => 'Assigned', 'address' => '58 Ortigas Ave., Quezon City', 'phone' => '0918-555-1111', 'email' => 'claire.santos@example.com'],
    ['name' => 'Darren Uy', 'skills' => ['Aircon Repair', 'Aircon Installation'], 'status' => 'Available', 'address' => '9 Commonwealth Ave., Quezon City', 'phone' => '0919-555-1212', 'email' => 'darren.uy@example.com'],
    ['name' => 'Elena Cruz', 'skills' => ['Ducting Fabrication', 'Aircon Repair'], 'status' => 'Assigned', 'address' => '64 Pedro Gil St., Manila City', 'phone' => '0917-555-1313', 'email' => 'elena.cruz@example.com'],
    ['name' => 'Francis Tan', 'skills' => ['Ducting Installation', 'Aircon Installation'], 'status' => 'Available', 'address' => '120 Taft Ave., Pasay City', 'phone' => '0918-555-1414', 'email' => 'francis.tan@example.com'],
];
$skillOptions = ['Aircon Installation', 'Aircon Repair', 'Aircon Cleaning', 'Ducting Installation', 'Ducting Fabrication'];
$leadTechnicians = ['Mark Santos', 'Carlo Reyes', 'Lito Ramos', 'Carl Dominguez', 'Anne Mendoza'];
$sortedTechs = $techs;
usort($sortedTechs, static function ($left, $right) use ($leadTechnicians) {
    $leftIsLead = in_array($left['name'], $leadTechnicians, true);
    $rightIsLead = in_array($right['name'], $leadTechnicians, true);

    if ($leftIsLead !== $rightIsLead) {
        return $leftIsLead ? -1 : 1;
    }

    return strcmp((string) $left['name'], (string) $right['name']);
});
$attendanceByTech = [
    'Mark Santos' => [
        ['date' => 'Apr 1, 2026', 'project' => 'PRJ-1001', 'status' => 'Present', 'remarks' => 'Confirmed'],
        ['date' => 'Apr 3, 2026', 'project' => 'PRJ-1003', 'status' => 'Present', 'remarks' => 'Confirmed'],
        ['date' => 'Apr 4, 2026', 'project' => 'PRJ-1001', 'status' => 'Present', 'remarks' => 'Pending'],
        ['date' => 'Apr 8, 2026', 'project' => 'PRJ-1005', 'status' => 'Present', 'remarks' => 'Confirmed'],
        ['date' => 'Apr 12, 2026', 'project' => 'PRJ-1001', 'status' => 'Absent', 'remarks' => 'Pending'],
    ],
    'Carlo Reyes' => [
        ['date' => 'Apr 1, 2026', 'project' => 'PRJ-1001', 'status' => 'Present', 'remarks' => 'Confirmed'],
        ['date' => 'Apr 2, 2026', 'project' => 'PRJ-1004', 'status' => 'Present', 'remarks' => 'Confirmed'],
        ['date' => 'Apr 5, 2026', 'project' => 'PRJ-1005', 'status' => 'Absent', 'remarks' => 'Pending'],
        ['date' => 'Apr 9, 2026', 'project' => 'PRJ-1003', 'status' => 'Present', 'remarks' => 'Confirmed'],
    ],
    'Jude Flores' => [
        ['date' => 'Apr 2, 2026', 'project' => 'PRJ-1006', 'status' => 'Present', 'remarks' => 'Confirmed'],
        ['date' => 'Apr 6, 2026', 'project' => 'PRJ-1003', 'status' => 'Absent', 'remarks' => 'Pending'],
        ['date' => 'Apr 10, 2026', 'project' => 'PRJ-1006', 'status' => 'Present', 'remarks' => 'Pending'],
    ],
    'Lito Ramos' => [],
    'Carl Dominguez' => [],
    'Anne Mendoza' => [],
    'John Gonzales' => [],
    'Paolo Herrera' => [],
    'Nina Cortez' => [],
    'Ben Navarro' => [],
    'Claire Santos' => [],
    'Darren Uy' => [],
    'Elena Cruz' => [],
    'Francis Tan' => [],
];
?>
<main class="container py-4 flex-grow-1">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <h2 class="h4 fw-bold mb-0">Technicians</h2>
    </div>

    <ul class="nav nav-tabs mb-3" id="technicianTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="technician-details-tab" data-bs-toggle="tab" data-bs-target="#technician-details-pane" type="button" role="tab" aria-controls="technician-details-pane" aria-selected="true">Details</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="technician-schedule-tab" data-bs-toggle="tab" data-bs-target="#technician-schedule-pane" type="button" role="tab" aria-controls="technician-schedule-pane" aria-selected="false">Schedule</button>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="technician-details-pane" role="tabpanel" aria-labelledby="technician-details-tab" tabindex="0">
            <div class="d-flex flex-wrap justify-content-end align-items-center gap-2 mb-3">
                <input type="search" id="technicianSearch" class="form-control form-control-sm" placeholder="Search technicians..." style="max-width: 280px;">
            </div>
            <div class="table-responsive card border-0 shadow-sm">
                <table class="table table-hover mb-0">
                    <thead class="table-light"><tr><th>ID</th><th>Name</th><th>Specialty</th><th>Position</th><th>Action</th></tr></thead>
                    <tbody id="techniciansTableBody">
                        <?php foreach ($sortedTechs as $index => $tech): ?>
                            <?php $position = in_array($tech['name'], $leadTechnicians, true) ? 'Lead Technician' : 'Technician'; ?>
                            <tr>
                                <td><strong>TECH-<?php echo str_pad((string) ($index + 1), 3, '0', STR_PAD_LEFT); ?></strong></td>
                                <td><?php echo htmlspecialchars($tech['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <td>
                                    <?php foreach ($tech['skills'] as $skill): ?>
                                        <span class="badge bg-light text-dark border me-1 mb-1"><?php echo htmlspecialchars($skill, ENT_QUOTES, 'UTF-8'); ?></span>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <span class="badge <?php echo $position === 'Lead Technician' ? 'text-bg-primary' : 'text-bg-secondary'; ?>">
                                        <?php echo htmlspecialchars($position, ENT_QUOTES, 'UTF-8'); ?>
                                    </span>
                                </td>
                                <td>
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-outline-primary view-tech-details me-1"
                                        data-tech-index="<?php echo (int) $index; ?>"
                                        data-name="<?php echo htmlspecialchars($tech['name'], ENT_QUOTES, 'UTF-8'); ?>"
                                        title="View Details"
                                        aria-label="View Details"
                                    >
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-outline-secondary view-tech-attendance"
                                        data-name="<?php echo htmlspecialchars($tech['name'], ENT_QUOTES, 'UTF-8'); ?>"
                                    >
                                        View Attendance
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="technician-schedule-pane" role="tabpanel" aria-labelledby="technician-schedule-tab" tabindex="0">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="row g-2 align-items-end mb-3">
                        <div class="col-md-6 col-lg-4">
                            <label for="scheduleTechnicianName" class="form-label">Technician Name</label>
                            <input type="text" id="scheduleTechnicianName" class="form-control" placeholder="Type technician name" list="technicianNameList">
                            <datalist id="technicianNameList">
                                <?php foreach ($sortedTechs as $tech): ?>
                                    <option value="<?php echo htmlspecialchars($tech['name'], ENT_QUOTES, 'UTF-8'); ?>"></option>
                                <?php endforeach; ?>
                            </datalist>
                        </div>
                        <div class="col-md-6 col-lg-8 d-flex justify-content-md-end gap-2">
                            <button type="button" class="btn btn-outline-secondary" id="calendarPrevMonth"><i class="bi bi-chevron-left"></i></button>
                            <div id="calendarMonthLabel" class="fw-semibold align-self-center px-2"></div>
                            <button type="button" class="btn btn-outline-secondary" id="calendarNextMonth"><i class="bi bi-chevron-right"></i></button>
                        </div>
                    </div>

                    <div id="scheduleSelectedTech" class="small text-muted mb-2">Enter a technician name to view project assignments.</div>
                    <div id="scheduleCalendar" class="border rounded overflow-hidden"></div>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="technicianDetailsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Technician Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <img id="techDetailImage" src="<?php echo htmlspecialchars($defaultProfilePath, ENT_QUOTES, 'UTF-8'); ?>" alt="Technician Profile" class="rounded-circle border" style="width: 96px; height: 96px; object-fit: cover;">
                </div>
                <div class="mb-2"><strong>Name:</strong> <span id="techDetailName"></span></div>
                <div class="mb-2">
                    <label class="form-label mb-1"><strong>Specialty</strong></label>
                    <p class="small text-muted mb-2">Pending specialties can be confirmed or removed by admin.</p>
                    <ul id="techDetailSkillsList" class="list-group mb-2">
                        <li class="list-group-item text-muted" id="emptyTechDetailSkillsItem">No skills selected yet.</li>
                    </ul>
                    <label for="techDetailSkillPicker" class="form-label mb-1">Skill List</label>
                    <select id="techDetailSkillPicker" class="form-select">
                        <option value="">-- Select skill to add --</option>
                        <?php foreach ($skillOptions as $skillOption): ?>
                            <option value="<?php echo htmlspecialchars($skillOption, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($skillOption, ENT_QUOTES, 'UTF-8'); ?></option>
                        <?php endforeach; ?>
                    </select>
                    
                </div>
                <hr>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveTechDetailsBtn">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="technicianAttendanceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Technician Attendance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2"><strong>Name:</strong> <span id="attendanceTechName"></span></div>
                <div class="mb-3">
                    <label for="attendancePeriodInput" class="form-label mb-1"><strong>Month and Year</strong></label>
                    <input type="month" id="attendancePeriodInput" class="form-control form-control-sm" value="2026-04">
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-bordered mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Project ID</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody id="attendanceTableBody">
                            <tr><td class="text-muted" colspan="4">No attendance records.</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
const attendanceByTech = <?php echo json_encode($attendanceByTech, JSON_UNESCAPED_SLASHES); ?>;
const techData = <?php echo json_encode($sortedTechs, JSON_UNESCAPED_SLASHES); ?>;
let currentTechIndex = -1;
let currentTechSkills = [];

const technicianSearch = document.getElementById('technicianSearch');
const scheduleTechnicianName = document.getElementById('scheduleTechnicianName');
const calendarPrevMonth = document.getElementById('calendarPrevMonth');
const calendarNextMonth = document.getElementById('calendarNextMonth');
const calendarMonthLabel = document.getElementById('calendarMonthLabel');
const scheduleCalendar = document.getElementById('scheduleCalendar');
const scheduleSelectedTech = document.getElementById('scheduleSelectedTech');
const calendarMonthState = new Date(2026, 3, 1);
const attendancePeriodInput = document.getElementById('attendancePeriodInput');
let activeAttendanceTechName = '';

if (technicianSearch) {
    technicianSearch.addEventListener('input', function () {
        const query = this.value.toLowerCase().trim();
        document.querySelectorAll('#techniciansTableBody tr').forEach(function (row) {
            row.style.display = row.textContent.toLowerCase().includes(query) ? '' : 'none';
        });
    });
}

function formatDateKey(dateObject) {
    const year = dateObject.getFullYear();
    const month = String(dateObject.getMonth() + 1).padStart(2, '0');
    const day = String(dateObject.getDate()).padStart(2, '0');
    return `${year}-${month}-${day}`;
}

function parseRecordDate(dateText) {
    const parsed = new Date(dateText);
    return Number.isNaN(parsed.getTime()) ? null : parsed;
}

function findTechnicianName(inputValue) {
    const normalized = String(inputValue || '').trim().toLowerCase();
    if (!normalized) {
        return '';
    }

    const exactMatch = techData.find(function (tech) {
        return String(tech.name || '').toLowerCase() === normalized;
    });
    if (exactMatch) {
        return exactMatch.name;
    }

    const containsMatch = techData.find(function (tech) {
        return String(tech.name || '').toLowerCase().includes(normalized);
    });
    return containsMatch ? containsMatch.name : '';
}

function renderScheduleCalendar() {
    if (!scheduleCalendar || !calendarMonthLabel || !scheduleSelectedTech || !scheduleTechnicianName) {
        return;
    }

    const matchedTechName = findTechnicianName(scheduleTechnicianName.value);
    const currentMonth = calendarMonthState.getMonth();
    const currentYear = calendarMonthState.getFullYear();
    const firstDay = new Date(currentYear, currentMonth, 1);
    const lastDay = new Date(currentYear, currentMonth + 1, 0);
    const startWeekday = firstDay.getDay();
    const totalDays = lastDay.getDate();

    calendarMonthLabel.textContent = firstDay.toLocaleDateString('en-US', { month: 'long', year: 'numeric' });

    if (!matchedTechName) {
        scheduleSelectedTech.textContent = scheduleTechnicianName.value.trim() === ''
            ? 'Enter a technician name to view project assignments.'
            : 'No technician found. Please enter a valid technician name.';
    } else {
        scheduleSelectedTech.textContent = `Showing schedule for ${matchedTechName}`;
    }

    const records = matchedTechName ? (attendanceByTech[matchedTechName] || []) : [];
    const recordsByDate = {};

    records.forEach(function (record) {
        const parsedDate = parseRecordDate(record.date || '');
        if (!parsedDate) {
            return;
        }
        const attendanceStatus = String(record.status || 'Present').toLowerCase();
        const projectId = String(record.project || '').trim();
        if (attendanceStatus !== 'present' || projectId === '' || projectId === '-') {
            return;
        }
        const dateKey = formatDateKey(parsedDate);
        if (!recordsByDate[dateKey]) {
            recordsByDate[dateKey] = [];
        }
        recordsByDate[dateKey].push(projectId);
    });

    const weekdayHeaders = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    let calendarHtml = '<div class="table-responsive">'
        + '<table class="table table-bordered table-sm mb-0 align-middle">'
        + '<thead class="table-light"><tr>'
        + weekdayHeaders.map(function (weekday) {
            return `<th class="text-center">${weekday}</th>`;
        }).join('')
        + '</tr></thead><tbody>';

    let dayCounter = 1;
    for (let week = 0; week < 6; week += 1) {
        calendarHtml += '<tr>';
        for (let dayOfWeek = 0; dayOfWeek < 7; dayOfWeek += 1) {
            const isEmptyLeading = week === 0 && dayOfWeek < startWeekday;
            const isPastMonth = dayCounter > totalDays;
            if (isEmptyLeading || isPastMonth) {
                calendarHtml += '<td class="bg-light" style="height: 110px;"></td>';
            } else {
                const dateObject = new Date(currentYear, currentMonth, dayCounter);
                const dateKey = formatDateKey(dateObject);
                const projects = recordsByDate[dateKey] || [];

                calendarHtml += '<td style="height: 110px; vertical-align: top;">'
                    + `<div class="small fw-semibold mb-1">${dayCounter}</div>`
                    + (projects.length > 0
                        ? projects.map(function (project) {
                            return `<div class="badge text-bg-primary d-block text-start mb-1">${project}</div>`;
                        }).join('')
                        : '<div class="small text-muted"></div>')
                    + '</td>';
                dayCounter += 1;
            }
        }
        calendarHtml += '</tr>';
        if (dayCounter > totalDays) {
            break;
        }
    }

    calendarHtml += '</tbody></table></div>';
    scheduleCalendar.innerHTML = calendarHtml;
}

if (scheduleTechnicianName) {
    scheduleTechnicianName.addEventListener('input', renderScheduleCalendar);
}

if (calendarPrevMonth) {
    calendarPrevMonth.addEventListener('click', function () {
        calendarMonthState.setMonth(calendarMonthState.getMonth() - 1);
        renderScheduleCalendar();
    });
}

if (calendarNextMonth) {
    calendarNextMonth.addEventListener('click', function () {
        calendarMonthState.setMonth(calendarMonthState.getMonth() + 1);
        renderScheduleCalendar();
    });
}

renderScheduleCalendar();

function renderTechTableSkills(skills) {
    return skills.map(skill => `<span class="badge bg-light text-dark border me-1 mb-1">${skill}</span>`).join('');
}

function normalizeTechSkills(skills) {
    return skills.map(function (skill) {
        return {
            name: skill,
            status: 'Approved',
        };
    });
}

function getTechSkillNames(skills) {
    return skills.map(function (skill) {
        return skill.name;
    });
}

function injectExamplePendingSkill() {
    const exampleSpecialty = 'Ducting Fabrication';
    const existing = currentTechSkills.find(function (skill) {
        return skill.name === exampleSpecialty;
    });

    if (!existing) {
        currentTechSkills.push({
            name: exampleSpecialty,
            status: 'Pending',
            isExample: true,
        });
    }
}

function renderTechDetailSkillsList() {
    const skillsList = document.getElementById('techDetailSkillsList');
    if (currentTechSkills.length === 0) {
        skillsList.innerHTML = '<li class="list-group-item text-muted" id="emptyTechDetailSkillsItem">No skills selected yet.</li>';
        return;
    }

    skillsList.innerHTML = currentTechSkills.map((skill, index) => `
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <span>${skill.name}</span>
                ${skill.status === 'Pending' ? '<span class="badge text-bg-warning">Pending</span>' : ''}
            </div>
            <div class="d-flex gap-1">
                ${skill.status === 'Pending' ? `<button type="button" class="btn btn-sm btn-outline-primary" data-action="confirm" data-skill-index="${index}">Confirm</button>` : ''}
                <button type="button" class="btn btn-sm btn-outline-danger" data-action="remove" data-skill-index="${index}">Remove</button>
            </div>
        </li>
    `).join('');
}

function rebuildTechDetailSkillPicker() {
    const picker = document.getElementById('techDetailSkillPicker');
    const availableSkills = <?php echo json_encode($skillOptions, JSON_UNESCAPED_SLASHES); ?>;
    const selectedSkillNames = getTechSkillNames(currentTechSkills);
    const remainingSkills = availableSkills.filter(skill => !selectedSkillNames.includes(skill));
    let html = '<option value="">-- Select skill to add --</option>';

    remainingSkills.forEach(skill => {
        html += `<option value="${skill}">${skill}</option>`;
    });

    picker.innerHTML = html;
}

document.querySelectorAll('.view-tech-details').forEach(button => {
    button.addEventListener('click', function () {
        currentTechIndex = Number(this.getAttribute('data-tech-index'));
        const tech = techData[currentTechIndex];

        document.getElementById('techDetailName').textContent = tech.name;
        currentTechSkills = normalizeTechSkills(tech.skills || []);
        injectExamplePendingSkill();
        renderTechDetailSkillsList();
        rebuildTechDetailSkillPicker();

        bootstrap.Modal.getOrCreateInstance(document.getElementById('technicianDetailsModal')).show();
    });
});

document.getElementById('techDetailSkillPicker').addEventListener('change', function () {
    const selectedSkill = this.value;
    if (!selectedSkill) {
        return;
    }

    const hasSkill = currentTechSkills.some(function (skill) {
        return skill.name === selectedSkill;
    });

    if (!hasSkill) {
        currentTechSkills.push({
            name: selectedSkill,
            status: 'Pending',
        });
        renderTechDetailSkillsList();
        rebuildTechDetailSkillPicker();
    }

    this.value = '';
});

document.getElementById('techDetailSkillsList').addEventListener('click', function (event) {
    const button = event.target.closest('button[data-skill-index][data-action]');
    if (!button) {
        return;
    }

    const index = Number(button.getAttribute('data-skill-index'));
    const action = button.getAttribute('data-action');
    if (Number.isInteger(index) && index >= 0 && index < currentTechSkills.length) {
        if (action === 'confirm') {
            currentTechSkills[index].status = 'Approved';
            currentTechSkills[index].isExample = false;
        }

        if (action === 'remove') {
            currentTechSkills.splice(index, 1);
        }

        renderTechDetailSkillsList();
        rebuildTechDetailSkillPicker();
    }
});

document.getElementById('saveTechDetailsBtn').addEventListener('click', function () {
    if (currentTechIndex < 0 || !techData[currentTechIndex]) {
        return;
    }

    const approvedSkills = currentTechSkills
        .filter(function (skill) {
            return skill.status === 'Approved';
        })
        .map(function (skill) {
            return skill.name;
        });

    if (approvedSkills.length === 0) {
        alert('Please confirm at least one specialty.');
        return;
    }

    techData[currentTechIndex].skills = [...approvedSkills];

    const tableRows = document.querySelectorAll('#techniciansTableBody tr');
    const currentRow = tableRows[currentTechIndex];
    if (currentRow) {
        currentRow.children[2].innerHTML = renderTechTableSkills(approvedSkills);
    }

    bootstrap.Modal.getOrCreateInstance(document.getElementById('technicianDetailsModal')).hide();
});

document.querySelectorAll('.view-tech-attendance').forEach(button => {
    button.addEventListener('click', function () {
        const techName = this.getAttribute('data-name');
        activeAttendanceTechName = techName;
        document.getElementById('attendanceTechName').textContent = techName;

        if (attendancePeriodInput) {
            attendancePeriodInput.value = '2026-04';
        }

        renderAttendanceTable();

        bootstrap.Modal.getOrCreateInstance(document.getElementById('technicianAttendanceModal')).show();
    });
});

function renderAttendanceTable() {
    const attendanceTableBody = document.getElementById('attendanceTableBody');
    if (!attendanceTableBody || !activeAttendanceTechName) {
        return;
    }

    const periodValue = attendancePeriodInput ? attendancePeriodInput.value : '2026-04';
    const periodParts = String(periodValue).split('-');
    const selectedYear = Number(periodParts[0]);
    const selectedMonth = Number(periodParts[1]) - 1;
    const records = attendanceByTech[activeAttendanceTechName] || [];

    const filteredRecords = records.filter(function (record) {
        const parsedDate = parseRecordDate(record.date || '');
        return parsedDate && parsedDate.getMonth() === selectedMonth && parsedDate.getFullYear() === selectedYear;
    }).sort(function (left, right) {
        const leftDate = parseRecordDate(left.date || '');
        const rightDate = parseRecordDate(right.date || '');
        const leftValue = leftDate ? leftDate.getTime() : 0;
        const rightValue = rightDate ? rightDate.getTime() : 0;
        return rightValue - leftValue;
    });

    attendanceTableBody.innerHTML = filteredRecords.length > 0
        ? filteredRecords.map(function (record) {
            const status = record.status || 'Present';
            const remarks = record.remarks || 'Confirmed';
            const statusBadgeClass = String(status).toLowerCase() === 'present' ? 'text-bg-success' : 'text-bg-danger';
            const remarksBadgeClass = String(remarks).toLowerCase() === 'confirmed' ? 'text-bg-primary' : 'text-bg-warning';
            return '<tr>'
                + `<td>${record.project || 'PRJ-0000'}</td>`
                + `<td>${record.date || '-'}</td>`
                + `<td><span class="badge ${statusBadgeClass}">${status}</span></td>`
                + `<td><span class="badge ${remarksBadgeClass}">${remarks}</span></td>`
                + '</tr>';
        }).join('')
        : '<tr><td class="text-muted" colspan="4">No attendance records for selected month.</td></tr>';
}

if (attendancePeriodInput) {
    attendancePeriodInput.addEventListener('change', renderAttendanceTable);
}
</script>
<?php include __DIR__ . '/../../includes/footer.php'; ?>


