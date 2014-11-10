<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Rebecca Hill
 */

get_header(); ?>

<div class="background" aria-hidden="true">

	<?php get_template_part('img/inline', '4.svg');?>
		
</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title">Nooope nothing to see here...</h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p>Either someone made a typo or I broke something - my bad!</p>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><button>Avast! To the home page!</button></a>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
