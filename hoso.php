<?php
session_start();
include("includes/connection.php");
?>
<?php
if (!isset($_SESSION['customer_id'])){
    header('Location: dangnhap.php');
}
else{
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

    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div><h2>Thông tin tài khoản</h2></div>
                    <br>
                    <br>
                    <div class="page-wrapper">

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-4 col-xlg-3 col-md-12">
                                    <div class="white-box">
                                        <h4><a href="xemdonhang.php" style="color: black;">Xem đơn hàng</a></h4>
                                    </div>
                                    <br>
                                    <div class="white-box">
                                        <h4><a href="dangxuat.php" style="color: black;">Đăng xuất</a></h4>
                                    </div>
                                </div>
                                <?php
                                $id_kh=$_SESSION["customer_id"];
                                $result = mysqli_query($conn,"SELECT * FROM khach_hang WHERE MaKhachHang='$id_kh'");
                                $row = mysqli_fetch_array($result);
                                ?>
                                <div class="col-lg-8 col-xlg-9 col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <form method="POST" class="form-horizontal form-material">
                                                <div class="form-group mb-4">
                                                    <label class="col-md-12 p-0">Họ tên</label>
                                                    <div class="col-md-12 border-bottom p-0">
                                                        <input type="text" name="ht" value="<?php echo $row['TenKhachHang'] ?>" class="form-control p-0 border-0"> </div>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label class="col-md-12 p-0">Mật khẩu</label>
                                                    <div class="col-md-12 border-bottom p-0">
                                                        <input type="password" name="mk" value="<?php echo $row['MatKhau'] ?>" class="form-control p-0 border-0">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="example-email" class="col-md-12 p-0">Email</label>
                                                    <div class="col-md-12 border-bottom p-0">
                                                        <input type="email" name="email" value="<?php echo $row['Email'] ?>" class="form-control p-0 border-0" name="example-email" id="example-email">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label class="col-md-12 p-0">Số điện thoại</label>
                                                    <div class="col-md-12 border-bottom p-0">
                                                        <input type="text" name="sdt" value="<?php echo $row['SoDienThoai'] ?>" class="form-control p-0 border-0">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label class="col-md-12 p-0">Địa chỉ</label>
                                                    <div class="col-md-12 border-bottom p-0">
                                                        <input type="text" name="dc" value="<?php echo $row['DiaChi'] ?>" class="form-control p-0 border-0">
                                                    </div>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <div class="col-sm-12">
                                                        <button type="submit" name="submit" class="btn btn-success">Lưu</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php
                                                if (isset($_POST['submit'])){
                                                    $ht=$_POST['ht'];
                                                    $mk=$_POST['mk'];
                                                    $email=$_POST['email'];
                                                    $sdt=$_POST['sdt'];
                                                    $dc=$_POST['dc'];

                                                    $sql = "UPDATE khach_hang SET TenKhachHang='$ht', MatKhau='$mk', Email='$email',SoDienThoai='$sdt',DiaChi='$dc' WHERE MaKhachHang='$id_kh'";
                                                    if ($conn->query($sql) == TRUE) {
                                                        echo "Cập nhật thành công";

                                                    } else {
                                                        echo "Lỗi: " . $conn->error;
                                                    }
                                                    $conn->close();
                                                    echo "<meta http-equiv='refresh' content='0'>";
                                                }
                                                
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    
        </div>
    </section>

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
?>