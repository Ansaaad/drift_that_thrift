<?php 
session_start();
// $_SESSION["cid"]=$cid;
// $cid = $_REQUEST["cid"]; 
if(isset($_SESSION["cid"])){
	$cid = $_SESSION["cid"]; 
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
	<title>Home | E-Shopper</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/price-range.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="./styles.css" rel="stylesheet">
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

<?php
include("nav.php");
?>

	<div id="myCarousel" class="carousel slide mb-6 slide " data-bs-ride="carousel" data-bs-theme="light"
		class="container">
		<div class="carousel-indicators">
			<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class=""
				aria-label="Slide 1"></button>
			<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"
				class=""></button>
			<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class="active"
				aria-current="true"></button>
		</div>
		<div class="carousel-inner">
			<div class="carousel-item">
				<img width="100%" height="600px" src="./assests/homepage main img.png" width="100%" height="500px" alt="">

			</div>
			<div class="carousel-item active carousel-item-start">
				<img width="100%" height="600px" src="./assests/homepage main img.png" alt="">

			</div>
			<div class="carousel-item carousel-item-next carousel-item-start">
				<img width="100%" height="600px" src="./assests/homepage main img.png" alt="">
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>





	<hr class="gap">

	<div class="container">
		<div class="row">
		<?php
// Retrieve customer details from the categories_products table
$sql = "SELECT id,name, image FROM categories_products";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
?>
			<div class="col-sm-4 maincategories">
				<a href="product-details.php">
					<div class="thumbnail">
						<img height='1600px' width='1600px' src="assests/category/<?php echo $row["image"] ?>" alt="bag">
						<div class="caption">
							<h3><?php echo $row["name"] ?></h3>

						</div>
					</div>
				</a>
			</div>
			<?php
		}
}
?>

			
		</div>
	</div>
	
	<div class="recommended_items"><!--recommended_items-->
		<h2 class="title text-center">Products</h2>

		<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="item active">
					<?php


// Retrieve customer details from the products table
$sql = "SELECT id,name, price, image,status FROM products WHERE status=0";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
?>
					<div class="col-sm-4">
						
						<div class="product-image-wrapper">
							<div class="single-products">								
									<div class="productinfo text-center">
										<a href="product-details.php?id=<?php echo $row["id"] ?>">
											<img height='200px' width='200px' class="product-img" src="./assests/products/<?php echo $row["image"] ?>" alt="" />
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
										</form>
									</div>		
										
								
 
							</div>
						</div>
					</div>
					<?php
	}
}
?>

<br>
<br>
<br>

						
				</div>
			</div>
			
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
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/main.js"></script>


	



</body>
</html>
