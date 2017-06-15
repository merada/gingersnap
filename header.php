<?php
/**
 * Displays all of the <head> section and everything up until <div id="content">
 *
 * @package Gingersnap
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="localhost">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header id="site-header" class="site-header" role="banner">
	<div id="site-title">
		<h1><a href='<?php echo get_home_url(); ?>'><?php bloginfo('title') ?></a></h1>
	</div>

	<div id="site-header-menu">
		<?php wp_nav_menu( array( "theme_location" => 'header-menu' ) ) ?>
	</div>
</header>

<div id='site-container'>
	<div id='site-content'>
