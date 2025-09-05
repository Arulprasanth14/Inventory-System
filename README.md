# Inventory Management System (PHP + MySQL via XAMPP)

## 📌 Overview

The **Inventory Management System** is a lightweight, web-based application built with **PHP, MySQL, and XAMPP**. It helps businesses efficiently manage stock by allowing CRUD operations on items, tracking quantities, and generating reports. The system provides a secure login system, a real-time dashboard, and exportable inventory reports in **Excel formats**.

---

## ⚙️ Tech Stack

* **Frontend:** HTML5, CSS3, JavaScript
* **Backend:** PHP (Core PHP, no frameworks)
* **Database:** MySQL (via XAMPP phpMyAdmin)
* **Server:** Apache (XAMPP)
* **Reports:** PHPSpreadsheet (for Excel export)

---

## 📂 Project Structure

```plaintext
inventory_project/
├── add_item.php           # Add new inventory items
├── dashboard.php          # Dashboard with analytics
├── db_connect.php         # Database connection file
├── delete_item.php        # Delete item functionality
├── edit_item.php          # Edit item details
├── export_excel.php       # Export data to Excel
├── login.php              # User login page
├── logout.php             # Logout and session destroy
├── signup.php             # User registration
├── view_items.php         # List and search inventory items
├── assets/
│   ├── css/               # Custom CSS files
│   ├── js/                # JavaScript files
│   └── images/            # UI images/icons
└── sql/
    └── schema.sql         # Database schema
```

---

## 🗄️ Database Schema

### 1️⃣ `users`

```sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  phone VARCHAR(20) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### 2️⃣ `items`

```sql
CREATE TABLE items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  description TEXT,
  category VARCHAR(50),
  quantity INT NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## 🚀 Features

* 🔑 **User Authentication** → Secure login/logout with password hashing & sessions.
* 📦 **Item Management (CRUD)** → Add, view, edit, and delete items.
* 🔍 **Search & Filter** → Find items by name, category, or quantity.
* 📊 **Dashboard Analytics** → Total items, low stock alerts, category statistics, recent activity.
* 📑 **Export Reports** → Generate Excel reports of inventory.
* 🛡️ **Security** → Input sanitization, prepared statements, and session management.

---

## 🔧 Setup Instructions

### 1️⃣ Install XAMPP

1. Download from [Apache Friends](https://www.apachefriends.org/).
2. Install XAMPP (include Apache + MySQL + phpMyAdmin).
3. Start **Apache** and **MySQL** from XAMPP Control Panel.

### 2️⃣ Project Setup

1. Copy the project folder to:

   ```
   C:\xampp\htdocs\inventory_project
   ```
2. Open phpMyAdmin: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
3. Create a database `inventory_db`.
4. Import `sql/schema.sql` to set up tables.

### 3️⃣ Configure Database Connection

Edit `db_connect.php`:

```php
<?php
$host = "localhost";
$user = "root";
$pass = ""; // default in XAMPP
$db   = "inventory_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
```

### 4️⃣ Run the Project

Visit in browser:

```
http://localhost/inventory_project/
```

---

## 📖 Core Workflows

### 🔑 Login / Signup

* `signup.php` → creates new user (hashed password).
* `login.php` → validates credentials and starts session.
* `logout.php` → ends session.

### 📦 Item Management

* Add: `add_item.php`
* View: `view_items.php`
* Edit: `edit_item.php`
* Delete: `delete_item.php`

### 📊 Dashboard

* `dashboard.php` shows:

  * Total items
  * Low stock alerts
  * Category breakdown
  * Recent activity

### 📑 Export Reports

* `export_excel.php` → downloads inventory as Excel file.

---

## 🛠️ Troubleshooting

* **Apache not starting** → Port conflict (change to 8080 in `httpd.conf`).
* **MySQL not starting** → Port 3306 conflict or corrupted DB → Check `my.ini`.
* **Login not working** → Verify `db_connect.php` and session handling.
* **Export errors** → Ensure `php_mbstring` and `php_gd2` extensions are enabled in `php.ini`.

---

## 📌 Roadmap

* 📷 Image upload for items
* 📩 Email notifications for low stock
* 📱 REST API for mobile app integration
* 🏷 Barcode scanner support

---

✅ This project is ideal for learning XAMPP-based PHP development and demonstrates how to build, deploy, and manage a complete inventory management application using Apache, MySQL, and PHP.
