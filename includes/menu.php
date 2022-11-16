<?php                           
    $sql = "select * from danh_muc order by MaDanhMuc";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result))
    {
        $link="?id=".$row['MaDanhMuc'];
        echo "<li><a href='sanpham.php$link'>";
        echo $row['TenDanhMuc'];
        echo "</a></li>";
    }
    mysqli_free_result($result);
?>