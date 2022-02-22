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


    li {
        display: inline-block;
    }

    li a {
        text-decoration: none;
        color: black;
        padding: 5px 20px;
        transition: 1.9s ease;
        border: 1px solid transparent;
    }

    li a:hover {
        background-color: black;
        color: white;

    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    body {
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: url(images/bg.jpg);
        background-size: fixed;
    }

    .container {
        width: auto;
        height: 480px;
        display: flex;
        background: rgb(238, 236, 236);
    }

    .container .videos {
        width: 20%;
        padding: 10px 0 10px 10px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .container .videos video {
        width: 95%;
        height: 100px;
        margin: 10px;
        object-fit: cover;
        cursor: pointer;
        transition: 0.2s;
    }

    .container .videos video:nth-child(1) {
        margin-top: 0;
    }

    .container .videos video:hover,
    .container .videos .active {
        transform: scale(1.06);
        border: 3px solid blue;
    }

    .container .main-video {
        width: 500px;
        height: fixed;
        padding: 10px;
    }

    .container .main-video video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border: 3px solid blue;
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