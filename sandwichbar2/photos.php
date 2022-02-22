<?php include('partials-font/menu-about.php') ?>

<div class="w3-container">
    <h2 style="text-align: right !important;">:תמונות</h2>
    <p style="text-align: right !important;"></p>
</div>

<div class="w3-content w3-display-container">
    <?php 
    $sql = "SELECT * FROM tbl_photos";
    $res = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($res);
    if($count>0)
    {
        while($row=mysqli_fetch_assoc($res)){
        $title = $row['tittle'];
        $image = $row['images'];
        ?>
    <div class="w3-display-container mySlides">
        <img src="images/photos/<?php echo $image;?>" style="width:100%; height:725px;">
        <div class="w3-display-topright w3-large w3-container w3-padding-16 w3-black">
            <?php echo $title;?>
        </div>
    </div>
    <?php
        }
    }


?>

    <button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
    <button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>

</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
    showDivs(slideIndex += n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = x.length
    }
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    x[slideIndex - 1].style.display = "block";
}
</script>

<?php include('partials-font/footer.php') ?>