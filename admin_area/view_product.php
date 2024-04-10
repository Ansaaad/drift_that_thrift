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
    <title>Products</title>
    <!-- css link -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/price-range.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../styles.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <link href="./index1.css" rel="stylesheet">
    <link href="../cart.css" rel="stylesheet">
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
</div>
	</div>
	<section id="cart_items">
    <div class="container">
        <h1 class="prettyfont text-center">PRODUCTS</h1>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="description">Name</td>
						<td class="description">Description</td>
                        <td class="price">Price</td>
                        <td class="price">Rating</td>
						<td class="description">Image</td>
						<td class="description">Category</td>
						<td class="description">Inserted Date</td>
						<td class="description">Updated Date</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                <?php
    // Display the retrieved customer details in a table

    $sql = "SELECT p.* ,c.name AS category_name FROM products as p JOIN categories_products AS c ON p.category_id=c.id";
$result = mysqli_query($conn,$sql);
			$totalCost = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
			$name = $row["name"];
			$description =$row["description"];
			$price = $row["price"];
			$rating = $row["rating"];
			$image = $row["image"];
			$category = $row["category_name"];
			$inserted_date = $row["inserted_date"];
			$updated_date = $row["updated_date"];
?>
            <tr>
                            <td class="cart_description">
                             <?php echo $name ?>
                            </td>
                            <td class="cart_description">
							<?php echo $description ?>
                            </td>
                            <td class="cart_price">
							<?php echo $price ?>
                            </td>
							<td class="cart_price">
							<?php echo $rating ?>
                            </td>
							<td class="cart_description">
							<img height='100px'width='100px'src="../assests/products/<?php echo $image ?>">
                            </td>
							<td class="cart_description">
							<?php echo $category ?>
                            </td>
							<td class="cart_description">
							<?php echo $inserted_date ?>
                            </td>
							<td class="cart_description">
							<?php echo $updated_date ?>
                            </td>
                        </tr>
<?php
        }
    }
// Close the database connection
$conn->close();
?>
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
     </tbody>
    </table>