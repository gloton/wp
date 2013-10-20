<?php

class mpw_widget extends WP_Widget {

    function mpw_widget(){
        // Constructor del Widget.
		$widget_ops = array('classname' => 'mpw_widget', 'description' => "Descripción de Mi primer Widget" );
    	$this->WP_Widget('mpw_widget', "Mi primer Widget", $widget_ops);
    }

    /*
     La siguiente función es “widget”. Esta función es la que genera el 
     contenido que se muestra en la zona del Widget, lo que verán tus 
     usuarios en el Front End. Luego lo complicaremos, pero de momento, 
     veamos un ejemplo simple:
     */
    function widget($args,$instance){
        // Contenido del Widget que se mostrará en la Sidebar
    	echo $before_widget;
    	?>
		<aside id='mpw_widget' class='widget mpw_widget'>
		<h3 class='widget-title'>Mi Primer Widget</h3>
		<p>¡Este es mi primer Widget!</p>
		</aside>
		<?php
		echo $after_widget;
    }

    function update($new_instance, $old_instance){
        // Función de guardado de opciones   
    }

    function form($instance){
        // Formulario de opciones del Widget, que aparece cuando añadimos el Widget a una Sidebar
    }    
} 

?>