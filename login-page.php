<?php
function kh_login_function()
{
    if (is_user_logged_in()) {
        echo "You are logged in aleady.";
    } else {
        echo '<div class="login-form-area" style="">';
        echo '
        
        <style>
        .login-form-area input[type="text"]{}
        width: 100%!important;
    height: 50px!important;
}
.login-form-area input[type="password"] {
   width: 100%!important;
    height: 50px!important;
}
.login-form-area input[type="submit"] {
    width: 246px;
    margin-top: 30px;
    background: black;
    color: white;
}
        </style>
        ';
        wp_login_form();
          echo '</div>';
        echo '<div class="registration_link">for registration  <a href="' . get_site_url() . '/registration">click here</a>.</div>';
        $login = (isset($_GET['login'])) ? $_GET['login'] : 0;
        if ($login === "failed") {
            echo '<p class="error_msg"><strong></strong> Invalid username or password.</p>';
        } elseif ($login === "empty") {
            echo '<p class="error_msg"><strong></strong> Username and/or Password is empty.</p>';
        } elseif ($login === "false") {
            echo '<p class="error_msg"><strong></strong> You are logged out.</p>';
        }
    }
}
?>
