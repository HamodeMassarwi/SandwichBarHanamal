<?php include('partials-font/menu.php') ?>

<head>
    <title>Categories☺</title>
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


                <h3 class="float-text text-black"><?php echo $title ; ?></h3>
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


<?php include('partials-font/footer.php') ?>