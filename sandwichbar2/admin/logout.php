<?php
//include conn
include('../Config/Connection.php');
//1.Destroy session
session_destroy();//unset our session user in login page...
//2.Go Back to Login Page
header('location:'.SITEURL.'admin/login.php');
?>