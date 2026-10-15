NexaShield - Information Security Policy Management & Compliance Platform
NexaShield is a comprehensive, enterprise-grade Information Security Policy Management and Employee Compliance tracking system built using the Laravel framework. Designed in alignment with ISO/IEC 27001 information security management standards and data protection regulations (such as Sri Lanka's PDPA No. 9 of 2022), NexaShield streamlines policy lifecycle management, tracks employee training progress, and delivers real-time compliance analytics.

🚀 Key Features
👨‍💼 Administrator & Supervisor Portal
Real-time Analytics Dashboard: Dynamic oversight of organizational compliance using interactive charts (Chart.js).

Policy Lifecycle Management: Create, update, version control, and publish security policies (e.g., AUP, Password Policy, BYOD).

Quiz & Assessment Builder: Design knowledge verification quizzes linked to security policies to ensure active comprehension.

Employee Compliance Reporting: Track individual and overall compliance levels (Fully Compliant, Partially Compliant, Non-Compliant).

Automated Audit Reports: Export detailed compliance reports in PDF format with custom styling (DomPDF).

Audit Logging: System-wide activity logging for security oversight and administrative transparency.

🧑‍💻 Employee Portal
Personalized Progress Dashboard: Real-time visibility into required policy readings and quiz completions.

Policy Review & Acknowledgment: Interactive interface to read, review version histories, and digitally acknowledge policy compliance.

Interactive Quizzes: Real-time assessment taking with instant scoring feedback.

Recent Activity Timeline: Live-updating timeline displaying recent policy acknowledgments and quiz completions.

🛠️ Technology Stack
Backend Framework: Laravel (PHP MVC Architecture)

Frontend Templates: Blade Templating Engine, HTML5, CSS3

Styling & UI: Tailwind CSS (Custom Cyberpunk/Dark Cyber Security Theme)

Database: MySQL / MariaDB

Data Visualization: Chart.js (Dynamic Pie & Bar Charts)

PDF Generation: barryvdh/laravel-dompdf

Authentication & Authorization: Custom Role-Based Access Control (RBAC) via Laravel Authentication

🔒 Security Measures Implemented
Role-Based Access Control (RBAC): Strict view and route protection isolating Administrator, Editor, Supervisor, and Employee actions.

CSRF Protection: Standard Cross-Site Request Forgery token enforcement on all POST/PUT/DELETE forms.

Data Protection & Encryption: Password hashing using Bcrypt and compliant data handling practices.

SQL Injection Prevention: Eloquent ORM parameter binding and strict Request Validation.

📁 Repository Structure Overview
Plaintext
├── app/
│   ├── Http/
│   │   ├── Controllers/       # Core application controllers (PolicyController, etc.)
│   │   └── Middleware/        # Authentication and RBAC Middleware
│   └── Models/                # Policy, PolicyAcknowledgment, Quiz, QuizResult, AuditLog models
├── config/                    # Application and timezone configurations
├── database/
│   ├── migrations/            # Database schema structure definition
│   └── seeders/               # Test and initial setup database seeders
├── resources/
│   └── views/
│       ├── admin/             # Administrative views, reports, and dashboards
│       ├── employee/          # Employee policy and assessment views
│       └── layouts/           # Main application Blade layouts
└── routes/
    └── web.php                # Application route definitions
⚡ Quick Installation Guide
Clone the repository:

Bash
git clone https://github.com/your-username/NexaShield.git
cd NexaShield
Install Composer dependencies:

Bash
composer install
Set up Environment File:

Bash
cp .env.example .env
php artisan key:generate
Configure Database & Timezone in .env:

Code snippet
APP_NAME=NexaShield
APP_TIMEZONE=Asia/Colombo

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nexashield_db
DB_USERNAME=root
DB_PASSWORD=
Run Migrations and Seeders:

Bash
php artisan migrate --seed
Serve Application:

Bash
php artisan serve
Access the system at [http://127.0.0.1:8000](http://127.0.0.1:8000).

📜 License
This project is developed for academic and demonstration purposes.

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
