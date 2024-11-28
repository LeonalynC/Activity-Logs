<?php
session_start();

date_default_timezone_set('Asia/Manila');

$host = "localhost";
$user = "root";
$password = "";
$dbname = "job_application_system";
$dsn = "mysql:host={$host};dbname={$dbname}";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET time_zone = '+08:00';");
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
