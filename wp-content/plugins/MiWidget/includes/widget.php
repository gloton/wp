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
		<h3 class='widget-title'>Mi Primer Widget Frontend</h3>
		<!-- jagl, esto es lo que estaba antes
		<p>¡Este es mi primer Widget!</p>
		 -->
		<!-- esto es para que la opcion que pusimos en el backend se pueda ver en el frontend -->
		<p><?=$instance["mpw_texto"]?></p>
		</aside>
		<?php
		echo $after_widget;
    }

    /*jagl la funcion update y form van de la mano porque el campo que actualizare en la funcion
     * update, sera el campo que este declarado en la funcion form
     */
    
    
    /*
	Si nuestro Widget está hecho sólo para mostrar información concreta, y no requiere de configuración 
	interna, habríamos acabado aquí, no serían necesarias más funciones. En el caso de que requiera 
	configuración, entonces debemos crear las funciones update y form.
     */
    function update($new_instance, $old_instance){
        // Función de guardado de opciones   
		$instance = $old_instance;
		$instance["mpw_texto"] = strip_tags($new_instance["mpw_texto"]);
		// Repetimos esto para tantos campos como tengamos en el formulario.
		return $instance;        
    }
	/*
	La función update se encarga de guardar en la base de datos la configuración establecida para el Widget. 
	Suele seguir una estructura similar a la que vemos siempre, cambiando los parámetros de los campos.

	La función form es la que muestra el formulario de configuración del Widget en el Back End de WordPress. 
	Por ejemplo, vamos a mostrar un texto:
	*/
    function form($instance){
        // Formulario de opciones del Widget, que aparece cuando añadimos el Widget a una Sidebar
        #get_field_id y get_field_name
        # Las funciones get_field_id y get_field_name las usamos para que el guardado del Widget 
        # sea correcto y coherente en cuanto a parámetros.
?>
         <p>
            <label for="<?php echo $this->get_field_id('mpw_texto'); ?>">Texto del Widget</label>
            <input class="widefat" id="<?php echo $this->get_field_id('mpw_texto'); ?>" name="<?php echo $this->get_field_name('mpw_texto'); ?>" type="text" value="<?php echo esc_attr($instance["mpw_texto"]); ?>" />
         </p>  
<?php        
    }    
} 

?>