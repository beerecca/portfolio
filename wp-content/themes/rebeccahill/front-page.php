<?php
/* This template is used to display the Home page. */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<!-- Display Home page content -->
		<section class="container">
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

		<!-- Display Latest Portfolio Items -->
		<section class="panel container">
			<h2>Favourite Projects</h2>
			<ul class="featured">
				<?php $args = array(
					'showposts' => '3', 
					'post_type' => 'portfolio',
					'rh_category' => 'Featured',
					'orderby' => 'menu_order'
					);
					$portfolio_query = new WP_Query($args); ?>
				<?php while ($portfolio_query -> have_posts()) : $portfolio_query -> the_post(); ?>
				<li>
					<a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
					<!-- <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
					<?php the_excerpt(__('(more…)')); ?> -->
					
				</li>
				<?php wp_reset_postdata(); endwhile;?>
			</ul>
			<button>More Projects</button>
		</section>

		<!-- Display Latest Thoughts -->
		<section class="container">
			<h2>Deepest Thoughts</h2>
			<ul class="featured">
				<?php $args = array(
					'showposts' => '3',
					'orderby' => 'menu_order'
					);
					$thoughts_query = new WP_Query($args); ?>
				<?php while ($thoughts_query -> have_posts()) : $thoughts_query -> the_post(); ?>
				<li>
					<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
					<?php the_excerpt(__('(more…)')); ?>
				</li>
				<?php endwhile;?>
			</ul>
			<button>More Thoughts</button>
		</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
