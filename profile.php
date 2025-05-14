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

<!DOCTYPE html>
<html>
<head><title>Profile</title></head>
<body>
<h2>Welcome, <?php echo htmlspecialchars($user["username"]); ?></h2>
<p>Email: <?php echo htmlspecialchars($user["email"]); ?></p>

<h3>Edit Email</h3>
<form method="POST" action="update_profile.php">
    <input type="email" name="email" value="<?php echo htmlspecialchars($user["email"]); ?>" required>
    <input type="submit" value="Update Email">
</form>

<br><a href="logout.php">Logout</a>
</body>
</html>
