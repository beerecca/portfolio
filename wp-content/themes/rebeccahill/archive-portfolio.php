<?php
/* This template is used to display the Portfolio page */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main container" role="main">

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
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php rebeccahill_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->


<?php get_footer(); ?>
