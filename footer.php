<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage HP Broom
 * @since HP Broom 1.0
 */
?>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-4">
                <div class="footer-1">
                    <div class="inner-footer">
                        <?php
                        // Get data from theme options which we created earlier
                        $footer_logo = get_option('to_footer_logo');
                        if (!empty($footer_logo)) {
                            echo '<img src="' . $footer_logo . '" class="img-fluid">';
                        } else {
                            echo '<h1>' . get_bloginfo('name') . '</h1>';
                        }
                        ?>
                        <div class="address">
                            <p><?php echo get_option('to_footer_contact_number'); ?></p>
                            <p><a href="#"><?php echo get_option('to_footer_email_address'); ?></a></p>
                        </div>
                        <div class="social-icon">
                            <ul>
                                <?php
                                $all_social_links = get_option('to_social_links');
                                $social_links = json_decode($all_social_links, true);

                                if (!empty($social_links)) {
                                    foreach ($social_links as $social_link) {
                                        echo '<li><a href="' . $social_link["social_url"] . '" target="_blank"><i class="' . $social_link["social_icon"] . '"></i></a></li>';
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="email-templete">
                        <form class="form-inline" method="post" id="mc-embedded-subscribe-form">
                            <div class="form-group" style= "position: relative;">
                                <?php echo do_shortcode(get_option("to_footer_signup_form_title")); ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <div class="footer-2">
                            <?php
                            $footer_menu1 = array(
                                'theme_location' => 'footer_menu1',
                                'container' => 'ul',
                                'menu_class' => 'site-map'
                            );
                            wp_nav_menu($footer_menu1);
                            ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-3">
                            <?php
                            $footer_menu2 = array(
                                'theme_location' => 'footer_menu2',
                                'container' => 'ul',
                                'menu_class' => 'site-map'
                            );
                            wp_nav_menu($footer_menu2);
                            ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="footer-3">
                            <?php
                            $footer_menu3 = array(
                                'theme_location' => 'footer_menu3',
                                'container' => 'ul',
                                'menu_class' => 'site-map'
                            );
                            wp_nav_menu($footer_menu3);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-lg-2">
                <div class="footer-address text-right">
                    <p><?php echo get_option('to_address1'); ?>
                    </p>
                    <p><?php echo get_option('to_address2'); ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="text-center">
                <p><?php echo get_option('to_footer_copyright1'); ?> <br><label><?php echo get_option('to_footer_copyright2'); ?></label></p>
            </div>
        </div>
    </div>
</footer>

</div>
<?php wp_footer(); ?>
</body>
</html>