# Comprehensive Deployment Guide: GitHub Actions to Namecheap cPanel

This guide provides the complete, step-by-step instructions for deploying the **Diocese of Jalle (ECSS)** website to **Namecheap cPanel Hosting** with automated CI/CD via **GitHub Actions**.

Whenever changes are pushed to the `main` branch on GitHub, GitHub Actions will automatically connect to your Namecheap server, pull the latest code, install dependencies, run migrations, re-cache performance assets, and enforce strict file permissions.

---

## Table of Contents
1. [Overview & Architecture](#1-overview--architecture)
2. [cPanel Hosting Setup](#2-cpanel-hosting-setup)
3. [GitHub App Configuration](#3-github-app-configuration)
4. [Personal Access Token (PAT) Generation](#4-personal-access-token-pat-generation)
5. [Configuring GitHub Repository Secrets](#5-configuring-github-repository-secrets)
6. [Initial Server Setup (One-Time Execution)](#6-initial-server-setup-one-time-execution)
7. [Automated Task Scheduling (Cron Jobs)](#7-automated-task-scheduling-cron-jobs)
8. [SSL Certificate Activation](#8-ssl-certificate-activation)
9. [Deployment Workflow & Verification](#9-deployment-workflow--verification)
10. [Troubleshooting Common Issues](#10-troubleshooting-common-issues)

---

## 1. Overview & Architecture

* **Repository:** `https://github.com/Arokrokie/diocese_of_jalle`
* **Trigger Branch:** `main`
* **Workflow File:** `.github/workflows/deploy.yml`
* **Server Environment:** Namecheap cPanel (Linux / Apache / MySQL / PHP 8.2+)
* **Deployment Method:** SSH via GitHub Actions runner with `sshpass`

```
Developer Push to 'main'
         │
         ▼
GitHub Actions CI/CD (.github/workflows/deploy.yml)
         │
         ▼
Secure SSH Connection to Namecheap (Port 21098)
         │
         ├── Git remote update with PAT
         ├── git fetch & reset to origin/main
         ├── composer install --no-dev --optimize-autoloader
         ├── php artisan migrate --force
         ├── php artisan storage:link
         ├── php artisan optimize:clear && php artisan config:cache
         ├── php artisan route:cache && php artisan view:cache
         └── chmod -R 775 storage bootstrap/cache public
```

---

## 2. cPanel Hosting Setup

### A. Set PHP Version & Required Extensions
1. Log in to your **Namecheap cPanel**.
2. Under **Software**, click **Select PHP Version** (or **MultiPHP Manager**).
3. Select **PHP 8.2** (or **PHP 8.3**).
4. In the **Extensions** tab, verify that these core extensions are enabled:
   * `bcmath`
   * `curl`
   * `fileinfo`
   * `gd`
   * `mbstring`
   * `openssl`
   * `pdo_mysql`
   * `tokenizer`
   * `xml`
   * `zip`

### B. Create MySQL Database & User
1. In cPanel, navigate to **Databases** &rarr; **MySQL Database Wizard**.
2. **Step 1:** Enter a database name (e.g. `username_jalle`). Click **Next Step**.
3. **Step 2:** Create a database user (e.g. `username_jalleuser`) and generate a strong password. Save the password securely.
4. **Step 3:** Check **ALL PRIVILEGES** and click **Make Changes**.
5. Keep note of:
   * **Database Name:** `username_jalle`
   * **Database User:** `username_jalleuser`
   * **Database Password:** `your_password`

### C. Enable SSH Access & Authorize Keys
1. In cPanel, scroll down to **Security** &rarr; **SSH Access**.
2. Click **Manage SSH Keys**.
3. Click **Generate a New Key**:
   * **Key Name:** `jalle_deployer`
   * **Key Password:** (Leave empty for automated deployment)
   * **Key Type:** RSA
   * **Key Size:** 4096
   * Click **Generate Key**.
4. Go back to the **Public Keys** list:
   * Click **Manage** next to the newly generated key.
   * Click **Authorize** (Verify status changes to *Authorized*).
5. If you prefer password-based authentication, ensure SSH access is toggled **Enabled** under *SSH Access*.
6. Note the standard Namecheap SSH port: **`21098`**.

### D. Point Domain Document Root to `/public`
1. In cPanel, navigate to **Domains** &rarr; **Domains**.
2. Locate your domain (e.g., `dioceseofjalle.org` or subdomain).
3. Set the **Document Root** to:
   ```plaintext
   /home/YOUR_CPANEL_USER/diocese_of_jalle/public
   ```
   > **Note:** Pointing the document root directly to `.../public` ensures the `.env` file, source code, and storage directories remain strictly above the web root and completely inaccessible to the public internet.

---

## 3. GitHub App Configuration

Creating a dedicated GitHub App ensures secure, automated access without requiring your personal GitHub password.

1. In GitHub, click your profile photo in the top right &rarr; **Settings**.
   *(If your repository is under an organization, go to your **Organization Settings**).*
2. In the left sidebar, scroll down to **Developer settings** &rarr; **GitHub Apps**.
3. Click **New GitHub App**.
4. Configure the following fields:
   * **GitHub App name:** `Diocese-Of-Jalle-Deployer` (or `Jalle-Deployer`)
   * **Homepage URL:** `https://github.com/Arokrokie/diocese_of_jalle`
   * **Webhook:** Uncheck **Active** (Webhooks are not required for Actions execution).
5. Under **Repository permissions**, configure:
   * **Contents:** `Read and write` (to fetch, pull, and checkout repository code)
   * **Metadata:** `Read-only` (selected automatically)
   * **Workflows:** `Read and write`
6. Under **Where can this GitHub App be installed?**, select:
   * **Only on this account**
7. Click **Create GitHub App**.
8. On the App settings page, click **Install App** in the left menu:
   * Click **Install** next to your account / organization.
   * Select **Only select repositories** &rarr; choose `Arokrokie/diocese_of_jalle`.
   * Click **Install & Authorize**.

---

## 4. Personal Access Token (PAT) Generation

The Personal Access Token allows the server-side git client to pull updates from your private repository securely.

1. Go to GitHub &rarr; **Settings** &rarr; **Developer settings** &rarr; **Personal access tokens** &rarr; **Tokens (classic)**.
2. Click **Generate new token (classic)**.
3. Fill in details:
   * **Note:** `Diocese of Jalle Deployment PAT`
   * **Expiration:** `90 days`, `1 year`, or `No expiration`
   * **Select scopes:**
     * Check `repo` (Full control of private repositories)
     * Check `workflow` (Update GitHub Action workflows)
4. Click **Generate token**.
5. **Copy the token value (`ghp_...`) immediately**. You will not be able to see it again.

---

## 5. Configuring GitHub Repository Secrets

Now link your cPanel credentials into GitHub Actions securely.

1. Navigate to your repository:
   `https://github.com/Arokrokie/diocese_of_jalle/settings/secrets/actions`
2. Click **New repository secret** for each of the following:

| Secret Name | Value | Description / Example |
|---|---|---|
| `SSH_HOST` | Server hostname or domain | `dioceseofjalle.org` or `serverXXX.web-hosting.com` |
| `SSH_PORT` | `21098` | Namecheap default SSH port |
| `SSH_USER` | Your cPanel username | e.g. `jalleadm` |
| `SSH_PASSWORD` | Your cPanel password | Your cPanel account password |
| `PAT_TOKEN` | `ghp_...` | The Personal Access Token generated in Step 4 |
| `DEPLOY_PATH_LARAVEL` | Full server path | `/home/YOUR_CPANEL_USER/diocese_of_jalle` |
| `PRIVATE_KEY` | *(Optional)* | SSH Private key text if using key authentication |

---

## 6. Initial Server Setup (One-Time Execution)

Before the automated GitHub Actions runner can deploy updates, perform this initial clone on your server once:

1. Open the **cPanel Terminal** (or connect via your local terminal):
   ```bash
   ssh -p 21098 YOUR_CPANEL_USER@dioceseofjalle.org
   ```
2. Navigate to your home directory:
   ```bash
   cd /home/YOUR_CPANEL_USER
   ```
3. Clone the repository into `diocese_of_jalle` using your PAT token:
   ```bash
   git clone https://Arokrokie:YOUR_PAT_TOKEN@github.com/Arokrokie/diocese_of_jalle.git diocese_of_jalle
   ```
4. Enter the directory:
   ```bash
   cd diocese_of_jalle
   ```
5. Copy the production environment template:
   ```bash
   cp .env.production.example .env
   ```
6. Edit `.env` with your production settings:
   ```bash
   nano .env
   ```
   * Set `APP_KEY`: Generate one by running `php artisan key:generate`
   * Set `APP_URL=https://dioceseofjalle.org`
   * Set `DB_DATABASE=YOUR_CPANEL_DBNAME`
   * Set `DB_USERNAME=YOUR_CPANEL_DBUSER`
   * Set `DB_PASSWORD=YOUR_CPANEL_DBPASSWORD`
   * Save and exit (`Ctrl+O`, `Enter`, `Ctrl+X`).
7. Run the initial database setup and storage symlink:
   ```bash
   composer install --no-dev --optimize-autoloader
   php artisan migrate --seed --force
   php artisan storage:link
   ```
8. Verify file permissions:
   ```bash
   chmod -R 775 storage bootstrap/cache public
   ```

---

## 7. Automated Task Scheduling (Cron Jobs)

Laravel needs a single system cron job to handle scheduled tasks (such as event alerts, scheduled publishing, and queue cleanups).

1. In cPanel, navigate to **Advanced** &rarr; **Cron Jobs**.
2. Under **Add New Cron Job**, select **Once Per Minute** (`* * * * *`).
3. Enter the command:
   ```bash
   /usr/local/bin/php /home/YOUR_CPANEL_USER/diocese_of_jalle/artisan schedule:run >> /dev/null 2>&1
   ```
4. Click **Add New Cron Job**.

---

## 8. SSL Certificate Activation

1. In cPanel, go to **Security** &rarr; **SSL/TLS Status**.
2. Locate `dioceseofjalle.org` and `www.dioceseofjalle.org`.
3. Click **Run AutoSSL** to generate a free Let's Encrypt / cPanel Sectigo certificate.
4. Verify the status icon turns green with a valid expiration date.

---

## 9. Deployment Workflow & Verification

Once setup is complete, all future deployments happen automatically!

### Pushing an Update
Whenever you update code or content locally:
```bash
git add .
git commit -m "Enhance responsive layout and ministry pages"
git push origin main
```

### Monitoring the Deployment
1. Go to `https://github.com/Arokrokie/diocese_of_jalle/actions`.
2. Click on the active **Deploy Diocese of Jalle Website** workflow run.
3. You can watch each step in real time:
   * Checkout Repository
   * Setup SSH Known Hosts
   * Deploy to Server via SSH:
     * Pulling latest code
     * Installing Composer dependencies
     * Running database migrations
     * Caching routes, configs, and views
     * Setting folder permissions

---

## 10. Troubleshooting Common Issues

### 1. SSH Connection Timed Out (`ssh: connect to host ... port 21098: Connection timed out`)
* Verify the `SSH_PORT` secret is set to `21098` (or `22` if using VPS).
* In cPanel, verify that your IP is not temporarily blocked by cPanel cPHulk or ModSecurity.

### 2. Git Authentication Failed during Pull
* Check that `PAT_TOKEN` is valid and has not expired.
* Ensure the PAT has the `repo` scope selected.

### 3. Permission Denied on `storage/logs/laravel.log`
* In cPanel Terminal, run:
  ```bash
  cd /home/YOUR_CPANEL_USER/diocese_of_jalle
  chmod -R 775 storage bootstrap/cache
  ```

### 4. Images Not Displaying on the Live Site
* Verify that the storage symlink exists:
  ```bash
  php artisan storage:link
  ```
  Ensure `/home/YOUR_CPANEL_USER/diocese_of_jalle/public/storage` points to `../storage/app/public`.

### 5. Changes Not Appearing After Deployment
* The deployment script automatically runs:
  ```bash
  php artisan optimize:clear
  php artisan config:cache
  php artisan route:cache
  php artisan view:cache
  ```
  If browser caching is aggressive, perform a hard refresh (`Ctrl + F5` or `Cmd + Shift + R`).
