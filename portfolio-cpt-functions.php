<?php
/*  ----------------------------------------------------------------------------
  Create Custom Post type Portfolio
 */

function portfolio_init() {
    // set up product labels
    $labels = array(
        'name' => 'Portfolio',
        'singular_name' => 'Portfolio',
        'add_new' => 'Add New Portfolio',
        'add_new_item' => 'Add New Portfolio',
        'edit_item' => 'Edit Portfolio',
        'new_item' => 'New Portfolio',
        'all_items' => 'All Portfolios',
        'view_item' => 'View Portfolio',
        'search_items' => 'Search Portfolios',
        'not_found' => 'No Portfolios Found',
        'not_found_in_trash' => 'No Portfolios found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'Portfolio',
    );

    // register post type
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'portfolio_section', 'with_front' => false),
        'query_var' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array(
            'title',
            'editor',
            'page-attributes',
            'thumbnail'
        )
    );
    register_post_type('portfolio', $args);

    // register taxonomy
    register_taxonomy('portfolio_category', 'portfolio', array('hierarchical' => true, 'show_admin_column' => true, 'label' => 'Portfolio Category', 'query_var' => true, 'has_archive' => true, 'rewrite' => array('slug' => 'portfolio-category', 'with_front' => false)));
}

add_action('init', 'portfolio_init');

// Code to add Custom Meta boxes Start
function portfolio_meta_box_add() {
    add_meta_box('portfolio-meta-box-id', 'Porfolio Additional Meta box', 'portfolio_meta_box_function', 'portfolio', 'normal', 'high');
}

add_action('add_meta_boxes', 'portfolio_meta_box_add');

function portfolio_meta_box_function() {
    // $post is already set, and contains an object: the WordPress post
    global $post;
    $values = get_post_custom($post->ID);
    $architect = isset($values['architect']) ? $values['architect'][0] : '';
    $builder = isset($values['builder']) ? $values['builder'][0] : '';
    $interior_design = isset($values['interior_design']) ? $values['interior_design'][0] : '';
    $landscape_architect = isset($values['landscape_architect']) ? $values['landscape_architect'][0] : '';
    $photography = isset($values['photography']) ? $values['photography'][0] : '';
    $awards_publications = isset($values['awards_publications']) ? $values['awards_publications'][0] : '';

    // We'll use this nonce field later on when saving.
    wp_nonce_field('my_meta_box_nonce', 'meta_box_nonce');
    ?>
    <div class="portfolio-meta-wrap">
        <div class="portfolio-css">
            <div class="portfolio-label-meta">
                <label for="architect">Architect</label>
            </div>
            <div class="portfolio-input-meta">
                <input type="text" name="architect" class="admin_input_fields" id="architect" value="<?php echo $architect; ?>" />
            </div>
        </div>
        <div class="portfolio-css">
            <div class="portfolio-label-meta">
                <label for="builder">Builder</label>
            </div>
            <div class="portfolio-input-meta">
                <input type="text" name="builder" class="admin_input_fields" id="builder" value="<?php echo $builder; ?>" />
            </div>
        </div>
        <div class="portfolio-css">
            <div class="portfolio-label-meta">
                <label for="interior_design">Interior Design</label>
            </div>
            <div class="portfolio-input-meta">
                <input type="text" name="interior_design" class="admin_input_fields" id="interior_design" value="<?php echo $interior_design; ?>" />
            </div>
        </div>
        <div class="portfolio-css">
            <div class="portfolio-label-meta">
                <label for="landscape_architect">Landscape Architect</label>
            </div>
            <div class="portfolio-input-meta">
                <input type="text" name="landscape_architect" class="admin_input_fields" id="landscape_architect" value="<?php echo $landscape_architect; ?>" />
            </div>
        </div>
        <div class="portfolio-css">
            <div class="portfolio-label-meta">
                <label for="photography">Photography</label>
            </div>
            <div class="portfolio-input-meta">
                <input type="text" name="photography" class="admin_input_fields" id="photography" value="<?php echo $photography; ?>" />
            </div>
        </div>
        <div class="portfolio-css">
            <div class="portfolio-label-meta">
                <label for="awards_publications">Awards and Publications</label>
            </div>
            <div class="portfolio-input-meta">
                <input type="text" name="awards_publications" class="admin_input_fields" id="awards_publications" value="<?php echo $awards_publications; ?>" />
            </div>
        </div>
    </div>
    <?php
}

function portfolio_meta_box_save_function($post_id) {
    // Bail if we're doing an auto save
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    // if our nonce isn't there, or we can't verify it, bail
    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'my_meta_box_nonce'))
        return;

    // if our current user can't edit this post, bail
    if (!current_user_can('edit_post'))
        return;

    // now we can actually save the data
    $allowed = array(
        'a' => array(// on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );

    // Make sure your data is set before trying to save it

    if (isset($_POST['architect']))
        update_post_meta($post_id, 'architect', esc_attr($_POST['architect']));
    if (isset($_POST['builder']))
        update_post_meta($post_id, 'builder', esc_attr($_POST['builder']));
    if (isset($_POST['interior_design']))
        update_post_meta($post_id, 'interior_design', esc_attr($_POST['interior_design']));
    if (isset($_POST['landscape_architect']))
        update_post_meta($post_id, 'landscape_architect', esc_attr($_POST['landscape_architect']));
    if (isset($_POST['photography']))
        update_post_meta($post_id, 'photography', esc_attr($_POST['photography']));
    if (isset($_POST['awards_publications']))
        update_post_meta($post_id, 'awards_publications', esc_attr($_POST['awards_publications']));
}

add_action('save_post', 'portfolio_meta_box_save_function');

// Custom meta boxes code End