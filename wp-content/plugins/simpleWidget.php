<?php
/* 
Plugin Name: Simple Widget
Plugin URI: http://www.elwebmaster.cl
Description: Plugin Widget Awesome, vamos a crear una interfaz basica de un widget-http://codex.wordpress.org/es:API_de_Widget
Version: 1.0
Author: Jorge Gatica
Author URI: http://www.w7.cl
*/

class SimpleWidget extends WP_Widget {
	function SimpleWidget () {
		
	}
	
	//vamos a declarar 3 funciones; widget, update y form, que haces que los widget funcionen correctamente
	
	#$args
	# son los argumentos del tema
	/*
	La funcion widget crearemos la interfaz
	la funcion widget va a ser llamada cuando pongamos el plugin dentro de la interfaz del 
	usuario el plugin extraiga informacion del tema 
	*/
	function widget($args, $instance) {
		# extract
		#va a pasar lo que sea a objeto
		
		# EXTR_SKIP
		#esta constante me garantiza que las variables se van a pasar correctamente
		extract($args, EXTR_SKIP);
		
		$title = ($instance['title']) ? ($instance['title']) : 'Un Widget cualquiera';
		$body = ($instance['body']) ? ($instance['body']) : 'texto de prueba';
		?>
		<?php echo $before_widget; ?>
		<!-- $title me mostrara el titulo mientras que seran por lo general $before_title 
		etiquetas,$after_title html como por ejemplo h1, div etc -->
		<?php echo $before_title . $title . $after_title; ?>
		<p><?php echo $body; ?></p>
<?php 
		
	}
	function update($new_instance, $old_instance) {
		
	}
	function form($instance) {
		
	}
}

function simple_widget_init() {
	register_widget("SimpleWidget");
}

add_action('widgets_init', 'simple_widget_init');
?>
