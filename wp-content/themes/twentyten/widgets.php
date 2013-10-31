<?php
//ref:http://xref.wordpress.org/trunk/WordPress/Widgets/WP_Widget.html 
class menuModelos extends WP_Widget {

	function menuModelos() {
		#menu-modelos
		# se agrega al frontend
		$widget_options = array(
				'classname' => 'menu-modelos',
				'description' => 'Crea un Widget para mostrar modelos por familia, como menu en el footer'
		);
		#menu_modelos
		# se agrega en el backend
		parent::WP_Widget('menu_modelos', 'Menu Modelos', $widget_options);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo $before_widget;
		$args = array(
				'parent'                   => '6',
		
		);
		$categories = get_categories($args);
		foreach ($categories as $indice => $obj) {
			echo $obj->cat_name."<br />";
		}
		echo $after_widget;
	}
	//function form($instance) {}
	//function update($new_instance, $old_instance) {}
}

/* INICIO REGISTRAR WIDGET*/
function register_widgets() {
	//llama a la funcion register_widget del archivo wp-includes/widgets.php
	register_widget("menuModelos");
}

//para que aparezca este widget en el entorno de worpress hay que registralo con la accion widgets_init
add_action('widgets_init', 'register_widgets');
/* FIN REGISTRAR WIDGET*/
?>
