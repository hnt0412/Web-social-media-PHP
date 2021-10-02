<?php 
require '../handler/User.php';
class Post{
    private $con;
    private $email;
    public function __construct($con,$email)
    {
        $this->con = $con;
        $this->email = $email;
        $this->objUser = new User($this->con,$this->email);
    }

    public function addPost($postContent,$postImg,$datePost){

        $postContent = strip_tags($postContent);
        $postContent = mysqli_real_escape_string($this->con,$postContent);
        $userId = $this->objUser->getUserId();
        echo $userId;
        $query  = mysqli_query($this->con, "INSERT INTO posts(post_content,user_id,post_img,date_post) VALUES('$postContent','$userId','$postImg','$datePost')");
        if(!$query)
        {
            die("QUERY FAILED" . mysqli_error($this->con));
        }
        header("Location: index.php");
    }
    public function viewPost(){
        $query = mysqli_query($this->con, "SELECT * FROM posts ORDER BY id DESC");
        return $query;
    }
    public function ViewDateTime(){
        $query = mysqli_query($this->con, "SELECT * FROM posts WHERE id = '$this->email'");
        $row = mysqli_fetch_assoc($query);
        $time_post = $row['date_post'];
        $time_now  = date("Y-m-d H:i:s");
        $time_start = new DateTime($time_post);
        $time_end   = new DateTime($time_now);
        $time = $time_start->diff($time_end);
        // $time_message = "";
        
        if($time->y >= 1){
            $time_message = "Cách đây" . $time->y . " năm";
        }else if($time->m >= 1){
            $time_message = $time->m . " tháng trước";
        }else if($time->d >= 1){
            $time_message = $time->d . " ngày trước";
        }else if($time->h >= 1){
            $time_message = $time->h . " giờ trước";
        }else if($time->i >= 1){
            $time_message = $time->i . " phút trước";
        }else{
            $time_message = $time->s . " giây trước";
        }
        return $time_message;
    }

    public function updatePost($update_content, $update_id){
        $query = mysqli_query($this->con, "UPDATE posts SET post_content ='$update_content' WHERE id='$update_id'");
        if(!$query)
        {
            die("QUERY FAILED" . mysqli_error($this->con));
        }
        header("Location: index.php");
    }

    public function deletePost($update_id){
        $query = mysqli_query($this->con, "DELETE FROM posts WHERE id='$update_id'");
        if(!$query)
        {
            die("QUERY FAILED" . mysqli_error($this->con));
        }
        header("Location: index.php");
    }




}
?>