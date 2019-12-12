<?php 

require_once('db_cread.php');

$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if(mysqli_connect_errno()) {
    exit("Data base connection failed:" . mysqli_connect_error() . "(" .mysqli_connect_errno(). ")");
}