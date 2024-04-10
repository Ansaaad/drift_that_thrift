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
    $dbname = 'drift that thrift';

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $pid = $_GET['id'];
    
    if(isset($_POST['Add_To_Cart'])){
    $sql = "INSERT INTO cart(cid,pid)VALUES(?,?);";
    if($stmt = $conn->prepare($sql)){
    //bind the parameter
    $stmt->bind_param("ii",$cid,$pid);
    
     if ($stmt->execute()){
        header("Location:cart.php");
		exit;
     }
    else{
        echo "Error executing statement." . $stmt->error;
     }
     $stmt->close();
    }
     else
     {
        echo "Error preparing statement. " . $conn->error;
     }
    }
$conn->close();
?>
