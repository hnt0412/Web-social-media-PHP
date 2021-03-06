<?php
require '../config/connection.php';
require '../handler/update_profile.php';
$username      = "";
$address       = "";
$sx            = "";
$phone_number  = "";
$birthday      = "";

if(isset($_SESSION['email'])){
    if(isset($_POST['update__profile'])){
        $email           = $_SESSION['email'];
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
        header("Location: view_profile.php");
    }    
        $email        = $_SESSION['email'];
        $objView      = new UpdateProfile($con);
        $row          = $objView->ViewProfile($email);
        $username     = $row['username'];
        $address      = $row['address'];
        $sx           = $row['gt'];
        $phone_number = $row['phone_number'];
        $birthday     = $row['birthday']; 
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
                <h2>Ch??o m???ng b???n ?????n v???i Wiki, h??y c???p nh???t h??? s?? c???a b???n!</h2>
                <form class="profile__form" action="" method="post" enctype="multipart/form-data">
                    <label for="file-upload" class="custom-file-upload"></label>
                    <input type="file" id="file-upload" name="file-upload" class="file-upload">
                    <input type="text" name="username" class="username" placeholder="T??n ????ng nh???p" value="<?php echo $username?>">
                    <input type="text" name="address" class="address" placeholder="?????a ch???" value="<?php echo $address?>">
                    <select class="sx" name="sx" id="">
                        <option value="nam">Nam</option>
                        <option value="n???">N???</option>
                        <option value="">Kh??c</option>
                    </select>
                    <input type="text" name="phone-number" class="phone__number" placeholder="S??? ??i???n tho???i" value="<?php echo $phone_number?>">
                    <input type="text" class="birthday" name="birthday" placeholder="Ng??y th??ng n??m sinh" value="<?php echo $birthday?>">
                    <button class="update__profile" name="update__profile" type="submit">C???p nh???t</button>
                </form>
               </div>
           </div>
        </div>
    </div>
    <script src="assets/js/script.js"></script>
</body>
</html>