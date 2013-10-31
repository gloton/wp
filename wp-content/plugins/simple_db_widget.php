<?php
/*
Plugin Name: Simple Dashboard Widget
Plugin URI: http://www.elwebmaster.cl
Description: Agregamos un Widget a nuestro Dashboard
Version: 1.0
Author: Jorge Gatica
Author URI: http://www.w7.cl
*/

function simple_dashboard_widget() {
?>

	<h2>Acceso a la Web</h2>
	<p>Bienvenidos al curso de creacion de plugins en Wordpress</p>
	<p><a href="http://www.elwebmaster.cl">Este enlace te lleva a otro curso</a></p>
<?php 
}

function sdbw_register_widget() {
	wp_add_dashboard_widget('simple-dashboar-widget', 'Simple Dashboard Widget', 'simple_dashboard_widget');
}
add_action('wp_dashboard_setup', 'sdbw_register_widget');
?>
