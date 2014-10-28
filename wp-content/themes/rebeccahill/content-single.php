<?php
/**
 * @package Rebecca Hill
 */

$screenshot = get_field('screenshot');
$mobScreenshot = get_field('mobile_screenshot');
?>

<div class="background" aria-hidden="true">
	<?php get_template_part('img/inline', '2.svg');?>
</div>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php rebeccahill_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="row">
		<div class="entry-content <?php if (!empty($screenshot) || !empty($mobScreenshot)) { echo "col-md-6"; }?>">
			<?php the_content(); ?>
			<!-- <img src="<?php echo get_stylesheet_directory_uri();?>/img/iphone.png" alt="iPhone"> TODO: do we want this in here? or doing it in wordpress?--> 
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'rebeccahill' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<div class="screenshots col-md-6">
			
			<?php if( !empty($screenshot) ): ?>
				<div class="clip">
					<img data-start="transform:translateY(0%)" data-end="transform:translateY(-50%)" class="screenshot" src="<?php echo $screenshot['url']; ?>" alt="<?php echo $screenshot['alt']; ?>" />
				</div>
				<img class="imac" src="<?php echo get_stylesheet_directory_uri()?>/img/imac.png" alt="iMac">
			<?php endif; ?>

			<?php if( !empty($mobScreenshot) ): ?>
				<!-- <img class="iphone" src="<?php echo get_stylesheet_directory_uri()?>/img/iphone.png" alt="iPhone">
				<img class="mob-screenshot" src="<?php echo $mobScreenshot['url']; ?>" alt="<?php echo $mobScreenshot['alt']; ?>" />
 -->
			<?php endif; ?>

		</div><!-- .screenshots -->
	</div><!-- .row -->

</article><!-- #post-## -->
