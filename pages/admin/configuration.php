<?php $pageTitle = 'Configuration'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<?php
$materials = [
    ['id' => 'MAT-001', 'name' => 'LG 2HP', 'cost' => 15000, 'unit' => 'pcs', 'service' => 'Aircon Installation'],
    ['id' => 'MAT-002', 'name' => 'Carrier 2HP', 'cost' => 16500, 'unit' => 'pcs', 'service' => 'Aircon Installation'],
    ['id' => 'MAT-003', 'name' => 'Daikin 2HP', 'cost' => 17000, 'unit' => 'pcs', 'service' => 'Aircon Installation'],
    ['id' => 'MAT-004', 'name' => 'Panasonic 2HP', 'cost' => 14500, 'unit' => 'pcs', 'service' => 'Aircon Installation'],
    ['id' => 'MAT-005', 'name' => 'Samsung 2HP', 'cost' => 15500, 'unit' => 'pcs', 'service' => 'Aircon Installation'],
    ['id' => 'MAT-006', 'name' => 'Midea 1.5HP', 'cost' => 12000, 'unit' => 'pcs', 'service' => 'Aircon Installation'],
    ['id' => 'MAT-007', 'name' => 'Fujitsu 2.5HP', 'cost' => 18000, 'unit' => 'pcs', 'service' => 'Aircon Installation'],
    ['id' => 'MAT-008', 'name' => 'Bracket', 'cost' => 500, 'unit' => 'pcs', 'service' => 'Aircon Installation'],
    ['id' => 'MAT-009', 'name' => 'Copper Pipe', 'cost' => 800, 'unit' => 'meter', 'service' => 'Aircon Installation'],
    ['id' => 'MAT-010', 'name' => 'Rubber Insulation', 'cost' => 300, 'unit' => 'meter', 'service' => 'Aircon Installation'],
    ['id' => 'MAT-011', 'name' => 'Royal Cord', 'cost' => 200, 'unit' => 'meter', 'service' => 'Aircon Installation'],
    ['id' => 'MAT-012', 'name' => 'Circuit Breaker', 'cost' => 1200, 'unit' => 'pcs', 'service' => 'Aircon Installation'],
    ['id' => 'MAT-013', 'name' => 'Flexible PVC', 'cost' => 400, 'unit' => 'meter', 'service' => 'Aircon Installation'],
    ['id' => 'MAT-014', 'name' => 'Pressure Washer', 'cost' => 25000, 'unit' => 'pcs', 'service' => 'Aircon Cleaning'],
    ['id' => 'MAT-015', 'name' => 'Vacuum Cleaner', 'cost' => 8000, 'unit' => 'pcs', 'service' => 'Aircon Cleaning'],
    ['id' => 'MAT-016', 'name' => 'Wash Bag', 'cost' => 500, 'unit' => 'pcs', 'service' => 'Aircon Cleaning'],
    ['id' => 'MAT-017', 'name' => 'Water Container', 'cost' => 1000, 'unit' => 'pcs', 'service' => 'Aircon Cleaning'],
    ['id' => 'MAT-018', 'name' => 'Blower', 'cost' => 3000, 'unit' => 'pcs', 'service' => 'Aircon Cleaning'],
    ['id' => 'MAT-019', 'name' => 'Hand Tools', 'cost' => 2000, 'unit' => 'set', 'service' => 'Aircon Repair'],
    ['id' => 'MAT-020', 'name' => 'Manifold Gauge', 'cost' => 5000, 'unit' => 'pcs', 'service' => 'Aircon Repair'],
    ['id' => 'MAT-021', 'name' => 'Clamp Meter', 'cost' => 3500, 'unit' => 'pcs', 'service' => 'Aircon Repair'],
    ['id' => 'MAT-022', 'name' => 'Full Threaded Rod', 'cost' => 600, 'unit' => 'meter', 'service' => 'Ducting Fabrication'],
    ['id' => 'MAT-023', 'name' => 'Yero', 'cost' => 1500, 'unit' => 'sheet', 'service' => 'Ducting Fabrication'],
    ['id' => 'MAT-024', 'name' => 'Angle Bar', 'cost' => 800, 'unit' => 'meter', 'service' => 'Ducting Fabrication'],
    ['id' => 'MAT-025', 'name' => 'Duct Sealant', 'cost' => 400, 'unit' => 'tube', 'service' => 'Ducting Fabrication'],
    ['id' => 'MAT-026', 'name' => 'Duct Tape', 'cost' => 300, 'unit' => 'roll', 'service' => 'Ducting Fabrication'],
    ['id' => 'MAT-027', 'name' => 'Insulation Padding', 'cost' => 200, 'unit' => 'meter', 'service' => 'Ducting Fabrication'],
    ['id' => 'MAT-028', 'name' => 'Cleaning Solution', 'cost' => 500, 'unit' => 'liter', 'service' => 'Aircon Cleaning'],
    ['id' => 'MAT-029', 'name' => 'Lubricating Oil', 'cost' => 800, 'unit' => 'liter', 'service' => 'Aircon Cleaning'],
    ['id' => 'MAT-030', 'name' => 'Replacement Filter', 'cost' => 1200, 'unit' => 'pcs', 'service' => 'Aircon Cleaning'],
];

