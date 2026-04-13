Student Management System (CRUD)
A lightweight, secure, and modern web application built with PHP and Bootstrap 5 to manage student records. This project features a full CRUD (Create, Read, Update, Delete) workflow with a focus on clean UI/UX and secure database interactions.

✨ Features
Secure Authentication: Login system to protect the dashboard and student data.

Dashboard Overview: A clean interface to view all registered students at a glance.

Full CRUD Functionality:

Create: Add new students with validation.

Read: Dedicated profile view cards for each student.

Update: Edit student details via an intuitive form.

Delete: Destructive actions protected by confirmation prompts.

Responsive Design: Fully mobile-friendly UI built with Bootstrap 5 and Bootstrap Icons.

Security: Uses PDO prepared statements to prevent SQL Injection and htmlspecialchars() to mitigate XSS attacks.

🛠️ Tech Stack
Backend: PHP (PDO)

Frontend: HTML5, CSS3, Bootstrap 5

Database: MySQL

Icons: Bootstrap Icons

🚀 Getting Started
Prerequisites
XAMPP / WAMP / MAMP or any PHP environment.

PHP 7.4 or higher.

MySQL Database.

Installation
Clone the repository:

Bash
git clone https://github.com/your-username/student-management-system.git
Database Setup:

Open phpMyAdmin.

Create a new database named student_db (or as defined in your config/db.php).

Import the database.sql file (if provided) or create a students table with id, name, email, and course columns.

Configure Connection:

Navigate to config/db.php.

Update your database credentials (host, dbname, username, password).

Run the App:

Move the project folder to your htdocs directory.

Open your browser and go to http://localhost/student-management-system/auth/login.php.

📂 Project Structure
Plaintext
├── auth/
│   ├── login.php          # Login interface
│   └── logout.php         # Session termination
├── config/
│   └── db.php             # PDO database connection
├── students/
│   ├── add.php            # Add student form
│   ├── edit.php           # Edit student form
│   ├── delete.php         # Delete confirmation
│   └── view.php           # Student profile view
└── dashboard.php          # Main student directory
