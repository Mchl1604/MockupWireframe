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
                        <p class="text-muted mb-1 small">Total Projects</p>
                        <h3 class="mb-0">6</h3>
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
                        <p class="text-muted mb-1 small">Pending Approval</p>
                        <h3 class="mb-0">2</h3>
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

    <div class="row g-3">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white d-flex align-items-center justify-content-between">
                    <strong>Service Requests Trend</strong>
                    <span class="small text-muted">Last 6 months</span>
                </div>
                <div class="card-body">
                    <canvas id="requestsTrendChart" height="120"></canvas>
                </div>
            </div>
        </div>
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
    </div>
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
                        data: [8, 11, 9, 13, 10, 15],
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
