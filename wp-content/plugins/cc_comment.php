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
	mail($to, $subject, $message);
}

add_action("comment_post", "cc_comment")
?>
