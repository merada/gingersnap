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

	the_posts_pagination( array(
		'mid_size'  => 2,
		'prev_text' => __( '« Newer', 'textdomain' ),
		'next_text' => __( 'Older »', 'textdomain' ),
	) );

else :

	get_template_part( 'template-parts/post/content', 'none' );

endif;
?>

<?php get_footer() ?>
