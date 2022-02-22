<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <?php
            if(isset($_SESSION['add']))
            {
                echo "<br><br>";
                echo $_SESSION['add'];
                unset($_SESSION['add']);
                echo "<br><br>";
            }
        ?>
        <?php
            if(isset($_SESSION['upload']))
            {
                echo "<br><br>";
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
                echo "<br><br>";
            }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>IMAGE: </td>
                    <td>
                        <input type="file" name="image">

                    </td>
                </tr>
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title">
                    </td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>

                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No

                    </td>
                </tr>
                <td>Active: </td>
                <td>
                    <input type="radio" name="active" value="Yes">Yes
                    <input type="radio" name="active" value="No">No
                </td>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include('partials/footer.php') ;
        if(isset($_POST['submit']))
        {
            $title= mysqli_real_escape_string($conn,$_POST['title']);
            if(isset($_POST['featured']))
            {
                $featured = mysqli_real_escape_string($conn,$_POST['featured']);
            }else
            {
                $featured = "No";
            }
            if(isset($_POST['active']))
            {
                mysqli_real_escape_string($conn,$active = $_POST['active']);
            }else
            {
                $active = "No";
            }
            //check if the image is uploaded
            //print_r($_FILES['image']);
           // die(); //break 
            if(isset($_FILES['image']['name']))
            {
                //image name
                $image= $_FILES['image']['name'];
                //rename the photo wtih image_ and a random number
                if($image != ''){
                $ext= end(explode('.',$image));
                $image="image_".rand(000,999).'.'.$ext;
                //upload the pic and move it to the category photos file
                $source_path = $_FILES['image']['tmp_name'];
                $destination_path="../images/category/". $image;
                $upload= move_uploaded_file($source_path,$destination_path);
               
                if($upload==false)
                {
                    $_SESSION['upload']= "<div class='error'>Failed To Upload Image</div>";
                    echo "<script>window.location.href = \"add-category.php\"</script>";
                    die();
                }
                }
            }else{
                //set blank
                $image=""; 
            }

            $sql = "INSERT INTO `tbl_category`
             ( `title`, `image_name`, `featured`, `active`) 
             VALUES ( '$title', '$image', '$featured', '$active')";
         
            $result = mysqli_query($conn, $sql) or die("Could Not Connect");
            if($result)
            {
                $_SESSION['add'] = "<div class='success'>Category Added Successfully </div> " ;
                echo "<script>window.location.href = \"manage-category.php\"</script>";
            }
            else
            {
                $_SESSION['add'] = "<div class='error'>Add Failed</div> " ;
                echo "<script>window.location.href = \"add-category.php\"</script>";

            }
        }
?>