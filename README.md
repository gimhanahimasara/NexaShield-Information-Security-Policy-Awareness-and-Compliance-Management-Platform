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

⚡ Quick Installation Guide

Follow the instructions below to download, configure, and run NexaShield on your local development environment.

You can either download the project source code as a ZIP archive from Google Drive or clone the repository from GitHub.

📋 Prerequisites

Before getting started, ensure that you have installed the following tools:

PHP — Compatible with your project's Laravel version.
Composer — PHP dependency manager.
MySQL — Database server.
Node.js and npm — Required if the project uses frontend asset compilation.
Git (optional) — Required if you want to clone the repository.

Note: You can use XAMPP, WAMP, or Laragon to manage your local PHP and MySQL environment.

1. 📥 Download & Extract the Source Code

Download the NexaShield source code using the Google Drive link below:

👉 Download NexaShield Source Code (Google Drive)

Replace YOUR_GOOGLE_DRIVE_LINK_HERE with your actual Google Drive download or sharing link.

Alternatively, clone the repository if the source code is hosted on GitHub:

git clone YOUR_GITHUB_REPOSITORY_URL

If you downloaded a ZIP archive, extract it into your preferred directory.

For example:

C:\projects\NexaShield
2. 💻 Open a Terminal in the Project Directory

Open Command Prompt, PowerShell, or your preferred terminal and navigate to the extracted project directory.

Windows:

cd C:\projects\NexaShield

Linux / macOS:

cd /path/to/NexaShield

Ensure that you are in the project root directory, where the artisan file and composer.json file are located.

3. 📦 Install PHP Dependencies

Install the required Laravel packages and PHP dependencies using Composer:

composer install

Wait until Composer finishes installing the dependencies.

4. ⚙️ Configure the Environment File

Create a local .env file by copying the example environment configuration.

Windows Command Prompt:

copy .env.example .env

PowerShell, Linux, or macOS:

cp .env.example .env

The .env file contains environment-specific settings, including database credentials, application configuration, and other local development options.

Important: Never commit your .env file or expose database credentials and application secrets in a public repository.

5. 🔑 Generate the Application Key

Generate a unique application encryption key for Laravel:

php artisan key:generate

This command generates the APP_KEY value in your .env file.

6. 🗄️ Configure the Database & Timezone

Open the .env file in a text editor, such as Visual Studio Code or Notepad++, and configure your application and database settings.

Example configuration:

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

Database setup:

Start your MySQL server using XAMPP, WAMP, Laragon, or another compatible environment.
Open your database management tool, such as phpMyAdmin.
Create a database named nexashield_db.
Update the database username and password in the .env file according to your local configuration.

Note: The database credentials above are examples. Update them to match your local MySQL configuration. An empty database password should only be used if that is how your local MySQL account is configured.

7. 🛠️ Run Database Migrations & Seeders

Run the following command to create the database tables and populate the initial data defined by the project's migrations and seeders:

php artisan migrate --seed

This command may initialize database components such as:

User accounts
Policies
Quizzes
Audit logs
Other application-specific tables and sample records

The exact tables and initial records depend on the migrations and seeders included in the project.

Important: If the project includes a default administrator account, check the project's documentation or seeder files for its login credentials. Change any default credentials before deploying the application to a production environment.

8. 🚀 Start the Development Server

Start the Laravel development server using Artisan:

php artisan serve

Once the server starts successfully, the terminal will display a local development URL.

9. 🌐 Access NexaShield

Open your web browser and navigate to:

👉 http://127.0.0.1:8000

NexaShield should now be accessible on your local machine.

🧰 Troubleshooting

If you encounter problems during installation, try the following commands.

Clear the application configuration cache:

php artisan config:clear
php artisan cache:clear

Refresh Composer's autoloader:

composer dump-autoload

Check the installed PHP version:

php -v

Check the Composer installation:

composer --version

Check the database connection:

Ensure the MySQL server is running.
Verify the database name and credentials in .env.
Confirm that the nexashield_db database exists.
Ensure that the installed PHP version has the required database extensions enabled.

If the project uses frontend assets managed by npm, install the dependencies and build the assets when required:

npm install
npm run build

Note: Run the npm commands only if the project includes a package.json file and requires frontend asset compilation.

✅ Installation Complete!

Congratulations! 🎉 You have successfully completed the local setup process for NexaShield.

You can now explore the application's features and begin working with the project in your local development environment.

Local Application URL: http://127.0.0.1:8000
