<?php
/**
 * Displays the content of the carousel
 */
?>

<?php
$latest_mangas = new WP_Query( array(
	'post_type' => 'mangas',
	'posts_per_page' => 8,
	'order' => 'DESC'
) ); ?>

<div class="uk-grid">
	<div class="uk-width-small-1-1">
		<div class="owl-carousel-controls">
			<h2><?php _e( 'Latest Mangas', 'mangastarter' ); ?></h2>
			<a href="javascript:" class="carousel-next" title="Next"><i class="uk-icon-angle-right"></i></a>
			<a href="javascript:" class="carousel-prev" title="Previous"><i class="uk-icon-angle-left"></i></a>
		</div>
	</div>
	<div class="uk-width-small-1-1 uk-margin-top">
		<div class="owl-carousel">
			<?php
				while ( $latest_mangas->have_posts() ) { $latest_mangas->the_post();
			?>
					<div>
						<a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
							<?php the_post_thumbnail( 'thumbnail' ); ?>
						</a>
					</div>			
			<?php
				}
				wp_reset_postdata();
			?>			
		</div>
	</div>
</div>