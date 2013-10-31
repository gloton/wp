<?php 
/*
Plugin Name: Chapter 2 – Title Filter.
Plugin URI:
Description: Agrega un favicon a la pagina
WordPress admin interface
Version: 1.0
Author: Yannick Lefebvre
Author URI: http://ylefebvre.ca
License: GPLv2
*/
add_filter( 'wp_title', 'ch2tf_title_filter');
function ch2tf_title_filter ( $title , $sep="5", $seplocation="6") {
	//echo '<script type="text/javascript">alert("'.$title.'");</script>' ;
	
	//Select new title based on item type
	if ( is_front_page() )
		$new_title = 'Front Pageddd >> ';
	elseif ( get_post_type() == 'page' )
		$new_title = 'Page >> ';
	elseif ( get_post_type() == 'post' )
		$new_title = 'Post >> ';
	
	// Append previous title to title prefix
	if ( isset( $new_title ) ) {
		$new_title .= $title;
		// Return new complete title to be displayed
		return $new_title;
	} else {
		return $title;
	}
}
?>