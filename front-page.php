<?php
/**
 * Front page template file
 *
 * @package Gingersnap
 */

get_header() ?>

<?php
$latest_blog_posts = new WP_Query( array( 'posts_per_page' => 3 ) );

if ( $latest_blog_posts->have_posts() ) :

	while ( $latest_blog_posts->have_posts() ) : $latest_blog_posts->the_post();

	    get_template_part( 'template-parts/post/content', get_post_format() );

	endwhile;
?>

	<p><a href="<?php echo get_permalink( get_option('page_for_posts' ) ); ?>">Read more</a></p>

<?php
else :

	get_template_part( 'template-parts/post/content', 'none' );

endif;
?>

<?php get_footer() ?>