$users = [
    ['id' => 'USR-001', 'name' => 'Admin One', 'email' => 'admin@coliconstruct.com', 'role' => 'Admin', 'status' => 'Active'],
    ['id' => 'USR-002', 'name' => 'Admin Two', 'email' => 'admin2@coliconstruct.com', 'role' => 'Admin', 'status' => 'Active'],
    ['id' => 'USR-003', 'name' => 'Mario Santos', 'email' => 'mario.santos@example.com', 'role' => 'Lead Technician', 'status' => 'Active'],
    ['id' => 'USR-004', 'name' => 'Carlo Reyes', 'email' => 'carlo.reyes@example.com', 'role' => 'Lead Technician', 'status' => 'Active'],
    ['id' => 'USR-005', 'name' => 'Jude Flores', 'email' => 'jude.flores@example.com', 'role' => 'Technician', 'status' => 'Active'],
    ['id' => 'USR-006', 'name' => 'Lito Ramos', 'email' => 'lito.ramos@example.com', 'role' => 'Lead Technician', 'status' => 'Active'],
    ['id' => 'USR-007', 'name' => 'Carl Dominguez', 'email' => 'carl.dominguez@example.com', 'role' => 'Lead Technician', 'status' => 'Active'],
    ['id' => 'USR-008', 'name' => 'Anne Mendoza', 'email' => 'anne.mendoza@example.com', 'role' => 'Lead Technician', 'status' => 'Active'],
    ['id' => 'USR-009', 'name' => 'John Gonzales', 'email' => 'john.gonzales@example.com', 'role' => 'Technician', 'status' => 'Active'],
    ['id' => 'USR-010', 'name' => 'Paolo Herrera', 'email' => 'paolo.herrera@example.com', 'role' => 'Technician', 'status' => 'Active'],
    ['id' => 'USR-011', 'name' => 'Nina Cortez', 'email' => 'nina.cortez@example.com', 'role' => 'Technician', 'status' => 'Active'],
    ['id' => 'USR-012', 'name' => 'Ben Navarro', 'email' => 'ben.navarro@example.com', 'role' => 'Technician', 'status' => 'Active'],
    ['id' => 'USR-013', 'name' => 'Claire Santos', 'email' => 'claire.santos@example.com', 'role' => 'Technician', 'status' => 'Active'],
    ['id' => 'USR-014', 'name' => 'Darren Uy', 'email' => 'darren.uy@example.com', 'role' => 'Technician', 'status' => 'Active'],
    ['id' => 'USR-015', 'name' => 'Elena Cruz', 'email' => 'elena.cruz@example.com', 'role' => 'Technician', 'status' => 'Active'],
    ['id' => 'USR-016', 'name' => 'Francis Tan', 'email' => 'francis.tan@example.com', 'role' => 'Technician', 'status' => 'Active'],
    ['id' => 'USR-017', 'name' => 'Juan Dela Cruz', 'email' => 'juan@example.com', 'role' => 'Client', 'status' => 'Active'],
    ['id' => 'USR-018', 'name' => 'Maria Santos', 'email' => 'maria@example.com', 'role' => 'Client', 'status' => 'Active'],
    ['id' => 'USR-019', 'name' => 'Pedro Reyes', 'email' => 'pedro@example.com', 'role' => 'Client', 'status' => 'Inactive'],
];

