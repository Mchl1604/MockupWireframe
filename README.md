# Coliconstruct Engineering Services (XAMPP Front-End Demo)

This project is simplified for **XAMPP Apache (`htdocs`)** use.
It supports **PHP 7.4+**.

## XAMPP Setup

1. Copy this folder to:
   - `C:\xampp\htdocs\MockupWireframe`
2. Start **Apache** in XAMPP.
3. Open:
   - `http://localhost/MockupWireframe/`

No database, Composer, or Node.js is required.

## Local PHP Server (optional)

```bash
cd /path/to/MockupWireframe
php -S localhost:8000 index.php
```

Open `http://localhost:8000`.

## Simplified Structure

```
index.php              # Simple router
pages/                 # Main pages
includes/              # Shared partials (head, navbar, footer)
assets/                # CSS + JS
```

## Navigation

Main pages:
- `/`
- `/login`
- `/register`
- `/client/projects`
- `/admin/dashboard`
- `/tech/schedule`
