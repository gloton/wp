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
?>