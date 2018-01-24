<?php

class kh_registration{
 public function kh_complete_registration() {
    global $reg_errors, $first_name, $last_name,$username,$email,$password;
    if ( 1 > count( $reg_errors->get_error_messages() ) ) {
        $userdata = array(
        'user_login'    =>   $username,
        'user_email'    =>   $email,
        'user_pass'     =>   $password,
         'first_name'    =>   $first_name,
        'last_name'     =>   $last_name,
  
        );
        $user = wp_insert_user( $userdata );
        echo 'Registration complete. Goto <a href="' . get_site_url() . '/wp-login.php">login page</a>.';   
    }
}
   
    
}

?>
