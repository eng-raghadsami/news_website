<?php
include 'layouts/header.php';
include '../SQL/db_connect.php';

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];

    if ($password !== $confirm) {
        $error = "❌ Passwords do not match.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $check = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $check->bind_param("ss", $username, $email);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {
            $error = "❌ Username or Email already exists.";
        } else {
            $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'user')");
            $stmt->bind_param("sss", $username, $email, $hashed_password);

            if ($stmt->execute()) {
                $success = "✅ Registered successfully! You can now <a href='login.php'>Login</a>";
            } else {
                $error = "❌ Registration failed. Please try again.";
            }
        }
    }
}
?>

<title>Register</title>
<form method="post" class="login-container">
    <h2> Register</h2>
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
    <input type="submit" value="Register">

    <?php if (!empty($error)): ?>
        <div class="error"><?= $error ?></div>
    <?php elseif (!empty($success)): ?>
        <div class="success"><?= $success ?></div>
    <?php endif; ?>
</form>

<?php include 'layouts/footer.php'; ?>