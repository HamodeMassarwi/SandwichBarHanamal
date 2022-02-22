<?php
include('../Config/Connection.php');
if(isset($_GET['id']) && isset($_GET['image_name']))
{
//echo procces is done
    $id = $_GET['id'];
    $image = $_GET['image_name'];
    if($image!='')
    {
        $path="../images/food/". $image;
        $remove=unlink($path);
        if($remove==false){

            $_SESSION['add'] = "<div class='error'>Failed to Remove IMAGE</div>";
            echo "<script>window.location.href = \"manage-food.php\"</script>";
            die();
        }
    }

    $sql="DELETE FROM tbl_food WHERE id=$id";
    $res=mysqli_query($conn,$sql);  
    if($res)
    {
    $_SESSION['add'] = "<div class='success'>The Food Delete Successfully</div>";
    echo "<script>window.location.href = \"manage-food.php\"</script>";
    }else{
    $_SESSION['add'] = "<div class='error'>Execute is Not Executing</div>";
    echo "<script>window.location.href = \"manage-food.php\"</script>";
    }
}
else
{
    //procces is no done 
    $_SESSION['add'] = "<div class='error'>The ID is not found</div>";
    echo "<script>window.location.href = \"manage-food.php\"</script>";
}
?>
<?php include('partials/footer.php') ?>