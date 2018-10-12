<?php
/**
 * The template for displaying all single posts.
 *
 * @package     Zoo Theme
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */
get_header();
$main_class = 'wrap-main-content content-single';
get_header();
get_template_part('inc/templates/breadcrumbs') ?>
    <main id="site-main-content" class="main-content content-single-post">
        <div class="<?php echo esc_attr($main_class) ?>">
            <?php if (have_posts()) :
                while (have_posts()) : the_post();
                    get_template_part('content', 'single');
                endwhile;
            endif; ?>
        </div>
    </main>
<?php
get_footer();
