<?php $pageTitle = 'Admin Dashboard'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>

<main class="container py-4 flex-grow-1">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
        <h2 class="h4 fw-bold mb-0">Dashboard</h2>
        <span class="badge text-bg-light border">Today: <?php echo htmlspecialchars(date('M d, Y'), ENT_QUOTES, 'UTF-8'); ?></span>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm stat-card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="stat-icon text-primary">
                        <i class="bi bi-folder2-open"></i>
                    </div>
                    <div>
                        <p class="text-muted mb-1 small">Ongoing Projects</p>
                        <h3 class="mb-0">2</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm stat-card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="stat-icon text-warning">
                        <i class="bi bi-hourglass-split"></i>
                    </div>
                    <div>
                        <p class="text-muted mb-1 small">Scheduled Projects</p>
                        <h3 class="mb-0">5</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm stat-card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="stat-icon text-success">
                        <i class="bi bi-person-workspace"></i>
                    </div>
                    <div>
                        <p class="text-muted mb-1 small">Active Technicians</p>
                        <h3 class="mb-0">6</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white">
                    <strong>Project Status Distribution</strong>
                </div>
                <div class="card-body">
                    <canvas id="statusBreakdownChart" height="240"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white d-flex align-items-center justify-content-between">
                    <strong>Pending Requests</strong>
                    <a href="/pages/admin/requests.php" class="small text-primary text-decoration-none">View All</a>
                </div>
                <div class="card-body">
                    <div class="pending-requests">
                        <div class="request-item d-flex justify-content-between align-items-start py-2 border-bottom">
                            <div>
                                <p class="small fw-bold mb-1">Aircon Installation</p>
                                <p class="text-muted small mb-0">New Building Corp - Commercial</p>
                            </div>
                            <span class="badge text-bg-warning">Pending</span>
                        </div>
                        <div class="request-item d-flex justify-content-between align-items-start py-2 border-bottom">
                            <div>
                                <p class="small fw-bold mb-1">Aircon Repair</p>
                                <p class="text-muted small mb-0">Metro Center - Commercial</p>
                            </div>
                            <span class="badge text-bg-warning">Pending</span>
                        </div>
                        <div class="request-item d-flex justify-content-between align-items-start pt-2">
                            <div>
                                <p class="small fw-bold mb-1">Ducting Installation</p>
                                <p class="text-muted small mb-0">Prime Office Space - Commercial</p>
                            </div>
                            <span class="badge text-bg-warning">Pending</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white d-flex align-items-center justify-content-between">
                    <strong>Recent Activity</strong>
                    <a href="/pages/admin/reports.php" class="small text-primary text-decoration-none">View All</a>
                </div>
                <div class="card-body">
                    <div class="activity-feed">
                        <div class="activity-item d-flex gap-3 pb-3 border-bottom">
                            <div class="activity-badge bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="min-width: 40px; height: 40px;">
                                <i class="bi bi-check-circle"></i>
                            </div>
                            <div class="flex-grow-1">
                                <p class="mb-1 small"><strong>Project Completed</strong></p>
                                <p class="text-muted small mb-1">PRJ-1002 - Aircon Repair completed by Tech. Lito Ramos</p>
                                <span class="text-muted small">Apr 18, 2026 - 2:30 PM</span>
                            </div>
                        </div>
                        <div class="activity-item d-flex gap-3 py-3 border-bottom">
                            <div class="activity-badge bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="min-width: 40px; height: 40px;">
                                <i class="bi bi-file-earmark-text"></i>
                            </div>
                            <div class="flex-grow-1">
                                <p class="mb-1 small"><strong>Progress Report Submitted</strong></p>
                                <p class="text-muted small mb-1">PRJ-1001 - Installation progress report by Tech. Carlo Reyes</p>
                                <span class="text-muted small">Apr 18, 2026 - 1:15 PM</span>
                            </div>
                        </div>
                        <div class="activity-item d-flex gap-3 py-3 border-bottom">
                            <div class="activity-badge bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center" style="min-width: 40px; height: 40px;">
                                <i class="bi bi-exclamation-circle"></i>
                            </div>
                            <div class="flex-grow-1">
                                <p class="mb-1 small"><strong>Incident Report</strong></p>
                                <p class="text-muted small mb-1">PRJ-1001 - Minor delay due to access restrictions (resolved)</p>
                                <span class="text-muted small">Apr 15, 2026 - 10:45 AM</span>
                            </div>
                        </div>
                        <div class="activity-item d-flex gap-3 py-3 border-bottom">
                            <div class="activity-badge bg-info text-white rounded-circle d-flex align-items-center justify-content-center" style="min-width: 40px; height: 40px;">
                                <i class="bi bi-calendar-check"></i>
                            </div>
                            <div class="flex-grow-1">
                                <p class="mb-1 small"><strong>Schedule Updated</strong></p>
                                <p class="text-muted small mb-1">PRJ-1003 - Technician assignment updated</p>
                                <span class="text-muted small">Apr 14, 2026 - 9:20 AM</span>
                            </div>
                        </div>
                        <div class="activity-item d-flex gap-3 pt-3">
                            <div class="activity-badge bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center" style="min-width: 40px; height: 40px;">
                                <i class="bi bi-person-plus"></i>
                            </div>
                            <div class="flex-grow-1">
                                <p class="mb-1 small"><strong>New Request Created</strong></p>
                                <p class="text-muted small mb-1">Aircon Installation request - ACME Holdings</p>
                                <span class="text-muted small">Apr 13, 2026 - 3:00 PM</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-header bg-white">
                    <strong>Upcoming This Week</strong>
                </div>
                <div class="card-body">
                    <div class="upcoming-list">
                        <div class="upcoming-item pb-2 mb-2 border-bottom">
                            <div class="d-flex justify-content-between align-items-start mb-1">
                                <p class="small fw-bold mb-0">PRJ-1001</p>
                                <span class="badge text-bg-primary">Apr 21</span>
                            </div>
                            <p class="text-muted small mb-0">Aircon Installation - ACME Holdings</p>
                        </div>
                        <div class="upcoming-item pb-2 mb-2 border-bottom">
                            <div class="d-flex justify-content-between align-items-start mb-1">
                                <p class="small fw-bold mb-0">PRJ-1003</p>
                                <span class="badge text-bg-warning">Apr 22-23</span>
                            </div>
                            <p class="text-muted small mb-0">Ducting Installation - Metro Storage</p>
                        </div>
                        <div class="upcoming-item pb-2 mb-2 border-bottom">
                            <div class="d-flex justify-content-between align-items-start mb-1">
                                <p class="small fw-bold mb-0">PRJ-1005</p>
                                <span class="badge text-bg-info">Apr 24-28</span>
                            </div>
                            <p class="text-muted small mb-0">Ducting Fabrication - BluePeak IT</p>
                        </div>
                        <div class="upcoming-item pt-2">
                            <div class="d-flex justify-content-between align-items-start mb-1">
                                <p class="small fw-bold mb-0">PRJ-1006</p>
                                <span class="badge text-bg-danger">Apr 24-30</span>
                            </div>
                            <p class="text-muted small mb-0">Ducting Installation - Grand Arc Tower</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <strong>Quick Actions</strong>
                </div>
                <div class="card-body d-flex flex-column gap-2">
                    
                    <a href="/pages/admin/quotations.php" class="btn btn-outline-primary btn-sm d-flex align-items-center justify-content-center gap-2">
                        <i class="bi bi-file-earmark-plus"></i>New Quotation
                    </a>
                    <a href="/pages/admin/project.php" class="btn btn-outline-primary btn-sm d-flex align-items-center justify-content-center gap-2">
                        <i class="bi bi-folder-plus"></i>New Project
                    </a>
                    <a href="/pages/admin/schedules.php" class="btn btn-outline-primary btn-sm d-flex align-items-center justify-content-center gap-2">
                        <i class="bi bi-calendar-plus"></i>View Schedule
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white d-flex align-items-center justify-content-between">
                    <strong>Technician Availability</strong>
                    <a href="/pages/admin/technicians.php" class="small text-primary text-decoration-none">View All</a>
                </div>
                <div class="card-body">
                    <div class="technician-status">
                        <div class="technician-item d-flex align-items-center justify-content-between py-2 border-bottom">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-success rounded-circle" style="width: 12px; height: 12px;"></span>
                                <p class="small mb-0">Tech. Carlo Reyes</p>
                            </div>
                            <span class="badge text-bg-light border">Available</span>
                        </div>
                        <div class="technician-item d-flex align-items-center justify-content-between py-2 border-bottom">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-warning rounded-circle" style="width: 12px; height: 12px;"></span>
                                <p class="small mb-0">Tech. Lito Ramos</p>
                            </div>
                            <span class="badge text-bg-light border">On Project</span>
                        </div>
                        <div class="technician-item d-flex align-items-center justify-content-between py-2 border-bottom">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-success rounded-circle" style="width: 12px; height: 12px;"></span>
                                <p class="small mb-0">Tech. Anne Mendoza</p>
                            </div>
                            <span class="badge text-bg-light border">Available</span>
                        </div>
                        <div class="technician-item d-flex align-items-center justify-content-between py-2 border-bottom">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-warning rounded-circle" style="width: 12px; height: 12px;"></span>
                                <p class="small mb-0">Tech. Carl Dominguez</p>
                            </div>
                            <span class="badge text-bg-light border">On Project</span>
                        </div>
                        <div class="technician-item d-flex align-items-center justify-content-between py-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-success rounded-circle" style="width: 12px; height: 12px;"></span>
                                <p class="small mb-0">Tech. John Gonzales</p>
                            </div>
                            <span class="badge text-bg-light border">Available</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white d-flex align-items-center justify-content-between">
                    <strong>Projects Completed</strong>
                    <span class="small text-muted">Last 6 months</span>
                </div>
                <div class="card-body">
                    <canvas id="requestsTrendChart" height="120"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3">
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof Chart === 'undefined') return;

    const trendCtx = document.getElementById('requestsTrendChart');
    const statusCtx = document.getElementById('statusBreakdownChart');

    if (trendCtx) {
        new Chart(trendCtx, {
            type: 'bar',
            data: {
                labels: ['Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr'],
                datasets: [
                    {
                        label: 'Requests',
                        data: [8, 9, 9, 10, 10, 4],
                        backgroundColor: 'rgba(37, 99, 235, 0.75)',
                        borderRadius: 8,
                        maxBarThickness: 34
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { precision: 0 }
                    }
                }
            }
        });
    }

    if (statusCtx) {
        new Chart(statusCtx, {
            type: 'doughnut',
            data: {
                labels: ['For Approval', 'For Assessment', 'Pending', 'Ongoing', 'Completed'],
                datasets: [
                    {
                        data: [1, 1, 1, 2, 1],
                        backgroundColor: ['#f59e0b', '#0ea5e9', '#64748b', '#2563eb', '#16a34a'],
                        borderWidth: 0
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            boxWidth: 8,
                            padding: 14
                        }
                    }
                },
                cutout: '68%'
            }
        });
    }
});
</script>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
