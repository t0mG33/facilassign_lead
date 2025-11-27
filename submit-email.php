<?php
    require 'EmailValidator.php';

    $validator = new EmailValidator();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $result = $validator->validate($_POST['email'], $checkDNS = false);

        if (!$result['success']) {
            echo '<p class="input-validation error">Error: ' . htmlspecialchars($result['error']) . '</p>';
        }
        // else {
        //     $filename = "subscriptions.csv";
        //     $subscriptions = fopen($filename, file_exists($filename) ? "a" : "w") or die("Unable to open file!");
        //     $email = "".mb_strtolower($result['email_normalized'])."\n";
        //     fwrite($subscriptions, $email);
        //     fclose($subscriptions);

        //     echo '<p class="input-validation success">Your Email address ' .
        //         $validator->escapeForHtml($result['email_normalized']) . ' has been saved successfully. Thank you!</p>';
        // }

        $filename = "subscriptions.csv";
        // $subscriptions = fopen($filename, file_exists($filename) ? "a" : "w") or die("Unable to open file!");
        $email = mb_strtolower($result['email_normalized']);

        // Create file if missing
        if (!file_exists($filename)) {
            touch($filename);
        }

        // Load all existing emails
        $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // Normalize every existing email identically
        $existingEmails = array_map(function($line) {
            return mb_strtolower(trim($line));
        }, $lines);

        // Check if email is already present (case-insensitive)
        if (in_array($email, $existingEmails, true)) {
            echo '<p class="input-validation error">This email is already subscribed.</p>';
            return;
        }
    
        // Append new email
        file_put_contents($filename, $email . PHP_EOL, FILE_APPEND);

        echo '<p class="input-validation success">
            Your email address ' . $validator->escapeForHtml($result['email_normalized']) . 
            ' has been saved successfully. Thank you!
        </p>';
    }
?>