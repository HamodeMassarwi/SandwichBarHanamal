<?php include('partials-font/menu.php') ?>
<?php 
    if(isset($_GET['food_id']))
    {
        $food_id =$_GET['food_id'];
        $sql="SELECT * FROM tbl_food WHERE id='$food_id'";
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        if($count==1)
        {
            $row=mysqli_fetch_assoc($res);
            $title = $row['tittle'];
            $price = $row['price'];
            $image = $row['image'];
            
        }else{
            echo "<script>window.location.href = \"index.php\"</script>";
        }
    }
    else
    {   
        echo "<script>window.location.href = \"index.php\"</script>";
    }
?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

        <form action="" method="POST" class="order">
            <fieldset>
                <legend>Selected Food</legend>

                <div class="food-menu-img">
                    <?php 
                    if($image!=''){
                        ?>
                    <img src="images/food/<?php echo $image ;?>" alt="Chicke Hawain Pizza"
                        class="img-responsive img-curve">
                    <?php
                    }
                    else
                    {
                        echo "<div class='error' >No IMAGE </div>";
                    }?>
                </div>

                <div class="food-menu-desc">
                    <h3><?php echo $title;?></h3>
                    <input type="hidden" name="food" value="<?php echo $title;?>">

                    <p class="food-price">₪<?php echo $price ; ?></p>
                    <input type="hidden" name="price" value="<?php echo $price;?>">

                    <div class="order-label">Quantity</div>
                    <input type="number" name="qty" class="input-responsive" value="1" required>

                </div>

            </fieldset>

            <fieldset>
                <legend>Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="name" placeholder="Enter FullName" class="input-responsive" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="Enter PhoneNumber" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="Enter Email" class="input-responsive" required>

                <div class="order-label">Address</div>
                <textarea name="address" rows="10" placeholder="Enter Address" class="input-responsive"
                    required></textarea>

                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
            </fieldset>

        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->
<?php include('partials-font/footer.php') ?>
<?php
    if(isset($_POST['submit']))
    {  
        $title = $_POST['food'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $name= $_POST['name'];
        $phone= $_POST['contact'];
        $email= $_POST['email'];
        $address= $_POST['address'];
        $total= $price*$qty;
        $order_date = date('Y-m-d H:i:s');
        $status="Ordered";// ordered,delivery or delivered ,cancelled;
        $sql2="INSERT INTO tbl_order SET
            food='$title',
            price=$price,
            qty=$qty,
            total=$total,
            order_date='$order_date',
            status='$status',
            customer_name='$name',
            customer_contact='$phone',
            customer_email='$email',
            customer_address='$address'
        ";
        
        $res2 = mysqli_query($conn,$sql2);
        if($res2)
        {
            //successfully INSERTED
            $_SESSION['order']="<div class='success text-center'>Order Sent Successfully</div>";
            echo "<script>window.location.href = \"index.php\"</script>";
        }
        else
        {
            $_SESSION['order']= "<div class='error text-center'>Failed to Sent Order</div>";
            echo "<script>window.location.href = \"index.php\"</script>";
        }
    }



?>