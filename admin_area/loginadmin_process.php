<?php

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
    $password=$_POST["password"];

    // Perform any necessary validation on the form data here
    $sql = "SELECT id, name, phone FROM admin as a where a.email='$email' and a.password='$password'";
    $result = $conn->query($sql);
    
    // Display the retrieved customer details in a table
    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $aid=$row["id"];
        session_start();
        $_SESSION["aid"]=$aid;
        header("location:index.php");
    }
            else
                header("location:admin_login.php?login=failed");
    }

// Close the database connection
$conn->close();
?>

