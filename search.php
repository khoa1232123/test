<?php
/**
 * The template for displaying search results pages.
 *
 * @package     Zoo Theme
 * @version     1.0.0
 * @author      Zootemplate
 * @link        http://www.zootemplate.com
 * @copyright   Copyright (c) 2017 Zootemplate
 * @license     GPL v2
 */

$col = 12;
$zoo_block_layout = get_theme_mod('zoo_blog_layout', 'list');
$main_class = 'main-content archive-content';
$loop_class = 'wrap-loop-content';
if (zoo_get_sidebar() != 'none') {
    $col = $col - 4;
    $main_class .= ' has-left-sidebar';
    $loop_class .= ' pull-right';
}
if (zoo_get_sidebar('right') != 'none') {
    $col = $col - 4;
    $main_class .= ' has-right-sidebar';
    $loop_class .= ' pull-left';
}
$loop_class .= ' col-12 col-md-' . $col . ' ' . $zoo_block_layout . '-layout';

get_header(); ?>

<?php get_template_part('inc/templates/breadcrumbs') ?>
    <main id="site-main-content" class="main-content">
        <div class="container">
            <div class="row">
                <?php
                if (zoo_get_sidebar('left') != '') {
                    get_sidebar();
                }
                ?>
                <div class="<?php echo esc_attr($loop_class) ?>">
                        <div class="row">
                            <?php if (have_posts()) : ?>
                                <h1 class="page-title the-title"><?php printf(esc_html__('Search Results for: %s', 'zootemplate'), get_search_query()); ?></h1>
                                <?php
                                while (have_posts()) : the_post();
                                    get_template_part('inc/templates/posts/loop/' . $zoo_block_layout, 'layout');
                                endwhile;
                            else :
                                get_template_part('content', 'none');
                            endif; ?>
                        </div>
                        <?php get_template_part('inc/templates/posts/post', 'pagination'); ?>
                </div>
                <?php
                if (zoo_get_sidebar('right') != '') {
                    get_sidebar();
                }
                ?>
            </div>
        </div>
    </main>
<?php
get_footer();
