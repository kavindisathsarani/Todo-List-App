<?php
// Include the database connection file
require_once 'db.php';

// Check if the form was submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the task from the form and remove extra whitespace
    $task = trim($_POST["task"]);

    // Check if the task is not empty
    if (!empty($task)) {

        // Prepare an SQL statement to insert the task
        // We use a prepared statement for better security against SQL injection
        $stmt = $conn->prepare("INSERT INTO tasks (task, status) VALUES (?, 'pending')");

        // Bind the parameter (s = string)
        $stmt->bind_param("s", $task);

        // Execute the statement
        if ($stmt->execute()) {
            // If successful, redirect back to index.php
            header("Location: index.php");
            exit();
        }
        else {
            // If there's an error, show it
            echo "Error adding task: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
    else {
        echo "Task cannot be empty.";
    }
}
else {
    // If not a POST request, redirect back to index
    header("Location: index.php");
    exit();
}
?>
