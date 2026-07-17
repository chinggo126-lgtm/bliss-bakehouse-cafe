# B.L.I.S.S Bakehouse & Cafe

A fully responsive, modern website for B.L.I.S.S Bakehouse & Cafe built with PHP, MySQL, and PHPMailer.

## Features

- **Three User Roles**: Admin, Cashier, and Customer
- **Responsive Design**: White and beige color scheme, USA vibes
- **Product Management**: Browse and order baked goods
- **Reservation System**: Book a table online
- **Email Notifications**: PHPMailer integration
- **MySQL Database**: Complete backend storage
- **Admin Dashboard**: Manage products, orders, and reservations
- **Cashier Interface**: Process orders and payments

## Navigation

- Homepage
- Products
- What's New
- About Us
- Contact Us
- Reservation

## Installation

1. Import `database.sql` into your MySQL server
2. Update database credentials in `config/db.php`
3. Configure email settings in `config/email.php`
4. Upload files to your web server
5. Access the website through your browser

## User Credentials (Default)

- **Admin**: admin@bliss.com / admin123
- **Cashier**: cashier@bliss.com / cashier123

## File Structure

```
bliss-bakehouse-cafe/
├── config/
│   ├── db.php
│   ├── email.php
│   └── functions.php
├── css/
│   └── style.css
├── js/
│   └── script.js
├── includes/
│   ├── header.php
│   ├── footer.php
│   ├── navbar.php
│   └── sidebar.php
├── pages/
│   ├── index.php
│   ├── products.php
│   ├── whats-new.php
│   ├── about.php
│   ├── contact.php
│   ├── reservation.php
│   ├── login.php
│   └── register.php
├── admin/
│   ├── dashboard.php
│   ├── manage-products.php
│   ├── manage-orders.php
│   ├── manage-reservations.php
│   └── manage-users.php
├── cashier/
│   ├── dashboard.php
│   ├── process-order.php
│   └── view-orders.php
├── uploads/
│   └── products/
├── vendor/
│   └── (PHPMailer files)
└── database.sql
```