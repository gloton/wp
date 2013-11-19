<?php
/*
Plugin Name: Mi penca plugin
Plugin URI: http://www.codigonexo.com/
Description: Hace un saludo el la posicion del footer. Se crea una pagina para su "configuracion(no la tiene)" a travez de un submenu de ajustes y se crea una ayuda para este plugin en la parte superior
Version: 1.0
Author: Codigonexo
Author URI: http://www.codigonexo.com/
*/
add_action( 'wp_footer', 'mpp_saludarenelpie' );

function mpp_saludarenelpie () {
	echo "Hola en este dia domingo";
}


add_action( 'admin_menu', 'mpp_agregaralmenu' );

function mpp_agregaralmenu() {
	$options_page = add_options_page( 'Este es mi Penca  plugin','Penca plugin', 'manage_options','mpp_eslug', 'mpp_contenido_encackend' );
	//$options_page imprime:settings_page_ch2pho-my-google-analytics
	
	/* aca coloco settings_page_ + el slug, porque ya se que eso es lo que me devuelve $options_page, 
	 * pero si no lo supiera tendria que llamarla add_action( 'load-' . $options_page, 'mpp_creara_ayuda' );
	if ($options_page) {
		add_action( 'load-settings_page_mpp_eslug', 'mpp_creara_ayuda' );
		//imprimiria:load-settings_page_mpp_eslug
	}
	*/
	add_action( 'load-settings_page_mpp_eslug', 'mpp_creara_ayuda' );
	
}

function mpp_contenido_encackend () { 
?>
<h1>Mi Penca plugin</h1>
<p>Este es el contenido de mi penca plugin.</p>
<p>PENCA, porque no hace nada, solo probar como funciona, la asignacion de menu y la asignacion de ayuda</p>
<p>Este contenido solo lo vere desde el backend, ya que es cargado cuando se llama a la accion admin_menu y solo para administradores, ya que le puse la opcion manage_options </p>
<?php 
}


//*================ESTA ES AYUDA QUE APARECERA ARRIBA ==================*//
function mpp_creara_ayuda() {
	$screen = get_current_screen();
	$screen->add_help_tab( array(
			'id'       => 'mpp_ayuda_general',
			'title'    => 'Instructions',
			'callback' => 'mpp_ayuda_genera_construye',
	) );

	$screen->add_help_tab( array(
			'id'       => 'mpp_ayuda_faq',
			'title'    => 'FAQ',
			'callback' => 'mpp_ayuda_faq_construye',
	) );

	$screen->add_help_tab( array(
			'id'       => 'mpp_ayuda_tercera',
			'title'    => '3ra',
			'callback' => 'mpp_ayuda_tercera_construye',
	) );

	$screen->set_help_sidebar( '<p>This is the sidebar content</p>' );
}

function mpp_ayuda_genera_construye() { ?>
	<p>Esta es el contenido de la ayuda general para este penca plugin que lo unico que hace es nada</p>
<?php }

function mpp_ayuda_faq_construye() { ?>
	<p>La unica pregunta frecuentem es... para que porqueria sirve este plugin??????</p>
<?php }
function mpp_ayuda_tercera_construye() {
?>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores veniam tempora ab provident reiciendis tempore voluptatibus quasi aperiam. Hic quas sequi dolores reprehenderit repudiandae distinctio odio tenetur cum quae officia?</p>
<?php 
}
?>
