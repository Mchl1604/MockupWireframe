/* =========================================================
   Coliconstruct Engineering Services – App JS
   ========================================================= */

document.addEventListener('DOMContentLoaded', function () {

    // -------------------------------------------------------
    // Sidebar toggle
    // -------------------------------------------------------
    const sidebar        = document.getElementById('sidebar');
    const dashMain       = document.getElementById('dashboardMain');
    const sidebarToggle  = document.getElementById('sidebarToggle');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const dashboardBody  = document.body.classList.contains('dashboard-body') ? document.body : null;

    function openSidebar() {
        if (!sidebar) return;
        sidebar.classList.add('sidebar-open');
        sidebar.classList.remove('sidebar-hidden');
        if (sidebarOverlay) sidebarOverlay.classList.add('visible');
    }

    function closeSidebar() {
        if (!sidebar) return;
        sidebar.classList.remove('sidebar-open');
        if (sidebarOverlay) sidebarOverlay.classList.remove('visible');
    }

    function toggleSidebar() {
        if (window.innerWidth < 992) {
            // Mobile: show/hide with overlay
            if (sidebar && sidebar.classList.contains('sidebar-open')) {
                closeSidebar();
            } else {
                openSidebar();
            }
        } else {
            // Desktop: compact sidebar
            if (sidebar) sidebar.classList.toggle('sidebar-collapsed');
            if (dashMain) dashMain.classList.toggle('sidebar-collapsed');
            if (dashboardBody) dashboardBody.classList.toggle('sidebar-collapsed');
        }
    }

    if (sidebarToggle) sidebarToggle.addEventListener('click', toggleSidebar);
    if (sidebarOverlay) sidebarOverlay.addEventListener('click', closeSidebar);


    // -------------------------------------------------------
    // Service card selection (client request page)
    // -------------------------------------------------------
    const serviceCards   = document.querySelectorAll('.service-card');
    const serviceInput   = document.getElementById('selectedService');
    const requestForm    = document.getElementById('requestForm');
    const materialsTable = document.getElementById('materialsSection');

    const acMaterials = [
        { name: 'AC Unit',           qty: 1, unit: 'pc' },
        { name: 'Bracket',           qty: 1, unit: 'set' },
        { name: 'Copper Pipe',       qty: 1, unit: 'roll' },
        { name: 'Rubber Insulation', qty: 1, unit: 'roll' },
        { name: 'Royal Cord',        qty: 1, unit: 'roll' },
        { name: 'Circuit Breaker',   qty: 1, unit: 'pc' },
        { name: 'Flexible PVC',      qty: 1, unit: 'pc' },
    ];

    const ductingMaterials = [
        { name: 'Full Threaded Rod',  qty: 1, unit: 'pc' },
        { name: 'Yero',               qty: 1, unit: 'sheet' },
        { name: 'Angle Bar',          qty: 1, unit: 'pc' },
        { name: 'Duct Sealant',       qty: 1, unit: 'tube' },
        { name: 'Duct Tape',          qty: 1, unit: 'roll' },
        { name: 'Insulation Padding', qty: 1, unit: 'roll' },
    ];

    function renderMaterials(serviceId) {
        if (!materialsTable) return;
        let mats = [];
        if (serviceId === 'ac-install') mats = acMaterials;
        else if (serviceId === 'ducting') mats = ductingMaterials;

        if (mats.length === 0) {
            materialsTable.style.display = 'none';
            return;
        }
        materialsTable.style.display = '';
        const tbody = materialsTable.querySelector('tbody');
        if (!tbody) return;
        tbody.innerHTML = mats.map(m =>
            `<tr><td class="small">${esc(m.name)}</td><td class="small">${m.qty}</td><td class="small">${esc(m.unit)}</td></tr>`
        ).join('');
    }

    serviceCards.forEach(function (card) {
        card.addEventListener('click', function () {
            serviceCards.forEach(c => c.classList.remove('selected'));
            card.classList.add('selected');
            const sid = card.dataset.serviceId;
            if (serviceInput) serviceInput.value = sid;
            if (requestForm) requestForm.style.display = '';
            renderMaterials(sid);
        });
    });


    // -------------------------------------------------------
    // Chat interface
    // -------------------------------------------------------
    const chatItems    = document.querySelectorAll('.chat-list-item');
    const chatHeader   = document.getElementById('chatHeader');
    const chatBody     = document.getElementById('chatMessages');
    const chatInput    = document.getElementById('chatInput');
    const chatSendBtn  = document.getElementById('chatSend');

    chatItems.forEach(function (item) {
        item.addEventListener('click', function () {
            chatItems.forEach(c => c.classList.remove('active'));
            item.classList.add('active');
            if (chatHeader) chatHeader.textContent = item.dataset.name || '';
            if (chatBody) {
                chatBody.innerHTML = JSON.parse(item.dataset.messages || '[]')
                    .map(renderMsg)
                    .join('');
                chatBody.scrollTop = chatBody.scrollHeight;
            }
        });
    });

    function renderMsg(msg) {
        const side = msg.isOwn ? 'justify-content-end' : 'justify-content-start';
        const cls  = msg.isOwn ? 'own' : 'other';
        return `<div class="d-flex ${side} mb-2">
            <div class="chat-bubble ${cls}">
                <p class="mb-0">${esc(msg.text)}</p>
                <p class="mb-0 small opacity-75 mt-1">${esc(msg.time)}</p>
            </div>
        </div>`;
    }

    function esc(str) {
        const d = document.createElement('div');
        d.textContent = str;
        return d.innerHTML;
    }

    if (chatSendBtn) {
        chatSendBtn.addEventListener('click', sendMessage);
    }
    if (chatInput) {
        chatInput.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                sendMessage();
            }
        });
    }

    function sendMessage() {
        if (!chatInput || !chatBody) return;
        const text = chatInput.value.trim();
        if (!text) return;
        const now = new Date();
        const time = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        chatBody.insertAdjacentHTML('beforeend', renderMsg({ text, time, isOwn: true }));
        chatBody.scrollTop = chatBody.scrollHeight;
        chatInput.value = '';
    }

    // Scroll chat to bottom on load
    if (chatBody) chatBody.scrollTop = chatBody.scrollHeight;


    // -------------------------------------------------------
    // Quotation modal (admin)
    // -------------------------------------------------------
    const quotationRows = document.querySelectorAll('[data-quotation]');
    quotationRows.forEach(function (row) {
        row.addEventListener('click', function () {
            const data = JSON.parse(row.dataset.quotation);
            const modal = document.getElementById('quotationModal');
            if (!modal) return;
            modal.querySelector('#qt-id').textContent     = data.quotationId;
            modal.querySelector('#qt-project').textContent = data.id;
            modal.querySelector('#qt-client').textContent  = data.client;
            modal.querySelector('#qt-service').textContent = data.serviceType;
            modal.querySelector('#qt-materials-cost').textContent = '₱' + Number(data.quotation.materials).toLocaleString();
            modal.querySelector('#qt-labor').textContent          = '₱' + Number(data.quotation.labor).toLocaleString();
            modal.querySelector('#qt-total').textContent          = '₱' + Number(data.quotation.total).toLocaleString();

            // Materials list
            const matsList = modal.querySelector('#qt-materials-list');
            if (matsList) {
                if (data.materials && data.materials.length) {
                    matsList.innerHTML = data.materials.map(m =>
                        `<li class="list-group-item d-flex justify-content-between small"><span>${esc(m.name)}</span><span>${m.qty} ${esc(m.unit)}</span></li>`
                    ).join('');
                    matsList.parentElement.style.display = '';
                } else {
                    matsList.parentElement.style.display = 'none';
                }
            }

            const bsModal = new bootstrap.Modal(modal);
            bsModal.show();
        });
    });


    // -------------------------------------------------------
    // Request view modal (admin requests)
    // -------------------------------------------------------
    document.querySelectorAll('[data-request]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const data = JSON.parse(btn.dataset.request);
            const modal = document.getElementById('requestModal');
            if (!modal) return;
            modal.querySelector('#req-id').textContent      = data.id;
            modal.querySelector('#req-client').textContent  = data.client;
            modal.querySelector('#req-service').textContent = data.service;
            modal.querySelector('#req-address').textContent = data.address;
            modal.querySelector('#req-date').textContent    = data.date;
            modal.querySelector('#req-phone').textContent   = data.phone;
            modal.querySelector('#req-desc').textContent    = data.description;
            const bsModal = new bootstrap.Modal(modal);
            bsModal.show();
        });
    });


    // -------------------------------------------------------
    // Form validation (Bootstrap 5 style)
    // -------------------------------------------------------
    document.querySelectorAll('form.needs-validation').forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });


    // -------------------------------------------------------
    // Attendance: live clock
    // -------------------------------------------------------
    const clockEl = document.getElementById('liveClock');
    if (clockEl) {
        function updateClock() {
            const now = new Date();
            clockEl.textContent = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', second: '2-digit' });
        }
        updateClock();
        setInterval(updateClock, 1000);
    }

});
