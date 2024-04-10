<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Shop | E-Shopper</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/price-range.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="./styles.css" rel="stylesheet">
	<link rel="stylesheet" href="./shop.css">
	<link href="css/responsive.css" rel="stylesheet">
	<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
	<link rel="shortcut icon" href="images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<!-- bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head><!--/head-->
<body>
	<header>Shop sustainably with Drift That Thrift-free shipping on all orders over 5000!</header>
	<nav class="navbar navbar-expand-md">
		<div class="container-fluid">
			<img src="./assests/logo.png" alt="logo">

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
				aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="./index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="">About us</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
							data-bs-toggle="dropdown" aria-expanded="false">
							Products
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">  
							<li><a class="dropdown-item" href="./shop.php">All products</a></li>
							<li><a class="dropdown-item" href="#">Clothes</a></li>
							<li><a class="dropdown-item" href="#">Bags</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a class="dropdown-item" href="#">Makeup</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>

		<form class="d-flex" role="search">
			<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-success" type="submit">Search</button>
		</form>
		<ul class="navbar-nav ms-auto">
			<li class="nav-item">
				<a class="nav-link" href="#">Account</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="./login.php">Signup/Login</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="./cart.html">Cart</a>
			</li>
		</ul>
		</div>
	</nav>
	<section>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">All Products</h2>
						<?php
// Assuming you have your database connection details
$servername = "localhost";

$username = "root";
$password = "";
$dbname = "drift that thrift";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve customer details from the customer table
$sql = "SELECT pid,pname, price, image1 FROM products";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
?>
						<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<a href="product-details.php?id=<?php echo $row["pid"] ?>">
									<div class="productinfo text-center">
										<img  class="product-img" src="./images/home/img/<?php echo $row["image1"] ?>" alt="" />
										<h2>Rs. <?php echo $row["price"] ?></h2>
										<p class="nameclass"><?php echo $row["pname"] ?></p>
										<a href="./cart.html" class="btn btn-default add-to-cart"><i
												class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>				
								</a>

							</div>
						</div>
					</div>
					<?php

				}
}
?>
</div>
</div>
</section>
							



		

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
		crossorigin="anonymous"></script>



	<script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/main.js"></script>
</body>




<body>



	