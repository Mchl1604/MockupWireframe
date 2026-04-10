# Coliconstruct Engineering Services

A PHP + Bootstrap web application for managing HVAC service requests, projects,
technicians, and reports. It supports three user roles: **Client**, **Admin**,
and **Technician**.

---

## Quick Start (Local)

### Requirements
- PHP 8.1 or higher (with session support – default)
- No database, no Composer, no Node.js required

### Run with PHP built-in server

```bash
# From the project root:
cd public
php -S localhost:8000 index.php
```

Then open **http://localhost:8000** in your browser.

### Demo Credentials

On the login page, pick any role using the demo role buttons:

| Role        | Redirects to       |
|-------------|--------------------|
| Client      | `/client/projects` |
| Admin       | `/admin/dashboard` |
| Technician  | `/tech/schedule`   |

Any email and password are accepted (demo mode).

---

## Project Structure

```
public/               ← Web root (only this directory is exposed)
  index.php           ← Router / front controller
  assets/
    css/app.css       ← Custom styles
    js/app.js         ← Vanilla JS (sidebar, chat, forms, clock)

src/
  data.php            ← Mock data (projects, requests, technicians …)
  helpers.php         ← h(), statusBadge(), peso(), csrfField() …
  auth.php            ← Session-based auth helpers

templates/
  partials/           ← Shared partials (head, sidebar, footer, layout)
  landing.php         ← Public landing page
  login.php           ← Login page
  register.php        ← Registration page
  client/             ← Client portal templates
  admin/              ← Admin panel templates
  tech/               ← Technician portal templates
  404.php             ← Not-found page

docs/
  migration.md        ← Feature-by-feature migration map from the old stack

legacy/               ← Original React/TypeScript/Vite source (archived)
```

---

## Features

### All Roles
- Responsive Bootstrap 5 sidebar layout with mobile toggle
- Session-based authentication with CSRF protection on forms

### Client Portal
- **Request Service** – select service type, fill in details, view required materials
- **My Projects** – list of projects with status badges
- **Project Details** – technicians, materials, quotation summary, reports
- **Chat** – two-pane chat interface with live message sending

### Admin Panel
- **Dashboard** – stat cards + bar chart + project status progress bars
- **Service Requests** – table with view/approve/reject actions and modal detail
- **Quotations** – table with clickable rows to open quotation modal
- **Projects** – full project list with detail view
- **Schedules** – April 2026 calendar grid with color-coded events
- **Technicians** – list with skills and status
- **Reports** – list with per-report view modal
- **Materials** – list with add-material modal
- **Users** – user management table with add-user modal
- **Chat** – same two-pane chat interface

### Technician Portal
- **My Schedule** – calendar view
- **My Projects** – project list and detail view
- **Submit Report** – form with project selection, type, description, materials used, and image upload area
- **Attendance** – live clock + time-in/time-out + history table

---

## Deploy to Apache / Nginx

### Apache (`.htaccess` in `public/`)

```apache
Options -Indexes
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [L]
```

### Nginx

```nginx
root /path/to/project/public;
index index.php;

location / {
    try_files $uri $uri/ /index.php?$query_string;
}

location ~ \.php$ {
    fastcgi_pass unix:/run/php/php8.1-fpm.sock;
    include fastcgi_params;
    fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
}
```

---

## Environment Configuration

Copy `.env.example` to `.env` and adjust values if needed.  
The built-in PHP server doesn't auto-load `.env` — configure vars in your web
server or shell environment, or load them via `vlucas/phpdotenv` (optional).

---

## Security

| Concern          | Implementation                                              |
|------------------|-------------------------------------------------------------|
| XSS              | All output via `h()` (`htmlspecialchars`)                   |
| CSRF             | Token stored in session, validated on every POST            |
| Session fixation | `session_regenerate_id(true)` on login                      |
| Path traversal   | Only `public/` is web-accessible; PHP source is outside     |

---

## Legacy Code

The original React/TypeScript/Vite source is preserved under `legacy/` for
reference. It is not used by the PHP application.

See [`docs/migration.md`](docs/migration.md) for a full feature mapping.
