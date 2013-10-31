<?php
//incluiremos la cabecera, es decir, header.php
get_header();
?>
<div id="contentWrap">
	<!-- colocaremos un contenedor solo para el contenido -->
	<div id="contenido">
	<!-- comprobamos si existen entradas en el blog -->
	<?php if ( have_posts() ) : ?>
		<!-- comprobamos si pertenece a alguna categoria -->
		<?php if (is_category()) { ?>
			<h2 id="tituloArchivo">Archivo de la categoria <?php single_cat_title(); ?></h2>
		<!-- con la funcion if y is_tag se comprueba si el criterio de archivo pertenece a una etiqueta -->
		<?php } elseif (is_tag()) { ?>
			<h2 id="tituloArchivo">Entradas etiquetadas como <?php single_tag_title(); ?></h2>
			<!-- primero comprobara si es un dia en concreto -->    
			<?php } elseif (is_day()) { ?>
				<h2 id="tituloArchivo">Archivo del dia <?php the_time('j-m-Y'); ?></h2>
			<!-- despues pasara a comprobar si se trata de un mes  -->
			<?php } elseif (is_month()) { ?>
				<h2 id="tituloArchivo">Archivo mensual: <?php the_time('F-Y'); ?></h2>
			<!-- y por ultimo a un año -->
			<?php } elseif (is_year()) { ?>
				<h2 id="tituloArchivo">Archivo del año <?php the_time('Y'); ?></h2>
				<!-- la siguiente linea compueba si es el autor -->
			<?php } elseif (is_author()) { ?>
				<h2 id="tituloArchivo">Archivo de autor</h2>
			<!-- para que se muestre un titulo de archivo en general  -->
			<?php } elseif ( isset($_GET['paged']) && !empty($_GET['paged']) ) { ?>
				<h2 id="tituloArchivo">Archivos</h2>
			<?php } ?> 
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
	</div>
	<h4>Sidebar</h4>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>