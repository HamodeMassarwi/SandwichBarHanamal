<?php include('partials/menu.php') ?>
<!---- Main Content Section Starts-->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>
        <br><br>
        <?php
        if(isset($_SESSION['add']))
        {
            echo "<br><br>";
            echo $_SESSION['add'];
            unset ($_SESSION['add']);
            echo "<br><br>";
        }
        ?>
        <?php
        if(isset($_SESSION['remove']))
        {
            echo "<br><br>";
            echo $_SESSION['remove'];
            unset ($_SESSION['remove']);
            echo "<br><br>";
        }?>
        <?php
        if(isset($_SESSION['delete']))
        {
            echo "<br><br>";
            echo $_SESSION['delete'];
            unset ($_SESSION['delete']);
            echo "<br><br>";
        }
        ?>
        <?php
        if(isset($_SESSION['upload']))
        {
            echo "<br><br>";
            echo $_SESSION['upload'];
            unset ($_SESSION['upload']);
            echo "<br><br>";
        }
        ?>
        <!-- Adddd Admin ☺-->
        <a href="add-category.php" class="btn-primary">Add Categories</a>
        <br /><br /><br />
        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Title</th>
                <th>IMAGE</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
            <?php
                $sql="SELECT * FROM tbl_category";
                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);
                if($count>0)
                {$x=1;
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title =$row['title'];
                        $image = $row['image_name'];
                        $featured = $row['featured'];
                        $active = $row['active'];
                        ?>
            <tr>
                <td class="border"><?php echo $x++; ?></td>
                <td class="border"><?php echo $title; ?></td>
                <td class="border">
                    <?php if($image!='')
                    {
                        ?>
                    <img style=" width: 100px;" src="../images/category/<?php echo $image ?>">
                    <?php
                        
                    }else
                    {
                        echo "<div class='error'>IMAGE NOT ADDED</div>";
                    }
                    
                    ?>
                </td>
                <td class="border"><?php 
                if($featured=='Yes')
                {
                    ?>
                    <img src="../images/yes.png">
                    <?php
                }
                else
                {
                    ?>
                    <img src="../images/no1.png">
                    <?php 
                }?>
                </td>
                <td class="border"><?php if($active=='Yes')
                {
                    ?>
                    <img src="../images/yes.png">
                    <?php
                }
                else
                {
                    ?>
                    <img src="../images/no1.png">
                    <?php 
                }?>

                <td class="border">
                    <a href="delete-category.php?id=<?php echo $id ; ?>&image_name=<?php echo $image ; ?>"
                        class="btn-secondary">Delete Category</a>
                    <a href="update-category.php?id=<?php echo $id ; ?>" class="btn-danger">Update Category</a>
                </td>
            </tr>
            <?php
                    }
                }else{
                    ?>
            <tr>
                <td colspan="6">
                    <div class="error">There is No Category</div>
                </td>
            </tr>
            <?php   




                }
            
            ?>
        </table>
    </div>

</div>
<!---- Main Content Section  Ends-->
<?php include('partials/footer.php');?>