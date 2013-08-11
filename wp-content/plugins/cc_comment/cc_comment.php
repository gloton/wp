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
	
	//actualiza el campo cccomm_cc_email en la pagina general
	register_setting('general','cccomm_cc_email');
}
add_action('admin_init','cccomm_init');

/*INICIO AGREGAR UN INPUT PARA CAMBIAR OPCIONES DE WP EN EL SUBMENU GENERAL*/
//funcion que va mostrara el input
function cccom_setting_field() {
?>
<input type="text" name="cccomm_cc_email" id="cccomm_cc_email"
value="<?php echo get_option('cccomm_cc_email'); ?>" />
<div id="emailInfo" align="left"></div>
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
	add_settings_field('cccomm_cc_email', 'CC Comment', 'cccom_setting_field', 'general','cccomm');
}
/*FIN AGREGAR UN INPUT PARA CAMBIAR OPCIONES DE WP EN EL SUBMENU GENERAL*/

//cuando el usuario haga click en el menu de administrador se generara la vista que definimos en cccomm_option_page
add_action('admin_menu', 'cccom_plugin_menu'); 

function cccomm_email_check() {
	$email = isset($_POST['cccomm_cc_email']) ? $_POST['cccomm_cc_email'] : null;
	$msg = 'invalid';
	if ($email) {
		if (is_email($email)) {
			$msg = 'valid';
		}
	}
	echo $msg;
	die();
}

/*para incluir nuestro ajax-ojo que despues de el prefijo wp_ajax_ 
se coloca la funcion que llamara al ajax*/
add_action('wp_ajax_cccomm_email_check','cccomm_email_check');
add_action('admin_print_scripts-options-general.php','cccom_email_check_script');
function cccom_email_check_script() {
	wp_enqueue_script("cc_comment", path_join(WP_PLUGIN_URL, basename(dirname(__FILE__))."/cc_comments.js"),array('jquery'));
}