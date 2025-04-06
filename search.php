<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 */
get_header(); ?>

<div class="wrap">
    <div id="primary" class="content-area uk-grid">
        <main id="main" class="site-main uk-width-small-1-1 uk-width-medium-7-10" role="main">
		
			<header class="page-header">
				<h2 class="page-title"><?php printf( __( 'Search Results for: %s', 'mangastarter' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
			</header><!-- .page-header -->
            
            <?php
            if ( have_posts() ) { ?>
			
				<div class="uk-grid">
					<?php
						while ( have_posts() ) { the_post(); ?>
							<div class="uk-width-small-1-1 uk-width-medium-5-10">
								<?php get_template_part( 'components/loop/content', 'archive' ); ?>
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
            
        </main><!-- #main -->
		<?php get_sidebar(); ?>
    </div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer(); ?>