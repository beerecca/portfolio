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

	<div class="entry-content <?php if (get_field('right_column')) { echo "col-md-6"; }?>">
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
	
		<div class="col-md-6">
			<?php if (is_page('about')): ?>
				<div id="image_rotate" class="me" data-src="http://giant.gfycat.com/FondIdleAnkolewatusi.gif"></div>
			<?php endif ?>
			<?php the_field('right_column')?>
		</div> 

	<?php endif ?>


</article><!-- #post-## -->
