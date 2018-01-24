<?php
class kh_main_form{
public function kh_the_form($first_name, $last_name,$username,$email,$password ) {
     
    
    echo '
        
        <style>
 
.regi-form-area input{
   width: 100%!important;
    height: 50px!important;
}
.regi-form-area input[type="submit"] {
    width: 246px!important;
    margin-top: 30px;
    background: black;
    color: white;
}
        </style>
        ';
 
    echo '
    <form action="' . $_SERVER['REQUEST_URI'] . '" method="post" class="regi-form-area">
  <div>
    <label for="firstname">First Name</label>
    <input type="text" name="fname" value="' . ( isset( $_POST['fname']) ? $first_name : null ) . '">
    </div>
     
    <div>
    <label for="lname">Last Name</label>
    <input type="text" name="lname" value="' . ( isset( $_POST['lname']) ? $last_name : null ) . '">
    </div>
     
  
   
    <div>
    <label for="username">Username</label>
    <input type="text" name="username" value="' . ( isset( $_POST['username']) ? $username : null ) . '">
    </div>
      
    <div>
    <label for="email">Email <strong>*</strong></label>
    <input type="email" name="email" value="' . ( isset( $_POST['email']) ? $email : null ) . '">
    </div>
     
       <div>
    <label for="password">Password <strong>*</strong></label>
    <input type="password" name="password" value="' . ( isset( $_POST['password'] ) ? $password : null ) . '">
    </div>
    <input type="submit" name="submit" value="Register"/>
    </form>
    ';
}
public function kh_register_validation( $first_name, $last_name,$username,$email,$password)  {
global $reg_errors;
$reg_errors = new WP_Error;
    

 if (empty( $password )) {
    $reg_errors->add('field', 'Password is a required field.Please insert Password');
}
 if (empty( $email ) ) {
    $reg_errors->add('field', 'Email is a required field.Please insert Email');
}

    if ( email_exists( $email ) ) {
    $reg_errors->add( 'email', 'Email Already in use' );
}
    if ( username_exists( $username ) )
    $reg_errors->add('user_name', 'Sorry, that username already exists!');
    if ( is_wp_error( $reg_errors ) ) {
 
    foreach ( $reg_errors->get_error_messages() as $error ) {
     
        echo '<div>';
        echo '<strong>ERROR</strong>:';
        echo $error . '<br/>';
        echo '</div>';
         
    }
 
}
    
    
    
}
    }
 