<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 */
get_header(); ?>

<div class="wrap">
    <div id="primary" class="content-area uk-grid">
        <main id="main" class="site-main uk-width-small-1-1 uk-width-medium-7-10" role="main">
            
            <section class="error-404 not-found">
                <header class="page-header">
                    <h2 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'mangastarter' ); ?></h2>
                </header><!-- .page-header -->
                <div class="page-content">
                    <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'mangastarter' ); ?></p>
                    
                    <?php get_search_form(); ?>                    
                </div><!-- .page-content -->
            </section><!-- .error-404 -->
        </main><!-- #main -->
		<?php get_sidebar(); ?>
    </div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer(); ?>