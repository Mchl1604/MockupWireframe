<?php $pageTitle = 'Technicians'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<?php $defaultProfilePath = ($baseUrl !== '' ? $baseUrl : '') . '/assets/img/defaultProfile.png'; ?>
<?php
$techs = [
    ['name' => 'Mario Santos', 'skills' => ['Aircon Installation', 'Ducting Installation'], 'status' => 'Available', 'address' => '123 Sampaguita St., Makati City', 'phone' => '0917-555-0101', 'email' => 'mario.santos@example.com'],
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
$attendanceByTech = [
    'Mario Santos' => [
        ['date' => 'Apr 1, 2026', 'project' => 'PRJ-1001'],
        ['date' => 'Apr 3, 2026', 'project' => 'PRJ-1003'],
        ['date' => 'Apr 4, 2026', 'project' => 'PRJ-1001'],
        ['date' => 'Apr 8, 2026', 'project' => 'PRJ-1005'],
        ['date' => 'Apr 12, 2026', 'project' => 'PRJ-1001'],
    ],
    'Carlo Reyes' => [
        ['date' => 'Apr 1, 2026', 'project' => 'PRJ-1001'],
        ['date' => 'Apr 2, 2026', 'project' => 'PRJ-1004'],
        ['date' => 'Apr 5, 2026', 'project' => 'PRJ-1005'],
        ['date' => 'Apr 9, 2026', 'project' => 'PRJ-1003'],
    ],
    'Jude Flores' => [
        ['date' => 'Apr 2, 2026', 'project' => 'PRJ-1006'],
        ['date' => 'Apr 6, 2026', 'project' => 'PRJ-1003'],
        ['date' => 'Apr 10, 2026', 'project' => 'PRJ-1006'],
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
        <input type="search" id="technicianSearch" class="form-control form-control-sm" placeholder="Search technicians..." style="max-width: 280px;">
    </div>
    <div class="table-responsive card border-0 shadow-sm">
        <table class="table table-hover mb-0">
            <thead class="table-light"><tr><th>ID</th><th>Name</th><th>Specialty</th><th>Email</th><th>Action</th></tr></thead>
            <tbody id="techniciansTableBody">
                <?php foreach ($techs as $index => $tech): ?>
                    <tr>
                        <td><strong>TECH-<?php echo str_pad((string) ($index + 1), 3, '0', STR_PAD_LEFT); ?></strong></td>
                        <td><?php echo htmlspecialchars($tech['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <?php foreach ($tech['skills'] as $skill): ?>
                                <span class="badge bg-light text-dark border me-1 mb-1"><?php echo htmlspecialchars($skill, ENT_QUOTES, 'UTF-8'); ?></span>
                            <?php endforeach; ?>
                        </td>
                        <td><?php echo htmlspecialchars($tech['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <button
                                type="button"
                                class="btn btn-sm btn-outline-primary view-tech-details me-1"
                                data-tech-index="<?php echo (int) $index; ?>"
                                data-name="<?php echo htmlspecialchars($tech['name'], ENT_QUOTES, 'UTF-8'); ?>"
                                data-address="<?php echo htmlspecialchars($tech['address'], ENT_QUOTES, 'UTF-8'); ?>"
                                data-phone="<?php echo htmlspecialchars($tech['phone'], ENT_QUOTES, 'UTF-8'); ?>"
                                data-email="<?php echo htmlspecialchars($tech['email'], ENT_QUOTES, 'UTF-8'); ?>"
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
                <div class="mb-2"><strong>Home Address:</strong> <span id="techDetailAddress"></span></div>
                <div class="mb-2"><strong>Phone Number:</strong> <span id="techDetailPhone"></span></div>
                <div class="mb-0"><strong>Email:</strong> <span id="techDetailEmail"></span></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveTechDetailsBtn">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="technicianAttendanceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Technician Attendance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2"><strong>Name:</strong> <span id="attendanceTechName"></span></div>
                <div class="table-responsive">
                    <table class="table table-sm table-bordered mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Date Present</th>
                                <th>Project ID</th>
                            </tr>
                        </thead>
                        <tbody id="attendanceTableBody">
                            <tr><td class="text-muted" colspan="2">No attendance records.</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
const attendanceByTech = <?php echo json_encode($attendanceByTech, JSON_UNESCAPED_SLASHES); ?>;
const techData = <?php echo json_encode($techs, JSON_UNESCAPED_SLASHES); ?>;
let currentTechIndex = -1;
let currentTechSkills = [];

const technicianSearch = document.getElementById('technicianSearch');
if (technicianSearch) {
    technicianSearch.addEventListener('input', function () {
        const query = this.value.toLowerCase().trim();
        document.querySelectorAll('#techniciansTableBody tr').forEach(function (row) {
            row.style.display = row.textContent.toLowerCase().includes(query) ? '' : 'none';
        });
    });
}

function renderTechTableSkills(skills) {
    return skills.map(skill => `<span class="badge bg-light text-dark border me-1 mb-1">${skill}</span>`).join('');
}

function renderTechDetailSkillsList() {
    const skillsList = document.getElementById('techDetailSkillsList');
    if (currentTechSkills.length === 0) {
        skillsList.innerHTML = '<li class="list-group-item text-muted" id="emptyTechDetailSkillsItem">No skills selected yet.</li>';
        return;
    }

    skillsList.innerHTML = currentTechSkills.map((skill, index) => `
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>${skill}</span>
            <button type="button" class="btn btn-sm btn-outline-danger" data-skill-index="${index}">Remove</button>
        </li>
    `).join('');
}

function rebuildTechDetailSkillPicker() {
    const picker = document.getElementById('techDetailSkillPicker');
    const availableSkills = <?php echo json_encode($skillOptions, JSON_UNESCAPED_SLASHES); ?>;
    const remainingSkills = availableSkills.filter(skill => !currentTechSkills.includes(skill));
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
        document.getElementById('techDetailAddress').textContent = this.getAttribute('data-address');
        document.getElementById('techDetailPhone').textContent = this.getAttribute('data-phone');
        document.getElementById('techDetailEmail').textContent = this.getAttribute('data-email');
        currentTechSkills = [...tech.skills];
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

    if (!currentTechSkills.includes(selectedSkill)) {
        currentTechSkills.push(selectedSkill);
        renderTechDetailSkillsList();
        rebuildTechDetailSkillPicker();
    }

    this.value = '';
});

document.getElementById('techDetailSkillsList').addEventListener('click', function (event) {
    const button = event.target.closest('button[data-skill-index]');
    if (!button) {
        return;
    }

    const index = Number(button.getAttribute('data-skill-index'));
    if (Number.isInteger(index) && index >= 0 && index < currentTechSkills.length) {
        currentTechSkills.splice(index, 1);
        renderTechDetailSkillsList();
        rebuildTechDetailSkillPicker();
    }
});

document.getElementById('saveTechDetailsBtn').addEventListener('click', function () {
    if (currentTechIndex < 0 || !techData[currentTechIndex]) {
        return;
    }

    if (currentTechSkills.length === 0) {
        alert('Please select at least one specialty.');
        return;
    }

    techData[currentTechIndex].skills = [...currentTechSkills];

    const tableRows = document.querySelectorAll('.table tbody tr');
    const currentRow = tableRows[currentTechIndex];
    if (currentRow) {
        currentRow.children[1].innerHTML = renderTechTableSkills(currentTechSkills);
    }

    bootstrap.Modal.getOrCreateInstance(document.getElementById('technicianDetailsModal')).hide();
});

document.querySelectorAll('.view-tech-attendance').forEach(button => {
    button.addEventListener('click', function () {
        const techName = this.getAttribute('data-name');
        document.getElementById('attendanceTechName').textContent = techName;

        const dates = attendanceByTech[techName] || [];
        const attendanceTableBody = document.getElementById('attendanceTableBody');
        attendanceTableBody.innerHTML = dates.length > 0
            ? dates.map(record => `<tr><td>${record.date}</td><td>${record.project}</td></tr>`).join('')
            : '<tr><td class="text-muted" colspan="2">No attendance records.</td></tr>';

        bootstrap.Modal.getOrCreateInstance(document.getElementById('technicianAttendanceModal')).show();
    });
});
</script>
<?php include __DIR__ . '/../../includes/footer.php'; ?>


