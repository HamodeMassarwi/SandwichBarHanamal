<?php
//check if he is login in
if(!isset($_SESSION['user']))
{
    //if the use is not set
    $_SESSION['no-login'] = "<div class='error text-center'>Please Login To Access</div>";
    echo "<script>window.location.href = \"login.php\"</script>";
}

?>