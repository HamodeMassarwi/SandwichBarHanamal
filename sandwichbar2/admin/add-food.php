<?php include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title">
                    </td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="4"
                            placeholder="Description of the Food"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>
                <tr>
                    <td>Select IMAGE: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Category: </td>
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
                                        $id =$row['id'];
                                        $title=$row['title'];
                                        ?>
                            <option value="<?php echo $id ; ?>"><?php echo $title ; ?></option>
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
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST['submit']))
            {
                //1. take data from form
                $title=mysqli_real_escape_string($conn,$_POST['title']);
                $description = mysqli_real_escape_string($conn,$_POST['description']);
                $price = mysqli_real_escape_string($conn,$_POST['price']);
                $category= mysqli_real_escape_string($conn,$_POST['category']);
                if(isset($_POST['featured']))
                {
                 $featured=mysqli_real_escape_string($conn,$_POST['featured']);
                }
                else{
                    //defult
                    $featured='No';
                }
                if(isset($_POST['active']))
                {
                 $active=mysqli_real_escape_string($conn,$_POST['active']);
                }
                else{
                    //defult
                    $active='No';
                }
                if(isset($_FILES['image']['name']))
                {
                 $image=$_FILES['image']['name'];
                 if($image!='')
                 {
                    $ext = end(explode('.',$image));
                    $image="food-name_".rand(0000,9999).".". $ext;
                    $src = $_FILES['image']['tmp_name'];
                    $dst="../images/food/". $image;
                    $upload =move_uploaded_file($src,$dst);
                    if($upload==false)
                    {
                        $_SESSION['upload'] = "<div class='error'>Failed to Upload Image</div>";
                        echo "<script>window.location.href = \"manage-food.php\"</script>";
                        die();
                    }
                 }
                }
                else{
                    //defult
                    $image='';
                }
                //2.sql
                $sql2="INSERT INTO `tbl_food`( `tittle`, `description`, `price`, `image`, `category_id`, `featured`, `active`) 
                VALUES ('$title','$description',$price,'$image',$category,'$featured','$active')
                ";
                $res2=mysqli_query($conn,$sql2);
                if($res2)
                {
                    //DATA INSETED SUC
                    $_SESSION['upload']="<div class='success'>Food is Added</div>";
                    echo "<script>window.location.href = \"manage-food.php\"</script>";
                }
                else
                {
                    //failed
                    $_SESSION['upload']="<div class='error'>Failed to Add Food</div>";
                    echo "<script>window.location.href = \"manage-food.php\"</script>";
                }
            }
        ?>
    </div>
</div>
<?php include('partials/footer.php') ;?>