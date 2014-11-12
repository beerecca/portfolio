<?php
/* This template is used to display the Portfolio page */

get_header(); ?>

<div class="background" aria-hidden="true">
	<?php get_template_part('img/inline', '2.svg');?>
</div>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
			$id=11;
			$post = get_post($id);
			$title = apply_filters('the_title', $post->post_title);
			echo '<h1>'.$title.'</h1>';
			$content = apply_filters('the_content', $post->post_content);
			echo $content;
		?>

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<div class="clear">
				
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() );?>

				<?php endwhile; ?>
				
			</div>
			
			<?php rebeccahill_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->


<?php get_footer(); ?>
