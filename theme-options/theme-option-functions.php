<?php
// Custom Theme Options For HP Broom Theme
// create custom settings menu

function hp_broom_theme_option_create_menu() {
    // Add Css & JS Files
    wp_enqueue_style('theme-options-css', get_template_directory_uri() . '/theme-options/css/theme-option.css');
    wp_enqueue_script('theme-options-js', get_template_directory_uri() . '/theme-options/js/theme-option.js');

    //create new top-level menu
    add_menu_page('Theme Options', 'Theme Options', 'edit_others_posts', 'theme_options', 'to_theme_options_page');

    //call register settings function
    add_action('admin_init', 'register_theme_options');
}

add_action('admin_menu', 'hp_broom_theme_option_create_menu');

function register_theme_options() {
    //register our settings
    register_setting('theme-options-group', 'to_favicon');
    register_setting('theme-options-group', 'to_header_logo');
    register_setting('theme-options-group', 'to_innerpage_header_logo');
    register_setting('theme-options-group', 'to_footer_logo');
    register_setting('theme-options-group', 'to_footer_contact_number');
    register_setting('theme-options-group', 'to_footer_email_address');
    register_setting('theme-options-group', 'to_social_links');
    register_setting('theme-options-group', 'to_footer_signup_form_title');
    register_setting('theme-options-group', 'to_address1');
    register_setting('theme-options-group', 'to_address2');
    register_setting('theme-options-group', 'to_footer_copyright1');
    register_setting('theme-options-group', 'to_footer_copyright2');
}

