<?php
// Include the database connection file
require_once 'db.php';

// Check if an 'id' was passed in the URL (GET method)
if (isset($_GET['id']) && !empty($_GET['id'])) {

    // Get the ID and make sure it's an integer for security
    $id = intval($_GET['id']);

    // Update the task status to 'completed' where the id matches
    $stmt = $conn->prepare("UPDATE tasks SET status = 'completed' WHERE id = ?");
    $stmt->bind_param("i", $id); // "i" means integer

    if ($stmt->execute()) {
        // If successful, go back to the list
        header("Location: index.php");
        exit();
    }
    else {
        echo "Error completing task: " . $conn->error;
    }

    $stmt->close();
}
else {
    // If no ID provided, go back to index
    header("Location: index.php");
    exit();
}
?>
