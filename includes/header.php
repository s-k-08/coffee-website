<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atlas & Co.</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts: Lora -->
<link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&display=swap" rel="stylesheet">
<style>
    body { 
        font-family: 'Lora', serif; 
        background-color: #fff5e0ff; 
        color: #003621ff; 
    }
    .navbar { 
        background-color: #003621ff; 
    }
    .navbar a { 
        color: #f5f1eb !important; 
        font-weight: 500; 
    }
    .card { 
        border: 1px solid #fff5e0ff; 
        border-radius: 0px; 
        box-shadow: none; 
    }
    .btn-primary { 
        background-color: #003621ff; 
        border: 1px solid #ffffffff; 
        border-radius: 0px; 
    }
    .btn-primary:hover { 
        background-color: #000000ff; 
    }
    .btn-danger { 
        background-color: #000000ff; 
        border: 1px solid #ffffffff; 
        border-radius: 0px; 
    }
    .btn-danger:hover { 
        background-color: #000000ff; 
    }
    h1, h2, h3, h5 { 
        font-family: 'Lora', serif; 
    }
</style>

</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand " href="index.php">Atlas & Co.</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="products.php">Our Coffees</a></li>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
