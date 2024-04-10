<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
   
session_start();
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
	<title>Account</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/price-range.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="./styles.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="./checkout.css">
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

    <style>
        body{
            margin: 0;
            padding: 0;
            
        }
        .content{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            
        }
        div.message{
            text-align:center;
            background-color: #f0f0f0;
            border-radius: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 70px;
            max-width: 800px; 
            margin: 0; /* Center the box horizontally */
        }
        </style>

</head><!--/head-->

<body>
	<?php
    include("nav.php");
    ?>
<div class="content">
    <div class="message">
        <h1>User Profile</h1>
					<div class="col-sm-20">
						<div class="user-info">
							<br>
							<form>
								<?php
							$sql = "SELECT * FROM customers WHERE id = $cid";
							$result = $conn->query($sql);

								if ($result->num_rows > 0) {
    							$row = $result->fetch_assoc();
									

    						// Display customer information on the checkout page
							
    							?>
                                
                                <h3><?php echo " " . $row["name"];?></h3>
                                
    							<h5> <?php echo " " . $row["email"]; ?></h5>
                                <br>
                            
                                <h5> <?php echo "<p>PhoneNo: " . $row["phone"]; ?></h5>
                                <br>
                                <br>
                                <br>
                                <h4> <a href="change_password.php">Change Your Password</a></h4>
                                <br>
                                
                                <?php
                                }
                                $conn->close();
								?>
                                </form>

                                
						</div>
					</div>
    </div>
</div>
</body>
</html>