<?php include('partials-font/menu-cart.php') ?>

<head>
    <title>Food Cart☺</title>
</head>

<body>

    <div class="CartContainer">
        <div class="Header">
            <form action="" method="POST">
                <h3 class="Heading">Shopping Cart</h3>
                <input class="red-btn" type="submit" value="Remove All" name="remove-all">
            </form>
        </div>

        <?php
    $sql="SELECT * FROM tbl_extra";
    $res = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($res);
    $total=0; $items=0; 
    if($count>0)
    {   
        while($row=mysqli_fetch_assoc($res))
        {   $price_for_one=1;
            $extra='';
            $idx = $row['id'];
            $title = $row['title'];
            $price = $row['price'];
            $image = $row['image'];
            $qty = $row['qty'];
            if($row['onion']=='Yes')
            {
                $extra = $extra .  'בצל ';
            }
            if($row['lettuce']=='Yes')
            {
                $extra = $extra  . 'חסה ';
            }
            if($row['tomato']=='Yes')
            {
                $extra = $extra  . 'עגבניה ';
            }
            if($row['cheese']=='Yes')
            {
                $extra = $extra  . 'גבינה ';
                $price = $price + 8;
            }
            if($row['kolslo']=='Yes')
            {
                $extra = $extra  . 'קולסלו ';
            }
            if($row['garlic']=='Yes')
            {
                $extra = $extra  . 'שום שמיר ';
            }
            if($row['pesto']=='Yes')
            {
                $extra = $extra .   'פסטו ';
            }
            if($row['spicy']=='Yes')
            {
                $extra = $extra  . 'חריף ';
            }
            if($row['goey']=='Yes')
            {
                $extra = $extra  . 'אלי פאיים ';
            }
            if($row['ketchup']=='Yes')
            {
                $extra = $extra  . 'קיטשוף ';
            }

            ?>

        <div class="Cart-Items pad">
            <div class="image-box">

                <img src="images/food/<?php echo $image ;?>" style="height: 120px;" />
            </div>
            <div class="about">
                <h1 class="title"><?php echo $title ;?></h1>
                <h3 class="subtitle"><?php echo $extra ; ?></h3>
            </div>
            <div class="counter">

                <form action="" method="POST">
                    <div><input type="submit" name="plus" class="btn" value="+"></div>
                    <input type="hidden" name="plus-helper" value="<?php echo $title; ?>">
                </form>
                <div class="count"><?php echo $qty ; ?></div>
                <form action="" method="POST">
                    <div><input type="submit" name="minus" class="btn" value="-"></div>
                    <input type="hidden" name="minus-helper" value="<?php echo $title; ?>">
                </form>
            </div>
            <div class="prices">
                <div class="amount">₪<?php echo $price ;?></div>
                <form action="" method="POST">
                    <div class="save"><u>Save for later</u></div>
                    <div><u><input class="red-btn" name="remove" type="submit" value="Remove"></u></div>
                    <input type="hidden" name="remove-helper" value="<?php echo $idx; ?>">
                </form>
            </div>
        </div>

        <?php
        $price_for_one=$price*$qty;
        $total+=$price_for_one;
        $items+=$qty;
        }
    }
    $sql0="SELECT * FROM tbl_drink ";
    $res0= mysqli_query($conn,$sql0);
    $count0 = mysqli_num_rows($res0);
    if($count0>0)
    {   
        while($row=mysqli_fetch_assoc($res0))
        {   $price_for_one=1;
            $extra= '250ml';
            $idx = $row['id'];
            $title = $row['title'];
            $price = $row['price'];
            $image = $row['image'];
            $qty = $row['qty'];
            ?>

        <div class="Cart-Items pad">
            <div class="image-box">

                <img src="images/food/<?php echo $image ;?>" style="height: 120px;" />
            </div>
            <div class="about">
                <h1 class="title"><?php echo $title ;?></h1>
                <h3 class="subtitle"><?php echo $extra ; ?></h3>
            </div>
            <div class="counter">

                <form action="" method="POST">
                    <div><input type="submit" name="plus1" class="btn" value="+"></div>
                    <input type="hidden" name="plus-helper1" value="<?php echo $title; ?>">
                </form>
                <div class="count"><?php echo $qty ; ?></div>
                <form action="" method="POST">
                    <div><input type="submit" name="minus1" class="btn" value="-"></div>
                    <input type="hidden" name="minus-helper1" value="<?php echo $title; ?>">
                </form>
            </div>
            <div class="prices">
                <div class="amount">₪<?php echo $price ;?></div>
                <form action="" method="POST">
                    <div class="save"><u>Save for later</u></div>
                    <div><u><input class="red-btn" name="remove1" type="submit" value="Remove"></u></div>
                    <input type="hidden" name="remove-helper1" value="<?php echo $idx; ?>">

                </form>
            </div>
        </div>

        <?php
        $price_for_one=$price*$qty;
        $total+=$price_for_one;
        $items+=$qty;
        }
    }


            ?>


        <hr>
        <div class="checkout">
            <div class="total">
                <div>
                    <div class="Subtotal">Sub-Total</div>
                    <div class="items"><?php echo $items;?> items</div>
                </div>
                <div class="total-amount">₪<?php echo $total ; ?></div>
            </div>
            <form action="" method="POST">
                <input type="submit" class="button text-center" name="checkout" value="Checkout">
                <input type="submit" class="button text-center" name="back" value="Back To Shopping">
            </form>
        </div>
    </div>

