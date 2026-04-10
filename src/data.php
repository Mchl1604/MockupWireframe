<?php
/**
 * Mock data for Coliconstruct Engineering Services
 * Mirrors the TypeScript mockData.ts from the original React app
 */

$services = [
    ['id' => 'ac-install',            'name' => 'AC Installation',       'description' => 'Residential & commercial AC unit installation', 'hasMaterials' => true],
    ['id' => 'ducting',               'name' => 'Ducting',                'description' => 'Fabrication and installation of duct systems',  'hasMaterials' => true],
    ['id' => 'ac-repair',             'name' => 'AC Repair',              'description' => 'Diagnosis and repair of AC units',              'hasMaterials' => false],
    ['id' => 'ac-cleaning',           'name' => 'AC Cleaning',            'description' => 'Deep cleaning and servicing of AC units',        'hasMaterials' => false],
    ['id' => 'preventive-maintenance','name' => 'Preventive Maintenance', 'description' => 'Scheduled maintenance to prevent breakdowns',    'hasMaterials' => false],
];

$acInstallMaterials = [
    ['name' => 'AC Unit',           'qty' => 1, 'unit' => 'pc'],
    ['name' => 'Bracket',           'qty' => 1, 'unit' => 'set'],
    ['name' => 'Copper Pipe',       'qty' => 1, 'unit' => 'roll'],
    ['name' => 'Rubber Insulation', 'qty' => 1, 'unit' => 'roll'],
    ['name' => 'Royal Cord',        'qty' => 1, 'unit' => 'roll'],
    ['name' => 'Circuit Breaker',   'qty' => 1, 'unit' => 'pc'],
    ['name' => 'Flexible PVC',      'qty' => 1, 'unit' => 'pc'],
];

$ductingMaterials = [
    ['name' => 'Full Threaded Rod',  'qty' => 1, 'unit' => 'pc'],
    ['name' => 'Yero',               'qty' => 1, 'unit' => 'sheet'],
    ['name' => 'Angle Bar',          'qty' => 1, 'unit' => 'pc'],
    ['name' => 'Duct Sealant',       'qty' => 1, 'unit' => 'tube'],
    ['name' => 'Duct Tape',          'qty' => 1, 'unit' => 'roll'],
    ['name' => 'Insulation Padding', 'qty' => 1, 'unit' => 'roll'],
];

$projects = [
    [
        'id' => 'PRJ-001', 'quotationId' => 'QT-001', 'name' => 'Office AC Installation',
        'client' => 'Maria Santos', 'serviceType' => 'AC Installation', 'status' => 'Ongoing',
        'timeline' => 'Jan 15 - Feb 15, 2026',
        'description' => 'Installation of 3 split-type AC units in the main office area.',
        'technicians' => ['Mark Santos', 'Juan Reyes'],
        'materials' => $acInstallMaterials,
        'quotation' => ['materials' => 45000, 'labor' => 15000, 'total' => 60000],
    ],
    [
        'id' => 'PRJ-002', 'quotationId' => 'QT-002', 'name' => 'Warehouse Ducting System',
        'client' => 'Pedro Cruz', 'serviceType' => 'Ducting', 'status' => 'To be Approved',
        'timeline' => 'Feb 1 - Mar 30, 2026',
        'description' => 'Complete ducting system for 500sqm warehouse.',
        'technicians' => ['Mark Santos'],
        'materials' => $ductingMaterials,
        'quotation' => ['materials' => 120000, 'labor' => 80000, 'total' => 200000],
    ],
    [
        'id' => 'PRJ-003', 'quotationId' => 'QT-003', 'name' => 'AC Cleaning - Floor 2',
        'client' => 'Ana Reyes', 'serviceType' => 'AC Cleaning', 'status' => 'Completed',
        'timeline' => 'Dec 1 - Dec 5, 2025',
        'description' => 'Deep cleaning of 5 window-type AC units on the 2nd floor.',
        'technicians' => ['Juan Reyes'],
        'materials' => [],
        'quotation' => ['materials' => 0, 'labor' => 5000, 'total' => 5000],
    ],
    [
        'id' => 'PRJ-004', 'quotationId' => 'QT-004', 'name' => 'Preventive Maintenance Contract',
        'client' => 'Tech Corp', 'serviceType' => 'Preventive Maintenance', 'status' => 'Ongoing',
        'timeline' => 'Jan 1 - Dec 31, 2026',
        'description' => 'Monthly PM for 20 AC units across 3 floors.',
        'technicians' => ['Mark Santos', 'Juan Reyes', 'Carlos Diaz'],
        'materials' => [],
        'quotation' => ['materials' => 0, 'labor' => 120000, 'total' => 120000],
    ],
];

