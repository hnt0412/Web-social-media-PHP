<?php
require '../config/connection.php';
include("../includes/header.php");
require '../handler/Post.php';

if($_SESSION['email'] != null)
{
    $loginEmail  = $_SESSION['email'];
    $select_user = new User($con, $loginEmail);
    $row         = $select_user->getUser();
    $username    = $row['username'];
    $img         = $row['img_profile'];

?>
            <div class="main">
            <div class="navigation col c-2">
                    <div class="user">
                        <div class="user__img"><img src="../assets/image/img_user/<?php echo $img ?>" alt="" class="user__img-main"></div>
                        <a href="" class="user__title-link"><span class="user__title"><?php echo $username ?></span></a>
                    </div>
                    <div class="user">
                        <div class="user__icon-friend"><i class="fas fa-user-friends"></i></div>
                        <a href="list_friend.php" class="user__title-link"><span class="user__title">Bạn bè</span></a>
                    </div>
                    <div class="user">
                        <div class="user__icon-friend"><i class="fas fa-user-plus"></i></div>
                        <a href="" class="user__title-link"><span class="user__title">Lời mời kết bạn</span></a>
                    </div>
                    <div class="user">
                        <div class="user__icon-friend"><i class="far fa-address-card"></i></div>
                        <a href="suggest_friend.php" class="user__title-link"><span class="user__title">Gợi ý kết bạn</span></a>
                    </div>
                </div>
                <div class="friend col c-10">
                    <div class="list__friend">
                        <div class="box__friend">
                            <img src="../assets/image/img_user/true-love-la-gi-4.jpg" alt="" class="box__friend-img">
                            <a href="" class="name__friend-link"><div class="name__friend">Hồ Ngọc Tôn</div></a>
                            <div class="delete__friend">Xóa bạn bè</div>
                        </div>
                        <div class="box__friend">
                            <img src="../assets/image/img_user/true-love-la-gi-4.jpg" alt="" class="box__friend-img">
                            <a href="" class="name__friend-link"><div class="name__friend">Hồ Ngọc Tôn</div></a>
                            <div class="delete__friend">Xóa bạn bè</div>
                        </div>
                        <div class="box__friend">
                            <img src="../assets/image/img_user/true-love-la-gi-4.jpg" alt="" class="box__friend-img">
                            <a href="" class="name__friend-link"><div class="name__friend">Hồ Ngọc Tôn</div></a>
                            <div class="delete__friend">Xóa bạn bè</div>
                        </div>
                        <div class="box__friend">
                            <img src="../assets/image/img_user/true-love-la-gi-4.jpg" alt="" class="box__friend-img">
                            <a href="" class="name__friend-link"><div class="name__friend">Hồ Ngọc Tôn</div></a>
                            <div class="delete__friend">Xóa bạn bè</div>
                        </div>
                        <div class="box__friend">
                            <img src="../assets/image/img_user/true-love-la-gi-4.jpg" alt="" class="box__friend-img">
                            <a href="" class="name__friend-link"><div class="name__friend">Hồ Ngọc Tôn</div></a>
                            <div class="delete__friend">Xóa bạn bè</div>
                        </div>
                        <div class="box__friend">
                            <img src="../assets/image/img_user/true-love-la-gi-4.jpg" alt="" class="box__friend-img">
                            <a href="" class="name__friend-link"><div class="name__friend">Hồ Ngọc Tôn</div></a>
                            <div class="delete__friend">Xóa bạn bè</div>
                        </div>
                        <div class="box__friend">
                            <img src="../assets/image/img_user/true-love-la-gi-4.jpg" alt="" class="box__friend-img">
                            <a href="" class="name__friend-link"><div class="name__friend">Hồ Ngọc Tôn</div></a>
                            <div class="delete__friend">Xóa bạn bè</div>
                        </div>
                        <div class="box__friend">
                            <img src="../assets/image/img_user/true-love-la-gi-4.jpg" alt="" class="box__friend-img">
                            <a href="" class="name__friend-link"><div class="name__friend">Hồ Ngọc Tôn</div></a>
                            <div class="delete__friend">Xóa bạn bè</div>
                        </div>
                        <div class="box__friend">
                            <img src="../assets/image/img_user/true-love-la-gi-4.jpg" alt="" class="box__friend-img">
                            <a href="" class="name__friend-link"><div class="name__friend">Hồ Ngọc Tôn</div></a>
                            <div class="delete__friend">Xóa bạn bè</div>
                        </div>
                        <div class="box__friend">
                            <img src="../assets/image/img_user/true-love-la-gi-4.jpg" alt="" class="box__friend-img">
                            <a href="" class="name__friend-link"><div class="name__friend">Hồ Ngọc Tôn</div></a>
                            <div class="delete__friend">Xóa bạn bè</div>
                        </div>
                        <div class="box__friend">
                            <img src="../assets/image/img_user/true-love-la-gi-4.jpg" alt="" class="box__friend-img">
                            <a href="" class="name__friend-link"><div class="name__friend">Hồ Ngọc Tôn</div></a>
                            <div class="delete__friend">Xóa bạn bè</div>
                        </div>
                        <div class="box__friend">
                            <img src="../assets/image/img_user/true-love-la-gi-4.jpg" alt="" class="box__friend-img">
                            <a href="" class="name__friend-link"><div class="name__friend">Hồ Ngọc Tôn</div></a>
                            <div class="delete__friend">Xóa bạn bè</div>
                        </div>
                        <div class="box__friend">
                            <img src="../assets/image/img_user/true-love-la-gi-4.jpg" alt="" class="box__friend-img">
                            <a href="" class="name__friend-link"><div class="name__friend">Hồ Ngọc Tôn</div></a>
                            <div class="delete__friend">Xóa bạn bè</div>
                        </div>
                        <div class="box__friend">
                            <img src="../assets/image/img_user/true-love-la-gi-4.jpg" alt="" class="box__friend-img">
                            <a href="" class="name__friend-link"><div class="name__friend">Hồ Ngọc Tôn</div></a>
                            <div class="delete__friend">Xóa bạn bè</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="background__post hidden"></div>
        </div>
    </div>
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/comment.js"></script>
</body>
</html>
<?php }else{
    header("Location: login.php");
} ?>