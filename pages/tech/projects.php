<?php $pageTitle = 'My Projects'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<?php
$projects = [
    ['id' => 'PRJ-1001', 'name' => 'Aircon Installation - ACME Holdings', 'status' => 'For Assessment', 'timeline' => 'Apr 14, 2026'],
    ['id' => 'PRJ-1003', 'name' => 'Ducting Installation - Metro Storage', 'status' => 'Ongoing', 'timeline' => 'Apr 15 - Apr 25, 2026'],
    ['id' => 'PRJ-1004', 'name' => 'Aircon Installation - Northline Foods', 'status' => 'Assigned', 'timeline' => 'Apr 27 - Apr 30, 2026'],
    ['id' => 'PRJ-1005', 'name' => 'Ducting Fabrication - BluePeak IT', 'status' => 'Assigned', 'timeline' => 'May 01 - May 10, 2026'],
];

$statusClassMap = [
    'ongoing' => 'text-bg-primary',
    'scheduled' => 'text-bg-info',
    'completed' => 'text-bg-success',
    'pending' => 'text-bg-danger',
    'for assessment' => 'text-bg-warning',
    'drafting quotation' => 'text-bg-secondary',
    'quotation to be approved' => 'text-bg-warning',
    'in progress' => 'text-bg-success',
    'assigned' => 'text-bg-primary',
];
?>
<main class="container py-4 flex-grow-1">
    <h2 class="h4 fw-bold mb-3">My Projects</h2>
    <div class="card border-0 shadow-sm">
        <div class="card-body pb-0">
            <ul class="nav nav-tabs" id="projectTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="assessment-tab" data-bs-toggle="tab" data-bs-target="#assessment-pane" type="button" role="tab" aria-controls="assessment-pane" aria-selected="true">
                        Assessment
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="ongoing-tab" data-bs-toggle="tab" data-bs-target="#ongoing-pane" type="button" role="tab" aria-controls="ongoing-pane" aria-selected="false">
                        Ongoing
                    </button>
                </li>
            </ul>
        </div>

        <div class="tab-content p-3 pt-2">
            <div class="tab-pane fade show active" id="assessment-pane" role="tabpanel" aria-labelledby="assessment-tab" tabindex="0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light"><tr><th>ID</th><th>Project</th><th>Schedule</th><th>Action</th></tr></thead>
                        <tbody id="assessmentProjectsBody"></tbody>
                    </table>
                </div>
                <p class="text-muted small mb-0 mt-3 d-none" id="assessmentEmpty">No assessment projects.</p>
            </div>

            <div class="tab-pane fade" id="ongoing-pane" role="tabpanel" aria-labelledby="ongoing-tab" tabindex="0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light"><tr><th>ID</th><th>Project</th><th>Schedule</th><th>Status</th><th>Action</th></tr></thead>
                        <tbody id="ongoingProjectsBody"></tbody>
                    </table>
                </div>
                <p class="text-muted small mb-0 mt-3 d-none" id="ongoingEmpty">No ongoing projects.</p>
            </div>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const projectDetailsBaseUrl = <?php echo json_encode(app_url('/tech/project'), JSON_UNESCAPED_SLASHES); ?>;
    const statusClassMap = <?php echo json_encode($statusClassMap, JSON_UNESCAPED_SLASHES); ?>;
    const projects = <?php echo json_encode($projects, JSON_UNESCAPED_SLASHES); ?>;

    const assessmentProjectsBody = document.getElementById('assessmentProjectsBody');
    const ongoingProjectsBody = document.getElementById('ongoingProjectsBody');
    const assessmentEmpty = document.getElementById('assessmentEmpty');
    const ongoingEmpty = document.getElementById('ongoingEmpty');

    function escapeHtml(value) {
        return String(value || '')
            .replaceAll('&', '&amp;')
            .replaceAll('<', '&lt;')
            .replaceAll('>', '&gt;')
            .replaceAll('"', '&quot;')
            .replaceAll("'", '&#39;');
    }

    function getStatusKey(status) {
        return String(status || '').toLowerCase().trim();
    }

    function getTabKeyByStatus(status) {
        const statusKey = getStatusKey(status);
        if (statusKey === 'for assessment') {
            return 'assessment';
        }
        return 'ongoing';
    }

    function buildProjectRow(project, showStatus) {
        const statusKey = getStatusKey(project.status);
        const badgeClass = statusClassMap[statusKey] || 'text-bg-light';
        const querySeparator = projectDetailsBaseUrl.includes('?') ? '&' : '?';
        const detailsHref = projectDetailsBaseUrl + querySeparator + 'id=' + encodeURIComponent(project.id) + '&status=' + encodeURIComponent(project.status);

        return '<tr>'
            + '<td>' + escapeHtml(project.id) + '</td>'
            + '<td>' + escapeHtml(project.name) + '</td>'
            + '<td>' + escapeHtml(project.timeline || 'TBD') + '</td>'
            + (showStatus ? '<td><span class="badge rounded-pill ' + escapeHtml(badgeClass) + '">' + escapeHtml(project.status) + '</span></td>' : '')
            + '<td>'
            + '<a class="btn btn-sm btn-outline-primary" title="View Details" aria-label="View Details" href="' + detailsHref + '"><i class="bi bi-eye"></i></a>'
            + '</td>'
            + '</tr>';
    }

    function renderProjectTabs() {
        const buckets = {
            assessment: [],
            ongoing: []
        };

        projects.forEach(function (project) {
            buckets[getTabKeyByStatus(project.status)].push(project);
        });

        assessmentProjectsBody.innerHTML = buckets.assessment.map(function (project) {
            return buildProjectRow(project, false);
        }).join('');
        ongoingProjectsBody.innerHTML = buckets.ongoing.map(function (project) {
            return buildProjectRow(project, true);
        }).join('');

        assessmentEmpty.classList.toggle('d-none', buckets.assessment.length > 0);
        ongoingEmpty.classList.toggle('d-none', buckets.ongoing.length > 0);
    }

    renderProjectTabs();
});
</script>

<?php include __DIR__ . '/../../includes/footer.php'; ?>


