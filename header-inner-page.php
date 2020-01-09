<?php
/**
 * The template for displaying the header into inner pages
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage HP Broom
 * @since HP Broom 1.0
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="X-UA-Compatible" content="IE=11" />
        <?php wp_head(); ?>
    </head>
    <body>
        <div class="wrapper inner-header">
            <header>
                <!----Menu Start---->
                <nav class="navbar navbar-expand-lg navbar-dark main-nav inner-menu">

                    <div class="container">
                        <a class="navbar-brand abs" href="<?php echo home_url(); ?>">
                            <?php
                            $header_logo = get_option('to_innerpage_header_logo');
                            if (!empty($header_logo)) {
                                echo '<img src="' . $header_logo . '" class="img-fluid">';
                            } else {
                                echo '<h1>' . get_bloginfo('name') . '</h1>';
                            }
                            ?>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="navbar-collapse collapse" id="collapsingNavbar">
                            <?php
                            $primary_menu = array(
                                'theme_location' => 'primary',
                                'container' => 'ul',
                                'menu_class' => 'ml-auto nav navbar-nav menu1'
                            );
                            wp_nav_menu($primary_menu);
                            ?>
                        </div>
                        <div class="searchlink search search-inner" id="searchlink">
                            <i class="fa fa-search fa-custom"></i>
                            <div class="searchform">
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>