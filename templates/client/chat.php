<?php
$pageTitle = 'Chat';
$activeNav = 'chat';
require TEMPLATES . '/partials/dashboard-top.php';

$firstChat = $chats[0] ?? null;
?>

<div class="chat-wrapper">
    <!-- Chat list sidebar -->
    <div class="chat-list">
        <div class="px-3 py-2 border-bottom fw-semibold small bg-light">Messages</div>
        <?php foreach ($chats as $chat): ?>
        <div class="chat-list-item <?= $chat === $firstChat ? 'active' : '' ?>"
             data-name="<?= h($chat['name']) ?>"
             data-messages="<?= h(json_encode($chat['messages'])) ?>">
            <div class="d-flex align-items-center gap-2">
                <div class="avatar-sm flex-shrink-0">
                    <?= h(strtoupper($chat['name'][0])) ?>
                </div>
                <div class="flex-grow-1 min-width-0">
                    <div class="small fw-medium text-truncate"><?= h($chat['name']) ?></div>
                    <div class="text-muted" style="font-size:.75rem;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                        <?= h($chat['lastMessage']) ?>
                    </div>
                </div>
                <div class="text-end flex-shrink-0">
                    <div style="font-size:.7rem;" class="text-muted"><?= h($chat['time']) ?></div>
                    <?php if ($chat['unread'] > 0): ?>
                    <span class="badge bg-primary rounded-pill mt-1"><?= $chat['unread'] ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Chat main area -->
    <div class="chat-main">
        <div class="px-3 py-2 border-bottom fw-semibold small bg-white" id="chatHeader">
            <?= h($firstChat['name'] ?? '') ?>
        </div>

        <div class="chat-messages" id="chatMessages">
            <?php if ($firstChat): foreach ($firstChat['messages'] as $msg): ?>
            <div class="d-flex <?= $msg['isOwn'] ? 'justify-content-end' : 'justify-content-start' ?> mb-2">
                <div class="chat-bubble <?= $msg['isOwn'] ? 'own' : 'other' ?>">
                    <p class="mb-0"><?= h($msg['text']) ?></p>
                    <p class="mb-0 small opacity-75 mt-1"><?= h($msg['time']) ?></p>
                </div>
            </div>
            <?php endforeach; endif; ?>
        </div>

        <div class="p-3 border-top d-flex gap-2">
            <input type="text" id="chatInput" class="form-control form-control-sm"
                   placeholder="Type a message...">
            <button class="btn btn-primary btn-sm px-3" id="chatSend">
                <i class="bi bi-send"></i>
            </button>
        </div>
    </div>
</div>

<?php require TEMPLATES . '/partials/dashboard-bottom.php'; ?>
