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
    <script src="../assets/js/all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
</head>
<body>
    <div class="grid">
        <div class="row row__post">
            <div class="header">
                <div class="logo col c-4">
                    <span class="logo__title">Kiki</span>
                </div>
                <div class="search col c-4">
                    <form action="" class="search__form">
                        <input type="text" class="input__search" name="search" placeholder="Tìm kiếm...">
                        <button class="submit__search" name="submit__search"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="header__main col c-4">
                    <div class="icon">
                        <a href="index.php" class="icon__link"><i class="fas fa-home"></i></a>
                        <a href="" class="icon__link"><i class="far fa-comment-dots"></i></a>
                        <a href="" class="icon__link"><i class="far fa-bell"></i></a>
                        <div class="icon__link icon__link-click"><i class="fas fa-sliders-h"></i></div> 
                            <div class="change hidden">
                                <div class="change__outs">
                                <a href="view_profile.php" class="change__link"><div class="home__detail"><i class="fas fa-house-user"></i><span class="change__all">Cập nhật trang cá nhân</span></div></a>
                                <a href="" class="change__link"><div class="home__detail"><i class="fas fa-cog"></i><span class="change__all">Cài đặt</span></div></a>
                                <a href="logout.php" class="change__link"><div class="home__detail"><i class="fas fa-sign-out-alt"></i><span class="change__all">Đăng xuất</span></div></a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>