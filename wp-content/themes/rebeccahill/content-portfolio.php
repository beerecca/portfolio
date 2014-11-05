<?php
/**
 * @package Rebecca Hill
 */

$screenshot = get_field('screenshot');

/*$screenshot = get_field('screenshot')['sizes']['large'];*/
?>

<div class="background" aria-hidden="true">
	<?php get_template_part('img/inline', '2.svg');?>
</div>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if (get_field('introduction')):?>
			<div class="intro"><?php the_field('introduction');?></div>
		<?php endif;?>
		
		<?php if( !empty($screenshot) ): ?>
			<div class="shot-wrapper">
				<div class="clip">
					<img class="screenshot" data-50p-top="transform:translateY(0px)" data-10p-top="transform:translateY(0px)" src="<?php echo $screenshot['url']; ?>" alt="<?php echo $screenshot['alt']; ?>" />
				</div>
				<img class="imac" src="<?php echo get_stylesheet_directory_uri()?>/img/imac.png" alt="iMac">
			</div>
		<?php endif; ?>

		<?php the_content(); ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'rebeccahill' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
