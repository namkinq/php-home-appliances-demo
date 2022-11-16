<?php
    $id=$_GET['id'];
    $tv="select MaThietBI,TenThietBi,GiaTien,SoLuong,MauSac,AnhMinhHoa,MoTa from thiet_bi_dien where danh_muc='$id' order by MaThietBi desc ";
    $tv_1=mysqli_query($conn ,$tv);
    while($tv_2=mysqli_fetch_array($tv_1))
    {
        echo $tv_2['ten'];echo "<br>";
        echo $tv_2['gia'];echo "<br>";
        echo $tv_2['hinh_anh'];echo "<hr>";
    }
?>