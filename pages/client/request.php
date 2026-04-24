<?php $pageTitle = 'Request Service'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>

<style>
    .req-wrap {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        width: 100%;
    }

    .req-page-title {
        font-size: 2.05rem;
        font-weight: 700;
        color: #0c2740;
        margin-bottom: 0.35rem;
    }

    .req-page-sub {
        font-size: 1rem;
        color: #4a7aa0;
        margin-bottom: 2.2rem;
    }

    /* ── Form ── */
    .req-form-title {
        font-size: 1.35rem;
        font-weight: 700;
        color: #0f2941;
        margin-bottom: 0.3rem;
    }

    .req-form-sub {
        font-size: 0.92rem;
        color: #4a7aa0;
        margin-bottom: 1.5rem;
    }

    .req-form-shell {
        max-width: 1200px;
    }

    .req-section-label {
        font-size: 0.76rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        color: #32668f;
        text-transform: uppercase;
        margin-bottom: 0.7rem;
    }

    .req-project-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 0.75rem;
        margin-bottom: 1rem;
    }

    @media (max-width: 991px) {
        .req-project-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 560px) {
        .req-project-grid {
            grid-template-columns: 1fr;
        }
    }

    .req-project-option {
        display: block;
        cursor: pointer;
        user-select: none;
        position: relative;
    }

    .req-project-input {
        position: absolute;
        opacity: 0;
        pointer-events: none;
        width: 1px;
        height: 1px;
    }

    .req-project-card {
        display: block;
        width: 100%;
        background: #ebeff3;
        border: 2px solid transparent;
        border-radius: 14px;
        padding: 0.9rem 1rem;
        transition: border-color 0.15s, transform 0.15s, box-shadow 0.15s;
        min-height: 88px;
    }

    .req-project-option:hover .req-project-card {
        border-color: #92cbf3;
        transform: translateY(-1px);
    }

    .req-project-input:checked + .req-project-card {
        border-color: #2f95e9;
        background: #def1fe;
        box-shadow: 0 6px 16px rgba(47, 149, 233, 0.15);
    }

    .req-project-option.is-selected .req-project-card {
        border-color: #2f95e9;
        background: #def1fe;
        box-shadow: 0 6px 16px rgba(47, 149, 233, 0.15);
    }

    .req-project-name {
        display: block;
        font-size: 0.95rem;
        font-weight: 700;
        color: #0f2941;
        line-height: 1.25;
    }

    .req-project-meta {
        display: block;
        font-size: 0.78rem;
        color: #4a7aa0;
        margin-top: 0.35rem;
    }

    .req-field-group {
        margin-bottom: 0.75rem;
    }

    .req-field-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0.65rem;
        margin-bottom: 0.75rem;
    }

    @media (max-width: 480px) {
        .req-field-row { grid-template-columns: 1fr; }
    }

    .req-label {
        display: block;
        font-size: 0.8rem;
        font-weight: 600;
        color: #1d476f;
        margin-bottom: 0.4rem;
        letter-spacing: 0.01em;
    }

    .req-input,
    .req-textarea {
        width: 100%;
        background: #bfe6fb;
        border: none;
        color: #0d4e81;
        font-size: 0.96rem;
        font-family: inherit;
        outline: none;
        padding: 0.82rem 1.05rem;
        transition: background 0.15s;
    }

    .req-input::placeholder,
    .req-textarea::placeholder {
        color: #3a87bb;
        opacity: 1;
    }

    .req-input:focus,
    .req-textarea:focus {
        background: #ade0fb;
        box-shadow: 0 0 0 3px rgba(47, 149, 233, 0.18);
    }

    .req-input {
        border-radius: 999px;
    }

    .req-textarea {
        border-radius: 14px;
        resize: vertical;
        min-height: 140px;
    }

    .req-submit-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 1rem;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .req-selected-badge {
        font-size: 0.78rem;
        font-weight: 600;
        color: #155f9c;
        background: #d0e8f5;
        border-radius: 999px;
        padding: 0.28rem 0.8rem;
    }

    .req-submit-btn {
        background: #2f95e9;
        color: #fff;
        border: none;
        border-radius: 999px;
        font-size: 0.98rem;
        font-weight: 600;
        padding: 0.78rem 1.9rem;
        cursor: pointer;
        transition: background 0.15s;
    }

    .req-submit-btn:hover,
    .req-submit-btn:focus {
        background: #1e84d8;
        color: #fff;
    }

</style>

