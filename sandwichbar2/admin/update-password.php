<?php include('partials/menu.php') ?>
<?php 
if(isset($_GET['id'])){
    $id= $_GET['id'];
}
?>


<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Current Password :</td>
                    <td><input type="text" name="current_password" placeholder="Old Password"></td>
                </tr>
                <tr>
                    <td>New Password :</td>
                    <td><input type="text" name="new_password" placeholder="New Password"></td>
                </tr>
                <tr>
                    <td>Confirm Password :</td>
                    <td><input type="text" name="confirm_password" placeholder="Confirm Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="ida" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                </tr>
            </table>
        </form>
    </div>
</div>


<?php
if(isset($_POST['submit']))
{
$id = mysqli_real_escape_string($conn,$_POST['ida']);
$current_password = mysqli_real_escape_string($conn,md5($_POST['current_password']));
$new_password = mysqli_real_escape_string($conn,md5($_POST['new_password']));
$confirm_password = mysqli_real_escape_string($conn,md5($_POST['confirm_password']));

 

$sql="SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";
$res=mysqli_query($conn,$sql);
if($res==true)
{
        $count=mysqli_num_rows($res);
        if($count==1)
            {
                if($new_password==$confirm_password)
                {
                   $sql2="UPDATE tbl_admin SET
                    password='$new_password'
                    WHERE id=$id
                    ";
                       
                    $res2=mysqli_query($conn,$sql2);
                         if($res2==true){
                         $_SESSION['add'] = "<div class='success'>The Password is Updated</div>";
                          header('location:'.SITEURL.'admin/manage-admin.php');
                        }else{
                         $_SESSION['add'] = "<div class='error'>Failed To Update The Password</div>";
                         header('location:'.SITEURL.'admin/manage-admin.php');
                        }
                }else{
            $_SESSION['add'] = "<div class='error'>The Password Are Not Match</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }

        }else{
            $_SESSION['add'] = "<div class='error'>User Not Found</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
}else{
    $_SESSION['add'] = "<div class='error'>User Not Found</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}
}


?>


<?php include('partials/footer.php') ?>