<?php 
class UpdateProfile{
    public $connection;

    function __construct($connection){
        $this->connection = $connection;
    }
    
    public function UpdateProfiles($username,$img_profile,$address,$gt,$phone_number,$date,$email_prof){
        $query = mysqli_query($this->connection, "UPDATE users SET username='$username',img_profile='$img_profile',address='$address',gt='$gt', phone_number='$phone_number', birthday='$date' WHERE email='$email_prof'");
        if(!$query)
        {
            die("QUERY FAILED" . mysqli_error($this->connection));
        }
        // header("Location: index.php");
    }
    public function ViewProfile($email_prof){
        $query = mysqli_query($this->connection, "SELECT * FROM users WHERE email = '$email_prof'");
        $row = mysqli_fetch_assoc($query);
        return $row;
    }

}

?>