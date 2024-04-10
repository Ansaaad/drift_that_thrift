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
		<style>
             body{
            margin:0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .content{
            
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            
        }
        div.message{
            text-align:center;
            background-color: antiquewhite;
            border-radius: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 70px;
            max-width: 800px; 
            margin: 0; /* Center the box horizontally */
        }
        .button{
            margin:0 auto;
        }
        form{
            margin:50px;
        }
       
            </style>
</head><!--/head-->
<body>
<?php
include("nav.php");
?>

<header>
        <h1>Terms and Conditions</h1>
    </header>
    <br>
    <br>
    <br>
    <form>
        <h3>1. Users must provide accurate and complete information during the registration process.</h3>
        <br>

        <h3>2. All items listed for sale must be in a good condition. </h3>
        <br>

        <h3>3. Sellers are required to furnish credible proof that the products they list accurately match their descriptions. This verification is essential to maintain trust.</h3>
        <br>

        <h3>4. Sellers set the price for their items, but the platform charge fees or commissions of 10% on successful sales. </h3>
        <br>

        <h3>5. Once the order is placed, seller cannot refuse to sell the product. </h3>
    </form>
    
    
    <form method="POST" action="handle_agreement.php">
        <label>
            <input type="checkbox" name="agree" required> I agree to the Terms and Conditions
        </label>
        <br>
        <br>
        <br>
        <button type="submit">Proceed to Sell Item</button>
        <br>
        <br>
        
        <a href="aboutus.php"> Contact Information </a>
    </form>
</body>
</html>