<?php

$server = "localhost";
$db  = "crypto";
$pass = "";
$user = "root";



$conn = mysqli_connect($server,$user, $pass, $db );

if(!$conn){
    die("connection fialed".mysqli_connect_error());
}







?>