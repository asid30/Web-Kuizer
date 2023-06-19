<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "kuis";
 
$conn = mysqli_connect($host, $username, $password, $database);
mysqli_select_db($conn, $database);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

return new PDO("mysql:host=$host;dbname=$database", $username, $password, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
));

?>