<?php
/*
Plugin Name: El maravilloso pluin de Carlos
Plugin URI: http://www.elwebmaster.cl
Description: Este es mi primer plugin, y esto es su descripcion
Version: 1.0
Author: Jorge Gatica
Author URI: http://www.w7.cl
*/

//ASEGURARSE QUE ESTE USANDO LA VERSION DE WORDPRESS 3.0 O SUPERIOR.

//variable para recoger la version
global $wp_version;

#utilizare una funcion php llamada version_compare, esta funcion me va a permitir comparar la version
if (!version_compare($wp_version, "3.0", ">=")) {
	//este die funcionara como un exit
	die("Necesitas una version posterior para este plugin");
}
 ?>