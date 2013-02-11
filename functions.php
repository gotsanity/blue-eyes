<?php
/**
 * Blue Eyes 1.0 functions and definitions
 *
 * @package Blue Eyes 1.0
 * @since Blue Eyes 1.0 1.0
 */
/**
 * Initialize custom JS scripts
 */
function my_init() {
	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		//wp_deregister_script('jquery'); 
		//wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js', false, '1.3.2'); 
		wp_enqueue_script('jquery-1.9.1.min', get_template_directory_uri() . '/js/jquery-1.9.1.min.js', array( 'jquery' ), '1.9.1', true );
		wp_enqueue_script('cufon-yui', get_bloginfo('template_url') . '/js/cufon-yui.js', array('jquery'), '1.0', true);
		wp_enqueue_script('jquery.easing.1.3', get_bloginfo('template_url') . '/js/jquery.easing.1.3.js', array('jquery'), '1.3', true);
		wp_enqueue_script('sliding-menu', get_bloginfo('template_url') . '/js/sliding-menu.js', array('jquery'), '1.0', true);
		wp_enqueue_script('image-wrap', get_bloginfo('template_url') . '/js/image-wrap.js', array('jquery'), '1.0', true);
		wp_enqueue_script('equalheight', get_bloginfo('template_url') . '/js/equalheight.js', array('jquery'), '1.0', true);
		wp_register_style( 'sliding-menu-css', get_template_directory_uri() . '/layouts/sliding-menu.css', array(), '20120208', 'all' );
		wp_enqueue_style( 'sliding-menu-css' );
		wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );
	}
}
add_action('init', 'my_init');


/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Blue Eyes 1.0 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

/*
 * Load Jetpack compatibility file.
 */
require( get_template_directory() . '/inc/jetpack.php' );

if ( ! function_exists( 'blue_eyes_1_0_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Blue Eyes 1.0 1.0
 */
function blue_eyes_1_0_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Customizer additions
	 */
	require( get_template_directory() . '/inc/customizer.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Blue Eyes 1.0, use a find and replace
	 * to change 'blue_eyes_1_0' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'blue_eyes_1_0', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'blue_eyes_1_0' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // blue_eyes_1_0_setup
add_action( 'after_setup_theme', 'blue_eyes_1_0_setup' );

/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for WordPress 3.3
 * using feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Remove the 3.3 support when WordPress 3.6 is released.
 *
 * Hooks into the after_setup_theme action.
 */
function blue_eyes_1_0_register_custom_background() {
	$args = array(
		'default-color' => 'ffffff',
		'default-image' => '',
	);

	$args = apply_filters( 'blue_eyes_1_0_custom_background_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-background', $args );
	} else {
		define( 'BACKGROUND_COLOR', $args['default-color'] );
		if ( ! empty( $args['default-image'] ) )
			define( 'BACKGROUND_IMAGE', $args['default-image'] );
		add_custom_background();
	}
}
add_action( 'after_setup_theme', 'blue_eyes_1_0_register_custom_background' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Blue Eyes 1.0 1.0
 */
function blue_eyes_1_0_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'blue_eyes_1_0' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'blue_eyes_1_0_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function blue_eyes_1_0_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'blue_eyes_1_0_scripts' );

/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );
