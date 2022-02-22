<?php include('partials/menu.php') ?>

<!---- Main Content Section Starts-->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <br /><br />

        <?php 
            if(isset($_SESSION['add']))
            {
              echo $_SESSION['add'];
              unset($_SESSION['add']); //Removing session massege!
            }
        ?>
        <br />
        <br><br>

        <!-- Adddd Admin ☺-->
        <a href="add-admin.php" class="btn-primary">Add ADMIN</a>
        <br /><br /><br />
        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>FULL Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>

            <?php
                //Query to get all admins
                $sql="SELECT * FROM tbl_admin";
                //excute the query
                $res=mysqli_query($conn,$sql);

                $x = 0; //solve the id problem


                //check if query exute
                if($res==true)
                {
                    $count= mysqli_num_rows($res);// function get all rows in db
                    //check num of rows
         
                    if($count>0)
                    {
                       
                        while($rows=mysqli_fetch_assoc($res))   
                        {
                            $x++;
                            //using the loop intel we get all the data from db
                            $id=$rows['id'];
                            $full_name=$rows['full_name'];
                            $email=$rows['email'];
                            ?>
            <tr>
                <td><?php echo $x ; ?></td>
                <td><?php echo $full_name ; ?></td>
                <td><?php echo $email ; ?></td>
                <td>
                    <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>"
                        class="btn-primary">Change Password</a>
                    <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>"
                        class="btn-secondary">Delete Admin</a>
                    <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>"
                        class="btn-danger">Update Admin</a>
                </td>
            </tr>

            <?php
                        

                                        }
                                    }
                                
                                }
                            ?>



        </table>


    </div>

</div>
<!---- Main Content Section  Ends-->
<?php include('partials/footer.php');?>