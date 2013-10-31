<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1" />
	<title>
	<?php 
		global $page, $paged; 
		#wp_title
		# define el separador (primer argumento) que se usara, en este caso una barra vertical,
		# y donde va a ir colocado(tercer argumento)
		# el sengundo parametro,
		# si no es verdadero devuelve el valor como una cadena de php,
		# si es verdadero se muestra por pantalla, medienta echo
		wp_title( '|', true, 'right' );
		
		#bloginfo( 'name' );
		# nos dara el nombre real del sitio,
		# esta funcion muestra por echo la cadena con el titulo
		bloginfo( 'name' );
		
		#get_bloginfo( 'description' , 'display' )
		# en este caso retornara la descripcion del sitio y lo almacenara
		# en una variable. $site_description y abajo evaluara el resultado
		$site_description = get_bloginfo( 'description' , 'display' );
		
		//si nos encontramos en la pagina home, se mostrara la descripcion
		if ( $site_description && (is_home() || is_front_page() ))
			echo " | $site_description";
		//si no se sustituira por el numero de la pagina
		if ( $paged >= 2 || $page >= 2 )
			echo " | " . sprintf( __( 'Page %s' ), max ( $paged, $page ) );
	?>		
	</title>
	<link type="text/css" rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" media="all" />
	<link type="text/css" rel="pingback"  href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!-- detecta los navegadores anteriores a ie9 y le aplica adapta a las funcionalidades mas mmodernas -->
	<!--[if lt IE 9]>
	<!--  entrega la url a la plantilla http://localhost/wp/wp-content/themes/miplantilla  -->
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript">
	</script> 
	<![endif]-->
	<!-- esta funcion(is_singular) detecta si es una pagina unica y 
	si la opcion de comentarios esta disponibleget_option( 'thread_comments' )
	en tal caso la funcion wp_enqueue_script devolvera el codigo javascript(¿que codigo?)
	 -->
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' );  ?>
	
	<!-- la funcion wp_head() es necesaria para muchos plugin que la requieren para su funcionamiento -->
	<?php wp_head(); ?>
</head>
<!-- body_class(); insertara un atributo class con sus valores que nos ayudaran a identificar la pagina 
y nos ayudaran a aplicarle estilos personalizados, cada tipo de pagina recivira una clase 
o varias diferentes, por lo que podremos aplicar estilos determinados a cada una. -->
<body <?php body_class(); ?>>
	<div id="contenedorPrincipal">
		<header>
			<!-- get_option('home') enlace al sitio http://localhost/wp/ -->
			<!-- bloginfo('name') nombre del la pagina  -->
			<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		</header>
		<!-- wp_nav_menu() Esta funcion convertira cualquier pagina creada en enlaces para el menu -->
		<nav class="menuPrincipal"><?php wp_nav_menu(); ?></nav>