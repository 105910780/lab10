<?php
session_start();
$conn = new mysqli("localhost", "root", "", "testdb"); // Change credentials if needed

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST["username"]);
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        if ($user["password"] === $password) { // Use password_verify() in real apps
            $_SESSION["username"] = $user["username"];
            header("Location: profile.php");
            exit();
        } else {
            $error = "Incorrect password.";
        }
    } else {
        $error = "User not found.";
    }
}
?>

