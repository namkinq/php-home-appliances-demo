<?php
session_start();
include("includes/connection.php");
$_SESSION['trang_chi_tiet_gio_hang']="co";
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

    <!-- Product Details Section Begin -->
    <section class="product-details">
        <div class="container">
            <div class="row">
            <?php
                $id = $_GET['id'];
                $sql = "SELECT * from thiet_bi_dien where MaThietBi='$id'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);

                $link_anh = $row['AnhMinhHoa'];
            ?>
                <div class='col-lg-6 col-md-6'>
                    <div class='product__details__pic'>
                        <div class='product__details__pic__item'>
                            <img class='product__details__pic__item--large' src='<?php echo $link_anh; ?>' alt=''>
                        </div>
                    </div>
                </div>
                <div class='col-lg-6 col-md-6'>
                    <div class='product__details__text'>
                        <h3><?php echo $row['TenThietBi'];?></h3>
                        <div class='product__details__price'><?php echo number_format($row['GiaTien'])?>đ</div>
                        <br>
                        <!-- nhập số lượng -->
                        <form action='giohang.php'>
                            <input type='hidden' name='id' value='<?php echo $_GET['id'];?>'> 
                            <div class='product__details__quantity'>
                                <div class='quantity'>
                                    <div class='pro-qty'>
                                        <input type='text' name="so_luong" value='1'>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if($row['SoLuong']>0){
                                echo "<input type='submit' value='Thêm vào giỏ' class='btn primary-btn'>";
                            }else{
                                echo "<input type='submit' value='Thêm vào giỏ' class='btn primary-btn' disabled>";
                            }
                            ?>
                        </form>
                        <ul>
                            <?php
                            if($row['SoLuong']>0){
                                echo "<li><b>Tình trạng</b><span>Còn hàng</span></li>";
                            }else{
                                echo "<li><b>Tình trạng</b><span>Hết hàng</span></li>";
                            }
                            echo "<li><b>Màu</b><span>".$row['MauSac']."</span></li>";
                            ?>
                        </ul>
                    </div>
                </div>

                <div class='col-lg-12'>
                    <div class='product__details__tab'>
                        <ul class='nav nav-tabs' role='tablist'>
                            <li class='nav-item'>
                                <a class='nav-link active' data-toggle='tab' href='#tabs-1' role='tab' aria-selected='true'>Mô tả</a>
                            </li>
                        </ul>
                        <div class='tab-content'>
                            <div class='tab-pane active' id='tabs-1' role='tabpanel'>
                                <div class='product__details__tab__desc'>
                                    <h6>Thông tin sản phẩm</h6>
                                    <p><?php echo $row['MoTa']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                mysqli_free_result($result);
                mysqli_close($conn);
            ?>
                
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

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