<?php $pageTitle = 'Quotations'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<?php
$quotes = [
    [
        'id' => 'QT-101',
        'project' => 'PRJ-1001',
        'client' => 'ACME Holdings',
        'amount' => 245000,
        'status' => 'Sent',
        'laborCost' => 55000,
        'materials' => [
            ['name' => 'Copper Pipe', 'qty' => 8, 'unit' => 'roll', 'unitCost' => 8500],
            ['name' => 'Insulation', 'qty' => 10, 'unit' => 'roll', 'unitCost' => 4200],
            ['name' => 'Circuit Breaker', 'qty' => 6, 'unit' => 'pc', 'unitCost' => 3000],
        ],
    ],
    [
        'id' => 'QT-102',
        'project' => 'PRJ-1002',
        'client' => 'J. Dela Cruz',
        'amount' => 78500,
        'status' => 'Approved',
        'laborCost' => 18000,
        'materials' => [
            ['name' => 'Dual Capacitor', 'qty' => 2, 'unit' => 'pc', 'unitCost' => 4500],
            ['name' => 'Fan Motor', 'qty' => 1, 'unit' => 'pc', 'unitCost' => 6500],
        ],
    ],
    [
        'id' => 'QT-103',
        'project' => 'PRJ-1003',
        'client' => 'Metro Storage',
        'amount' => 113000,
        'status' => 'Draft',
        'laborCost' => 26000,
        'materials' => [
            ['name' => 'GI Sheet', 'qty' => 12, 'unit' => 'sheet', 'unitCost' => 4200],
            ['name' => 'Angle Bar', 'qty' => 14, 'unit' => 'pc', 'unitCost' => 1900],
            ['name' => 'Duct Sealant', 'qty' => 7, 'unit' => 'tube', 'unitCost' => 900],
        ],
    ],
];

