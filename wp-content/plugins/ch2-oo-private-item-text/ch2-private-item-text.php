<?php
/*
  Plugin Name: Chapter 2 – Object-Oriented – Private Item Text.
  Plugin URI: 
  Description: Parte de este articulo es privado.
  Author: ylefebvre
  Version: 1.0
  Author URI: http://ylefebvre.ca/
 */
class CH2_OO_Private_Item_Text {
	function __construct() {
		add_shortcode( 'private', array( $this , 'ch2pit_private_shortcode' ) );
		add_action( 'wp_enqueue_scripts', array( $this , 'ch2pit_queue_stylesheet' ) );
	}
	
	function ch2pit_private_shortcode( $atts, $content = null ) {
		if ( is_user_logged_in() )
			return '<div class="private">' . $content . '</div>';
		else
			return '';
	}
	
	function ch2pit_queue_stylesheet() {
		#privateshortcodestyle
		# no se para que sirve
		wp_enqueue_style( 'privateshortcodestyle', plugins_url( 'stylesheet.css', __FILE__ ) );
	}
}
$my_ch2_oo_private_item_text = new CH2_OO_Private_Item_Text();





?>