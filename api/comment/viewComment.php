<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
require '../../config/connection.php';

if(isset($_GET['post_comment_id'])){
    $id = $_GET['post_comment_id'];
    $query = mysqli_query($con, "SELECT * FROM comments WHERE post_id='$id'");
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

}
    
?> 