$activityLogs = [
    ['id' => 'LOG-001', 'timestamp' => '2026-04-12 14:35:22', 'user' => 'Admin One', 'action' => 'User Login', 'description' => 'Admin One logged into the system'],
    ['id' => 'LOG-002', 'timestamp' => '2026-04-12 14:32:15', 'user' => 'Mario Santos', 'action' => 'Project Updated', 'description' => 'Updated project PRJ-1001 schedule'],
    ['id' => 'LOG-003', 'timestamp' => '2026-04-12 14:28:50', 'user' => 'Admin Two', 'action' => 'Material Added', 'description' => 'Added new material: LG 2HP AC Unit'],
    ['id' => 'LOG-004', 'timestamp' => '2026-04-12 14:15:30', 'user' => 'Admin One', 'action' => 'User Created', 'description' => 'Created new technician account: John Dorado'],
    ['id' => 'LOG-005', 'timestamp' => '2026-04-12 13:50:12', 'user' => 'Admin Two', 'action' => 'Material Modified', 'description' => 'Modified material cost: Copper Pipe'],
    ['id' => 'LOG-006', 'timestamp' => '2026-04-12 13:45:05', 'user' => 'Carlo Reyes', 'action' => 'Report Generated', 'description' => 'Generated monthly attendance report'],
    ['id' => 'LOG-007', 'timestamp' => '2026-04-12 13:30:42', 'user' => 'Admin One', 'action' => 'User Deactivated', 'description' => 'Deactivated user account: Pedro Reyes'],
    ['id' => 'LOG-008', 'timestamp' => '2026-04-12 13:20:18', 'user' => 'Admin Two', 'action' => 'Configuration Changed', 'description' => 'Updated system settings'],
    ['id' => 'LOG-009', 'timestamp' => '2026-04-12 12:40:10', 'user' => 'Admin Two', 'action' => 'Material Deleted', 'description' => 'Deleted obsolete material: Old AC Unit'],
];

