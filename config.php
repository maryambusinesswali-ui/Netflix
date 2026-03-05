<?php
// config.php
$host = "localhost";
$dbname = "rsoa_rsoa0248_4";
$username = "rsoa_rsoa0248_4";
$password = "654321#";
 
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB Error: " . $e->getMessage());
}
session_start();
?>
