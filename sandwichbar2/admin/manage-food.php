<?php include('partials/menu.php') ?>
<!---- Main Content Section Starts-->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food </h1>
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
        <a href="add-food.php" class="btn-primary">Add Food</a>
        <br /><br /><br />
        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>

            </tr>
            <?php 
            $sql ="SELECT * FROM tbl_food ";
            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            if($count>0)
            {$x=1;
                //we have dataa
                while($row=mysqli_fetch_assoc($res))
                {
                    $id=$row['id'];
                    $title=$row['tittle'];
                    $price=$row['price'];
                    $image=$row['image'];
                    $featured=$row['featured'];
                    $active=$row['active'];
                    ?>
            <tr>
                <td class="border"><?php echo $x++;?>.</td>
                <td class="border"><?php echo $title;?></td>
                <td class="border">₪<?php echo $price;?></td>
                <td class="border">
                    <?php 
                    if($image!='')
                    {
                        ?>
                    <img style="width: 100px; height:80px;" src="../images/food/<?php echo $image;?>">
                    <?php
                    }else
                    {
                        ?>
                    <div class="error">This Food Doesnt have Picture</div>
                    <?php
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
                </td>
                <td class="border">
                    <a href="delete-food.php?id=<?php echo $id ; ?>&image_name=<?php echo $image ; ?>"
                        class="btn-secondary">Delete Food</a>
                    <a href="update-food.php?id=<?php echo $id ; ?>" class="btn-danger">Update Food</a>
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