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
    $dbname = "drift that thrift";

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Home | E-Shopper</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/price-range.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="./styles.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
	<link rel="shortcut icon" href="images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<!-- bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
		<style>
             body{
            margin:0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .content{
            
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            
        }
        div.message{
            text-align:center;
            background-color: antiquewhite;
            border-radius: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 70px;
            max-width: 800px; 
            margin: 0; /* Center the box horizontally */
        }
        .button{
            margin:0 auto;
        }
        form{
            margin:50px;
        }
       
            </style>
</head><!--/head-->

<body>
<?php
include("nav.php");
?>
<?php
// Include necessary database connection and email sending code here
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $mail = new PHPMailer(true);

    $mail-> isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail-> SMTPAuth = true;
    $mail-> Username = 'anushadhakal9@gmail.com';
    $mail-> Password = 'skfu kkcf ovzi hbvr';
    $mail-> SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('anushadhakal9@gmail.com');

    $mail->addAddress($_POST["email"]);
    $mail->isHTML(true);
    $resetToken=$_GET['reset_token'];
    
    $resetLink = "http://localhost/thrift/driftthatthrift/reset_password.php?token=" . $resetToken;
    $mail->Subject = "Password Reset Request";
    $mail->Body = 'Click the following link to reset your password: <a href="' . $resetLink . '">Reset Password</a>';
try{
    $mail->send();
    echo"<script> alert('sent Successfully'); document.location.href='index.php';
    </script>";
}catch(Exception $e){
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

   