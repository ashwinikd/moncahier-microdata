<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package mon_cahier
 * @since mon_cahier 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/Blog">
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<hgroup class="site-intro">
			<h1 class="site-title" itemprop="name"><a itemprop="url" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description" itemprop="description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>

		<!-- if there's a header image, let's display it here -->

		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) { ?>

			<img src="<?php header_image(); ?>" itemprop="image" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />

		<?php } // if ( ! empty( $header_image ) ) ?>

		<nav role="navigation" class="site-navigation main-navigation">
			<h1 class="assistive-text"><?php _e( 'Menu', 'mon_cahier' ); ?></h1>
			<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'mon_cahier' ); ?>"><?php _e( 'Skip to content', 'mon_cahier' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav>

	 <?php $options = get_option( 'mon_cahier_theme_options' ); ?>

	 <ul class="social-media">
			<?php if ( $options['twitterurl'] != '' ) : ?>
				<li><a href="<?php echo $options['twitterurl']; ?>" class="twitter"><?php _e( 'Twitter', 'mon_cahier' ); ?></a></li>
			<?php endif; ?>

			<?php if ( $options['facebookurl'] != '' ) : ?>
				<li><a href="<?php echo $options['facebookurl']; ?>" class="facebook"><?php _e( 'Facebook', 'mon_cahier' ); ?></a></li>
			<?php endif; ?>

			<?php if ( $options['pinteresturl'] != '' ) : ?>
				<li><a href="<?php echo $options['pinteresturl']; ?>" class="pinterest"><?php _e( 'Pinterest', 'mon_cahier' ); ?></a></li>
			<?php endif; ?>

			<?php if ( $options['flickrurl'] != '' ) : ?>
				<li><a href="<?php echo $options['flickrurl']; ?>" class="flickr"><?php _e( 'Flickr', 'mon_cahier' ); ?></a></li>
			<?php endif; ?>

			<?php if ( $options['linkedinurl'] != '' ) : ?>
				<li><a href="<?php echo $options['linkedinurl']; ?>" class="linkedin"><?php _e( 'LinkedIn', 'mon_cahier' ); ?></a></li>
			<?php endif; ?>

			<?php if ( $options['googleplusurl'] != '' ) : ?>
				<li><a href="<?php echo $options['googleplusurl']; ?>" class="googleplus"><?php _e( 'Google Plus', 'mon_cahier' ); ?></a></li>
			<?php endif; ?>

			<?php if ( $options['vimeourl'] != '' ) : ?>
				<li><a href="<?php echo $options['vimeourl']; ?>" class="vimeo"><?php _e( 'Vimeo', 'mon_cahier' ); ?></a></li>
			<?php endif; ?>

			<?php if ( $options['youtubeurl'] != '' ) : ?>
				<li><a href="<?php echo $options['youtubeurl']; ?>" class="youtube"><?php _e( 'Youtube', 'mon_cahier' ); ?></a></li>
			<?php endif; ?>

			<?php if ( $options['dribbleurl'] != '' ) : ?>
				<li><a href="<?php echo $options['dribbleurl']; ?>" class="dribble"><?php _e( 'Dribble', 'mon_cahier' ); ?></a></li>
			<?php endif; ?>

			<?php if ( $options['deliciousurl'] != '' ) : ?>
				<li><a href="<?php echo $options['deliciousurl']; ?>" class="delicious"><?php _e( 'Delicious', 'mon_cahier' ); ?></a></li>
			<?php endif; ?>

			<?php if ( $options['githuburl'] != '' ) : ?>
				<li><a href="<?php echo $options['githuburl']; ?>" class="github"><?php _e( 'Git Hub', 'mon_cahier' ); ?></a></li>
			<?php endif; ?>

			<?php if ( $options['tumblrurl'] != '' ) : ?>
				<li><a href="<?php echo $options['tumblrurl']; ?>" class="tumblr"><?php _e( 'Tumblr', 'mon_cahier' ); ?></a></li>
			<?php endif; ?>

			<?php if ( ! $options['hiderss'] ) : ?>
				<li><a href="<?php bloginfo( 'rss2_url' ); ?>" class="rss"><?php _e( 'RSS Feed', 'mon_cahier' ); ?></a></li>
			<?php endif; ?>
		</ul><!-- #social-icons-->

	</header><!-- #masthead .site-header -->

	<div id="main">
