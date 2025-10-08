<?php
include('includes/header.php');
include('includes/db_connect.php');
session_start();

$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $message = "Login successful! Welcome, " . $user['username'];
            // Redirect to homepage or dashboard
            header("Location: index.php");
            exit();
        } else {
            $message = "Incorrect password!";
        }
    } else {
        $message = "No account found with that email!";
    }
}
?>

<div class="container">
    <h2 class="mb-4">Login</h2>
    <?php if($message) echo "<div class='alert alert-info'>$message</div>"; ?>
    <form method="POST" action="">
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<?php include('includes/footer.php'); ?>
