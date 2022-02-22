<?php include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br /><br />

        <?php 
            if(isset($_SESSION['add']))
            {
              echo $_SESSION['add'];
              unset($_SESSION['add']); //Removing session massege!
            }
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" placeholder="Enter The Name" require></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" placeholder="Enter The UserName" require></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Enter The Password" require></td>
                </tr>
                <tr>
                    <td>email</td>
                    <td><input type="email" name="email" placeholder="Enter The email" require></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                </tr>
            </table>
        </form>
    </div>


</div>



<?php include('partials/footer.php');?>

<?php
//process the value from form and save it in the dataBase
//connect to data base 

//if the submit is clicked do this . תנאי 
if(isset($_POST['submit']))
{
    //submit is clicked
    //get data from the form
    $fullname = mysqli_real_escape_string($conn,$_POST['full_name']) ;
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']); // you can md5 no one see pw
    $email = mysqli_real_escape_string($conn,$_POST['email']);

    // Now Save the data in the data base
    //SQL Query  to save
    $sql="INSERT INTO tbl_admin SET 
        full_name ='$fullname',
        username='$username',
        password='$password',
        email='$email'
    ";
    //3. save data in datab
    $res = mysqli_query($conn,$sql) or die("Could Not Connect");
    if($res == TRUE){
       // echo "Data Inserted";
       //Creat a sessoin varibale to display message
       $_SESSION['add']="Admin Added Successfully";
       header("location:".SITEURL.'admin/manage-admin.php');
     }else{
        //echo "Data Didnt Inserted";

        $_SESSION['add']="Failed to add admin";
        header("location:".SITEURL.'admin/add-admin.php');    
     }
}

?>