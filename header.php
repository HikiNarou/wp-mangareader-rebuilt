<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div id="page" class="site">			
			<header id="masthead" class="site-header" role="banner">
				<div class="wrap">
					<div class="navigation-top uk-grid uk-grid-collapse">
						<?php get_template_part( 'components/header/site', 'branding' ); ?>
						<?php get_template_part( 'components/navigation/navigation', 'top' ); ?>						
					</div>
				</div>
			</header>
			
		<div id="content" class="site-content">