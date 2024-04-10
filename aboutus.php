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
    <link rel="stylesheet" href="./aboutus.css">
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
	<style>
		body {
    		font-family: Arial, sans-serif;
    		background-color: #f0f0f0;
    		margin: 0;
    		padding: 0;
			}

		.box {
    		width: 500px; /* Set the width of the box */
    		padding: 50px; /* Add some padding to create space around the content */
    		background-color: #fff; /* Background color of the box */
    		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
    		margin: 20px auto; /* Center the box horizontally */
			}

		p {
    		color: #333; /* Text color */
		}
</style>


</head><!--/head-->

<body>
	<?php
	include('nav.php');
	?>
		
	<div id="contact-page" class="container">
		<div class="bg">
			<div class="row">
				<div class="col-sm-12">
					<h2 class="title text-center">About <strong>Us</strong></h2>
					
			</div>
				</div>
			<br>
			<br>
						<div class="col-sm-4">
							<div class="contact-info">
								<h2 class="title text-center">Contact Info</h2>
								<address>
								<p>Drift That Thrift</p>
								<p>7th street,Banasthali</p>
								<p>Kathmandu,Nepal</p>
								<p>Mobile: 9866574849</p>
								
								<p>Email: ansa333@gmail.com</p>
								</address>
						
							</div>
						</div>

    						<div class="box">
        						<h3><b> Welcome to Drift That Thrift!</b></h3><p> Your go-to destination for sustainable and affordable fashion! At Drift That Thrift, we're more than just a thrift store; we're a movement dedicated to promoting eco-conscious shopping while providing you with a delightful treasure-hunting experience.

<br>
What sets us apart is our commitment to quality, affordability, and sustainability. Every item you discover in our store is carefully selected to ensure it meets our high standards. By choosing second-hand fashion, you not only save money but also reduce your carbon footprint.
<br>
We take pride in being part of your sustainable lifestyle journey, and we're here to help you express your style while supporting a greener planet. Join us in redefining fashion by choosing Drift That Thrift.
<br>
<br>
<b>Thank you for being part of our thrift-loving community!</b>

</p>
    						</div>
	</div><!--/#contact-page-->
	</div>
</body>
</html>

	