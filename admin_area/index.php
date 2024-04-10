<?php 
session_start();
// $_SESSION["cid"]=$cid;
// $cid = $_REQUEST["cid"]; 
if(isset($_SESSION["aid"])){
	$aid = $_SESSION["aid"]; 
}
  else{
    header("Location: admin_login.php");
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- css link -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/price-range.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../styles.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="index1.css">
    <!-- bootstarp link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mooli&display=swap" rel="stylesheet">
</head>
<body>
  <header>Welcome Admin</header>
  <!-- navbar -->
 <?php
 include("nav1.php");
 ?>
  <id class="admin-main">
    <div class="bg-light">
      <h1 class="text-center p-2">Manage Details</h1>
    </div>
    <div class="col-sm-12">
            <div class="col-md-12 bgcolor p-1">
              <div class="text-center">
                <a href=""><img height="50px" width="50px"src="../assests/sell.png" alt=""></a>
                <h2><p class=" text-center prettyfont">ADMIN NAME</p></h2>
              </div>	
              <div class="button text-center container">
                        <div class="flex-item"><button class="prettybutton"><a href="view_product.php" class="nav-link my-1 prettyfont">View Products</a></button></div>
                        <div class="flex-item"><button class="prettybutton"><a href="insert_categories.php" class="nav-link my-1 prettyfont">Insert Categories</a></button></div>
                        <div class="flex-item"><button class="prettybutton"><a href="view_category.php" class="nav-link my-1 prettyfont">View Categories</a></button></div>
                        <div class="flex-item"><button class="prettybutton"><a href="view_order.php" class="nav-link my-1 prettyfont">All Orders</a></button></div>
                        <div class="flex-item"><button class="prettybutton"><a href="allpayments.php" class="nav-link my-1 prettyfont">All Payments</a></button></div>
                        <div class="flex-item"><button class="prettybutton"><a href="list_users.php" class="nav-link my-1 prettyfont">List Users</button></div>
                        <div class="flex-item"><button class="prettybutton"><a href="list_sellers.php" class="nav-link my-1 prettyfont">List Sellers</a></button></div>
                        </form>
                        
              </div>
              <div class="container my-5 prettyfont">
                <?php
                  if(isset($_GET['insert_category'])){
                    include('insert_categories.php');
                  }
               ?>
             </div>
          </div>
           
    </div>
      </id>


     <!-- javascript link-->
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