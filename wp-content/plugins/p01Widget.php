<?php
/*
Plugin Name: Widget de prueba 01
Plugin URI: http://www.elwebmaster.cl
Description: Plugin Widget Awesome, vamos a crear una interfaz basica de un widget-http://codex.wordpress.org/es:API_de_Widget. jagl segul lo que he investigado hasta el momento es el codigo minimo para hacer el widget
Version: 1.0
Author: Jorge Gatica
Author URI: http://www.w7.cl
*/

class p01Widget extends WP_Widget {
        function p01Widget () {
        	$widget_options = array(
        			'classname' => 'simple-widget',
        			'description' => 'Un simple Widget de jorge'
        	);
        	
        	//simple_widget vera reflejado en la funcion form
        	parent::WP_Widget('p01_Widget', 'p01 Widget', $widget_options);   
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

function p01Widget_init() {
        register_widget("p01Widget");
}

add_action('widgets_init', 'p01Widget_init');
?>