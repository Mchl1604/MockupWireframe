<?php $pageTitle = 'My Projects'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<?php
$projects = [
    ['id' => 'PRJ-1001', 'name' => 'Aircon Installation - ACME Holdings', 'status' => 'For Assessment', 'timeline' => 'Apr 14, 2026'],
    ['id' => 'PRJ-1003', 'name' => 'Ducting Installation - Metro Storage', 'status' => 'In Progress', 'timeline' => 'Apr 15 - Apr 25, 2026'],
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
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed-pane" type="button" role="tab" aria-controls="completed-pane" aria-selected="false">
                        Completed
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

            <div class="tab-pane fade" id="completed-pane" role="tabpanel" aria-labelledby="completed-tab" tabindex="0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light"><tr><th>ID</th><th>Project</th><th>Timeline</th><th>Action</th></tr></thead>
                        <tbody id="completedProjectsBody"></tbody>
                    </table>
                </div>
                <p class="text-muted small mb-0 mt-3 d-none" id="completedEmpty">No completed projects yet.</p>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="completionReportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header">
                <h5 class="modal-title">Completion Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <div class="mb-3">
                    <label for="completionReportDescription" class="form-label">Completion Report Description</label>
                    <textarea class="form-control" id="completionReportDescription" rows="5" placeholder="Describe the completed work, issues resolved, and final notes..."></textarea>
                </div>
                <div class="mb-0">
                    <label for="completionReportPhotos" class="form-label">Pictures</label>
                    <input class="form-control" type="file" id="completionReportPhotos" accept="image/*" multiple>
                    <div class="form-text">You can attach one or more pictures.</div>
                </div>
                <input type="hidden" id="completionProjectId" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="saveCompletionReportBtn">Save Completion Report</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const projectDetailsBaseUrl = <?php echo json_encode(app_url('/lead-technician/project'), JSON_UNESCAPED_SLASHES); ?>;
    const statusClassMap = <?php echo json_encode($statusClassMap, JSON_UNESCAPED_SLASHES); ?>;
    const projects = <?php echo json_encode($projects, JSON_UNESCAPED_SLASHES); ?>;

    const assessmentProjectsBody = document.getElementById('assessmentProjectsBody');
    const ongoingProjectsBody = document.getElementById('ongoingProjectsBody');
    const completedProjectsBody = document.getElementById('completedProjectsBody');
    const assessmentEmpty = document.getElementById('assessmentEmpty');
    const ongoingEmpty = document.getElementById('ongoingEmpty');
    const completedEmpty = document.getElementById('completedEmpty');

    const completionProjectId = document.getElementById('completionProjectId');
    const completionReportDescription = document.getElementById('completionReportDescription');
    const completionReportPhotos = document.getElementById('completionReportPhotos');
    const saveCompletionReportBtn = document.getElementById('saveCompletionReportBtn');
    const completionReportModalEl = document.getElementById('completionReportModal');

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
        if (statusKey === 'completed') {
            return 'completed';
        }
        return 'ongoing';
    }

    function buildProjectRow(project, showStatus) {
        const statusKey = getStatusKey(project.status);
        const badgeClass = statusClassMap[statusKey] || 'text-bg-light';
        const detailsHref = projectDetailsBaseUrl + '&id=' + encodeURIComponent(project.id) + '&status=' + encodeURIComponent(project.status);
        const canMarkCompleted = statusKey === 'in progress';

        return '<tr>'
            + '<td>' + escapeHtml(project.id) + '</td>'
            + '<td>' + escapeHtml(project.name) + '</td>'
            + '<td>' + escapeHtml(project.timeline || 'TBD') + '</td>'
            + (showStatus ? '<td><span class="badge rounded-pill ' + escapeHtml(badgeClass) + '">' + escapeHtml(project.status) + '</span></td>' : '')
            + '<td>'
            + '<a class="btn btn-sm btn-outline-primary" title="View Details" aria-label="View Details" href="' + detailsHref + '"><i class="bi bi-eye"></i></a>'
            + (canMarkCompleted
                ? '<button type="button" class="btn btn-sm btn-success ms-2 mark-completed-btn" data-project-id="' + escapeHtml(project.id) + '" data-bs-toggle="modal" data-bs-target="#completionReportModal">Completed</button>'
                : '')
            + '</td>'
            + '</tr>';
    }

    function renderProjectTabs() {
        const buckets = {
            assessment: [],
            ongoing: [],
            completed: []
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
        completedProjectsBody.innerHTML = buckets.completed.map(function (project) {
            return buildProjectRow(project, false);
        }).join('');

        assessmentEmpty.classList.toggle('d-none', buckets.assessment.length > 0);
        ongoingEmpty.classList.toggle('d-none', buckets.ongoing.length > 0);
        completedEmpty.classList.toggle('d-none', buckets.completed.length > 0);
    }

    function setProjectForCompletion(projectId) {
        if (!completionProjectId) {
            return;
        }
        completionProjectId.value = projectId;
    }

    function markSelectedProjectCompleted() {
        const selectedProjectId = completionProjectId ? completionProjectId.value : '';
        if (!selectedProjectId) {
            return;
        }

        const matchedProject = projects.find(function (project) {
            return project.id === selectedProjectId;
        });

        if (!matchedProject) {
            return;
        }

        matchedProject.status = 'Completed';
        renderProjectTabs();

        if (completionReportDescription) {
            completionReportDescription.value = '';
        }
        if (completionReportPhotos) {
            completionReportPhotos.value = '';
        }
        if (completionProjectId) {
            completionProjectId.value = '';
        }

        if (completionReportModalEl && window.bootstrap && window.bootstrap.Modal) {
            const modalInstance = window.bootstrap.Modal.getOrCreateInstance(completionReportModalEl);
            modalInstance.hide();
        }

        const completedTab = document.getElementById('completed-tab');
        if (completedTab && window.bootstrap && window.bootstrap.Tab) {
            const completedTabInstance = window.bootstrap.Tab.getOrCreateInstance(completedTab);
            completedTabInstance.show();
        }
    }

    ongoingProjectsBody.addEventListener('click', function (event) {
        const triggerButton = event.target.closest('.mark-completed-btn');
        if (!triggerButton) {
            return;
        }

        setProjectForCompletion(triggerButton.getAttribute('data-project-id') || '');
    });

    if (saveCompletionReportBtn) {
        saveCompletionReportBtn.addEventListener('click', markSelectedProjectCompleted);
    }

    renderProjectTabs();
});
</script>

<?php include __DIR__ . '/../../includes/footer.php'; ?>


