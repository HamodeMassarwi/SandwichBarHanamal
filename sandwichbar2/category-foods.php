<?php include('partials-font/menu.php') ?>

<head>
    <title>Category Menu☺</title>
</head>

<?php
    if(isset($_GET['category_id']))
    {
        $category_id = $_GET['category_id'];
        $sql="SELECT title FROM tbl_category WHERE id=$category_id";
        $res=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($res);
        $category_title = $row['title'];
    }else{
        echo "<script>window.location.href = \"index.php\"</script>";
    }
?>
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <h2>Foods on <a href="#" class="text-black">"<?php echo $category_title ;?>"</a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>
        <?php
            $sql2="SELECT * FROM tbl_food WHERE category_id=$category_id";
            $res2=mysqli_query($conn,$sql2);
            $count2=mysqli_num_rows($res2);
            if($count2>0)
            {
                while($row2=mysqli_fetch_assoc($res2))
                {   
                    $id=$row2['id'];
                    $title=$row2['tittle'];
                    $description=$row2['description'];
                    $price=$row2['price'];
                    $image=$row2['image']; 
                    ?>
        <div class="food-menu-box">
            <div class="food-menu-img">
                <?php if($image!=''){
                    ?>
                <img src="images/food/<?php echo $image;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                <?php
                }
                else
                {
                    echo "<div class='error'>IMAGE is Not Available</div>";
                }
               ?>
            </div>

            <div class="food-menu-desc">
                <h4><?php echo $title ; ?></h4>
                <p class="food-price">₪<?php echo $price;?></p>
                <p class="food-detail">
                    <?php echo $description ;?>
                </p>
                <br>

                <a href="extras.php?food_id=<?php echo $id ;?>&title=<?php echo $title ;?>&cate_id=<?php echo $category_id ;?>"
                    class="btn btn-primary">הזמן עכשיו</a>
            </div>
        </div>
        <?php
                }
            }
            else{
                echo "<div class='error'>No Food is Available</div>";
            }
        ?>




        <div class="clearfix"></div>



    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<?php include('partials-font/footer.php') ?>