<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
        

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

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $email = $_POST["email"];
    $password=$_POST['password'];
  

    // Perform any necessary validation on the form data here
    $sql = "SELECT id, name, phone,password  FROM customers as c where email='$email'";
    $result = $conn->query($sql);

    // Display the retrieved customer details in a table
    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        if (password_verify($password, $hashedPassword)){
        $cid=$row["id"];
        $_SESSION["cid"] = $cid;
        header("location:index.php");
        exit;
    }
}
        header("location:login.php?login=failed");
        exit;
    }


// Close the database connection
$conn->close();
?>


