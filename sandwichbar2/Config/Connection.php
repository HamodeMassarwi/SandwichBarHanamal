<?php
//Start The Session EveryWhere
session_start();
//location
define('SITEURL' , 'http://localhost/sandwichbar2/');
$host="localhost";
$user="root";
$password="";
$database="food-order";
$conn = mysqli_connect( $host,$user,$password,$database);
mysqli_set_charset($conn,"utf8");
if(mysqli_connect_errno ()){
die("cannot connect to database".mysqli_connect_error());
} 

?>