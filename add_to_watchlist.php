<?php
require 'config.php';
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.location='login.php';</script>";
}
$video = $_GET['video'] ?? '';
echo "<script>alert('Added to My List!'); window.location='index.php';</script>";
?>
