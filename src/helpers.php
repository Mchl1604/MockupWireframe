<?php
/**
 * Helper utilities for Coliconstruct PHP app
 */

/** HTML-escape a value for safe output */
function h(?string $v): string {
    return htmlspecialchars((string)$v, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/** Format a peso amount */
function peso(int|float $amount): string {
    return '₱' . number_format($amount);
}

/** Generate (or reuse) a CSRF token for the current session */
function csrfToken(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/** Render a hidden CSRF input field */
function csrfField(): string {
    return '<input type="hidden" name="csrf_token" value="' . h(csrfToken()) . '">';
}

/** Validate the CSRF token from a POST request; die on failure */
function validateCsrf(): void {
    $token = $_POST['csrf_token'] ?? '';
    if (!hash_equals(csrfToken(), $token)) {
        http_response_code(403);
        exit('Invalid CSRF token.');
    }
}

/** Redirect to a URL and exit */
function redirect(string $url): never {
    header('Location: ' . $url);
    exit;
}

/** Return a Bootstrap badge for a given status string */
function statusBadge(string $status): string {
    $map = [
        // Project statuses
        'Ongoing'       => 'bg-primary',
        'Completed'     => 'bg-success',
        'To be Approved'=> 'bg-warning text-dark',
        // Request statuses
        'Pending'       => 'bg-warning text-dark',
        'Approved'      => 'bg-success',
        'Rejected'      => 'bg-danger',
        // Technician statuses
        'Available'     => 'bg-success',
        'On Project'    => 'bg-primary',
        // Report types
        'Assessment'    => 'bg-info text-dark',
        'Progress'      => 'bg-primary',
        'Incident'      => 'bg-danger',
        // Attendance
        'Present'       => 'bg-success',
        'Late'          => 'bg-warning text-dark',
        'Absent'        => 'bg-danger',
        // User
        'Active'        => 'bg-success',
        'Inactive'      => 'bg-secondary',
        // Roles
        'Client'        => 'bg-secondary',
        'Admin'         => 'bg-primary',
        'Technician'    => 'bg-info text-dark',
    ];
    $cls = $map[$status] ?? 'bg-secondary';
    return '<span class="badge ' . $cls . '">' . h($status) . '</span>';
}

/** Get the initials from a full name (up to 2 chars) */
function initials(string $name): string {
    $parts = explode(' ', trim($name));
    $result = '';
    foreach ($parts as $part) {
        if ($part !== '') $result .= strtoupper($part[0]);
        if (strlen($result) >= 2) break;
    }
    return $result ?: '?';
}
