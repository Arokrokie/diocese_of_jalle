# Diocese of Jalle (ECSS) — Official Website

[![Laravel 12](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)](https://php.net)
[![License](https://img.shields.io/badge/License-Proprietary-green.svg)]()

Official web portal and administrative management system for the **Episcopal Diocese of Jalle**, an Area Diocese of the **Episcopal Church of South Sudan (ECSS)** within the **Jonglei Internal Province (JIP)**. 

Established in 2021 and fully operational since 2023 under the episcopal leadership of **Rt. Rev. Abraham Matiop Deng Kechdit**, the Diocese serves the faithful across Jalle Payam, Bor County, Jonglei State, and the South Sudanese diaspora worldwide.

---

## Table of Contents
- [About the Diocese](#about-the-diocese)
- [System Features](#system-features)
- [Technology Stack](#technology-stack)
- [Prerequisites](#prerequisites)
- [Installation & Setup](#installation--setup)
- [Default Admin Credentials](#default-admin-credentials)
- [Directory Structure](#directory-structure)
- [Key Artisan Commands](#key-artisan-commands)
- [Support & Contact](#support--contact)

---

## About the Diocese

* **Diocesan Bishop:** Rt. Rev. Abraham Matiop Deng Kechdit
* **Bishop's Commissioner:** Canon Michael Makuol Garang
* **Secretary of Diocese:** Archdeacon Samuel Akuak
* **Province:** Jonglei Internal Province (ECSS)
* **Headquarters:** Jalle Payam, Bor County, Jonglei State, South Sudan
* **Motto:** *"For where two or three gather in my name, there am I with them."* — Matthew 18:20
* **Mission:** Preaching the Gospel of Jesus Christ, building sustainable peace, discipling believers, empowering families through the Mothers' Union (MU), providing flood and humanitarian relief, and fostering community development.

---

## System Features

### Public Portal
* **Homepage:**
  * Interactive hero banners and foundational pillars.
  * Episcopal message from Bishop Abraham Matiop Deng.
  * 3-image responsive community and clergy showcases.
  * Weekly worship timings and comparative liturgy schedule.
  * Diocesan ministries spotlight and leadership directory preview.
  * Priority project appeals (Permanent Sanctuaries, Flood Relief, Clergy Training).
  * Recent sermons, teachings, and diocesan news announcements.
* **About the Diocese:**
  * Mission, Vision, and Core Values cards.
  * Milestones & historical timeline from early mission foundations to full diocesan inauguration.
* **Leadership & Clergy Directory:**
  * Profiles of the Bishop, Commissioner, Diocesan Secretary, Mothers' Union President, Youth leaders, and local parish clergy.
* **Ministries & Departments:**
  * Mothers' Union (MU), Youth & Praise Ministry, Sunday School & Children, Peace & Reconciliation, Relief & Outreach.
* **Worship & Liturgy:**
  * Sunday Morning Services, Holy Communion, Midweek Fellowships, Baptism, and Confirmation schedules.
* **Sermons & Bible Archive:**
  * Pastoral messages, scripture readings, and teaching archives with audio/video media support.
* **Events & News:**
  * Upcoming synods, conferences, workshops, and parish updates with category filtering and search.
* **Giving & Stewardship:**
  * Dedicated donation appeal portal for diocesan developmental and relief programs.
* **Responsive & Mobile-First Design:**
  * Sticky navigation header pinned smoothly on scrolling.
  * Full-width slide-out mobile drawer navigation with accordion submenus.
  * Two-column responsive footer layout on mobile devices.
  * Proportional image containment ensuring zero cropping or cut-off photos.

### Administrative Management Panel
* Secure staff authentication and session management (`/admin/login`).
* **Dashboard Overview:** Metrics for total posts, upcoming events, recorded sermons, and unread contact inquiries.
* **Posts & News Manager:** Full CRUD interface with image uploads, category assignment, and excerpt generation.
* **Events & Synods Manager:** Event scheduling with date-time handling, venue details, and banner management.
* **Sermons Manager:** Sermon archiving with preacher names, scripture references, date stamps, and video/audio URLs.
* **Inquiries & Prayer Requests:** Viewing and processing incoming messages from the public contact forms.

---

## Technology Stack

* **Backend Framework:** Laravel 12.x
* **Language:** PHP 8.2+
* **Database:** MySQL / MariaDB (via Eloquent ORM)
* **Frontend:** Laravel Blade, Bootstrap 5, HTML5, CSS3, JavaScript (ES6+), jQuery 3.6
* **UI Components & Plugins:** Slick Slider, Isotope & Masonry, Magnific Popup, WOW.js, Flaticons, FontAwesome 5/6
* **Asset Storage:** Laravel Storage Symlink (`public/storage` &rarr; `storage/app/public`)

---

## Prerequisites

Ensure you have the following installed on your local development machine:
1. **PHP 8.2 or higher** with required extensions (`pdo_mysql`, `mbstring`, `openssl`, `curl`, `fileinfo`, `gd`).
2. **Composer** (latest stable version).
3. **MySQL or MariaDB** (e.g. via XAMPP, Laragon, or standalone).
4. **Git** for version control.

---

## Installation & Setup

Follow these steps to set up the project locally:

### 1. Clone the Repository
```bash
git clone https://github.com/your-username/diocese-of-jalle.git
cd "Diocese Of Jalle/Website"
```

### 2. Install PHP Dependencies
```bash
composer install
```

### 3. Configure the Environment
Copy the `.env.example` file to `.env`:
```bash
cp .env.example .env
```
Generate an application encryption key:
```bash
php artisan key:generate
```

### 4. Database Setup
Create a MySQL database named `diocese_of_jalle` (or as configured in your `.env` file):
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=diocese_of_jalle
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Run Migrations & Seeders
Execute database migrations and seed default content (including admin accounts, sample news, events, and sermons):
```bash
php artisan migrate --seed
```

### 6. Create Storage Symlink
Link the public storage directory so uploaded images display properly:
```bash
php artisan storage:link
```

### 7. Start the Development Server
```bash
php artisan serve
```
The website will now be accessible at:
```
http://127.0.0.1:8000
```

---

## Default Admin Credentials

To access the administrative dashboard, navigate to `http://127.0.0.1:8000/login` and use the default seeded credentials:

* **URL:** `http://127.0.0.1:8000/login`
* **Email:** `admin@dioceseofjalle.org`
* **Password:** `Password123!`

> **Security Note:** In production, immediately change the default admin credentials and ensure `.env` has `APP_ENV=production` and `APP_DEBUG=false`.

---

## Directory Structure

```plaintext
website/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/           # Admin panel controllers (Posts, Events, Sermons, Messages)
│   │   │   ├── PageController   # Public pages (About, Leadership, Ministries, Services)
│   │   │   ├── PostController   # News articles & posts
│   │   │   ├── EventController  # Synods & diocesan events
│   │   │   └── SermonController # Sermons & pastoral teachings
│   └── Models/                  # Eloquent models (Post, Event, Sermon, ContactMessage, User)
├── database/
│   ├── migrations/              # Database schema migrations
│   └── seeders/                 # Initial data seeders
├── public/
│   ├── assets/
│   │   ├── css/                 # style.css, responsive.css
│   │   ├── js/                  # main.js (navigation, sliders, sticky header)
│   │   └── img/                 # Logos, banners, diocese photo gallery
│   └── storage/                 # Symlink to uploaded media
├── resources/
│   └── views/
│       ├── layouts/             # Master templates (app.blade.php, admin.blade.php)
│       ├── pages/               # Static pages (home, about, leadership, bishop, etc.)
│       ├── posts/               # News index and single post views
│       ├── events/              # Events index and single event views
│       ├── sermons/             # Sermon index and single sermon views
│       └── admin/               # Backend management views
└── routes/
    └── web.php                  # Application web routes
```

---

## Key Artisan Commands

```bash
# Clear all view, route, and configuration caches
php artisan optimize:clear

# Re-cache configuration and routes for production
php artisan optimize

# Re-link public storage if media is missing
php artisan storage:link

# Re-run all migrations and fresh database seeding
php artisan migrate:fresh --seed
```

---

## Support & Contact

For inquiries regarding the Diocese of Jalle website or diocesan operations:
* **Diocesan Secretariat:** info@dioceseofjalle.org
* **See & Offices:** Jalle Payam, Bor County, Jonglei State, South Sudan
* **Ecclesiastical Affiliation:** Episcopal Church of South Sudan (ECSS) — Jonglei Internal Province (JIP)
