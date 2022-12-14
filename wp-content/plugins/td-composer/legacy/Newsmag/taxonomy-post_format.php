<?php
/**
 * the post format taxonomy template
 * This file is loaded by WordPress on post format taxonomies pages ( like video post format )
 * You can further customize this template for specific post format taxonomies by copying this file to taxonomy-post_format-post-format-yourPostFormatName.php
 *
 * ex: taxonomy-post_format-post-format-video.php for the video post format.
 */

get_header();

//set the template id, used to get the template specific settings
$template_id = 'taxonomy_post_format';

global $loop_module_id, $loop_sidebar_position;

//read the loop variables for this specific taxonomy
$loop_module_id = td_util::get_option('tds_' . $template_id . '_page_layout', 1); //module 1 is default
$loop_sidebar_position = td_util::get_option('tds_' . $template_id . '_sidebar_pos'); //sidebar right is default (empty)

// get the current taxonomy object
$current_term_obj = get_queried_object();

if (empty($loop_module_id)) {
    $loop_module_id = 1; // module 1 is the default one
}

// sidebar position used to align the breadcrumb on sidebar left + sidebar first on mobile issue
$td_sidebar_position = '';
if($loop_sidebar_position == 'sidebar_left') {
    $td_sidebar_position = 'td-sidebar-left';
}


?>

    <div class="td-container">
        <div class="td-container-border">
            <div class="td-pb-row">
                <?php
                switch ($loop_sidebar_position) {

                    default: //default: sidebar right
                        ?>
                        <div class="td-pb-span8 td-main-content">
                            <div class="td-ss-main-content">
                                <div class="td-page-header td-pb-padding-side">
                                    <?php echo td_page_generator::get_taxonomy_breadcrumbs($current_term_obj); // get the breadcrumbs - /includes/wp_booster/td_page_generator.php ?>

                                    <h1 class="entry-title td-page-title">
                                        <span><?php printf( '%1$s', $current_term_obj->name ) ?></span>
                                    </h1>
                                </div>

                                <?php load_template( TDC_PATH_LEGACY . '/loop.php', true); ?>
                                <?php echo td_page_generator::get_pagination(); // get the pagination - /includes/wp_booster/td_page_generator.php ?>
                            </div>
                        </div>

                        <div class="td-pb-span4 td-main-sidebar">
                            <div class="td-ss-main-sidebar">
                                <?php get_sidebar(); ?>
                            </div>
                        </div>
                        <?php
                        break;

                    case 'sidebar_left':
                        ?>
                        <div class="td-pb-span8 td-main-content td-sidebar-left-content">
                            <div class="td-ss-main-content">
                                <div class="td-page-header td-pb-padding-side">
                                    <?php echo td_page_generator::get_taxonomy_breadcrumbs($current_term_obj); // get the breadcrumbs - /includes/wp_booster/td_page_generator.php ?>

                                    <h1 class="entry-title td-page-title">
                                        <span><?php printf( '%1$s', $current_term_obj->name ) ?></span>
                                    </h1>
                                </div>

                                <?php load_template( TDC_PATH_LEGACY . '/loop.php', true); ?>
                                <?php echo td_page_generator::get_pagination(); // get the pagination - /includes/wp_booster/td_page_generator.php ?>
                            </div>
                        </div>
                        <div class="td-pb-span4 td-main-sidebar">
                            <div class="td-ss-main-sidebar">
                                <?php get_sidebar(); ?>
                            </div>
                        </div>
                        <?php
                        break;

                    case 'no_sidebar':
                        ?>
                        <div class="td-pb-span12 td-main-content">
                            <div class="td-ss-main-content">
                                <div class="td-page-header td-pb-padding-side">
                                    <?php echo td_page_generator::get_taxonomy_breadcrumbs($current_term_obj); // get the breadcrumbs - /includes/wp_booster/td_page_generator.php ?>

                                    <h1 class="entry-title td-page-title">
                                        <span><?php printf( '%1$s', $current_term_obj->name ) ?></span>
                                    </h1>
                                </div>
                                <?php load_template( TDC_PATH_LEGACY . '/loop.php', true); ?>
                                <?php echo td_page_generator::get_pagination(); // get the pagination - /includes/wp_booster/td_page_generator.php ?>
                            </div>
                        </div>
                        <?php
                        break;
                }
                ?>
            </div> <!-- /.td-pb-row -->
        </div> <!-- /.td-container-border -->
    </div> <!-- /.td-container -->

<?php
get_footer();