<?php
/**
 * Template for displaying search forms
 */
?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="search" id="<?php echo $unique_id; ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'mangastarter' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    <button type="submit" class="search-submit"><i class="uk-icon-search"></i></button>
</form>