</body>

</html>
<?php 
//remove food
if(isset($_POST['remove']))
{
    $title=$_POST['remove-helper'];
    $sql1="DELETE FROM tbl_extra WHERE id=$idx";
    $res1=mysqli_query($conn,$sql1);
    if($res1)
    {
        echo "<script>window.location.href = \"shopping-cart2.php\"</script>";
    }
}
if(isset($_POST['remove1']))
{
    $idx=$_POST['remove-helper1'];
    $sql1="DELETE FROM tbl_drink WHERE id=$idx";
    $res1=mysqli_query($conn,$sql1);
    if($res1)
    {
        echo "<script>window.location.href = \"shopping-cart2.php\"</script>";
    }
}


//checkout
if(isset($_POST['checkout']))
{   
    if($items>0){
    echo "<script>window.location.href = \"Payment.php?total=" . $total ."&items=".$items."\"</script>";
    }
    else
    {
        echo "<div class='error text-center'>No Food is Added To Pay</div>";
    }

}
if(isset($_POST['remove-all']))
{
    $sql1="DELETE FROM tbl_drink ";
    $res1=mysqli_query($conn,$sql1);
    if($res1)
    {
        echo "<script>window.location.href = \"shopping-cart2.php\"</script>";
    }
}
if(isset($_POST['remove-all']))
{
    $sql1="DELETE FROM  tbl_extra";
    $res1=mysqli_query($conn,$sql1);
    if($res1)
    {
        echo "<script>window.location.href = \"shopping-cart2.php\"</script>";
    }
}
//back to shopping
if(isset($_POST['back']))
{
   
        echo "<script>window.location.href = \"index.php\"</script>";
}
//plus qty
if(isset($_POST['plus']))
{
    $title=$_POST['plus-helper'];
    
    $sql1="SELECT * FROM tbl_extra WHERE title='$title'";
    $res1=mysqli_query($conn,$sql1);
      $row=mysqli_fetch_assoc($res1);
        $qty = $row['qty'];
        $qty++;
        $sql3 = "UPDATE tbl_extra SET
        qty=$qty
        WHERE title='$title'
    ";
         $res3=mysqli_query($conn,$sql3);
        if($res3){
             echo "<script>window.location.href = \"shopping-cart2.php\"</script>";
        }
    
}
//plus for drink
if(isset($_POST['plus1']))
{
    $title=$_POST['plus-helper1'];
    
    $sql1="SELECT * FROM tbl_drink WHERE title='$title'";
    $res1=mysqli_query($conn,$sql1);
      $row=mysqli_fetch_assoc($res1);
        $qty = $row['qty'];
        $qty++;
        $sql3 = "UPDATE tbl_drink SET
        qty=$qty
        WHERE title='$title'
    ";
         $res3=mysqli_query($conn,$sql3);
        if($res3){
             echo "<script>window.location.href = \"shopping-cart2.php\"</script>";
        }
    
}
//minus qty
if(isset($_POST['minus']))
{
    $title=$_POST['minus-helper'];
    
    $sql1="SELECT * FROM tbl_extra WHERE title='$title'";
    $res1=mysqli_query($conn,$sql1);
      $row=mysqli_fetch_assoc($res1);
        $qty = $row['qty'];
        if($qty>1){
        $qty--;
        $sql3 = "UPDATE tbl_extra SET
        qty=$qty
        WHERE title='$title'
    ";
         $res3=mysqli_query($conn,$sql3);
        if($res3){
             echo "<script>window.location.href = \"shopping-cart2.php\"</script>";
        }
    }
    
}
//minus for drink
if(isset($_POST['minus1']))
{
    $title=$_POST['minus-helper1'];
    
    $sql1="SELECT * FROM tbl_drink WHERE title='$title'";
    $res1=mysqli_query($conn,$sql1);
      $row=mysqli_fetch_assoc($res1);
        $qty = $row['qty'];
        if($qty>1){
        $qty--;
        $sql3 = "UPDATE tbl_drink SET
        qty=$qty
        WHERE title='$title'
    ";
         $res3=mysqli_query($conn,$sql3);
        if($res3){
             echo "<script>window.location.href = \"shopping-cart2.php\"</script>";
        }
    }
    
}

?>