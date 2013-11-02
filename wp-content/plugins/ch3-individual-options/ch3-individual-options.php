<?php 
/*
Plugin Name: Chapter 3 – Individual Options.
Plugin URI:
Description: Agregar/verificar un registro en la tabla opciones de WP
WordPress admin interface
Version: 1.0
Author: Yannick Lefebvre
Author URI: http://ylefebvre.ca
License: GPLv2
*/

register_activation_hook( __FILE__,'ch3io_set_default_options' );
function ch3io_set_default_options() {
	if ( get_option( 'ch3io_ga_account_name' ) === false ) {
		add_option( 'ch3io_ga_account_name', "UA-000000-0" );
	}
}
?>