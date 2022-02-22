<?php include('partials/menu.php') ?>
<?php 
    if(isset($_GET['id']))
    {
     //   echo "<div class='success'>Getting The Data</div>";
        $id = $_GET['id'];
        $sql2 ="SELECT * FROM tbl_food WHERE id=$id";
        $res2=mysqli_query($conn,$sql2);
        $count=mysqli_num_rows($res2);
        if($count==1)
        {
        $row=mysqli_fetch_assoc($res2);
        $title = $row['tittle'];
        $description=$row['description'];
        $price=$row['price'];
        $current_image = $row['image'];
        $category=$row['category_id'];
        $active = $row['active'];
        $featured = $row['featured'];

        }
        else
        {
        $_SESSION['add'] = "<div class='error'> Food is Not Found</div>";
        echo "<script>window.location.href = \"manage-food.php\"</script>";
        }
    }else
    {
        $_SESSION['add'] = "<div class='error'> Food is Not Found</div>";
        echo "<script>window.location.href = \"manage-food.php\"</script>";
    }
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title ; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Description :</td>
                    <td>
                        <textarea name="description" cols="30" rows="5"><?php echo $description ;?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>NEW IMAGE: </td>
                    <td>
                        <input type="file" name="image">

                    </td>
                </tr>
                <tr>
                    <td>Current IMAGE :</td>
                    <td><?php 
                    if($current_image!=''){?>
                        <img style="width: 100px;" src="../images/food/<?php echo $current_image;?>">

                        <?php 
                    }else{
                        echo "<div class='error'>There is No Image</div>";
                    }
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>Price :</td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price ; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Category :</td>
                    <td>
                        <select name="category">
                            <?php //create php code to display the category
                                //1.sql
                                $sql="SELECT * FROM tbl_category WHERE active='Yes'";
                                //2.execute (result)
                                $res=mysqli_query($conn,$sql);
                                //3.Count Rows
                                $count = mysqli_num_rows($res);
                                //if count is greater than zero
                                if($count>0)
                                {
                                    //we have categories
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        //get the data of category 
                                        $ida =$row['id'];
                                        $title=$row['title'];
                                        ?>
                            <option value="<?php echo $ida ; ?>"><?php echo $title ; ?></option>
                            <?php
                                    }

                                }
                                else
                                {
                                    ?>
                            <option value="0">No Categories Found</option>
                            <?php
                                    //we dont have categories
                                }
                            ?>

                    </td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if($featured=='Yes'){echo 'Checked';}?> type="radio" name="featured"
                            value="Yes">Yes
                        <input <?php if($featured=='No'){echo 'Checked';}?> type="radio" name="featured" value="No">No

                    </td>
                </tr>
                <td>Active: </td>
                <td>
                    <input <?php if($active=='Yes'){echo 'Checked';}?> type="radio" name="active" value="Yes">Yes
                    <input <?php if($active=='No'){echo 'Checked';}?> type="radio" name="active" value="No">No
                </td>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="current_image" value="<?php echo $current_image ;?>">
                        <input type="hidden" name="ida" value="<?php $id ;?>">
                        <input type="submit" name="submit" value="Update Food" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <?php 
            if(isset($_POST['submit']))
            {   
                $title = $_POST['title'];
                $sql4="SELECT id FROM tbl_food WHERE tittle='$title'";
                $res4=mysqli_query($conn,$sql4);
                if($res4)
                {
                    
                    if (mysqli_num_rows($res4) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($res4)) {
                            $id =$row['id'];
                        }
                    }
                }else{
                    echo "not work";
                }
                $description = mysqli_real_escape_string($conn,$_POST['description']);
                $current_image = $_POST['current_image'];
                $price = mysqli_real_escape_string($conn,$_POST['price']);
                $category = mysqli_real_escape_string($conn,$_POST['category']);
                $featured = mysqli_real_escape_string($conn,$_POST['featured']);
                $active = mysqli_real_escape_string($conn,$_POST['active']);
                if(isset($_FILES['image']['name']))
                    {
                        
                        $image = $_FILES['image']['name'];
                        if($image!='')
                        {
                            $ext= end(explode('.',$image));
                            $image="image_".rand(000,999).'.'.$ext;
                            //upload the pic and move it to the category photos file
                            $source_path = $_FILES['image']['tmp_name'];
                            $destination_path="../images/food/". $image;
                            $upload= move_uploaded_file($source_path,$destination_path);
                        
                            if($upload==false)
                            {
                                $_SESSION['upload']= "<div class='error'>Failed To Upload Image</div>";
                                echo "<script>window.location.href = \"manage-food.php\"</script>";
                                die();
                            }
                            
                        }else{
                        $image=$current_image;
                    }
                    $sql3="UPDATE tbl_food SET
                     tittle='$title',
                     description='$description',
                     price=$price,
                     image='$image',
                     category_id=$category,
                     featured='$featured',
                     active='$active'
                      WHERE id=$id
                    ";
                $res3=mysqli_query($conn,$sql3);
                if($res3)
                {
               // echo "DATA IS UPDATED";
                $_SESSION['add'] = "<div class='success'>Food is Updated Successfully☺</div>";
                echo "<script>window.location.href = \"manage-food.php\"</script>";
            
            
            }else{
                $_SESSION['add'] = "<div class='error'>Failed To Update Food</div>";
                echo "<script>window.location.href = \"manage-food.php\"</script>";
            
            
             }
        
            }
        }
            ?>
    </div>
</div>
<?php include('partials/footer.php')?>