<main class="container-fluid py-4 px-3 px-lg-4 flex-grow-1">
    <?php if (!empty($_GET['submitted'])): ?>
        <div class="alert alert-success"><i class="bi bi-check-circle me-2"></i>Service request submitted successfully.</div>
    <?php endif; ?>

    <section class="req-wrap">
        <h1 class="req-page-title">Request a project</h1>
        <p class="req-page-sub">Choose a project type card, fill in your details, and schedule an assessment.</p>

        <div class="req-form-shell">
            <p class="req-form-title">Request form</p>
            

            <form id="requestForm" method="POST" action="<?php echo htmlspecialchars(app_url('/client/request'), ENT_QUOTES, 'UTF-8'); ?>" class="needs-validation" novalidate>
                <input type="hidden" name="action" value="request_service">
                <input type="hidden" id="selectedService" name="service" value="">
                <input type="hidden" id="selectedProjectTypes" name="project_type" value="">
                <input type="hidden" id="addressCombined" name="address" value="">

                <p class="req-section-label">Project type</p>
                <div class="req-project-grid" role="radiogroup" aria-label="Project type">
                    <label class="req-project-option">
                        <input class="req-project-input" type="checkbox" name="services[]" value="Aircon Installation">
                        <span class="req-project-card">
                            <span class="req-project-name">Aircon Installation</span>
                            <span class="req-project-meta">New unit setup and testing</span>
                        </span>
                    </label>

                    <label class="req-project-option">
                        <input class="req-project-input" type="checkbox" name="services[]" value="Aircon Repair">
                        <span class="req-project-card">
                            <span class="req-project-name">Aircon Repair</span>
                            <span class="req-project-meta">Troubleshooting and fixes</span>
                        </span>
                    </label>

                    <label class="req-project-option">
                        <input class="req-project-input" type="checkbox" name="services[]" value="Aircon Cleaning">
                        <span class="req-project-card">
                            <span class="req-project-name">Aircon Cleaning</span>
                            <span class="req-project-meta">Cleaning and tune-up service</span>
                        </span>
                    </label>

                    <label class="req-project-option">
                        <input class="req-project-input" type="checkbox" name="services[]" value="Ducting Fabrication">
                        <span class="req-project-card">
                            <span class="req-project-name">Ducting Fabrication</span>
                            <span class="req-project-meta">Custom duct build and prep</span>
                        </span>
                    </label>

                    <label class="req-project-option">
                        <input class="req-project-input" type="checkbox" name="services[]" value="Ducting Installation">
                        <span class="req-project-card">
                            <span class="req-project-name">Ducting Installation</span>
                            <span class="req-project-meta">On-site duct installation</span>
                        </span>
                    </label>
                </div>

                <p class="req-section-label">Service location</p>
                <div class="req-field-group">
                    <label class="req-label" for="addressBlkLotStreet">Blk / Lot / Street</label>
                    <input required type="text" id="addressBlkLotStreet" class="req-input" placeholder="Blk, Lot, Street, Subdivision or Building">
                </div>

                <div class="req-field-row">
                    <div>
                        <label class="req-label" for="addressBarangay">Barangay</label>
                        <input required type="text" id="addressBarangay" class="req-input" placeholder="Barangay name">
                    </div>
                    <div>
                        <label class="req-label" for="addressCity">City / Municipality</label>
                        <input required type="text" id="addressCity" class="req-input" placeholder="City or municipality">
                    </div>
                </div>

                <div class="req-field-row">
                    <div>
                        <label class="req-label" for="addressProvince">Province</label>
                        <input required type="text" id="addressProvince" class="req-input" placeholder="Province">
                    </div>
                    <div>
                        <label class="req-label" for="preferredDate">Preferred assessment date</label>
                        <input required type="date" id="preferredDate" name="preferred_date" class="req-input">
                    </div>
                </div>

                <div class="req-field-group">
                    <label class="req-label" for="notes">Additional notes</label>
                    <textarea id="notes" name="notes" class="req-textarea" placeholder="Describe your needs, scope, or any special instructions..."></textarea>
                </div>

                <div class="req-submit-row">
                    <span class="req-selected-badge" id="selectedBadge">No service selected</span>
                    <button type="submit" class="req-submit-btn">Submit request</button>
                </div>

            </form>
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('requestForm');
    const projectInputs = document.querySelectorAll('.req-project-input');
    const selectedInput = document.getElementById('selectedService');
    const selectedProjectTypes = document.getElementById('selectedProjectTypes');
    const selectedBadge = document.getElementById('selectedBadge');
    const addressCombined = document.getElementById('addressCombined');
    const addressBlkLotStreet = document.getElementById('addressBlkLotStreet');
    const addressBarangay = document.getElementById('addressBarangay');
    const addressCity = document.getElementById('addressCity');
    const addressProvince = document.getElementById('addressProvince');
    const preferredDate = document.getElementById('preferredDate');

    /* Set min date to today */
    if (preferredDate) {
        const now = new Date();
        preferredDate.min = new Date(now.getTime() - now.getTimezoneOffset() * 60000)
                                .toISOString().split('T')[0];
    }

    function updateSelectedProject() {
        const selectedValues = Array.from(projectInputs)
            .filter(function (input) { return input.checked; })
            .map(function (input) { return input.value; });

        document.querySelectorAll('.req-project-option').forEach(function (option) {
            const input = option.querySelector('.req-project-input');
            option.classList.toggle('is-selected', !!(input && input.checked));
        });

        if (selectedInput) selectedInput.value = selectedValues.join(', ');
        if (selectedProjectTypes) selectedProjectTypes.value = selectedValues.join(', ');

        if (selectedBadge) {
            selectedBadge.textContent = selectedValues.length
                ? selectedValues.join(', ')
                : 'No service selected';
        }
    }

    function updateCombinedAddress() {
        const parts = [
            addressBlkLotStreet ? addressBlkLotStreet.value.trim() : '',
            addressBarangay ? addressBarangay.value.trim() : '',
            addressCity ? addressCity.value.trim() : '',
            addressProvince ? addressProvince.value.trim() : ''
        ].filter(Boolean);

        if (addressCombined) {
            addressCombined.value = parts.join(', ');
        }
    }

    projectInputs.forEach(function (input) {
        input.addEventListener('click', updateSelectedProject);
        input.addEventListener('change', updateSelectedProject);
    });

    [addressBlkLotStreet, addressBarangay, addressCity, addressProvince].forEach(function (el) {
        if (!el) return;
        el.addEventListener('input', updateCombinedAddress);
    });

    if (form) {
        form.addEventListener('submit', function (event) {
            updateSelectedProject();
            updateCombinedAddress();

            const hasSelectedService = Array.from(projectInputs).some(function (input) {
                return input.checked;
            });

            if (!hasSelectedService) {
                event.preventDefault();
                alert('Please select at least one service.');
            }
        });
    }

    updateSelectedProject();
    updateCombinedAddress();
});
</script>

<?php include __DIR__ . '/../../includes/footer.php'; ?>