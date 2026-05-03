<?php $pageTitle = 'Service Requests'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<?php
$requests = [
    [
        'id' => 'REQ-001',
        'client' => 'ACME Holdings',
        'service' => 'Aircon Installation',
        'date' => 'Apr 12, 2026',
        'status' => 'Pending',
        'address' => 'Blk 4 Lot 5 Konsehales St. Makati Business Park',
        'phone' => '09171234567',
        'description' => 'Install three 2.5HP split-type AC units for office rooms.',
    ],
    [
        'id' => 'REQ-002',
        'client' => 'J. Dela Cruz',
        'service' => 'Aircon Repair',
        'date' => 'Apr 13, 2026',
        'status' => 'Approved',
        'address' => 'Taguig City, Metro Manila',
        'phone' => '09981231234',
        'description' => 'Unit is not cooling and has intermittent power issue.',
    ],
    [
        'id' => 'REQ-003',
        'client' => 'Metro Storage',
        'service' => 'Ducting Installation',
        'date' => 'Apr 14, 2026',
        'status' => 'Rejected',
        'address' => 'Caloocan Industrial Estate',
        'phone' => '09223334444',
        'description' => 'Ducting fabrication and installation for warehouse zone B.',
    ],
    [
        'id' => 'REQ-004',
        'client' => 'Northpoint Suites',
        'service' => 'Aircon Cleaning',
        'date' => 'Apr 15, 2026',
        'status' => 'Pending',
        'address' => 'Quezon Avenue, Quezon City',
        'phone' => '09175550123',
        'description' => 'Quarterly Aircon Cleaning for lobby and function hall units.',
    ],
    [
        'id' => 'REQ-005',
        'client' => 'Prime Logistic Hub',
        'service' => 'Aircon Cleaning',
        'date' => 'Apr 16, 2026',
        'status' => 'Pending',
        'address' => 'Valenzuela Logistics Park',
        'phone' => '09178884567',
        'description' => 'Chemical cleaning for five split-type units in dispatch office.',
    ],
];
?>
<main class="container py-4 flex-grow-1">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <h2 class="h4 fw-bold mb-0">Service Requests</h2>
        <div class="d-flex flex-nowrap align-items-center gap-2 ms-auto">
            
            <input type="search" id="requestSearch" class="form-control form-control-sm" placeholder="Search requests..." style="width: 280px; max-width: 100%;">
            <a class="btn btn-danger btn-sm" href="<?php echo htmlspecialchars(app_url('/admin/requests', ['view' => 'archives']), ENT_QUOTES, 'UTF-8'); ?>">View Archives</a>
        </div>
    </div>
    <div class="table-responsive card border-0 shadow-sm">
        <table class="table table-hover mb-0">
            <thead class="table-light"><tr><th>ID</th><th>Client</th><th>Service</th><th>Assessment Date</th><th>Status</th><th class="text-start">Action</th></tr></thead>
            <tbody id="requestsTableBody">
            <?php foreach ($requests as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($item['client'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($item['service'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($item['date'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <span class="badge request-status-badge <?php echo $item['status'] === 'Pending' ? 'bg-warning text-dark' : ($item['status'] === 'Approved' ? 'bg-success' : 'bg-danger'); ?>">
                            <?php echo htmlspecialchars($item['status'], ENT_QUOTES, 'UTF-8'); ?>
                        </span>
                    </td>
                    <td class="text-start">
                        <div class="d-flex justify-content-start flex-wrap gap-1">
                            <button type="button" class="btn btn-primary btn-sm" title="View Details" aria-label="View Details" data-request='<?php echo htmlspecialchars(json_encode($item), ENT_QUOTES, 'UTF-8'); ?>'><i class="bi bi-eye"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" title="Archive" aria-label="Archive" data-request-action="archive"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="requestModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header">
                    <h5 class="modal-title">Request Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6"><small class="text-muted d-block">Request ID</small><strong id="req-id"></strong></div>
                        <div class="col-md-6"><small class="text-muted d-block">Client</small><strong id="req-client"></strong></div>
                        <div class="col-md-6"><small class="text-muted d-block">Service</small><strong id="req-service"></strong></div>
                        <div class="col-md-6"><small class="text-muted d-block">Assessment Date</small><strong id="req-date"></strong></div>
                        <div class="col-md-6"><small class="text-muted d-block">Phone</small><strong id="req-phone"></strong></div>
                        <div class="col-md-6"><small class="text-muted d-block">Address</small><strong id="req-address"></strong></div>
                        <div class="col-12"><small class="text-muted d-block">Description</small><p class="mb-0" id="req-desc"></p></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="gap-2" id="reqPendingActions" hidden>
                        <button type="button" class="btn btn-danger btn-sm" data-modal-request-action="reject">Reject</button>
                        <button type="button" class="btn btn-success btn-sm" data-modal-request-action="approve">Approve</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    function statusClasses(status) {
        if (status === 'Approved') return 'badge request-status-badge bg-success';
        if (status === 'Rejected') return 'badge request-status-badge bg-danger';
        return 'badge request-status-badge bg-warning text-dark';
    }

    const requestSearch = document.getElementById('requestSearch');
    const requestsTableBody = document.getElementById('requestsTableBody');
    const requestModalEl = document.getElementById('requestModal');
    const reqPendingActions = document.getElementById('reqPendingActions');
    const reqId = document.getElementById('req-id');
    const reqClient = document.getElementById('req-client');
    const reqService = document.getElementById('req-service');
    const reqDate = document.getElementById('req-date');
    const reqPhone = document.getElementById('req-phone');
    const reqAddress = document.getElementById('req-address');
    const reqDesc = document.getElementById('req-desc');

    let activeRow = null;
    let requestModal = null;

    if (requestModalEl && typeof bootstrap !== 'undefined') {
        requestModal = bootstrap.Modal.getOrCreateInstance(requestModalEl);
    }

    function cleanupModalArtifacts() {
        const hasOpenModal = document.querySelector('.modal.show') !== null;
        if (hasOpenModal) return;

        document.querySelectorAll('.modal-backdrop').forEach(function (backdrop) {
            backdrop.remove();
        });

        document.body.classList.remove('modal-open');
        document.body.style.removeProperty('overflow');
        document.body.style.removeProperty('padding-right');
    }

    function isPendingStatus(status) {
        const normalized = String(status || '').trim().toLowerCase();
        return normalized === 'pending';
    }

    function fillRequestModal(request) {
        if (reqId) reqId.textContent = request.id || '';
        if (reqClient) reqClient.textContent = request.client || '';
        if (reqService) reqService.textContent = request.service || '';
        if (reqDate) reqDate.textContent = request.date || '';
        if (reqPhone) reqPhone.textContent = request.phone || '';
        if (reqAddress) reqAddress.textContent = request.address || '';
        if (reqDesc) reqDesc.textContent = request.description || '';

        if (reqPendingActions) {
            const showPendingActions = isPendingStatus(request.status);
            reqPendingActions.hidden = !showPendingActions;
            reqPendingActions.classList.toggle('d-inline-flex', showPendingActions);
        }
    }

    function updateRowStatus(row, nextStatus) {
        const badge = row ? row.querySelector('.request-status-badge') : null;
        if (badge) {
            badge.textContent = nextStatus;
            badge.className = statusClasses(nextStatus);
        }

        const viewButton = row ? row.querySelector('button[data-request]') : null;
        if (viewButton) {
            const request = JSON.parse(viewButton.dataset.request || '{}');
            request.status = nextStatus;
            viewButton.dataset.request = JSON.stringify(request);
        }
    }

    if (requestSearch) {
        requestSearch.addEventListener('input', function () {
            const query = this.value.toLowerCase().trim();
            document.querySelectorAll('#requestsTableBody tr').forEach(function (row) {
                row.style.display = row.textContent.toLowerCase().includes(query) ? '' : 'none';
            });
        });
    }

    if (requestModalEl) {
        requestModalEl.addEventListener('hidden.bs.modal', cleanupModalArtifacts);
    }

    if (requestsTableBody) {
        requestsTableBody.addEventListener('click', function (event) {
            const viewButton = event.target.closest('button[data-request]');
            if (viewButton) {
                const row = viewButton.closest('tr');
                const request = JSON.parse(viewButton.dataset.request || '{}');
                activeRow = row;
                fillRequestModal(request);
                cleanupModalArtifacts();
                if (requestModal) requestModal.show();
                return;
            }

            const actionButton = event.target.closest('button[data-request-action]');
            if (!actionButton) return;

            const row = actionButton.closest('tr');
            if (!row) return;

            const action = actionButton.dataset.requestAction;
            if (action === 'archive') {
                row.remove();
                if (activeRow === row) {
                    activeRow = null;
                    if (requestModal) requestModal.hide();
                    cleanupModalArtifacts();
                }
            }
        });
    }

    if (reqPendingActions) {
        reqPendingActions.addEventListener('click', function (event) {
            const actionButton = event.target.closest('button[data-modal-request-action]');
            if (!actionButton || !activeRow) return;

            const nextStatus = actionButton.dataset.modalRequestAction === 'approve' ? 'Approved' : 'Rejected';
            updateRowStatus(activeRow, nextStatus);
            const updatedViewButton = activeRow.querySelector('button[data-request]');
            if (updatedViewButton) {
                const updatedRequest = JSON.parse(updatedViewButton.dataset.request || '{}');
                fillRequestModal(updatedRequest);
            }
        });
    }
});
</script>
<?php include __DIR__ . '/../../includes/footer.php'; ?>


