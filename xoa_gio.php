<?php
    session_start();
    if(isset($_GET['idxoa'])){
        for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
        {
            if($i==$_GET['idxoa']){
                $_SESSION['sl_them_vao_gio'][$i]=0;
                break;
            }
        }
        header('Location: giohang.php');
    } 
?>