<?php
/*
Plugin Name: cc_comment
Plugin URI: http://www.elwebmaster.cl
Description: Este plugin enviara un mail
Version: 1.0
Author: Jorge Gatica
Author URI: http://www.w7.cl
*/

function cc_comment() {
	global $_REQUEST;
	
	$to = "j.gatica@yahoo.com";
	$subject = "Nuevo comentario en el blog" . $_REQUEST['subject'];
	$message = "Mensaje de; " . $_REQUEST['name'] . "por email" . $_REQUEST['email'] . "\n " . $_REQUEST['comments'];
	wp_mail($to, $subject, $message);
}

add_action("comment_post", "cc_comment");

function cccomm_init() {
	
	register_setting('cccomm_options','cccomm_cc_email');
}
add_action('admin_init','cccomm_init');

/*INICIO AGREGAR UN INPUT PARA CAMBIAR OPCIONES DE WP EN EL SUBMENU GENERAL*/
//funcion que va mostrara el input
function ccom_setting_field() {
?>
<input type="text" name="cccomm_cc_email" id="cccomm_cc_email"
value="<?php echo get_option('cccomm_cc_email'); ?>" />
<?php 
}
function cccomm_setting_section() {
?>
	<p>Ajustes para el plugin CC Comments </p>
<?php 
}
//registrar el plugin el menu administrador la cual llamara a la funcion que mostrara el input
/*
 *@param cccomm_cc_email que es el id del input
 *@param titulo del formulario
 *@param cccomm_cc_email funcion que sera llamada
 *@param general es la pagina a la que pertenecera
 * */
function cccom_plugin_menu() {
	add_settings_section('cccomm', 'CC Comment', 'cccomm_setting_section', 'general');
	add_settings_field('cccomm_cc_email', 'CC Comment', 'ccom_setting_field', 'general','cccomm');
}
/*FIN AGREGAR UN INPUT PARA CAMBIAR OPCIONES DE WP EN EL SUBMENU GENERAL*/

//cuando el usuario haga click en el menu de administrador se generara la vista que definimos en cccomm_option_page
add_action('admin_menu', 'cccom_plugin_menu'); 