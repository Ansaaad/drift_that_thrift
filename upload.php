<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
   
session_start();
if(isset($_SESSION["cid"])){
    $cid = $_SESSION["cid"]; 
}
if (isset($_POST['upload'])) {
    // ... (previous code for file upload)

    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "drift that thrift"; // Name of the database you created

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert file information into the database
    $sql = "INSERT INTO uploaded_files (cid,file_name, file_description) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $cid, $file_name, $file_description);
    
    $file_name = $_FILES['image']['name'];
    $file_description = $_POST['item_description'];

    if ($stmt->execute()) {
        echo "File uploaded successfully!";
    } else {
        echo "Error uploading the file or saving data to the database.";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>

