<?php
/**
 * @package Rebecca Hill
 */
?>

<div class="article-wrapper">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->
	
		<div class="entry-content">
			<?php the_excerpt(); ?>
	
	
			<a href="<?php the_permalink()?>"><button>Read More</button></a>
			
			<!-- //TODO: check paging links -->
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'rebeccahill' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

	<?php if (get_the_post_thumbnail()) : ?>
		<a href="<?php the_permalink()?>">
			<img src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(),'large')[0]?>" class="thumb" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)?>">
		</a>
	<?php endif;?>

	</article><!-- #post-## -->

</div>
<!-- 
TODO: make sure whole projects box is clickable
-->
