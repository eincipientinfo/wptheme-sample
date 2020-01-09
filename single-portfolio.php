<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * 
 */
get_header('inner-page');
if (has_post_thumbnail(get_the_ID())):
    $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'portfolio-featured-image', false);
    ?>
    <div class="portfolio-banner uk-overflow-hidden">
        <img src="<?php echo $image[0]; ?>" class="uk-animation-reverse uk-transform-origin-top-right img-fluid" uk-scrollspy="cls: uk-animation-kenburns; repeat: true">
    </div>
    <?php
endif;
?>
<div class="container">
    <?php the_content(); ?>

    <div class="portfolio-designation text-center">
        <div class="designation">
            <h3>Architect</h3>
            <p><?php echo get_post_meta(get_the_ID(), 'architect', true); ?></p>
        </div>
        <div class="designation">
            <h3>Bulider</h3>
            <p><?php echo get_post_meta(get_the_ID(), 'builder', true); ?></p>
        </div>
        <div class="designation">
            <h3>Interior Design</h3>
            <p><?php echo get_post_meta(get_the_ID(), 'interior_design', true); ?></p>
        </div>
        <div class="designation">
            <h3>Landscape Architect</h3>
            <p><?php echo get_post_meta(get_the_ID(), 'landscape_architect', true); ?></p>
        </div>
        <div class="designation">
            <h3>Photography</h3>
            <p><?php echo get_post_meta(get_the_ID(), 'photography', true); ?></p>
        </div>
        <div class="designation">
            <h3>Awards and Publications</h3>
            <p><?php echo get_post_meta(get_the_ID(), 'awards_publications', true); ?></p>
        </div>
    </div>

    <div class="portfolio-back text-center">
        <a href="portfolio" class="btn-3"><span>Back</span></a>
    </div>
</div>
<?php
get_footer();
