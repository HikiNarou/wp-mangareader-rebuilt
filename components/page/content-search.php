<?php
/**
 * Template part for displaying page content in the Advanced Search template
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
		<form method="get" action="<?php echo esc_url( home_url() ); ?>" class="uk-form advanced-search">
			<div class="uk-grid uk-grid-small">
				<div class="uk-width-5-6">
					<input type="text" name="s" value="" placeholder="<?php _e( 'Search', 'mangastarter' ); ?>" required="required" />
				</div>
				
				<div class="uk-width-1-6">
					<button type="submit" class="uk-width-1-1"><?php _e( 'Search', 'mangastarter' ); ?></button>
				</div>
				
				<div class="uk-width-1-1 uk-margin-top">
					<div class="uk-grid">
						<?php // generate list of tags
						$genres = get_categories();
						foreach ( $genres as $genre ) { ?>
							<div class="uk-width-small-3-6 uk-width-medium-2-6 uk-margin-top">
								<label>
									<input name="category_name" type="checkbox" value="<?php echo $genre->slug; ?>">
									<?php echo $genre->name; ?>
								</label>
							</div>
						<?php
						} ?>
					</div>
				</div>
			</div>
		</form>
    </div><!-- .entry-content -->
</article><!-- #post-## -->