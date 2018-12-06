<?php
$connection = mysqli_connect('host', 'user', 'password');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'ims');//Feel free to change this to your own database name
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
