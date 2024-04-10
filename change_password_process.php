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

   

</head><!--/head-->

<body>
	<?php
    include("nav.php");
    ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user's current password, new password, and confirm new password from the form
    $currentPassword = $_POST["current_password"];
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];

    $sql = "SELECT password FROM customers WHERE id = $cid";
    $result = $conn->query($sql);
    // Validate the new password and confirm password
    if ($newPassword != $confirmPassword) {
        echo "New password and confirm password do not match.";
        // You can add a back button or redirect the user to the profile page here.
        exit();
    }

    // Check if the current password matches the one stored in the database
    // Use your database query to retrieve the current password for the user
    
   

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["password"];


        // Verify the current password
        if (password_verify($currentPassword, $hashedPassword)) {
            // Hash the new password and update it in the database
            $newHashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
            $updateSql = "UPDATE customers SET password = '$newHashedPassword' WHERE id = $cid";
            if ($conn->query($updateSql) === TRUE) {
                echo '<script>alert("Password updated successfully."); window.location.href = "login.php";</script>';
                
                exit();
                
                // You can add a redirection or message here.
            } else {
                echo '<script>alert("Error Updating."); window.location.href = "change_password.php";</script>';
            }
        } else {
            echo '<script>alert("Incorrect current password."); window.location.href = "change_password.php";</script>';
            // You can add a back button or redirect the user to the profile page here.
        }
    } else {
        echo '<script>alert("User not found."); window.location.href = "change_password.php";</script>';
        // You can add a back button or redirect the user to the profile page here.
    }

    $conn->close();
}
?>
