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
        'service' => 'AC Installation',
        'date' => 'Apr 12, 2026',
        'status' => 'Pending',
        'address' => 'Makati Business Park',
        'phone' => '09171234567',
        'description' => 'Install three 2.5HP split-type AC units for office rooms.',
    ],
    [
        'id' => 'REQ-002',
        'client' => 'J. Dela Cruz',
        'service' => 'AC Repair',
        'date' => 'Apr 13, 2026',
        'status' => 'Approved',
        'address' => 'Taguig City, Metro Manila',
        'phone' => '09981231234',
        'description' => 'Unit is not cooling and has intermittent power issue.',
    ],
    [
        'id' => 'REQ-003',
        'client' => 'Metro Storage',
        'service' => 'Ducting',
        'date' => 'Apr 14, 2026',
        'status' => 'Rejected',
        'address' => 'Caloocan Industrial Estate',
        'phone' => '09223334444',
        'description' => 'Ducting fabrication and installation for warehouse zone B.',
    ],
    [
        'id' => 'REQ-004',
        'client' => 'Northpoint Suites',
        'service' => 'Preventive Maintenance',
        'date' => 'Apr 15, 2026',
        'status' => 'Pending',
        'address' => 'Quezon Avenue, Quezon City',
        'phone' => '09175550123',
        'description' => 'Quarterly preventive maintenance for lobby and function hall units.',
    ],
    [
        'id' => 'REQ-005',
        'client' => 'Prime Logistic Hub',
        'service' => 'AC Cleaning',
        'date' => 'Apr 16, 2026',
        'status' => 'Pending',
        'address' => 'Valenzuela Logistics Park',
        'phone' => '09178884567',
        'description' => 'Chemical cleaning for five split-type units in dispatch office.',
    ],
];
?>
<main class="container py-4 flex-grow-1">
    <h2 class="h4 fw-bold mb-3">Service Requests</h2>
    <div class="table-responsive card border-0 shadow-sm">
        <table class="table table-hover mb-0">
            <thead class="table-light"><tr><th>ID</th><th>Client</th><th>Service</th><th>Date</th><th>Status</th><th class="text-end">Action</th></tr></thead>
            <tbody>
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
                    <td class="text-end">
                        <div class="d-flex justify-content-end flex-wrap gap-1">
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-request='<?php echo htmlspecialchars(json_encode($item), ENT_QUOTES, 'UTF-8'); ?>'>View Details</button>
                            <?php if ($item['status'] === 'Pending'): ?>
                            <button type="button" class="btn btn-success btn-sm" data-request-action="approve">Approve</button>
                            <button type="button" class="btn btn-danger btn-sm" data-request-action="reject">Reject</button>
                            <?php endif; ?>
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
                        <div class="col-md-6"><small class="text-muted d-block">Requested Date</small><strong id="req-date"></strong></div>
                        <div class="col-md-6"><small class="text-muted d-block">Phone</small><strong id="req-phone"></strong></div>
                        <div class="col-md-6"><small class="text-muted d-block">Address</small><strong id="req-address"></strong></div>
                        <div class="col-12"><small class="text-muted d-block">Description</small><p class="mb-0" id="req-desc"></p></div>
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

    document.querySelectorAll('button[data-request-action]').forEach(function (button) {
        button.addEventListener('click', function () {
            const row = button.closest('tr');
            if (!row) return;
            const badge = row.querySelector('.request-status-badge');
            if (!badge) return;

            const action = button.dataset.requestAction;
            const nextStatus = action === 'approve' ? 'Approved' : 'Rejected';
            badge.textContent = nextStatus;
            badge.className = statusClasses(nextStatus);

            row.querySelectorAll('button[data-request-action]').forEach(function (actionBtn) {
                actionBtn.remove();
            });
        });
    });
});
</script>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
