<?php
/*
Plugin Name: Activation Pluin
Plugin URI: http://www.elwebmaster.cl
Description: Este plugin sirve para demostrar como ejecutar una funcion cuando se activa el plugin
Version: 1.0
Author: Jorge Gatica
Author URI: http://www.w7.cl
*/
function my_plugin_activate() {
	//esta funcion dara x
	error_log("Has activado mi plugin");
}

//esta accion sirve para ejecutar una funcion cuando se activa el plugin
register_activation_hook(__FILE__, "my_plugin_activate")
 ?>