<?php
/*
Template Name: Mi propia planti
*/
get_header(); 
?>
<p>este es mi contenido de la plantilla ubicadad en twentyten/miplanti.php y no me funciona el shortcode si lo coloco aca [tf] por que lo estoy colocando directamente</p>
<h3>Ahora lo colocare segun la pagina</h3>
<p>
<a href="http://css-tricks.com/snippets/wordpress/shortcode-in-a-template/">http://css-tricks.com/snippets/wordpress/shortcode-in-a-template/</a>
</p>
<p> Este es el shorcode 
<?php echo do_shortcode("[tf]"); ?>
</p>
<?php get_footer(); ?>