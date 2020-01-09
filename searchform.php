<?php
/**
 * Code to create Custom Search Form.
 *
 *
 * @package HP Broom
 * @since HP Broom1.0
 */
?>
<form id="search" action="<?php echo home_url('/'); ?>">
    <input type="search" class="s search search-field" id="s" name="s" placeholder="<?php echo esc_attr_x('What are you looking for?', 'placeholder') ?>" value="<?php echo get_search_query() ?>">
    <button type="submit" class="sbtn"><i class="fa fa-search"></i></button>
</form>