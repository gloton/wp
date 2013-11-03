<?php 
/*
Plugin Name: Chapter 3 – Multi-Level menu.
Plugin URI:
Description: Crear un menu multinivel el administracion. Receta Creating a multi-level administration menu.
Version: 1.0
Author: Yannick Lefebvre
Author URI: http://ylefebvre.ca
License: GPLv2
*/

add_action( 'admin_menu', 'ch3mlm_admin_menu' );
function ch3mlm_admin_menu() {
	
#add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );	
	
	// Create top-level menu item
	add_menu_page( 
		'My Complex Plugin Configuration Page',		//lo que aparece dentro de la etiqueta title
		'My Complex Plugin', 						//item de menu que se muestra en el backend
		'manage_options',							//determina quien sera capaz de ver este item de menu, en este caso administrador o super-administrador
		'ch3mlm-main-menu', 						//texto que sera usado internamente por WP para identificar el item(evitar nombre comun para evitar conflictos con otros plugins)
		'ch3mlm_my_complex_main',					//funcion que es llamada, y esta se encargara de mostrar el contenido de la pagina de configuracion(aun no esta creada)
		plugins_url( 'myplugin.png', __FILE__ )		//url al icono de ese item de menu 
	);
	
	// Create a sub-menu under the top-level menu
	add_submenu_page( 
		'ch3mlm-main-menu',						//es el slug padre (el que esta en add_menu_page)
		'My Complex Menu Sub-Config Page', 		//lo que aparece dentro de la etiqueta title
		'Sub-Config Page',						//item de menu que se muestra en el backend
		'manage_options', 						//determina quien sera capaz de ver este item de menu, en este caso administrador o super-administrador
		'ch3mlm-sub-menu',						//texto que sera usado internamente por WP para identificar el item(evitar nombre comun para evitar conflictos con otros plugins)
		'ch3mlm_my_complex_submenu' 			//funcion
	);

	//NOTA: si quiere crear otro submenu tengo que copiar add_submenu_page
}
?>