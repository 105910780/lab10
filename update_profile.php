<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "testdb");
$new_email = $_POST["email"];
$username = $_SESSION["username"];

$stmt = $conn->prepare("UPDATE users SET email=? WHERE username=?");
$stmt->bind_param("ss", $new_email, $username);
$stmt->execute();

header("Location: profile.php");
exit();
