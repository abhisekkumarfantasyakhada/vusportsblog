<?php
/*  ----------------------------------------------------------------------------
    the author template
 */

get_header();




//set the template id, used to get the template specific settings
$template_id = 'tag';

//prepare the loop variables
global $loop_module_id, $loop_sidebar_position;
$loop_module_id = td_util::get_option('tds_' . $template_id . '_page_layout', 1); //module 1 is default
$loop_sidebar_position = td_util::get_option('tds_' . $template_id . '_sidebar_pos'); //sidebar right is default (empty)



$current_tag_name = single_tag_title( '', false );
?>

<div class="td-container">
    <div class="td-container-border">
        <div class="td-pb-row">
            <?php
            switch ($loop_sidebar_position) {
                default:
                    ?>
                        <div class="td-pb-span8 td-main-content">
                            <div class="td-ss-main-content">
                                <div class="td-page-header td-pb-padding-side">
                                    <?php echo td_page_generator::get_tag_breadcrumbs($current_tag_name);?>

                                    <h1 class="entry-title td-page-title">
                                        <span><?php echo __td('Tag', TD_THEME_NAME) . ': ' . $current_tag_name ?></span>
                                    </h1>
                                </div>
                                <?php
                                $td_tag_description = tag_description();
                                if (!empty($td_tag_description)) {
                                    echo '<div class="entry-content">' . $td_tag_description . '</div>';
                                }
                                load_template( TDC_PATH_LEGACY . '/loop.php', true);

                                echo td_page_generator::get_pagination();
                                ?>
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
                                <?php echo td_page_generator::get_tag_breadcrumbs($current_tag_name);?>

                                <h1 class="entry-title td-page-title">
                                    <span><?php echo __td('Tag', TD_THEME_NAME) . ': ' . $current_tag_name ?></span>
                                </h1>
                            </div>

                            <?php
                            $td_tag_description = tag_description();
                            if (!empty($td_tag_description)) {
                                echo '<div class="entry-content">' . $td_tag_description . '</div>';
                            }
                            load_template( TDC_PATH_LEGACY . '/loop.php', true);

                            echo td_page_generator::get_pagination();
                            ?>
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
                                <?php echo td_page_generator::get_tag_breadcrumbs($current_tag_name);?>

                                <h1 class="entry-title td-page-title">
                                    <span><?php echo __td('Tag', TD_THEME_NAME) . ': ' . $current_tag_name ?></span>
                                </h1>
                            </div>
                            <?php
                            $td_tag_description = tag_description();
                            if (!empty($td_tag_description)) {
                                echo '<div class="entry-content">' . $td_tag_description . '</div>';
                            }
                            load_template( TDC_PATH_LEGACY . '/loop.php', true);

                            echo td_page_generator::get_pagination();
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

<?php
get_footer();
?>