<?php include('partials/menu.php') ?>
<!---- Main Content Section Starts-->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Videos</h1>
        <br /><br />
        <?php
        if(isset($_SESSION['upload']))
        {
            echo "<br><br>";
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
            echo "<br><br>";
        }
        if(isset($_SESSION['add']))
        {
            echo "<br><br>";
            echo $_SESSION['add'];
            unset($_SESSION['add']);
            echo "<br><br>";
        }
        
        ?>
        <!-- Adddd Admin ☺-->
        <a href="add-video.php" class="btn-primary">Add Video</a>
        <br /><br /><br />
        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Title</th>
                <th>Video</th>
                <th>Actions</th>

            </tr>
            <?php 
            $sql ="SELECT * FROM tbl_video ";
            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            if($count>0)
            {$x=1;
                //we have dataa
                while($row=mysqli_fetch_assoc($res))
                {
                    $id=$row['id'];
                    $title=$row['title'];
                    $image=$row['video'];
                    ?>
            <tr>
                <td class="border"><?php echo $x++;?>.</td>
                <td class="border"><?php echo $title;?></td>
                <td class="border">
                    <?php 
                    if($image!='')
                    {
                        ?>
                    <video width="200" height="150" controls>
                        <source src="../videos/<?php echo $image;?>" type="video/mp4">
                        <?php
                    }else
                    {
                        ?>
                        <div class="error">This Food Doesnt have Picture</div>
                        <?php
                    }
                    ?>
                </td>
                <td class="border">
                    <a href="update-food.php?id=<?php echo $id ; ?>" class="btn-secondary">Update Food</a>
                    <a href="delete-food.php?id=<?php echo $id ; ?>&image_name=<?php echo $image ; ?>"
                        class="btn-danger">Delete Video</a>
                </td>
            </tr>

            <?php
                }

            }
            else
            {
                echo "<tr><td colspan='7' class='error'>Food not Added Yet </td><tr>";
            }
            
            ?>



        </table>
    </div>

</div>
<!---- Main Content Section  Ends-->
<?php include('partials/footer.php');?>