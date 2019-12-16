<?php 

// similar with if(isset($_POST['submit])) when checking a form
function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

// sanitizing URL
// escaping specialcharacters in the url
function esc_u($string) {
    return urldecode($string);
}
// sanitizing URL
// escaping html characters in the url like <h1><p>
function esc_html($string) {
    return htmlspecialchars($string);
}
