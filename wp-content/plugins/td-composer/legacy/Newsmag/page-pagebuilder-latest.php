<?php
/* Template Name: Pagebuilder + latest articles + pagination */

get_header();

td_global::set_current_template('page-homepage-loop' );

global $paged, $loop_module_id, $loop_sidebar_position, $post, $more; //$more is a hack to fix the read more loop
$td_page = (get_query_var('page')) ? get_query_var('page') : 1; //rewrite the global var
$td_paged = (get_query_var('paged')) ? get_query_var('paged') : 1; //rewrite the global var

//paged works on single pages, page - works on homepage
if ($td_paged > $td_page) {
    $paged = $td_paged;
} else {
    $paged = $td_page;
}

$list_custom_title_show = true; //show the article list title by default
$td_use_page_builder = td_util::is_pagebuilder_content($post); // detect the page builder

/*
    read the settings for the loop
---------------------------------------------------------------------------------------- */
if (!empty($post->ID)) {
    td_global::load_single_post($post);
    //read the metadata for the post
    $td_homepage_loop = td_util::get_post_meta_array($post->ID, 'td_homepage_loop');


    if (!empty($td_homepage_loop['td_layout'])) {
        $loop_module_id = $td_homepage_loop['td_layout'];
    }

    if (!empty($td_homepage_loop['td_sidebar_position'])) {
        $loop_sidebar_position = $td_homepage_loop['td_sidebar_position'];
    }

    if (!empty($td_homepage_loop['td_sidebar'])) {
        td_global::$load_sidebar_from_template = $td_homepage_loop['td_sidebar'];
    }

    if (!empty($td_homepage_loop['list_custom_title'])) {
        $td_list_custom_title = $td_homepage_loop['list_custom_title'];
    } else {
        $td_list_custom_title =__td('LATEST ARTICLES');
    }


    if (!empty($td_homepage_loop['list_custom_title_show'])) {
        $list_custom_title_show = false;
    }

    $el_class = '';
    if (!empty($td_homepage_loop['el_class'])) {
        $el_class = $td_homepage_loop['el_class'];
    }
}
?>

<div class="td-main-content-wrap td-main-page-wrap td-container-wrap">

<?php
/*
    the first part of the page (built with the page builder)  - empty($paged) or $paged < 2 = first page
---------------------------------------------------------------------------------------- */
if(!empty($post->post_content)) { //show this only when we have content
    if (empty($paged) or $paged < 2) { //show this only on the first page
        if (have_posts()) { ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <div class="td-container tdc-content-wrap">
                    <div class="td-container-border">
                        <?php the_content(); ?>
                    </div>
                </div>

            <?php endwhile; ?>
        <?php }
    }
} else if ( td_util::tdc_is_live_editor_iframe() ) {
    // The content needs to be shown (Maybe we have a previewed content, and we need the 'the_content' hook !)
    ?>
    <div class="td-container tdc-content-wrap">
        <div class="td-container-border">
            <?php the_content(); ?>
        </div>
    </div>
    <?php
}
?>

    <div class="td-container td-pb-article-list <?php echo esc_attr( $el_class ) ?>">
        <div class="td-container-border">
            <div class="td-pb-row">
                <?php

                //the default template
                switch ($loop_sidebar_position) {
                    default: //sidebar right
                        ?>
                            <div class="td-pb-span8 td-main-content" role="main">
                                <div class="td-ss-main-content">
                                    <?php if ((empty($paged) or $paged < 2) and $list_custom_title_show === true) { ?>
                                        <h4 class="block-title"><span><?php printf( '%1$s', $td_list_custom_title ) ?></span></h4>
                                    <?php }


                                    query_posts(td_data_source::metabox_to_args($td_homepage_loop, $paged));
                                    load_template( TDC_PATH_LEGACY . '/loop.php', true);
                                    td_page_generator::get_pagination();
                                    wp_reset_query();
                                    ?>
                                </div>
                            </div>
                            <div class="td-pb-span4 td-main-sidebar" role="complementary">
                                <div class="td-ss-main-sidebar">
                                    <?php get_sidebar(); ?>
                                </div>
                            </div>
                        <?php
                        break;

                    case 'sidebar_left':
                        ?>
                        <div class="td-pb-span8 td-main-content td-sidebar-left-content" role="main">
                            <div class="td-ss-main-content">
                                <?php if ((empty($paged) or $paged < 2) and $list_custom_title_show === true) { ?>
                                    <h4 class="block-title"><span><?php printf( '%1$s', $td_list_custom_title ) ?></span></h4>
                                <?php }
                                query_posts(td_data_source::metabox_to_args($td_homepage_loop, $paged));
                                load_template( TDC_PATH_LEGACY . '/loop.php', true);
                                td_page_generator::get_pagination();
                                wp_reset_query();
                                ?>
                            </div>
                        </div>
                        <div class="td-pb-span4 td-main-sidebar" role="complementary">
                            <div class="td-ss-main-sidebar">
                                <?php get_sidebar(); ?>
                            </div>
                        </div>
                        <?php
                        break;

                    case 'no_sidebar':
                        td_global::$load_featured_img_from_template = 'full';
                        ?>
                        <div class="td-pb-span12 td-main-content" role="main">
                            <div class="td-ss-main-content">
                                <?php if ((empty($paged) or $paged < 2) and $list_custom_title_show === true) { ?>
                                    <h4 class="block-title"><span><?php printf( '%1$s', $td_list_custom_title ) ?></span></h4>
                                <?php }
                                query_posts(td_data_source::metabox_to_args($td_homepage_loop, $paged));
                                load_template( TDC_PATH_LEGACY . '/loop.php', true);
                                td_page_generator::get_pagination();
                                wp_reset_query();
                                ?>
                            </div>
                        </div>
                        <?php
                        break;

                }
                ?>
            </div> <!-- /.td-pb-row -->
        </div>
    </div> <!-- /.td-container -->
</div> <!-- /.td-main-content-wrap -->
<?php
get_footer();