<?php
/**
 * Displays top navigation
 */
?>
<nav id="site-navigation" class="main-navigation uk-width-large-7-10 uk-width-small-1-1" role="navigation" aria-label="<?php _e( 'Top Menu', 'mangastarter' ); ?>">
	<a id="site-menu" href="#">
		<label>
			<i class="uk-icon-bars"></i>
			<?php _e( 'Menu', 'mangastarter' ); ?>
		</label>
	</a>
	
	<?php
		wp_nav_menu( array(
			'theme_location' => 'top',
			'menu_id' => 'top-menu',
			'container' => false,
			'fallback_cb' => 'mangastarter_fallback_menu',
		) );
	?>
</nav>