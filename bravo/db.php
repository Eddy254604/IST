<?php
$host = 'localhost';
$db = 'daynoe';  // Updated database name
$user = 'root';   // Default XAMPP username
$pass = '';       // Default XAMPP password (empty)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $db :" . $e->getMessage());
}
?>