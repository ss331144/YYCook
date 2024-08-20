<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
    <link href="style.css" rel="stylesheet">

    <style>
    
@keyframes changeC {
    
            0% {
                
                transform: translateY(5%);
                
            }
            
            
            50%{
                transform: translateY(40%);
            }
            75%{
                transform: translateY(-5%);
            }
            100% {
                
                transform: translateY(5%);
    
            }
}






    </style>
</head>
<body class="custom-body">
    <header>
        <h1 >Login</h1>
        
    </header>
    
    
    <div id="custom-container">
        <form action="rePass.php" method="POST">
            <input class="username" type="text" name="username" placeholder="Username" required>
            <input class="repass" type="password" name="password" placeholder="Password" required>
            <input class="conrepass" type="password" name="copassword" placeholder="Confirm password" required>
            <button type="submit" id="login-btn">Submit </button>
        </form>
    </div>
<footer>
    <p>&copy; 2024 - All rights reserved</p>
</footer>
<script src="index.js"></script>
</body>

<?php
session_start();
include 'configCook.php';//connect DB

if ($_SERVER["REQUEST_METHOD"] == "POST" ){ 
    if($_POST['copassword'] && $_POST['password'] && $_POST['username']){
    $newpass = $_POST['password']; //get password
    $renewpass = $_POST['copassword'];
    $userName = $_POST['username']; //get username

    if( $newpass!==$renewpass ){
        die('the password must be same');
    }
    
    
    //check for user exist in DB
    $check_user_query = "UPDATE user SET password='$newpass' WHERE username='$userName'";
    $check_result = $conn->query($check_user_query);//run query 
    
    if ($check_result) {
        echo 'Password updated successfully!';
        $_SESSION['username'] = $userName;
        header("Location: http://localhost/PHP_Project/hw2_php/cook/connection.php");
        exit;
    } else {
        echo 'Error updating password: ' . $stmt->error;
    //cant start job
    }
    } else {
        echo "Incorrect email or password."; 
    }
    
    //close connection to DB
    $conn->close(); 
}
?>

</html>