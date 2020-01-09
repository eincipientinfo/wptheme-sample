<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage HP Broom
 * @since HP Broom1.0
 */
get_header('inner-page');

// Start the loop.
?>
<div id="page">
    <?php
    while (have_posts()) : the_post();
        the_content();
// End of the loop.
    endwhile;
    ?>
</div>
<?php
get_footer();