$systemSettings = [
    'companyName' => 'Coliconstruct',
    'supportEmail' => 'support@coliconstruct.com',
    'contactNumber' => '0917-000-0000',
    'businessAddress' => '20 NHA Commercial and Industrial Compound, Barangay Gavino Maderan, Luzon Avenue, General Mariano Alvarez, Cavite.',
    'servicesOffered' => ['Aircon Installation', 'Aircon Repair', 'Aircon Cleaning', 'Ducting Fabrication', 'Ducting Installation'],
];
?>
<main class="container py-4 flex-grow-1">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h2 class="h4 fw-bold mb-1">Configuration</h2>
        </div>
    </div>

    <ul class="nav nav-tabs mb-3" id="configurationTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="users-tab" data-bs-toggle="tab" data-bs-target="#users-pane" type="button" role="tab" aria-controls="users-pane" aria-selected="true">Users</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="activity-tab" data-bs-toggle="tab" data-bs-target="#activity-pane" type="button" role="tab" aria-controls="activity-pane" aria-selected="false">Activity Logs</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="materials-tab" data-bs-toggle="tab" data-bs-target="#materials-pane" type="button" role="tab" aria-controls="materials-pane" aria-selected="false">Materials</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="system-settings-tab" data-bs-toggle="tab" data-bs-target="#system-settings-pane" type="button" role="tab" aria-controls="system-settings-pane" aria-selected="false">System Settings</button>
        </li>
    </ul>

    <div class="tab-content">
        <!-- Users Pane -->
        <div class="tab-pane fade show active" id="users-pane" role="tabpanel" aria-labelledby="users-tab" tabindex="0">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="h5 fw-bold mb-0">Users Management</h3>
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <input type="search" id="userSearch" class="form-control form-control-sm" placeholder="Search users..." style="width: 220px;">
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addUserModal">Add User</button>
                    <button class="btn btn-outline-secondary btn-sm">View Archive</button>
                </div>
            </div>

            <!-- Staff Table -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-light">
                    <h6 class="mb-0 fw-bold">Employees</h6>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="staffTableBody">
                            <?php foreach ($users as $u): ?>
                                <?php if ($u['role'] === 'Technician' || $u['role'] === 'Lead Technician' || $u['role'] === 'Admin'): ?>
                                    <tr>
                                        <td><code><?php echo htmlspecialchars($u['id'], ENT_QUOTES, 'UTF-8'); ?></code></td>
                                        <td><?php echo htmlspecialchars($u['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td>
                                            <?php if ($u['role'] === 'Admin'): ?>
                                                <span class="badge bg-danger">Admin</span>
                                            <?php elseif ($u['role'] === 'Lead Technician'): ?>
                                                <span class="badge bg-info">Lead Technician</span>
                                            <?php else: ?>
                                                <span class="badge bg-primary">Technician</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo htmlspecialchars($u['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td>
                                            <?php if ($u['status'] === 'Active'): ?>
                                                <span class="badge bg-success">Active</span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary">Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <button type="button" class="btn btn-sm btn-primary editUserBtn" title="Edit"
                                                    data-id="<?php echo htmlspecialchars($u['id'], ENT_QUOTES, 'UTF-8'); ?>"
                                                    data-name="<?php echo htmlspecialchars($u['name'], ENT_QUOTES, 'UTF-8'); ?>"
                                                    data-email="<?php echo htmlspecialchars($u['email'], ENT_QUOTES, 'UTF-8'); ?>"
                                                    data-role="<?php echo htmlspecialchars($u['role'], ENT_QUOTES, 'UTF-8'); ?>"
                                                    data-bs-toggle="modal" data-bs-target="#editUserModal">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-warning" title="Deactivate"><i class="bi bi-lock"></i></button>
                                                <button type="button" class="btn btn-sm btn-danger" title="Archive"><i class="bi bi-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Clients Table -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-light">
                    <h6 class="mb-0 fw-bold">Clients</h6>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="clientsTableBody">
                            <?php foreach ($users as $u): ?>
                                <?php if ($u['role'] === 'Client'): ?>
                                    <tr>
                                        <td><code><?php echo htmlspecialchars($u['id'], ENT_QUOTES, 'UTF-8'); ?></code></td>
                                        <td><?php echo htmlspecialchars($u['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($u['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td>
                                            <?php if ($u['status'] === 'Active'): ?>
                                                <span class="badge bg-success">Active</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <button type="button" class="btn btn-sm btn-primary editUserBtn" title="Edit"
                                                    data-id="<?php echo htmlspecialchars($u['id'], ENT_QUOTES, 'UTF-8'); ?>"
                                                    data-name="<?php echo htmlspecialchars($u['name'], ENT_QUOTES, 'UTF-8'); ?>"
                                                    data-email="<?php echo htmlspecialchars($u['email'], ENT_QUOTES, 'UTF-8'); ?>"
                                                    data-role="<?php echo htmlspecialchars($u['role'], ENT_QUOTES, 'UTF-8'); ?>"
                                                    data-bs-toggle="modal" data-bs-target="#editUserModal">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-warning" title="Deactivate"><i class="bi bi-lock"></i></button>
                                                <button type="button" class="btn btn-sm btn-danger" title="Archive"><i class="bi bi-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Activity Logs Pane -->
        <div class="tab-pane fade" id="activity-pane" role="tabpanel" aria-labelledby="activity-tab" tabindex="0">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="h5 fw-bold mb-0">System Activity Logs</h3>
                <div>
                    <input type="text" class="form-control form-control-sm" placeholder="Search logs..." style="width: 200px; display: inline-block; margin-right: 10px;">
                    <button class="btn btn-sm btn-outline-secondary">Filter</button>
                </div>
            </div>
            <div class="card border-0 shadow-sm">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Log ID</th>
                                <th>Timestamp</th>
                                <th>User</th>
                                <th>Action</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($activityLogs as $log): ?>
                                <?php
                                $actionBadgeClass = 'bg-secondary';
                                $actionKey = strtolower((string) $log['action']);
                                if ($actionKey === 'user login') { $actionBadgeClass = 'bg-success'; }
                                elseif ($actionKey === 'project updated') { $actionBadgeClass = 'bg-primary'; }
                                elseif ($actionKey === 'material added') { $actionBadgeClass = 'bg-info text-dark'; }
                                elseif ($actionKey === 'user created') { $actionBadgeClass = 'bg-success'; }
                                elseif ($actionKey === 'material modified') { $actionBadgeClass = 'bg-warning text-dark'; }
                                elseif ($actionKey === 'report generated') { $actionBadgeClass = 'bg-info text-dark'; }
                                elseif ($actionKey === 'user deactivated') { $actionBadgeClass = 'bg-danger'; }
                                elseif ($actionKey === 'configuration changed') { $actionBadgeClass = 'bg-primary'; }
                                elseif ($actionKey === 'material deleted') { $actionBadgeClass = 'bg-danger'; }
                                ?>
                                <tr>
                                    <td><code><?php echo htmlspecialchars($log['id'], ENT_QUOTES, 'UTF-8'); ?></code></td>
                                    <td><?php echo htmlspecialchars($log['timestamp'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($log['user'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><span class="badge <?php echo htmlspecialchars($actionBadgeClass, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($log['action'], ENT_QUOTES, 'UTF-8'); ?></span></td>
                                    <td><?php echo htmlspecialchars($log['description'], ENT_QUOTES, 'UTF-8'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Materials Pane -->
        <div class="tab-pane fade" id="materials-pane" role="tabpanel" aria-labelledby="materials-tab" tabindex="0">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="h5 fw-bold mb-0">Materials List</h3>
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <input type="search" id="materialSearch" class="form-control form-control-sm" placeholder="Search materials..." style="width: 220px;">
                    <button class="btn btn-outline-secondary btn-sm">View Archive</button>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addMaterialModal">Add Material</button>
                </div>
            </div>
            <div class="card border-0 shadow-sm">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Material ID</th>
                                <th>Name</th>
                                <th>Service</th>
                                <th>Cost</th>
                                <th>Unit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="materialsTableBody">
                            <?php foreach ($materials as $mat): ?>
                                <tr>
                                    <td><code><?php echo htmlspecialchars($mat['id'], ENT_QUOTES, 'UTF-8'); ?></code></td>
                                    <td><?php echo htmlspecialchars($mat['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><span class="badge bg-info"><?php echo htmlspecialchars($mat['service'], ENT_QUOTES, 'UTF-8'); ?></span></td>
                                    <td>₱<?php echo number_format($mat['cost'], 2); ?></td>
                                    <td><?php echo htmlspecialchars($mat['unit'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-sm btn-primary editMaterialBtn" title="Edit"
                                                data-id="<?php echo htmlspecialchars($mat['id'], ENT_QUOTES, 'UTF-8'); ?>"
                                                data-name="<?php echo htmlspecialchars($mat['name'], ENT_QUOTES, 'UTF-8'); ?>"
                                                data-cost="<?php echo htmlspecialchars($mat['cost'], ENT_QUOTES, 'UTF-8'); ?>"
                                                data-unit="<?php echo htmlspecialchars($mat['unit'], ENT_QUOTES, 'UTF-8'); ?>"
                                                data-service="<?php echo htmlspecialchars($mat['service'], ENT_QUOTES, 'UTF-8'); ?>"
                                                data-bs-toggle="modal" data-bs-target="#editMaterialModal">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger" title="Archive"
                                                data-material-id="<?php echo htmlspecialchars($mat['id'], ENT_QUOTES, 'UTF-8'); ?>"
                                                onclick="archiveMaterial(this)">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- System Settings Pane -->
        <div class="tab-pane fade" id="system-settings-pane" role="tabpanel" aria-labelledby="system-settings-tab" tabindex="0">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="h5 fw-bold mb-0">System Settings</h3>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form id="systemSettingsForm" class="needs-validation" novalidate>
                        <div class="row g-4">

                            <!-- Logo -->
                            <div class="col-lg-4">
                                <div class="border rounded-3 p-3 h-100 bg-light-subtle">
                                    <label for="companyLogoInput" class="form-label fw-semibold">Company Logo</label>
                                    <div class="text-center mb-3">
                                        <img
                                            id="companyLogoPreview"
                                            src="<?php echo htmlspecialchars(($baseUrl !== '' ? $baseUrl : '') . '/assets/img/coliconstruct-logo.svg', ENT_QUOTES, 'UTF-8'); ?>"
                                            alt="Company Logo Preview"
                                            class="img-fluid border rounded bg-white p-2"
                                            style="max-height: 160px; width: auto;"
                                            onerror="this.onerror=null; this.src='<?php echo htmlspecialchars(($baseUrl !== '' ? $baseUrl : '') . '/assets/img/defaultProfile.png', ENT_QUOTES, 'UTF-8'); ?>';"
                                        >
                                    </div>
                                    <input class="form-control form-control-sm" type="file" id="companyLogoInput" accept="image/*">
                                    <div class="small text-muted mt-2">Upload JPG, PNG, or WEBP logo. Preview updates instantly.</div>
                                </div>
                            </div>

                            <!-- Fields -->
                            <div class="col-lg-8">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="companyNameInput" class="form-label">Company Name</label>
                                        <input type="text" class="form-control" id="companyNameInput" value="<?php echo htmlspecialchars($systemSettings['companyName'], ENT_QUOTES, 'UTF-8'); ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="supportEmailInput" class="form-label">Support Email</label>
                                        <input type="email" class="form-control" id="supportEmailInput" value="<?php echo htmlspecialchars($systemSettings['supportEmail'], ENT_QUOTES, 'UTF-8'); ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="contactNumberInput" class="form-label">Contact Number</label>
                                        <input type="text" class="form-control" id="contactNumberInput" value="<?php echo htmlspecialchars($systemSettings['contactNumber'], ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="businessAddressInput" class="form-label">Business Address</label>
                                        <input type="text" class="form-control" id="businessAddressInput" value="<?php echo htmlspecialchars($systemSettings['businessAddress'], ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>

                                    <!-- Services Offered as a list -->
                                    <div class="col-12">
                                        <label class="form-label">Services Offered</label>
                                        <div class="border rounded-3 overflow-hidden">
                                            <ul class="list-group list-group-flush" id="servicesOfferedList">
                                                <?php foreach ($systemSettings['servicesOffered'] as $serviceName): ?>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center service-item"
                                                        data-service-name="<?php echo htmlspecialchars($serviceName, ENT_QUOTES, 'UTF-8'); ?>">
                                                        <span><?php echo htmlspecialchars($serviceName, ENT_QUOTES, 'UTF-8'); ?></span>
                                                        <button type="button" class="btn btn-sm btn-outline-danger service-remove-btn border-0" title="Remove" aria-label="Remove service">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <div class="p-2 bg-light border-top">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" class="form-control" id="serviceNameInput" placeholder="Add a new service...">
                                                    <button type="button" class="btn btn-primary" id="addServiceBtn">
                                                        <i class="bi bi-plus-lg me-1"></i>Add
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="small text-muted mt-1">Add or remove the services available in the system.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4 gap-2">
                            <button type="reset" class="btn btn-outline-secondary" id="resetSystemSettingsBtn">Reset</button>
                            <button type="submit" class="btn btn-primary">Save System Settings</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Material Modal -->
    <div class="modal fade" id="addMaterialModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Material</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label class="form-label">Service</label>
                            <select class="form-select" id="materialService" required>
                                <option value="">Select service</option>
                                <?php foreach ($systemSettings['servicesOffered'] as $serviceName): ?>
                                    <option><?php echo htmlspecialchars($serviceName, ENT_QUOTES, 'UTF-8'); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Material ID</label>
                            <input class="form-control" id="materialID" placeholder="MAT-031" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Material Name</label>
                            <input class="form-control" id="materialName" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Cost (PHP)</label>
                            <input class="form-control" type="number" id="materialCost" min="0" step="0.01" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Unit</label>
                            <input class="form-control" id="materialUnit" placeholder="pcs, meter, liter, etc." required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Material</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input class="form-control" type="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select class="form-select" required>
                                <option value="">Select role</option>
                                <option>Client</option>
                                <option>Admin</option>
                                <option>Technician</option>
                            </select>
                        </div>
                        <button class="btn btn-primary" type="submit">Save User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label class="form-label">User ID</label>
                            <input class="form-control" id="editUserID" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input class="form-control" id="editUserName" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input class="form-control" type="email" id="editUserEmail" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <input class="form-control" id="editUserRole" disabled>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Material Modal -->
    <div class="modal fade" id="editMaterialModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Material Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editMaterialForm" class="needs-validation" novalidate>
                        <div class="mb-3">
                            <label class="form-label">Material ID</label>
                            <input class="form-control" id="editMaterialID" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Service</label>
                            <input class="form-control" id="editMaterialService" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Material Name</label>
                            <input class="form-control" id="editMaterialName" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Cost (PHP)</label>
                            <input class="form-control" type="number" id="editMaterialCost" min="0" step="0.01" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Unit</label>
                            <input class="form-control" id="editMaterialUnit" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // User search
        const userSearch = document.getElementById('userSearch');
        if (userSearch) {
            userSearch.addEventListener('input', function () {
                const query = this.value.toLowerCase().trim();
                ['#staffTableBody tr', '#clientsTableBody tr'].forEach(function (selector) {
                    document.querySelectorAll(selector).forEach(function (row) {
                        row.style.display = row.textContent.toLowerCase().includes(query) ? '' : 'none';
                    });
                });
            });
        }

        // Material search
        const materialSearch = document.getElementById('materialSearch');
        if (materialSearch) {
            materialSearch.addEventListener('input', function () {
                const query = this.value.toLowerCase().trim();
                document.querySelectorAll('#materialsTableBody tr').forEach(function (row) {
                    row.style.display = row.textContent.toLowerCase().includes(query) ? '' : 'none';
                });
            });
        }

        // Edit Material modal population
        document.querySelectorAll('.editMaterialBtn').forEach(btn => {
            btn.addEventListener('click', function () {
                document.getElementById('editMaterialID').value = this.dataset.id;
                document.getElementById('editMaterialService').value = this.dataset.service;
                document.getElementById('editMaterialName').value = this.dataset.name;
                document.getElementById('editMaterialCost').value = this.dataset.cost;
                document.getElementById('editMaterialUnit').value = this.dataset.unit;
            });
        });

        document.getElementById('editMaterialForm').addEventListener('submit', function (e) {
            e.preventDefault();
            alert('Material updated: ' + document.getElementById('editMaterialName').value);
            bootstrap.Modal.getInstance(document.getElementById('editMaterialModal')).hide();
        });

        // Edit User modal population
        document.querySelectorAll('.editUserBtn').forEach(btn => {
            btn.addEventListener('click', function () {
                document.getElementById('editUserID').value = this.dataset.id;
                document.getElementById('editUserName').value = this.dataset.name;
                document.getElementById('editUserEmail').value = this.dataset.email;
                document.getElementById('editUserRole').value = this.dataset.role;
            });
        });

        document.getElementById('editUserForm').addEventListener('submit', function (e) {
            e.preventDefault();
            alert('User updated: ' + document.getElementById('editUserName').value);
            bootstrap.Modal.getInstance(document.getElementById('editUserModal')).hide();
        });

        // Archive material
        function archiveMaterial(btn) {
            const materialId = btn.getAttribute('data-material-id');
            if (confirm('Are you sure you want to archive this material?')) {
                alert('Material ' + materialId + ' has been archived.');
                btn.closest('tr').style.opacity = '0.5';
                btn.disabled = true;
            }
        }

        // Company logo preview
        const companyLogoInput = document.getElementById('companyLogoInput');
        const companyLogoPreview = document.getElementById('companyLogoPreview');
        if (companyLogoInput && companyLogoPreview) {
            companyLogoInput.addEventListener('change', function (event) {
                const file = event.target.files && event.target.files[0] ? event.target.files[0] : null;
                if (!file) return;
                if (!String(file.type || '').startsWith('image/')) {
                    alert('Please upload a valid image file.');
                    companyLogoInput.value = '';
                    return;
                }
                const reader = new FileReader();
                reader.onload = function (loadEvent) {
                    companyLogoPreview.src = String(loadEvent.target && loadEvent.target.result ? loadEvent.target.result : '');
                };
                reader.readAsDataURL(file);
            });
        }

        // Services offered management
        const servicesOfferedList = document.getElementById('servicesOfferedList');
        const serviceNameInput = document.getElementById('serviceNameInput');
        const addServiceBtn = document.getElementById('addServiceBtn');
        const materialServiceSelect = document.getElementById('materialService');
        const servicesOffered = <?php echo json_encode($systemSettings['servicesOffered'], JSON_UNESCAPED_SLASHES); ?>;

        function escapeHtml(value) {
            const container = document.createElement('div');
            container.textContent = value == null ? '' : String(value);
            return container.innerHTML;
        }

        function syncServiceSelect() {
            if (!materialServiceSelect) return;
            const currentValue = materialServiceSelect.value;
            materialServiceSelect.innerHTML = '<option value="">Select service</option>';
            servicesOffered.forEach(function (serviceName) {
                const option = document.createElement('option');
                option.textContent = serviceName;
                materialServiceSelect.appendChild(option);
            });
            materialServiceSelect.value = currentValue;
        }

        function renderServicesOffered() {
            if (!servicesOfferedList) return;
            servicesOfferedList.innerHTML = servicesOffered.map(function (serviceName) {
                return '<li class="list-group-item d-flex justify-content-between align-items-center service-item" data-service-name="' + escapeHtml(serviceName) + '">' +
                    '<span>' + escapeHtml(serviceName) + '</span>' +
                    '<button type="button" class="btn btn-sm btn-outline-danger service-remove-btn border-0" title="Remove" aria-label="Remove service"><i class="bi bi-trash"></i></button>' +
                    '</li>';
            }).join('');
            syncServiceSelect();
        }

        if (addServiceBtn && serviceNameInput) {
            addServiceBtn.addEventListener('click', function () {
                const serviceName = serviceNameInput.value.trim();
                if (!serviceName) return;
                const exists = servicesOffered.some(function (s) {
                    return s.toLowerCase() === serviceName.toLowerCase();
                });
                if (exists) {
                    alert('This service already exists.');
                    return;
                }
                servicesOffered.push(serviceName);
                serviceNameInput.value = '';
                renderServicesOffered();
            });

            serviceNameInput.addEventListener('keydown', function (event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    addServiceBtn.click();
                }
            });
        }

        if (servicesOfferedList) {
            servicesOfferedList.addEventListener('click', function (event) {
                const removeButton = event.target.closest('.service-remove-btn');
                if (!removeButton) return;
                const serviceItem = removeButton.closest('.service-item');
                if (!serviceItem) return;
                const serviceName = serviceItem.getAttribute('data-service-name') || '';
                const index = servicesOffered.findIndex(function (s) { return s === serviceName; });
                if (index > -1) {
                    servicesOffered.splice(index, 1);
                    renderServicesOffered();
                }
            });
        }

        // System settings form submit
        const systemSettingsForm = document.getElementById('systemSettingsForm');
        if (systemSettingsForm) {
            systemSettingsForm.addEventListener('submit', function (event) {
                event.preventDefault();
                const companyNameInput = document.getElementById('companyNameInput');
                const supportEmailInput = document.getElementById('supportEmailInput');
                if (!companyNameInput || !supportEmailInput) return;
                if (!companyNameInput.value.trim() || !supportEmailInput.value.trim()) {
                    alert('Company name and support email are required.');
                    return;
                }
                alert('System settings saved for ' + companyNameInput.value.trim() + '.');
            });
        }

        // Reset logo on form reset
        const resetSystemSettingsBtn = document.getElementById('resetSystemSettingsBtn');
        if (resetSystemSettingsBtn && systemSettingsForm) {
            resetSystemSettingsBtn.addEventListener('click', function () {
                setTimeout(function () {
                    const logoPreview = document.getElementById('companyLogoPreview');
                    if (logoPreview) {
                        logoPreview.src = '<?php echo htmlspecialchars(($baseUrl !== '' ? $baseUrl : '') . '/assets/img/coliconstruct-logo.svg', ENT_QUOTES, 'UTF-8'); ?>';
                    }
                }, 0);
            });
        }

        renderServicesOffered();
    </script>
</main>
<?php include __DIR__ . '/../../includes/footer.php'; ?>