<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
   
session_start();
    
// $_SESSION["cid"]=$cid;
// $cid = $_REQUEST["cid"]; 


if(isset($_SESSION["cid"]))
{
    $cid = $_SESSION["cid"]; 
}

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "drift that thrift";

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check if the connection was successful
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    $purchase_status=$_POST["payment_status"];
 $pid=$_POST["product_id"];
 
if($purchase_status==2){
    $sql= "UPDATE products 
            SET status=2 WHERE id=$pid";
            mysqli_query($conn,$sql);
            header("location:sellervieworder.php");     
 }
 echo "PLEASE CONTACT BUYER AS SOON AS POSSIBLE!"
//     ?>
    