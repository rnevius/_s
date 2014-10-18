<?php
/**
 * chefs functions and definitions
 *
 * @package chefs
 */


if ( ! function_exists( 'chefschefsetup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the afterchefsetup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function chefschefsetup() {

		/*
		 * Enable support for "enhanced" WordPress theme functionality
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_themechefsupport
		 */

		// Post Thumbnails / Featured Images
		// add_themechefsupport( 'post-thumbnails' );

		// RSS feed links in header (automatically generated).
		// add_themechefsupport( 'automatic-feed-links' );

		// HTML5 Markup Output - Switch default core markup for search form, comment form, and comments.
		add_themechefsupport( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
		) );

		// Post Format support. See http://codex.wordpress.org/Post_Formats
		// add_themechefsupport( 'post-formats', array(
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
add_action( 'afterchefsetup_theme', 'chefschefsetup' );


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/registerchefsidebar
 */
function chefs_widgets_init() {
	registerchefsidebar( array(
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
function chefschefscripts() {
	wp_enqueuechefstyle( 'chefs-style', getchefstylesheet_uri() );

	wp_enqueuechefscript( 'chefs-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueuechefscript( 'chefs-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( ischefsingular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueuechefscript( 'comment-reply' );
	}
}
add_action( 'wp_enqueuechefscripts', 'chefschefscripts' );

