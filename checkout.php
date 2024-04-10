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
	<title>Checkout | E-Shopper</title>
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
</head><!--/head-->

<body>
	<?php
	include("nav.php")
	?>
	<section id="cart_items">
		<div class="container">
			<h1>CHECKOUT</h1>

			</div><!--/checkout-options-->
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<br>
							<form>
								<?php
							$sql = "SELECT * FROM customers WHERE id = $cid";
							$result = $conn->query($sql);

								if ($result->num_rows > 0) {
    							$row = $result->fetch_assoc();
									

    						// Display customer information on the checkout page
							
    							echo "<h3>Shopper Information</h3>";
    							echo "<p>Name: " . $row["name"] . "</p>";
								echo "<p>Phone No.: " . $row["phone"] . "</p>";
    							echo "<p>Email: " . $row["email"] . "</p>";
    
    // Add more fields as needed
}
$total=$_GET["total"];

// Close the database connection
$conn->close();
								?>
							</form>
							
						</div>
					</div>
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
								<form method="POST" action="process_bill_to.php" onsubmit="return validateForm();">
								<div class="form-one">
									<input type="text" name="first_name" id="first_name" placeholder="First Name *:">
									<br>
									<input type="text" name="middle_name" id="middle_name" placeholder="Middle Name:">
									<br>
									<input type="text" name="last_name" id="last_name" placeholder="Last Name *:">
									<br>
									<input type="text" name="address" id="address" placeholder="Address *:">
									<br>
									<input type="text" name="phone" id="phone" placeholder="Phone No *:">
									<input type="hidden" name="total" value="<?php echo $total?>">
								</div>
								<div class="form-actions">
								<button type="submit" name="submit" class="btn btn-default">CONFIRM ORDER</button>
								</div>
								</form>
								

								<script>
function validateForm() {
    const firstName = document.getElementById('first_name').value;
    const lastName = document.getElementById('last_name').value;
    const address = document.getElementById('address').value;
    const phone = document.getElementById('phone').value;

    if (firstName.trim() === '' || lastName.trim() === '' || address.trim() === '' || phone.trim() === '') {
        alert('Please fill in all required fields.');
        return false; // Prevent form submission
    }
    return true; // Allow form submission
}
</script>


							</div>
							
						</div>
					</div>
					<br>
					<br>
					<br>
					<div class="col-sm-4">
						<div class="order-message">
							<p><b>Shipping Order</b></p>
							<textarea name="message" placeholder="Notes about your order, Special Notes for Delivery"
								rows="16"></textarea>
							<label><input type="checkbox"> Shipping to bill address</label>
							<br>
							<label><input type="checkbox"> Cash On Delivery</label>
							<br>
							<div class="form-actions">
							
        <button type="submit" name="submit" class="btn btn-default">CONFIRM ORDER</button>
		<br>
		<br>
    </div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
			

		</div>
	</section> <!--/#cart_items-->




	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
		crossorigin="anonymous"></script>


	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
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