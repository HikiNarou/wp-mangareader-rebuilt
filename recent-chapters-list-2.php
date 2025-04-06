<?php
/**
 * Template Name: Recent Chapters List 2
 */

// Check if the file is being included and prevent direct access
if (basename(__FILE__) == basename($_SERVER['PHP_SELF'])) {
    die('Direct access is not allowed.');
}

get_header();
?>

<div class="wrap">
    <div id="primary" class="content-area uk-grid">
        <main id="main" class="site-main uk-width-small-1-1 uk-width-medium-7-10 uk-margin-large-bottom" role="main">

            <header class="page-header">
                <h1 class="page-title">Recent Chapters List</h1>
            </header>

            <div class="recent-chapters-list">
                <div id="loaded-chapters-container"> <!-- Move the container here -->
                    <?php
                    // Create a custom query to fetch recent chapters
                    $args = array(
                        'post_type'      => 'chapters',
                        'posts_per_page' => 30, // Initial number of chapters to display
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                    );

                    $recent_chapters_query = new WP_Query($args);

                    $current_date = '';

                    if ($recent_chapters_query->have_posts()) :

                        while ($recent_chapters_query->have_posts()) : $recent_chapters_query->the_post();
                            $chapter_title = get_field('title'); // Get chapter title
                            $chapter_date = get_the_date('F j, Y'); // Get chapter date
                            $manga = get_field('manga'); // Get associated manga

                            if ($manga) {
                                $manga_title = get_the_title($manga->ID); // Get manga title

                                // Check if the current date is different from the previous one
                                if ($chapter_date !== $current_date) {
                                    if ($current_date !== '') {
                                        // Close the previous date section
                                        echo '</div>';
                                    }
                                    // Start a new date section
                                    echo '<div class="date-section">';
                                    echo '<h2 class="date-heading">' . $chapter_date . '</h2>';
                                }

                                // Display the chapter information
                                ?>
                                <div class="chapter-item">
                                    <h3 class="chapter-title"><a href="<?php the_permalink(); ?>"><?php echo $manga_title; ?></a></h3>
                                    <p class="chapter-title"><?php echo $chapter_title; ?></p>
                                </div>
                                <?php

                                // Update the current date
                                $current_date = $chapter_date;
                            }
                        endwhile;

                        // Close the last date section
                        echo '</div>';

                        wp_reset_postdata();
                    else :
                        echo '<p>No recent chapters found.</p>';
                    endif;
                    ?>
                </div> <!-- End of #loaded-chapters-container -->

                <!-- "Load More" button is placed here -->
                <div class="load-more-button-container">
                    <button id="load-more-button" class="button">Load More</button>
                </div>
            </div>

        </main><!-- end main -->

        <?php get_sidebar(); ?>
    </div><!-- end primary -->
</div><!-- end wrap -->

<style>
    /* CSS for the "Load More" button */
    .load-more-button-container {
        text-align: center;
        margin-top: 20px;
    }

    #load-more-button {
        padding: 10px 20px;
        background-color: #0073e6;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    #load-more-button:hover {
        background-color: #0055a5;
    }
</style>

<script>
    (function ($) {
        $(document).ready(function () {
            var displayedChapters = <?php echo $recent_chapters_query->post_count; ?>; // Initialize with the initial number of displayed chapters
            var totalChapters = <?php echo $recent_chapters_query->found_posts; ?>; // Initialize with the total number of chapters

            var chaptersPerPage = 5;
            var currentChapterDate = '';

            $('#load-more-button').on('click', function () {
                if (displayedChapters < totalChapters) {
                    // Calculate the number of chapters to load in this batch
                    var chaptersToLoad = Math.min(totalChapters - displayedChapters, chaptersPerPage);

                    // Create a new query to fetch additional chapters
                    var additionalArgs = {
                        'action': 'load_more_chapters_2',
                        'query': {
                            'post_type': 'chapters',
                            'posts_per_page': chaptersToLoad,
                            'orderby': 'date',
                            'order': 'DESC',
                            'offset': displayedChapters, // Offset by the number of displayed chapters
                        },
                    };

                    $.ajax({
                        url: '<?php echo admin_url('admin-ajax.php'); ?>',
                        type: 'POST',
                        data: additionalArgs,
                        success: function (response) {
                            $('#loaded-chapters-container').append(response); // Append to the same container
                            displayedChapters += chaptersToLoad;

                            // If all chapters are displayed, hide the "Load More" button
                            if (displayedChapters >= totalChapters) {
                                $('#load-more-button').hide();
                            }
                        },
                    });
                }
            });
        });
    })(jQuery);
</script>

<style>
    /* CSS for the recent chapters list */
    .date-section {
        margin-top: 20px;
    }

    .date-heading {
        font-size: 1.2em;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .chapter-item {
        margin-bottom: 20px;
        list-style-type: none; /* Remove default list bullet */
        padding-left: 10px; /* Add left padding for the border */
        position: relative; /* Create a relative positioning context */
    }

    .chapter-title {
        font-size: 1.1em;
        margin-left: 20px; /* Add left margin for the book icon */
        padding-left: 20px; /* Add additional padding for the book icon */
        position: relative;
    }

    .chapter-title a {
        color: #0073e6;
        text-decoration: none;
    }

    .chapter-title a:hover {
        text-decoration: underline;
    }

    /* Book icon */
    .chapter-item:before {
        content: "\1F4D6"; /* Unicode for a book icon (you can replace it with your preferred icon) */
        font-size: 16px; /* Adjust the icon size as needed */
        position: absolute;
        left: 0; /* Position the icon on the left side */
        top: 0;
    }

    /* Alternating background colors */
    .chapter-item:nth-child(even) {
        background-color: #f0f0f0; /* Light gray */
    }

    .chapter-item:nth-child(odd) {
        background-color: rgb(212, 212, 212); /* Dark gray */
    }
</style>

<?php get_footer(); ?>
