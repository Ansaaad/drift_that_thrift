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
            margin: 0;
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
            text-align:center;
        }
        </style>
</head><!--/head-->
<body>
  
<?php
include("nav.php");
?>
                                <form action="change_password_process.php" method="post">
                                <h3 class="text-center">Change Password</h3>
                                <br>
                                <br>
                                <div class="form-group" required style="text-align:center;">
                                    <label for="current_password">Current Password:</label>
                                    <input type="password" name="current_password" class="form-control" required style="width: 300px;margin:auto;">
                                </div>
                                <div class="form-group" required style="text-align:center;">
                                    <label for="new_password">New Password:</label>
                                    <input type="password" name="new_password" class="form-control" required style="width: 300px;margin:auto;">
                                </div>
                                <div class="form-group" required style="text-align:center;">
                                    <label for="confirm_password">Confirm New Password:</label>
                                    <input type="password" name="confirm_password" class="form-control" required style="width: 300px;margin:auto;">
                                </div>
                                <button type="submit"  class="btn btn-primary"required style="margin:0 auto;" >Change Password</button>
                                </form>
</body>

</html>