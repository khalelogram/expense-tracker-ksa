<?php 

function log_in_admin($user) {
    // Renerating the ID protects the admin from session fixation.
      session_regenerate_id();
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['last_login'] = time();
      $_SESSION['username'] = $user['username'];
      return true;
}

function is_logged_in() {
    return isset($_SESSION['user_id']);
  }


  function require_login() {
    if(!is_logged_in()) {
    //   redirect_to(url_for('/staff/login.php'));
      header('Location: ../index.php');
    }
  }