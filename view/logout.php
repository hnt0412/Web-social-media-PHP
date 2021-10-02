<?php
session_start();
$_SESSION['email'] = "";
header("Location: login.php");
?>