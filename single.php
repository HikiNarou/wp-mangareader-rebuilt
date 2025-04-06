<?php
/**
 * The template for displaying all single entries
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */
get_header(); ?>

<div class="wrap">
    <div id="primary" class="content-area uk-grid">
        <main id="main" class="site-main uk-width-small-1-1" role="main">
            
            <?php
            /* Start the Loop */
            while ( have_posts() ) : the_post();
                
                if ( get_post_type() == 'post' ) { 
                    // Display title and content for regular posts
                    ?>
                    <h1><?php the_title(); ?></h1>
                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>
                    <?php
                } else {
                    // For other post types, use the template part
                    get_template_part( 'components/post/content', get_post_type() );
                }
                
            endwhile; // End of the loop.
            ?>
            
        </main><!-- #main -->
    </div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer(); ?>
