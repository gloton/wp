<?php
/*
  Plugin Name: Chapter 2 - Page Header Output V8
  Plugin URI: 
  Description: Companion to recipe 'Adding custom help pages'
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

<?php }

add_filter( 'the_content', 'ch2lfa_link_filter_analytics' );

function ch2lfa_link_filter_analytics ( $the_content ) {
	$new_content = str_replace( "href", "onClick=\"recordOutboundLink( this, 'Outbound Links', '" . home_url() . "' );return false;\" href", $the_content );
	return $new_content;
}

add_action( 'wp_footer', 'ch2lfa_footer_analytics_code' );

function ch2lfa_footer_analytics_code() { ?>

<script type="text/javascript">
  function recordOutboundLink( link, category, action ) {
	_gat._getTrackerByName()._trackEvent( category, action );
	setTimeout( 'document.location = "' + link.href + '"', 100 );
  }
</script>

<?php }

/*****************************************************************
 * Code from recipe 'Storing user settings using arrays'         *
 *****************************************************************/

register_activation_hook( __FILE__, 'ch2pho_set_default_options_array' );

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

/*****************************************************************
 * Code from recipe 'Creating an administration page menu item   *
 * in the settings menu'                                         *
 *****************************************************************/

add_action( 'admin_menu', 'ch2pho_settings_menu' );

function ch2pho_settings_menu() {
	#add_options_page
	# añade esta pagina como submenu de ajustes/settings ver distintosmenus(etiqueta) en evernote
	$options_page = add_options_page( 
		'My Google Analytics Configuration',//lo que aparece dentro de la etiqueta title
		'My Google Analytics',//item de menu que se muestra en el backend
		'manage_options',//determina quien sera capaz de ver este item de menu, en este caso administrador o super-administrador
		'ch2pho-my-google-analytics', //texto que sera usado internamente por WP para identificar el item(evitar nombre comun para evitar conflictos con otros plugins)
		'ch2pho_config_page' //funcion que es llamada, y esta se encargara de mostrar el contenido de la pagina de configuracion
	);
	//$options_page imprime:settings_page_ch2pho-my-google-analytics
	if ($options_page) {
		add_action( 'load-' . $options_page, 'ch2pho_help_tabs' );
		//'load-' . $options_page imprimiria:load-settings_page_ch2pho-my-google-analytics
	}
}

/*****************************************************************
 * Code from recipe 'Rendering admin page contents using HTML'   
 *****************************************************************/

function ch2pho_config_page() {
	// Retrieve plugin configuration options from database
	$options = get_option( 'ch2pho_options' );
	?>

	<div id="ch2pho-general" class="wrap">
	<h2>My Google Analytics</h2>
	
	<?php if (isset( $_GET['message'] ) && $_GET['message'] == '1') { ?>
	<div id='message' class='updated fade'><p><strong>Su configuracion ha sido guardada</strong></p></div>
	<?php } ?>

	<form method="post" action="admin-post.php">

	 <input type="hidden" name="action" value="save_ch2pho_options" />

	 <!-- Adding security through hidden referrer field -->
	 <?php wp_nonce_field( 'ch2pho' ); ?>

	Account Name: <input type="text" name="ga_account_name" value="<?php echo esc_html( $options['ga_account_name'] ); ?>"/><br />
	Track Outgoing Links <input type="checkbox" name="track_outgoing_links" <?php if ( $options['track_outgoing_links'] ) echo ' checked="checked" '; ?>/><br />
	<input type="submit" value="Submit" class="button-primary"/>
	</form>
	</div>
<?php }

/*****************************************************************
 * Code from recipe 'Processing and storing admin page post data'*
 *****************************************************************/

add_action( 'admin_init', 'ch2pho_admin_init' );

function ch2pho_admin_init() {
	//en evernote hookformadmin-post
	//se ejecutara cuando el formulari se aprete submit
	add_action( 'admin_post_save_ch2pho_options','process_ch2pho_options' );
}

function process_ch2pho_options() {
	// Check that user has proper security level
	if ( !current_user_can( 'manage_options' ) )
		wp_die( 'Not allowed' );

	// Check that nonce field created in configuration form
	// is present

	check_admin_referer( 'ch2pho' );

	// Retrieve original plugin options array
	$options = get_option( 'ch2pho_options' );
	/*
	echo "<pre>";
	print_r($options);
	echo "</pre>";
	imprime
	Array
	(
	    [ga_account_name] => UA-000000-jaglgf
	    [track_outgoing_links] => 
	    [version] => 1.1
	)
	*/
	/*
	print_r( array( 'ga_account_name' ));
	imprime
	Array ( [0] => ga_account_name ) 
	*/

	// Cycle through all text form fields and store their values
	// in the options array

	foreach ( array( 'ga_account_name' ) as $option_name ) {
		if ( isset( $_POST[$option_name] ) ) {
			$options[$option_name] = sanitize_text_field($_POST[$option_name]);
		}
	}

	// Cycle through all check box form fields and set the options
	// array to true or false values based on presence of
	// variables

	foreach ( array( 'track_outgoing_links' ) as $option_name ) {
		if ( isset( $_POST[$option_name] ) ) {
			$options[$option_name] = true;
		} else {
			$options[$option_name] = false;
		}
	}

	// Store updated options array to database
	update_option( 'ch2pho_options', $options );
	
	/*
	echo add_query_arg( array( 'page' => 'ch2pho-my-google-analytics', 'message' => '1' ), admin_url( 'options-general.php' ) );
	imprime
	http://wordpress.local/wp-admin/options-general.php?page=ch2pho-my-google-analytics&message=1
	
	echo add_query_arg( array( 'page' => 'ch2pho-my-google-analytics', 'message' => '1' ));
	imprime
	/wp-admin/admin-post.php?page=ch2pho-my-google-analytics&message=1
	*/
	
	// Redirect the page to the configuration form that was
	// processed
	//redirecciona al navegador devuelta a las opciones del plugin despues que todos los datos han sido almacenados
	wp_redirect( add_query_arg( array( 'page' => 'ch2pho-my-google-analytics', 'message' => '1' ), admin_url( 'options-general.php' ) ) );
	exit;
}

/*****************************************************************
 * Code from recipe 'Adding custom help pages'*
 *****************************************************************/
 
function ch2pho_help_tabs() {
	$screen = get_current_screen();//
	$screen->add_help_tab( array(
		'id'       => 'ch2pho-plugin-help-instructions',
		'title'    => 'Instructions',
		'callback' => 'ch2pho_plugin_help_instructions',
	) );

	$screen->add_help_tab( array(
		'id'       => 'ch2pho-plugin-help-faq',
		'title'    => 'FAQ',
		'callback' => 'ch2pho_plugin_help_faq',
	) );

	$screen->set_help_sidebar( '<p>This is the sidebar content</p>' );
}

function ch2pho_plugin_help_instructions() { ?>
	<p>These are instructions explaining how to use this plugin.</p>
<?php }

function ch2pho_plugin_help_faq() { ?>
	<p>These are the most frequently asked questions on the use of this plugin.</p>
<?php }

?>