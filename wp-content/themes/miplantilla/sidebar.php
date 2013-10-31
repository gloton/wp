<div class="widget-area">
	<!--  comprueba si existe un sidebar dinamico llamado Sidebar Widgets -->
	<?php if ( ! dynamic_sidebar( 'Sidebar Widgets' ) ): ?>
	<?php endif; // fin del area de widgets ?>
	<!-- añadiremos unos widget basicos que se mostraran en la pagina
	hasta que se cambien en el escritorio  -->
	<aside id="search" class="widget">
	<!-- widget de busqueda con una funcion especifica -->
	<?php get_search_form(); ?>
	</aside>
	<!-- widget de entradas escritas en el mes anterior -->
	<aside id="archive" class="widget">
		<h3 class="titulo-widget">Archivos</h3>
		<!-- como los enlaces que obtendremos llegaran en formato li
		es deciir en formato de lista abriremos un ul  -->
		<ul>
			<?php wp_get_archives('type=monthly&limit=12'); ?>
		</ul>
	</aside>
</div>