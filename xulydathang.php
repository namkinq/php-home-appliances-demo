<?php
    session_start();
    include("includes/connection.php");
    if(isset($_SESSION['id_them_vao_gio']) && isset($_POST['btn_dh']))
    {
        $id_kh = $_SESSION['customer_id'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d H:i:s');      
        $sql="INSERT INTO don_hang VALUES (NULL, '$id_kh', '$date', DEFAULT)";
        mysqli_query($conn, $sql);

        $id_dh = mysqli_insert_id($conn);

        for($i=0; $i<count($_SESSION['id_them_vao_gio']); $i++)
        {
    
            $sql="SELECT MaThietBi, GiaTien from thiet_bi_dien where MaThietBi='".$_SESSION['id_them_vao_gio'][$i]."'";
            $result=mysqli_query($conn, $sql);
            $row=mysqli_fetch_array($result);

            $id_h=$row['MaThietBi'];
            $sl_h=$_SESSION['sl_them_vao_gio'][$i];
            $gia_h=$row['GiaTien']; 

            $sql="INSERT INTO chi_tiet_don_hang VALUES ('$id_dh', '$id_h', '$sl_h', '$gia_h')";
            mysqli_query($conn, $sql);

            $sql= "UPDATE thiet_bi_dien set SoLuong=SoLuong-'$sl_h' where MaThietBi='$id_h'";
            mysqli_query($conn, $sql);
        } 



        unset($_SESSION['id_them_vao_gio']);
        unset($_SESSION['sl_them_vao_gio']);

        header('Location: xemdonhang.php');
    }
?>