<?php 
/*
Plugin Name: Chapter 3 – Settings API.
Plugin URI:
Description: Crear un pagina de administracion de contenido utilizando el Settings API
Version: 1.0
Author: Yannick Lefebvre
Author URI: http://ylefebvre.ca
License: GPLv2
*/

define( "VERSION", "1.1" );

register_activation_hook( __FILE__ , 'ch3sapi_set_default_options' );
function ch3sapi_set_default_options() {
	if ( get_option( 'ch3sapi_options' ) === false ) {
		$new_options['ga_account_name'] = "UA-000000-0";
		$new_options['track_outgoing_links'] = false;
		$new_options['version'] = VERSION;
		add_option( 'ch3sapi_options', $new_options );
	}
}

add_action( 'admin_init', 'ch3sapi_admin_init' );
function ch3sapi_admin_init() {
	
	// register_setting( $option_group, $option_name,$sanitize_callback );
	
	// Register a setting group with a validation function
	// so that post data handling is done automatically for us
	register_setting( 'ch3sapi_settings' , 'ch3sapi_options' , 'ch3sapi_validate_options' );
	
	// Add a new settings section within the group
	add_settings_section( 
		'ch3sapi_main_section',
		'Main Settings',
		'ch3sapi_main_setting_section_callback',
		'ch3sapi_settings_section' 
	);
	
	// Add each field with its name and function to use for
	// our new settings, put them in our new section
	add_settings_field( 
		'ga_account_name', 
		'Account Name',
		'ch3sapi_display_text_field',
		'ch3sapi_settings_section',
		'ch3sapi_main_section',
		array( 'name' => 'ga_account_name' ) 
	);
	add_settings_field( 
		'track_outgoing_links',
		'Track Outgoing Links',
		'ch3sapi_display_check_box',
		'ch3sapi_settings_section',
		'ch3sapi_main_section',
		array( 'name' => 'track_outgoing_links' ) 
	);
}	
/*================FUNCIONES LLAMADAS===================*/
function ch3sapi_validate_options( $input ) {
	$input['version'] = VERSION;
	return $input;
}
function ch3sapi_main_setting_section_callback() { 
?>
<p>This is the main configuration section.</p>
<?php 
}
function ch3sapi_display_text_field( $data = array() ) {
	extract( $data );
	$options = get_option( 'ch3sapi_options' );
?>
<input type="text" name="ch3sapi_options[<?php echo $name;?>]" value="<?php echo esc_html( $options[$name] );?>"/><br />
<?php 
}//fin de funcion ch3sapi_display_text_field

function ch3sapi_display_check_box( $data = array() ) {
	extract ( $data );
	$options = get_option( 'ch3sapi_options' );
?>
<input type="checkbox" name="ch3sapi_options[<?php echo $name; ?>]" <?php if ( $options[$name] ) echo ' checked="checked"';?>/>
<?php 
}//fin funcion ch3sapi_display_check_box
/*================FUNCIONES LLAMADAS===================*/


add_action( 'admin_menu', 'ch3sapi_settings_menu' );
function ch3sapi_settings_menu() {
	add_options_page( 
		'My Google Analytics Configuration',
		'My Google Analytics - Settings API', 
		'manage_options',
		'ch3sapi-my-google-analytics',
		'ch3sapi_config_page'
	);
}
function ch3sapi_config_page() { 
?>
<div id="ch3sapi-general" class="wrap">
	<h2>My Google Analytics – Settings API</h2>
	<div style="background-color: aqua;"><?php echo print_r(get_option( 'ch3sapi_options' ));?></div>
	<form name="ch3sapi_options_form_settings_api" method="post" action="options.php">
		<div id="campos_agrupados">
		<?php settings_fields( 'ch3sapi_settings' ); ?>
		</div>
		<?php do_settings_sections( 'ch3sapi_settings_section' ); ?>
		<input type="submit" value="Submit" class="button-primary" />
	</form>
</div>
<?php 
}//fin funcion ch3sapi_config_page
?>
