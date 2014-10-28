<?php
/* This template is used to display the Home page. */

get_header(); ?>

<div class="home-background" aria-hidden="true">
	<?php get_template_part('img/inline', 'home.svg');?>
</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<section>
			<?php if ( have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php
						the_content();
					?>
				<?php endwhile; ?>
			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>
		</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
