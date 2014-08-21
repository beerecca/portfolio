<?php

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<!-- Display Home page content -->
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


		<!-- Display Latest Portfolio Items -->
		<h2>Favourite Projects</h2>
		<ul>
			<?php $args = array(
				'showposts' => '3', 
				'post_type' => 'portfolio'
				);
				$portfolio_query = new WP_Query($args); ?>
			<?php while ($portfolio_query -> have_posts()) : $portfolio_query -> the_post(); ?>
			<li>
				<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
				<?php the_excerpt(__('(more…)')); ?>
				
			</li>
			<?php wp_reset_postdata(); endwhile;?>
		</ul>

		<!-- Display Latest Thoughts -->
		<h2>Deepest Thoughts</h2>
		<ul>
			<?php $args = array(
				'showposts' => '3',
				);
				$thoughts_query = new WP_Query($args); ?>
			<?php while ($thoughts_query -> have_posts()) : $thoughts_query -> the_post(); ?>
			<li>
				<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
				<?php the_excerpt(__('(more…)')); ?>
			</li>
			<?php endwhile;?>
		</ul>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
