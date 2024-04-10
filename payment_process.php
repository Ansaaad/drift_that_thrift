<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (isset($_SESSION["cid"])) {
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

// Update product statuses based on payment status
$sqlforupdatestatus = "UPDATE products
                        INNER JOIN orders ON products.id = orders.pid
                        INNER JOIN payment ON orders.id = payment.oid
                        SET products.status = 1
                        WHERE payment.status = 1";

if (mysqli_query($conn, $sqlforupdatestatus)) {
    // Successfully updated product statuses
    header("Location: Thank_you_screen.php");
} else {
    echo "Error updating product statuses: " . mysqli_error($conn) . "<br>";
}

// Close the database connection
$conn->close();
?>
