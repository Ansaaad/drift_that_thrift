<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if(isset($_SESSION["cid"])){
	$cid = $_SESSION["cid"]; 
}

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
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["token"])) {
    $resetToken = $_GET["token"];
    
    // Check if the reset token exists in the database and is still valid (not expired)
    $currentDateTime = date("Y-m-d H:i:s");
    $sql = "SELECT * FROM customers WHERE reset_token = ?  ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $resetToken);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    if ($user === null){
        die("token not found");
    }
    else{
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Reset Password</title>
        </head>
        <body>
    
            <h1>Reset Your Password</h1>
            <form method="post" action="process_reset_password.php">
                <input type="hidden" name="token" value="<?php echo $resetToken; ?>">
                <label for="new_password">Enter your new password:</label>
                <input type="password" id="new_password" name="new_password" required>
                <br>
                <br>
                <label for="confirm_password">Confirm your new password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
                <br>
                <br>
                <button type="submit" class="button">Reset Password</button>
            </form>
   

        </body>
        </html>
    <?php
    
    } 
}
?>
