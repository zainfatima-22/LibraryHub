<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
  </a>
</p>

# 📚 Library Management System

A **modern Laravel system** to manage books, users, loans, reservations, fines, and all library operations — built with best practices for maintainability and scalability.

---

## 🚀 Features at a Glance

* 🔐 **Sanctum** — Token-based API authentication
* 🛡️ **Roles & Permissions** — Admin, Librarian, Member (Spatie)
* 📘 **Books & Authors** — Categories, publishers, multi-author support
* 🔄 **Borrowing System** — Borrow, return, renew, overdue detection
* 📝 **Reservation Queue** — Automatic waiting list & notifications
* 💳 **Fines & Payments** — Auto fine calculation and tracking
* 📊 **Activity Logs** — Track all critical actions
* ⚡ **Queues & Jobs** — Laravel Horizon
* 🔍 **Debugging** — Laravel Telescope
* 📄 **API Documentation** — Scribe

---

## 🔥 Core Modules

### 👤 User Management

* Roles: Admin, Librarian, Member
* Permissions managed via Spatie
* Secure API authentication with Sanctum

### 📚 Book Management

* Manage books, authors, categories, publishers
* Track physical book copies
* Support multiple authors per book

### 🔄 Loan System

* Borrow, return, and renew books
* Automatically detect overdue loans
* Generate fines for late returns

### 📝 Reservations

* Reserve books when unavailable
* Automatic queue system
* Notifications for next member in line

### 💳 Fines & Payments

* Automatic fine generation
* Payment tracking and status updates

### 📊 Activity Logs

* Track every important action
* Useful for auditing and monitoring system usage

---

## 🛠️ Tech Stack

| Layer         | Technology                            |
| ------------- | ------------------------------------- |
| Framework     | Laravel 11                            |
| Auth          | Sanctum (token-based)                 |
| Authorization | Spatie Roles & Permissions + Policies |
| Queue         | Laravel Horizon                       |
| Debugging     | Laravel Telescope                     |
| API Docs      | Scribe                                |
| Database      | MySQL                                 |
| Frontend      | Blade (optional SPA later)            |

---

