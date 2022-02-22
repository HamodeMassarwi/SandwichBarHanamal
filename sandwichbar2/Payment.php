<?php include('partials-font/menu_pay.php') ?>
<?php 
  $total = $_GET['total'];
  $items= $_GET['items'];

?>
<br>
<h2 style="padding: 2px;">Make a Payment</h2>
<?php
    if(isset($_SESSION['enter']))
    {
        echo $_SESSION['enter'];
        unset($_SESSION['enter']);   
    }
?>
<div class="row">
    <div class="col-75">
        <div class="container">
            <form action="" method="POST" target="_self">
                <!--Form-->
                <div class="row">
                    <div class="col-50">
                        <h3>Billing Address</h3>
                        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                        <input type="text" id="fname" name="name" placeholder="Mira Garcia" require>
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input type="text" id="email" name="email" placeholder="abc@example.com" require>
                        <label for="adr"><i class="fas fa-home"></i> Address</label>
                        <input type="text" id="adr" name="address" placeholder="600 W. 15th Street" require>

                        <div class="row">
                            <div class="col-50">
                                <label for="state">Number</label>
                                <input type="text" id="state" name="number" placeholder="+972" require>
                            </div>
                            <div class="col-50">
                                <label for="zip">Floor</label>
                                <input type="text" id="zip" name="floors" placeholder="4">
                            </div>
                        </div>
                    </div>

                    <div class="col-50">
                        <h3>Payment</h3>
                        <label for="fname">Accepted Cards</label>
                        <div class="icon-container">
                            <i class="fab fa-cc-visa" style="color:navy;"></i>
                            <i class="fab fa-cc-amex" style="color:blue;"></i>
                            <i class="fab fa-cc-mastercard" style="color:red;"></i>
                            <i class="fab fa-cc-discover" style="color:orange;"></i>
                            <i class="fab fa-cc-apple-pay"></i>
                        </div>
                        <label for="ccnum">Credit card number</label>
                        <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" require>
                        <label for="expmonth">Exp Month</label>
                        <input type="text" id="expmonth" name="expmonth" placeholder="02" require>
                        <div class="row">
                            <div class="col-50">
                                <label for="expyear">Exp Year</label>
                                <input type="text" id="expyear" name="expyear" placeholder="2018" require>
                            </div>
                            <div class="col-50">
                                <label for="cvv">CVV</label>
                                <input type="text" id="cvv" name="cvv" placeholder="548" require>
                            </div>
                        </div>
                    </div>

                </div>
                <label>
                    <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                </label>
                <input type="submit" name="submit" value="Continue to checkout" class="btn">
                <input type="submit" name="back" value="Continue Shopping" class="btn">
            </form>
        </div>
    </div>
    <div class="col-25">
        <div class="container">
            <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i>
                    <b><?php echo $items;?></b></span></h4>
            <?php 
            $sql = "SELECT * FROM tbl_extra";
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            if($count>0)
            {$counter = 1;
              while($row=mysqli_fetch_assoc($res))
              {
                $title=$row['title'];
                $price = $row['price'];
                $qty=$row['qty'];
                ?>
            <p><?php echo $title; ?> <span class="price">₪<?php echo $qty*$price;?></span></p>
            <?php
              }
            }
            $sql = "SELECT * FROM tbl_drink";
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            if($count>0)
            {$counter = 1;
              while($row=mysqli_fetch_assoc($res))
              {
                $title=$row['title'];
                $price = $row['price'];
                $qty=$row['qty'];
                ?>
            <p><?php echo $title; ?> <span class="price">₪<?php echo $qty*$price;?></span></p>
            <?php
              }
            }
          ?>


            <hr>
            <p>Total <span class="price" style="color:black"><b>₪<?php echo $total ?></b></span></p>
        </div>
    </div>
</div>

</body>
<?php
    if(isset($_POST['back']))
    {
        echo "<script>window.location.href = \"index.php\"</script>";
    }
    if(isset($_POST['submit']))
    {
        if($_POST['name'] == '')
        {
            echo '<script>alert("Enter Your Name")</script>';
            die();
        }
        if($_POST['email'] == '')
        {
            echo '<script>alert("Enter Your Email")</script>';
            die();
        }
        if($_POST['address'] == '')
        {
            echo '<script>alert("Enter Your Address")</script>';
            die();
        }
        if($_POST['number'] == '')
        {
            echo '<script>alert("Enter Your Phone Number")</script>';
            die();
        }
        if($_POST['cardnumber'] == '')
        {
            echo '<script>alert("Enter Your Credit Card Number")</script>';
            die();
        }
        if($_POST['expmonth'] == '')
        {
            echo '<script>alert("Enter Your exp month")</script>';
            die();
        }
        if($_POST['expyear'] == '')
        {
            echo '<script>alert("Enter Your exp year")</script>';
            die();
        }
        if($_POST['cvv'] == '')
        {
            echo '<script>alert("Enter Your cvv")</script>';
            die();
        }
      $name=$_POST['name'];
      $email=$_POST['email'];
      $address=$_POST['address'];
      $number=$_POST['number'];
      $floors=$_POST['floors'];
      $cardnumber=$_POST['cardnumber'];
      $exp=$_POST['expmonth'] .'/'. $_POST['expyear'];
      $cvv=$_POST['cvv'];
      date_default_timezone_set('asia/jerusalem');
      $order_date = date("Y-m-d H:i:s");  
      $sql1="INSERT INTO tbl_payment SET
        name='$name',
        email='$email',
        address='$address',
        floors='$floors',
        phone='$number',
        date='$order_date',
        credit_n='$cardnumber',
        expy='$exp',
        cvv='$cvv',
        total='$total'
      ";
      $res1=mysqli_query($conn,$sql1);
      //echo $sql1 ; die();


      //massege the food
        $sql3="SELECT * FROM tbl_extra";
        $msg2=$name ." ".$address ." ".$number ."\n";
        if($res1)
        {
        
            $res3=mysqli_query($conn,$sql3);
            $count1=mysqli_num_rows($res3);
            if($res3){
            $total=1;
            while($row=mysqli_fetch_assoc($res3))
            {   $extra = '';
                $title=$row['title'];
                $price=$row['price'];
                $qty =$row['qty'];
                $total+=$row['qty']*$price;
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
                $msg2=$msg2 ." ". $qty . " " . $title . " " . $extra .  "\n";
            }
            
        }
          // also massege the drink
             $sql10="SELECT * FROM tbl_drink";
                $res10=mysqli_query($conn,$sql10);
                $count1=mysqli_num_rows($res10);
            if($res10){
                    while($row=mysqli_fetch_assoc($res10))
                    {
                        $title=$row['title'];
                        $price=$row['price'];
                        $qty =$row['qty'];
                        $total+=$row['qty']*$price;
                        $msg2=$msg2 ." ". $qty . " " . $title . "\n";
                    }
          $msg2=$msg2 .'Total Price : ' . $total ;
          $msg = $msg2;
          $msg = wordwrap($msg,700);

          // send email
          mail("hamodemassarwi50@gmail.com","ORDER",$msg);
        }
        
 
        
        $sql2="DELETE FROM tbl_extra";
        $res2=mysqli_query($conn,$sql2);
        $sql2="DELETE FROM tbl_drink";
        $res2=mysqli_query($conn,$sql2);
        $_SESSION['add']='<div class="success text-center">Payment Sent Successfully We Will Call You</div>';
        echo "<script>window.location.href = \"index.php\"</script>";
      }
    }
    
?>


</html>