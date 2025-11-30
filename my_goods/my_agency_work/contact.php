<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);

    if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($name)) {
        // Send email or store in the database
        $to = "mkbhdp@gmail.com";
        $subject = "New Contact Form Submission";
        $message = "Name: $name\nEmail: $email";
        $headers = "From: noreply@youragency.com";

        if (mail($to, $subject, $message, $headers)) {
            echo "Thank you for reaching out!";
        } else {
            echo "Oops! Something went wrong.";
        }
    } else {
        echo "Please enter a valid name and email.";
    }
}
?>