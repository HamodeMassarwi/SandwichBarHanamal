<?php include('partials-font/menu-cart.php') ?>
<?php
        $id = $_GET['food_id'];
        $title=$_GET['title'];
        $sql1="SELECT * FROM tbl_cart WHERE title='$title'";
        $res1=mysqli_query($conn,$sql1);
        $count1=mysqli_num_rows($res1);
        if($count1>0)
        {
          $row=mysqli_fetch_assoc($res1);
            $qty = $row['qty'];
            $qty++;
            $sql3 = "UPDATE tbl_cart SET
            qty=$qty
            WHERE title='$title'
        ";
             $res3=mysqli_query($conn,$sql3);
            if($res3){
                 $_SESSION['add']="<div class='success text-center'>The Food Added To Cart</div> ";
                 echo "<script>window.location.href = \"index.php\"</script>";
            }
        }else{
        $sql="SELECT * FROM tbl_food WHERE id=$id";
        $res=mysqli_query($conn,$sql);
        if($res)
        {
            $row=mysqli_fetch_assoc($res);
            $price = $row['price'];
            $title = $row['tittle'];
            $image = $row['image'];
            $qty = 1;
        }
    
        $sql2 = "INSERT INTO tbl_cart SET
            title='$title',
            price=$price,
            image='$image',
            qty=$qty
        
        ";
        $res2=mysqli_query($conn,$sql2);
        if($res2){
            $_SESSION['add']="<div class='success text-center'>The Food Added To Cart</div> ";
            echo "<script>window.location.href = \"index.php\"</script>";
        }
    }

?>