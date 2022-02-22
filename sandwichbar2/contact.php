<?php include ('Config/Connection.php');?>

<head>
    <title>Contact Page☺</title>
    <link rel="icon" href="images/true.png" type="image/x-icon">
</head>
<!doctype html>
<html lang="en">

<head>
    <title>Contact US</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="contact/css/style.css">
    <!--------------------------------------------BUTTON--------------------------------------------->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="login/adminPHP/fonts/icomoon/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="login/adminPHP/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="login/adminPHP/css/style.css">
    <link rel="icon" href="true.jpeg" type="image/x-icon">

</head>

<body>
    <section class=" ftco-section img bg-hero" style="background-image: url(images/bg_1.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Contact Us</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <div class="wrapper">
                        <div class="row no-gutters justify-content-between">
                            <div class="col-lg-6 d-flex align-items-stretch">
                                <div class="info-wrap w-100 p-5">
                                    <h3 class="mb-4">Contact us</h3>
                                    <div class="dbox w-100 d-flex align-items-start">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-map-marker"></span>
                                        </div>
                                        <div class="text pl-4">
                                            <p><span>כתובת: </span> משה אהרון 11
                                            </p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-start">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-phone"></span>
                                        </div>
                                        <div class="text pl-4">
                                            <p><span>טלפון: </span> <a href="tel://1234567920">0529523393</a></p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-start">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-paper-plane"></span>
                                        </div>
                                        <div class="text pl-4">
                                            <p><span>אימייל: </span> <a
                                                    href="mailto:info@yoursite.com">SandwichBarHnamal@gmail.co.il</a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="dbox w-100 d-flex align-items-start">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-globe"></span>
                                        </div>

                                        <div class="text pl-4">
                                            <p><span>instagram : </span> <a
                                                    href="https://www.instagram.com/sandwich.bar.hnamal/">SandwichBarHnamal</a>
                                            </p>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="contact-wrap w-100 p-md-5 p-4">
                                    <h3 class="mb-4">Get in touch</h3>

                                    <form method="post" action="contact.php">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="name" id="name"
                                                        placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" name="email" id="email"
                                                        placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="subject" id="subject"
                                                        placeholder="Subject">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea name="message" class="form-control" id="message" cols="30"
                                                        rows="5" placeholder="Message"></textarea>
                                                </div>
                                            </div>



                                            <input type="submit" name="submit" value="Send Message"
                                                class="btn btn-primary">

                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <center>
            <div><button onclick="location.href='index.php'"
                    class="btn mb-3 mr-3 btn-primary btn-lg"><span>BACK</span></button></div>
        </center>

        </div>
    </section>

    <script src=" contact/js/jquery.min.js"></script>
    <script src="contact/js/popper.js"></script>
    <script src="contact/js/bootstrap.min.js"></script>
    <script src="contact/js/jquery.validate.min.js"></script>
    <script src="contact/js/main.js"></script>
    <script src="login/adminPHP/js/jquery-3.3.1.min.js"></script>
    <script src="login/adminPHP/js/popper.min.js"></script>
    <script src="login/adminPHP/js/bootstrap.min.js"></script>
    <script src="login/adminPHP/js/main.js"></script>

</body>

</html>
<?php 
if(isset($_POST['submit']))
{
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
// the message
$msg = "His Name is :" . $name . "\nHis Email is :" . $email."\n" . $message;

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("hamodemassarwi50@gmail.com",$subject,$msg);
echo "<h1 style=\" position: absolute;top: 50px; background-color: #4D4E5C; color: silver;\">The Email is Sent</h1> ";
}
?>