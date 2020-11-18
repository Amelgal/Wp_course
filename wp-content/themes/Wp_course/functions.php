<?php
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'wp_course_setup' ) ) :

	function wp_course_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Wp_course, use a find and replace
		 * to change 'wp_course' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wp_course', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'wp_course' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'wp_course_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'wp_course_setup' );

function wp_course_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_course_content_width', 640 );
}
add_action( 'after_setup_theme', 'wp_course_content_width', 0 );

function wp_course_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wp_course' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wp_course' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wp_course_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wp_course_scripts() {
	wp_enqueue_style( 'wp_course-style', get_stylesheet_uri(), array(), _S_VERSION );
    wp_enqueue_style( 'normalize', get_template_directory_uri().'/css/normalize.css', array("wp_course-style"), _S_VERSION );
    wp_enqueue_style( 'wp_course-main-style', get_template_directory_uri().'/css/style.css', array("wp_course-style"), _S_VERSION );

    wp_style_add_data( 'wp_course-style', 'rtl', 'replace' );

	wp_enqueue_script( 'wp_course-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_course_scripts' );

function swim_setup_post_type() {
    $labels = array(
        'name'                  => _x( 'Swim', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Swim', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Swimming types', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Swim', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New type', 'textdomain' ),
        'new_item'              => __( 'New type', 'textdomain' ),
        'edit_item'             => __( 'Edit type', 'textdomain' ),
        'view_item'             => __( 'View type', 'textdomain' ),
        'all_items'             => __( 'All types', 'textdomain' ),
        'search_items'          => __( 'Search type', 'textdomain' ),
        'not_found'             => __( 'No types found.', 'textdomain' ),
        'archives'              => _x( 'Types archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
    );
    $args = array(
        'public'    => true,
        'labels'    => $labels,
        'has_archive'=> true,
    );
    register_post_type( 'Swim', $args );
}
add_action( 'init', 'swim_setup_post_type' );


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

