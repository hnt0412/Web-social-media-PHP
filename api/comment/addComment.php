<?php 
require '../../config/connection.php';
require '../../handler/User.php';
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Header:Access-Control-Allow-Header,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');


$data = json_decode(file_get_contents("php://input"));
    $user_id         = $data->user_id;
    $post_id         = $data->post_id;
    $content_comment = $data->content;
    $comment_by      = $data->comment_by;
    $img_user        = $data->img_user;

    $query = mysqli_query($con, "INSERT INTO comments(user_id,post_id,content,comment_by,img_user) VALUES('$user_id','$post_id','$content_comment','$comment_by','$img_user')");
    if(!$query)
    {
        die("QUERY FAILED" . mysqli_error($this->con));
    }
    $query = mysqli_query($con, "SELECT * FROM comments WHERE post_id='$post_id'");
    if(!$query)
    {
        die("QUERY FAILED" . mysqli_error($con));
    }

    $comment_array = [];
    while($row = mysqli_fetch_assoc($query)){
        $id         = $row['id'];
        $user_id    = $row['user_id'];
        $post_id    = $row['post_id'];
        $content    = $row['content'];
        $comment_by = $row['comment_by'];
        $img_user   = $row['img_user'];
        $list = array(
            'id'         => $id,
            'user_id'    => $user_id,
            'post_id'    => $post_id,
            'content'    => $content,
            'comment_by' => $comment_by,
            'img_user'   => $img_user
        );
        array_push($comment_array,$list);
    }
    echo json_encode($comment_array);

?>