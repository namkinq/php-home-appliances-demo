<?php
session_start();
include("includes/connection.php");
?>
<?php
if (!isset($_SESSION['customer_id'])){
    header('Location: dangnhap.php');
}
else{
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
    if($gio_hang=="khong"){
       header('Location: giohang.php');
    }else{
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

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Thông tin đặt hàng</h4>
                <!-- <form action="#" > -->
                    <div class="row">
                        <div class="col-lg-7 col-md-6">
                            <div class="checkout__input">
                                <p>Họ và tên<span></span></p>
                                <input type="text" disabled value="<?php echo $_SESSION["fullname"] ?>">
                            </div>
                            <div class="checkout__input">
                                <p>Địa chỉ<span></span></p>
                                <input type="text" disabled value="<?php echo $_SESSION["address"] ?>">
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Số điện thoại<span></span></p>
                                        <input type="text" disabled value="<?php echo $_SESSION["phone"] ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span></span></p>
                                        <input type="text" disabled value="<?php echo $_SESSION["email"] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p><span>Thông tin chưa chính xác?</span> <a href="hoso.php" style="color: blue">Chỉnh sửa thông tin</a></p>
                            </div>
                            
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <div class="checkout__order">
                                <h4></h4>
                                <div class="checkout__order__products">Sản phẩm <span>Tổng</span></div>
                                <ul>
                                    <?php
                                        $tong_cong=0;
                                        //cứ mỗi lần chạy thì lấy 'id sản phẩm giỏ' truy vấn vào bảng 'thiet_bi' để lấy thông tin sản phẩm
                                        for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++)
                                        {
                                            $sql="select MaThietBi, TenThietBi, GiaTien from thiet_bi_dien where MaThietBi='".$_SESSION['id_them_vao_gio'][$i]."'";
                                            $result=mysqli_query($conn, $sql);
                                            $row=mysqli_fetch_array($result);
                                            $tien=$row['GiaTien'] * $_SESSION['sl_them_vao_gio'][$i];
                                            $tong_cong = $tong_cong+$tien;
                                            if($_SESSION['sl_them_vao_gio'][$i]!=0)
                                            {
                                                $name_id="id_".$i;
                                                $name_sl="sl_".$i;
                                                echo "<li>".$_SESSION['sl_them_vao_gio'][$i]."x ".$row['TenThietBi']."<span>".number_format($tien)."</span></li>";
                                            }
                                        }  
                                    ?>
                                </ul>
                                <div class="checkout__order__subtotal">Tạm tính <span><?php echo number_format($tong_cong) ?></span></div>
                                <div class="checkout__order__total">Tổng cộng <span><?php echo number_format($tong_cong) ?></span></div>
                                <p style="color: #A52A2A;">Vui lòng thanh toán khi nhận hàng</p>

                                <?php
                                echo "<form method='post' action='xulydathang.php'>";
                                    echo "<button type='submit' name='btn_dh' class='site-btn'>ĐẶT HÀNG</button>";
                                echo "</form>";
                                
                                ?>
                            </div>
                        </div>
                    </div>
                <!-- </form> -->
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

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
    }
}
?>