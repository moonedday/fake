<?php
// subscribe.php

// Define the file path
$file = 'subscribers.txt'; // File to store emails

// Get the email from the POST request
if (isset($_POST['email'])) {
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

    // Validate email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Save the email to the text file
        file_put_contents($file, $email . PHP_EOL, FILE_APPEND | LOCK_EX);

        // Redirect back to the homepage with a success message
        header('Location: agency.html?success=true');
        exit;
    } else {
        // Redirect back to the homepage with an error message
        header('Location: agency.html?error=invalid');
        exit;
    }
} else {
    // Redirect back if accessed directly
    header('Location: agency.html');
    exit;
}
?>
