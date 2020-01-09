<?php
/**
 * Code to display Custom Search form layout.
 *
 *
 * @package HP Broom
 * @since HP Broom1.0
 */

    get_header('inner-page'); 
?>
<div class="container py-5 search-result-page">
    <section id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php if (have_posts()) : ?>
                <header class="page-header">
                    <h1 class="page-title"><?php
                        /* translators: %s: search query. */
                        printf(esc_html__('Search Results for: %s'), '<span>' . get_search_query() . '</span>');
                        ?></h1>
                </header><!-- .page-header -->
                <div class="news-section">
                    <div class="container">
                        <?php
                        while (have_posts()) : the_post();
                            /* Make sure the template is your template-parts/content.php */
                            get_template_part('template-parts/content');
                        endwhile;
                        ?>
                    </div>
                </div>
                <?php
                the_posts_navigation();
            else :
                /* Show no content found page */
                echo 'No posts found';
            endif;
            ?>
        </main><!-- #main -->
    </section><!-- #primary -->
</div>
<?php
    get_footer();