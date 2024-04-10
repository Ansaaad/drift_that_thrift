<?php
session_start();
// $_SESSION["cid"]=$cid;
// $cid = $_REQUEST["cid"]; 
if(isset($_SESSION["cid"])){
	$cid = $_SESSION["cid"]; 
} else{
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
    <title>Orders</title>
    <!-- css link -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="./styles.css" rel="stylesheet">
    <link rel="stylesheet" href="./cart.css">
    <link href="css/responsive.css" rel="stylesheet">
    <!-- bootstarp link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mooli&display=swap" rel="stylesheet">
</head>
<body>
  <header>view order!</header>
  <!-- navbar -->
  <?php
 include("nav.php");
 ?>
</div>
	</div>
	<section id="cart_items">
    <div class="container">
        <h1 class="prettyfont text-center">Orders</h1>
        <div class="table-responsive cart_info">
            <table  class="table table-condensed">
                <!-- //<td class="description">Name</td>
						<td class="description">Description</td>
                        <td class="price">Price</td>
                        <td class="price">Rating</td>
						<td class="description">Image</td>
						<td class="description">Category</td>
						<td class="description">Inserted Date</td>
						<td class="description">Updated Date</td>
                        <td></td> -->
                <thead >
                    <tr class="cart_menu">
                    <th class="price">Order ID</th>   
                    <th class="price">Product ID</th>
                    <th class="description">Product Name</th>
                    <th class="price">Product Price</th>
                    <th class="price">Customer ID</th>
                    <th class="description">Customer Name</th>
                    <th class="description">Customer Email</th>
                    <th class="description">Customer contact no.</th>
                    <th class="price">Seller ID</th>
                    <th class="description"> Name</th>
                    <th class="description">Inserted Date</th>
                    <th class="description">Shipping Adderess</th>
                    <th class="description">Receiver's Phonenumber</th>
                    <th class="price">Total Payment</th>
                    </tr>
                </thead>
                <tbody>
                <?php
    // Display the retrieved customer details in a table

$sql="SELECT * FROM messege AS m WHERE m.cid=$cid"
;

// Execute your SQL query and fetch the results
$result = mysqli_query($conn, $sql);

// Check for errors in query execution
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Initialize an empty array to store the modified results
$modifiedResults = array();

// Fetch and modify each row
while ($row = mysqli_fetch_assoc($result)) {
    // Rename the columns
    $modifiedRow = array(
        'product_id' => $row['product_id'],
        'order_id' => $row['order_id'],
        'product_name' => $row['product_name'],
        'product_price' => $row['product_price'],
        'customer_id' => $row['customer_id'],
        'customer_name' => $row['customer_name'],
        'customer_email' => $row['customer_email'],
        'customer_phone' => $row['customer_phone'],
        'seller_id' => $row['seller_id'],
        'seller_name' => $row['seller_name'],
        'order_inserted_date' => $row['inserted_date'],
        'shipping_address' => $row['shipping_address'],
        'receiver_phone_number' => $row['receiver_phone_number'],
        'total' => $row['total']
    );
    
    // Add the modified row to the results array
    $modifiedResults[] = $modifiedRow;
}

// Iterate over the modified results array and display each row
foreach ($modifiedResults as $row) {
    ?>
    <tr>
        <td class="cart_description">
            <?php echo $row['product_id'] ?>
        </td>
        <td class="cart_description">
            <?php echo $row['order_id']; ?>
        </td>
        <td class="cart_description">
            <?php echo $row['product_name'] ?>
        </td>
        <td class="cart_price">
            <?php echo $row['product_price'] ?>
        </td>
        <td class="cart_price">
            <?php echo $row['customer_id'] ?>
        </td>
        <td class="cart_description">
            <?php echo $row['customer_name'] ?>
        </td>
        <td class="cart_description">
            <?php echo $row['customer_email'] ?>
        </td>
        <td class="cart_description">
            <?php echo $row['customer_phone'] ?>
        </td>
        <td class="cart_description">
            <?php echo $row['seller_id'] ?>
        </td>
        <td class="cart_description">
            <?php echo $row['seller_name'] ?>
        </td>
        <td class="cart_description">
            <?php echo $row['order_inserted_date'] ?>
        </td>
        <td class="cart_description">
            <?php echo $row['shipping_address'] ?>
        </td>
        <td class="cart_description">
            <?php echo $row['receiver_phone_number'] ?>
        </td>
        <td class="price">
            <?php echo $row['total'] ?>
        </td>
    </tr>
<?php
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