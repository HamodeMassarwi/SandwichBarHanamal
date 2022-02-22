<?php
     include "../Config/Connection.php";
     $email = $_GET['adminEmail'];
     $sql = "SELECT * FROM tbl_admin WHERE email='$email'";
     $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
     while($row = mysqli_fetch_assoc($result)) {
         $n=$row["full_name"] ;
         $id = $row['id'];
          $x = $row["password"] ;
          $y = $row["username"];
      }
// the message
   $msg = "$y Reset Your Password : http://localhost/sandwichbar2/reset-password.php?id=$id";
// use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg,70);

// send email
  mail($email,"Password Massege",$msg);
} else {
    die( "<body style=\" background-color: #4D4E5C; \"><center><h1 style=\" position: absolute;top: 50px; background-color: #4D4E5C; color: silver;\">
    The Email You Entered is Wrong Please Type it Correct</h1>
    <button onclick=\" location.href='resetpassword.php'\" style=\"vertical-align:middle display: inline-block;
    border-radius: 4px;
    background-color: silver;
    border: none;
    color: black;
    font-size: 28px;
    width: 200px;
    transition: all 0.5s;
    cursor: pointer;
    margin: 5px;\">
    <span>Go Back</span></button>
    </center><body>");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sending Password ☺</title>
    <style>
    body {
        background-image: url("images/reset.jpg");
        background-color: #cccccc;
        background-size: cover;
    }

    .button {
        display: inline-block;
        border-radius: 4px;
        background-color: #f4511e;
        border: none;
        color: #FFFFFF;
        text-align: center;
        font-size: 28px;
        padding: 20px;
        width: 200px;
        transition: all 0.5s;
        cursor: pointer;
        margin: 5px;
    }

    .button span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
    }

    .button span:after {
        content: '\00bb';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
    }

    .button:hover span {
        padding-right: 25px;
    }

    .button:hover span:after {
        opacity: 1;
        right: 0;
    }
    </style>
</head>

<body>
    <center>
        <h1>Sending Password Via Email ☻</h1>
        <br>
        <h2>Check Your Mail Please And Login ☻☻☻</h2>
        <br>
        <button class="button" onclick=" location.href='login.php'" style="vertical-align:middle">
            <span>Login Page</span></button>
        <button class="button" onclick=" location.href='https://www.gmail.com/'" style="vertical-align:middle">
            <span>Email Page</span></button>
    </center>
</body>

</html>