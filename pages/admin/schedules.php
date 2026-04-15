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
        'startDate' => 12,
        'endDate' => 22,
        'leadTechnician' => 'Engr. Mario Santos',
        'technicians' => ['Engr. Mario Santos', 'Tech. Carlo Reyes'],
        'color' => 'bg-primary',
    ],
    [
        'projectId' => 'PRJ-1004',
        'projectName' => 'Split-Type AC Unit Installation - Northline Foods',
        'startDate' => 18,
        'endDate' => 21,
        'leadTechnician' => 'Tech. Carl Dominguez',
        'technicians' => ['Tech. Carl Dominguez'],
        'color' => 'bg-info',
    ],
    [
        'projectId' => 'PRJ-1003',
        'projectName' => 'Ductwork Installation - Metro Storage',
        'startDate' => 23,
        'endDate' => 26,
        'leadTechnician' => 'Engr. Mario Santos',
        'technicians' => ['Engr. Mario Santos', 'Tech. Anne Mendoza'],
        'color' => 'bg-secondary',
    ],
    [
        'projectId' => 'PRJ-1006',
        'projectName' => 'Ventilation System Inspection - Grand Arc Tower',
        'startDate' => 27,
        'endDate' => 30,
        'leadTechnician' => 'Tech. Anne Mendoza',
        'technicians' => ['Tech. Anne Mendoza'],
        'color' => 'bg-danger',
    ],
    [
        'projectId' => 'PRJ-1005',
        'projectName' => 'Ventilation System Retrofit - BluePeak IT',
        'startDate' => 8,
        'endDate' => 11,
        'leadTechnician' => 'Tech. Lito Ramos',
        'technicians' => ['Tech. Lito Ramos', 'Tech. Carlo Reyes'],
        'color' => 'bg-warning',
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
    ['id' => 'PRJ-1001', 'name' => 'Aircon Installation - ACME Holdings', 'service' => 'Aircon Installation'],
    ['id' => 'PRJ-1003', 'name' => 'Ductwork Installation - Metro Storage', 'service' => 'Ductwork Installation'],
    ['id' => 'PRJ-1004', 'name' => 'Split-Type AC Unit Installation - Northline Foods', 'service' => 'Split-Type AC Unit Installation'],
    ['id' => 'PRJ-1005', 'name' => 'Ventilation System Retrofit - BluePeak IT', 'service' => 'Ventilation System Retrofit'],
    ['id' => 'PRJ-1006', 'name' => 'Ventilation System Inspection - Grand Arc Tower', 'service' => 'Ventilation System Inspection'],
];

