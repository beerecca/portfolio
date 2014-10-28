<?php
/**
 * Rebecca Hill functions and definitions
 *
 * @package Rebecca Hill
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'rebeccahill_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rebeccahill_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Rebecca Hill, use a find and replace
	 * to change 'rebeccahill' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'rebeccahill', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'rebeccahill' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	/*
	 * Enable support for Post Thumbnails.
	 */
	add_theme_support( 'post-thumbnails' );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'rebeccahill_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // rebeccahill_setup
add_action( 'after_setup_theme', 'rebeccahill_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function rebeccahill_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'rebeccahill' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'rebeccahill_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

// TypeKit
wp_enqueue_script( 'typekit', '//use.typekit.net/rdr7hul.js');

function typekit_inline() {
	  if ( wp_script_is( 'typekit', 'done' ) ) { ?>
	    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	<?php }
}
add_action( 'wp_head', 'typekit_inline' );


function rebeccahill_scripts() {

	wp_enqueue_style( 'rebeccahill-style', get_template_directory_uri() . '/style.min.css' );

	wp_enqueue_script( 'rebeccahill-js', get_template_directory_uri() . '/js/scripts.min.js', array(), false, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rebeccahill_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Register Custom Post Type
 */

function codex_custom_init() {
    $args = array(
      'public' => true,
      'label'  => 'Portfolio',
      'hierarchical' => true,
      'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
      'has_archive' => true
    );
    register_post_type( 'portfolio', $args );
}
add_action( 'init', 'codex_custom_init' );


/**
 * Register Custom Post Taxonomy
 */

function create_portfolio_taxonomies() {
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'category' ),
	);

	register_taxonomy( 'rh_category', 'portfolio', $args );
}

add_action( 'init', 'create_portfolio_taxonomies', 0 );


/**
 * Remove comment form allowed tags info
 */

add_filter( 'comment_form_defaults', 'remove_comment_form_allowed_tags' );
function remove_comment_form_allowed_tags( $defaults ) {
	$defaults['comment_notes_after'] = '';
	return $defaults;
}

/**
 * Remove comment form url field
 */

add_filter('comment_form_default_fields', 'url_filtered');
function url_filtered($fields)
{
  if(isset($fields['url']))
   unset($fields['url']);
  return $fields;
}


/**
 * Allow post and portfolio re-ordering
 */

add_post_type_support( 'post', 'page-attributes' );


function portfolio_order( $query ) {
    if ( $query->is_post_type_archive('portfolio') && $query->is_main_query() ) {
        $query->set( 'orderby', 'menu_order' );
        $query->set( 'order', 'ASC' );
    }
}
add_action( 'pre_get_posts', 'portfolio_order' );

