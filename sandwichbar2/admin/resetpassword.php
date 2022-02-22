<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400|Roboto+Mono&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="emailcss/fonts/icomoon/style.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="emailcss/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="emailcss/css/style.css">

    <title>ResetPass</title>
</head>

<body>


    <div class="content">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="row mb-5">
                        <div class="col-md-4 mr-auto">
                            <h3 class="thin-heading mb-4">PASSWORD BACK</h3>
                            <p>Enter Your Email. And We Will Send You The Password</p>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <h3 class="thin-heading mb-4">OR Contact US</h3>
                            <p>T:0529523393 <br>E:HamodeMassarwi50@gmail.com</p>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-12">

                            <h3 class="thin-heading mb-4">Reset Pass</h3>

                            <form class="mb-5" action="resetPass2.php" method="get">
                                <div class="row">

                                    <div class="col-md-6 form-group">
                                        <input type="text" class="form-control" name="adminEmail" id="email"
                                            placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="submit" name="submit" value="Send Message"
                                            class="btn btn-primary rounded-0 py-2 px-4">
                                        <span class="submitting"></span>
                                    </div>
                                </div>
                            </form>

                            <div id="form-message-warning mt-4"></div>
                            <div id="form-message-success">
                                Your message was sent, thank you!
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <script src="emailcss/js/jquery-3.3.1.min.js"></script>
    <script src="emailcss/js/popper.min.js"></script>
    <script src="emailcss/js/bootstrap.min.js"></script>
    <script src="emailcss/js/jquery.validate.min.js"></script>
    <script src="emailcss/js/main.js"></script>

</body>

</html>
<?php
include "../Config/Connection.php";

if(isset($_POST["submit"]))
 {
@$_SESSION['adminEmail'] = $email;
 }
 ?>