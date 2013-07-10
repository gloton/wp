<?php
#este archivo search.php se basa en el archivo index.php de esta plantilla
//incluiremos la cabecera, es decir, header.php
get_header();
?>
<div id="contentWrap">
	<!-- colocaremos un contenedor solo para el contenido -->
	<div id="contenido">
	<!-- comprobamos si existen entradas en el blog -->
	<?php if ( have_posts() ) : ?>
		<h2 id="tituloPagina">Resultados de la busqueda</h2>
		<!-- con el bucle wihile recuperara las entradas desde la base de datos -->
		<?php while ( have_posts() ) : the_post(); ?>
			<!-- cada entrada ira en una seccion llamada article con una clase determinada
			y un id propio -->
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<!-- nombre de la entrada o post. Este nombre servira de enlace a un
				enlace permanente que llevara al usuario a visitar solamente esa entrada
				solamente -->
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<!-- informaremos sobre la fecha de creacion de la entrada
				y el autor de la misma -->
				<div class="entry">
					<!-- esto seria el contenido de la entrada -->
					<?php the_excerpt(); ?>
				</div>
			</article>
		<?php endwhile; ?>
	<?php else : ?>
			<!-- SI HAY ENTRADAS -->
			<h2>Ningun resultado para esa busqueda</h2>
	<?php endif; ?>
	</div>
	<h4>Sidebar</h4>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>