<?php include('partials-font/menu.php') ?>

<head>
    <title>Home Page☺</title>
</head>
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="food-search.php" method="POST">
            <input type="search" name="search" placeholder="...חיפוש" required>
            <input type="submit" name="submit" value="חיפוש" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->
<?php
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
            
        }


        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
            
        }


    ?>
<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">תפריטים</h2>
        <?php 
        $sql="SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
        $res= mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res);
        if($count>0)
        {
            while($row=mysqli_fetch_assoc($res))
            {
                $id=$row['id'];
                $title=$row['title'];
                $image=$row['image_name'];

                ?>
        <a href="category-foods.php?category_id=<?php echo $id;?>">
            <div class="box-3 float-container">
                <?php if($image!='')
                {
                ?>
                <img src="images/category/<?php echo $image; ?>" alt="Pizza" class="img-responsive img-curve">
                <?php
                }
                else
                {
                    echo "<div class='error'>no image</div>";
                }
                ?>


                <h3 class="text-center text-black"><?php echo $title ; ?></h3>
            </div>
        </a>
        <?php
         

            }
        }
        else
        {
            echo "<div class='error'>No Category</div>";
        }
        ?>


        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">המיוחדים שלנו</h2>
        <?php
        $sql2="SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";
        $res2= mysqli_query($conn,$sql2);
        $count=mysqli_num_rows($res2);
        if($count>0)
        {
            while($row=mysqli_fetch_assoc($res2))
            { $category_id=$row['category_id'];
                $id=$row['id'];
                $title=$row['tittle'];
                $price=$row['price'];
                $description = $row['description'];
                $image=$row['image'];
                ?>
        <div class="food-menu-box">
            <div class="food-menu-img">
                <?php 
                    if($image!='')
                    {
                        ?>
                <img src="images/food/<?php echo $image ;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                <?php
                    }
                    else 
                    {
                        echo "<div class='error'>IMAGE not Available</div>";
                    }
                ?>
            </div>
            <div class="food-menu-desc">
                <h4><?php echo $title ;?></h4>
                <p class="food-price">₪
                    <?php echo $price; ?></p>
                <p class="food-detail">
                    <?php echo $description ; ?>
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
            echo "<div class='error'>Food is Not AVAILABLE</div>";
        }        
        ?>

        <div class="clearfix"></div>
    </div>

    <p class="text-center">
        <a href="foods.php">...כל האוכל</a>
    </p>
</section>
<!-- fOOD Menu Section Ends Here -->
<?php include('partials-font/footer.php') ?>