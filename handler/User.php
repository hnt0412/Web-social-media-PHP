<?php
class User{
    private $email;
    private $con;
    public function __construct($con,$email)
    {
        $this->email = $email;
        $this->con  = $con;
    }
    
    public function getAllUser(){
        $query = mysqli_query($this->con, "SELECT * FROM users");
        return $query;
    }
    public function getUser(){
        $query = mysqli_query($this->con, "SELECT * FROM users WHERE email = '$this->email'");
        $row = mysqli_fetch_assoc($query);
        return $row;
    }
    public function getUserId(){
        $query = mysqli_query($this->con, "SELECT * FROM users WHERE email = '$this->email'");
        $row = mysqli_fetch_assoc($query);
        $rowId = $row['id'];
        return $rowId;
    }
    public function getUserTimeLine(){
        $query = mysqli_query($this->con, "SELECT * FROM users WHERE id = '$this->email'");
        return $query;
    }
}
?>