<?php
require '../config/connection.php';
require '../handler/update_profile.php';

$email           = $_SESSION['email'];
if($email != ""){
$username      = "";
$address       = "";
$sx            = "";
$phone_number  = "";
$birthday      = "";
    if(isset($_POST['update__profile'])){
        $update_img      = $_FILES['file-upload']['name'];
        $update_img_temp = $_FILES['file-upload']['tmp_name'];
        $update_username = $_POST['username'];
        $update_address  = $_POST['address'];
        $update_sx       = $_POST['sx'];
        $update_phone    = $_POST['phone-number'];
        $update_birthday = $_POST['birthday'];
        move_uploaded_file($update_img_temp,"../assets/image/img_user/$update_img");
    
        $objProfile = new UpdateProfile($con);
        $objProfile->UpdateProfiles($update_username,$update_img,$update_address,$update_sx,$update_phone,$update_birthday,$email);
        header("Location: index.php");
    }    
}else{
    header("Location: login.php");
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
    <link rel="stylesheet" href="../assets/css/all.css">
    <script src="assets/js/all.js"></script>
  
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
</head>
<body>
    <div class="grid">
        <div class="row">
           <div class="col c-12">
               <div class="profile">
                <h2>Chào mừng bạn đến với Wiki, hãy cập nhật hồ sơ của bạn!</h2>
                <form class="profile__form" action="" method="post" enctype="multipart/form-data">
                    <label for="file-upload" class="custom-file-upload"></label>
                    <input type="file" id="file-upload" name="file-upload" class="file-upload">
                    <input type="text" name="username" class="username" placeholder="Tên đăng nhập">
                    <input type="text" name="address" class="address" placeholder="Địa chỉ">
                    <select class="sx" name="sx" id="">
                        <option value="nam">Nam</option>
                        <option value="nữ">Nữ</option>
                        <option value="">Khác</option>
                    </select>
                    <input type="text" name="phone-number" class="phone__number" placeholder="Số điện thoại">
                    <input type="text" class="birthday" name="birthday" placeholder="Ngày tháng năm sinh">
                    <button class="update__profile" name="update__profile" type="submit">Cập nhật</button>
                </form>
               </div>
           </div>
        </div>
    </div>
    <script src="assets/js/script.js"></script>
</body>
</html>