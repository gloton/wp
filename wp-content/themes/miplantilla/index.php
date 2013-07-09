<?php
//incluiremos la cabecera, es decir, header.php
get_header();
?>
<div id="contentWrap">
	<!-- colocaremos un contenedor solo para el contenido -->
	<div id="contenido">
	<!-- comprobamos si existen entradas en el blog -->
	<?php if ( have_posts() ) : ?>
		<!-- SI HAY ENTRADAS -->
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
				<div class="meta">
					<em>Fecha:</em> <?php the_time('j-m-Y'); ?>
				    <em>por</em> <?php the_author(); ?>
				</div>	
				<div class="entry">
					<!-- esto seria el contenido de la entrada -->
					<?php the_content(); ?>
				</div>	
				<!-- div con los metadatos del post -->
				<div class="postmetadata">
					<?php the_tags('Etiquetas:', ', ', '<br />');  ?>
					<!-- the_category lista las categorias a las cuales pertenece la entrada sepradas por coma -->
				    Publicado en <?php the_category(', ') ?> |
				    <!-- colara cuando no hay comentarios, cuando hay un comentario y las lineas angulares >> -->
				    <?php comments_popup_link('No hay comentarios &#187;', '1 Comentario &#187;', '% Comentarios &#187;'); ?>
				</div>
			</article>
		<?php endwhile; ?>
	<?php else : ?>
			<!-- SI HAY ENTRADAS -->
			<h2>No existen entradas</h2>
	<?php endif; ?>
	<?php get_sidebar(); ?>
	
	</div>
</div>
<?php get_footer(); ?>