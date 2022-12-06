<?php

class td_module_mx1 extends td_module {

    function __construct($post, $module_atts = array()) {
        //run the parrent constructor
        parent::__construct($post, $module_atts);
    }

    function render() {
        ob_start();

        $title_length = $this->get_shortcode_att('mx1_tl');
        $title_tag = $this->get_shortcode_att('mx1_title_tag');
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
            $image_size = 'td_341x220';
        }

        $additional_classes_array = array();
        if (td_util::get_option('tds_m_show_exclusive') != 'hide')  {
            $additional_classes_array = apply_filters( 'td_composer_module_exclusive_class', $additional_classes_array, $this->post );
        }
        ?>

    <div class="<?php echo $this->get_module_classes($additional_classes_array);?>">
        <div class="td-block14-border"></div>
        <?php  echo $this->get_image($image_size, false); ?>
        <?php echo $this->get_video_duration(); ?>


        <div class="meta-info">
            <?php echo $this->get_title($title_length, $title_tag);?>
            <div class="td-editor-date">
                <?php if (td_util::get_option('tds_category_module_mx1') == 'yes') { echo $this->get_category(); }?>
                <?php if (!empty($extra_cat)) { echo $extra_cat; } ?>
                <?php echo $this->get_author();?>
                <?php echo $this->get_date($modified_date);?>
            </div>
        </div>

    </div>

    <?php return ob_get_clean();
}
}