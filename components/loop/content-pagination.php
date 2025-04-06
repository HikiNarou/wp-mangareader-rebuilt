<?php
/**
 * Displays the pagination
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */
?>
<?php
	if ( is_front_page() && is_home() ) {
		if ( get_previous_posts_link() || get_next_posts_link() ) { ?>
			<div id="site-pagination" class="uk-float-right">
				<?php
					previous_posts_link( __( 'Newer Releases', 'mangastarter' ) );
					next_posts_link( __( 'Older Releases', 'mangastarter' ) );
				?>
			</div><!-- end site-pagination -->
		<?php
		}
    } else {
		if ( get_previous_posts_link() || get_next_posts_link() ) { ?>
			<div id="site-pagination" class="uk-float-right">
				<?php
					previous_posts_link( __( 'Previous Page', 'mangastarter' ) );
					next_posts_link( __( 'Next Page', 'mangastarter' ) );
				?>
			</div><!-- end site-pagination -->
		<?php
		}
    }
?>