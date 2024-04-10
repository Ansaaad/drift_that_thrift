<?php
session_start();

// Check if the user has agreed to the terms (the checkbox is checked)
if (isset($_POST['agree']) && $_POST['agree'] === 'on') {
    // Set a session variable to indicate the user has agreed to the terms
    $_SESSION['agreed_to_terms'] = true;
    
    // Redirect the user to the "Sell Item" page
    header("Location: sellermainpage.php");
    exit();
} else {
    // If the checkbox is not checked, show an error message or handle it as needed
    echo "Please agree to the Terms and Conditions to proceed.";
}
?>
