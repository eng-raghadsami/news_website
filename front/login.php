<?php
session_start(); // <-- أول شيء

include '../SQL/db_connect.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_input = trim($_POST['login']); 
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ? LIMIT 1");
    $stmt->bind_param("ss", $login_input, $login_input);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows == 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] === 'admin') {
                header("Location: ../dashboard/admin_dashboard.php");
            } else {
                header("Location: ../front/index.php");
            }
            exit();
        } else {
            $error = "❌ Incorrect password.";
        }
    } else {
        $error = "❌ User not found.";
    }
}
?>

<?php include 'layouts/header.php'; ?> 

<title>Login</title>
<form method="post" class="login-container">
    <h2> Login</h2>
    <input type="text" name="login" placeholder="Username or Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="submit" value="Login">
    <p style="text-align: center; margin-top: 10px;">
        Don't have an account? <a href="register.php" style="color: #836540;">Register</a>
    </p>

    <?php if (!empty($error)): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>
</form>

<?php include 'layouts/footer.php'; ?>
