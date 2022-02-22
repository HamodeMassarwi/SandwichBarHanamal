<?php include('partials-font/menu.php') ?>

<head>
    <title>Food Search☺</title>
</head>
<!--get search keyword as a string and put the value in a variable--..--...-->
<?php $search = mysqli_real_escape_string($conn ,$_POST['search']) ; ?>
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">
        <h2>Searching For<a href="#" class="text-black">"<?php echo $search  ; ?>"</a></h2>
    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>
        <?php
            //get search keyword as a string then search for it in the table ...
            //sql query to get every thing on this word
            $sql="SELECT * FROM tbl_food WHERE tittle LIKE '%$search%' OR description LIKE '%$search%'";
            $res = mysqli_query($conn,$sql);
            $count= mysqli_num_rows($res);
            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                { $category_id=$row['category_id'];
                    $id = $row['id'];
                    $title=$row['tittle'];
                    $price=$row['price'];
                    $description=$row['description'];
                    $image=$row['image'];
                    ?>
        <div class="food-menu-box">
            <div class="food-menu-img">
                <?php if($image!=''){
                  ?>
                <img src="images/food/<?php echo $image ; ?>" alt="<?php echo $title;?>"
                    class="img-responsive img-curve">
                <?php
                }else{
                    echo "<div class='error'>The IMAGE is not Available</div>";
                }
                ?>
            </div>
            <div class="food-menu-desc">
                <h4><?php echo $title ; ?></h4>
                <p class="food-price">₪<?php echo $price ; ?></p>
                <p class="food-detail"><?php echo $description ; ?>
                </p>
                <br>

                <a href="extras.php?food_id=<?php echo $id ;?>&title=<?php echo $title ;?>&cate_id=<?php echo $category_id ;?>"
                    class="btn btn-primary">הזמן עכשיו</a>
            </div>
        </div>
        <?php
                }
            }
            else
            {
                echo " <div class='error'>Food is not Available</div>";
            }
        ?>
        <div class="clearfix"></div>
    </div>
</section>
<!-- fOOD Menu Section Ends Here -->
<?php include('partials-font/footer.php') ?>