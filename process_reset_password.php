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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the new password and confirmation password
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];
    $resetToken = $_POST["token"];

    // Validate the new password
    if (strlen($newPassword) < 4) {
        die("Password must be at least 4 characters long.");
    }
    
    if ($newPassword !== $confirmPassword) {
        die("Passwords do not match.");
    }

    // Check if the reset token exists in the database and is still valid (not expired)
    $sql = "SELECT * FROM customers WHERE reset_token =?  ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $resetToken);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    
    if ($user === null) {
        die("Token not found or expired.");
    }

    // Update the user's password in the database
    // Update the user's password in the database
$hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
$updateSql = "UPDATE customers SET password = ? WHERE reset_token = ?";
$stmt = $conn->prepare($updateSql);
$stmt->bind_param("ss", $hashedPassword, $resetToken);

if ($stmt->execute()) {
    if($stmt->affected_rows >0){
    echo '<script>alert("Password Reset successful."); window.location.href = "login.php";</script>';
    // Optionally, mark the reset_token as used or delete it from the database.
} else {
    echo '<script>alert("Password not updated."); window.location.href = "login.php";</script>';
}
}else{
    echo '<script>alert("Password Reset Failed. Database Error."); window.location.href = "login.php";</script>';
}

// Close the prepared statement and the database connection
$stmt->close();
$conn->close();

}
?>
