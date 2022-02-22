<?php 
include('../Config/Connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<script src="adminPHP/js/jquery-3.3.1.min.js"></script>
<script src="adminPHP/js/popper.min.js"></script>
<script src="adminPHP/js/bootstrap.min.js"></script>
<script src="adminPHP/js/main.js"></script>


<head>



    <title>Login For Admins</title>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="adminPHP/fonts/icomoon/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="adminPHP/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="adminPHP/css/style.css">
    <!--===============================================================================================-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" href="../images/true.png" type="image/x-icon">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg2.jpg');">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="" method="post">
                    <span class="login100-form-logo">
                        <i class="zmdi zmdi-landscape"></i>
                    </span>

                    <span class="login100-form-title p-b-34 p-t-27">
                        Log in
                    </span>
                    <div>
                        <?php 
                        if(isset($_SESSION['login']))
                        {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']); //Removing session massege!
                        }
                        ?>
                        <?php 
                        if(isset($_SESSION['add']))
                        {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']); //Removing session massege!
                        }
                        ?>
                    </div>
                    <div>
                        <?php 
                        if(isset($_SESSION['hacker']))
                        {
                        echo $_SESSION['hacker'];
                        unset($_SESSION['hacker']); //No Letting hackersxxxx!
                        }
                        ?>
                        <?php 
                        if(isset($_SESSION['no-login']))
                        {
                        echo $_SESSION['no-login'];
                        unset($_SESSION['no-login']); //Removing session massege!
                        }
                        ?>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" type="text" name="username" placeholder="Username">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>

                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">
                            Remember Me
                        </label>
                    </div>


                    <div class="container-login100-form-btn">
                        <button class="btn mb-3 mr-3 btn-blue btn-lg" onclick=" location.href='../index.php'">
                            <span style=" font-style: italic;" ">BACK</span></button><br>
                        <input class=" btn mb-3 mr-3 btn-indigo btn-lg" type="submit" name="submit" value="Login">


                    </div>

                    <a class="txt1" href='resetpassword.php'>
                        Forgot Password?
                    </a>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>


</html>
<?php
//Start The Session EveryWhere
//location


if(isset($_POST["submit"])) {
	
	$user = $_POST["username"];
	$pass = md5($_POST["password"]);
    $usert = strpos($user,"'");
    $passt = strpos($pass,"'");
    if($usert>-1)
    {   
        $_SESSION['hacker']= "<div class='error text-center'>Dont Try To Hack !</div>";
        echo "<script>window.location.href = \"login.php\"</script>";
        die();
    }
    if($passt>-1)
    {
        $_SESSION['hacker']= "<div class='error text-center'>Dont Try To Hack !</div>";
        echo "<script>window.location.href = \"login.php\"</script>";
    }
	$sql="SELECT * FROM tbl_admin WHERE username='$user' AND password='$pass'";
	
	$res=mysqli_query($conn,$sql);
	
    $count = mysqli_num_rows($res);

	if($count==1) { // !=0 >0
        //sal kak s kass a 
        $_SESSION['login']="<div class='success' >Login Successful.</div>";
        $_SESSION['user'] = $user;//to check if the use is log in or not.
        //sasapksalsalas sa assa
        echo "<script>window.location.href = \"main.php\"</script>";
      

	
	}else{
        //lslsalaslaslaslas
        $_SESSION['login']="<div class='error text-center' >Login Failed ☺Try Again</div>";
        echo "<script>window.location.href = \"login.php\"</script>";
	}
}
?>