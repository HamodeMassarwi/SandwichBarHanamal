<?php include('partials/menu.php') ?>
<?php 
$id= $_GET['id'];
$sql ="SELECT * FROM tbl_admin WHERE id=$id";
$res=mysqli_query($conn,$sql);
if($res==true)
{
    $count=mysqli_num_rows($res);
    if($count==1)
    {
      //  echo 'Admin is Available';
      $row=mysqli_fetch_assoc($res);
      $full_name = $row['full_name'];
      $username = $row['username'];
    }
    else
    {
        $_SESSION['add'] = "Admin Not Found";
        header('location:' .SITEURL.'admin/manage-admin.php');
    }
}

?>


<div class="main-content">
    <div class="wrapper">
        <h1>Update Page</h1>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name1" placeholder="<?php echo $full_name ; ?>"></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username1" placeholder="<?php echo $username ; ?>"></td>
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

$full_name = mysqli_real_escape_string($conn,$_POST['full_name1']);

$username = mysqli_real_escape_string($conn,$_POST['username1']);
 

$sqla="UPDATE tbl_admin SET full_name = '$full_name' , username = '$username' WHERE id = $id";
$resa=mysqli_query($conn,$sqla);
if($resa==true)
{
   // echo "DATA IS UPDATED";
    $_SESSION['add'] = "<div class='success'>Admin Updated Successfully</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');


}else{
    $_SESSION['add'] = "<div class='error'>Failed To Update Admin</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');

}
}


?>


<?php include('partials/footer.php') ?>