function to_theme_options_page() {
    ?>
    <div class="wrap" id="custom_theme_option">
        <h1>Theme Options</h1>

        <?php settings_errors(); ?>

        <form method="post" action="options.php" enctype="multipart/form-data" id="custom_options_form">
            <?php settings_fields('theme-options-group'); ?>
            <?php do_settings_sections('theme-options-group'); ?>
            <table class="form-table">
                <?php
                if (function_exists('wp_enqueue_media')) {
                    wp_enqueue_media();
                } else {
                    wp_enqueue_style('thickbox');
                    wp_enqueue_script('media-upload');
                    wp_enqueue_script('thickbox');
                }
                ?>
                <tr valign="top">
                    <th scope="row">Favicon Icon</th>
                    <td>
                        <button class="favicon_upload">Upload Favicon</button>
                        <input class="favicon_url" type="text" name="to_favicon" size="60" value="<?php echo get_option('to_favicon'); ?>">

                        <?php if (!empty(get_option('to_favicon'))) { ?>
                            </br></br>
                            <img class="to_favicon" src="<?php echo get_option('to_favicon'); ?>" />
                            <span class="remove_favicon"></span>
                        <?php } ?>          
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Header Logo</th>
                    <td>
                        <button class="header_logo_upload">Upload Logo</button>
                        <input class="header_logo_url" type="text" name="to_header_logo" size="60" value="<?php echo get_option('to_header_logo'); ?>">

                        <?php if (!empty(get_option('to_header_logo'))) { ?>
                            </br></br>
                            <img class="to_header_logo" src="<?php echo get_option('to_header_logo'); ?>" />
                            <span class="remove_header_logo"></span>
                        <?php } ?>          
                    </td>
                </tr>   
                <tr valign="top">
                    <th scope="row">Innerpage Header Logo</th>
                    <td>
                        <button class="innerpage_header_logo_upload">Upload Logo</button>
                        <input class="innerpage_header_logo_url" type="text" name="to_innerpage_header_logo" size="60" value="<?php echo get_option('to_innerpage_header_logo'); ?>">

                        <?php if (!empty(get_option('to_innerpage_header_logo'))) { ?>
                            </br></br>
                            <img class="to_innerpage_header_logo" src="<?php echo get_option('to_innerpage_header_logo'); ?>" />
                            <span class="remove_innerpage_header_logo"></span>
                        <?php } ?>          
                    </td>
                </tr>   

                <tr valign="top">
                    <th scope="row">Footer Logo</th>
                    <td>
                        <button class="footer_logo_upload">Upload Logo</button>
                        <input class="footer_logo_url" type="text" name="to_footer_logo" size="60" value="<?php echo get_option('to_footer_logo'); ?>">

                        <?php if (!empty(get_option('to_footer_logo'))) { ?>
                            </br></br>
                            <img class="to_footer_logo" src="<?php echo get_option('to_footer_logo'); ?>" />
                            <span class="remove_footer_logo"></span>
                        <?php } ?>          
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Contact Number</th>
                    <td><input type="text" name="to_footer_contact_number" value="<?php echo esc_attr(get_option('to_footer_contact_number')); ?>" /></td>
                </tr>    

                <tr valign="top">
                    <th scope="row">Email Address</th>
                    <td><input type="email" name="to_footer_email_address" value="<?php echo esc_attr(get_option('to_footer_email_address')); ?>" /></td>
                </tr>    

                <tr valign="top">
                    <th scope="row">Social Links<br/>
                        <span class="field_desc">( You can find social icon class by follow this link: <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Font Awesome</a> )</span>
                    </th>
                    <td>
                        <div id="social_links">
                            <ul id="sortable">

                                <?php
                                $i = 1;
                                $social_links = json_decode(get_option('to_social_links'), true);

                                if (!empty($social_links)) {
                                    $s_count = sizeof($social_links);
                                    foreach ($social_links as $social_link) {
                                        ?>

                                        <li id="social_<?php echo $i; ?>" class="ui-state-default" name="social_list">
                                            <div class="social_icons_set">
                                                <span class="sort_icon"></span>
                                                <input type="text" name="social_link_title" placeholder="Title Like: Facebook, Google" class="sTitle" value="<?php echo $social_link['social_title']; ?>" />
                                                <input type="text" name="social_link_icon_class" placeholder="Icon Class Like: fa fa-facebook" class="sLink" value="<?php echo $social_link['social_icon']; ?>" />
                                                <input type="text" name="social_link_url" placeholder="Social Page Url" class="sUrl" value="<?php echo $social_link['social_url']; ?>" />
                                                <span class="s_button add_social">+</span>
                                                <?php if ($s_count > 1) { ?><span class="s_button remove_social">-</span><?php } ?>    
                                            </div>
                                        </li>
                                        <?php
                                        $i++;
                                    }
                                } else {
                                    ?>
                                    <li id="social_<?php echo $i; ?>" class="ui-state-default" name="social_list">
                                        <div class="social_icons_set">
                                            <span class="sort_icon"></span>
                                            <input type="text" name="social_link_title" placeholder="Title Like: Facebook, Google" class="sTitle" />
                                            <input type="text" name="social_link_icon_class" placeholder="Icon Class Like: fa fa-facebook" class="sLink" />
                                            <input type="text" name="social_link_url" placeholder="Social Page Url" class="sUrl" />
                                            <span class="s_button add_social">+</span>    
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>

                        </div>  
                    </td>
                </tr>
                <tr valign="top" id="social_links_value">
                    <th scope="row"></th>
                    <td>
                        <textarea class="social_links_value" style="display: none;" name="to_social_links"></textarea> 
                    </td>
                </tr>

                <tr valign="top" class="footer_signup_form">
                    <th scope="row">Footer Signup Form Shortcode</th>
                    <td>
                        <input type="text" class="full_width_field" placeholder="Form Shortcode" name="to_footer_signup_form_title" value="<?php echo esc_attr(get_option('to_footer_signup_form_title')); ?>" />
                    </td>
                </tr> 

                <tr valign="top">
                    <th scope="row">Footer Address1</th>
                    <td>
                        <?php
                        $settings1 = array(
                            'teeny' => true,
                            'textarea_rows' => 10,
                            'tabindex' => 1
                        );

                        wp_editor(get_option('to_address1'), 'to_address1', $settings1);
                        ?>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Footer Address2</th>
                    <td>
                        <?php
                        $settings2 = array(
                            'teeny' => true,
                            'textarea_rows' => 10,
                            'tabindex' => 1
                        );

                        wp_editor(get_option('to_address2'), 'to_address2', $settings2);
                        ?>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Copyright</th>
                    <td><input type="text" name="to_footer_copyright1" value="<?php echo esc_attr(get_option('to_footer_copyright1')); ?>" /></td>
                </tr>    

                <tr valign="top">
                    <th scope="row">Design</th>
                    <td><input type="text" name="to_footer_copyright2" value="<?php echo esc_attr(get_option('to_footer_copyright2')); ?>" /></td>
                </tr>
            </table>

            <?php submit_button(); ?>

        </form>
    </div>
    <?php
}
