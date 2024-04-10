
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
   
session_start();
    
// $_SESSION["cid"]=$cid;
// $cid = $_REQUEST["cid"]; 


if(isset($_SESSION["cid"])){
    $cid = $_SESSION["cid"]; 
}else{
    header("Location: login.php");
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

    // Retrieve customer details from the customer table
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
	<link rel="stylesheet" href="sellermainpage.css">
	
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
	<div class="container1 bgcolor">
		<div class= "button center-container1">
		
            <div class="flex-item"><button class="prettybutton"><a href="./sell.php" class="nav-link my-1 prettyfont"><h1>Insert Products</h1></a></button></div>
			<div class="flex-item"><button class="prettybutton"><a href="./viewsellerproduct.php" class="nav-link  my-1 prettyfont"><h1>View Products</h1></a></button></div>
			<div class="flex-item"><button class="prettybutton"><a href="./sellervieworder.php" class="nav-link  my-1 prettyfont"><h1>View Your Orders</h1></a></button></div>
            <div class="flex-item"><button class="prettybutton"><a href="./messagefromcustomers.php" class="nav-link  my-1 prettyfont"><h1>View Messege sent by customer</h1></a></button></div>
		</div>
	</div>








	   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>


</body>