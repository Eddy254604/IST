<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Here you can add code to send the email or save the message to a database
    // Example: mail("support@myapp.com", "Contact Form Submission", $message, "From: $name <$email>");

    // Redirect to thank you page with message
    header("Location: thank_you.php?name=" . urlencode($name) . "&email=" . urlencode($email) . "&message=" . urlencode($message));
    exit;
}
?>