<?php
include('includes/header.php');
include('includes/db_connect.php');
session_start();

// Handle subscription cancellation
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cancel_id'])){
    $cancel_id = intval($_POST['cancel_id']);
    $conn->query("UPDATE subscriptions SET status='cancelled' WHERE id=$cancel_id AND user_id=".$_SESSION['user_id']);
    echo "<div class='alert alert-info mt-3'>Subscription cancelled successfully.</div>";
}
?>

<div class="container mt-4">

<?php
// Logged-in user greeting and active subscriptions
if(isset($_SESSION['user_id'])){
    echo "<div class='alert alert-success'>Welcome, " . $_SESSION['username'] . ".</div>";

    $user_id = $_SESSION['user_id'];
    $subs_result = $conn->query("
        SELECT s.id as sub_id, p.name, p.country, p.image, p.price, s.subscription_date
        FROM subscriptions s
        JOIN products p ON s.product_id = p.id
        WHERE s.user_id = $user_id AND s.status = 'active'
    ");

    if($subs_result->num_rows > 0){
        echo "<h3 class='mt-4'>Your Active Subscriptions:</h3><div class='row'>";
        while($sub = $subs_result->fetch_assoc()){
            echo '<div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="assets/images/'.$sub['image'].'" class="card-img-top" alt="'.$sub['name'].'">
                        <div class="card-body">
                            <h5 class="card-title">'.$sub['name'].'</h5>
                            <p class="card-text"><strong>Country:</strong> '.$sub['country'].'</p>
                            <p class="card-text"><strong>Subscribed on:</strong> '.$sub['subscription_date'].'</p>
                            <p class="card-text"><strong>Price:</strong> $'.$sub['price'].'</p>
                            <form method="POST" action="">
                                <input type="hidden" name="cancel_id" value="'.$sub['sub_id'].'">
                                <button type="submit" class="btn btn-danger">Cancel Subscription</button>
                            </form>
                        </div>
                    </div>
                  </div>';
        }
        echo "</div>";
    } else {
        echo "<p class='mt-3'>You have no active subscriptions.</p>";
    }
}
?>

<!-- Homepage welcome section -->
<div class="text-center mt-5">
    <h1 class="display-4">Atlas & Co.</h1>
    <p class="lead">Discover unique coffees from around the world, delivered fresh to your door every month.</p>
    <a href="products.php" class="btn btn-primary btn-lg mt-3">Start Your Subscription</a>
</div>

</div> <!-- /.container -->

<?php include('includes/footer.php'); ?>
