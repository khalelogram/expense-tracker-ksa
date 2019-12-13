<?php 

require_once('db_cread.php');


function db_connection() {
    $db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    confirm_db_connection();
    return $db;
}


function confirm_db_connection() {
    if(mysqli_connect_errno()) {
        exit("Data base connection failed:" . mysqli_connect_error() . "(" .mysqli_connect_errno(). ")");
    }
}


// SQL injection
function __escape_string($string) {
    return mysqli_real_escape_string($db, $string);
}