<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package appwozupi
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-1EZTST39J0"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-1EZTST39J0');
    </script>
    
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php /* <meta name="viewport" content="width=device-width, initial-scale=1"> */ ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="mobile-web-app-capable" content="yes">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class('drk-grey-bg full-height'); ?> scroll="no" style="overflow: hidden">

<div id="page" class="site full-height overflow-hidden">

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'appwozupi' ); ?></button>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content full-height">
	
		<div id="content-inner" class="full-width full-height overflow-hidden transition250">
		
			<div id="content-frame" class="full-width full-height overflow-hidden">
				
				<div id="top-header" class="transition500">
				<?php if ( is_404() ) : ?>
				<h1 id="plant-title" class="green-header white-color uppercase">Page Not Found</h1>
				<?php else : ?>
				<h1 id="plant-title" class="green-header white-color uppercase"><?php the_title(); ?></h1>
				<?php endif ?>
				
				<?php if ( is_page(47) ) : ?>
				<div id="switch-group" class="drk-grey-bg full-width display-table text-center white-color">
				
					<div class="switch-left full-height vertical-middle text-right">
						<span class="med-vw-font">GRID VIEW</span>
					</div>
					
					
					<div class="switch-center full-height vertical-middle">
					<?php /* https://codepen.io/mburnette/pen/LxNxNg */ ?>
					<input type="checkbox" id="switch" checked/><label id="switch_label" for="switch">Toggle</label>
					</div>
					
					<div class="switch-right full-height vertical-middle text-left">
						<span class="med-vw-font">LIST VIEW</span>
					</div>
				
				</div>
				<?php endif ?>
				</div>