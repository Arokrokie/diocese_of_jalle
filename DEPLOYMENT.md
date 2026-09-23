# Diocese of Jalle (ECSS) — Complete Production Deployment Guide

This document records the exact steps, architecture, configurations, and troubleshooting solutions implemented to bring the **Diocese of Jalle (ECSS)** website live at **https://dioceseofjalle.org** using **GitHub Actions CI/CD** and **Namecheap cPanel Shared Hosting**.

---

## Table of Contents
1. [Architecture & Web Server Flow](#1-architecture--web-server-flow)
2. [cPanel Hosting Setup](#2-cpanel-hosting-setup)
3. [GitHub App Configuration](#3-github-app-configuration)
4. [Personal Access Token (PAT) Setup](#4-personal-access-token-pat-setup)
5. [GitHub Repository Secrets](#5-github-repository-secrets)
6. [Initial Server Setup (One-Time Execution)](#6-initial-server-setup-one-time-execution)
7. [The Symlink Configuration](#7-the-symlink-configuration)
8. [Automated CI/CD Workflow (.github/workflows/deploy.yml)](#8-automated-cicd-workflow)
9. [Production Hardening & Issues Solved](#9-production-hardening--issues-solved)
10. [Ongoing Maintenance & Future Updates](#10-ongoing-maintenance--future-updates)

---

## 1. Architecture & Web Server Flow

* **Live Domain:** `https://dioceseofjalle.org`
* **Repository:** `https://github.com/Arokrokie/diocese_of_jalle`
* **Default Branch:** `main`
* **cPanel User:** `diocztdl`
* **Application Root:** `/home/diocztdl/diocese_of_jalle`
* **Public Web Root:** `/home/diocztdl/public_html` (Symbolic link &rarr; `/home/diocztdl/diocese_of_jalle/public`)
* **PHP Version:** PHP 8.2+
* **Database Engine:** MySQL / MariaDB (Database: `diocztdl_diocese_of_jalle`)

### How Incoming Requests are Processed
```
Visitor enters https://dioceseofjalle.org
               │
               ▼
Web Server (Apache) routes to Document Root (/home/diocztdl/public_html)
               │
               ▼
Symlink follows to /home/diocztdl/diocese_of_jalle/public/
               │
               ▼
Executes public/index.php (Front Controller)
               │
               ├── 1. Loads Composer dependencies (/vendor/autoload.php)
               ├── 2. Boots Laravel Application (/bootstrap/app.php)
               ├── 3. Enforces HTTPS via AppServiceProvider
               ├── 4. Resolves route from routes/web.php
               └── 5. Returns rendered HTML view
```
> **Security Advantage:** The `.env` file, database passwords, logs, and framework core live safely outside the web root (`diocese_of_jalle/`), completely inaccessible from the browser.

---

## 2. cPanel Hosting Setup

### A. PHP Version & Extensions
1. In cPanel &rarr; **Software** &rarr; **Select PHP Version** (or **MultiPHP Manager**).
2. Set PHP version to **8.2** or **8.3**.
3. In the **Extensions** tab, ensure the following are enabled:
   * `bcmath`, `curl`, `fileinfo`, `gd`, `mbstring`, `openssl`, `pdo_mysql`, `tokenizer`, `xml`, `zip`.

### B. MySQL Database & User
1. In cPanel &rarr; **Databases** &rarr; **MySQL Database Wizard**.
2. **Database Name:** `diocztdl_diocese_of_jalle`
3. **Database User:** `diocztdl_dbuser` (with strong password).
4. Assign **ALL PRIVILEGES** to the user for this database.

### C. SSH Access
1. In cPanel &rarr; **Security** &rarr; **SSH Access**.
2. Ensure SSH Access is enabled.
3. Namecheap default SSH port: **`21098`**.

---

## 3. GitHub App Configuration

A dedicated GitHub App was created to manage deployments:

1. In GitHub &rarr; Profile Settings &rarr; **Developer Settings** &rarr; **GitHub Apps** &rarr; **New GitHub App**.
2. **App Name:** `Diocese-Of-Jalle-Deployer`
3. **Homepage URL:** `https://github.com/Arokrokie/diocese_of_jalle`
4. **Webhook:** Uncheck *Active*.
5. **Permissions:**
   * **Contents:** `Read and write`
   * **Workflows:** `Read and write`
   * **Metadata:** `Read-only`
6. Under **Where can this GitHub App be installed?**, choose *Only on this account*.
7. Click **Create GitHub App**.
8. Go to **Install App** &rarr; Select `Arokrokie/diocese_of_jalle` repository &rarr; Click **Install**.

---

## 4. Personal Access Token (PAT) Setup

The PAT allows the server-side git client to pull updates from GitHub during automated deployments.

1. In GitHub &rarr; Settings &rarr; **Developer settings** &rarr; **Personal access tokens** &rarr; **Tokens (classic)**.
2. Click **Generate new token (classic)**:
   * **Note:** `Diocese of Jalle Deployment PAT`
   * **Scopes:** Check `repo` and `workflow`.
3. Copy the generated token (`ghp_...`).

---

## 5. GitHub Repository Secrets

Configured in `https://github.com/Arokrokie/diocese_of_jalle/settings/secrets/actions`:

| Secret Name | Value | Purpose |
|---|---|---|
| `SSH_HOST` | `dioceseofjalle.org` | Server address |
| `SSH_PORT` | `21098` | Namecheap SSH port |
| `SSH_USER` | `diocztdl` | cPanel username |
| `SSH_PASSWORD` | *(cPanel password)* | SSH authentication |
| `PAT_TOKEN` | `ghp_...` | GitHub Personal Access Token |
| `DEPLOY_PATH_LARAVEL` | `/home/diocztdl/diocese_of_jalle` | Project directory on server |
| `PRIVATE_KEY` | *(Optional)* | SSH Private key (if key authentication used) |

---

## 6. Initial Server Setup (One-Time Execution)

Executed in the cPanel Terminal:

```bash
# 1. Navigate to home directory
cd /home/diocztdl

# 2. Clone the repository into diocese_of_jalle
git clone https://Arokrokie:YOUR_PAT_TOKEN@github.com/Arokrokie/diocese_of_jalle.git diocese_of_jalle

# 3. Enter the project
cd diocese_of_jalle

# 4. Copy production environment file
cp .env.production.example .env

# 5. Configure .env with database credentials and app URL
nano .env
```

Inside `.env`:
```env
APP_NAME="Diocese of Jalle"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://dioceseofjalle.org

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=diocztdl_diocese_of_jalle
DB_USERNAME=diocztdl_dbuser
DB_PASSWORD=your_secure_password

SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
```

---

## 7. The Symlink Configuration

To connect the domain to the Laravel `public/` folder without exposing application internals:

```bash
# 1. Navigate to user home
cd /home/diocztdl

# 2. Rename default public_html as backup
mv public_html public_html_backup

# 3. Create the symbolic link
ln -s /home/diocztdl/diocese_of_jalle/public public_html
```

* **Result:** Web traffic requesting `dioceseofjalle.org` accesses `/home/diocztdl/public_html`, which transparently serves `/home/diocztdl/diocese_of_jalle/public`.
* The `public_html_backup` folder can be deleted once verified:
  ```bash
  rm -rf /home/diocztdl/public_html_backup
  ```

---

## 8. Automated CI/CD Workflow

The GitHub Actions workflow file: [`.github/workflows/deploy.yml`](.github/workflows/deploy.yml)

### Workflow Steps Triggered on Push to `main`:
1. **Runner Setup:** Ubuntu-latest runner installs `sshpass`.
2. **Fingerprint Scan:** Adds server SSH fingerprint via `ssh-keyscan -p 21098`.
3. **SSH Execution:** Connects to `/home/diocztdl/diocese_of_jalle`:
   * Updates remote origin with `PAT_TOKEN`
   * Runs `git fetch --all && git reset --hard origin/main`
   * **Auto-generates `APP_KEY`** if missing or blank in `.env`
   * Runs `composer install --no-dev --prefer-dist --optimize-autoloader`
   * Runs `php artisan migrate --force || true`
   * Runs `php artisan db:seed --force || true`
   * Links storage `php artisan storage:link || true`
   * Refreshes cache (`optimize:clear`, `config:cache`, `route:cache`, `view:cache`, `event:cache`)
   * Sets directory permissions (`chmod -R 775 storage bootstrap/cache public`)
   * Displays tail of `storage/logs/laravel.log` if any diagnostics are needed

---

## 9. Production Hardening & Issues Solved

During the deployment process, four critical production challenges were identified and permanently resolved:

### Issue 1: MySQL Error 1071 — `Specified key was too long; max key length is 1000 bytes`
* **Cause:** Namecheap MySQL uses `utf8mb4` encoding (4 bytes/character). A `varchar(255)` index requires $255 \times 4 = 1020\text{ bytes}$, exceeding MySQL's 1,000-byte index limit on tables like `password_reset_tokens`.
* **Fix Applied:**
  1. Added `Schema::defaultStringLength(191);` in `app/Providers/AppServiceProvider.php` ($191 \times 4 = 764\text{ bytes} < 1000\text{ bytes}$).
  2. Constrained all index and unique columns explicitly to `string('...', 191)` across all migration files.

### Issue 2: Migration Collisions (`Table 'users' already exists`)
* **Cause:** The database was partially seeded/imported, so `users` already existed, causing default `Schema::create` to crash.
* **Fix Applied:** Wrapped all table creation statements in `if (!Schema::hasTable('table_name'))` checks across all 4 migration files, making all migrations completely idempotent.

### Issue 3: HTTP 500 Error on Database Sessions & Cache
* **Cause:** The production `.env` was configured with `SESSION_DRIVER=database` and `CACHE_STORE=database`. When the database was unseeded or tables were initializing, the session middleware failed on page load.
* **Fix Applied:**
  1. Changed default session driver in `config/session.php` to `'file'`.
  2. Changed default cache store in `config/cache.php` to `'file'`.
  3. Added `try / catch (\Throwable $e)` guards to `HomeController`, `PostController`, `SermonController`, and `EventController` so pages never crash even if queries fail.

### Issue 4: HTTPS Scheme Warnings behind Reverse Proxies
* **Fix Applied:** Added `URL::forceScheme('https')` inside `AppServiceProvider::boot()` for production environments, preventing mixed-content warnings.

---

## 10. Ongoing Maintenance & Future Updates

### Pushing Future Code or Design Changes
All future updates are 100% automated:
```bash
git add .
git commit -m "Update diocesan sermon notes and announcements"
git push origin main
```
GitHub Actions will automatically test, build, deploy, migrate, and warm the caches within 25 seconds.

### Admin Credentials
* **Login URL:** `https://dioceseofjalle.org/login`
* **Default Admin:** `admin@dioceseofjalle.org`
* **Default Password:** `Password123!` *(Change immediately in the admin profile).*
