<?php

class td_module_9 extends td_module {

    function __construct($post, $module_atts = array()) {
        //run the parrent constructor
        parent::__construct($post, $module_atts);
    }

    function render() {
        ob_start();

        $title_length = $this->get_shortcode_att('m9_tl');
        $title_tag = $this->get_shortcode_att('m9_title_tag');
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

        $additional_classes_array = array();
        if (td_util::get_option('tds_m_show_exclusive') != 'hide')  {
            $additional_classes_array = apply_filters( 'td_composer_module_exclusive_class', $additional_classes_array, $this->post );
        }
        ?>

        <div class="<?php echo $this->get_module_classes($additional_classes_array);?>">

            <div class="item-details">
                <?php if (!empty($extra_cat)) { echo $extra_cat; } ?>
                <?php echo $this->get_title($title_length, $title_tag);?>
                <div class="meta-info">
                    <?php if (td_util::get_option('tds_category_module_9') == 'yes') { echo $this->get_category(); }?>
                    <?php echo $this->get_author();?>
                    <?php echo $this->get_date($modified_date);?>
                </div>
            </div>

        </div>

        <?php return ob_get_clean();
    }
}