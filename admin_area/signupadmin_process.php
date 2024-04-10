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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password=$_POST["password"];

    // Perform any necessary validation on the form data here
    if(!empty($email)&&($password)&& !is_numeric($email)){
    // Prepare and execute the SQL INSERT query
    $query = "INSERT INTO admin (name, email, phone,password) VALUES ('$name', '$email', '$phone','$password')";
    mysqli_query($conn,$query);
   // echo "<script type='text/javascript'>alert('succefull Register')</script>";
    // Redirect to login.html with a parameter to indicate successful registration
    header("location:admin_login.php?registration=success");
   
    
        exit;

    }
     else {
        echo "<script type='text/javascript'>alert('Please enter some valid En')</script>";
        
    }
}


// Close the database connection
$conn->close();
?>
