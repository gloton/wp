<?php
/*
Plugin Name: Mapas con Shortcode
Plugin URI: http://www.elwebmaster.cl
Description: Este plugin mostrara un mapa mediante el uso del API de Google maps
Version: 1.0
Author: Jorge Gatica
Author URI: http://www.w7.cl
*/

function smp_map_it() {
	$addr = "Eduardo donoso 885, ñuñoa";
	$base_map_url = 'http://maps.google.com/maps/api/staticmap?&size=256x256&sensor=false&zoom=13&markers=';
?>
	<h2>Your map:</h2>
	<img width="256" height="256" src="<?php echo $base_map_url . urlencode($addr); ?>" alt="" />
<?php
}

add_shortcode('map-it', 'smp_map_it');
?>