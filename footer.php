<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package Gingersnap
 */
?>

	</div> <!-- site-content -->

	<?php get_sidebar(); ?>

</div> <!-- site-container -->

<footer id='site-footer'>
	<?php wp_nav_menu( array( "theme_location" => 'footer-nav-menu' ) ) ?>
	<?php wp_nav_menu( array( "theme_location" => 'social-links-menu' ) ) ?>

	<h1>&copy; 2017 Gingersnap</h1>

</footer>

<?php wp_footer(); ?>

</body>
</html>
