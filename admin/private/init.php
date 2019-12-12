<?php
  ob_start(); // output buffering is turned on
  session_start(); // turn on sessions

  require_once('database.php');
  require_once('functions.php');


  $db = db_connection();