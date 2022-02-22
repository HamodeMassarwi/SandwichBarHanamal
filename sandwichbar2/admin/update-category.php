<?php include('partials/menu.php') ?>
<?php 
    if(isset($_GET['id']))
    {
     //   echo "<div class='success'>Getting The Data</div>";
        $id = $_GET['id'];
        $sql ="SELECT * FROM tbl_category WHERE id=$id";
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        if($count==1)
        {
        $row=mysqli_fetch_assoc($res);
        $title = $row['title'];
        $current_image = $row['image_name'];
        $active = $row['active'];
        $featured = $row['featured'];

        }
        else
        {
        $_SESSION['add'] = "<div class='error'> Category Not Found</div>";
        echo "<script>window.location.href = \"manage-category.php\"</script>";
        }
    }else
    {
        $_SESSION['add'] = "<div class='error'> Category Not Found</div>";
        echo "<script>window.location.href = \"manage-category.php\"</script>";
    }
?>


<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title ; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Current IMAGE :</td>
                    <td><?php 
                    if($current_image!=''){?>
                        <img style="width: 100px;" src="../images/category/<?php echo $current_image;?>">

                        <?php 
                    }else{
                        echo "<div class='error'>There is No Image</div>";
                    }
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>NEW IMAGE: </td>
                    <td>
                        <input type="file" name="image">

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
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


<?php
if(isset($_POST['submit']))
{
    $title = mysqli_real_escape_string($conn,$_POST['title']);
    $current_image= mysqli_real_escape_string($conn,$_POST['current_image']);
    $active = mysqli_real_escape_string($conn,$_POST['active']);
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
            $destination_path="../images/category/". $image;
            $upload= move_uploaded_file($source_path,$destination_path);
           
            if($upload==false)
            {
                $_SESSION['upload']= "<div class='error'>Failed To Upload Image</div>";
                echo "<script>window.location.href = \"manage-category.php\"</script>";
                die();
            }
            
        }else{
        $image=$current_image;
    }
    $sqla="UPDATE tbl_category SET
        title='$title',
        image_name='$image',
        featured='$featured',
        active='$active'
        WHERE id=$id
    ";
    $resa=mysqli_query($conn,$sqla);
    if($resa)
    {
   // echo "DATA IS UPDATED";
    $_SESSION['add'] = "<div class='success'>Category is Updated Successfully☺</div>";
    echo "<script>window.location.href = \"manage-category.php\"</script>";


}else{
    $_SESSION['add'] = "<div class='error'>Failed To Update Category</div>";
    echo "<script>window.location.href = \"manage-category.php\"</script>";


}
}
}

?>


<?php include('partials/footer.php') ?>