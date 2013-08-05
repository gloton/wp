<?php
/*
Plugin Name: welcome plugin
Plugin URI: http://www.elwebmaster.cl
Description: Este plugin enviara un mail con un mensaje personalizado a los nuevos usuarios registrador.
Version: 1.0
Author: Jorge Gatica
Author URI: http://www.w7.cl
*/
if (!function_exists('wp_new_user_notification')) {

	function wp_new_user_notification($user_id, $plaintext_pass = '') {
		$user = get_userdata( $user_id );
	
		$user_login = stripslashes($user->user_login);
		$user_email = stripslashes($user->user_email);
	
		// The blogname option is escaped with esc_html on the way into the database in sanitize_option
		// we want to reverse this for the plain text arena of emails.
		$blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
	
		$message  = sprintf(__('New user registration on your site %s:'), $blogname) . "\r\n\r\n";
		$message .= sprintf(__('Username: %s'), $user_login) . "\r\n\r\n";
		$message .= sprintf(__('E-mail: %s'), $user_email) . "\r\n";
	
		@wp_mail(get_option('admin_email'), sprintf(__('[%s] New User Registration'), $blogname), $message);
	
		if ( empty($plaintext_pass) )
			return;
		#sprintf
		# Esta funcion nos permite reemplazar partes de un string con las variables y es simplemente una
		# forma mas segura de reemplazar variables dinamicamente
		$message = sprintf(__('Bienvenido a mi pagina')) . "\r\n\r\n";
		$message .= sprintf(__(' Aqui tienes tu informacion')) . "\r\n\r\n";
		$message .= sprintf(__('Username: %s'), $user_login) . "\r\n";
		$message .= sprintf(__('Password: %s'), $plaintext_pass) . "\r\n";
		$message .= wp_login_url() . "\r\n";
		$message .= sprintf(__(' Vuelve cuando quieras'));
	
		wp_mail($user_email, sprintf(__('[%s] Your username and password'), $blogname), $message);
	
	}
}
?>