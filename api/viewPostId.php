<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
require '../config/connection.php';

          if(isset($_GET['post_id']))
          {
          $post_id      = $_GET['post_id'];
          $query        = mysqli_query($con, "SELECT * FROM posts WHERE id = '$post_id'");
          if(!$query)
        {
            die("QUERY FAILED" . mysqli_error($con));
        }
          $row          = mysqli_fetch_assoc($query);
          $post_content = $row['post_content'];
          $post_img     = $row['post_img'];
          $list_post    = array(

              'post_content' => $post_content,
              'post_img'     => $post_img

          );
          echo json_encode($list_post);

        }else{
            die();
        }
?>