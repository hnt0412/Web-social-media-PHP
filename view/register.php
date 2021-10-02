<?php
require '../config/connection.php';
if(!$_SESSION['email']){
// Khai báo biến lấy dữ liệu
$firstName       = "";
$lastName        = "";
$email           = "";
$password        = "";
$passwordConfirm = "";
 //Khai báo biến lấy lỗi
$error = array();
$err_firstName       = "";
$err_lastName        = "";
$err_email           = "";
$err_password        = "";
$err_passwordConfirm = "";
$success_res         = "";

if(isset($_POST['submit__register'])){

    $firstName                  = strip_tags($_POST['first__name']); //Xóa thẻ html
    $firstName                  = str_replace(' ', '', $firstName); 
    $_SESSION['first__name']    = $firstName; //Lưu trữ họ và session

    $lastName                   = strip_tags($_POST['last__name']); //Xóa thẻ html
    $lastName                   = str_replace(' ', '', $lastName); 
    $_SESSION['last__name']     = $lastName; //Lưu trữ họ và session

    $email                      = strip_tags($_POST['email__res']); //Xóa thẻ html
    $email                      = str_replace(' ', '', $email); 
    $_SESSION['email__res']     = $email; //Lưu trữ họ và session

    $password                   = strip_tags($_POST['password__res']); //Xóa thẻ html
    $password                   = str_replace(' ', '', $password); 
    $_SESSION['password__res']  = $password; //Lưu trữ họ và session

    $passwordConfirm            = strip_tags($_POST['password__res2']); //Xóa thẻ html
    $passwordConfirm            = str_replace(' ', '', $passwordConfirm); 
    $_SESSION['password__res2'] = $passwordConfirm; //Lưu trữ họ và session

   
    

    // if(empty($firstName)){
    //     $err_firstName = "Không được để trống họ";
    // }
    if(strlen($firstName) < 3 || strlen($firstName) > 20)
    {
        $err_firstName = "Họ phải từ 3 - 20 kí tự";
        array_push($error, $err_firstName);
    }
    // if(empty($lastName)){
    //     $err_lastNameName = "Không được để trống tên";
    // }
    if(strlen($lastName) < 3 || strlen($lastName) > 20)
    {
        $err_lastName = "Tên phải từ 3 - 20 kí tự";
        array_push($error, $err_lastName);
    }
    if($password != $passwordConfirm)
    {
        $err_password = "Mật khẩu không trùng khớp";
        array_push($error, $err_password);
    }else if((preg_match('/[^A-Za-z0-9]/', $password)))
    {
        $err_password = "Mật khẩu phải bao gồm chữ và số";
        array_push($error, $err_password);
    }else if(strlen($password) < 6 || strlen($password) > 30)
    {
        $err_password = "Mật khẩu phải từ 6 -30 kí tự";
        array_push($error, $err_password);

    }

    $emailCheck = mysqli_query($con, "SELECT email FROM users WHERE email = '$email'");
    if(!$emailCheck)
    {
    die("QUERY FAILED" . mysqli_error($con));
    }

    $num_rows = mysqli_num_rows($emailCheck);
   
    if($num_rows > 0){
        $err_email = "Email đã sử dụng";
        array_push($error, $err_email);
    }

    if(empty($error)){
        $password = md5($password);
        $query = mysqli_query($con, "INSERT INTO users(first_name,last_name,email,password) VALUES('$firstName','$lastName','$email','$password')");
        if(!$query)
        {
            die("QUERY FAILED" . mysqli_error($con));
        }
        $success_res = "Đăng kí thành công";
        $_SESSION['email'] = $email;
        header("Location: welcome.php");
    }
}
}else
{
    header("Location: index.php");
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
                <div class="register">
                    <h1>Đăng kí</h1>
                    <form action="" method="post">
                        <div class="login">
                            <input type="text" name="first__name" class="first__name" placeholder=" Họ">
                            <div class="validate__first"><?php if(in_array($err_firstName,$error)){echo $err_firstName;}?></div>
                            <input type="text" name="last__name" class="last__name" placeholder=" Tên">
                            <div class="validate__first"><?php if(in_array($err_lastName,$error)){echo $err_lastName;} ?></div>
                            <input type="email" name="email__res" class="email__res" placeholder=" Email">
                            <div class="validate__first"><?php if(in_array($err_email,$error)){echo $err_email;}?></div>
                            <input type="password" name="password__res" class="password__res" placeholder=" Mật khẩu">
                            <div class="validate__first"><?php if(in_array($err_password,$error)){echo $err_password;} ?></div>
                            <input type="password" name="password__res2" class="password__res" placeholder="Nhập lại mật khẩu">
                        </div>
                            <button type="submit" name="submit__register" class="submit__register">Đăng kí</button>
                            <div class="register_success"><?php echo $success_res;  ?></div>
                    </form>
                </div> 
            </div>
        </div>
    </div>
    <script src="assets/js/script.js"></script>
</body>
</html>
