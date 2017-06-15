<?php
/**
 * Search results template
 *
 * @package Gingersnap
 */

get_header(); ?>

<header class="page-header">
	<?php if ( have_posts() ) : ?>
		<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'gingersnap' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	<?php else : ?>
		<h1 class="page-title"><?php _e( 'Nothing Found', 'gingersnap' ); ?></h1>
	<?php endif; ?>
</header><!-- .page-header -->

<?php
if ( have_posts() ) :

	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/post/content', get_post_format() );

	endwhile;

	the_posts_pagination( array(
		'mid_size'  => 5,
		'screen_reader_text' => 'More results',
	) );

else : ?>

	<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'gingersnap' ); ?></p>
	<?php
		get_search_form();

endif;
?>

<?php get_footer(); ?>
