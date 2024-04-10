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
<section id="cart_items">
    <div class="container">
        <h1>Cart:</h1>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">Name</td>
                        <td class="price">Price</td>
                        <td class="total">Action</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                <?php
    // Display the retrieved customer details in a table

    $sql = "SELECT c.id,p.name,p.price,p.image from products as p inner join cart as c on p.id=c.pid where c.cid=$cid";
$result = mysqli_query($conn,$sql);
			$totalCost = 0;
            $Total=0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
			$itemPrice = $row["price"];
			$totalCost += $itemPrice;
			$shippingCost = 100;
			$Total = $totalCost + $shippingCost;
?>
            <tr>
                            <td class="cart_product1">
                                <a href=""><img height="100px" width="100px" src="./assests/products/<?php echo $row["image"]?>" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href=""><?php echo $row["name"]?>
                            </td>
                            <td class="cart_price">
                                <p><?php echo $row["price"]?></p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="process_cart_delete.php?id=<?php echo $row["id"]?>&cid=<?php echo $cid?>">Delete</a>
                            </td>
                        </tr>
<?php
        }
    }
// Close the database connection
$conn->close();
?>
                    </tbody>
                </table>
            </div>
    
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">

           
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>Rs.<?php echo $totalCost; ?></span></li>
                            <li>Shipping Cost <span>Rs.100</span></li>
                            <li>Total <span>Rs.<?php echo $Total; ?> </span></li>
                        </ul>
                       
                        <a class="btn1 btn-default1 check_out" href="./checkout.php?total=<?php echo $Total ?>">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>


</body>

</html>



