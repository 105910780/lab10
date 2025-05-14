<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "testdb");
$username = $_SESSION["username"];
$result = $conn->query("SELECT * FROM users WHERE username='$username'");
$user = $result->fetch_assoc();
?>

