<?php
/**
 * Main template file
 *
 * @package Gingersnap
 */

get_header() ?>

<?php
if ( have_posts() ) :

	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/post/content', get_post_format() );

	endwhile;

else :

	get_template_part( 'template-parts/post/content', 'none' );

endif;
?>

<?php get_footer() ?>
