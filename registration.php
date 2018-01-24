<?php
require_once( plugin_dir_path( __FILE__ ) . 'classes/kh_main_form.php' );
require_once( plugin_dir_path( __FILE__ ) . 'classes/kh_registration.php' );


function kh_main_registration_function() {
    $the_form= new kh_main_form;
$regi_process = new kh_registration;

    if ( isset($_POST['submit'] ) ) {
        $the_form->kh_register_validation(
        $_POST['username'],
        $_POST['password'],
        $_POST['email'],
         $_POST['fname'],
        $_POST['lname']
       
 
        );
         
        // sanitize user form input
        global $first_name, $last_name,$username,$email,$password;
        $username   =   sanitize_user( $_POST['username'] );
        $password   =   esc_attr( $_POST['password'] );
        $email      =   sanitize_email( $_POST['email'] );
         $first_name =   sanitize_text_field( $_POST['fname'] );
        $last_name  =   sanitize_text_field( $_POST['lname'] );
        
    
        $regi_process->kh_complete_registration(
         $username,
        $password,
        $email,
         $first_name,
        $last_name
        );
    }
 if( is_user_logged_in() ){
echo "You are already registered. Goto <a href=" . get_site_url() .">Home page</a>.";
     }else{ 
    $the_form->kh_the_form(
       $first_name, $last_name,$username,$email,$password
        );
}}
