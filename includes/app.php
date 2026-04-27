<?php
$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
$scriptDir = rtrim($scriptDir, '/');
if ($scriptDir === '.' || $scriptDir === '/') {
    $scriptDir = '';
}
$baseUrl = $scriptDir;

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

function app_normalize_path(string $path): string
{
    $path = '/' . ltrim($path, '/');
    $path = preg_replace('#/+#', '/', $path) ?? $path;

    return rtrim($path, '/') ?: '/';
}

function app_current_path(): string
{
    global $baseUrl;

    $requestPath = isset($_GET['route']) ? (string) $_GET['route'] : (parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/');
    if ($baseUrl !== '' && strpos($requestPath, $baseUrl) === 0) {
        $requestPath = substr($requestPath, strlen($baseUrl));
    }

    return app_normalize_path($requestPath);
}

function app_url(string $path = '/', array $query = []): string
{
    global $baseUrl;

    $url = ($baseUrl !== '' ? $baseUrl : '') . '/index.php?route=' . rawurlencode(app_normalize_path($path));

    if (!empty($query)) {
        $url .= '&' . http_build_query($query);
    }

    return $url;
}

function app_is_panel_role(string $role): bool
{
    return in_array($role, ['admin', 'client', 'tech', 'lead-technician'], true);
}

function app_is_technician_role(string $role): bool
{
    return in_array($role, ['tech', 'lead-technician'], true);
}

function app_role_label(string $role): string
{
    return $role === 'lead-technician' ? 'Lead Technician' : ucfirst($role);
}

function app_compose_full_name(string $firstName, string $lastName): string
{
    $fullName = trim($firstName . ' ' . $lastName);

    return $fullName !== '' ? $fullName : 'User';
}

function app_technician_specialty_options(): array
{
    return [
        'aircon installation',
        'aircon repair',
        'aircon cleaning',
        'ducting fabrication',
        'ducting installation',
    ];
}

function app_normalize_specialties($specialties): array
{
    if (!is_array($specialties)) {
        return [];
    }

    $allowedSpecialties = app_technician_specialty_options();
    $normalized = [];

    foreach ($specialties as $specialty) {
        $specialty = trim((string) $specialty);
        if ($specialty === '' || !in_array($specialty, $allowedSpecialties, true)) {
            continue;
        }

        $normalized[] = $specialty;
    }

    return array_values(array_unique($normalized));
}

function app_split_name(string $name): array
{
    $name = trim($name);
    if ($name === '') {
        return ['', ''];
    }

    $parts = preg_split('/\s+/', $name) ?: [];
    if (count($parts) === 1) {
        return [$parts[0], ''];
    }

    $lastName = (string) array_pop($parts);
    $firstName = trim(implode(' ', $parts));

    return [$firstName, $lastName];
}

function app_default_user_profile(string $role): array
{
    $profileByRole = [
        'admin' => [
            'first_name' => 'Michael',
            'last_name' => 'Capanayan',
            'email' => 'admin@coliconstruct.local',
            'contact_number' => '09171234567',
            'address' => 'General Mariano Alvarez, Cavite',
            'password_hash' => password_hash('password123', PASSWORD_DEFAULT),
        ],
        'client' => [
            'first_name' => 'Juan',
            'last_name' => 'Dela Cruz',
            'email' => 'client@coliconstruct.local',
            'contact_number' => '09179876543',
            'address' => 'Quezon City, Metro Manila',
            'password_hash' => password_hash('password123', PASSWORD_DEFAULT),
        ],
        'tech' => [
            'first_name' => 'Carlos',
            'last_name' => 'Reyes',
            'email' => 'tech@coliconstruct.local',
            'contact_number' => '09175554444',
            'address' => 'Bacoor, Cavite',
            'specialties' => ['aircon repair', 'aircon cleaning'],
            'password_hash' => password_hash('password123', PASSWORD_DEFAULT),
        ],
        'lead-technician' => [
            'first_name' => 'Mark',
            'last_name' => 'Santos',
            'email' => 'leadtech@coliconstruct.local',
            'contact_number' => '09176667777',
            'address' => 'Dasmarinas, Cavite',
            'specialties' => ['aircon installation', 'ducting fabrication'],
            'password_hash' => password_hash('password123', PASSWORD_DEFAULT),
        ],
    ];

    return $profileByRole[$role] ?? [
        'first_name' => 'User',
        'last_name' => '',
        'email' => 'user@coliconstruct.local',
        'contact_number' => '',
        'address' => '',
        'specialties' => [],
        'password_hash' => password_hash('password123', PASSWORD_DEFAULT),
    ];
}

function app_get_user_profile(string $role): array
{
    $defaults = app_default_user_profile($role);
    $sessionProfile = $_SESSION['mockup_profiles'][$role] ?? [];
    if (!is_array($sessionProfile)) {
        $sessionProfile = [];
    }

    $sessionFirstName = trim((string) ($sessionProfile['first_name'] ?? ''));
    $sessionLastName = trim((string) ($sessionProfile['last_name'] ?? ''));
    $sessionLegacyName = trim((string) ($sessionProfile['name'] ?? ''));

    if (($sessionFirstName === '' || $sessionLastName === '') && $sessionLegacyName !== '') {
        [$legacyFirstName, $legacyLastName] = app_split_name($sessionLegacyName);
        if ($sessionFirstName === '') {
            $sessionFirstName = $legacyFirstName;
        }
        if ($sessionLastName === '') {
            $sessionLastName = $legacyLastName;
        }
    }

    $email = trim((string) ($sessionProfile['email'] ?? ''));
    $contactNumber = trim((string) ($sessionProfile['contact_number'] ?? ''));
    $address = trim((string) ($sessionProfile['address'] ?? ''));
    $defaultSpecialties = app_normalize_specialties($defaults['specialties'] ?? []);
    $sessionSpecialties = app_normalize_specialties($sessionProfile['specialties'] ?? []);

    $firstName = $sessionFirstName !== '' ? $sessionFirstName : (string) $defaults['first_name'];
    $lastName = $sessionLastName !== '' ? $sessionLastName : (string) $defaults['last_name'];
    $safeEmail = filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : (string) $defaults['email'];
    $safeContactNumber = $contactNumber !== '' ? $contactNumber : (string) $defaults['contact_number'];
    $safeAddress = $address !== '' ? $address : (string) $defaults['address'];
    $safeSpecialties = app_is_technician_role($role)
        ? ($sessionSpecialties !== [] ? $sessionSpecialties : $defaultSpecialties)
        : [];

    return [
        'first_name' => $firstName,
        'last_name' => $lastName,
        'name' => app_compose_full_name($firstName, $lastName),
        'email' => $safeEmail,
        'contact_number' => $safeContactNumber,
        'address' => $safeAddress,
        'specialties' => $safeSpecialties,
    ];
}

function app_get_user_password_hash(string $role): string
{
    $defaults = app_default_user_profile($role);
    $sessionProfile = $_SESSION['mockup_profiles'][$role] ?? [];

    if (is_array($sessionProfile) && isset($sessionProfile['password_hash']) && is_string($sessionProfile['password_hash'])) {
        return $sessionProfile['password_hash'];
    }

    return (string) ($defaults['password_hash'] ?? password_hash('password123', PASSWORD_DEFAULT));
}

function app_verify_old_password(string $role, string $plainPassword): bool
{
    $hash = app_get_user_password_hash($role);

    return password_verify($plainPassword, $hash);
}

function app_update_user_profile(
    string $role,
    string $firstName,
    string $lastName,
    string $email,
    string $contactNumber,
    string $address,
    ?string $newPassword = null,
    ?array $specialties = null
): void
{
    if (!isset($_SESSION['mockup_profiles']) || !is_array($_SESSION['mockup_profiles'])) {
        $_SESSION['mockup_profiles'] = [];
    }

    $existing = $_SESSION['mockup_profiles'][$role] ?? [];
    $defaults = app_default_user_profile($role);

    $passwordHash = (string) ($defaults['password_hash'] ?? password_hash('password123', PASSWORD_DEFAULT));
    if (is_array($existing) && isset($existing['password_hash']) && is_string($existing['password_hash'])) {
        $passwordHash = $existing['password_hash'];
    }

    $profile = [
        'first_name' => $firstName,
        'last_name' => $lastName,
        'name' => app_compose_full_name($firstName, $lastName),
        'email' => $email,
        'contact_number' => $contactNumber,
        'address' => $address,
        'specialties' => app_is_technician_role($role)
            ? app_normalize_specialties($specialties ?? ($existing['specialties'] ?? $defaults['specialties'] ?? []))
            : [],
        'password_hash' => $passwordHash,
    ];

    if ($newPassword !== null && $newPassword !== '') {
        $profile['password_hash'] = password_hash($newPassword, PASSWORD_DEFAULT);
    }

    $_SESSION['mockup_profiles'][$role] = $profile;
}
