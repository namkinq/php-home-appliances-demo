<?php
session_start();
if(isset($_SESSION['customer_id']) && $_SESSION['customer_id']!=NULL){
    unset($_SESSION["customer_id"]);
    unset($_SESSION['username']);
    unset($_SESSION["fullname"]);
    unset($_SESSION["address"]);
    unset($_SESSION["phone"]);
    unset($_SESSION["email"]);
    echo "THnah công";

    header('Location: index.php');
}

?>