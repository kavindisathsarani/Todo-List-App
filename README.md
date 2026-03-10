Create a very simple beginner-level Todo List web application using PHP and MySQL.

Environment:

* The project will run on XAMPP.
* Project folder path: C:\xampp\htdocs\first-php-project
* PHP version: 8+
* Use MySQL database from phpMyAdmin.

Requirements:

* Use plain PHP (no frameworks).
* Use MySQLi for database connection.
* Keep the code very simple so a beginner can understand it.
* Use basic HTML and a little CSS.

Features:

1. Add a new task
2. Display all tasks
3. Mark a task as completed
4. Delete a task

Database:
Create a database called "todo_app".

Create a table called "tasks" with fields:

* id (INT AUTO_INCREMENT PRIMARY KEY)
* task (VARCHAR 255)
* status (VARCHAR 20 DEFAULT 'pending')

Project File Structure inside first-php-project:

first-php-project/
db.php
index.php
add_task.php
complete_task.php
delete_task.php
style.css

Interface:

* A text input field to enter a task
* "Add Task" button
* Show tasks in a simple table
* Each task should have "Complete" and "Delete" buttons

Also provide:

* SQL script to create the database and table
* Comments in the code explaining what each part does
* Instructions to run the project using http://localhost/first-php-project
