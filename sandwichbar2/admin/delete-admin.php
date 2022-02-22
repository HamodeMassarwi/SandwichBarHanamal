<?php 
include('../Config/Connection.php');

$id = $_GET['id'];

$sql = "DELETE FROM tbl_admin WHERE id=$id";

$res = mysqli_query($conn,$sql);

if($res==true)
{
    $_SESSION['add'] = "Admin DELETED";
    header("location:".SITEURL.'admin/manage-admin.php');
}
else
{
    $_SESSION['add'] = "failed To Delete the Admin";
    header("location:".SITEURL.'admin/manage-admin.php');
}