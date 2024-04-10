
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
   
session_start();
    
// $_SESSION["cid"]=$cid;
// $cid = $_REQUEST["cid"]; 


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
	
               

<?php
    $sql = "SELECT p.*, pc.name AS category_name 
    FROM `products` AS p 
    JOIN seller_product AS s ON p.id = s.pid 
    JOIN categories_products AS pc ON p.category_id = pc.id
    WHERE s.cid=$cid;";
$result = mysqli_query($conn,$sql);
			$totalCost = 0;
            ?>
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
                        <td class="description">status</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $testid=$row["id"];
			$name = $row["name"];
			$description =$row["description"];
			$price = $row["price"];
			$rating = $row["rating"];
			$image = $row["image"];
			$category = $row["category_name"];
			$inserted_date = $row["inserted_date"];
			$updated_date = $row["updated_date"];
            $product_status= $row["status"];
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
							<td class="cart_descrition">
							<img height='50px'width='50px'src="./assests/products/<?php echo $image ?>">
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
                            <?php
                            if($product_status==2){
                            ?>
                            <td class="col-sm-1 cart_description">
                            <?php echo "Item sold!";
                            
                            ?>
                            </td>
                            <?php
                            }
                            else{
                            ?>
                            <td class="col-sm-1 cart_description">
                            <?php echo "Item not sold!";
                            ?>
                             </td>
                            <?php
                        }
        ?>
                        </tr>
                     
                     
<?php
        }
    }
    else{
        ?>
        
     <h1 class="text-center"> <?php  echo "NO items yet"; ?> </h1>
     <?php
    }
// Close the database connection
$conn->close();
?>








	   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>


</body>