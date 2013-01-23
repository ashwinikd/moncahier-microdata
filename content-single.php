<?php
/**
 * @package mon_cahier
 * @since mon_cahier 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php if ( !has_post_format( 'quote' )) { ?>
			<h1 class="entry-title-hello" itemprop="name"><?php the_title(); ?></h1>
		<?php } ?>

		<div class="entrymeta">
			<?php mon_cahier_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content" itemprop="articleBody">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'mon_cahier' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<footer class="entry-meta">
		<p>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'mon_cahier' ) );
				if ( $categories_list && mon_cahier_categorized_blog() ) :
			?>
			<span class="cat-links" itemprop="genre">
				<?php printf( __( 'Posted in:  %1$s', 'mon_cahier' ), $categories_list ); ?>
			</span>
			<span class="sep"> | </span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'mon_cahier' ) );
				if ( $tags_list ) :
			?>
			<span class="tag-links" itemprop="keywords">
				<?php printf( __( 'Tagged: %1$s', 'mon_cahier' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>

		<?php edit_post_link( __( 'Edit', 'mon_cahier' ), '<span class="edit-link">', '</span>' ); ?>
		</p>
	</footer><!-- #entry-meta -->

</article><!-- #post-<?php the_ID(); ?> -->
