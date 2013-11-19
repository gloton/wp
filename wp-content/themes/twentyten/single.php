<?php 
$post = $wp_query->post;
if (in_category('promociones')) {
	include(TEMPLATEPATH.'/custom/single_promociones.php');
}
?>