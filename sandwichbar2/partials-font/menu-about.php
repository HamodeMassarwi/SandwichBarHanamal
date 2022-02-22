<?php  include('Config/Connection.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/true.png" type="image/x-icon">
    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <style>
    .about-section {
        padding: 50px;
        text-align: center;
        background-color: #141313;
        color: white;
    }

    .ho2 {
        padding: 5px;
        text-align: center;
        background-color: white;
        color: #141313;
    }

    .ho2:hover {
        background-color: #141313;
        color: white;
        transition: 1.9s ease;
        opacity: 0.8;
    }

    .about-section:hover {
        background-color: white;
        color: #141313;
        transition: 1.9s ease;
        opacity: 0.8;
    }

    .mySlides {
        display: none;
    }


    li.sar {
        display: inline-block;
    }

    li.sar a {
        text-decoration: none;
        color: black;
        padding: 5px 1px;
        transition: 1.9s ease;
        border: 1px solid transparent;
    }

    li.sar a:hover {
        background-color: black;
        color: white;

    }
    </style>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="index.php" title="Logo">
                    <img src="images/true.png" style="width: 100px;" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>
            <div class="menu text-right">
                <ul>
                    <li class="sar">
                        <a href="index.php">Home</a>
                    </li>
                    <li class="sar">
                        <a href="about-us.php">About</a>
                    </li>
                    <li class="sar">
                        <a href="photos.php">Photos</a>
                    </li>
                    <li class="sar">
                        <a href="videos.php">Videos</a>
                    </li>
                    <li class="sar">
                        <a href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->