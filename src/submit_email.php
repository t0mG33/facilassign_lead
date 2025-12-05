<?php
    require 'EmailValidator.php';

    $validator = new EmailValidator();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $result = $validator->validate($_POST['email'], $checkDNS = false);

        if (!$result['success']) {
            echo '<p class="input-validation error">Error: ' . htmlspecialchars($result['error']) . '</p>';
            return;
        }

        // Normalize email
        $email = mb_strtolower($result['email_normalized']);

        // Include database connection
        require_once 'db_conn.php';

        // Check if email already exists (case-insensitive)
        $stmt = $conn->prepare("SELECT id FROM subscribers WHERE LOWER(email) = LOWER(?)");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo '<p class="input-validation error">This email is already subscribed.</p>';
            $stmt->close();
            $conn->close();
            return;
        }
        $stmt->close();

        // Insert new email
        $stmt = $conn->prepare("INSERT INTO subscribers (email) VALUES (?)");
        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {
            echo '<p class="input-validation success">
                Your email address ' . $validator->escapeForHtml($result['email_normalized']) . 
                ' has been saved successfully. Thank you!
            </p>';
        } else {
            echo '<p class="input-validation error">Error saving email: ' . htmlspecialchars($stmt->error) . '</p>';
        }

        // Close connection
        $stmt->close();
        $conn->close();
    }
?>