// All technicians with their skills
$technicians = [
    ['name' => 'Engr. Mario Santos', 'skills' => ['Aircon Installation', 'Ductwork Installation', 'Ventilation System Retrofit']],
    ['name' => 'Tech. Carlo Reyes', 'skills' => ['Aircon Installation', 'Ductwork Installation']],
    ['name' => 'Tech. Lito Ramos', 'skills' => ['AC Unit Repair', 'Ventilation System Retrofit']],
    ['name' => 'Tech. Carl Dominguez', 'skills' => ['Split-Type AC Unit Installation']],
    ['name' => 'Tech. Anne Mendoza', 'skills' => ['Ductwork Installation', 'Ventilation System Inspection']],
    ['name' => 'Tech. John Gonzales', 'skills' => ['Ventilation System Retrofit']],
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
        <div class="card-header bg-white"><strong>April 2026 Calendar</strong></div>
        <div class="card-body">
            <div class="calendar-grid bg-white">
                <?php foreach (['Sun','Mon','Tue','Wed','Thu','Fri','Sat'] as $d): ?><div class="cal-header"><?php echo htmlspecialchars($d, ENT_QUOTES, 'UTF-8'); ?></div><?php endforeach; ?>
                <?php for ($i = 1; $i <= 35; $i++): ?>
                    <div class="cal-cell <?php echo $i === 12 ? 'today' : ''; ?>">
                        <div class="cal-day <?php echo $i === 12 ? 'today-dot' : ''; ?>"><?php echo $i <= 30 ? $i : ''; ?></div>
                        <?php if (isset($dateToSchedules[$i])): ?>
                            <?php foreach ($dateToSchedules[$i] as $schedule): ?>
                                <button
                                    type="button"
                                    class="cal-event <?php echo htmlspecialchars($schedule['color'], ENT_QUOTES, 'UTF-8'); ?> border-0 w-100 text-start"
                                    title="<?php echo htmlspecialchars($schedule['projectName'] . ' (' . $schedule['startDate'] . '-' . $schedule['endDate'] . ')', ENT_QUOTES, 'UTF-8'); ?>"
                                    data-project-id="<?php echo htmlspecialchars($schedule['projectId'], ENT_QUOTES, 'UTF-8'); ?>"
                                >
                                    <?php echo htmlspecialchars($schedule['projectId'], ENT_QUOTES, 'UTF-8'); ?>
                                </button>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</main>
<!-- Schedule Project Modal -->
<div class="modal fade" id="scheduleProjectModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Schedule Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="scheduleProjectForm">
                    <!-- Project ID Dropdown -->
                    <div class="mb-3">
                        <label for="projectSelect" class="form-label fw-500">Project ID</label>
                        <select class="form-select" id="projectSelect" required>
                            <option value="">-- Select Project --</option>
                            <?php foreach ($availableProjects as $proj): ?>
                                <option value="<?php echo htmlspecialchars($proj['id'], ENT_QUOTES, 'UTF-8'); ?>" data-service="<?php echo htmlspecialchars($proj['service'], ENT_QUOTES, 'UTF-8'); ?>">
                                    <?php echo htmlspecialchars($proj['id'] . ' - ' . $proj['name'], ENT_QUOTES, 'UTF-8'); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Assign Technicians -->
                    <div class="mb-3">
                        <label for="leadTechnicianSelect" class="form-label fw-500">Lead Technician</label>
                        <select class="form-select mb-2" id="leadTechnicianSelect" required>
                            <option value="">-- Select lead technician --</option>
                        </select>

                        <label class="form-label fw-500">Assigned Technicians</label>
                        <ul id="selectedTechniciansList" class="list-group mb-2">
                            <li class="list-group-item text-muted" id="emptyTechnicianItem">No technicians selected yet.</li>
                        </ul>

                        <label for="technicianPicker" class="form-label fw-500">Technician List</label>
                        <select class="form-select" id="technicianPicker">
                            <option value="">-- Select technician to add --</option>
                        </select>
                        <small class="text-muted d-block mt-2">Suggested technicians appear first based on project skills.</small>
                    </div>

                    <!-- Start Date -->
                    <div class="mb-3">
                        <label for="startDate" class="form-label fw-500">Start Date</label>
                        <input type="date" class="form-control" id="startDate" required>
                    </div>

                    <!-- End Date -->
                    <div class="mb-3">
                        <label for="endDate" class="form-label fw-500">End Date</label>
                        <input type="date" class="form-control" id="endDate" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="saveSchedule()">Schedule</button>
            </div>
        </div>
    </div>
</div>

<!-- Calendar Project Details Modal -->
<div class="modal fade" id="calendarProjectDetailsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Scheduled Project Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2"><strong>Project ID:</strong> <span id="detailProjectId">-</span></div>
                <div class="mb-2"><strong>Project Name:</strong> <span id="detailProjectName">-</span></div>
                <div class="row g-2 mb-2">
                    <div class="col-6">
                        <label for="detailStartDate" class="form-label"><strong>Start Date</strong></label>
                        <input type="date" class="form-control" id="detailStartDate">
                    </div>
                    <div class="col-6">
                        <label for="detailEndDate" class="form-label"><strong>End Date</strong></label>
                        <input type="date" class="form-control" id="detailEndDate">
                    </div>
                </div>
                <div class="mb-2">
                    <label for="detailLeadSelect" class="form-label"><strong>Lead Technician</strong></label>
                    <select class="form-select" id="detailLeadSelect"></select>
                </div>
                <div class="mb-2">
                    <label class="form-label"><strong>Assigned Technicians</strong></label>
                    <ul class="list-group mb-2" id="detailAssignedTechnicians"></ul>
                </div>
                <div class="mb-0">
                    <label for="detailTechnicianPicker" class="form-label"><strong>Add Technician</strong></label>
                    <select class="form-select" id="detailTechnicianPicker">
                        <option value="">-- Select technician to add --</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveDetailChangesBtn">Save Changes</button>
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
    const cells = document.querySelectorAll('.calendar-grid .cal-cell');
    cells.forEach(cell => {
        cell.querySelectorAll('.cal-event').forEach(node => node.remove());
        const dayText = cell.querySelector('.cal-day') ? cell.querySelector('.cal-day').textContent.trim() : '';
        const day = Number(dayText);
        if (!day || day > 30) {
            return;
        }

        const daySchedules = scheduleData.filter(schedule => day >= Number(schedule.startDate) && day <= Number(schedule.endDate));
        daySchedules.forEach(schedule => {
            const button = document.createElement('button');
            button.type = 'button';
            button.className = `cal-event ${schedule.color} border-0 w-100 text-start`;
            button.setAttribute('title', `${schedule.projectName} (${schedule.startDate}-${schedule.endDate})`);
            button.setAttribute('data-project-id', schedule.projectId);
            button.textContent = schedule.projectId;
            cell.appendChild(button);
        });
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
    document.getElementById('detailStartDate').value = dayToDateValue(schedule.startDate);
    document.getElementById('detailEndDate').value = dayToDateValue(schedule.endDate);

    buildDetailLeadDropdown(schedule.projectId);
    renderDetailAssignedTechnicians();
    buildDetailTechnicianPicker(schedule.projectId);

    bootstrap.Modal.getOrCreateInstance(document.getElementById('calendarProjectDetailsModal')).show();
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

    const startDay = dateValueToDay(document.getElementById('detailStartDate').value);
    const endDay = dateValueToDay(document.getElementById('detailEndDate').value);

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

document.getElementById('projectSelect').addEventListener('change', function() {
    const selectedProjectId = this.value;
    const selectedProject = availableProjects.find(p => p.id === selectedProjectId);
    const leadSelect = document.getElementById('leadTechnicianSelect');
    const technicianPicker = document.getElementById('technicianPicker');

    selectedTechnicians.length = 0;
    leadTechnician = '';
    renderSelectedTechnicians();
    
    if (!selectedProject) {
        leadSelect.innerHTML = '<option value="">-- Select lead technician --</option>';
        technicianPicker.innerHTML = '<option value="">-- Select technician to add --</option>';
        return;
    }

    buildLeadDropdown(selectedProject.service);
    buildTechnicianPicker(selectedProject.service);
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
</script>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
