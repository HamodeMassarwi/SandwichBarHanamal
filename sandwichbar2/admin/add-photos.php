<?php include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Photos</h1>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title">
                    </td>
                </tr>
                <tr>
                    <td>Select IMAGE: </td>
                    <td>
                        <input type="file" name="image">
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
                if(isset($_FILES['image']['name']))
                {
                 $image=$_FILES['image']['name'];
                 if($image!='')
                 {
                    $ext = end(explode('.',$image));
                    $image="food-name_".rand(0000,9999).".". $ext;
                    $src = $_FILES['image']['tmp_name'];
                    $dst="../images/photos/". $image;
                    $upload =move_uploaded_file($src,$dst);
                    if($upload==false)
                    {
                        $_SESSION['upload'] = "<div class='error'>Failed to Upload Image</div>";
                        echo "<script>window.location.href = \"manage-photos.php\"</script>";
                        die();
                    }
                 }
                }
                else{
                    //defult
                    $image='';
                }
                //2.sql
                $sql2="INSERT INTO `tbl_photos`( `tittle`, `images`) 
                VALUES ('$title','$image')
                ";
                $res2=mysqli_query($conn,$sql2);
                if($res2)
                {
                    //DATA INSETED SUC
                    $_SESSION['upload']="<div class='success'>Photo is Added</div>";
                    echo "<script>window.location.href = \"manage-photos.php\"</script>";
                }
                else
                {
                    //failed
                    $_SESSION['upload']="<div class='error'>Failed to Add Food</div>";
                    echo "<script>window.location.href = \"manage-photos.php\"</script>";
                }
            }
        ?>
    </div>
</div>
<?php include('partials/footer.php') ;?>