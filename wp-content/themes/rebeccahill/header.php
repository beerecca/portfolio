<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Rebecca Hill
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if(is_front_page()):?>
<div class="background" aria-hidden="true">
	<?php get_template_part('img/inline', '1.svg');?>
</div>
<?php endif;?>

<?php if(is_post_type_archive('portfolio')):?>
<div class="background" aria-hidden="true">
	<?php get_template_part('img/inline', '2.svg');?>
</div>
<?php endif;?>

<?php if(is_home()):?>
<div class="background" aria-hidden="true">
	<?php get_template_part('img/inline', '3.svg');?>
</div>
<?php endif;?>

<div id="page" class="hfeed site container-fluid">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'rebeccahill' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<?php get_template_part('img/inline', 'logo.svg');?>
		<!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.svg" alt="rebeccahill.co.nz"> -->
		</a></h1>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<!-- <button class="menu-toggle"><?php _e( '☰', 'rebeccahill' ); ?></button> -->
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
