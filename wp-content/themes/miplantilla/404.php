<?php
//incluiremos la cabecera, es decir, header.php
get_header();
?>
<div id="contentWrap">
	<!-- colocaremos un contenedor solo para el contenido -->
	<div id="contenido">
		<h4>Lo sentimos, la pagina no existe</h4>
	</div>
	<h4>Sidebar</h4>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>