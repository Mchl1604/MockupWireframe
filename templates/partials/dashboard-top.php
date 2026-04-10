<!DOCTYPE html>
<html lang="en">
<head>
<?php require TEMPLATES . '/partials/head.php'; ?>
</head>
<body class="dashboard-body">
<div class="dashboard-wrapper">
    <!-- Sidebar overlay (mobile) -->
    <div id="sidebarOverlay" class="sidebar-overlay"></div>

    <?php
    // Make $role available to the sidebar partial from session
    $role = currentRole();
    require TEMPLATES . '/partials/sidebar.php';
    ?>

    <!-- Main content area -->
    <div class="dashboard-main" id="dashboardMain">
        <!-- Top bar -->
        <header class="topbar d-flex align-items-center px-3 py-2 border-bottom bg-white">
            <button class="btn btn-sm btn-outline-secondary me-3" id="sidebarToggle" aria-label="Toggle sidebar">
                <i class="bi bi-list fs-5"></i>
            </button>
            <h6 class="mb-0 fw-semibold"><?= h($pageTitle ?? '') ?></h6>
        </header>

        <!-- Page content -->
        <main class="p-4">
