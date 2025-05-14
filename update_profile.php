<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "testdb");
$username = $_SESSION["username"];
$new_email = $_POST["email"];

$sql = "UPDATE users SET email=? WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $new_email, $username);
$stmt->execute();

header("Location: profile.php");
exit();
