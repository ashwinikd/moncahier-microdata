<?php
/**
 * Functions and definitions
 *
 * @package mon_cahier
 * @since mon_cahier 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since mon_cahier 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'mon_cahier_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since mon_cahier 1.0
 */
function mon_cahier_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );
	
	
	/**
	 * Custom Theme Options
	 */
	require( get_template_directory() . '/inc/theme-options.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on _s, use a find and replace
	 * to change 'mon_cahier' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'mon_cahier', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'mon_cahier' ),
	) );

	/**
	 * Add support for the Aside and Gallery Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'quote' ) );
	
	
	/**
	 * Add styling for editor for both LTR and RTL
	 */
	add_theme_support( 'editor-style', 'editor-style-rtl' );
	
	/**
	 * Add featured image support
	 */
	add_theme_support( 'post-thumbnails' ); 
	set_post_thumbnail_size( 640, 200, true );
	
	/**
	 * Add Custom Bacckground support
	 */
	$args = array(
		'default-color' => 'ffffff',
		'default-image' => get_template_directory_uri() . '/images/grid.png',
	);

	$args = apply_filters( 'mon_cahier_custom_background_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-background', $args );
	} else {
		define( 'BACKGROUND_COLOR', $args['default-color'] );
		define( 'BACKGROUND_IMAGE', $args['default-image'] );
		add_theme_support( 'custom-background', $args );
	}
	
}
endif; // mon_cahier_setup
add_action( 'after_setup_theme', 'mon_cahier_setup' );



/**
 * Add link and rollover colours to customizer
 *
 * @since mon_cahier 1.0
 */
function mon_cahier_customize_register($wp_customize){

    $wp_customize->add_setting('mon_cahier_theme_options[link_color]', array(
        'default' => '000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
        'type' => 'option',

    ));

	$wp_customize->add_setting('mon_cahier_theme_options[rollover_color]', array(
	    'default' => '000',
	    'sanitize_callback' => 'sanitize_hex_color',
	    'capability' => 'edit_theme_options',
	    'type' => 'option',

	));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'link_color', array(
        'label' => __('Link Color', 'mon_cahier'),
        'section' => 'colors',
        'settings' => 'mon_cahier_theme_options[link_color]',
    )));

	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'rollover_color', array(
	    'label' => __('Rollover Color', 'mon_cahier'),
	    'section' => 'colors',
	    'settings' => 'mon_cahier_theme_options[rollover_color]',
	)));
}

add_action('customize_register', 'mon_cahier_customize_register');


/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since mon_cahier 1.0
 */
function mon_cahier_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'mon_cahier' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'mon_cahier_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function mon_cahier_scripts() {
	global $post;

	wp_enqueue_style( 'style', get_stylesheet_uri() );
	
	wp_enqueue_style('googleFonts', 'http://fonts.googleapis.com/css?family=Cutive|Reenie+Beanie');

	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', 'jquery', '20120206', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image( $post->ID ) ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'mon_cahier_scripts' );

/**
 * Implement the Custom Header feature
 */
 require( get_template_directory() . '/inc/custom-header.php' );


function mon_cahier_link_color(){
	$mon_cahier_options = get_option( 'mon_cahier_theme_options' );
	if ( isset( $mon_cahier_options['link_color'] ) ) { ?>
		<style>
			a {color: <?php echo $mon_cahier_options['link_color']; ?>}
			a:hover {color: <?php echo $mon_cahier_options['rollover_color']; ?>}
		</style>		
	<?php }

	}
add_action( 'wp_head', 'mon_cahier_link_color' );
