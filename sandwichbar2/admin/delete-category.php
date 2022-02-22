<?php 
    include('../Config/Connection.php');
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        $id = $_GET['id'];
        $image = $_GET['image_name'];

        if($image!='')
        {
            $path = "../images/category/". $image;
            $remove = unlink($path);
            if($remove==false)
            {
                $_SESSION['remove']="<div class='error'>Failed to Remove Catogory IMAGE</div>";

                echo "<script>window.location.href = \"manage-category.php\"</script>";
                die();
            }
        }
        $sql="DELETE FROM tbl_category WHERE id=$id";
        $res = mysqli_query($conn,$sql);
        if($res)
        {
            $_SESSION['delete'] = "<div class='succes'>The Category is DELETED Successfully☺</div>";
            echo "<script>window.location.href = \"manage-category.php\"</script>";
        }else{
            $_SESSION['delete'] = "<div class='error'>The Category is Failed To DELETE</div>";
        echo "<script>window.location.href = \"manage-category.php\"</script>";
        }
    }
    else
    {
        $_SESSION['delete'] = "<div class='error'>Result is Not working</div>";
        echo "<script>window.location.href = \"manage-category.php\"</script>";
    }

?>