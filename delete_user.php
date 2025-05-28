<?php
session_start();
require 'db_connection.php';

// Get user ID from query string
$user_id = $_GET['id'];

// Delete user from the database
$query = "DELETE FROM users WHERE id = $user_id";
if (mysqli_query($conn, $query)) {
    header("Location: user_management.php?success=User deleted successfully");
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}
?>