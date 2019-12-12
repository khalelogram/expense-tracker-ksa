<?php 

require_once('db_cread.php');


function db_connection() {
    $db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    confirm_connection_db();
    return $db;
}



function confirm_connection_db() {
    if(mysqli_connect_errno()) {
        $db_err_msg = "Data base connection failed:";
        $db_err_msg .= mysqli_connect_error();
        $db_err_msg .= "(" . mysqli_connect_errno() . ")";
        exit($db_err_msg);
    }
}

function escape_string($string) {
    return mysqli_real_escape_string($db, $string);
}