$projectOptions = ['PRJ-1001', 'PRJ-1002', 'PRJ-1003', 'PRJ-1004', 'PRJ-1005', 'PRJ-1006'];
?>
<main class="container py-4 flex-grow-1">
    <div class="d-flex align-items-center justify-content-between gap-3 mb-3 flex-wrap">
        <h2 class="h4 fw-bold mb-0">Quotations</h2>
        <div class="d-flex align-items-center justify-content-end gap-2 flex-nowrap ms-auto">
            <input type="search" id="quotationSearch" class="form-control form-control-sm flex-shrink-0" placeholder="Search quotations..." style="width: 260px;">
            <button type="button" class="btn btn-outline-secondary btn-sm flex-shrink-0" data-bs-toggle="modal" data-bs-target="#quotationArchivesModal">
                <i class="bi bi-archive me-1"></i>View Archives
            </button>
            <button type="button" class="btn btn-primary btn-sm flex-shrink-0" data-bs-toggle="modal" data-bs-target="#createQuotationModal">
                <i class="bi bi-plus-circle me-1"></i>Create Quotation
            </button>
        </div>
    </div>

    <div class="table-responsive card border-0 shadow-sm">
        <table class="table table-hover mb-0">
            <thead class="table-light"><tr><th>Quotation</th><th>Project</th><th>Client</th><th>Total</th><th>Status</th><th class="text-end">Action</th></tr></thead>
            <tbody id="activeQuotationsBody">
            <?php foreach ($quotes as $q): ?>
                <tr data-quote-id="<?php echo htmlspecialchars($q['id'], ENT_QUOTES, 'UTF-8'); ?>">
                    <td><?php echo htmlspecialchars($q['id'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($q['project'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($q['client'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>₱<?php echo number_format((float) $q['amount'], 2); ?></td>
                    <td><span class="badge quote-status-badge <?php echo $q['status'] === 'Approved' ? 'bg-success' : ($q['status'] === 'Sent' ? 'bg-primary' : 'bg-secondary'); ?>"><?php echo htmlspecialchars($q['status'], ENT_QUOTES, 'UTF-8'); ?></span></td>
                    <td class="text-end">
                        <div class="d-flex justify-content-end flex-wrap gap-1 quote-actions">
                            <?php if ($q['status'] === 'Draft'): ?>
                                <button type="button" class="btn btn-primary btn-sm" data-send-quote>Send Quotation</button>
                            <?php endif; ?>
                            <button type="button" class="btn btn-outline-secondary btn-sm" data-quote='<?php echo htmlspecialchars(json_encode($q), ENT_QUOTES, 'UTF-8'); ?>'>View Details</button>
                            <button type="button" class="btn btn-outline-danger btn-sm" data-archive-quote>Archive</button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="quotationDetailsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header">
                    <h5 class="modal-title">Quotation Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-6"><small class="text-muted d-block">Quotation</small><strong id="qd-id"></strong></div>
                        <div class="col-6"><small class="text-muted d-block">Project</small><strong id="qd-project"></strong></div>
                        <div class="col-12"><small class="text-muted d-block">Client</small><strong id="qd-client"></strong></div>
                        <div class="col-6"><small class="text-muted d-block">Total</small><strong id="qd-total"></strong></div>
                        <div class="col-6"><small class="text-muted d-block">Status</small><span id="qd-status" class="badge"></span></div>
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <small class="text-muted d-block mb-0">Materials</small>
                                <button type="button" class="btn btn-outline-primary btn-sm" id="qd-add-material" style="display:none;">
                                    <i class="bi bi-plus-circle me-1"></i>Add Material
                                </button>
                            </div>
                            <div class="table-responsive border rounded">
                                <table class="table table-sm mb-0 align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="min-width: 150px;">Material</th>
                                            <th style="width:80px;">Qty</th>
                                            <th style="width:90px;">Unit</th>
                                            <th class="text-end" style="width:120px;">Unit Cost</th>
                                            <th class="text-end" style="width:80px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="qd-materials"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-12">
                            <small class="text-muted d-block">Labor Cost</small>
                            <input type="number" class="form-control" id="qd-labor-input" min="0" step="0.01">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="qd-save-changes" style="display:none;">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="quotationArchivesModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header">
                    <h5 class="modal-title">Archived Quotations</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive border rounded">
                        <table class="table table-sm mb-0">
                            <thead class="table-light"><tr><th>Quotation</th><th>Project</th><th>Client</th><th>Total</th><th>Status</th></tr></thead>
                            <tbody id="archivedQuotationsBody"></tbody>
                        </table>
                    </div>
                    <p class="small text-muted mb-0 mt-2" id="archiveEmptyText">No archived quotations yet.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createQuotationModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header">
                    <h5 class="modal-title">Create Quotation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Quotation ID</label>
                                <input type="text" class="form-control" placeholder="QT-104" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Project ID</label>
                                <select class="form-select" id="quotationProjectId">
                                    <option value="" selected disabled>Select project ID</option>
                                    <?php foreach ($projectOptions as $projectId): ?>
                                        <option value="<?php echo htmlspecialchars($projectId, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($projectId, ENT_QUOTES, 'UTF-8'); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Assessment</label>
                                <button type="button" class="btn btn-outline-primary w-100">
                                    <i class="bi bi-file-text me-1"></i>View Assessment Report
                                </button>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Auto Generate</label>
                                <button type="button" class="btn btn-outline-primary w-100">
                                    <i class="bi bi-magic me-1"></i>Auto Generate Quotation
                                </button>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <label class="form-label mb-0">Materials</label>
                                    <button type="button" class="btn btn-outline-primary btn-sm" id="addMaterialRow">
                                        <i class="bi bi-plus-circle me-1"></i>Add Material
                                    </button>
                                </div>
                                <div class="table-responsive border rounded">
                                    <table class="table table-sm mb-0 align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th style="min-width: 280px;">Material</th>
                                                <th style="width: 80px;">Qty</th>
                                                <th style="width: 90px;">Unit</th>
                                                <th style="width: 120px;">Unit Cost</th>
                                                <th class="text-end" style="width: 80px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="materialsRows"></tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Labor Cost</label>
                                <input type="number" class="form-control" min="0" step="0.01" placeholder="0.00">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" rows="3" placeholder="Additional quotation details"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save Quotation</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const rowsContainer = document.getElementById('materialsRows');
    const addRowButton = document.getElementById('addMaterialRow');
    const detailsModalEl = document.getElementById('quotationDetailsModal');
    const archivesBody = document.getElementById('archivedQuotationsBody');
    const activeBody = document.getElementById('activeQuotationsBody');
    const archiveEmptyText = document.getElementById('archiveEmptyText');
    const qdLaborInput = document.getElementById('qd-labor-input');
    const qdSaveChanges = document.getElementById('qd-save-changes');
    const qdAddMaterial = document.getElementById('qd-add-material');
    const quotationSearch = document.getElementById('quotationSearch');

    let activeQuote = null;
    let activeQuoteRow = null;
    let activeQuoteViewButton = null;

    if (quotationSearch) {
        quotationSearch.addEventListener('input', function () {
            const query = this.value.toLowerCase().trim();
            document.querySelectorAll('#activeQuotationsBody tr').forEach(function (row) {
                row.style.display = row.textContent.toLowerCase().includes(query) ? '' : 'none';
            });
        });
    }

    function formatCurrency(value) {
        return '₱' + Number(value || 0).toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    function statusBadgeClass(status) {
        if (status === 'Approved') return 'bg-success';
        if (status === 'Sent') return 'bg-primary';
        return 'bg-secondary';
    }

    function computeMaterialsTotal(quote) {
        if (!quote || !Array.isArray(quote.materials)) return 0;
        return quote.materials.reduce(function (sum, item) {
            const qty = Number(item.qty || 0);
            const unitCost = Number(item.unitCost || 0);
            return sum + (qty * unitCost);
        }, 0);
    }

    function renderDetailsMaterials(materials, isDraft) {
        if (!detailsModalEl) return;
        const materialsBody = detailsModalEl.querySelector('#qd-materials');
        if (!materialsBody) return;

        if (!Array.isArray(materials) || materials.length === 0) {
            if (isDraft) {
                materialsBody.innerHTML = '';
            } else {
                materialsBody.innerHTML = '<tr><td colspan="5" class="small text-muted">No materials listed.</td></tr>';
            }
            return;
        }

        if (isDraft) {
            materialsBody.innerHTML = materials.map(function (item) {
                return '<tr>' +
                    '<td><input type="text" class="form-control form-control-sm qd-material-name" value="' + (item.name || '') + '"></td>' +
                    '<td><input type="number" class="form-control form-control-sm qd-material-qty" min="1" step="1" value="' + Number(item.qty || 1) + '"></td>' +
                    '<td><input type="text" class="form-control form-control-sm qd-material-unit" value="' + (item.unit || '') + '"></td>' +
                    '<td><input type="number" class="form-control form-control-sm text-end qd-material-cost" min="0" step="0.01" value="' + Number(item.unitCost || 0) + '"></td>' +
                    '<td class="text-end"><button type="button" class="btn btn-outline-danger btn-sm" data-qd-remove-material><i class="bi bi-trash"></i></button></td>' +
                    '</tr>';
            }).join('');
            return;
        }

        materialsBody.innerHTML = materials.map(function (item) {
            return '<tr>' +
                '<td class="small">' + (item.name || '') + '</td>' +
                '<td class="small">' + (item.qty || '') + '</td>' +
                '<td class="small">' + (item.unit || '') + '</td>' +
                '<td class="small text-end">₱' + Number(item.unitCost || 0).toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + '</td>' +
                '<td></td>' +
                '</tr>';
        }).join('');
    }

    function addDraftMaterialRow() {
        if (!detailsModalEl) return;
        const materialsBody = detailsModalEl.querySelector('#qd-materials');
        if (!materialsBody) return;

        const row = document.createElement('tr');
        row.innerHTML = '' +
            '<td><input type="text" class="form-control form-control-sm qd-material-name" placeholder="Material name"></td>' +
            '<td><input type="number" class="form-control form-control-sm qd-material-qty" min="1" step="1" value="1"></td>' +
            '<td><input type="text" class="form-control form-control-sm qd-material-unit" placeholder="pc"></td>' +
            '<td><input type="number" class="form-control form-control-sm text-end qd-material-cost" min="0" step="0.01" value="0"></td>' +
            '<td class="text-end"><button type="button" class="btn btn-outline-danger btn-sm" data-qd-remove-material><i class="bi bi-trash"></i></button></td>';
        materialsBody.appendChild(row);
    }

    function syncActiveRow() {
        if (!activeQuote || !activeQuoteRow) return;

        const cells = activeQuoteRow.querySelectorAll('td');
        if (cells.length >= 5) {
            cells[3].textContent = formatCurrency(activeQuote.amount || 0);
            const statusBadge = cells[4].querySelector('.quote-status-badge');
            if (statusBadge) {
                statusBadge.textContent = activeQuote.status || '';
                statusBadge.className = 'badge quote-status-badge ' + statusBadgeClass(activeQuote.status || '');
            }
        }

        if (activeQuoteViewButton) {
            activeQuoteViewButton.dataset.quote = JSON.stringify(activeQuote);
        }

        const actionsWrap = activeQuoteRow.querySelector('.quote-actions');
        if (!actionsWrap) return;

        const existingSendButton = actionsWrap.querySelector('button[data-send-quote]');
        if (activeQuote.status === 'Draft' && !existingSendButton) {
            const sendButton = document.createElement('button');
            sendButton.type = 'button';
            sendButton.className = 'btn btn-primary btn-sm';
            sendButton.setAttribute('data-send-quote', '');
            sendButton.textContent = 'Send';
            const archiveButton = actionsWrap.querySelector('button[data-archive-quote]');
            if (archiveButton) actionsWrap.insertBefore(sendButton, archiveButton);
            else actionsWrap.appendChild(sendButton);
        }

        if (activeQuote.status !== 'Draft' && existingSendButton) {
            existingSendButton.remove();
        }
    }

    function createMaterialRow() {
        const tr = document.createElement('tr');
        tr.innerHTML = '' +
            '<td><input type="text" class="form-control form-control-sm" placeholder="Material name"></td>' +
            '<td><input type="number" class="form-control form-control-sm" min="1" step="1" value="1"></td>' +
            '<td><input type="text" class="form-control form-control-sm" placeholder="pc"></td>' +
            '<td><input type="number" class="form-control form-control-sm" min="0" step="0.01" placeholder="0.00"></td>' +
            '<td class="text-end"><button type="button" class="btn btn-outline-danger btn-sm" data-remove-row><i class="bi bi-trash"></i></button></td>';
        rowsContainer.appendChild(tr);
    }

    if (rowsContainer && addRowButton) {
        addRowButton.addEventListener('click', createMaterialRow);

        rowsContainer.addEventListener('click', function (event) {
            const btn = event.target.closest('[data-remove-row]');
            if (!btn) return;
            const row = btn.closest('tr');
            if (!row) return;
            row.remove();

            if (rowsContainer.children.length === 0) {
                createMaterialRow();
            }
        });

        createMaterialRow();
    }

    if (qdSaveChanges) {
        qdSaveChanges.addEventListener('click', function () {
            if (!activeQuote || !qdLaborInput || activeQuote.status !== 'Draft') return;

            const materialsBody = detailsModalEl ? detailsModalEl.querySelector('#qd-materials') : null;
            if (materialsBody) {
                const updatedMaterials = [];
                materialsBody.querySelectorAll('tr').forEach(function (row) {
                    const nameEl = row.querySelector('.qd-material-name');
                    const qtyEl = row.querySelector('.qd-material-qty');
                    const unitEl = row.querySelector('.qd-material-unit');
                    const costEl = row.querySelector('.qd-material-cost');
                    if (!nameEl || !qtyEl || !unitEl || !costEl) return;

                    const name = (nameEl.value || '').trim();
                    if (!name) return;

                    updatedMaterials.push({
                        name: name,
                        qty: Number(qtyEl.value || 0),
                        unit: (unitEl.value || '').trim(),
                        unitCost: Number(costEl.value || 0),
                    });
                });
                activeQuote.materials = updatedMaterials;
            }

            activeQuote.laborCost = Number(qdLaborInput.value || 0);
            const materialsTotal = computeMaterialsTotal(activeQuote);
            activeQuote.amount = materialsTotal + Number(activeQuote.laborCost || 0);

            if (detailsModalEl) {
                detailsModalEl.querySelector('#qd-total').textContent = formatCurrency(activeQuote.amount || 0);
            }

            syncActiveRow();
        });
    }

    if (qdAddMaterial) {
        qdAddMaterial.addEventListener('click', function () {
            if (!activeQuote || activeQuote.status !== 'Draft') return;
            addDraftMaterialRow();
        });
    }

    if (detailsModalEl) {
        detailsModalEl.addEventListener('click', function (event) {
            const removeBtn = event.target.closest('[data-qd-remove-material]');
            if (!removeBtn) return;
            if (!activeQuote || activeQuote.status !== 'Draft') return;

            const row = removeBtn.closest('tr');
            if (!row) return;
            row.remove();
        });
    }

    if (activeBody) {
        activeBody.addEventListener('click', function (event) {
            const viewBtn = event.target.closest('button[data-quote]');
            if (viewBtn && detailsModalEl && typeof bootstrap !== 'undefined') {
                const quote = JSON.parse(viewBtn.dataset.quote || '{}');
                activeQuote = quote;
                activeQuoteRow = viewBtn.closest('tr');
                activeQuoteViewButton = viewBtn;

                detailsModalEl.querySelector('#qd-id').textContent = quote.id || '';
                detailsModalEl.querySelector('#qd-project').textContent = quote.project || '';
                detailsModalEl.querySelector('#qd-client').textContent = quote.client || '';
                detailsModalEl.querySelector('#qd-total').textContent = formatCurrency(quote.amount || 0);
                if (qdLaborInput) {
                    qdLaborInput.value = Number(quote.laborCost || 0);
                    qdLaborInput.disabled = quote.status !== 'Draft';
                }
                if (qdSaveChanges) {
                    qdSaveChanges.style.display = quote.status === 'Draft' ? '' : 'none';
                }
                if (qdAddMaterial) {
                    qdAddMaterial.style.display = quote.status === 'Draft' ? '' : 'none';
                }

                const materials = Array.isArray(quote.materials) ? quote.materials : [];
                renderDetailsMaterials(materials, quote.status === 'Draft');

                const statusEl = detailsModalEl.querySelector('#qd-status');
                const status = quote.status || '';
                statusEl.textContent = status;
                statusEl.className = 'badge ' + statusBadgeClass(status);

                new bootstrap.Modal(detailsModalEl).show();
                return;
            }

            const sendBtn = event.target.closest('button[data-send-quote]');
            if (sendBtn) {
                const row = sendBtn.closest('tr');
                if (!row) return;
                const viewButton = row.querySelector('button[data-quote]');
                if (!viewButton) return;

                const quote = JSON.parse(viewButton.dataset.quote || '{}');
                quote.status = 'Sent';
                viewButton.dataset.quote = JSON.stringify(quote);

                const statusBadge = row.querySelector('.quote-status-badge');
                if (statusBadge) {
                    statusBadge.textContent = 'Sent';
                    statusBadge.className = 'badge quote-status-badge ' + statusBadgeClass('Sent');
                }

                sendBtn.remove();

                if (activeQuote && activeQuote.id === quote.id && detailsModalEl) {
                    activeQuote = quote;
                    activeQuoteRow = row;
                    activeQuoteViewButton = viewButton;
                    detailsModalEl.querySelector('#qd-status').textContent = 'Sent';
                    detailsModalEl.querySelector('#qd-status').className = 'badge ' + statusBadgeClass('Sent');
                    if (qdLaborInput) qdLaborInput.disabled = true;
                    if (qdSaveChanges) qdSaveChanges.style.display = 'none';
                }
                return;
            }

            const archiveBtn = event.target.closest('button[data-archive-quote]');
            if (!archiveBtn || !archivesBody) return;

            const row = archiveBtn.closest('tr');
            if (!row) return;
            const cells = row.querySelectorAll('td');
            if (cells.length < 5) return;

            const archivedRow = document.createElement('tr');
            archivedRow.innerHTML =
                '<td>' + cells[0].innerHTML + '</td>' +
                '<td>' + cells[1].innerHTML + '</td>' +
                '<td>' + cells[2].innerHTML + '</td>' +
                '<td>' + cells[3].innerHTML + '</td>' +
                '<td>' + cells[4].innerHTML + '</td>';
            archivesBody.appendChild(archivedRow);
            row.remove();

            if (archiveEmptyText) {
                archiveEmptyText.style.display = archivesBody.children.length ? 'none' : '';
            }
        });
    }
});
</script>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
