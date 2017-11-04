<?php
session_start();
require 'vendor\autoload.php';
require 'vendor\phpmailer\phpmailer\PHPMailerAutoload.php';
use \Firebase\JWT\JWT;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");   
header('Content-Type: application/json');
header('Content-Type: application/X-www-form-urlencoded');
define('GUSER', 'tempVoting@gmail.com'); // GMail username
define('GPWD', 'chidori94'); // GMail password
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fyp2";

$adminId=$_POST['adminId'];
$adminPass=$_POST['adminPass'];
error_log($adminId);
error_log($adminPass);
$key= "putanginamo";
$exp=time();
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * FROM `admin` WHERE `admin_id` = '$adminId' AND `adminPassword` = '$adminPass'";

$result = mysqli_query($conn, $sql);

    if($row = mysqli_fetch_assoc($result)) {
        $resultSet=array('admin_id' => $row['admin_id'],'exp' => $exp +(10*60));
        $jwt = JWT::encode($resultSet, $key);
         $p=array('token' => $jwt, 'authenticated' => 1);
         error_log("1");
         echo json_encode($p);
        }
        else{

            $p=array('authenticated' => 2);
            error_log("2");
            echo json_encode($p);
        }
   
    

mysqli_close($conn);
?>