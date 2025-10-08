<?php
include('includes/header.php');
include('includes/db_connect.php');
session_start();

if(!isset($_SESSION['user_id'])){
    echo "<p class='alert alert-warning'>You must be logged in to subscribe. <a href='login.php'>Login here</a>.</p>";
    include('includes/footer.php');
    exit();
}

$message = '';
$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;

// Get product info
$product = $conn->query("SELECT * FROM products WHERE id = $product_id")->fetch_assoc();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user_id = $_SESSION['user_id'];
    $product_id = intval($_POST['product_id']);

    // Insert subscription
    $conn->query("INSERT INTO subscriptions (user_id, product_id) VALUES ($user_id, $product_id)");
    $message = "Subscription added to your account!";
}
?>

<div class="container">
    <h2 class="mb-4">Subscribe to Monthly Coffee Club</h2>
    <?php if($message) echo "<div class='alert alert-success'>$message</div>"; ?>

    <?php if($product): ?>
        <div class="card mb-4" style="max-width: 400px;">
            <img src="assets/images/<?php echo $product['image']; ?>" class="card-img-top" alt="<?php echo $product['name']; ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo $product['name']; ?></h5>
                <p class="card-text"><?php echo $product['description']; ?></p>
                <p><strong>Price:</strong> £<?php echo $product['price']; ?></p>
                <form method="POST" action="">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </form>
            </div>
        </div>
    <?php else: ?>
        <p>Invalid product selected.</p>
    <?php endif; ?>
</div>

<?php include('includes/footer.php'); ?>
