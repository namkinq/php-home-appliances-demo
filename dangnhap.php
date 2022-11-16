<?php
session_start();
?>
<!DOCTYPE html> 
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Đăng nhập</title>
</head>
<body>
     <div class="wrapper">
            <div class="container" style="margin-top: 100px;">
                    <div class="row justify-content-around">
                        <form action="dangnhap.php" method="post" class="col-md-6 bg-light p-3 my-3" style="border-radius: 10px;">
                          <img src="img/logo.png" height="50" alt="" style="margin-left: 25px;">
                            <p class="text-center text-uppercase h3 py-3">Đăng nhập</p>
                            
                            <div class="form-group">
                              <label for="username">Tên đăng nhập</label>
                              <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <label for="password">Mật khẩu</label>
                              <input type="password" name="password" id="password" class="form-control" required>
                            </div>                  
                       
                            <input type="submit" value="Đăng nhập" class="btn-primary btn btn-block" style="margin-top: 50px;" name="btn_submit">     
                        </form>
                        <a href="dangky.php" style="margin-left: 40%;" class="">Đăng ký tài khoản</a>
                    </div>
            </div>
            
     </div>
</body>
</html>
<?php
require_once("includes/connection.php");
if (isset($_POST["btn_submit"])) {
    // lấy thông tin người dùng
  $username = $_POST["username"];
  $password = $_POST["password"];
    //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
    //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
  $username = strip_tags($username);
  $username = addslashes($username);
  $password = strip_tags($password);
  $password = addslashes($password);
  if ($username == "" || $password =="") {
    echo "username hoặc password bạn không được để trống!";
  }else{
    $sql = "select * from khach_hang where TenDangNhap = '$username' and MatKhau = '$password' and Quyen = 0";
    $query = mysqli_query($conn,$sql);
    $num_rows = mysqli_num_rows($query);
    if ($num_rows==0) {
      echo "Tên đăng nhập hoặc mật khẩu không đúng !";
    }else{
      // Lấy ra thông tin người dùng và lưu vào session
      while ( $data = mysqli_fetch_array($query) ) {
        $_SESSION["customer_id"] = $data["MaKhachHang"];
        $_SESSION['username'] = $data["TenDangNhap"];
        $_SESSION["fullname"] = $data["TenKhachHang"];
        $_SESSION["address"] = $data["DiaChi"];
        $_SESSION["phone"] = $data["SoDienThoai"];
        $_SESSION["email"] = $data["Email"];
        $_SESSION["quyen"] = $data["Quyen"];
      }
      // Thực thi hành động sau khi lưu thông tin vào session
      header('Location: index.php');
    }
  }
}
?>