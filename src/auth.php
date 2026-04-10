<?php
/**
 * Authentication helpers
 */

/** Check if the current visitor is logged in */
function isAuthenticated(): bool {
    return !empty($_SESSION['role']) && !empty($_SESSION['user']);
}

/** Get current user array from session (or null) */
function currentUser(): ?array {
    return $_SESSION['user'] ?? null;
}

/** Get current role string */
function currentRole(): string {
    return $_SESSION['role'] ?? '';
}

/**
 * Require the user to be logged in (and optionally have a specific role).
 * Redirects to /login if not authenticated; to / if wrong role.
 *
 * @param string|string[]|null $roles  Allowed role(s), or null for any authenticated user
 */
function requireAuth(string|array|null $roles = null): void {
    if (!isAuthenticated()) {
        redirect('/login');
    }
    if ($roles !== null) {
        $allowed = (array)$roles;
        if (!in_array(currentRole(), $allowed, true)) {
            redirect('/');
        }
    }
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
    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params['path'], $params['domain'],
            $params['secure'], $params['httponly']
        );
    }
    session_destroy();
}
