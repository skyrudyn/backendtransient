<?php
require 'vendor\autoload.php';
use \Firebase\JWT\JWT;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");   
header('Content-Type: application/json');
header('Content-Type: application/X-www-form-urlencoded');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "transientservitor";

$username=$_POST['username'];
$password=$_POST['password'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM `hoteladmin` WHERE `username` = '$username' AND  `password` = '$pass'";

$result = mysqli_query($conn, $sql);
if($row = mysqli_fetch_assoc($result)) {
echo "set";
}else{
    echo "error";
}



?>