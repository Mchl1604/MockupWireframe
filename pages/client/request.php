<?php $pageTitle = 'Request Service'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>

<style>
    .request-project-wrap {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    .request-title {
        font-size: 2.15rem;
        font-weight: 700;
        color: #0c2740;
        letter-spacing: -0.02em;
    }

    .request-subtitle {
        color: #0c2740;
        font-size: 1.95rem;
        font-weight: 700;
        letter-spacing: -0.02em;
    }

    .services-label {
        color: #163049;
        font-size: 2rem;
        font-weight: 700;
    }

    .service-panel {
        border: 0;
        border-radius: 18px;
        background: #f8fafc;
        margin-bottom: 0.85rem;
        overflow: hidden;
    }

    .service-panel .accordion-button {
        background: #ebeff3;
        color: #0f2941;
        border-radius: 18px !important;
        box-shadow: none;
        font-size: 1.05rem;
        font-weight: 700;
        padding: 1rem 1.15rem;
    }

    .service-panel .accordion-button:not(.collapsed) {
        background: #ebeff3;
        color: #0f2941;
    }

    .service-panel .accordion-button::after {
        transform: scale(0.8);
    }

    .service-panel .accordion-body {
        background: #ebeff3;
        padding-top: 0.15rem;
        color: #0f2941;
        font-size: 1.05rem;
        line-height: 1.35;
    }

    .service-panel .service-points {
        margin-bottom: 0;
        padding-left: 1rem;
        color: #1a3b5b;
        font-size: 0.95rem;
    }

    .service-panel .service-points li {
        margin-bottom: 0.25rem;
    }

    .service-card.selected {
        outline: 2px solid #2f95e9;
        outline-offset: 0;
    }

    .request-form-title {
        color: #0f2941;
        font-size: 1.85rem;
        font-weight: 700;
    }

    .request-form-subtitle {
        color: #1d476f;
        font-size: 1.05rem;
        margin-bottom: 1.5rem;
    }

    .request-field {
        border: 0;
        border-radius: 999px;
        background: #bfe6fb;
        color: #0d4e81;
        padding: 0.88rem 1rem;
    }

    .request-field::placeholder {
        color: #0d6aad;
        opacity: 0.9;
    }

    .request-field:focus {
        box-shadow: 0 0 0 0.2rem rgba(47,149,233,0.2);
        background: #c9ebfc;
    }

    .request-textarea {
        border-radius: 20px;
        min-height: 185px;
        resize: vertical;
    }

    .request-submit {
        border: 0;
        border-radius: 999px;
        background: #2f95e9;
        color: #fff;
        font-size: 1.05rem;
        font-weight: 600;
        padding: 0.75rem 1.65rem;
        min-width: 170px;
    }

    .request-submit:hover,
    .request-submit:focus {
        background: #1e84d8;
        color: #fff;
    }

    .selected-service-badge {
        display: inline-block;
        margin-top: 0.4rem;
        color: #155f9c;
        font-size: 0.9rem;
        font-weight: 600;
    }

    @media (max-width: 991.98px) {
        .request-title,
        .services-label,
        .request-form-title {
            font-size: 1.65rem;
        }
    }
</style>

<main class="container py-4 flex-grow-1">
    <?php if (!empty($_GET['submitted'])): ?>
        <div class="alert alert-success"><i class="bi bi-check-circle me-2"></i>Service request submitted successfully.</div>
    <?php endif; ?>

    <section class="request-project-wrap">
        <div class="mb-4">
            <h1 class="request-title mb-0">Request Project</h1>
        </div>

        <div class="row g-4 g-lg-5">
            <div class="col-lg-5">
                <h2 class="services-label h3 mb-3">Our Services</h2>

                <div class="accordion" id="serviceAccordion">
                    <div class="accordion-item service-panel service-card selected" data-service-id="aircon-services" data-service-name="Aircon Services">
                        <h2 class="accordion-header" id="serviceHeadingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#serviceCollapseOne" aria-expanded="true" aria-controls="serviceCollapseOne">
                                Aircon Services
                            </button>
                        </h2>
                        <div id="serviceCollapseOne" class="accordion-collapse collapse show" aria-labelledby="serviceHeadingOne" data-bs-parent="#serviceAccordion">
                            <div class="accordion-body">
                                <p class="mb-2">Installation, maintenance, and cleaning of air-conditioning units for homes, offices, and commercial buildings.</p>
                                <ul class="service-points">
                                    <li>Installation</li>
                                    <li>Maintenance</li>
                                    <li>AC Repair</li>
                                    <li>AC Cleaning</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item service-panel service-card" data-service-id="ducting" data-service-name="Ducting">
                        <h2 class="accordion-header" id="serviceHeadingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#serviceCollapseTwo" aria-expanded="false" aria-controls="serviceCollapseTwo">
                                Ducting
                            </button>
                        </h2>
                        <div id="serviceCollapseTwo" class="accordion-collapse collapse" aria-labelledby="serviceHeadingTwo" data-bs-parent="#serviceAccordion">
                            <div class="accordion-body">
                                <p class="mb-2">Ducting fabrication and installation for proper airflow and efficient system distribution.</p>
                                <ul class="service-points">
                                    <li>Fabrication</li>
                                    <li>Installation</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item service-panel service-card" data-service-id="preventive-maintenance" data-service-name="Preventive Maintenance">
                        <h2 class="accordion-header" id="serviceHeadingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#serviceCollapseThree" aria-expanded="false" aria-controls="serviceCollapseThree">
                                Preventive Maintenance
                            </button>
                        </h2>
                        <div id="serviceCollapseThree" class="accordion-collapse collapse" aria-labelledby="serviceHeadingThree" data-bs-parent="#serviceAccordion">
                            <div class="accordion-body">
                                <p class="mb-2">Routine inspection and upkeep plan that minimizes downtime and extends system life.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div id="requestForm">
                    <h2 class="request-form-title mb-1">Request Form</h2>
                    <p class="request-form-subtitle">Fill-in the details and we'll schedule an assessment</p>

                    <form method="POST" action="<?php echo htmlspecialchars(app_url('/client/request'), ENT_QUOTES, 'UTF-8'); ?>" class="needs-validation" novalidate>
                        <input type="hidden" name="action" value="request_service">
                        <input type="hidden" id="selectedService" name="service" value="aircon-services">

                        <div class="row g-3">
                            <div class="col-md-6">
                                <input required type="text" name="contact_person" class="form-control request-field" placeholder="Full name">
                            </div>
                            <div class="col-md-6">
                                <input required type="tel" name="phone" class="form-control request-field" placeholder="Phone number">
                            </div>
                            <div class="col-12">
                                <input required type="text" name="address" class="form-control request-field" placeholder="Address">
                            </div>
                            <div class="col-12">
                                <select required name="project_type" class="form-select request-field">
                                    <option value="" selected disabled>Project type</option>
                                    <option value="aircon-services">Aircon Services</option>
                                    <option value="ducting">Ducting</option>
                                    <option value="preventive-maintenance">Preventive Maintenance</option>
                                </select>
                            </div>
                            <div class="col-12" id="airconServiceTypeWrap" style="display:none;">
                                <select name="aircon_service_type" id="airconServiceType" class="form-select request-field">
                                    <option value="" selected disabled>Select aircon service type</option>
                                    <option value="installation">Installation</option>
                                    <option value="maintenance">Maintenance</option>
                                    <option value="ac-repair">AC Repair</option>
                                    <option value="ac-cleaning">AC Cleaning</option>
                                </select>
                            </div>
                            <div class="col-md-6" id="airconUnitsWrap" style="display:none;">
                                <input type="number" min="1" step="1" name="aircon_units" id="airconUnits" class="form-control request-field" placeholder="How many units?">
                            </div>
                            <div class="col-12" id="ductingServiceTypeWrap" style="display:none;">
                                <select name="ducting_service_type" id="ductingServiceType" class="form-select request-field">
                                    <option value="" selected disabled>Select ducting service type</option>
                                    <option value="fabrication">Fabrication</option>
                                    <option value="installation">Installation</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control request-field request-textarea" rows="6" name="notes" placeholder="Description"></textarea>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button class="btn request-submit" type="submit">Submit request</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const servicePanels = document.querySelectorAll('.service-card');
    const selectedServiceText = document.getElementById('selectedServiceText');
    const selectedServiceInput = document.getElementById('selectedService');
    const projectTypeSelect = document.querySelector('select[name="project_type"]');
    const airconServiceTypeWrap = document.getElementById('airconServiceTypeWrap');
    const airconServiceType = document.getElementById('airconServiceType');
    const airconUnitsWrap = document.getElementById('airconUnitsWrap');
    const airconUnits = document.getElementById('airconUnits');
    const ductingServiceTypeWrap = document.getElementById('ductingServiceTypeWrap');
    const ductingServiceType = document.getElementById('ductingServiceType');

    function toggleServiceSubtypeFields() {
        if (!projectTypeSelect) return;

        const selectedType = projectTypeSelect.value;
        const isAircon = selectedType === 'aircon-services';
        const isDucting = selectedType === 'ducting';

        if (airconServiceTypeWrap && airconServiceType) {
            airconServiceTypeWrap.style.display = isAircon ? '' : 'none';
            airconServiceType.required = isAircon;
            if (!isAircon) airconServiceType.value = '';
        }

        if (airconUnitsWrap && airconUnits) {
            airconUnitsWrap.style.display = isAircon ? '' : 'none';
            airconUnits.required = isAircon;
            if (!isAircon) airconUnits.value = '';
        }

        if (ductingServiceTypeWrap && ductingServiceType) {
            ductingServiceTypeWrap.style.display = isDucting ? '' : 'none';
            ductingServiceType.required = isDucting;
            if (!isDucting) ductingServiceType.value = '';
        }
    }

    servicePanels.forEach(function (panel) {
        panel.addEventListener('click', function () {
            servicePanels.forEach(function (item) {
                item.classList.remove('selected');
            });
            panel.classList.add('selected');

            const serviceName = panel.dataset.serviceName || 'Service';
            const serviceId = panel.dataset.serviceId || '';
            if (selectedServiceText) {
                selectedServiceText.textContent = 'Selected service: ' + serviceName;
            }
            if (selectedServiceInput) selectedServiceInput.value = serviceId;
            if (projectTypeSelect) projectTypeSelect.value = serviceId;
            toggleServiceSubtypeFields();
        });
    });

    if (projectTypeSelect) {
        projectTypeSelect.addEventListener('change', function () {
            if (selectedServiceInput) selectedServiceInput.value = projectTypeSelect.value;
            toggleServiceSubtypeFields();
        });
    }

    toggleServiceSubtypeFields();
});
</script>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
