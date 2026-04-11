<?php $pageTitle = 'Client Chat'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>

<main class="container py-4 flex-grow-1">
    <h2 class="h4 fw-bold mb-3">Chat</h2>

    <div class="chat-wrapper shadow-sm">
        <section class="chat-main">
            <div class="border-bottom px-3 py-3 d-flex align-items-center justify-content-between">
                <div>
                    <div class="fw-semibold" id="chatHeader">Admin</div>
                    <div class="text-muted small">Chat with the admin team only</div>
                </div>
                <span class="badge bg-primary-subtle text-primary-emphasis">Online</span>
            </div>

            <div class="chat-messages" id="chatMessages">
                <div class="d-flex justify-content-start mb-2">
                    <div class="chat-bubble other">
                        <p class="mb-0">Good day! How can we help you today?</p>
                        <p class="mb-0 small opacity-75 mt-1">09:10 AM</p>
                    </div>
                </div>
                <div class="d-flex justify-content-end mb-2">
                    <div class="chat-bubble own">
                        <p class="mb-0">I need an update on my quotation.</p>
                        <p class="mb-0 small opacity-75 mt-1">09:12 AM</p>
                    </div>
                </div>
                <div class="d-flex justify-content-start mb-2">
                    <div class="chat-bubble other">
                        <p class="mb-0">We are reviewing it now and will send the details shortly.</p>
                        <p class="mb-0 small opacity-75 mt-1">09:15 AM</p>
                    </div>
                </div>
                <div class="d-flex justify-content-end mb-2">
                    <div class="chat-bubble own">
                        <p class="mb-0">Thank you. Please let me know once it is ready.</p>
                        <p class="mb-0 small opacity-75 mt-1">09:18 AM</p>
                    </div>
                </div>
            </div>

            <div class="border-top p-2 d-flex gap-2">
                <textarea id="chatInput" class="form-control" rows="1" placeholder="Type a message..."></textarea>
                <button id="chatSend" class="btn btn-primary">Send</button>
            </div>
        </section>
    </div>
</main>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
