<?php
session_start();
if(isset($_SESSION['customer_id']) && $_SESSION['customer_id']!=NULL){
    unset($_SESSION["customer_id"]);
    unset($_SESSION['username']);
    unset($_SESSION["fullname"]);
    unset($_SESSION["address"]);
    unset($_SESSION["phone"]);
    unset($_SESSION["email"]);
    unset($_SESSION["id_them_vao_gio"]);
    unset($_SESSION["sl_them_vao_gio"]);
    echo "Thành công";

    header('Location: index.php');
}

?>