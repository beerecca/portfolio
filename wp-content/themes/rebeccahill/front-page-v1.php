<?php
/* This template is used to display the Home page. TODO: delete this page if not needed*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<!-- <img src="<?php echo get_stylesheet_directory_uri();?>/img/triangle.png" alt="" class="triangle"> TODO: triangles-->
		<!-- Display Home page content -->
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

		<!-- Display Latest Portfolio Items -->
		<div class="row">
			<section class="panel col-lg-6">
				<h1>Favourite Projects</h1>
				<ul class="featured">
					<?php $args = array(
						'showposts' => '3', 
						'post_type' => 'portfolio',
						'rh_category' => 'Featured',
						'orderby' => 'menu_order'
						);
						$portfolio_query = new WP_Query($args); ?>
					<?php while ($portfolio_query -> have_posts()) : $portfolio_query -> the_post(); ?>
					<li class="row">
						
							<a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
						
							<?php the_excerpt(__('(more…)')); ?>
							<button href="<?php the_permalink() ?>">More</button>
						
					</li>
					<?php wp_reset_postdata(); endwhile;?>
				</ul>
				<button>More Projects</button>
			</section>

			<!-- Display Latest Thoughts -->
			<section class="col-lg-6">
				<h1>Deepest Thoughts</h1>
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
		</div><!-- .row -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
