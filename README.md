<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

📚 Library Management System

A clean and modern Laravel-based system to manage books, users, borrowing, reservations, and library operations.

🚀 What This Project Includes

🔐 Sanctum — Token-based API authentication

🛡️ Spatie Roles & Permissions — Admin, Librarian, Member

📘 Books & Authors — Categories, publishers, multi-author support

🔄 Borrowing System — Loans, returns, renewals

📝 Reservations — Automatic queue for unavailable books

💳 Fines & Payments — Auto fine calculation for overdue books

📊 Activity Logs — Track who did what

⚡ Horizon for queues + 🔍 Telescope for debugging

📄 Scribe API Docs

Built with Laravel 11, MySQL, Blade, and clean coding best practices.

🔥 Core Features

👤 User Management

Admin, Librarian & Member roles

Permissions handled via Spatie

Sanctum token-based API authentication

📚 Book Management

Books, authors, categories, publishers

Book copies tracking (physical items)

Multi-author support

🔄 Loan System

Borrow, return & renew books

Overdue detection

Automatic fines for late returns

📝 Reservation Queue

Members can reserve books

Automatic queue system when all copies are borrowed

Priority notification for next member

💳 Fines & Payments

Automatic fine generation

Payment tracking

📊 Activity Logs

Tracks every important action

Useful for audit trails