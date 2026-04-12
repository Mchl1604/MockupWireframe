<?php $pageTitle = 'Admin Chat'; ?>
<?php include __DIR__ . '/../../includes/head.php'; ?>

<?php
    // Sample client data - in production this would come from a database
    $clients = [
        [
            'id' => 'USR-017',
            'name' => 'Maria Garcia',
            'lastMessage' => 'Can we move the schedule to Friday?',
            'time' => '08:40 AM',
            'messages' => [
                ['text' => 'Hi, I have a question about my AC installation', 'time' => '08:30 AM', 'isOwn' => false],
                ['text' => 'Can we move the schedule to Friday?', 'time' => '08:40 AM', 'isOwn' => false],
            ]
        ],
        [
            'id' => 'USR-018',
            'name' => 'James Wilson',
            'lastMessage' => 'Thank you for the update!',
            'time' => '02:15 PM',
            'messages' => [
                ['text' => 'Is my ducting project starting on Monday?', 'time' => '01:50 PM', 'isOwn' => false],
                ['text' => 'Thank you for the update!', 'time' => '02:15 PM', 'isOwn' => false],
            ]
        ],
        [
            'id' => 'USR-019',
            'name' => 'ACME Holdings',
            'lastMessage' => 'When can you send the quotation?',
            'time' => '03:30 PM',
            'messages' => [
                ['text' => 'We received your initial assessment', 'time' => '03:20 PM', 'isOwn' => false],
                ['text' => 'When can you send the quotation?', 'time' => '03:30 PM', 'isOwn' => false],
            ]
        ]
    ];
?>

<body class="dashboard-body bg-light min-vh-100 d-flex flex-column">
<?php include __DIR__ . '/../../includes/navbar.php'; ?>
<?php include __DIR__ . '/../../includes/sidebar.php'; ?>
<main class="container py-4 flex-grow-1">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <h2 class="h4 fw-bold mb-0">Chat with Clients</h2>
        <input type="search" id="chatSearch" class="form-control form-control-sm" placeholder="Search clients..." style="max-width: 280px;">
    </div>
    <div class="chat-wrapper shadow-sm">
        <aside class="chat-list">
            <?php foreach ($clients as $index => $client): ?>
                <div class="chat-list-item <?php echo $index === 0 ? 'active' : ''; ?>" 
                     data-client-id="<?php echo htmlspecialchars($client['id'], ENT_QUOTES, 'UTF-8'); ?>"
                     data-name="<?php echo htmlspecialchars($client['name'], ENT_QUOTES, 'UTF-8'); ?>"
                     data-messages='<?php echo json_encode($client['messages']); ?>'>
                    <div class="fw-semibold small"><?php echo htmlspecialchars($client['name'], ENT_QUOTES, 'UTF-8'); ?></div>
                    <div class="text-muted small"><?php echo htmlspecialchars($client['lastMessage'], ENT_QUOTES, 'UTF-8'); ?></div>
                </div>
            <?php endforeach; ?>
        </aside>
        <section class="chat-main">
            <div class="border-bottom px-3 py-2 fw-semibold" id="chatHeader"><?php echo htmlspecialchars($clients[0]['name'], ENT_QUOTES, 'UTF-8'); ?></div>
            <div class="chat-messages" id="chatMessages"></div>
            <div class="border-top p-2 d-flex gap-2"><textarea id="chatInput" class="form-control" rows="1" placeholder="Type a reply..."></textarea><button id="chatSend" class="btn btn-primary">Send</button></div>
        </section>
    </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const chatSearch = document.getElementById('chatSearch');
        const chatItems = document.querySelectorAll('.chat-list-item');

        if (chatSearch) {
            chatSearch.addEventListener('input', function () {
                const query = this.value.toLowerCase().trim();
                chatItems.forEach(function (item) {
                    const matches = item.textContent.toLowerCase().includes(query);
                    item.style.display = matches ? '' : 'none';
                });

                const visibleActive = document.querySelector('.chat-list-item.active:not([style*="display: none"])');
                if (!visibleActive) {
                    const firstVisible = Array.from(chatItems).find(item => item.style.display !== 'none');
                    if (firstVisible) {
                        firstVisible.click();
                    }
                }
            });
        }
    });
</script>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
