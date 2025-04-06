<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */
get_header(); ?>

<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <header class="page-header">
                <?php the_archive_title( '<h2 class="page-title">', '</h2>' ); ?>

                <!-- Add the search input field -->
                <div class="search-container">
                    <label for="manga-filter">Filter by Title:</label>
                    <input type="text" id="manga-filter" placeholder="Type part of the manga name here">
                </div>
            </header><!-- .page-header -->

            <?php
            if ( have_posts() ) { ?>

                <!-- Add the A-Z filter here -->
                <style>
                    /* Custom styles for the A-Z navigation */
                    .az-nav {
                        margin: 20px 0;
                    }

                    .az-nav a {
                        margin: 0 5px;
                        text-decoration: none;
                        font-weight: bold;
                    }

                    /* Responsive grid styles */
                    @media screen and (min-width: 768px) {
                        .archive-mangas {
                            display: flex;
                            flex-wrap: wrap;
                            margin: -10px; /* Adjust as needed */
                        }

                        .archive-mangas h3 {
                            width: 100%;
                        }
                </style>

                <?php
                // Get the clicked letter (if any)
                $selected_letter = isset( $_GET['letter'] ) ? sanitize_text_field( $_GET['letter'] ) : '';

                // Generate A-Z navigation links
                $az_nav_letters = range( 'A', 'Z' );
                $az_nav_links = '';

                foreach ( $az_nav_letters as $letter ) {
                    $az_nav_links .= '<a href="#manga-section-' . $letter . '">' . $letter . '</a> ';
                }

                // Output the A-Z navigation links
                echo '<div class="az-nav">Filter by Letter: ' . $az_nav_links . '</div>';
                ?>

                <?php
// Initialize a variable to store the current letter
$current_letter = '';

while ( have_posts() ) {
    the_post();
    $manga_title = get_the_title();
    $first_letter = strtoupper( substr( $manga_title, 0, 1 ) ); // Get the first letter

    // Check if the letter has changed
    if ( $first_letter !== $current_letter ) {
        // Output the new letter section
        if ( $current_letter !== '' ) {
            // Close the previous letter section
            echo '</section>';
        }
        echo '<section id="manga-section-' . $first_letter . '" class="archive-mangas" data-letter="' . $first_letter . '">';
        echo '<h3>' . $first_letter . '</h3>';
        $current_letter = $first_letter;
    }

    // Display the manga content within the responsive grid
    echo '<div class="uk-width-small-1-1 uk-width-medium-5-10 manga-title">';
    // Display the content for each manga here
    // Include the code to display manga and related chapters
    // You can replace this with the code I provided earlier
    get_template_part( 'components/loop/content', 'archive' );
    echo '</div>';
}

// Close the last section
echo '</section>';
?>

                <?php get_template_part( 'components/loop/content', 'pagination' ); ?>

                <script>
                    // JavaScript filter function
                    document.addEventListener("DOMContentLoaded", function () {
                        const filterInput = document.getElementById('manga-filter');
                        const mangaTitles = document.querySelectorAll('.manga-title');

                        filterInput.addEventListener('input', function () {
                            const filterValue = filterInput.value.toUpperCase();
                            mangaTitles.forEach(function (title) {
                                const mangaTitle = title.textContent.toUpperCase();
                                if (mangaTitle.includes(filterValue)) {
                                    title.style.display = 'block';
                                } else {
                                    title.style.display = 'none';
                                }
                            });
                        });
                    });
                </script>

            <?php
            } else {
                get_template_part( 'components/post/content', 'none' );
            }
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer(); ?>
