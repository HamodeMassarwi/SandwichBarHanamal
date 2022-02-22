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
                        <a href="categories.php">Categories</a>
                    </li>
                    <li class="sar">
                        <a href="foods.php">Foods</a>
                    </li>
                    <li class="sar">
                        <a href="shopping-cart2.php">Cart</a>
                    </li>

                    <li class="sar">
                        <a href="about-us.php">About</a>
                    </li>
                    <li class="sar">
                        <a href="admin/login.php">Admin</a>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->