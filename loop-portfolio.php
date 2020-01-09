<?php
/**
 * Just displays a post loop. Intended to be included in child themes using get_template_part('loop'). Also works with SiteOrigin page builder loop widget.
 *
 * Loop Name: Portfolio Loop
 *
 * @package HP Broom
 * @since HP Broom1.0
 */

// Display Post loop in specific layout
if (have_posts()) {
    ?>
    <div class="container">
        <div class="filtering">
            <div class="button-group filters-button-group">
                <button class="button is-checked" data-filter="*">All</button>
                <?php
                // Get all terms of 'portfolio_category' taxonomy
                $taxonomies = get_terms(array(
                    'taxonomy' => 'portfolio_category',
                    'hide_empty' => true,
                    'orderby' => 'id',
                    'order' => 'ASC'
                ));
                // Check whether there is any term exists or not. If there is any term exists then get name for that term.
                if (!empty($taxonomies)) :
                    foreach ($taxonomies as $category) {
                        $filter_slug = $category->slug;
                        echo '<button class="button" data-filter=".' . $filter_slug . '">' . $category->name . '</button>';
                    }
                endif;
                ?>
            </div>

            <section id="grid-container" class="transitions-enabled fluid masonry grid">
                <?php
                while (have_posts()) : the_post();
                    // Get featured image of Post
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post_detail->ID), 'portfolio-images', false);
                    // Add class to <article> same as taxonomy term slug
                    $filter_slug_class = wp_get_object_terms(get_the_ID(), 'portfolio_category');
                    ?>
                    <article class="image-portfolio element-item <?php
                    foreach ($filter_slug_class as $slug) {
                        echo $slug->slug . ' ';
                    }
                    ?>" id="<?php
                             foreach ($filter_slug_class as $slug) {
                                 echo $slug->slug . ' ';
                             }
                             ?>" >
                        <img src="<?php echo $image[0]; ?>" class="img-responsive img-fluid" />
                        <div class="overlay">                               
                            <a class="info" href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                                <div class="div-link"></div>
                            </a>
                        </div>
                    </article>
                    <?php
                endwhile;
                ?>
            </section>
        </div>
    </div> 
    <?php
}