<?php 
session_start();
// $_SESSION["cid"]=$cid;
// $cid = $_REQUEST["cid"]; 
if(isset($_SESSION["aid"])){
	$aid = $_SESSION["aid"]; 
}else{
    header("Location: admin_login.php");
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "drift that thrift"; // corrected database name

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
elseif(isset($_POST['insert_cat'])){
    $category_title = $_POST['cat_title'];
    if(empty($category_title)){
        echo "<script>alert('Please fill name field')</script>";
    }
    elseif(empty($_FILES['image']['name'])){
        echo "<script>alert('Please select an image')</script>";
    }
    else {
        // Select data from the database
        $select_query = "SELECT * FROM categories_products WHERE name = ?";
        $stmt_select = $conn->prepare($select_query);

        // Bind the parameter
        $stmt_select->bind_param("s", $category_title);

        // Execute the statement
        $stmt_select->execute();

        // Store the result
        $result = $stmt_select->get_result();

        // Check the number of rows in the result set
        $num_rows = $result->num_rows;

        if ($num_rows > 0) {
            echo "<script>alert('This category is already present in the database')</script>";
        } else {
            $image = $_FILES['image']['name'];
            $temp_image = $_FILES['image']['tmp_name'];

            // Use prepared statement to insert data
            $insert_query = "INSERT INTO categories_products (name, image) VALUES (?, ?)";
            $stmt = $conn->prepare($insert_query);

            // Bind the parameters
            $stmt->bind_param("ss", $category_title, $image);

            // Move uploaded images to the correct folder
            $upload_path = "../assests/category/$image"; // 
            move_uploaded_file($temp_image, $upload_path);

            if ($stmt->execute()) {
                echo "<script>alert('Category has been inserted successfully')</script>";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        }
    }
}
?>

</form>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Category</title>
    <!-- css link -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/price-range.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../styles.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
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
<header>Insert product!</header>
  <!-- navbar -->
  <?php
 include("nav1.php");
 ?>
    <h2 class="text-center prettyfont">Insert Categories</h2>
<form action="" method="post" class="mb-2 pt-3" enctype="multipart/form-data">
    <div class="input-group w-90 mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    
    <div class="form-outline mb-4">
        <label for="image" class="form-label">*Category Image :</label>
        <input type="file" name="image" id="image" class="form-control" required="required">
    </div>
    <div class="input-group w-10 mb-10 m-auto">
        <input type="submit" class="form-control bgcolor border-5 p-2 my-3" name="insert_cat" value="Insert Categories">
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
