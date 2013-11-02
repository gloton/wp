<?php
/*
  Plugin Name: Chapter 2 - Page Header Output
  Plugin URI: 
  Description: Companion to recipe 'Adding output content to page headers using plugin actions'
  Author: ylefebvre
  Version: 1.0
  Author URI: http://ylefebvre.ca/
 */
add_action( 'wp_head', 'ch2pho_page_header_output' );

function ch2pho_page_header_output() { ?>

	<script type="text/javascript">

	var gaJsHost = ( ( "https:" == document.location.protocol ) ? 	"https://ssl." : "http://www." );

	document.write( unescape( "%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E" ) );

	</script>

	<script type="text/javascript">

	try {
		var pageTracker = _gat._getTracker( "UA-xxxxxx-x" );
		pageTracker._trackPageview();
	} catch( err ) {}

	</script>

<?php 
}
//se ejecutara cada vez que el plugin sea activado
register_activation_hook( __FILE__,'ch2pho_set_default_options_array' );
function ch2pho_set_default_options_array() {
	if ( get_option( 'ch2pho_options' ) === false ) {
		$new_options['ga_account_name'] = "UA-000000-0";
		$new_options['track_outgoing_links'] = false;
		$new_options['version'] = "1.1";
		add_option( 'ch2pho_options', $new_options );
		} else {
			$existing_options = get_option( 'ch2pho_options' );
			if ( $existing_options['version'] < 1.1 ) {
				$existing_options['track_outgoing_links'] = false;
				$existing_options['version'] = "1.1";
				update_option( 'ch2pho_options', $existing_options );
			}
		}
}	
#Prioridad: la indicamos en el tercer parametro. 1 le da mayor prioridad si hay mas de un mismo hook
#add_action( 'admin_menu', 'ch2pho_settings_menu' , 1 );
#add_options_page( $page_title, $menu_title, $capability,$menu_slug, $function );
//registrara la funcion ch2pho_settings_menu, cuando WP construlla el menu del administrador
add_action( 'admin_menu', 'ch2pho_settings_menu' , 1 );
function ch2pho_settings_menu() {
	add_options_page( 
		'My Google Analytics Configuration',	//lo que aparece dentro de la etiqueta title
		'My Google Analytics',					//item de menu que se muestra en el backend 
		'manage_options',						//determina quien sera capaz de ver este item de menu, en este caso administrador o super-administrador
		'ch2pho-my-google-analytics', 			//texto que sera usado internamente por WP para identificar el item(evitar nombre comun para evitar conflictos con otros plugins)
		'ch2pho_config_page' 					//funcion que es llamada, y esta se encargara de mostrar el contenido de la pagina de configuracion
	);
}

?>