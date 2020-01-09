<?php
/**
 * Template to display Single post detail
 *
 * Loop Name: Search Loop
 *
 * @package HP Broom
 * @since HP Broom1.0
 */
?>
<?php
$image = wp_get_attachment_image_src(get_post_thumbnail_id($post_detail->ID), 'portfolio-images', false);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ($image) : ?>
        <div class="entry-thumbnail">
            <div class="portfolio-image" style=" background-image: url(<?php echo $image[0]; ?>);">
            </div>
        </div>
    <?php endif; ?>

    <div class="entry-content-block">
        <div class="portfolio-description">
            <h3><?php the_title(); ?></h3>
            <p><?php the_content(); ?></p>
        </div>
    </div>
</article><!-- #post-## -->