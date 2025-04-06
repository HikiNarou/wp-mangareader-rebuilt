<?php
// Include WordPress
define('WP_USE_THEMES', false);
require_once('../../../../wp-load.php');

// Verify nonce for security
$nonce = $_POST['nonce'];
if ( ! wp_verify_nonce( $nonce, 'load_chapters_nonce' ) ) {
    die( 'Unauthorized request' );
}

// Retrieve the latest chapters related to the manga
$manga_id = absint( $_POST['manga_id'] ); // Sanitize the manga ID
$manga_chapters = get_posts(array(
    'post_type' => 'chapters',
    'orderby' => 'date',
    'order' => 'DESC',
    'numberposts' => -1,
    'meta_query' => array(
        array(
            'key' => 'manga',
            'value' => $manga_id,
            'compare' => 'LIKE'
        )
    )
));

// Output the HTML for the latest chapters
if ($manga_chapters) {
    echo '<ul>'; // Start the list
    foreach ($manga_chapters as $chapter) {
        // Display chapter information as list items
        echo '<li>' . get_the_title($chapter->ID) . '</li>';
    }
    echo '</ul>'; // End the list
} else {
    echo '<p>No chapters available</p>';
}
?>
