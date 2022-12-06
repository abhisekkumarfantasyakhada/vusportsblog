<?php

class td_module_related_posts extends td_module {

    function __construct($post) {
        //run the parrent constructor
        parent::__construct($post);
    }

    function render() {
        ob_start();

        $additional_classes_array = array();
        if (td_util::get_option('tds_m_show_exclusive') != 'hide')  {
            $additional_classes_array = apply_filters( 'td_composer_module_exclusive_class', $additional_classes_array, $this->post );
        }
        ?>

        <div class="<?php echo $this->get_module_classes( array_merge( array("td_mod_related_posts"), $additional_classes_array) ); ?>">
            <div class="td-module-image">
                <?php echo $this->get_image('td_238x178');?>
                <?php if (td_util::get_option('tds_category_module_1') == 'yes') { echo $this->get_category(); }?>
            </div>
            <div class="item-details">
                <?php echo $this->get_title();?>
            </div>
        </div>
        <?php return ob_get_clean();
    }
}