<?php 
	//esta funcion comprueba que exista la funcion register_sidebar,
	//si exsiste la inicializa con un array
	if (function_exists('register_sidebar')) {
		register_sidebar(array(
			'name' => 'Sidebar Widgets',//nombre que le pusimos al widget (en este caso en el )
			'id' => 'sidebar-widgets',
			'description' => 'Widgets para el Sidebar',
			'before_widget' => '<aside id="%l$s" class="widget %2$s"',//define que codigo debe ir antes del widget
			'after_widget' => '</aside>',//define que codigo debe ir despues del widget
			'before_title' => '<h3>',//codigo antes del titulo
			'after_title' => '</h3>'//codigo despues del titulo
		));
	}
?>