$requests = [
    ['id' => 'REQ-001', 'client' => 'Maria Santos', 'service' => 'AC Installation', 'address' => '123 Rizal Ave, Makati',       'date' => '2026-04-01', 'status' => 'Pending',  'description' => 'Need 3 units installed',    'phone' => '09171234567'],
    ['id' => 'REQ-002', 'client' => 'Pedro Cruz',   'service' => 'Ducting',          'address' => '456 EDSA, Quezon City',        'date' => '2026-04-03', 'status' => 'Approved', 'description' => 'Full warehouse ducting',    'phone' => '09181234567'],
    ['id' => 'REQ-003', 'client' => 'Ana Reyes',    'service' => 'AC Cleaning',      'address' => '789 Shaw Blvd, Mandaluyong',   'date' => '2026-04-05', 'status' => 'Pending',  'description' => '5 units need cleaning',     'phone' => '09191234567'],
];

$technicians = [
    ['id' => 'T-001', 'name' => 'Mark Santos',   'skill' => 'AC Installation, Ducting',  'status' => 'On Project', 'avatar' => 'MS'],
    ['id' => 'T-002', 'name' => 'Juan Reyes',    'skill' => 'AC Repair, Cleaning',       'status' => 'Available',  'avatar' => 'JR'],
    ['id' => 'T-003', 'name' => 'Carlos Diaz',   'skill' => 'Preventive Maintenance',    'status' => 'Available',  'avatar' => 'CD'],
    ['id' => 'T-004', 'name' => 'Miguel Torres', 'skill' => 'Ducting, Repair',           'status' => 'On Project', 'avatar' => 'MT'],
];

$reports = [
    ['id' => 'RPT-001', 'date' => '2026-04-01', 'project' => 'Office AC Installation',   'projectLead' => 'Mark Santos', 'type' => 'Assessment', 'description' => 'Initial site assessment completed. Electrical wiring needs upgrade before installation.', 'images' => []],
    ['id' => 'RPT-002', 'date' => '2026-04-05', 'project' => 'Office AC Installation',   'projectLead' => 'Mark Santos', 'type' => 'Progress',   'description' => '2 out of 3 units installed. Waiting for circuit breaker delivery.',                      'images' => []],
    ['id' => 'RPT-003', 'date' => '2026-04-03', 'project' => 'Warehouse Ducting System', 'projectLead' => 'Mark Santos', 'type' => 'Incident',   'description' => 'Minor delay due to wrong angle bar size delivered. Replacement ordered.',                   'images' => []],
];

$materials = [
    ['id' => 'MAT-001', 'name' => 'AC Unit (1.5HP Split Type)', 'category' => 'AC Installation', 'price' => 25000, 'dateAdded' => '2026-01-15'],
    ['id' => 'MAT-002', 'name' => 'Copper Pipe (1/4 x 3/8)',    'category' => 'AC Installation', 'price' => 1500,  'dateAdded' => '2026-01-15'],
    ['id' => 'MAT-003', 'name' => 'Bracket (Heavy Duty)',        'category' => 'AC Installation', 'price' => 800,   'dateAdded' => '2026-01-15'],
    ['id' => 'MAT-004', 'name' => 'Full Threaded Rod',           'category' => 'Ducting',         'price' => 350,   'dateAdded' => '2026-02-01'],
    ['id' => 'MAT-005', 'name' => 'Yero (G26)',                  'category' => 'Ducting',         'price' => 450,   'dateAdded' => '2026-02-01'],
    ['id' => 'MAT-006', 'name' => 'Duct Sealant',                'category' => 'Ducting',         'price' => 280,   'dateAdded' => '2026-02-01'],
];

