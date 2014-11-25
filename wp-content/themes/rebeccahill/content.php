<?php
/**
 * @package Rebecca Hill
 */

//Thumbnail Image
$thumbArray = wp_get_attachment_image_src(get_post_thumbnail_id(),'large');
$thumb = $thumbArray[0];
?>

<div class="article-wrapper">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->
	
		<div class="entry-content">
			<?php if(is_post_type_archive('portfolio')):?>
				<a href="<?php the_permalink()?>">
			<?php endif;?>

			<?php the_excerpt(); ?>

			<?php if(is_post_type_archive('post')):?>
				<a href="<?php the_permalink()?>">
			<?php endif;?>

			<button>Read More</button>
			</a>
		</div><!-- .entry-content -->

	<?php if (get_the_post_thumbnail()) : ?>
		<a href="<?php the_permalink();?>">
			<img src="<?php echo $thumb; ?>" class="thumb" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)?>">
		</a>
	<?php endif;?>

	</article><!-- #post-## -->

</div>