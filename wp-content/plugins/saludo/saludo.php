<?php
/*Plugin Name: saludo
	Plugin URI: http://inyaka.net/blog
	Description: Sencillo plugin para fines didacticos que imprime un saludo a elecci&oacute;n.
	Version: 0.1
	Author: Inyaka
	Author URI: http://inyaka.net/blog*/	
function saludo(){
	global $wpdb; 
	$table_name = $wpdb->prefix . "saludos";
	$saludo= $wpdb->get_var("SELECT saludo FROM $table_name ORDER BY RAND() LIMIT 0, 1; " );
	include('template/saludo.html');		
}
function saludo_instala(){
	global $wpdb; 
	$table_name= $wpdb->prefix . "saludos";
   $sql = " CREATE TABLE $table_name(
		id mediumint( 9 ) NOT NULL AUTO_INCREMENT ,
		saludo tinytext NOT NULL ,
		PRIMARY KEY ( `id` )	
	) ;";
	$wpdb->query($sql);
	$sql = "INSERT INTO $table_name (saludo) VALUES ('Hola Mundo');";
	$wpdb->query($sql);
}
function saludo_desinstala(){
	global $wpdb; 
	$table_name = $wpdb->prefix . "saludos";
	$sql = "DROP TABLE $table_name";
	$wpdb->query($sql);
}	
function saludo_panel(){
	include('template/panel.html');			
	global $wpdb; 
	$table_name = $wpdb->prefix . "saludos";
	if(isset($_POST['saludo_inserta'])){	
			$sql = "INSERT INTO $table_name (saludo) VALUES ('{$_POST['saludo_inserta']}');";
			$wpdb->query($sql);
	}
}
function saludo_add_menu(){	
	if (function_exists('add_options_page')) {
		//add_menu_page
		add_options_page('saludo', 'saludo', 8, basename(__FILE__), 'saludo_panel');
	}
}
if (function_exists('add_action')) {
	add_action('admin_menu', 'saludo_add_menu'); 
}
add_action('activate_saludo/saludo.php','saludo_instala');
add_action('deactivate_saludo/saludo.php', 'saludo_desinstala');
?>