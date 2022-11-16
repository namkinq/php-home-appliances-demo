<?php
session_start();
include'includes/connection.php';
?>
<?php
//khi mà người dùng truy cập vào trang chi tiết sản phẩm thì sẽ tiến hành đánh dấu là có vào trang chi tiết sản phẩm ($_SESSION['trang_chi_tiet_gio_hang']="co";)
//sau đó nếu người dùng mua hàng thì web sẽ cho truy cập lần đầu để khởi tạo session (if(isset($_GET['id']) and $_SESSION['trang_chi_tiet_gio_hang']=="co"))
//Sau đó đổi giá trị biến session 'trang_chi_tiet_gio_hang' thành giá trị 'huy_bo'
//Như vậy nếu nhấn 'F5' thì giá trị của biến session 'trang_chi_tiet_gio_hang' sẽ thành 'huy_bo' => không chạy đoạn code tạo session khi vào trang giỏ hàng

//tồn tại biến 'id trên url'
if(isset($_GET['id']) && $_SESSION['trang_chi_tiet_gio_hang']=="co")
{
    $_SESSION['trang_chi_tiet_gio_hang']="huy_bo";
    //lấy số lượng kho
    $sql = "SELECT SoLuong from thiet_bi_dien where MaThietBi='".$_GET['id']."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    //trường hợp 1 là để xác định tình huống người dùng đã thêm sản phẩm vào giỏ hàng rồi tiếp tục thêm nữa , 
    //trường hợp 2 là người dùng mới lần đầu thêm sản phẩm vào giỏ hàng.
    //Nếu tồn tại mảng 'session id_them_vao_gio' thì vào trường hợp 1 , nếu không tồn tại thì vào trường hợp 2
    if(isset($_SESSION['id_them_vao_gio']))
    {
        //kiểm tra tiếp sự trùng lặp
        //người dùng thêm lại sản phẩm cũ thì lúc đó chỉ cần cập nhật lại số lượng sản phẩm
        //so 'id' , nếu 'id trong giỏ' ($_SESSION['id_them_vao_gio'][$so]) bằng với 'id trên url' (id mua hàng từ trang chi tiết sản phẩm) thì xảy ra trùng lặp 

        $so = count($_SESSION['id_them_vao_gio']);
        $trung_lap = "khong";
        for($i=0; $i<count($_SESSION['id_them_vao_gio']); $i++)
        {
            if($_SESSION['id_them_vao_gio'][$i]==$_GET['id'])
            {
                $trung_lap="co";
                $vi_tri_trung_lap=$i;
                break;
            }
        }
        //cập nhật lại số lượng
        if($trung_lap=="co")
        {
            if($_SESSION['sl_them_vao_gio'][$vi_tri_trung_lap] + $_GET['so_luong'] > $row['SoLuong']){
                $message = "Số lượng vượt quá tồn kho";
                echo "<script type='text/javascript'>alert('$message');</script>";
                $_SESSION['sl_them_vao_gio'][$vi_tri_trung_lap] = $row['SoLuong'];
            }
            else{
                $_SESSION['sl_them_vao_gio'][$vi_tri_trung_lap] = $_SESSION['sl_them_vao_gio'][$vi_tri_trung_lap] + $_GET['so_luong'];
            }
        }
        //thêm vào session
        if($trung_lap=="khong")
        {
            if($_GET['so_luong'] > $row['SoLuong']){
                $message = "Số lượng vượt quá tồn kho";
                echo "<script type='text/javascript'>alert('$message');</script>"; 
                $_SESSION['id_them_vao_gio'][$so]=$_GET['id'];
                $_SESSION['sl_them_vao_gio'][$so]=$row['SoLuong'];
            }
            else{
                $_SESSION['id_them_vao_gio'][$so]=$_GET['id'];
                $_SESSION['sl_them_vao_gio'][$so]=$_GET['so_luong'];
            }
        }   
    }
    else
    //khởi tạo 2 mang session
    {
        if($_GET['so_luong'] > $row['SoLuong']){
            $message = "Số lượng vượt quá tồn kho";
            echo "<script type='text/javascript'>alert('$message');</script>"; 
            $_SESSION['id_them_vao_gio'][0]=$_GET['id'];
            $_SESSION['sl_them_vao_gio'][0]=$row['SoLuong'];
        }
        else{
            $_SESSION['id_them_vao_gio'][0]=$_GET['id'];
            $_SESSION['sl_them_vao_gio'][0]=$_GET['so_luong'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>V Home</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> nguyenhongpf@gmail.com</li>
                                <li><i class="fa fa-phone"></i> 0344811291</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>Việt Nam</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Việt Nam</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="hoso.php"><i class="fa fa-user"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/logo.png" height="50" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="./index.php">V-Home</a></li>
                            <li><a href="./sanpham.php">Sản phẩm</a></li>
                            <li><a href="./blog.php">Blog</a></li>
                            <li><a href="./contact.php">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <!--nut yeu thich
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            -->
                            <li><a href="giohang.php"><i class="fa fa-shopping-bag"></i> <span><?php include('includes/so_gio.php') ?></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Tất cả danh mục</span>
                        </div>
                        <ul>
                            <?php
                                include("includes/menu.php");
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form" style="width: 849px;">
                            <form action="timkiem.php" method="get">
                                <input type="text" name="key" placeholder="Bạn cần gì?">
                                <button type="submit" name="btn_tk" class="site-btn">Tìm kiếm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php

                        // Xuất sản phẩm từ session
                        //gio hàng có hay không có sp
                        $gio_hang="khong";
                        if(isset($_SESSION['id_them_vao_gio']))
                        {
                            $so_luong=0;
                            for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
                            {
                                $so_luong=$so_luong+$_SESSION['sl_them_vao_gio'][$i];
                            }
                            if($so_luong!=0)
                            {
                                $gio_hang="co";
                            }
                        }

                        echo "<div><h2>Giỏ hàng</h2></div>";
                        echo "<br>";
                        echo "<br>";
                        if($gio_hang=="khong")
                        {
                            echo "Không có sản phẩm trong giỏ hàng";
                        }
                        else
                        {
                            echo "<div class='shoping__cart__table'>";
                                echo "<form action='' method='post' >";
                                    echo "<input type='hidden' name='cap_nhat_gio_hang' value='co' > ";
                                echo "<table>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th class='shoping__product'>Sản phẩm</th>";
                                            echo "<th>Giá</th>";
                                            echo "<th>Số lượng</th>";
                                            echo "<th>Thành tiền</th>";
                                            echo "<th></th>";
                                        echo "</tr>";
                                    echo "</thead>";

                                    echo "<tbody>";
                                        
                                        $tong_cong=0;
                                        //cứ mỗi lần chạy thì lấy 'id sản phẩm giỏ' truy vấn vào bảng 'thiet_bi' để lấy thông tin sản phẩm
                                        for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
                                        {
                                    
                                            $sql = "SELECT MaThietBi, TenThietBi, GiaTien, AnhMinhHoa from thiet_bi_dien where MaThietBi='".$_SESSION['id_them_vao_gio'][$i]."'";
                                            $result = mysqli_query($conn, $sql);
                                            $row = mysqli_fetch_array($result);
                                            $tien = $row['GiaTien'] * $_SESSION['sl_them_vao_gio'][$i];
                                            $tong_cong = $tong_cong+$tien;
                                            if($_SESSION['sl_them_vao_gio'][$i]!=0)
                                            {
                                                $name_id="id_".$i;
                                                $name_sl="sl_".$i;
                                                echo "<tr>";
                                                    echo "<td class='shoping__cart__item'>";
                                                        echo "<img src='".$row['AnhMinhHoa']."' width='150px' alt=''>";
                                                        echo "<h5>".$row['TenThietBi']."</h5>";
                                                    echo "</td>";
                                                    echo "<td class='shoping__cart__price'>"
                                                        .number_format($row['GiaTien'])
                                                    ."</td>";

                                                    echo "<input type='hidden' name='".$name_id."' value='".$_SESSION['id_them_vao_gio'][$i]."' >";
                                                    echo "<td class='shoping__cart__quantity'>";
                                                        echo "<div class='quantity'>";
                                                            echo "<div class='pro-qty'>";
                                                                echo "<input type='text' name='".$name_sl."' value='".$_SESSION['sl_them_vao_gio'][$i]."'>";
                                                            echo "</div>";
                                                        echo "</div>";
                                                    echo "</td>";
                                                    echo "<td class='shoping__cart__total'>"
                                                        .number_format($tien)
                                                    ."</td>";
                                                    echo "<td class='shoping__cart__item__close'>";
                                                        echo "<a href='xoa_gio.php?idxoa=$i'><span class='icon_close'></span></a>";
                                                    echo "</td>";
                                                echo "</tr>";
                                            }
                                        }  
                                        
                                    echo"</tbody>";
                                echo"</table>";
                                
                            echo"</div>"; 
                        } 
                        //-> thêm $_SESSION['trang_chi_tiet_gio_hang']="co"; để xác định có truy cập vào trang chi tiết sản phẩm ko
                    
                echo "</div>";
            echo "</div>";
            echo "<div class='row'>";
                echo "<div class='col-lg-12'>";
                    echo "<div class='shoping__cart__btns'>";
                        echo "<a href='sanpham.php' class='primary-btn cart-btn'>Tiếp tục mua hàng</a>";
                        echo "<input type='submit' name='btn_capnhatgio' value='Cập nhật giỏ hàng' class='primary-btn cart-btn cart-btn-right'>";
                    echo "</div>";
                echo "</div>";
                echo "</form>";
                ?>
                <!-- Mã giảm giá -->
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <!-- <h5>Mã giảm giá</h5>
                            <form action="#">
                                <input type="text" placeholder="Nhập mã">
                                <button type="submit" class="site-btn">ÁP DỤNG</button>
                            </form> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Tổng tiền</h5>
                        <ul>
                            <li>Tạm tính <span><?php echo number_format($tong_cong);?> đ</span></li>
                        </ul>
                        <a href="dathang.php" class="primary-btn">ĐẶT HÀNG</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.php"><img src="img/logo.png" height="50" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: Hà Nội</li>
                            <li>Phone: +84 344811291</li>
                            <li>Email: nguyenhongpf@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Thông tin</h6>
                        <ul>
                            <li><a href="#">Giới thiệu của hàng</a></li>
                            <li><a href="#">Góp ý</a></li>
                            <li><a href="#">Chính sách bảo hành</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Hướng dẫn mua hàng</a></li>
                            <li><a href="#">Phương thức thanh toán</a></li>
                            <li><a href="#">Chính sách bảo mật</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>


</body>

</html>


<?php
    if(isset($_POST['btn_capnhatgio'])){
        for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
        {
            //gán lại giá trị cho 2 mảng session
            $name_id="id_".$i;
            $name_sl="sl_".$i;
            if(isset($_POST[$name_id]))
            {
                $sql = "SELECT SoLuong from thiet_bi_dien where MaThietBi='".$_POST[$name_id]."'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);

                if($_POST[$name_sl] > $row['SoLuong']){
                    $message = "Số lượng vượt quá tồn kho";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    $_SESSION['id_them_vao_gio'][$i]=$_POST[$name_id];
                    $_SESSION['sl_them_vao_gio'][$i]=$row['SoLuong'];
                }
                else{
                    $_SESSION['id_them_vao_gio'][$i]=$_POST[$name_id];
                    $_SESSION['sl_them_vao_gio'][$i]=$_POST[$name_sl];
                }
            }
        }
        echo "<meta http-equiv='refresh' content='0'>";
    } 
?>
