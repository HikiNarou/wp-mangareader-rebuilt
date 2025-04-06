<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 */
?>
    </div><!-- end content -->
		<div id="foot-widgets" class="wrap uk-margin-large-top">
			<div class="uk-grid">
				<div class="uk-width-small-1-1 uk-width-medium-2-6">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</div>
			
				<div class="uk-width-small-1-1 uk-width-medium-2-6">
					<?php dynamic_sidebar( 'sidebar-3' ); ?>
				</div>
			
				<div class="uk-width-small-1-1 uk-width-medium-2-6">
					<?php dynamic_sidebar( 'sidebar-4' ); ?>
				</div>
			</div>
		</div>
		
		<?php
		if ( 'show' === get_theme_mod( 'scrollup', 'hide' ) ) { ?>
			<a class="scrollup" href="javascript:"><i class="uk-icon-chevron-up"></i></a>
		<?php
		} ?>

        <footer id="foot" class="site-footer" role="contentinfo">
            <div class="wrap">
                <?php
                echo '&copy; ' . date( 'Y' ) . ' Copyright ' . get_bloginfo( 'name' );
				if ( 'show' === get_theme_mod( 'proud-of-wordpress', 'hide' ) ) {
					echo ' - ' . __( 'Proudly Powered By', 'mangastarter' ) . ' <a href="//wordpress.org" title="WordPress">WordPress</a>.';
				}
                ?>
            </div><!-- end wrap -->
        </footer><!-- end foot -->
</div><!-- end page -->
<?php wp_footer(); ?>

</body>
</html>