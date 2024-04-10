<?php
$id = $_REQUEST["id"];
$cid = $_REQUEST["cid"];


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

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    
// Retrieve customer details from the customer table
$sql = "Delete From cart where id=$id";

$result = $conn->query($sql);

// Display the retrieved customer details in a table
// if ($result->num_rows > 0){
//     $row = $result->fetch_assoc();
//     $cid=$row["id"];
//     header("location:cart.php?cid=$cid");
// }
// else
//     header("location:login.php?error=notfound");

header("location:cart.php?cid=$cid");
// Close the database connection
$conn->close();
    // Prepare and execute the SQL INSERT query
    // $sql = "INSERT INTO customer (name, phone) VALUES ('$name', '123')";

    // if ($conn->query($sql) === TRUE) {
    //     echo "Registration successful!";
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    // }
}

?>
