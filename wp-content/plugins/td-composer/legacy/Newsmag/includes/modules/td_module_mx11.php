<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 03.02.2015
 * Time: 10:05
 */

class td_module_mx11 extends td_module {

    function __construct($post, $module_atts = array()) {
        parent::__construct($post, $module_atts);
    }

    function render($order_no) {
        ob_start();

        $title_length = $this->get_shortcode_att('mx11_tl');
        $title_tag = $this->get_shortcode_att('mx11_title_tag');
        $modified_date = $this->get_shortcode_att('show_modified_date');

        if ( td_util::get_option('tds_m_show_custom_category_label') =='yes' ) {

            $td_post_theme_settings = td_util::get_post_meta_array($this->post->ID, 'td_post_theme_settings');

            if ( !empty($td_post_theme_settings['td_custom_cat_name']) ) {
                //we have a custom category selected
                $td_custom_cat_name = $td_post_theme_settings['td_custom_cat_name'];
                if (!empty($td_post_theme_settings['td_custom_cat_name_url'])) {
                    $td_custom_cat_name_url = $td_post_theme_settings['td_custom_cat_name_url'];
                }else{
                    $td_custom_cat_name_url = '#';
                }
                $extra_cat = '<a href="' . $td_custom_cat_name_url . '" class="td-post-category td-post-extra-category">'  . $td_custom_cat_name . '</a>';
            }
        }

        if (empty($image_size)) {
            $image_size = 'td_681x400';
        }

        $additional_classes_array = array();
        if (td_util::get_option('tds_m_show_exclusive') != 'hide')  {
            $additional_classes_array = apply_filters( 'td_composer_module_exclusive_class', $additional_classes_array, $this->post );
        }
        ?>

        <div class="<?php echo $this->get_module_classes( array_merge(array("td-big-grid-post-$order_no", "td-big-grid-post", 'td-big-thumb'), $additional_classes_array) ); ?>">

            <?php echo $this->get_image($image_size, false); ?>
            <?php echo $this->get_video_duration(); ?>

            <div class="td-meta-info-container">
                <div class="td-meta-align">
                    <div class="td-big-grid-meta">
                        <?php if (td_util::get_option('tds_category_module_mx11') == 'yes') { echo $this->get_category(); }?>
                        <?php echo $this->get_title($title_length, $title_tag);?>

                        <div class="td-module-meta-info">
                            <?php if (!empty($extra_cat)) { echo $extra_cat; } ?>
                            <?php echo $this->get_author();?>
                            <?php echo $this->get_date($modified_date);?>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $this->get_comments();?>

        </div>

        <?php return ob_get_clean();
    }
}