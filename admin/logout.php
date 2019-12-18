<?php
// session_start();
// session_unset();
// session_destroy();
require_once('private/init.php');
unset($_SESSION['user_id']);
header('location:index.php');
?>