<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Rebecca Hill
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">

			<?php if (is_page('about')): ?>
				<div id="image_rotate" class="me" data-src="<?php echo get_stylesheet_directory_uri();?>/img/acro.gif"></div>
				<!-- <div id="image_rotate" class="me" data-src="<?php echo get_stylesheet_directory_uri();?>/img/dystopiangif.gif"></div> -->
			<?php endif ?>

		<?php the_content(); ?>

			
		<?php the_post_thumbnail(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'rebeccahill' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if (get_field('right_column')): ?>
	
		<div>
			
			<?php the_field('right_column')?>
		</div> 

	<?php endif ?>


</article><!-- #post-## -->
