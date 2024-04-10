<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
    $resetToken = bin2hex(random_bytes(32));

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $expirationTime = date('Y-m-d H:i:s', strtotime('+1 hour'));

    // Perform any necessary validation on the form data here
    if(!empty($email)&&($password)&& !is_numeric($email)){
        $checkQuery = "SELECT * FROM customers WHERE email = '$email'";
        $result = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($result) > 0) {
            // The email address is already registered
            echo "<script type='text/javascript'>alert('Email address already registered'); window.location.href= 'login.php';</script>";
        } else {
            // Email address is unique, proceed with registration
    
    $query = "INSERT INTO customers (name, email, phone, password, reset_token, reset_token_expiration) VALUES ('$name', '$email', $phone,'$hashedPassword','$resetToken','$expirationTime')";
    mysqli_query($conn,$query);
   // echo "<script type='text/javascript'>alert('succefull Register')</script>";
    // Redirect to login.html with a parameter to indicate successful registration
    header("location:login.php?registration=success");
    exit;

    }
}else {
        echo "<script type='text/javascript'>alert('Please enter some valid En')</script>";
        
    }
}


// Close the database connection
$conn->close();
?>

