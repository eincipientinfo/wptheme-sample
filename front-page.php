<?php

/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage HP Broom
 * @since HP Broom1.0
 * @version 1.0
 */
get_header();

if (have_posts()) {
    // Load posts loop.
    while (have_posts()) {
        the_post();
        the_content();
    }
} else {
    // If no content, include the "No posts found" template.
    echo "No post found";
}

get_footer();