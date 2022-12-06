<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 03.02.2015
 * Time: 10:05
 */

class td_module_trending_now extends td_module {

    function __construct($post) {
        parent::__construct($post);
    }

    function render($order_no, $title_tag) {
        ob_start();

        $additional_classes_array = array();
        if (td_util::get_option('tds_m_show_exclusive') != 'hide')  {
            $additional_classes_array = apply_filters( 'td_composer_module_exclusive_class', $additional_classes_array, $this->post );
        }
        ?>

        <div class="<?php echo $this->get_module_classes(array_merge(array("td-trending-now-post-$order_no", "td-trending-now-post"), $additional_classes_array) ); ?>">

            <?php echo $this->get_title('', $title_tag );?>

        </div>

        <?php return ob_get_clean();
    }
}