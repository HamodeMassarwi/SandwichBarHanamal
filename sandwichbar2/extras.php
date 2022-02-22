<?php include('partials-font/menu.php'); ?>
<style>
.latters {
    font-size: 22px;
    color: black
}

.tomatoOn {
    width: 100px;
    height: 100px;
    background: url('images/extras/tomato1.png') no-repeat;
    margin: auto;
}

.lettuceOn {
    width: 100px;
    height: 100px;
    background: url('images/extras/lettuce.png') no-repeat;
    margin: auto;
}

.onionOn {
    width: 100px;
    height: 100px;
    background: url('images/extras/onion.png') no-repeat;
    margin: auto;
}

.kolsloOn {
    width: 100px;
    height: 100px;
    background: url('images/extras/kolslo.png') no-repeat;
    margin: auto;
}

.onionOff {
    width: 100px;
    height: 100px;
    background: url('images/extras/onion.jpg') no-repeat;
    margin: auto;

}
</style>
<section class="food-searchs">
    <div class="container">

        <h2 class="text-center text-white">☺:תבחר את התוספות </h2>

        <form action="" method="post" class="order">
            <fieldset>
                <legend style="font-size: 22px; color:yellow;">הכריך שבחרתה</legend>
                <?php 
                $cate_id = $_GET['cate_id'];
                $id = $_GET['food_id'];
                $sql = "SELECT * FROM tbl_food WHERE id=$id";
                $res = mysqli_query($conn , $sql);
                if($res)
                {
                    $row = mysqli_fetch_assoc($res);
                    $title = $row['tittle'];
                    $price = $row['price'];
                    $image = $row['image'];
                }
                //if it is a drink we dont need extras .
                if($cate_id==24)
                {   $sql3 = "SELECT * FROM tbl_drink WHERE title='$title'";
                    $res3 = mysqli_query($conn , $sql3);
                    $count = mysqli_num_rows($res3);
                    if($count>0)
                    ///if we have it so qty ++;
                    {   $row = mysqli_fetch_assoc($res3);
                        $qty = $row['qty'];
                        $qty++;
                        $sql4 ="UPDATE tbl_drink SET
                        qty='$qty'
                        WHERE title='$title'";
                        $res4=mysqli_query($conn,$sql4);
                        $_SESSION['add']="<div class='success text-center'>The Drink Added To Cart</div> ";
                        echo "<script>window.location.href = \"index.php\"</script>";
                    }else{
                        //if not insert new row
                    $qty = 1 ;
                    $sql2 = "INSERT INTO tbl_drink SET
                    title='$title',
                    price='$price',
                    image='$image',
                    qty='$qty'
                    ";
                    $res2=mysqli_query($conn,$sql2);
                    $_SESSION['add']="<div class='success text-center'>The Drink Added To Cart</div> ";
                    echo "<script>window.location.href = \"foods.php\"</script>";
                    }
                }
    ?>


                <div class="food-menu-img">
                    <img src="images/food/<?php echo $image ; ?>" alt="<?php echo $title ;?>"
                        class="img-responsive img-curve">
                </div>
                <div class="food-menu-desc">
                    <h3><?php echo $title ;?></h3>
                    <p class="food-price">₪<?php echo $price ; ?></p>
                    <div class="order-label">Quantity</div>
                    <input type="number" name="qty" style="padding:2px; width: 60px;" class="input-responsive" value="1"
                        required>
                </div>
            </fieldset>


            <fieldset>
                <legend style="font-size: 22px; color:yellow;">תוספות</legend>
                <div class="order-label text-center latters">בצל

                    <center>
                        <input type="radio"
                            onclick="document.getElementById('onionpic').src='images/extras/onionok.png'" name="onion"
                            value="Yes">לא
                        <input type="radio" onclick="document.getElementById('onionpic').src='images/extras/onion.png'"
                            name="onion" value="No"> כן
                        <br>
                        <img src="images/extras/onion.png" id="onionpic">
                    </center>

                    <div class="order-label text-center latters">חסה

                        <center>
                            <input onclick="document.getElementById('lettuce').src='images/extras/lettuceok.png'"
                                type="radio" name="lettuce" value="Yes">לא
                            <input onclick="document.getElementById('lettuce').src='images/extras/lettuce.png'"
                                type="radio" name="lettuce" value="No"> כן
                            <br>
                            <img src="images/extras/lettuce.png" id="lettuce">
                        </center>
                    </div>

                    <div class="order-label text-center latters">
                        עגבניה
                        <center>
                            <input onclick="document.getElementById('tomato').src='images/extras/tomatook.png'"
                                type="radio" id="tomato" name="tomato" onclick="tomato()" value="Yes">לא
                            <input onclick="document.getElementById('tomato').src='images/extras/tomato1.png'"
                                type="radio" name="tomato" value="No"> כן
                            <br>
                            <img src="images/extras/tomato1.png" id="tomato">
                        </center>

                    </div>
                    <div class="order-label text-center latters">
                        קולסלו
                        <center><input onclick="document.getElementById('kolslo').src='images/extras/kolslook.png'"
                                type="radio" name="kolslo" value="Yes">לא
                            <input onclick="document.getElementById('kolslo').src='images/extras/kolslo.png'"
                                type="radio" name="kolslo" value="No"> כן
                            <br>
                            <img src="images/extras/kolslo.png" id="kolslo">
                        </center>
                    </div>
                    <div class="order-label text-center latters">שום
                        שמיר
                        <center><input onclick="document.getElementById('garlic').src='images/extras/garlicok.png'"
                                type="radio" name="garlic" value="Yes">לא
                            <input onclick="document.getElementById('garlic').src='images/extras/garlic.png'"
                                type="radio" name="garlic" value="No"> כן
                            <br>
                            <img src="images/extras/garlic.png" id="garlic">
                        </center>
                    </div>
                    <div class="order-label text-center latters">פסטו

                        <center><input onclick="document.getElementById('pesto').src='images/extras/pestook.png'"
                                type="radio" name="pesto" value="Yes">לא
                            <input onclick="document.getElementById('pesto').src='images/extras/pesto.png'" type="radio"
                                name="pesto" value="No"> כן
                            <br>
                            <img src="images/extras/pesto.png" id="pesto">
                        </center>
                    </div>
                    <div class="order-label text-center latters">חריף

                        <center><input onclick="document.getElementById('spicy').src='images/extras/spicyok.png'" v
                                type="radio" name="spicy" value="Yes">לא
                            <input onclick="document.getElementById('spicy').src='images/extras/spicy.png'" type="radio"
                                name="spicy" value="No"> כן
                            <br>
                            <img src="images/extras/spicy.png" id="spicy">
                        </center>
                    </div>
                    <div class="order-label text-center latters">גבינה

                        <center><input onclick="document.getElementById('cheddar').src='images/extras/cheddarok.png'"
                                type="radio" name="cheese" value="Yes">לא
                            <input onclick="document.getElementById('cheddar').src='images/extras/cheddar.png'"
                                type="radio" name="cheese" value="No"> כן
                            <br>
                            <img src="images/extras/cheddar.png" id="cheddar">
                        </center>
                    </div>
                    <div class="order-label text-center latters">אלי
                        פאיים
                        <center><input onclick="document.getElementById('mayochup').src='images/extras/mayochupok.png'"
                                type="radio" name="goey" value="Yes">לא
                            <input onclick="document.getElementById('mayochup').src='images/extras/mayochup.png'"
                                type="radio" name="goey" value="No"> כן
                            <br>
                            <img src="images/extras/mayochup.png" id="mayochup">
                        </center>
                    </div>
                    <div class="order-label text-center latters">
                        קיטשוף
                        <center><input onclick="document.getElementById('ketchup').src='images/extras/ketchupok.png'"
                                type="radio" name="ketchup" value="Yes">לא
                            <input onclick="document.getElementById('ketchup').src='images/extras/ketchup.png'"
                                type="radio" name="ketchup" value="No"> כן
                            <br>
                            <img src="images/extras/ketchup.png" id="ketchup">
                    </div>
                    </center>




                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
            </fieldset>

        </form>
        <script>
        function onionOn() {
            var checkbox = decoment.getElementById("onionOn");

            var div = decoment.getElementById("onionpic");
            if (checkbox.checked = true) {
                div.class.onionOn = "onionOff";
            } else {
                div.class = "onionOn";
            }
        }
        </script>
        <?php 
        if(isset($_POST['submit']))
        {
            if(isset($_POST['onion']))
            {
                $onion = $_POST['onion'];
            }
            else
            {
                $onion = 'No' ;
            }
            if(isset($_POST['lettuce']))
            {
                $lettuce = $_POST['lettuce'];
            }
            else
            {
                $lettuce = 'No' ;
            }
            if(isset($_POST['cheese']))
            {
                $cheese = $_POST['cheese'];
            }
            else
            {
                $cheese = 'No' ;
            }
            if(isset($_POST['tomato']))
            {
                $tomato = $_POST['tomato'];
            }
            else
            {
                $tomato = 'No' ;
            }
            if(isset($_POST['kolslo']))
            {
                $kolslo = $_POST['kolslo'];
            }
            else
            {
                $kolslo = 'No' ;
            }
            if(isset($_POST['garlic']))
            {
                $garlic = $_POST['garlic'];
            }
            else
            {
                $garlic = 'No' ;
            }
            if(isset($_POST['pesto']))
            {
                $pesto = $_POST['pesto'];
            }
            else
            {
                $pesto = 'No' ;
            }
            if(isset($_POST['spicy']))
            {
                $spicy = $_POST['spicy'];
            }
            else
            {
                $spicy = 'No' ;
            }
            if(isset($_POST['goey']))
            {
                $goey = $_POST['goey'];
            }
            else
            {
                $goey = 'No' ;
            }
            if(isset($_POST['ketchup']))
            {
                $ketchup = $_POST['ketchup'];
            }
            else
            {
                $ketchup = 'No' ;
            }
            $qty = $_POST['qty'];
               //if we have this food in the table just qty++
               $sql5 = "SELECT * FROM tbl_extra WHERE 
                title='$title' AND
                onion='$onion' AND
                tomato='$tomato'AND
                lettuce='$lettuce'AND
                cheese='$cheese'AND
                kolslo='$kolslo'AND
                garlic='$garlic'AND
                pesto='$pesto'AND
                spicy='$spicy'AND
                goey='$goey'AND
                ketchup='$ketchup'";
               $res5 = mysqli_query($conn , $sql5);
               $count1 = mysqli_num_rows($res5);
               if($count1>0)
               ///if we have it so qty ++;
               {   $row = mysqli_fetch_assoc($res5);
                   $qty = $row['qty'];
                   $qty++;
                   $sql6 ="UPDATE tbl_extra SET
                   qty='$qty'
                   WHERE title='$title'";
                   $res6=mysqli_query($conn,$sql6);
                   echo "<script>window.location.href = \"index.php\"</script>";
               }else {
            $sql1 = "INSERT INTO tbl_extra SET
            title='$title',
            price='$price',
            image='$image',
            qty='$qty',
            onion='$onion',
            tomato='$tomato',
            lettuce='$lettuce',
            cheese='$cheese',
            kolslo='$kolslo',
            garlic='$garlic',
            pesto='$pesto',
            spicy='$spicy',
            goey='$goey',
            ketchup='$ketchup'
            ";
            $res1 = mysqli_query($conn,$sql1);
            $_SESSION['add']="<div class='success text-center'>The Food Added To Cart</div> ";
            echo "<script>window.location.href = \"foods.php\"</script>";
            }

        }        
        ?>


    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->




<?php include('partials-font/footer.php'); ?>