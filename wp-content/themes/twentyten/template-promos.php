<?php
/*
Template Name: Template Promos
*/
get_header(); 
// The Query
$args = array('category__in'=> 9,'posts_per_page'=> 2);
$the_query = new WP_Query( $args );
?>
<?php 
// The Loop
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
?>
<div>
	<h3><a href="<?php echo the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
</div>
<?php 		
		echo '<li>' . get_the_title() . '</li>';
		echo '<div>' . the_content() . '</div>';
	}
} else {
	// no posts found
}
/* Restore original Post Data */
wp_reset_postdata();
?>
			
<?php get_footer(); ?>	