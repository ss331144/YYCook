<!-- In config.php we put only the connection to the database.

-->

<?php
$host = 'localhost';
$db = 'cookdb';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// localhost/
?>