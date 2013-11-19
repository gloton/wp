<?php
/*
  Plugin Name: Chapter 2 - Email Page Link
  Plugin URI: 
  Description: Companion to recipe 'Adding text after each item's content using plugin filters'. AL final de cada contenido colocara un icono de un mail
  con en enlace mailto que abrira el cliente de correo con un texto en el cuerpo del mensaje.
  Author: ylefebvre
  Version: 1.0
  Author URI: http://ylefebvre.ca/
 */

add_filter( 'the_content', 'ch2epl_email_page_filter' );

function ch2epl_email_page_filter ( $the_content ) {

	// build url to mail message icon downloaded
	// from iconarchive.com
	$mail_icon_url = plugins_url( 'mailicon.png', __FILE__ );

	// Set initial value of $new_content variable to previous
	// content
	$new_content = $the_content;

	// Append image with mailto link after content, including
	// the item title and permanent URL
	$new_content .= "<a title='E-mail article link' href='mailto:someone@somewhere.com?subject=Check out this interesting article entitled";
	$new_content .= get_the_title();
	$new_content .= "&body=Hi!%0A%0AI thought you would enjoy this article entitled ";
	$new_content .= get_the_title();
	$new_content .= ".%0A%0A";
	$new_content .= get_permalink();
	$new_content .= "%0A%0AEnjoy!'><img alt='' src='" . $mail_icon_url. "' /></a>";

	// Return filtered content for display on the site
	return $new_content;
}
?>