<?php
/**
 * Template Name: Advanced Search
 *
 * This is the template that displays an advanced search form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */
get_header(); ?>

<div class="wrap">
    <div id="primary" class="content-area uk-grid">
        <main id="main" class="site-main uk-width-small-1-1 uk-width-medium-7-10" role="main">
		
			<header class="page-header">
				<?php the_title( '<h2 class="page-title">', '</h2>' ); ?>
			</header><!-- .page-header -->
            
            <?php
            /* Start the Loop */
            while ( have_posts() ) : the_post();
            
                get_template_part( 'components/page/content', 'search' );
                
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                
            endwhile; // End of the loop.
            ?>
            
        </main><!-- #main -->
        <?php get_sidebar(); ?>
    </div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer(); ?>