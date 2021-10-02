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

    if(isset($_POST['submit__think']))
    {
        $post_content = $_POST['input__think'];
        if(strlen($post_content) < 1)
        {
            header("Location: index.php");
        }else{
            $post_img        = $_FILES['file__think']['name'];
            $post_img_temp   = $_FILES['file__think']['tmp_name'];
            $datePost        = date("Y-m-d H:i:s");
            move_uploaded_file($post_img_temp,"../assets/image/img_post/$post_img");
          
                $insertPost = new Post($con,$loginEmail);
                $insertPost->addPost($post_content,$post_img,$datePost);
        }   
}
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
                        <a href="" class="user__title-link"><span class="user__title">Gợi ý kết bạn</span></a>
                    </div>
                </div>
                <div class="time__line col c-4">
                    <div class="think">
                        <form action="" class="form__think" method="post" enctype="multipart/form-data">
                            <textarea name="input__think" class="input__think" id="" cols="30" rows="10"></textarea>
                            <div class="file__submit">
                                <label for="file__think" class="custom__file-think">Thêm ảnh</label>
                                <input type="file" name="file__think" id="file__think" class="file__think">
                                <button type="submit" class="submit__think" name="submit__think">Viết</button>
                            </div>
                        </form>
                    </div>
                    <input type="hidden" class="get__user-comment" id="<?php echo $username ?>">
                    <input type="hidden" class="get__img-comment" id="../assets/image/img_user/<?php echo $img ?>">


                    <?php
                    $objViewPost = new Post($con, $loginEmail);
                    $viewPost    = $objViewPost->viewPost();
                    while($row   = mysqli_fetch_assoc($viewPost)){
                
                        $post_content = $row['post_content'];
                        $post_img     = $row['post_img'];
                        $loginId      = $row['user_id'];
                        $post_id      = $row['id']; 

                        $objViewUser  = new User($con,$loginId);
                        $viewUser     = $objViewUser->getUserTimeLine();
                        $user         = mysqli_fetch_assoc($viewUser);
                        $name         = $user['username'];
                        $img_user     = $user['img_profile'];
                        $user_id      = $user['id'];

                        $objViewTime  = new Post($con,$post_id);
                        $timeMessage  = $objViewTime->ViewDateTime();

                    ?>
                    <div class="time__line-main">
                    <div class="change__time-line click__update" id="<?php echo $post_id?>"><i class="fas fa-list"></i></div>
                    <div class="change__post change__post-<?php echo $post_id?> hidden" id="<?php echo $post_id?>">
                        <div class="change__post-all change__post-title">Thay đổi bài viết</div>
                        <div class="change__post-all change__update-post" id="<?php echo $post_id ?>">Cập nhật bài viết</div>
                        <a href="index.php?post_id=<?php echo $post_id ?>" class="delete__post-link"><div class="change__post-all delete__post">Xóa bài viết</div></a>           
                    </div>
                    <?php 
                    if(isset($_POST['submit__update-post'])){
                        $content = $_POST['update__post-content'];
                        $content = mysqli_real_escape_string($con,$content);
                        $objUpdatePost = new Post($con, $post_id);
                        $objUpdatePost->updatePost($content,$post_id);
                    }
                    if(isset($_GET['post_id'])){
                        $post_update_id = $_GET['post_id'];
                        $objDeletePost  = new Post($con,$post_id);
                        $objDeletePost->deletePost($post_id);
                    }

                    ?>
                    <div class="update__post update__post<?php echo $post_id?> hidden">
                                    <div class="time__line-main update_post">
                                        <form action="" method="post">
                                                <div class="time__line-time">
                                                    <div class="time__line-user">
                                                        <div class="time__line-user--img">
                                                            <img src="../assets/image/img_user/<?php echo $img_user ?>" alt="" class="time__line-users">
                                                        </div>
                                                        <a href="" class="time__line-link"><span class="time__line-title"><?php echo $name ?></span></a>
                                                    </div>
                                                    <div class="list__time-list">
                                                        <span class="time__line-ago"><?php echo $timeMessage ?></span>
                                                        <div class="change__time-line close__post-update" id="<?php echo $post_id ?>"><i class="far fa-window-close"></i></div>
                                                    </div>           
                                                </div>
                                                <?php 
                                                if($post_img != ""){?>
                                                <input type="text" name="update__post-content" class="update__post-content" value="<?php echo $post_content?>">
                                                <div class="time__line-image">
                                                    <img src="../assets/image/img_post/<?php echo $post_img ?>" id="img__update-post" alt="" class="time__line-images">
                                                </div>
                                                <?php
                                                }else{?>
                                                <input type="text" name="update__post-content" class="update__post-content" value="<?php echo $post_content?>">
                                                <?php }
                                                ?>
                                               
                                                
                                                <div class="file__submit">
                                                    <!-- <label for="file__think" class="custom__file-think">Thêm ảnh</label>
                                                    <input type="file" name="file__update-post" id="file__update-post" class="file__think" accept="image/gif, image/jpeg, image/png" onchange="changeImg(this)"> -->
                                                    <button type="submit" name="submit__update-post" class="submit__think">Viết</button>
                                                </div>
                                             </form>         
                                </div>
                                </div>
                    <div class="time__line-time">
                        <div class="time__line-user">
                            <div class="time__line-user--img">
                                <img src="../assets/image/img_user/<?php echo $img_user ?>" alt="" class="time__line-users">
                            </div>
                            <a href="" class="time__line-link"><span class="time__line-title"><?php echo $name ?></span></a>
                        </div>
                        <div class="list__time-list">
                            <span class="time__line-ago"><?php echo $timeMessage ?></span>
                
                        </div>
                    </div>
                    <?php 
                    if($post_img == ""){?>
                         <div class="time__line-content"><?php echo $post_content ?></div>
                    <?php }?>
                     <?php if($post_img != ""){?>
                         <div class="time__line-content"><?php echo $post_content ?></div>
                         <div class="time__line-image">
                        <img src="../assets/image/img_post/<?php echo $post_img ?>" alt="" class="time__line-images">
                    </div>
                    <?php }?>
                   
                    <div class="like__comment">
                        <div class="like__comment-col">
                            <i class="far fa-heart"></i>
                        </div>
                        <div class="like__comment-col likes-2" id="<?php echo $post_id ?>">
                            <i class="far fa-comment"></i>
                        </div>
                        <div class="like__comment-col likes-3">
                            <i class="fas fa-share"></i>
                        </div>
                    </div>
                    <div class="comment<?php echo $post_id ?> comment hidden">
                    <input type="hidden" class="value_username<?php echo $post_id?>" id="<?php echo $name; ?>">
                    <input type="hidden" class="value_post-id<?php echo $post_id?>" id="<?php echo $post_id; ?>">
                    <input type="hidden" class="value_user-id<?php echo $post_id?>" id="<?php echo $user_id; ?>">
                        <div class="view__comment<?php echo $post_id ?>">
                        
                               <div class="view__comment-div view__comment-div<?php echo $post_id ?>">
                                <div class="user__comment user__comment<?php echo $post_id ?>">
                                        <img src="../assets/image/img_user/<?php echo $img_user ?>" alt="" class="user__comment-img">
                                        <div class="user__comment-user"><?php echo $name ?></div>
                                    </div>
                                        <div class="view__comment-content" id="<?php echo $post_id ?>">Very beautiful</div>       
                               </div>
                                           
                        </div>
                        <div class="add__comment">
                            <div class="user__comment">
                                <img src="" alt="" class="user__comment-img">
                                <div class="user__comment-user"></div>
                            </div>
                            <form class="form__comment form__comment<?php echo $post_id ?>" id="<?php echo $post_id?>">
                                <textarea name="comment__content" cols="30" rows="2" class="comment__content comment__content<?php echo $post_id ?>"></textarea>
                                <input type="submit" name="comment__submit<?php echo $post_id ?>" class="comment__submit comment__submit<?php echo $post_id ?>" value="Chấp nhận">
                            </form>
                        </div>
                    </div>
                </div>
                    <?php } ?>
                   
                    <div class="time__line-main">
                        <div class="time__line-time">
                            <div class="time__line-user">
                                <div class="time__line-user--img">
                                    <img src="../assets/image/unnamed.png" alt="" class="time__line-users">
                                </div>
                                <a href="" class="time__line-link"><span class="time__line-title">Tôn</span></a>
                            </div>
                                <span class="time__line-ago">Cách đây 2 phút</span>
                        </div>
                        <div class="time__line-content">Thực ra suy cho cùng tình yêu nói đơn giản thì nó rất đơn giản, nói phức tạp thì cũng rất phức tạp</div>
                        <div class="time__line-image">
                            <img src="../assets/image/true-love-la-gi-4.jpg" alt="" class="time__line-images">
                        </div>
                        <div class="like__comment">
                            <div class="like__comment-col">
                                <i class="far fa-heart"></i>
                            </div>
                            <div class="like__comment-col likes-2">
                                <i class="far fa-comment"></i>
                            </div>
                            <div class="like__comment-col likes-3">
                                <i class="fas fa-share"></i>
                            </div>
                        </div>
                    </div>
                    <div class="time__line-main">
                        <div class="time__line-time">
                            <div class="time__line-user">
                                <div class="time__line-user--img">
                                    <img src="../assets/image/unnamed.png" alt="" class="time__line-users">
                                </div>
                                <a href="" class="time__line-link"><span class="time__line-title">Tôn</span></a>
                            </div>
                                <span class="time__line-ago">Cách đây 2 phút</span>
                        </div>
                        <div class="time__line-content">Thực ra suy cho cùng tình yêu nói đơn giản thì nó rất đơn giản, nói phức tạp thì cũng rất phức tạp</div>
                        <div class="time__line-image">
                            <img src="../assets/image/Real-Madrid.jpg" alt="" class="time__line-images">
                        </div>
                        <div class="like__comment">
                            <div class="like__comment-col">
                                <i class="far fa-heart"></i>
                            </div>
                            <div class="like__comment-col likes-2">
                                <i class="far fa-comment"></i>
                            </div>
                            <div class="like__comment-col likes-3">
                                <i class="fas fa-share"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="online col c-4"></div>
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