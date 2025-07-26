<?php
session_start();
$successMsg = "";
$errorMsg = "";
if (isset($_SESSION['successMsg'])) {
    $successMsg = $_SESSION['successMsg'];
    unset($_SESSION['successMsg']);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function test_input($data)
    {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['gender'])) {
        $errorMsg = "❌ Please fill in all required fields.";
    } else {
        $name = test_input($_POST['name']);
        $email = test_input($_POST['email']);
        $phone = test_input($_POST['phone']);
        $gender = test_input($_POST['gender']);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMsg = "❌ Invalid email format.";
        } elseif (!preg_match('/^[0-9]{10,15}$/', $phone)) {
            $errorMsg = "❌ Invalid phone number.";
        } else {
            $_SESSION['successMsg'] = "✅ Thank you, $name! Your message has been received.";

            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
    }
}
?>


<?php include 'layouts/header.php'; ?>

<div class="contact" id="contact">
    <h2>Contact Us</h2>

    <?php if (!empty($errorMsg)) : ?>
        <div class="alert error"><?php echo $errorMsg; ?></div>
    <?php endif; ?>

    <?php if (!empty($successMsg)) : ?>
        <div class="alert success"><?php echo $successMsg; ?></div>
    <?php endif; ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="contact-form" novalidate>
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required
            value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
        <br>
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required
            value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
        <br>

        <label for="phone">Mobile Number:</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10,15}" required
            value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
        <br>

        <label>Gender:</label>
        <div class="gender">
            <label><input type="radio" name="gender" value="male"
                    <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'male') ? 'checked' : ''; ?>> Male</label>

            <label><input type="radio" name="gender" value="female"
                    <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'female') ? 'checked' : ''; ?>> Female</label>
        </div>

        <button type="submit">Submit</button>
    </form>
</div>

<?php include 'layouts/footer.php'; ?>