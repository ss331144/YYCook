<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
    <link href="style.css" rel="stylesheet">

    <style>
        h1{
            color:white;
        }
        .custom-body {
    font-family: Arial, sans-serif;
    margin: 0;
    background-color: #f0f0f0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    
    width: 20%;
    transform:translate(190%,20%);
    

}

#custom-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
    animation: changeC 6s infinite;
}

.login-input {
    width: 92%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid;
    border-radius: 5px;
}


#login-btn {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.login-links {
    text-align: center;
    margin-top: 10px;
}

.login-links a {
    display: block;
    margin-bottom: 5px;
    color: #007bff;
    text-decoration: underline;
}


footer {
    margin-top: 300px;
    height: 95px;
    text-align: center;
    
}

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





    </style>
</head>
<body class="custom-body">
    <header>
        <h1 >Login</h1>
        
    </header>
    
    
    <div id="custom-container">
        <form action="connection.php" method="POST">
            <input class="login-input" type="text" name="userName" placeholder="userName" required>
            <input class="login-input" type="password" name="password" placeholder="Password" required>
            <button type="submit" id="login-btn">Submit </button>
        </form>
        <div class="login-links">
            <a href="signup.php">New? Register here</a>
            <a href="rePass.php">Forgot Password?</a>
        </div>
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
    if(isset($_POST['userName']) && $_POST['password']){
    $userName = $_POST['userName']; //get email
    $password = $_POST['password']; //get password
    
    
    //check for user exist in DB
    $check_user_query = "SELECT username,age,password FROM user WHERE username='$userName' AND password='$password'";
    $check_result = $conn->query($check_user_query);//run query 
    
    if ($check_result->num_rows > 0) { //if found then more 0 rows return
        $user = $check_result->fetch_assoc();//get the details
        echo('user found!');
        //save session of user
        $_SESSION['username'] = $user['username'];
        $_SESSION['age'] = $user['age'];
        
        // go to home page and finish job
        header("Location: http://localhost/PHP_Project/hw2_php/cook/homeCook.php");
        exit;
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