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
wp_enqueue_script( 'typekit', '//use.typekit.net/euj7roz.js');

function typekit_inline() {
	  if ( wp_script_is( 'typekit', 'done' ) ) { ?>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	<?php }
}
add_action( 'wp_head', 'typekit_inline' );

//Note this typekit package contains PT Sans Regular, Bold, Italic
//and Adelle Thin (100), Regular (400) and Semibold (600)

//If Typekit is taking ages and blocking rendering, try the async way as below.
//Also will need to visibility hide text until Typekit loads to prevent FOUT
//Or until timeout happens and Typekit is unsuccessful
//http://help.typekit.com/customer/portal/articles/6852
//TODO: somethings obviously not right with typekit, getting fout. also loads messy

/*function typekit_inline() {?>

<script>
  (function(d) {
    var config = {
      kitId: 'euj7roz',
      scriptTimeout: 3000
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='//use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>

<?php }
add_action( 'wp_head', 'typekit_inline' );
*/



function rebeccahill_scripts() {

	wp_enqueue_style( 'rebeccahill-style', get_template_directory_uri() . '/style.min.css' );


	if ( !is_admin() ) { 
		wp_deregister_script('jquery'); 
		wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"), false);
		wp_enqueue_script('jquery'); 
	}

	wp_enqueue_script( 'rebeccahill-js', get_template_directory_uri() . '/js/scripts.min.js', array(), false, true );

	if ( is_singular('post') && comments_open() && get_option( 'thread_comments' ) ) {
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
      'rewrite' => array('with_front' => true),
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


//TODO: modernizr isnt going to work as its not in the head, does this matter, am i even using it?

// The code below finds the menu item with the class "[CPT]-menu-item" and adds another “current_page_parent” class to it.
// Furthermore, it removes the “current_page_parent” from the blog menu item, if this is present. 
// Via http://vayu.dk/highlighting-wp_nav_menu-ancestor-children-custom-post-types/
 
add_filter('nav_menu_css_class', 'current_type_nav_class', 10, 2);
function current_type_nav_class($classes, $item) {
    // Get post_type for this post
    $post_type = get_query_var('post_type');
 
    // Removes current_page_parent class from blog menu item
    if ( get_post_type() == $post_type )
        $classes = array_filter($classes, "get_current_value" );
 
    // Go to Menus and add a menu class named: {custom-post-type}-menu-item
    // This adds a current_page_parent class to the parent menu item
    if( in_array( $post_type.'-menu-item', $classes ) )
        array_push($classes, 'current_page_parent');
 
    return $classes;
}
function get_current_value( $element ) {
    return ( $element != "current_page_parent" );
}



//Remove Contact Form 7 JS and CSS (have minified and concatenated myself)
add_filter( 'wpcf7_load_css', '__return_false' );
add_filter( 'wpcf7_load_js', '__return_false' );



//Remove stupid wordpress inline style for recent comments
function remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'remove_recent_comments_style' );



//Add ajax commenting (better error handling) as per http://www.makeuseof.com/tag/ajaxify-wordpress-comments/
add_action('comment_post', 'ajaxify_comments',20, 2);
function ajaxify_comments($comment_ID, $comment_status){
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
		//If AJAX Request Then
		switch($comment_status){
			case '0':
			//notify moderator of unapproved comment
			wp_notify_moderator($comment_ID);
			case '1': //Approved comment
			echo "success";
			$commentdata=&get_comment($comment_ID, ARRAY_A);
			$post=&get_post($commentdata['comment_post_ID']);
			wp_notify_postauthor($comment_ID, $commentdata['comment_type']);
			break;
			default:
			echo "error";
		}
		exit;
	}
}