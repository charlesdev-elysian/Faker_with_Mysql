# 📌 Database Setup & Faker Data Guide

## 🚀 Project Overview
This project sets up a MySQL database (`demofaker`) with three tables: `office`, `employee`, and `transaction`. It also includes a PHP script to seed the database using Faker for generating realistic data.

---

## 📂 File Structure
```
/project-folder
│-- connection.php       # Database connection file
│-- fake_data.php    # PHP script to seed the database with sample data
│-- demofaker.sql    # SQL file containing database schema
│-- README.md            # This documentation file
```

---

## 🏗️ Database Installation
### **1️⃣ Import SQL Schema**
#### **Option 1: Using phpMyAdmin**
1. Open **phpMyAdmin** (`http://localhost/phpmyadmin`).
2. Click **Import** and select `demofaker.sql`.
3. Click **Go** to execute the script.

#### **Option 2: Using MySQL Command Line**
```sh
mysql -u root -p demofaker < demofaker.sql
```

---

## 🔌 Database Connection
Create a `connection.php` file for handling database connections:
```php
<?php
$host = '127.0.0.1';
$dbname = 'demofaker';
$username = 'root';
$password = 'root';
$port = 3306;

$conn = new mysqli($host, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}
?>
```

---

## 🔄 Seeding the Database
To generate sample data, run `fake_data.php`:
```php
php seed_database.php
```
This script uses **Faker** to insert sample records into `office`, `employee`, and `transaction` tables.

#### **Install Faker (if not installed):**
```sh
composer require fakerphp/faker
```

---

## 🎯 Verification
After seeding, check the database with:
```sql
SELECT * FROM office;
SELECT * FROM employee;
SELECT * FROM transaction;
```

---

## 🛠️ Troubleshooting
- **Connection Error:** Ensure MySQL is running (`XAMPP/WAMP`).
- **Port Issues:** Check `3306` or modify `connection.php` accordingly.
- **phpMyAdmin Errors:** Verify database name before importing SQL.

---

## 📌 Author
👨‍💻 **Charles Jazon Dorero/Mark Oseas Eray** - BS in Information Technology

