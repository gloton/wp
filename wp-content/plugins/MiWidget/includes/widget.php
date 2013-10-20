<?php

class mpw_widget extends WP_Widget {

    function mpw_widget(){
        // Constructor del Widget.
		$widget_ops = array('classname' => 'mpw_widget', 'description' => "Descripción de Mi primer Widget" );
    	$this->WP_Widget('mpw_widget', "Mi primer Widget", $widget_ops);
    }

    function widget($args,$instance){
        // Contenido del Widget que se mostrará en la Sidebar
    }

    function update($new_instance, $old_instance){
        // Función de guardado de opciones   
    }

    function form($instance){
        // Formulario de opciones del Widget, que aparece cuando añadimos el Widget a una Sidebar
    }    
} 

?>