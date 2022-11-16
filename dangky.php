<?php require_once("includes/connection.php"); ?>
<?php
    $usernameErr = $fullnameErr = $passwordErr  = $phoneErr= $emailErr = $diachiErr = "";
    $username = $fullname =$password  = $phone= $email = $diachi = "";

    if(isset($_POST['btn_submit'])){  
        //tạo biến 
        $username = $_POST['username'];
        $password = $_POST['password'];
        //$repassword= $_POST["repassword"];
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        //acc
        if (empty($_POST["username"])) {
            $usernameErr = "Tên đăng nhập";
        } else {
            $sql = "select MaKhachHang from khach_hang where MaKhachHang='$username'";
            $result = mysqli_query($conn, $sql);
            $username_exist = mysqli_num_rows($result);
            if($username_exist){
                $usernameErr = "tài khoản đã tồn tại";
            }
            if (!preg_match("/^[a-zA-Z-0-9]*$/",$fullname)) {
            $usernameErr = "Chỉ chữ cái và số";
            }
        }
        //password
        if (empty($_POST["password"])) {
            $passwordErr = "Mật khẩu là bắt buộc";
        } else {
            if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{6,}$/",$password)) {
            $passwordErr = "Ít nhất 1 số, 1 chữ thường, 1 chữ hoa, 1 ký tự đb, tối thiểu 6 kí tự";
            }
        }

        //repassword
        if (empty($_POST["repassword"])) {
            $repasswordErr = "Repassword is required";
        } else {
            if ($repassword != $password) {
            $repasswordErr = "Mật khẩu không khớp";
            }
        }
        //name
        if (empty($_POST["fullname"])) {
            $nameErr = "Tên là bắt buộc";
        } else {
            if (!preg_match("/^[a-zA-Z-' ]*$/",$fullname)) {
            $nameErr = "Chỉ chữ cái và khoảng trắng";
            }
        }
        //phone
        if (empty($_POST["phone"])) {
            $phoneErr = "phone is required";
        } else {
            if (!preg_match("/^\d{10}$/",$phone)) {
            $phoneErr = "gồm 10 chữ số";
            }
        }
        
        //email
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            }
        }

    
        if(!empty($username)&&!empty($fullname)&&!empty($password)&&!empty($email)&&!empty($address)&&!empty($phone) 
        && $usernameErr==""&&$passwordErr==""&&$fullnameErr==""&&$phoneErr==""&&$emailErr==""){

                $sql = "INSERT INTO `khach_hang` (`MaKhachHang`, `TenDangNhap`,`MatKhau`,`TenKhachHang`,`DiaChi`,`SoDienThoai`,`Email`,`Quyen`) 
                VALUES (NULL,'$username','$password','$fullname','$address','$phone','$email',DEFAULT)";  

                if($conn->query($sql)===TRUE){
                    echo "Đăng kí thành công";
                }else{
                    //echo "Lỗi {$sql}".$conn->error;
                }
        }else{
            echo "Bạn cần nhập chính xác thông tin trước khi đăng ký";
        }
    }
echo '<a href="dangnhap.php">.<br>Quay lại trang đăng nhập</a>';
?>
<!DOCTYPE html> 
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Đăng ký tài khoản</title>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>
     <div class="wrapper">
            <div class="container">
                    <div class="row justify-content-around">
                        <form action="dangky.php" method="post" class="col-md-6 bg-light p-3 my-3">
                            <h1 class="text-center text-uppercase h3 py-3">Đăng ký tài khoản</h1>
                            <div class="form-group">
                                <label for="username">Tên đăng nhập</label>
                                <span class="error">* <?php echo $usernameErr;?></span>
                                <input type="text" name="username" id="username" class="form-control" required>
                                
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <span class="error">* <?php echo $passwordErr;?></span>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="fullname">Họ và tên</label>
                                <span class="error">* <?php echo $fullnameErr;?></span>
                                <input type="text" name="fullname" id="fullname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <span class="error">* <?php echo $emailErr;?></span>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <span class="error">* <?php echo $phoneErr;?></span>
                                <input type="text" name="phone" id="phone" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="adress">Địa chỉ</label>
                                <span class="error">* <?php echo $diachiErr;?></span>
                                <input type="text" name="address" id="adress" class="form-control" required>
                            </div>

                            <input type="submit" name="btn_submit" value="Đăng ký" class="btn-primary btn btn-block" style="margin-top: 50px;">
                        </form>
                    </div>
            </div>
            
     </div>
</body>
</html>

