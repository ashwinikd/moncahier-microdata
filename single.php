<?php
/**
 * The Template for displaying all single posts.
 *
 * @package mon_cahier
 * @since mon_cahier 1.0
 */

get_header(); ?>

		<div id="primary" class="site-content" itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
			<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>

				<?php mon_cahier_content_nav( 'nav-below' ); ?>

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary .site-content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
