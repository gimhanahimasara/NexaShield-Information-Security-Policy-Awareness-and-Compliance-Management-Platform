<div align="center">

# 🛡️ NexaShield

### Information Security Policy Management & Compliance Platform

[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![MySQL](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white)](https://mysql.com)
[![License](https://img.shields.io/badge/License-Academic-blue.svg?style=for-the-badge)]()

*Enterprise-grade security policy management, compliance tracking, and audit reporting framework aligned with **ISO/IEC 27001** and Sri Lanka **PDPA No. 9 of 2022**.*

---

</div>


---

## 🧐 About NexaShield

**NexaShield** is a centralized compliance management application built to bridge the gap between organizational security governance and employee awareness. It allows administrators to publish information security policies, enforce knowledge verification quizzes, and dynamically monitor organizational compliance using real-time telemetry.

---

## 🚀 Key Features

### 👨‍💼 Administrator & Supervisor Portal
* 📊 **Real-time Analytics Dashboard:** Interactive data monitoring with `Chart.js` for compliance percentages.
* 📜 **Policy Management:** Full lifecycle support for creating, updating, and versioning security policies.
* 📝 **Quiz & Assessment Builder:** Knowledge verification quizzes linked directly to security policies.
* 📋 **Compliance Monitoring:** Real-time metrics categorizing users as *Fully Compliant*, *Partially Compliant*, or *Non-Compliant*.
* 📄 **Automated PDF Exports:** Download comprehensive compliance audit reports formatted via `DomPDF`.
* 🛡️ **Audit Logs:** Immutable audit log history for critical system actions.

### 🧑‍💻 Employee Portal
* 📈 **Progress Summary:** Clean overview of policy read ratios and completed assessments.
* 📑 **Interactive Policy Review:** Digital policy reader with dynamic acknowledgment workflows.
* 🎯 **Knowledge Assessments:** Real-time quiz execution with instant score feedback.
* ⏱️ **Recent Activity Timeline:** Live timeline logging recent policy acknowledgments and completed quizzes.

---

## 🛠️ Tech Stack

| Category | Technology |
| :--- | :--- |
| **Backend** | [Laravel Framework](https://laravel.com/) (PHP MVC) |
| **Frontend** | Blade Templates, HTML5, CSS3 |
| **Styling** | [Tailwind CSS](https://tailwindcss.com/) *(Dark Cyber Theme)* |
| **Database** | MySQL / MariaDB |
| **Analytics** | [Chart.js](https://www.chartjs.org/) |
| **PDF Engine** | [DomPDF](https://github.com/barryvdh/laravel-dompdf) |
| **Security** | Role-Based Access Control (RBAC), CSRF Tokens, Bcrypt Hashing |

---

## 🔒 Security Architecture

```text
┌────────────────┐     ┌─────────────────────┐     ┌──────────────────────┐
│  Employee /    │ ──> │ Role-Based Access   │ ──> │ Controller Logic     │
│  Administrator │     │ Control Middleware  │     │ (PolicyController)   │
└────────────────┘     └─────────────────────┘     └──────────────────────┘
                                                              │
                                                              ▼
                                                   ┌──────────────────────┐
                                                   │   Database & Audit   │
                                                   │   Log Telemetry      │
                                                   └──────────────────────┘
```
##
* 🔗 Link for full project : https://drive.google.com/file/d/1hga7TX14Xd8TsV4gV3hDvhFZE-4MI1Pn/view?usp=sharing

---

## ⚡ Quick Installation Guide

Set up and run **NexaShield** on your local machine by following the installation instructions below.

### 📋 Prerequisites

Before installing NexaShield, ensure that you have the following tools installed:

* 🐘 **PHP** — Compatible with your Laravel version.
* 📦 **Composer** — PHP dependency manager.
* 🗄️ **MySQL** — Database management system.
* 🟢 **Node.js & npm** — Required if the project uses frontend asset compilation.
* 🔧 **Git** — Optional, if cloning the repository from GitHub.

> 💡 **Tip:** You can use [XAMPP](https://www.apachefriends.org/), [WAMP](https://www.wampserver.com/), or [Laragon](https://laragon.org/) to manage your local PHP and MySQL environment.

---

### 📥 1. Download the Source Code

Download the NexaShield source code from Google Drive:

<div align="center">

### 📦 [Download NexaShield Source Code](https://drive.google.com/file/d/1hga7TX14Xd8TsV4gV3hDvhFZE-4MI1Pn/view?usp=sharing)

</div>

Alternatively, clone the repository directly from GitHub:

```bash
git clone YOUR_GITHUB_REPOSITORY_URL
```

If you downloaded the project as a ZIP archive, extract it into your preferred directory.

**Example directory:**

```text
C:\projects\NexaShield
```

---

### 💻 2. Open the Project Directory

Open **Command Prompt**, **PowerShell**, or your preferred terminal and navigate to the project directory.

**Windows:**

```bash
cd C:\projects\NexaShield
```

**Linux / macOS:**

```bash
cd /path/to/NexaShield
```

> 📌 Ensure that you are in the project root directory containing the `artisan` and `composer.json` files.

---

### 📦 3. Install PHP Dependencies

Install the required Laravel packages and dependencies using Composer:

```bash
composer install
```

This command installs the PHP dependencies defined in the project's `composer.lock` file.

---

### ⚙️ 4. Configure the Environment File

Create a local `.env` configuration file by copying the example environment file.

**Windows Command Prompt:**

```cmd
copy .env.example .env
```

**PowerShell / Linux / macOS:**

```bash
cp .env.example .env
```

> 🔐 **Security Notice:** Never commit your `.env` file or expose sensitive credentials and application secrets in a public GitHub repository.

---

### 🔑 5. Generate the Application Key

Generate a unique application encryption key for Laravel:

```bash
php artisan key:generate
```

This command automatically generates the `APP_KEY` value in your `.env` file.

---

### 🗄️ 6. Configure the Database

Open the `.env` file in your preferred text editor and configure your application and database settings.

**Example configuration:**

```dotenv
APP_NAME=NexaShield
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000
APP_TIMEZONE=Asia/Colombo

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nexashield_db
DB_USERNAME=root
DB_PASSWORD=
```

#### 🛠️ Database Setup

1. Start your MySQL server using XAMPP, WAMP, Laragon, or another compatible environment.
2. Open **phpMyAdmin** or your preferred database management tool.
3. Create a new database named `nexashield_db`.
4. Update the database credentials in your `.env` file according to your local MySQL configuration.

> ⚠️ **Note:** The database credentials above are examples. Configure them according to your local environment. An empty database password should only be used if that matches your MySQL configuration.

---

### 🛠️ 7. Run Database Migrations & Seeders

Create the required database tables and populate the initial data defined by the project's migrations and seeders:

```bash
php artisan migrate --seed
```

Depending on the migrations and seeders included in the project, this process may initialize:

* 👤 User accounts
* 📜 Security policies
* 📝 Quizzes and assessments
* 📋 Audit logs
* ⚙️ Other application-specific records

> 📌 If a default administrator account is created by the seeders, check the project's documentation or seeder files for the login credentials.

---

### 🚀 8. Start the Development Server

Start the Laravel development server using Artisan:

```bash
php artisan serve
```

Once the server starts successfully, the terminal will display the local development URL.

---

### 🌐 9. Access NexaShield

Open your web browser and navigate to the following address:

<div align="center">

### 🔗 http://127.0.0.1:8000

**🛡️ NexaShield is ready to run locally!**

</div>

---

## 🔧 Troubleshooting

If you encounter issues during installation, try the following solutions.

<details>
<summary>🧹 <strong>Clear Laravel Configuration & Cache</strong></summary>

```bash
php artisan config:clear
php artisan cache:clear
```

</details>

<details>
<summary>📦 <strong>Refresh Composer Autoload Files</strong></summary>

```bash
composer dump-autoload
```

</details>

<details>
<summary>🔍 <strong>Check PHP & Composer Versions</strong></summary>

```bash
php -v
composer --version
```

</details>

<details>
<summary>🗄️ <strong>Resolve Database Connection Issues</strong></summary>

* Ensure that the MySQL server is running.
* Verify the database name and credentials in `.env`.
* Confirm that the `nexashield_db` database exists.
* Ensure that the required PHP database extensions are enabled.

</details>

<details>
<summary>🎨 <strong>Resolve Frontend Asset Issues</strong></summary>

If the project includes a `package.json` file and requires frontend asset compilation, run:

```bash
npm install
npm run build
```

</details>

---

## ✅ Installation Complete!

🎉 Congratulations! You have successfully completed the local setup process for **NexaShield**.

You can now explore the application's features, manage security policies, conduct employee assessments, and monitor compliance.

<div align="center">

| Component           | Details                                 |
| :------------------ | :-------------------------------------- |
| 🛡️ **Application** | NexaShield                              |
| ⚙️ **Framework**    | Laravel                                 |
| 🐘 **Backend**      | PHP                                     |
| 🗄️ **Database**    | MySQL                                   |
| 🎨 **Frontend**     | Tailwind CSS                            |
| 🌏 **Timezone**     | Asia/Colombo                            |
| 🌐 **Local URL**    | [127.0.0.1:8000](http://127.0.0.1:8000) |

---

### 🛡️ NexaShield

*Secure. Monitor. Protect.*

</div>
