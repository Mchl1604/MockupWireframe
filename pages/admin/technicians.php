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
        ['date' => 'Apr 1, 2026', 'project' => 'PRJ-1001', 'time_in' => '08:00 AM', 'time_out' => '05:00 PM', 'status' => 'Present', 'remarks' => 'Confirmed'],
        ['date' => 'Apr 3, 2026', 'project' => 'PRJ-1003', 'time_in' => '08:15 AM', 'time_out' => '05:15 PM', 'status' => 'Present', 'remarks' => 'Confirmed'],
        ['date' => 'Apr 4, 2026', 'project' => 'PRJ-1001', 'time_in' => '08:00 AM', 'time_out' => '-', 'status' => 'Present', 'remarks' => 'Pending'],
        ['date' => 'Apr 8, 2026', 'project' => 'PRJ-1005', 'time_in' => '08:30 AM', 'time_out' => '05:30 PM', 'status' => 'Present', 'remarks' => 'Confirmed'],
        ['date' => 'Apr 12, 2026', 'project' => 'PRJ-1001', 'time_in' => '-', 'time_out' => '-', 'status' => 'Absent', 'remarks' => 'Pending'],
    ],
    'Carlo Reyes' => [
        ['date' => 'Apr 1, 2026', 'project' => 'PRJ-1001', 'time_in' => '08:00 AM', 'time_out' => '05:00 PM', 'status' => 'Present', 'remarks' => 'Confirmed'],
        ['date' => 'Apr 2, 2026', 'project' => 'PRJ-1004', 'time_in' => '08:10 AM', 'time_out' => '05:10 PM', 'status' => 'Present', 'remarks' => 'Confirmed'],
        ['date' => 'Apr 5, 2026', 'project' => 'PRJ-1005', 'time_in' => '-', 'time_out' => '-', 'status' => 'Absent', 'remarks' => 'Pending'],
        ['date' => 'Apr 9, 2026', 'project' => 'PRJ-1003', 'time_in' => '08:00 AM', 'time_out' => '05:00 PM', 'status' => 'Present', 'remarks' => 'Confirmed'],
    ],
    'Jude Flores' => [
        ['date' => 'Apr 2, 2026', 'project' => 'PRJ-1006', 'time_in' => '08:20 AM', 'time_out' => '05:20 PM', 'status' => 'Present', 'remarks' => 'Confirmed'],
        ['date' => 'Apr 6, 2026', 'project' => 'PRJ-1003', 'time_in' => '-', 'time_out' => '-', 'status' => 'Absent', 'remarks' => 'Pending'],
        ['date' => 'Apr 10, 2026', 'project' => 'PRJ-1006', 'time_in' => '08:05 AM', 'time_out' => '-', 'status' => 'Present', 'remarks' => 'Pending'],
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

$scheduleByTech = [
    'Mark Santos' => [
        [
            'projectId' => 'PRJ-1001',
            'startDate' => '2026-04-14',
            'endDate' => '2026-04-18',
            'title' => 'Aircon Installation - ACME Holdings',
            'location' => 'ACME Corporate Center, Makati City',
            'status' => 'In Progress',
            'color' => 'primary',
            'tasks' => [
                [
                    'dateStarted' => '2026-04-14',
                    'dueDate' => '2026-04-15',
                    'description' => 'Site assessment and measurements.',
                    'status' => 'Completed',
                ],
                [
                    'dateStarted' => '2026-04-16',
                    'dueDate' => '2026-04-18',
                    'description' => 'Install indoor units and line set rough-in.',
                    'status' => 'Incomplete',
                ],
            ],
        ],
        [
            'projectId' => 'PRJ-1003',
            'startDate' => '2026-04-20',
            'endDate' => '2026-04-25',
            'title' => 'Ducting Installation - Metro Storage',
            'location' => 'Metro Storage Warehouse, Pasig City',
            'status' => 'Assigned',
            'color' => 'warning',
            'tasks' => [
                [
                    'dateStarted' => '2026-04-20',
                    'dueDate' => '2026-04-22',
                    'description' => 'Verify duct path and hanger points.',
                    'status' => 'Incomplete',
                ],
                [
                    'dateStarted' => '2026-04-23',
                    'dueDate' => '2026-04-25',
                    'description' => 'Assist duct installation and seal joints.',
                    'status' => 'Incomplete',
                ],
            ],
        ],
    ],
    'Carlo Reyes' => [
        [
            'projectId' => 'PRJ-1004',
            'startDate' => '2026-04-12',
            'endDate' => '2026-04-16',
            'title' => 'Aircon Repair - Northline Foods',
            'location' => 'Northline Foods Building, Pasig City',
            'status' => 'In Progress',
            'color' => 'success',
            'tasks' => [
                [
                    'dateStarted' => '2026-04-12',
                    'dueDate' => '2026-04-13',
                    'description' => 'Diagnose compressor and electrical faults.',
                    'status' => 'Completed',
                ],
                [
                    'dateStarted' => '2026-04-14',
                    'dueDate' => '2026-04-16',
                    'description' => 'Replace failed parts and run testing.',
                    'status' => 'Incomplete',
                ],
            ],
        ],
        [
            'projectId' => 'PRJ-1007',
            'startDate' => '2026-04-21',
            'endDate' => '2026-04-24',
            'title' => 'Preventive Maintenance - City Med Center',
            'location' => 'City Med Center, Mandaluyong City',
            'status' => 'Assigned',
            'color' => 'danger',
            'tasks' => [
                [
                    'dateStarted' => '2026-04-21',
                    'dueDate' => '2026-04-22',
                    'description' => 'Filter cleaning and fan motor inspection.',
                    'status' => 'Incomplete',
                ],
                [
                    'dateStarted' => '2026-04-23',
                    'dueDate' => '2026-04-24',
                    'description' => 'Refrigerant pressure check and report.',
                    'status' => 'Incomplete',
                ],
            ],
        ],
    ],
    'Jude Flores' => [
        [
            'projectId' => 'PRJ-1006',
            'startDate' => '2026-04-10',
            'endDate' => '2026-04-14',
            'title' => 'Aircon Installation - Sunvale Offices',
            'location' => 'Sunvale Offices, Quezon City',
            'status' => 'Assigned',
            'color' => 'info',
            'tasks' => [
                [
                    'dateStarted' => '2026-04-10',
                    'dueDate' => '2026-04-12',
                    'description' => 'Mount indoor and outdoor units.',
                    'status' => 'Incomplete',
                ],
                [
                    'dateStarted' => '2026-04-13',
                    'dueDate' => '2026-04-14',
                    'description' => 'Electrical termination and commissioning assist.',
                    'status' => 'Incomplete',
                ],
            ],
        ],
    ],
    'Lito Ramos' => [
        [
            'projectId' => 'PRJ-1008',
            'startDate' => '2026-04-11',
            'endDate' => '2026-04-15',
            'title' => 'Ducting Fabrication - GreenArc Mall',
            'location' => 'GreenArc Mall Service Area, Taguig City',
            'status' => 'In Progress',
            'color' => 'secondary',
            'tasks' => [
                [
                    'dateStarted' => '2026-04-11',
                    'dueDate' => '2026-04-13',
                    'description' => 'Fabricate rectangular duct sections in shop.',
                    'status' => 'Completed',
                ],
                [
                    'dateStarted' => '2026-04-14',
                    'dueDate' => '2026-04-15',
                    'description' => 'Install fabricated ducts on level 2.',
                    'status' => 'Incomplete',
                ],
            ],
        ],
    ],
    'Carl Dominguez' => [
        [
            'projectId' => 'PRJ-1009',
            'startDate' => '2026-04-18',
            'endDate' => '2026-04-22',
            'title' => 'Aircon Cleaning - Meridian Suites',
            'location' => 'Meridian Suites, Manila City',
            'status' => 'Assigned',
            'color' => 'info',
            'tasks' => [
                [
                    'dateStarted' => '2026-04-18',
                    'dueDate' => '2026-04-19',
                    'description' => 'Clean indoor coil and drain pan units 301-306.',
                    'status' => 'Incomplete',
                ],
                [
                    'dateStarted' => '2026-04-20',
                    'dueDate' => '2026-04-22',
                    'description' => 'Pressure wash condenser units and test run.',
                    'status' => 'Incomplete',
                ],
            ],
        ],
    ],
    'Anne Mendoza' => [
        [
            'projectId' => 'PRJ-1010',
            'startDate' => '2026-04-09',
            'endDate' => '2026-04-13',
            'title' => 'Ducting Installation - Skybridge Offices',
            'location' => 'Skybridge Offices, Pasay City',
            'status' => 'In Progress',
            'color' => 'danger',
            'tasks' => [
                [
                    'dateStarted' => '2026-04-09',
                    'dueDate' => '2026-04-10',
                    'description' => 'Mark hanger locations and drill supports.',
                    'status' => 'Completed',
                ],
                [
                    'dateStarted' => '2026-04-11',
                    'dueDate' => '2026-04-13',
                    'description' => 'Install main trunk line and flexible connectors.',
                    'status' => 'Incomplete',
                ],
            ],
        ],
    ],
    'John Gonzales' => [
        [
            'projectId' => 'PRJ-1011',
            'startDate' => '2026-04-24',
            'endDate' => '2026-04-28',
            'title' => 'Aircon Installation - Ridgeway School',
            'location' => 'Ridgeway School Annex, Marikina City',
            'status' => 'Assigned',
            'color' => 'primary',
            'tasks' => [
                [
                    'dateStarted' => '2026-04-24',
                    'dueDate' => '2026-04-26',
                    'description' => 'Install wall brackets and set indoor units.',
                    'status' => 'Incomplete',
                ],
                [
                    'dateStarted' => '2026-04-27',
                    'dueDate' => '2026-04-28',
                    'description' => 'Run refrigerant piping and leak test.',
                    'status' => 'Incomplete',
                ],
            ],
        ],
    ],
    'Paolo Herrera' => [
        [
            'projectId' => 'PRJ-1012',
            'startDate' => '2026-04-16',
            'endDate' => '2026-04-20',
            'title' => 'Ducting Fabrication - Harbor Point Depot',
            'location' => 'Harbor Point Depot, Paranaque City',
            'status' => 'In Progress',
            'color' => 'success',
            'tasks' => [
                [
                    'dateStarted' => '2026-04-16',
                    'dueDate' => '2026-04-18',
                    'description' => 'Cut and fold GI sheets for branch ducts.',
                    'status' => 'Completed',
                ],
                [
                    'dateStarted' => '2026-04-19',
                    'dueDate' => '2026-04-20',
                    'description' => 'Assemble and reinforce elbows and reducers.',
                    'status' => 'Incomplete',
                ],
            ],
        ],
    ],
    'Nina Cortez' => [
        [
            'projectId' => 'PRJ-1013',
            'startDate' => '2026-04-06',
            'endDate' => '2026-04-10',
            'title' => 'Aircon Repair - Grandview Residences',
            'location' => 'Grandview Residences, Makati City',
            'status' => 'Assigned',
            'color' => 'warning',
            'tasks' => [
                [
                    'dateStarted' => '2026-04-06',
                    'dueDate' => '2026-04-08',
                    'description' => 'Inspect faulty inverter boards and thermistors.',
                    'status' => 'Incomplete',
                ],
                [
                    'dateStarted' => '2026-04-09',
                    'dueDate' => '2026-04-10',
                    'description' => 'Replace components and verify cooling load.',
                    'status' => 'Incomplete',
                ],
            ],
        ],
    ],
    'Ben Navarro' => [
        [
            'projectId' => 'PRJ-1014',
            'startDate' => '2026-04-26',
            'endDate' => '2026-04-30',
            'title' => 'Ducting Installation - Arcadia Foods Plant',
            'location' => 'Arcadia Foods Plant, Pasig City',
            'status' => 'In Progress',
            'color' => 'info',
            'tasks' => [
                [
                    'dateStarted' => '2026-04-26',
                    'dueDate' => '2026-04-27',
                    'description' => 'Install main supply duct line at processing area.',
                    'status' => 'Completed',
                ],
                [
                    'dateStarted' => '2026-04-28',
                    'dueDate' => '2026-04-30',
                    'description' => 'Seal joints and install balancing dampers.',
                    'status' => 'Incomplete',
                ],
            ],
        ],
    ],
    'Claire Santos' => [
        [
            'projectId' => 'PRJ-1015',
            'startDate' => '2026-04-17',
            'endDate' => '2026-04-21',
            'title' => 'Aircon Cleaning - Crestline Tower',
            'location' => 'Crestline Tower, Quezon City',
            'status' => 'Assigned',
            'color' => 'secondary',
            'tasks' => [
                [
                    'dateStarted' => '2026-04-17',
                    'dueDate' => '2026-04-18',
                    'description' => 'Clean evaporator units on floors 5 to 7.',
                    'status' => 'Incomplete',
                ],
                [
                    'dateStarted' => '2026-04-19',
                    'dueDate' => '2026-04-21',
                    'description' => 'Outdoor condenser washing and amperage checks.',
                    'status' => 'Incomplete',
                ],
            ],
        ],
    ],
    'Darren Uy' => [
        [
            'projectId' => 'PRJ-1016',
            'startDate' => '2026-04-07',
            'endDate' => '2026-04-11',
            'title' => 'Aircon Repair - Maple Court',
            'location' => 'Maple Court Offices, Quezon City',
            'status' => 'In Progress',
            'color' => 'primary',
            'tasks' => [
                [
                    'dateStarted' => '2026-04-07',
                    'dueDate' => '2026-04-08',
                    'description' => 'Trace intermittent power trip issue.',
                    'status' => 'Completed',
                ],
                [
                    'dateStarted' => '2026-04-09',
                    'dueDate' => '2026-04-11',
                    'description' => 'Replace contactor and retest all circuits.',
                    'status' => 'Incomplete',
                ],
            ],
        ],
    ],
    'Elena Cruz' => [
        [
            'projectId' => 'PRJ-1017',
            'startDate' => '2026-04-22',
            'endDate' => '2026-04-26',
            'title' => 'Ducting Fabrication - Midtown Complex',
            'location' => 'Midtown Complex, Manila City',
            'status' => 'Assigned',
            'color' => 'danger',
            'tasks' => [
                [
                    'dateStarted' => '2026-04-22',
                    'dueDate' => '2026-04-24',
                    'description' => 'Fabricate transition pieces for AHU connection.',
                    'status' => 'Incomplete',
                ],
                [
                    'dateStarted' => '2026-04-25',
                    'dueDate' => '2026-04-26',
                    'description' => 'Deliver fabricated sections and prep installation.',
                    'status' => 'Incomplete',
                ],
            ],
        ],
    ],
    'Francis Tan' => [
        [
            'projectId' => 'PRJ-1018',
            'startDate' => '2026-04-29',
            'endDate' => '2026-05-03',
            'title' => 'Aircon Installation - Pearlview Hotel',
            'location' => 'Pearlview Hotel Annex, Pasay City',
            'status' => 'Assigned',
            'color' => 'success',
            'tasks' => [
                [
                    'dateStarted' => '2026-04-29',
                    'dueDate' => '2026-05-01',
                    'description' => 'Install outdoor units and anti-vibration pads.',
                    'status' => 'Incomplete',
                ],
                [
                    'dateStarted' => '2026-05-02',
                    'dueDate' => '2026-05-03',
                    'description' => 'Perform vacuuming and commissioning checks.',
                    'status' => 'Incomplete',
                ],
            ],
        ],
    ],
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
                            <button type="button" class="btn btn-outline-secondary" id="calendarCurrentMonth">Today</button>
                            <button type="button" class="btn btn-outline-secondary" id="calendarNextMonth"><i class="bi bi-chevron-right"></i></button>
                        </div>
                    </div>

                    <div id="scheduleSelectedTech" class="small text-muted mb-3">Enter a technician name to view project assignments.</div>

                    <div class="row g-3">
                        <div class="col-lg-8">
                            <div class="border rounded-3 p-3 bg-white h-100">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <p class="text-secondary small mb-1">Calendar View</p>
                                        <h3 class="h5 mb-0" id="calendarMonthLabel"></h3>
                                    </div>
                                </div>
                                <div class="calendar-grid" id="scheduleCalendar" aria-label="Technician schedule calendar"></div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="border rounded-3 p-3 bg-white h-100">
                                <p class="text-secondary small mb-1">Selected Date</p>
                                <h4 class="h6 fw-semibold mb-3" id="scheduleSelectedDateLabel">No date selected</h4>
                                <ul class="list-group list-group-flush" id="scheduleDayProjectList">
                                    <li class="list-group-item px-0 text-secondary">Select a date to see assignments.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
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
    <div class="modal-dialog modal-xl modal-dialog-centered modal-lg" style="max-width: 900px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Technician Attendance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2"><strong>Name:</strong> <span id="attendanceTechName"></span></div>
                <div class="row g-2 mb-3">
                    <div class="col-md-6">
                        <label for="attendanceMonthInput" class="form-label mb-1"><strong>Month</strong></label>
                        <select id="attendanceMonthInput" class="form-select form-select-sm">
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4" selected>April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="attendanceYearInput" class="form-label mb-1"><strong>Year</strong></label>
                        <select id="attendanceYearInput" class="form-select form-select-sm">
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026" selected>2026</option>
                            <option value="2027">2027</option>
                        </select>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Project ID</th>
                                <th>Date</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                                <th>Status</th>
                                <th>Remarks</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="attendanceTableBody">
                            <tr><td class="text-muted" colspan="5">No attendance records.</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
const attendanceByTech = <?php echo json_encode($attendanceByTech, JSON_UNESCAPED_SLASHES); ?>;
const scheduleByTech = <?php echo json_encode($scheduleByTech, JSON_UNESCAPED_SLASHES); ?>;
const techData = <?php echo json_encode($sortedTechs, JSON_UNESCAPED_SLASHES); ?>;
let currentTechIndex = -1;
let currentTechSkills = [];

const technicianSearch = document.getElementById('technicianSearch');
const scheduleTechnicianName = document.getElementById('scheduleTechnicianName');
const calendarPrevMonth = document.getElementById('calendarPrevMonth');
const calendarNextMonth = document.getElementById('calendarNextMonth');
const calendarCurrentMonth = document.getElementById('calendarCurrentMonth');
const calendarMonthLabel = document.getElementById('calendarMonthLabel');
const scheduleCalendar = document.getElementById('scheduleCalendar');
const scheduleSelectedTech = document.getElementById('scheduleSelectedTech');
const scheduleSelectedDateLabel = document.getElementById('scheduleSelectedDateLabel');
const scheduleDayProjectList = document.getElementById('scheduleDayProjectList');
const today = new Date();
const calendarMonthState = new Date(2026, 3, 1);
let selectedScheduleDateKey = '2026-04-01';
const attendanceMonthInput = document.getElementById('attendanceMonthInput');
const attendanceYearInput = document.getElementById('attendanceYearInput');
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

function escapeHtml(value) {
    const temp = document.createElement('div');
    temp.textContent = value == null ? '' : String(value);
    return temp.innerHTML;
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

function formatTaskDate(value) {
    const raw = String(value || '').trim();
    if (!raw) {
        return '';
    }

    const dateObj = new Date(raw + 'T00:00:00');
    if (Number.isNaN(dateObj.getTime())) {
        return raw;
    }

    return dateObj.toLocaleDateString([], { month: 'long', day: '2-digit', year: 'numeric' });
}

function getStatusBadgeClass(status) {
    const statusKey = String(status || '').toLowerCase().trim();
    if (statusKey === 'in progress') return 'text-bg-success';
    if (statusKey === 'assigned') return 'text-bg-primary';
    if (statusKey === 'for assessment') return 'text-bg-warning';
    if (statusKey === 'completed') return 'text-bg-success';
    return 'text-bg-light border';
}

function getProjectColorClass(project, colorIndexMap, nextColorRef) {
    const preferred = String(project.color || '').trim();
    if (preferred !== '') {
        return preferred;
    }

    const projectId = String(project.projectId || 'N/A');
    if (!colorIndexMap[projectId]) {
        const palette = ['primary', 'success', 'warning', 'danger', 'info', 'secondary'];
        colorIndexMap[projectId] = palette[nextColorRef.value % palette.length];
        nextColorRef.value += 1;
    }

    return colorIndexMap[projectId];
}

function getCalendarEventStyle(colorKey) {
    const palette = {
        primary: { bg: '#2563eb', text: '#ffffff' },
        success: { bg: '#16a34a', text: '#ffffff' },
        warning: { bg: '#f59e0b', text: '#111827' },
        danger: { bg: '#e11d48', text: '#ffffff' },
        info: { bg: '#06b6d4', text: '#083344' },
        secondary: { bg: '#ec4899', text: '#ffffff' },
    };

    const selected = palette[String(colorKey || '').toLowerCase()] || { bg: '#334155', text: '#ffffff' };
    return `background-color: ${selected.bg}; color: ${selected.text}; font-weight: 600;`;
}

function getSchedulesByDate(techName, dateKey) {
    const projects = scheduleByTech[techName] || [];
    const groupedByProject = {};
    const colorIndexMap = {};
    const nextColorRef = { value: 0 };

    projects.forEach(function (project) {
        const tasks = Array.isArray(project.tasks) ? project.tasks : [];
        const projectColor = getProjectColorClass(project, colorIndexMap, nextColorRef);

        tasks.forEach(function (task) {
            const taskStartDate = task && task.dateStarted ? String(task.dateStarted) : '';
            const taskDueDate = task && task.dueDate ? String(task.dueDate) : taskStartDate;

            if (taskStartDate !== '' && taskDueDate !== '' && dateKey >= taskStartDate && dateKey <= taskDueDate) {
                const projectKey = String(project.projectId || 'N/A');
                if (!groupedByProject[projectKey]) {
                    groupedByProject[projectKey] = {
                        projectId: project.projectId,
                        title: project.title,
                        location: project.location,
                        status: project.status,
                        color: projectColor,
                        startDate: project.startDate,
                        endDate: project.endDate,
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

function renderSelectedScheduleDay(dateObj, matchedTechName) {
    if (!scheduleSelectedDateLabel || !scheduleDayProjectList) {
        return;
    }

    if (!matchedTechName) {
        scheduleSelectedDateLabel.textContent = 'No date selected';
        scheduleDayProjectList.innerHTML = '<li class="list-group-item px-0 text-secondary">Select a valid technician to see assignments.</li>';
        return;
    }

    const dateKey = formatDateKey(dateObj);
    const daySchedules = getSchedulesByDate(matchedTechName, dateKey);
    scheduleSelectedDateLabel.textContent = dateObj.toLocaleDateString([], {
        weekday: 'long',
        month: 'long',
        day: 'numeric',
        year: 'numeric',
    });

    if (!daySchedules.length) {
        scheduleDayProjectList.innerHTML = '<li class="list-group-item px-0 text-secondary">No assignment for this date.</li>';
        return;
    }

    scheduleDayProjectList.innerHTML = daySchedules.map(function (project) {
        const taskItems = (Array.isArray(project.tasks) ? project.tasks : []).map(function (task) {
            const rangeStart = formatTaskDate(task.startDate || dateKey);
            const rangeEnd = formatTaskDate(task.dueDate || dateKey);
            return '<div class="small mb-2 p-2 border-start border-3 border-primary rounded-2 bg-white shadow-sm text-dark">'
                + '<p class="fw-semibold mb-1 text-primary">' + escapeHtml(rangeStart) + ' - ' + escapeHtml(rangeEnd) + '</p>'
                + '<p class="mb-1">' + escapeHtml(task.description || 'No task description provided.') + '</p>'
                + '<span class="badge ' + getStatusBadgeClass(task.status) + '">' + escapeHtml(task.status || 'Incomplete') + '</span>'
                + '</div>';
        }).join('');

        return '<li class="list-group-item px-0">'
            + '<p class="small text-primary fw-semibold mb-1">' + escapeHtml(project.projectId || 'N/A') + '</p>'
            + '<p class="fw-semibold small mb-1">' + escapeHtml(project.title || 'Untitled Project') + '</p>'
            + '<p class="small mb-2 text-secondary"><i class="bi bi-geo-alt me-1"></i>' + escapeHtml(project.location || 'No location provided') + '</p>'
            + '<div class="mb-2"><span class="badge ' + getStatusBadgeClass(project.status) + '">' + escapeHtml(project.status || 'Assigned') + '</span></div>'
            + '<p class="fw-bold fs-6 mb-2"><i class="bi bi-list-task me-1"></i>Tasks</p>'
            + '<div class="mb-2">' + taskItems + '</div>'
            + '</li>';
    }).join('');
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

    const weekdayHeaders = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    const totalCells = Math.ceil((startWeekday + totalDays) / 7) * 7;

    scheduleCalendar.innerHTML = '';

    weekdayHeaders.forEach(function (dayName) {
        const headerCell = document.createElement('div');
        headerCell.className = 'cal-header';
        headerCell.textContent = dayName;
        scheduleCalendar.appendChild(headerCell);
    });

    for (let cellIndex = 0; cellIndex < totalCells; cellIndex += 1) {
        const dayNumber = cellIndex - startWeekday + 1;
        const cell = document.createElement('button');
        cell.type = 'button';
        cell.className = 'cal-cell text-start border-0';

        if (dayNumber < 1 || dayNumber > totalDays) {
            cell.classList.add('empty');
            scheduleCalendar.appendChild(cell);
            continue;
        }

        const thisDate = new Date(currentYear, currentMonth, dayNumber);
        const thisDateKey = formatDateKey(thisDate);
        const isToday = thisDateKey === formatDateKey(today);
        const isSelected = thisDateKey === selectedScheduleDateKey;
        const schedules = matchedTechName ? getSchedulesByDate(matchedTechName, thisDateKey) : [];

        if (isToday) {
            cell.classList.add('today');
        }
        if (isSelected) {
            cell.classList.add('tech-cal-selected');
        }

        const dayPill = document.createElement('div');
        dayPill.className = 'cal-day' + (isToday ? ' today-dot' : '');
        dayPill.textContent = String(dayNumber);
        cell.appendChild(dayPill);

        schedules.slice(0, 2).forEach(function (project) {
            const tag = document.createElement('div');
            tag.className = 'cal-event';
            tag.style.cssText = getCalendarEventStyle(project.color || 'secondary');
            tag.textContent = project.projectId || 'N/A';
            cell.appendChild(tag);
        });

        if (schedules.length > 2) {
            const moreTag = document.createElement('div');
            moreTag.className = 'small text-secondary mt-1';
            moreTag.textContent = '+' + (schedules.length - 2) + ' more';
            cell.appendChild(moreTag);
        }

        cell.addEventListener('click', function () {
            selectedScheduleDateKey = thisDateKey;
            renderScheduleCalendar();
            renderSelectedScheduleDay(thisDate, matchedTechName);
        });

        scheduleCalendar.appendChild(cell);
    }

    const selectedDateParts = selectedScheduleDateKey.split('-').map(Number);
    renderSelectedScheduleDay(
        new Date(selectedDateParts[0], selectedDateParts[1] - 1, selectedDateParts[2]),
        matchedTechName
    );
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

if (calendarCurrentMonth) {
    calendarCurrentMonth.addEventListener('click', function () {
        calendarMonthState.setMonth(today.getMonth());
        calendarMonthState.setFullYear(today.getFullYear());
        selectedScheduleDateKey = formatDateKey(today);
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

        if (attendanceMonthInput) {
            attendanceMonthInput.value = '4';
        }
        if (attendanceYearInput) {
            attendanceYearInput.value = '2026';
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

    const selectedMonth = Number(attendanceMonthInput ? attendanceMonthInput.value : '4') - 1;
    const selectedYear = Number(attendanceYearInput ? attendanceYearInput.value : '2026');
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
            const timeIn = record.time_in || '-';
            const timeOut = record.time_out || '-';
            const statusBadgeClass = String(status).toLowerCase() === 'present' ? 'text-bg-success' : 'text-bg-danger';
            let remarksBadgeClass = 'text-bg-warning';
            if (String(remarks).toLowerCase() === 'confirmed') remarksBadgeClass = 'text-bg-primary';
            if (String(remarks).toLowerCase() === 'invalid') remarksBadgeClass = 'text-bg-danger';
            const canTakeAction = String(remarks).toLowerCase() === 'pending';
            return '<tr>'
                + `<td>${record.project || 'PRJ-0000'}</td>`
                + `<td>${record.date || '-'}</td>`
                + `<td>${timeIn}</td>`
                + `<td>${timeOut}</td>`
                + `<td><span class="badge ${statusBadgeClass}">${status}</span></td>`
                + `<td><span class="badge ${remarksBadgeClass}">${remarks}</span></td>`
                + '<td>'
                + (canTakeAction ? '<button type="button" class="btn btn-sm btn-primary confirm-attendance-btn me-1" data-date="' + escapeHtml(record.date || '') + '">Confirm</button>'
                    + '<button type="button" class="btn btn-sm btn-danger invalid-attendance-btn" data-date="' + escapeHtml(record.date || '') + '">Invalid</button>' : '-')
                + '</td>'
                + '</tr>';
        }).join('')
        : '<tr><td class="text-muted" colspan="7">No attendance records for selected month.</td></tr>';
}

if (attendanceMonthInput) {
    attendanceMonthInput.addEventListener('change', renderAttendanceTable);
}
if (attendanceYearInput) {
    attendanceYearInput.addEventListener('change', renderAttendanceTable);
}

document.addEventListener('click', function (event) {
    const confirmButton = event.target.closest('.confirm-attendance-btn');
    const invalidButton = event.target.closest('.invalid-attendance-btn');

    if (!confirmButton && !invalidButton) {
        return;
    }

    const dateValue = confirmButton ? confirmButton.getAttribute('data-date') : invalidButton.getAttribute('data-date');
    const records = attendanceByTech[activeAttendanceTechName] || [];
    const record = records.find(function (r) {
        return r.date === dateValue;
    });

    if (!record || String(record.remarks).toLowerCase() !== 'pending') {
        return;
    }

    if (confirmButton) {
        record.remarks = 'Confirmed';
    } else if (invalidButton) {
        record.remarks = 'Invalid';
    }

    renderAttendanceTable();
});
</script>
<?php include __DIR__ . '/../../includes/footer.php'; ?>


