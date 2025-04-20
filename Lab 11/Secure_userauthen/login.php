<?php
session_start();
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if (!$user) {
        die("Invalid username or password.");
    }

    if ($user['account_locked']) {
        die("Account is locked due to too many failed attempts.");
    }

    if (password_verify($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['logged_in'] = true;

        $pdo->prepare("UPDATE users SET failed_attempts = 0 WHERE id = ?")
            ->execute([$user['id']]);

        header("Location: dashboard.php");
        exit;
    } else {
        $pdo->prepare("UPDATE users SET failed_attempts = failed_attempts + 1 WHERE username = ?")
            ->execute([$username]);

        $pdo->prepare("UPDATE users SET account_locked = 1 WHERE username = ? AND failed_attempts >= 5")
            ->execute([$username]);

        die("Invalid username or password.");
    }
}
?>

<h2>Login</h2>
<form method="post">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>
