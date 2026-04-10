# docs/migration.md — Feature Migration Map

This document maps every feature in the original React/TypeScript application
to its equivalent implementation in the new PHP + Bootstrap web application.

---

## Stack Change

| Layer      | Old (legacy/)                         | New                                 |
|------------|---------------------------------------|-------------------------------------|
| Language   | TypeScript / React 18 / Vite          | PHP 8.1+                            |
| Routing    | react-router-dom (SPA)                | PHP router (`public/index.php`)     |
| UI         | Radix UI + Tailwind CSS               | Bootstrap 5.3 + Bootstrap Icons     |
| State      | React hooks / TanStack Query          | PHP session + server-rendered HTML  |
| Data       | In-memory TS arrays (mock data)       | PHP arrays in `src/data.php`        |
| Build tool | Vite                                  | None – plain PHP                    |
| Testing    | Vitest + Testing Library              | N/A (demo app, no persistence)      |

---

## Page / Route Mapping

### Public Pages

| Feature          | Old route    | New route     | Template                        |
|------------------|-------------|---------------|---------------------------------|
| Landing page     | `/`          | `/`           | `templates/landing.php`         |
| Login            | `/login`     | `/login`      | `templates/login.php`           |
| Register         | `/register`  | `/register`   | `templates/register.php`        |
| 404              | `*`          | (fallback)    | `templates/404.php`             |

---

### Client Portal

| Feature             | Old route                    | New route                        | Template                                |
|---------------------|------------------------------|----------------------------------|-----------------------------------------|
| Request Service     | `/client/request`            | `/client/request`                | `templates/client/request.php`          |
| My Projects (list)  | `/client/projects`           | `/client/projects`               | `templates/client/projects.php`         |
| Project Details     | `/client/projects/:id`       | `/client/project?id=PRJ-001`     | `templates/client/project-details.php`  |
| Chat                | `/client/chat`               | `/client/chat`                   | `templates/client/chat.php`             |

---

### Admin Panel

| Feature             | Old route                    | New route                        | Template                                |
|---------------------|------------------------------|----------------------------------|-----------------------------------------|
| Dashboard           | `/admin/dashboard`           | `/admin/dashboard`               | `templates/admin/dashboard.php`         |
| Service Requests    | `/admin/requests`            | `/admin/requests`                | `templates/admin/requests.php`          |
| Quotations          | `/admin/quotations`          | `/admin/quotations`              | `templates/admin/quotations.php`        |
| Projects (list)     | `/admin/projects`            | `/admin/projects`                | `templates/admin/projects.php`          |
| Project Details     | `/admin/projects/:id`        | `/admin/project?id=PRJ-001`      | `templates/admin/project-details.php`   |
| Schedules           | `/admin/schedules`           | `/admin/schedules`               | `templates/admin/schedules.php`         |
| Technicians         | `/admin/technicians`         | `/admin/technicians`             | `templates/admin/technicians.php`       |
| Reports             | `/admin/reports`             | `/admin/reports`                 | `templates/admin/reports.php`           |
| Materials           | `/admin/materials`           | `/admin/materials`               | `templates/admin/materials.php`         |
| Users               | `/admin/users`               | `/admin/users`                   | `templates/admin/users.php`             |
| Chat                | `/admin/chat`                | `/admin/chat`                    | `templates/admin/chat.php`              |

---

### Technician Portal

| Feature             | Old route                    | New route                        | Template                                |
|---------------------|------------------------------|----------------------------------|-----------------------------------------|
| My Schedule         | `/tech/schedule`             | `/tech/schedule`                 | `templates/tech/schedule.php`           |
| My Projects (list)  | `/tech/projects`             | `/tech/projects`                 | `templates/tech/projects.php`           |
| Project Details     | `/tech/projects/:id`         | `/tech/project?id=PRJ-001`       | `templates/tech/project-details.php`    |
| Submit Report       | `/tech/reports`              | `/tech/reports`                  | `templates/tech/reports.php`            |
| Attendance          | `/tech/attendance`           | `/tech/attendance`               | `templates/tech/attendance.php`         |

---

## Component Mapping

| Old Component                        | New Implementation                          |
|--------------------------------------|---------------------------------------------|
| `AppSidebar.tsx`                     | `templates/partials/sidebar.php`            |
| `DashboardLayout.tsx`                | `dashboard-top.php` + `dashboard-bottom.php`|
| `StatusBadge.tsx`                    | `statusBadge()` in `src/helpers.php`        |
| `ChatInterface.tsx`                  | Inline in `**/chat.php` + `app.js`          |
| `CalendarGrid.tsx`                   | Inline in `**/schedules.php` / `schedule.php` |
| `mockData.ts`                        | `src/data.php`                              |

---

## Auth

| Old                                              | New                                                    |
|--------------------------------------------------|--------------------------------------------------------|
| Demo role selector on login page                 | Same: radio buttons set `$_SESSION['role']`            |
| Navigation guarded by React Router               | PHP `requireAuth()` redirects unauthenticated users    |
| No real credentials (demo)                       | Same: any email/password accepted, role chosen by demo |

---

## Security Measures Added (PHP version)

| Concern          | Implementation                                                      |
|------------------|---------------------------------------------------------------------|
| XSS              | All output wrapped in `h()` (`htmlspecialchars`)                    |
| CSRF             | `csrfField()` / `validateCsrf()` on every POST form                |
| Session fixation | `session_regenerate_id(true)` on login                              |
| Directory access | Only `public/` is the web root; `src/` and `templates/` are outside |

---

## What's Not Persisted (Demo)

The original app had no database and reset on every page refresh. The PHP version
behaves identically — all data lives in `src/data.php` arrays. To add real
persistence, replace the arrays with SQLite queries (using PHP's `PDO` extension)
and run a migration script to seed the initial data.
