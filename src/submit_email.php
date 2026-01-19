<?php
    require 'EmailValidator.php';

    $validator = new EmailValidator();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (!isset($_POST['consent-input'])) {
            echo '<p class="input-validation error">Error: You must agree to the terms.</p>';
            return;
        }

        $result = $validator->validate($_POST['email'], $checkDNS = false);

        if (!$result['success']) {
            error_log('DB error: ' . $result['error']);
            echo '<p class="input-validation error">Something went wrong. Please try again later.</p>';
            return;
        }

        // Normalize email
        $email = mb_strtolower($result['email_normalized']);

        // Include database connection
        require_once 'db_conn.php';

        $conn->set_charset('utf8mb4');

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
            error_log('DB error: ' . $stmt->error);
            echo '<p class="input-validation error">Something went wrong. Please try again later.</p>';
        }

        // Close connection
        $stmt->close();
        $conn->close();
    }
?>