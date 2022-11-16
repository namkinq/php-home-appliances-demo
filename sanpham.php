<?php
session_start();
include("includes/connection.php");
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
                            <li class="active"><a href="./sanpham.php">Sản phẩm</a></li>
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
                    <div class="hero__search" >
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

    <!-- Breadcrumb Section Begin -->
    <!-- <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container" >
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Danh mục</h4>
                            <ul>
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
                            </ul>
                        </div>
    
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">  
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sắp xếp:</span>
                                    <form method="get" >
                                        <?php if(isset($_GET['id'])) {echo "<input type='hidden' name='id' value=".$_GET['id'].">";}  ?>
                                        <select name="sapxep">
                                            <option value="0">--Chọn--</option>
                                            <option value="gia_tang_dan" <?php if($_GET['sapxep']=='gia_tang_dan') echo "selected='selected'" ?>>Giá tăng dần</option>
                                            <option value="gia_giam_dan" <?php if($_GET['sapxep']=='gia_giam_dan') echo "selected='selected'" ?>>Giá giảm dần</option>
                                        </select>
                                        <input type="submit" name="" value="Lọc">
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        
                                <?php
                                    if(isset($_GET['id']) && isset($_GET['sapxep'])){
                                        $id = $_GET['id'];
                                        if($_GET['sapxep']=='gia_tang_dan'){
                                            $sql = "select MaThietBi,TenThietBi,GiaTien,AnhMinhHoa from thiet_bi_dien where MaDanhMuc='$id' order by GiaTien ";
                                        }
                                        else if($_GET['sapxep']=='gia_giam_dan'){
                                            $sql = "select MaThietBi,TenThietBi,GiaTien,AnhMinhHoa from thiet_bi_dien where MaDanhMuc='$id' order by GiaTien desc";
                                        }
                                        else{
                                            $sql = "select MaThietBi,TenThietBi,GiaTien,AnhMinhHoa from thiet_bi_dien where MaDanhMuc='$id' order by MaThietBi desc ";
                                        }
                                    }
                                    else if(isset($_GET['sapxep'])){
                                        if($_GET['sapxep']=='gia_tang_dan'){
                                            $sql = "select MaThietBi,TenThietBi,GiaTien,AnhMinhHoa from thiet_bi_dien order by GiaTien ";
                                        }
                                        else if($_GET['sapxep']=='gia_giam_dan'){
                                            $sql = "select MaThietBi,TenThietBi,GiaTien,AnhMinhHoa from thiet_bi_dien order by GiaTien desc";
                                        }
                                        else{
                                            $sql = "select MaThietBi,TenThietBi,GiaTien,AnhMinhHoa from thiet_bi_dien order by MaThietBi desc ";
                                        }
                                    }
                                    else if(isset($_GET['id'])){
                                        $id = $_GET['id'];
                                        $sql = "select MaThietBi,TenThietBi,GiaTien,AnhMinhHoa from thiet_bi_dien where MaDanhMuc='$id' order by MaThietBi desc ";
                                    }
                                    else if(isset($_GET['key'])){
                                        $key = addslashes($_GET['key']);
                                        $sql = "SELECT * FROM thiet_bi_dien WHERE TenThietBi LIKE '%$key%'";
                                    }
                                    else{
                                        $sql = "select MaThietBi,TenThietBi,GiaTien,AnhMinhHoa from thiet_bi_dien order by MaThietBi desc ";
                                    }
                                    $result = mysqli_query($conn ,$sql);
                                        while($row = mysqli_fetch_array($result))
                                        {   
                                            echo "<div class='col-lg-4 col-md-6 col-sm-6'>";
                                                echo "<div class='product__item'>";
                                                    $link_anh = $row['AnhMinhHoa'];
                                                    $link_chi_tiet="?id=".$row['MaThietBi'];
                                                    echo "<a href='chitietsanpham.php$link_chi_tiet'>";
                                                        echo "<div class='product__item__pic set-bg' data-setbg='$link_anh'>";
                                                    echo "</div></a>";
                                                    echo "<div class='product__item__text'>";
                                                        echo "<h6><a href='chitietsanpham.php$link_chi_tiet'>". $row['TenThietBi']. "</a></h6>";
                                                        echo "<h5>". number_format($row['GiaTien']). "đ</h5>";
                                                    echo"</div>";
                                                echo "</div>";
                                            echo "</div>";
                                        }

                                    mysqli_free_result($result);
                                    mysqli_close($conn);
                                    
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

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