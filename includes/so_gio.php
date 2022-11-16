<?php 
    session_start();
    $tong_gio=0;     
    for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
    {
        $tong_gio +=$_SESSION['sl_them_vao_gio'][$i];
    }
    echo $tong_gio   
?>