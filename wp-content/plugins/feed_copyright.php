<?php
/*
 Plugin Name: feed_copyright
Plugin URI: http://www.elwebmaster.cl
Description: Este plugin agregara texto copyright cada vez que se genere una entrada y que podra ser vista solo en los lectores de feed
Version: 1.0
Author: Jorge Gatica
Author URI: http://www.w7.cl
*/
function cewp_add_feed_content($content) {
	
	#is_feed
	# es una funcion propia de wp
	
	//averiaguaremos si es un feed
	if (is_feed()) {
		//si es un feed, devolvera el contenido
		return $content . 'Creado por Carlos Espinal ' . date('Y') . ' Todos los derechos reservados';
	}
	return $content;
}

add_filter('the_content', 'cewp_add_feed_content');
?>