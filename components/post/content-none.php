<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */
?>

<section class="no-results not-found">
    <header>
        <h3><?php _e( 'Nothing Found...', 'mangastarter' ); ?></h3>
    </header>
    <div class="page-content">
        <?php
        if ( is_front_page() || is_home() && current_user_can( 'publish_posts' ) ) { ?>
            
            <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'mangastarter' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
            
        <?php } else { ?>
            
            <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'mangastarter' ); ?></p>
            
        <?php
            get_search_form();
		} ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->