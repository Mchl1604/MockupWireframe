<?php $pageTitle = 'Admin Chat'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<main class="container py-4 my-auto">
    <h2 class="h4 fw-bold mb-3">Admin Chat</h2>
    <div class="chat-wrapper shadow-sm">
        <aside class="chat-list">
            <div class="chat-list-item active" data-name="Client - ACME Holdings" data-messages='[{"text":"Can we move the schedule to Friday?","time":"08:40 AM","isOwn":false}]'><div class="fw-semibold small">Client - ACME Holdings</div><div class="text-muted small">Can we move the schedule to Friday?</div></div>
            <div class="chat-list-item" data-name="Technician - Mario" data-messages='[{"text":"Project PRJ-1001 is 65% done.","time":"11:30 AM","isOwn":false}]'><div class="fw-semibold small">Technician - Mario</div><div class="text-muted small">Project PRJ-1001 is 65% done.</div></div>
        </aside>
        <section class="chat-main">
            <div class="border-bottom px-3 py-2 fw-semibold" id="chatHeader">Client - ACME Holdings</div>
            <div class="chat-messages" id="chatMessages"></div>
            <div class="border-top p-2 d-flex gap-2"><textarea id="chatInput" class="form-control" rows="1" placeholder="Type a reply..."></textarea><button id="chatSend" class="btn btn-primary">Send</button></div>
        </section>
    </div>
</main>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
