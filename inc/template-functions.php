<?php
/**
 * Additional features for the theme
 */

/**
 * Get current url
 */
function mangastarter_current_url() {
    global $wp;
    $current_url = home_url( add_query_arg( array(), $wp->request ) );
    return $current_url;
}

/**
 * Add custom class to default pagination links
 */
function mangastarter_previous_posts_link() {
    return 'class="uk-button"';
}
add_filter('previous_posts_link_attributes', 'mangastarter_previous_posts_link');

function mangastarter_next_posts_link() {
    return 'class="uk-button"';
}
add_filter('next_posts_link_attributes', 'mangastarter_next_posts_link');

/**
 * Comment form fields in the bottom
 */
function mangastarter_comment_fields_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter('comment_form_fields', 'mangastarter_comment_fields_bottom');
