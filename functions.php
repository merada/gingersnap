<?php
/**
 * Gingersnap functions and definitions
 *
 * @package Gingersnap
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gingersnap_setup() {

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	register_nav_menus( array(
		'header-menu'    => __( 'Header Menu', 'gingersnap' ),
		'social-links-menu'    => __( 'Social Links Menu', 'gingersnap' ),
		'footer-nav--menu'    => __( 'Footer Nav Menu', 'gingersnap' ),
	) );
}
add_action( 'after_setup_theme', 'gingersnap_setup' );

function gingersnap_scripts() {
	// Theme stylesheet
	wp_enqueue_style( 'gingersnap-style', get_stylesheet_uri() );

	// FontAwesome icon stylesheet
	wp_enqueue_style ( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css' );
}
add_action( 'wp_enqueue_scripts', 'gingersnap_scripts' );

/**
 * Register site fonts.
 */
function gingersnap_fonts_url() {
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Fira, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$fira = _x( 'on', 'Fira font: on or off', 'gingersnap' );

	if ( 'off' !== $fira ) {
		$font_families = array();

		$font_families[] = 'Fira:100,100i,300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function gingersnap_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'gingersnap-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'gingersnap_resource_hints', 10, 2 );

function gingersnap_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'gingersnap' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar, shown on right of content.', 'gingersnap' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'gingersnap_widgets_init' );

/**
 * Print HTML with meta information for the current post-date/time and author.
 */
function gingersnap_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'gingersnap' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'gingersnap' ), get_the_author() ) ),
		get_the_author()
	);
}

/**
 * Filter out front-page.php when displaying posts on landing page.
 */
function themeslug_filter_front_page_template( $template ) {
    return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'themeslug_filter_front_page_template' );
