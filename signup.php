<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
<style>
    #conSign{
        animation: changeC 5s infinite;
    }
    @keyframes changeC {
    
    0% {
        
        transform: translateY(0);
        
    }
    
    50%{
        transform: translateY(5%);
    }
    75%{
        transform: translateY(-5%);
    }
    100% {
        
        transform: translateY(0);

    }}
    </style>
</head>
<body>
    <header>
        <h1 class="text-white text-center py-4">Registration Form</h1>
    </header>
    <div id='conSign' class="container mt-5" style="max-width: 400px; height: 491px;">
        <form action="signup.php" method="POST">
            <div class="mb-3">
                <!--username-->
                <label for="username" class="form-label text-white">Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
                <!--age-->
            <div class="mb-3">
                <label for="age" class="form-label text-white">Age</label>
                <input id='userAge' type="number" min='10' max='120' class="form-control"  name="age" required >
            </div>
                <!--password-->
            <div class="mb-3">
                <label for="password" class="form-label text-white">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
                <!--con-password-->
            <div class="mb-3">
                <label for="confirm-password" class="form-label text-white" >Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary w-50" >Register</button>
            </div>
            <div><p>has account? <a href="connection.php">click me</a></p> </div>
        </form>
    </div>
    <footer class="bg-primary text-white text-center py-3">
        <p>&copy; 2024 - All rights reserved</p>
    </footer>
    <script src="index.js"></script>
</body>

    <script>
        function updateAge(x){
            document.getElementById('ageValue').textcontent = x
        }
    </script>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $age = $_POST['age'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    //this function need check for complete all method...
    //can do this lint too
    //if(isset($username) && isset($email) && isset($password))
    if (empty($username) || empty($age) || empty($password) || empty($confirm_password)) {
        die("All fields are required.");
    }
    
    if ($password !== $confirm_password) {
        die("Passwords do not match.");
    }
    
    //connect of DB in config.php
    include 'configCook.php';
    
    //check for user in DB table
    $check_user_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    
    //if found more than 0 rows - destroy
    if ($check_result->num_rows > 0) {
        die("Username already exists.");
    }
    
    //add this user for DB 
    $sql = "INSERT INTO user (username, age, password) VALUES ('$username', '$age', '$password')";
    $conn->prepare($sql);
    //check for pass next page
    if ($conn->query($sql) === TRUE) {
        //ob_start();
        //session_start();
        //$_SESSION["username"] = $username;
        //$_SESSION["email"] = $email;
        
        header("Location: http://localhost/PHP_Project/hw2_php/cook/connection.php");
        exit();
    //cant pass
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        die();
    }

    //close connection of DB
    $conn->close();
}
?>



</html>