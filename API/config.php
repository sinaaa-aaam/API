<?php
$host = 'localhost'; 
$username = "sinam.ametewee"; 
$password = "DiaMondss23#"; 
$dbname = 'mobileapps_2026B_sinam_ametewee'


$conn = new mysqli($host, $username, $password, $dbname)

    or die('Unable to connect');

 

if ($conn->connect_error) {
    header('Content-Type: application/json');
    echo json_encode([
        "success" => false,
        "error" => "Database connection failed"
    ]);
    exit();
}
?>

