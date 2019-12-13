<?php 

// similar with if(isset($_POST['submit])) when checking a form
function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}