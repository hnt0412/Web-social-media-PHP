<?php
require '../config/connection.php';
if($_SESSION['email'] == null){
if(isset($_POST['submit__login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);

    $checkLogin = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'");
    if(!$checkLogin)
    {
    die("QUERY FAILED" . mysqli_error($con));
    }
    $num_rows = mysqli_num_rows($checkLogin);
    if($num_rows == 1){
        $update_status = mysqli_query($con, "UPDATE users SET user_closed='yes' WHERE email='$email'");
        $_SESSION['email'] = $email;
        header("Location: index.php");
    }else{
       $error = "Tài khoản hoặc mật khẩu không chính xác";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
  
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
</head>
<body>
    <div class="grid">
        <div class="row">
            <div class="col c-12">

                <div class="login1">
                    <h1>Chào mừng đến với KiKi</h1>
                    <form action="" method="post">
                        <div class="login">
                            <input type="email" name="email" class="email" placeholder=" Email">
                            <input type="password" name="password" class="password" placeholder=" Mật khẩu">
                        </div>
                            <button type="submit" name="submit__login" class="submit__login">Đăng nhập</button>
                            <div class="error__login"><?php echo $error ?></div>
                    </form>
                    <a class="forgot__link" href=""><div class="forgot">Quên mật khẩu</div></a>
                    <a href="register.php" class="register__link">Tạo tài khoản mới</a>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/script.js"></script>
</body>
</html>
<?php }else{
    header("Location: index.php");
} ?>