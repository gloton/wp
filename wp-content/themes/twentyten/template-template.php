<?php 
/*
Template Name: Template
*/
get_header();
echo "Este es el contenido desde un template";
?>
<?php echo do_shortcode("[formcraft id='1']"); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
