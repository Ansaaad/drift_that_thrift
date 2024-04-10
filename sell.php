<?php 
session_start();
// $_SESSION["cid"]=$cid;
// $cid = $_REQUEST["cid"]; 
if(isset($_SESSION["cid"])){
	$cid = $_SESSION["cid"]; 
}
else{
	header('Location:login.php');
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
	<title>Product Details | E-Shopper</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/price-range.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="./styles.css" rel="stylesheet">
	<link rel="stylesheet" href="./product-details.css">
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
    <?php
if(isset($_POST['insert_product'])){
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $categories = $_POST['categories'];
    $condition = $_POST['condition'];
    $Price = $_POST['Price'];
    $product_status = 'true';
  // Check if required fields are empty
    if(empty($product_name) ) {
        echo "<script>alert('Please fill product name field')</script>";
    } 
    elseif(empty($description)){
        echo "<script>alert('Please fill description field')</script>";
    }
    elseif(empty($categories)){
        echo "<script>alert('Please fill category field')</script>";
    }
    elseif(empty($condition)){
        echo "<script>alert('Please fill condition field')</script>";
    }
    elseif(empty($Price)){
        echo "<script>alert('Please fill price field')</script>";
    }
    elseif(empty($_FILES['image']['name'])){

    }

    else {
        $image = $_FILES['image']['name'];
        
        $temp_image = $_FILES['image']['tmp_name'];


        // Move uploaded images to the correct folder
        move_uploaded_file($temp_image, "./assests/products/$image");

       // Insert the product into the database using prepared statements
$insert_products = "INSERT INTO `products` (name, description, price, rating, image,category_id, inserted_date, updated_date, status) VALUES (?, ?, ?, ?,?, ?, NOW(), NOW(), ?)";
$stmt = $conn->prepare($insert_products);

// Bind the parameters
// $stmt->bind_param($product_name, $description, $Price, $condition, $image,$categories, $product_status);
$stmt->bind_param("ssdissi", $product_name, $description, $Price, $condition, $image, $categories, $product_status);


if ($stmt->execute()) {
    echo "<script>alert('Successfully inserted the products')</script>";
} else {
    echo "Error: " . $stmt->error;
}
$newpid = $conn->insert_id;

// Check if the insertion was successful and the product_id is valid
if ($newpid > 0) {
    // The $newlyInsertedProductId variable now holds the product_id of the newly inserted record
	// $insert_sellerinfo="INSERT INTO seller_product(cid,pid)VALUES(?,?)";
	$insert_sellerinfo = "INSERT INTO seller_product (cid, pid) VALUES (?, ?)";
	$stmt = $conn->prepare($insert_sellerinfo);
	// echo $cid. ' '.$newpid;
	// die();
	$stmt->bind_param("ii",$cid,$newpid);
	if ($stmt->execute()) {
		echo "<script>alert('Successfully inserted the products')</script>";
	} else {
		echo "Error: " . $stmt->error;
	}
} else {
    // Handle the case where the insertion failed
    echo "Failed to insert a new product.";
}
$stmt->close();
    }
}
	

?>
<link rel="stylesheet" href="sell.css">





    <div class="container mt-3 bgcolor">
        <h1 class="text-center prettyfont mt-5">Insert Products</h1>
        <!-- form -->
        <form action="" method="POST" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4">
                <label for="product_name" class="form-label">*Product name:</label>
                <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter product name" autocomplete="off" required="required">
            </div>
            <!-- description -->
            <div class="form-outline mb-4">
                <label for="description" class="form-label">*Description:</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Add product description" autocomplete="off" required="required">
            </div>
            <!-- Keywords -->
            <div class="form-outline mb-4">
                <label for="Keywords" class="form-label">Products Keywords:</label>
                <input type="text" name="Keywords" id="Keywords" class="form-control" placeholder="Add  product keywords" autocomplete="off" required="required">
            </div>
            <!-- categories -->
            <div class="form-outline mb-4">
              <select name="categories" id="" class="categories">
                <option value="">*Select a Category</option>
                <?php
                
                $sql = "SELECT id,name, image FROM categories_products";
                $result = $conn->query($sql);
                
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
								$category_name=$row["name"];
                                $category_id=$row["id"];

							                echo "<option value='$category_id'>$category_name</option>";
										}
								}
                                ?>
              </select>
            </div>
            <!--Image 1-->
            <div class="form-outline mb-4">
                <label for="image" class="form-label">*Product Image :</label>
                <input type="file" name="image" id="image" class="form-control"  required="required">
            </div>
            <!-- condition -->
            <div class="form-outline mb-4">
                <label for="condition" class="form-label">*condition</label>
                <input type="text" name="condition" id="condition" placeholder=" Condition out of 10" class="form-control"  required="required">
            </div>
            <!-- Price -->
            <div class="form-outline mb-4">
                <label for="Price" class="form-label">*Price:</label>
                <input type="text" name="Price" id="Price" class="form-control" placeholder="Add price for the product" autocomplete="off" required="required">
            </div>
            
            <div class="form-outline mb-4">
                <input type="submit" name="insert product" class="btn btn-primary" value="Insert Product">
            </div>

        </form>
        
    </div>




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


