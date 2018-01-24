<?php

//redirect the ogin page
function redirect_login_page() {
	$login_page  = home_url( '/login/' );
	$page_viewed = basename($_SERVER['REQUEST_URI']);

	if( $page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
		wp_redirect($login_page);
		exit;
	}
}
add_action('init','redirect_login_page');








//login vaidation

function login_failed() {
	$login_page  = home_url( '/login' );
	wp_redirect( $login_page . '?login=failed' );
	exit;
}
add_action( 'wp_login_failed', 'login_failed' );

function verify_username_password( $user, $username, $password ) {
	$login_page  = home_url( '/login' );
    if( $username == "" || $password == "" ) {
        wp_redirect( $login_page . "?login=empty" );
        exit;
    }
}
add_filter( 'authenticate', 'verify_username_password', 1, 3);
add_filter( 'login_redirect', function( $url, $query, $user ) {
	return home_url();
}, 10, 3 );






// shortcode for registration page
add_shortcode( 'kh_registration', 'kh_registration_shortcode' );

function kh_registration_shortcode() {
    ob_start();
    kh_main_registration_function();
    return ob_get_clean();
}


// shortcode for login page
add_shortcode( 'kh_login', 'kh_login_shortcode' );
function kh_login_shortcode() {
    ob_start();
    kh_login_function();
    return ob_get_clean();
}