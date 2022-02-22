<?php include('Config/Connection.php') ?>
<html>

<head>
    <title>Video Gallery</title>
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
    <button style="
     width: 100px;
     font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
     position:absolute;
     bottom:0;
     left:0;
     background-color: #4CAF50;
     border: none;
     color: white;
     padding: 15px 32px;
     text-align: center;
     text-decoration: none;
     display: inline-block;
     font-size: 16px;
     margin: 4px 2px;
     cursor: pointer;" onclick="window.history.go(-1);">Back</button>

    <div class="container">
        <div class="videos">
            <?php   
            $sql="SELECT * FROM tbl_video";
            $res = mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {   
                    $video=$row['video'];
                    ?>
            <video class="active" src="videos/<?php echo $video;?>"></video>
            <?php
                }
            }
        
        ?>

        </div>
        <div class="main-video">
            <video src="videos/<?php echo $video ; ?>" muted controls autoplay></video>
        </div>
    </div>

    <!-- jquery cdn link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
    $(document).ready(function() {

        $('.videos video').click(function() {

            $(this).addClass('active').siblings().removeClass('active');

            var src = $(this).attr('src');
            $('.main-video video').attr('src', src);
        });
    });
    </script>
</body>

</html>