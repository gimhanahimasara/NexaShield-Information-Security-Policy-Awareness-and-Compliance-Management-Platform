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
