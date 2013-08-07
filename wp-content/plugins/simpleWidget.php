<?php
/* 
Plugin Name: Simple Widget
Plugin URI: http://www.elwebmaster.cl
Description: Plugin Widget Awesome, vamos a crear una interfaz basica de un widget-http://codex.wordpress.org/es:API_de_Widget
Version: 1.0
Author: Jorge Gatica
Author URI: http://www.w7.cl
*/
//ref:http://xref.wordpress.org/trunk/WordPress/Widgets/WP_Widget.html 
class SimpleWidget extends WP_Widget {
	#classname
	# se agregara como clase al widget en el frontend
	
	#description
	# esta es la descripcion del widget que aparece en el backend
	
	function SimpleWidget () {
		$widget_options = array(
				'classname' => 'simple-widget',
				'description' => 'Un simple Widget de jorge'
		);
		
		//simple_widget vera reflejado en la funcion form
		parent::WP_Widget('simple_widget', 'Simple Widget', $widget_options);
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
		
		#$instance['title']
		#obtendra el titulo si es que lo tiene
		
		#$instance['body']
		#obtendra el cuerpo si es que lo tiene
		
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
	function form($instance) {
?>
		<label for="<?php echo $this->get_field_id('title')?>">Title:</label>
		<input  id="<?php echo $this->get_field_id('title')?>" name="<?php echo $this->get_field_name('title')?>" value="<?php echo esc_attr($instance['title'])?>"/>
		<label for="<?php echo $this->get_field_id('body')?>">body:</label>
		<textarea  id="<?php echo $this->get_field_id('body')?>" name="<?php echo $this->get_field_name('body')?>"><?php echo esc_attr($instance['body'])?></textarea>
<?php 		
	}
}

/* INICIO REGISTRAR WIDGET*/
function simple_widget_init() {
	//llama a la funcion register_widget del archivo wp-includes/widgets.php
	register_widget("SimpleWidget");
}

//para que aparezca este widget en el entorno de worpress hay que registralo con la accion widgets_init
add_action('widgets_init', 'simple_widget_init');
/* FIN REGISTRAR WIDGET*/
?>
