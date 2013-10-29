<?php
/*
  Plugin Name: Chapter 2 - Page Header Output V2
  Plugin URI: 
  Description: Companion to recipe 'Inserting link statistics tracking code in page body using plugin filters'
  Author: ylefebvre
  Version: 1.0
  Author URI: http://ylefebvre.ca/
 */

add_action( 'wp_head', 'ch2pho_page_header_output' );

function ch2pho_page_header_output() { ?>

	<script type="text/javascript">

	var gaJsHost = ( ( "https:" == document.location.protocol ) ? "https://ssl." : "http://www." );

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
?>