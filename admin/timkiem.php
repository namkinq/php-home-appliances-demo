<?php
include("includes/connection.php");
if(isset($_GET['key']) && !empty($_GET['key'])){
    $link="?key=".$_GET['key'];
    header("Location: quanLiSanPham.php$link");
}
?>