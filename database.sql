-- Create the database if it doesn't already exist
CREATE DATABASE IF NOT EXISTS todo_app;

-- Select the database
USE todo_app;

-- Create the tasks table
CREATE TABLE IF NOT EXISTS tasks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  task VARCHAR(255) NOT NULL,
  status VARCHAR(20) DEFAULT 'pending'
);
