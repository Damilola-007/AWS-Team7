<?php  

session_start();
require('connect.php');
echo "<script> window.alert('Logged out Successfully')</script>";
echo "<script> window.location.assign('Login.php')</script>";
session_destroy();

?>