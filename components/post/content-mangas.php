<?php
/**
 * Template part for displaying manga posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="uk-grid">
		<div class="uk-width-small-1-1 uk-width-medium-3-10">
			<?php // The Manga Cover
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'large', array( 'class' => 'uk-thumbnail' ) );
			} ?>
		</div>
		
		<div class="uk-width-small-1-1 uk-width-medium-7-10">
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); // The Title ?>
			</header>
			
			<div class="entry-content uk-block uk-block-muted">
				<div class="uk-grid">
					<!-- Alternative Titles -->
					<div class="manga-alt-names uk-width-small-4-6">
						<p><?php _e( 'Alternative Titles', 'mangastarter' ); ?>:</p>
						<?php the_field( 'other_names' ); ?>
					</div>
					
					<div class="manga-year uk-width-small-2-6">
						<p><?php _e( 'Release Year', 'mangastarter' ); ?>:</p>
						<?php the_field( 'release_year' ); ?>
					</div>
				</div>
				
				<div class="uk-grid">
					<!-- The Author(s) of the Manga -->
					<div class="manga-authors uk-width-small-1-3">
						<p><?php _e( 'Author(s)', 'mangastarter' ) ?>:</p>
						<?php echo get_the_term_list( $post->ID, 'authors', '', ', ', ' ' ); ?>
					</div>
					
					<!-- The Artist(s) of the Manga -->
					<div class="manga-artists uk-width-small-1-3">
						<p><?php _e( 'Artist(s)', 'mangastarter' ) ?>:</p>
						<?php echo get_the_term_list( $post->ID, 'artists', '', ', ', ' ' ); ?>
					</div>
					
					<!-- The Status of the Manga -->
					<div class="manga-status uk-width-small-1-3">
						<p><?php _e( 'Status', 'mangastarter' ) ?>:</p>
						<?php the_field( 'status' ); ?>
					</div>
				</div>
				
				<div class="uk-grid">
					<!-- The Genres -->
					<div class="manga-genres uk-width-small-1-1">
						<p><?php _e( 'Genres', 'mangastarter' ) ?>:</p>
						<div><?php echo get_the_term_list( $post->ID, 'category', '', ' ', ' ' ); ?></div>
					</div>
					
					<!-- Brief (or not) Description of the Manga -->
					<div class="manga-description uk-width-small-1-1">
						<p><?php _e( 'Description', 'mangastarter' ) ?>:</p>
						<div><?php the_field( 'description' ); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php // Mature content warning
	if ( get_field( 'mature_content' ) === 'Yes' ) { ?>
		<div class="uk-grid uk-margin-top">
			<div  class="manga-warning uk-width-small-1-1">
				<div class="uk-alert uk-alert-danger">
					<?php _e( 'The following content is intended for mature audiences and may contain sexual themes, gore, violence and/or strong language. Discretion is advised.', 'mangastarter' ); ?>
				</div>
			</div>
		</div>
	<?php
	} ?>
	
	<div class="uk-grid uk-margin-top-remove">
		<div class="manga-chapters uk-width-small-1-1 uk-margin-top">
			<h3><?php _e( 'Chapters', 'mangastarter' ); ?></h3>
			<?php // The Chapter List (inc/chapters.php:42)
			mangastarter_chapter_list(); ?>
		</div>
	</div>
	
</article>