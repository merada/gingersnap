<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package Gingersnap
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<h1><?php the_title() ?></h1>
	<div class="content">
		<?php the_content(); ?>
	</div><!-- .content -->

</article><!-- #post-## -->
