<?php
include('includes/header.php');
include('includes/db_connect.php');
session_start();
?>

<h2 class="mb-4 text-center">Our Coffees</h2>
<div class="row">

<?php
$result = $conn->query("SELECT * FROM products");

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo '<div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="assets/images/'.$row['image'].'" class="card-img-top" alt="'.$row['name'].'" style="height:250px; object-fit:cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">'.$row['name'].'</h5>
                        <p class="card-text">'.$row['description'].'</p>
                        <p class="card-text"><strong>Country:</strong> '.$row['country'].'</p>
                        <p class="card-text"><strong>Price:</strong> £'.$row['price'].'</p>
                        <a href="subscribe.php?product_id='.$row['id'].'" class="btn btn-primary mt-auto">Subscribe</a>
                    </div>
                </div>
              </div>';
    }
} else {
    echo '<p>No products available.</p>';
}
?>

</div> <!-- /.row -->

<?php include('includes/footer.php'); ?>
