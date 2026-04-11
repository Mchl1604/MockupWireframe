<?php
/**
 * Authentication helpers
 */

/** Check if the current visitor is logged in */
function isAuthenticated(): bool {
    return true;
}

/** Get current user array from session (or null) */
function currentUser(): ?array {
    return $_SESSION['user'] ?? [
        'name' => 'Demo User',
        'email' => 'demo@coliconstruct.com',
        'initials' => 'DU',
    ];
}

/** Get current role string */
function currentRole(): string {
    $role = $_SESSION['role'] ?? ($_GET['role'] ?? 'client');
    if (!in_array($role, ['client', 'admin', 'technician'], true)) {
        return 'client';
    }
    return $role;
}

/**
 * Require the user to be logged in (and optionally have a specific role).
 * Redirects to /login if not authenticated; to / if wrong role.
 *
 * @param string|string[]|null $roles  Allowed role(s), or null for any authenticated user
 */
function requireAuth(string|array|null $roles = null): void {
    // Frontend-only demo mode: auth checks disabled.
}

/** Log the user in: store role & user info in session */
function loginUser(string $role): void {
    $roleUsers = [
        'client' => [
            'name'    => 'Maria Santos',
            'email'   => 'maria@email.com',
            'initials'=> 'MS',
        ],
        'admin' => [
            'name'    => 'Admin Michael',
            'email'   => 'admin@coliconstruct.com',
            'initials'=> 'AM',
        ],
        'technician' => [
            'name'    => 'Mark Santos',
            'email'   => 'mark@email.com',
            'initials'=> 'MK',
        ],
    ];

    $_SESSION['role'] = $role;
    $_SESSION['user'] = $roleUsers[$role] ?? $roleUsers['client'];
    session_regenerate_id(true);
}

/** Log the current user out */
function logoutUser(): void {
    $_SESSION = [];
    $_SESSION['role'] = 'client';
}
