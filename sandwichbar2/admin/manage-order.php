<?php include('partials/menu.php') ?>
<!---- Main Content Section Starts-->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order </h1>

        <br /><br /><br />
        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Date</th>
                <th>Floor</th>
                <th>Phone</th>
                <th>Credit Card</th>
                <th>Expired</th>
                <th>Cvv</th>
                <th>Total</th>
                <th>Actions</th>

            </tr>
            <?php
                $sql="SELECT * FROM tbl_payment";
                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);
                if($count>0)
                {$x=1;
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $title = $row['name'];
                        $email=$row['email'];
                        $address=$row['address'];
                        $date=$row['date'];
                        $floor=$row['floors'];
                        $phone=$row['phone'];
                        $credit=$row['credit_n'];
                        $expired=$row['expy'];
                        $cvv=$row['cvv'];
                        $total=$row['total']
                        ?>
            <tr>
                <td class="border"><?php echo $x++;?></td>
                <td class="border"><?php echo $title;?></td>
                <td class="border"><?php echo $email;?></td>
                <td class="border"><?php echo $address;?></td>
                <td class="border"><?php echo $date;?></td>
                <td class="border"><?php echo $floor;?></td>
                <td class="border"><?php echo $phone;?></td>
                <td class="border"><?php echo $credit;?></td>
                <td class="border"><?php echo $expired;?></td>
                <td class="border"><?php echo $cvv;?></td>
                <td class="border">₪<?php echo $total;?></td>
                <td>
                    <a href="#" class="btn-primary">Update</a>
                </td>
            </tr>
            <?php
                    }
                }
            
            
            ?>

        </table>
    </div>

</div>
<!---- Main Content Section  Ends-->
<?php include('partials/footer.php');?>