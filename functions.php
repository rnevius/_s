<?php
/**
 * chefs functions and definitions
 *
 * @package chefs
 */


if ( ! function_exists( 'chefs_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function chefs_setup() {

		/*
		 * Enable support for "enhanced" WordPress theme functionality
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support
		 */

		// Post Thumbnails / Featured Images
		// add_theme_support( 'post-thumbnails' );

		// RSS feed links in header (automatically generated).
		// add_theme_support( 'automatic-feed-links' );

		// HTML5 Markup Output - Switch default core markup for search form, comment form, and comments.
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
		) );

		// Post Format support. See http://codex.wordpress.org/Post_Formats
		// add_theme_support( 'post-formats', array(
		// 	'aside', 'image', 'video', 'quote', 'link',
		// ) );

		/*
		 * Register Navigation Menus
		 *
		 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus
		 */
		register_nav_menus( array(
			'primary' => 'Primary Menu',
			// 'footer_menu' => 'My Custom Footer Menu',
		) );

	}
}
add_action( 'after_setup_theme', 'chefs_setup' );


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function chefs_widgets_init() {
	register_sidebar( array(
		'name'          => 'Sidebar',
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'chefs_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function chefs_scripts() {
	wp_enqueue_style( 'chefs-style', get_stylesheet_uri() );

	// wp_enqueue_script( 'chefs-skip-link-focus-fix', get_template_directory_uri() . '/something.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'chefs_scripts' );

