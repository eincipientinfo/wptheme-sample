<?php
/**
 * Template to display Search result.
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
<div class="row portfolio no-gutters">
    <div class="col-lg-5">
        <div class="portfolio-image" style=" background-image: url(<?php echo $image[0]; ?>);">
        </div>
    </div>
    <div class="col-lg-7">
        <div class="portfolio-description">
            <h3><?php the_title(); ?></h3>
            <p><?php echo substr(get_the_excerpt(), 0, 450) . '...'; ?></p>
        </div>
    </div>
</div>

