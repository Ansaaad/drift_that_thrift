<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (isset($_SESSION["cid"])) {
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

// Retrieve product IDs from the cart for the specific customer
$sqlforpid = "SELECT pid FROM cart WHERE cid=$cid";
$resultforpid = mysqli_query($conn, $sqlforpid);

// Check if there are cart items for the customer
if (mysqli_num_rows($resultforpid) > 0) {
    // Loop through the cart items and transfer them to the orders database
    while ($row = mysqli_fetch_assoc($resultforpid)) {
        $pid = $row["pid"];
        
        $sql = "SELECT MAX(oid) AS max_oid FROM orders";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $lastoid = $row['max_oid'];
            $oid = $lastoid + 1;
        } else {
            // Handle the error if the query fails
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        


        // Insert the product into the orders database
        $sqlforinsertingintoorder = "INSERT INTO orders (oid,cid, pid,inserted_date,updated_date)
        VALUES ($oid,$cid, $pid,NOW(),NOW())";
        $sqlforupdatingstatus="UPDATE products 
                                SET status = 1 WHERE id= $pid  ";
        
        if (mysqli_query($conn, $sqlforinsertingintoorder)) {
            // Successfully inserted into the orders database
            // Now, delete the cart entry for the specific product and customer
            mysqli_query($conn, $sqlforupdatingstatus);
            $sqlfordeletingcartvalues = "DELETE FROM cart WHERE cid = $cid AND pid = $pid";
            
            if (mysqli_query($conn, $sqlfordeletingcartvalues)) {
                // Successfully deleted from the cart
                header("location:Thank_you_screen.php");
            } else {
                echo "Error deleting cart entry: " . mysqli_error($conn) . "<br>";
            }
        } else {
            echo "Error inserting into orders: " . mysqli_error($conn) . "<br>";
        }
    }
    
    // Redirect to payment_process.php after processing all cart items
    header("location:Thank_you_screen.php");
    exit(); // Terminate the current script to ensure the redirection occurs
} else {
    echo "No items in the cart to process.<br>";
}

// Close the database connection
$conn->close();
?>

