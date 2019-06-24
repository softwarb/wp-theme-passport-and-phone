<?php
/**
 * Passport & Phone functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Passport_&_Phone
 */

/**
 * remove unwanted css loaded from wordpress & plugins
 */
add_action( 'wp_print_styles', 'remove_styles', 100 );
function remove_styles() {
	// either use wp_deregister_style or wp_dequeue_style, depending on how the plugin added the css
	wp_dequeue_style( 'wp-block-library' ); // gutenberg https://actualwizard.com/how-to-remove-the-wordpress-gutenberg-stylesheet
	wp_dequeue_style( 'wp-block-library-theme' ); // gutenberg
}
add_filter( 'jetpack_implode_frontend_css', '__return_false', 99 ); // jetpack https://css-tricks.com/snippets/wordpress/removing-jetpack-css/

/**
 * Plugin: shared counts, Add On: Pinterest Image
 * Pinterest Sharing Image on pages
 * @see https://github.com/billerickson/Shared-Counts-Pinterest-Image
 */
function be_pinterest_image_on_pages( $post_types ) {
	$post_types[] = 'page';
	return $post_types;
}
add_filter( 'shared_counts_pinterest_image_post_types', 'be_pinterest_image_on_pages' );

if ( ! function_exists( 'wp_theme_passport_and_phone_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wp_theme_passport_and_phone_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Passport & Phone, use a find and replace
		 * to change 'passport-and-phone' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'passport-and-phone', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'passport-and-phone' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'wp_theme_passport_and_phone_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'wp_theme_passport_and_phone_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_theme_passport_and_phone_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'wp_theme_passport_and_phone_content_width', 740 );
}
add_action( 'after_setup_theme', 'wp_theme_passport_and_phone_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_theme_passport_and_phone_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'passport-and-phone' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'passport-and-phone' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wp_theme_passport_and_phone_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wp_theme_passport_and_phone_scripts() {
	wp_enqueue_style( 'passport-and-phone-style', get_stylesheet_uri() );

	wp_enqueue_script( 'passport-and-phone-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'passport-and-phone-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_theme_passport_and_phone_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

