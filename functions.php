<?php
/**
 * HP Broom Theme Functions
 *
 */

// Enable feature image support for theme
add_theme_support('post-thumbnails');

// Enqueue Styles & Script for Theme
function hp_broom_theme_enqueue_styles_scripts() {
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/lastest-bootstrap.min.css');
    wp_enqueue_style('default-style', get_stylesheet_uri());
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/custom.css');

    wp_enqueue_script('jquery');
    wp_enqueue_script('default-script', get_template_directory_uri() . '/assets/js/jquery-3.3.1.min.js', array('jquery'), '3.3.1', true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/lastest-bootstrap.min.js', array('jquery'), '', true);
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'hp_broom_theme_enqueue_styles_scripts');

// Enqueue Styles & Script for WordPress Dashbord
function hp_broom_admin_enqueue_styles_scripts() {
    wp_enqueue_style('admin-css', get_stylesheet_directory_uri() . '/assets/css/custom-admin.css');
}
add_action('admin_enqueue_scripts', 'hp_broom_admin_enqueue_styles_scripts');

// Add multiple menu location
function register_menu_locations() {
    register_nav_menus(
            array(
                'primary' => __('Header Menu'),
                'primary_left' => __('Header Menu Left'),
                'primary_right' => __('Header Menu Right'),
                'footer_menu1' => __('Footer Menu 1'),
                'footer_menu2' => __('Footer Menu 2'),
                'footer_menu3' => __('Footer Menu 3')
            )
    );
}
add_action('init', 'register_menu_locations');

// Add Custom Post Type
require 'portfolio-cpt-functions.php';
// Add Custom Theme Options
require 'theme-options/theme-option-functions.php';

/* Add different image sizes for different usage in front */
function register_new_image_sizes() {
    add_image_size('portfolio-featured-image', 1400, 698, true);
    add_image_size('portfolio-slider-thumbnail', 241, 137, true);
    add_image_size('portfolio-images', 350, 350, true);
    add_image_size('portfolio-content', 483, 520, true);
}
add_action('after_setup_theme', 'register_new_image_sizes');