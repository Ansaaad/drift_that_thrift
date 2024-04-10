<?php 
session_start();
// $_SESSION["cid"]=$cid;
// $cid = $_REQUEST["cid"]; 
if(isset($_SESSION["cid"])){
	$cid = $_SESSION["cid"]; 
}else{
    header("Location: login.php");
  }

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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="./styles.css" rel="stylesheet">
    <link rel="stylesheet" href="./cart.css">
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
	<div class="recommended_items">
		<h2 class="title text-center">All Products</h2>

		<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
			
				<div class="item active">
					<?php


// Retrieve customer details from the products table
$sql = "SELECT id,name, price, image,status FROM products WHERE status=0";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
?>
					<div class="col-sm-2">
						
						<div class="product-image-wrapper">
							<div class="single-products">								
									<div class="productinfo text-center">
										<a href="product-details.php?id=<?php echo $row["id"] ?>">
											<img height='100px' width='80px' class="product-img" src="./assests/products/<?php echo $row["image"] ?>" alt="" />
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

											
											
										<input type="hidden" name="name" value="<?=$row["name"] ?>">
										<input type="hidden" name="price" value="<?=$row['price']?>">
										<input type="submit" name="Add_To_Cart" class="btn btn-secondary add-to-cart" value="Add To Cart">
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
</div>
</body>