$chats = [
    [
        'id' => 'CH-001', 'name' => 'Admin Support', 'lastMessage' => 'Your request has been received', 'time' => '10:30 AM', 'unread' => 2,
        'messages' => [
            ['id' => 'm1', 'sender' => 'Admin',    'text' => 'Hello! How can we help you today?',                                    'time' => '10:00 AM', 'isOwn' => false],
            ['id' => 'm2', 'sender' => 'You',      'text' => "I'd like to inquire about my AC installation project.",                 'time' => '10:15 AM', 'isOwn' => true],
            ['id' => 'm3', 'sender' => 'Admin',    'text' => "Your request has been received. We'll assign a technician shortly.",   'time' => '10:30 AM', 'isOwn' => false],
        ],
    ],
    [
        'id' => 'CH-002', 'name' => 'Tech - Mark Santos', 'lastMessage' => 'Installation scheduled for Monday', 'time' => 'Yesterday', 'unread' => 0,
        'messages' => [
            ['id' => 'm4', 'sender' => 'Mark Santos', 'text' => "Hi, I'll be handling your AC installation.",   'time' => '9:00 AM',  'isOwn' => false],
            ['id' => 'm5', 'sender' => 'You',          'text' => 'Great! When can you start?',                  'time' => '9:30 AM',  'isOwn' => true],
            ['id' => 'm6', 'sender' => 'Mark Santos', 'text' => 'Installation scheduled for Monday at 8 AM.',   'time' => '10:00 AM', 'isOwn' => false],
        ],
    ],
];

$attendance = [
    ['date' => '2026-04-10', 'project' => 'Office AC Installation',   'timeIn' => '08:00 AM', 'timeOut' => '05:00 PM', 'status' => 'Present', 'remarks' => ''],
    ['date' => '2026-04-09', 'project' => 'Office AC Installation',   'timeIn' => '08:15 AM', 'timeOut' => '05:00 PM', 'status' => 'Late',    'remarks' => 'Traffic'],
    ['date' => '2026-04-08', 'project' => 'Warehouse Ducting System', 'timeIn' => '08:00 AM', 'timeOut' => '05:30 PM', 'status' => 'Present', 'remarks' => 'Overtime'],
    ['date' => '2026-04-07', 'project' => 'Office AC Installation',   'timeIn' => '—',        'timeOut' => '—',        'status' => 'Absent',  'remarks' => 'Sick leave'],
];

$users = [
    ['id' => 'U-001', 'name' => 'Maria Santos',   'email' => 'maria@email.com',           'role' => 'Client',     'status' => 'Active', 'createdAt' => '2026-01-10'],
    ['id' => 'U-002', 'name' => 'Pedro Cruz',     'email' => 'pedro@email.com',           'role' => 'Client',     'status' => 'Active', 'createdAt' => '2026-01-15'],
    ['id' => 'U-003', 'name' => 'Mark Santos',    'email' => 'mark@email.com',            'role' => 'Technician', 'status' => 'Active', 'createdAt' => '2025-11-01'],
    ['id' => 'U-004', 'name' => 'Juan Reyes',     'email' => 'juan@email.com',            'role' => 'Technician', 'status' => 'Active', 'createdAt' => '2025-11-15'],
    ['id' => 'U-005', 'name' => 'Admin Michael',  'email' => 'admin@coliconstruct.com',   'role' => 'Admin',      'status' => 'Active', 'createdAt' => '2025-10-01'],
];

$scheduleEvents = [
    ['date' => 10, 'title' => 'AC Install - Maria',   'tech' => 'Mark Santos',   'color' => 'bg-primary'],
    ['date' => 12, 'title' => 'Ducting - Pedro',       'tech' => 'Mark Santos',   'color' => 'bg-warning'],
    ['date' => 14, 'title' => 'AC Clean - Ana',        'tech' => 'Juan Reyes',    'color' => 'bg-success'],
    ['date' => 18, 'title' => 'PM - Tech Corp',        'tech' => 'Carlos Diaz',   'color' => 'bg-primary'],
    ['date' => 22, 'title' => 'AC Repair',             'tech' => 'Juan Reyes',    'color' => 'bg-warning'],
    ['date' => 25, 'title' => 'Ducting Phase 2',       'tech' => 'Miguel Torres', 'color' => 'bg-primary'],
];

/** Helper to find a project by ID */
function findProject(string $id, array $projects): ?array {
    foreach ($projects as $p) {
        if ($p['id'] === $id) return $p;
    }
    return null;
}

/** Helper to get reports for a project name */
function projectReports(string $projectName, array $reports): array {
    return array_values(array_filter($reports, fn($r) => $r['project'] === $projectName));
}
