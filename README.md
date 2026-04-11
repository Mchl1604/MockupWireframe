# Coliconstruct Engineering Services (XAMPP Front-End Demo)

This project is now simplified for **XAMPP Apache (`htdocs`)** use.

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
index.php              # Main router + simple PHP page rendering
.htaccess              # Apache rewrite to index.php
assets/                # CSS + JS
src/                   # Helper/auth functions
```

## Navigation

Main pages:
- `/`
- `/login`
- `/register`
- `/client/projects`
- `/admin/dashboard`
- `/tech/schedule`

All links are configured to work from a XAMPP subfolder URL.
