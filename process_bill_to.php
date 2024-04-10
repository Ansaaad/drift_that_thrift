<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

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

if (isset($_POST['submit'])) {
    // Retrieve data from the form
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $total=$_POST["total"];
    //last oid retrived
    $sql1 = "SELECT MAX(oid) AS max_oid FROM orders";
    $result = mysqli_query($conn, $sql1);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $lastoid = $row['max_oid'];
        $oid = $lastoid + 1;
    } else {
        // Handle the error if the query fails
        echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
    }
    
    $sql = "INSERT INTO bill_to_details (first_name, middle_name, last_name, address, phone,oid,totalpurchase) 
            VALUES ('$first_name', '$middle_name', '$last_name', '$address', $phone,$oid,$total)";

    
    if ($conn->query($sql) === TRUE) {
        // Send a response to JavaScript
        echo '<script>alert("Bill To details inserted successfully!");</script>';
        // Redirect to thank_you_screen.php after a short delay
        echo '<script>window.setTimeout(function(){ window.location.href = "checkout_process.php"; }, 2000);</script>';

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

