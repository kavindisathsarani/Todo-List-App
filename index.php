<?php
// Include the database connection file
require_once 'db.php';

// Fetch all tasks from the database ordered by newest first
$sql = "SELECT * FROM tasks ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Todo List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>My Todo List</h1>
        
        <!-- Form to add a new task -->
        <form action="add_task.php" method="POST" class="add-task-form">
            <input type="text" name="task" placeholder="Enter a new task..." required>
            <button type="submit">Add Task</button>
        </form>

        <!-- Table to display all tasks -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
if ($result && $result->num_rows > 0) {
    // Loop through each task and output a row in the table
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";

        // Add a special class if the task is completed
        $taskClass = ($row["status"] == 'completed') ? 'completed-task' : '';

        // Use htmlspecialchars to prevent XSS attacks
        echo "<td class='$taskClass'>" . htmlspecialchars($row["task"]) . "</td>";

        // Capitalize the first letter of the status
        echo "<td>" . ucfirst($row["status"]) . "</td>";
        echo "<td class='actions'>";

        // Show "Complete" button only if the task is not already completed
        if ($row["status"] != 'completed') {
            echo "<a href='complete_task.php?id=" . $row["id"] . "' class='btn complete-btn'>Complete</a>";
        }

        // Always show the "Delete" button
        echo "<a href='delete_task.php?id=" . $row["id"] . "' class='btn delete-btn'>Delete</a>";

        echo "</td>";
        echo "</tr>";
    }
}
else {
    echo "<tr><td colspan='4' class='text-center'>No tasks found. Add a task to get started!</td></tr>";
}
?>
            </tbody>
        </table>
    </div>
</body>
</html>
