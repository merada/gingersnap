<?php
/**
 * Post template file
 *
 * @package Gingersnap
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php if ( is_sticky() ) : ?>
			<hgroup>
				<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<h3><?php _e( 'Featured', 'gingersnap' ); ?></h3>
			</hgroup>
		<?php else : ?>
		<h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php endif; ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php gingersnap_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() || is_front_page() ) : // Only display Excerpts for Search and Front Page ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
		<a href="<?php the_permalink(); ?>" title="Continue reading <?php the_title(); ?>" class="more-link">Continue reading »</a>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="content">
		<?php the_content() ?>
	</div><!-- .content -->
	<?php endif; ?>

	<footer>
		<?php $show_sep = false; ?>
		<?php if ( is_object_in_taxonomy( get_post_type(), 'category' ) ) : // Hide category text when not supported ?>
		<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'gingersnap' ) );
			if ( $categories_list ):
		?>
		<span class="cat-links">
			<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'gingersnap' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );
			$show_sep = true; ?>
		</span>
		<?php endif; // End if categories ?>
		<?php endif; // End if is_object_in_taxonomy( get_post_type(), 'category' ) ?>

		<?php if ( comments_open() ) : ?>
		<?php if ( $show_sep ) : ?>
		<span class="sep"> | </span>
		<?php endif; // End if $show_sep ?>
		<span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'gingersnap' ) . '</span>', __( '<b>1</b> Reply', 'twentyeleven' ), __( '<b>%</b> Replies', 'gingersnap' ) ); ?></span>
		<?php endif; // End if comments_open() ?>

		<?php edit_post_link( __( 'Edit', 'gingersnap' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>

</article><!-- #post-## -->
