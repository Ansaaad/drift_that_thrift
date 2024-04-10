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
	$pid = $_GET["id"];
$selleridpid = "SELECT sp.cid FROM seller_product AS sp WHERE sp.pid = $pid";
$result = mysqli_query($conn, $selleridpid);

if ($result) {
    // Check if there are any rows in the result set
    if (mysqli_num_rows($result) > 0) {
        // Fetch the first row
        $row = mysqli_fetch_assoc($result);
        
        // Access the 'cid' value
        $sid = $row['cid'];
        
        // Now you can use $sid
    }}
	
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Check if required fields are empty
    if(empty($email) ) {
        echo "<script>alert('Please fill email field')</script>";
    } 
    elseif(empty($message)){
        echo "<script>alert('Please fill description field')</script>";
    }
    else {
       // Insert the product into the database using prepared statements
$insert_message = "INSERT INTO `messege` (cid,sid,name, email, subject, message) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($insert_message);

// Bind the parameters
// $stmt->bind_param($product_name, $description, $Price, $condition, $image,$categories, $product_status);
$stmt->bind_param("iissss", $cid, $sid, $name, $email, $subject, $message);


if ($stmt->execute()) {
    echo "<script>alert('Successfully sent message')</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Contact | E-Shopper</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/price-range.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="./styles.css" rel="stylesheet">
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
	<div id="contact-page" class="container">
		<div class="bg">
			<div class="row">
				<div class="col-sm-12">
					<h2 class="title text-center">Contact <strong>Us</strong></h2>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8">
					<div class="contact-form">
						<h2 class="title text-center">Get In Touch</h2>
						<div class="status alert alert-success" style="display: none"></div>
						<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
							<div class="form-group col-md-6">
								<input type="text" id="name" name="name" class="form-control" required="required"
									placeholder="Name">
							</div>
							<div class="form-group col-md-6">
								<input type="email" id="email" name="email" class="form-control" required="required"
									placeholder="Email">
							</div>
							<div class="form-group col-md-12">
								<input type="text" id="subject" name="subject" class="form-control" required="required"
									placeholder="Subject">
							</div>
							<div class="form-group col-md-12">
								<textarea name="message" id="message" required="required" class="form-control" rows="8"
									placeholder="Your Message Here"></textarea>
							</div>
							<div class="form-group col-md-12">
								<input type="submit" id="submit"  name="submit" class="btn btn-primary pull-right" value="Submit">
							</div>
						</form>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="contact-info">
						<h2 class="title text-center">Contact Info</h2>
						<address>
							<p>Drift That Thrift</p>
							<p>Dhapasi,Tokha-6</p>
							<p>Kathmandu,Nepal</p>
							<p>Mobile: +333333</p>
							<p>Email: DriftThatThrift@gmail.com</p>
						</address>
						<div class="social-networks">
							<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!--/#contact-page-->





	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script type="text/javascript" src="js/gmaps.js"></script>
	<script src="js/contact.js"></script>
	<script src="js/price-range.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/main.js"></script>

	<script>
		document.getElementById('searchForm').addEventListener('submit', function (event) {
			const searchInput = document.getElementById('searchInput');
			if (searchInput.value.trim() === '') {
				event.preventDefault(); // Prevent form submission
				alert('Please enter a search query.'); // Optionally display an alert or message to the user
			}
		});
	</script>
</body>

</html>