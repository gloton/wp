<?php 
/*
Plugin Name: Chapter 3 – Hide Menu Item.
Plugin URI:
Description: Ocultar menus del backend para que estos no sean vistos. Receta: Hiding items which users should not access from the default menu
Version: 1.0
Author: Yannick Lefebvre
Author URI: http://ylefebvre.ca
License: GPLv2
*/
add_action( 'admin_menu', 'ch3hmi_hide_menu_item' );
function ch3hmi_hide_menu_item() {
	remove_menu_page( 'link-manager.php' );
	remove_submenu_page( 
		'options-general.php',
		'options-permalink.php' 
	);
}
?>
