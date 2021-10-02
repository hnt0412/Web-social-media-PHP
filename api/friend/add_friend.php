<?php 
require '../../config/connection.php';
require '../../handler/User.php';
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Header:Access-Control-Allow-Header,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');


$data = json_decode(file_get_contents("php://input"));
    $user_id         = $data->user_id;
    $name_friend     = $data->name_friend;
    $query = mysqli_query($con, "INSERT INTO friends(user_id,name_friend) VALUES('$user_id','$name_friend')");
    if(!$query)
    {
        die("QUERY FAILED" . mysqli_error($this->con));
    }

?>