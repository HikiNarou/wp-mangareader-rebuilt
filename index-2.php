<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 */
get_header(); ?>

<div class="wrap">
    <div id="primary" class="content-area uk-grid">
	
		<?php
		if ( 'show' === get_theme_mod( 'owl-carousel', 'hide' ) ) { ?>
			<div id="front-slider" class="uk-width-small-1-1 uk-margin-large-bottom">
				<?php get_template_part( 'components/loop/content', 'carousel' ); ?>
			</div>
		<?php
		} ?>
		
        <main id="main" class="site-main uk-width-small-1-1 uk-width-medium-7-10 uk-margin-large-bottom" role="main">
		
            <?php if ( have_posts() ) { ?>
                <header class="page-header latest-chapters">
                    <h2 class="page-title"><i class="uk-icon-angle-double-right"></i> <?php _e( 'Latest Chapters', 'mangastarter' ); ?></h2>
                </header><!-- .page-header -->
            <?php } ?>
			
            <?php
            if ( have_posts() ) { ?>
			
				<div class="uk-grid">
					<?php
						while ( have_posts() ) { the_post(); ?>
							<div class="uk-width-small-1-1 uk-width-medium-5-10">
								<?php get_template_part( 'components/loop/content', 'loop' ); ?>
							</div>
						<?php
						}
						
					?>
				</div>
				<?php get_template_part( 'components/loop/content', 'pagination' ); ?>
				
			<?php
            } else {
                get_template_part( 'components/post/content', 'none' );
            }
            ?>
        </main><!-- end main -->
        <?php get_sidebar(); ?>
    </div><!-- end primary -->
</div><!-- end wrap -->
<?php get_footer(); ?>