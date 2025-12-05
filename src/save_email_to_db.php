<?php
// Include the database connection file
require_once 'db_config.php';

// Get form data safely
$name  = $_POST['name'];
$email = $_POST['email'];

// Use prepared statement to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $email);

if ($stmt->execute()) {
    echo "Record saved successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
