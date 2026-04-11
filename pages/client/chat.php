<?php $pageTitle = 'Client Chat'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>

<main class="container py-4 my-auto">
    <h2 class="h4 fw-bold mb-3">Chat</h2>

    <div class="chat-wrapper shadow-sm">
        <aside class="chat-list">
            <div class="chat-list-item active" data-name="Admin Team" data-messages='[{"text":"Good day! How can we help?","time":"09:10 AM","isOwn":false},{"text":"Please confirm tomorrow schedule.","time":"09:12 AM","isOwn":false}]'>
                <div class="fw-semibold small">Admin Team</div>
                <div class="text-muted small">Please confirm tomorrow schedule.</div>
            </div>
            <div class="chat-list-item" data-name="Technician - Mario" data-messages='[{"text":"We are on-site now.","time":"01:40 PM","isOwn":false}]'>
                <div class="fw-semibold small">Technician - Mario</div>
                <div class="text-muted small">We are on-site now.</div>
            </div>
        </aside>

        <section class="chat-main">
            <div class="border-bottom px-3 py-2 fw-semibold" id="chatHeader">Admin Team</div>
            <div class="chat-messages" id="chatMessages"></div>
            <div class="border-top p-2 d-flex gap-2">
                <textarea id="chatInput" class="form-control" rows="1" placeholder="Type a message..."></textarea>
                <button id="chatSend" class="btn btn-primary">Send</button>
            </div>
        </section>
    </div>
</main>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
