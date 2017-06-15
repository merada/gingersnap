<?php
/**
 * Single post template file
 *
 * @package Gingersnap
 */

get_header() ?>

<?php
if ( have_posts() ) :

	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/post/content', 'single' ); ?>

		<nav id="nav-single">
			<span><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'gingersnap' ) ); ?></span>
			<span><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'gingersnap' ) ); ?></span>
		</nav><!-- #nav-single -->

		<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile;

else :

	get_template_part( 'template-parts/post/content', 'none' );

endif;
?>

<?php get_footer() ?>
