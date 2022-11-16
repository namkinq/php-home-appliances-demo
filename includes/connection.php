<?php

$host = "localhost";
$username = "root";
$password = "19062001";
$dbname = "data_btl_php";

$conn = new mysqli($host, $username, $password, $dbname);

if($conn->connect_error){
    die("Kết nối không thành công:".$conn->connect_error);
}
?>