<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
// $_SESSION["cid"]=$cid;
// $cid = $_REQUEST["cid"]; 
if(isset($_SESSION["cid"])){
	$cid = $_SESSION["cid"]; 
}

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
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Product Details | E-Shopper</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/price-range.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="./styles.css" rel="stylesheet">
	<link rel="stylesheet" href="./product-details.css">
	<link href="css/responsive.css" rel="stylesheet">
	<!-- bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
	<link rel="shortcut icon" href="images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<?php
	include("nav.php");
	?>
	<section>
		<div class="container">
		<?php

// Retrieve customer details from the customer table

$id=$_GET["id"];
$sql = "SELECT id,name, price,description,rating,image FROM products WHERE id='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
?>
			<div class="row">
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img height="281px" width="266px"src="./images/home/img/<?php echo $row["image"] ?>" />
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								<!-- Controls -->
								<a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								</a>
								<a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								</a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->

					<h2><?php echo $row["name"] ?></h2>
								<p>Product ID:<?php echo $row["id"]?></p>
								<span>
									<span>Rs.<?php echo $row["price"]?></span>
									<br>
									
									<?php
											if(isset($_SESSION["cid"])){
										?>
										<form action="addtocart.php?id=<?php echo $row["id"] ?>" method="post">
											<?php
											}
											
											else
											{
												?>
												<a href="login.php">
											<?php
											}
											?>
										
										
										<input type="submit" name="Add_To_Cart" class="btn btn-default add-to-cart" value="Add To Cart">
										</form>
								</span>
								<form action="contact-us.php">
								<input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
								<input type="submit" class="btn btn-secondary add-to-cart" value="Contact Sellers">
								</form>
								
								<p>Description:<?php echo $row["description"]?></p>
								<p><b></b> In Stock</p>
								<p><b>Rating:</b><?php echo $row["rating"]?></p>
								
					<?php
	}
}
?>						
								

</div><!--/product-information-->
						</div>
					</div><!--/product-details-->

					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							
						</div>
					</div><!--/category-tab-->

					<div class="recommended_items"><!--recommended_items-->
		<h2 class="title text-center">Products</h2>

		<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="item active">
					<?php


// Retrieve customer details from the customer table
$sql = "SELECT id,name, price, image FROM products";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
?>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								
									<div class="productinfo text-center">
										<a href="product-details.php?id=<?php echo $row["id"] ?>">
											<img  class="product-img" src="./assests/products/<?php echo $row["image"] ?>"alt="" />
										</a>
										<h2>Rs. <?php echo $row["price"] ?></h2>
										<p class="nameclass"><?php echo $row["name"] ?></p>
										<?php
											if(isset($_SESSION["cid"])){
										?>
										<form action="addtocart.php?id=<?php echo $row["id"] ?>" method="post">
											<?php
											}
											
											else
											{
												?>
												<a href="login.php">
											<?php
											}
											?>
										
										
										<input type="submit" name="add_to_cart" class="btn btn-secondary add-to-cart" value="Add To Cart">
										</form>
										
									</div>				
								

							</div>
						</div>
					</div>
					<?php
	}
}
?>
						
				</div>
			</div>
			<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
				<i class="fa fa-angle-left"></i>
			</a>
			<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
				<i class="fa fa-angle-right"></i>
			</a>
		</div>
	</div><!--/recommended_items-->


				</div>
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

</html>