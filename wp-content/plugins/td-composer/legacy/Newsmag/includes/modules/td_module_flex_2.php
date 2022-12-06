<?php

class td_module_flex_2 extends td_module {

    function __construct($post, $module_atts = array()) {
        //run the parrent constructor
        parent::__construct($post, $module_atts);
    }

    function render() {
        ob_start();

        $art_title_pos = $this->get_shortcode_att('art_title_pos');
        $info_pos = $this->get_shortcode_att('info_pos');
        $art_excerpt_pos = $this->get_shortcode_att('art_excerpt_pos');
        $btn_pos = $this->get_shortcode_att('btn_pos');

        $hide_image = $this->get_shortcode_att('hide_image');
        $image_size = $this->get_shortcode_att('image_size');
        $category_position = $this->get_shortcode_att('modules_category');
        $btn_title = $this->get_shortcode_att('btn_title');
        $title_length = $this->get_shortcode_att('mc5_tl');
        $title_tag = $this->get_shortcode_att('mc5_title_tag');
        $author_photo = $this->get_shortcode_att('author_photo');
        $excerpt_length = $this->get_shortcode_att('mc5_el');
        $excerpt_position = $this->get_shortcode_att('excerpt_middle');
        $modified_date = $this->get_shortcode_att('show_modified_date');

        $hide_label = '';


        $hide_label = $this->get_shortcode_att('modules_extra_cat'); //this includes label position


        if (empty($image_size)) {
            $image_size = 'td_681x0';
        }

        if (empty($btn_title)) {
            $btn_title = 'Read more';
        }

        // meta info html
        $meta_info = '<div class="td-editor-date">';
            if ($category_position == '') { $meta_info .= $this->get_category(); }

            $meta_info .= '<span class="td-author-date">';
                if( $author_photo != '' ) { $meta_info .= $this->get_author_photo(); }
                $meta_info .= $this->get_author();
                $meta_info .= $this->get_date($modified_date);
                $meta_info .= $this->get_comments();
            $meta_info .= '</span>';
        $meta_info .= '</div>';


        $extra_cat = '';

        if ( $hide_label != 'hide' ) {
            $td_post_theme_settings = td_util::get_post_meta_array($this->post->ID, 'td_post_theme_settings');
            $td_custom_cat_name = '';
            $td_custom_cat_name_url = '#';
        //    var_dump($td_post_theme_settings);
            if ( !empty($td_post_theme_settings['td_custom_cat_name']) ) {
                //we have a custom category selected
                $td_custom_cat_name = $td_post_theme_settings['td_custom_cat_name'];
                if (!empty($td_post_theme_settings['td_custom_cat_name_url'])) {
                    $td_custom_cat_name_url = $td_post_theme_settings['td_custom_cat_name_url'];
                }
                $extra_cat = '<a href="' . $td_custom_cat_name_url . '" class="td-post-category td-post-extra-category">'  . $td_custom_cat_name . '</a>';
            }
        }


        // excerpt html
        $excerpt = '<div class="td-excerpt">';
            $excerpt .= $this->get_excerpt($excerpt_length);
        $excerpt .= '</div>';

        // button html
        $button = '<div class="td-read-more">';
            $button .= '<a href="' . $this->href . '">' . __td($btn_title, TD_THEME_NAME) . '</a>';
        $button .= '</div>';

        $additional_classes_array = array();
        $additional_classes_array = apply_filters( 'td_composer_module_exclusive_class', $additional_classes_array, $this->post );

        ?>

        <div class="<?php echo $this->get_module_classes($additional_classes_array);?>">
            <div class="td-module-container td-category-pos-<?php echo esc_attr($category_position) ?>">
                <?php


                // info above title & above image & category above title & title above image
                    if( $art_title_pos == 'top' || $info_pos == 'top' || ( $category_position == 'above' && $art_title_pos == 'top' ) || $art_excerpt_pos == 'top' || $btn_pos == 'top' ) { ?>
                        <div class="td-module-meta-info td-module-meta-info-top">
                            <?php

                            // custom label
                            if ($hide_label == 'above') {
                                echo $extra_cat;
                            }
                                // category
                                if ( $category_position == 'above' && $art_title_pos == 'top' ) {
                                    echo $this->get_category();
                                }

                                // title
                                if( $info_pos == 'title' && $art_title_pos == 'top' ) {
                                    echo $meta_info;
                                }


                                // excerpt
                                if( $art_title_pos == 'top' ) {
                                    echo $this->get_title($title_length, $title_tag);
                                }

                                // info above image
                                if( $info_pos == 'top' ) {
                                    echo $meta_info;
                                }

                                // excerpt above image
                                if( $art_excerpt_pos == 'top' ) {
                                    echo $excerpt;
                                }

                                // button above image
                                if( $btn_pos == 'top' ) {
                                    echo $button;
                                }
                            ?>
                        </div>
                    <?php }

                    // image
                    if( $hide_image == '' ) { ?>
                        <div class="td-image-container">
                            <?php
                                if ($category_position == 'image') {
                                    echo $this->get_category();
                                }

                            echo $this->get_image($image_size, true);
                            echo $this->get_video_duration();

                            ?>
                        </div>
                <?php } ?>

                <?php if( $art_title_pos == 'bottom' || $info_pos == 'bottom' || ( $category_position == 'above' && $art_title_pos == 'bottom' ) || $art_excerpt_pos == 'bottom' || $btn_pos == 'bottom' ) { ?>
                    <div class="td-module-meta-info td-module-meta-info-bottom">
                        <?php
                            // category above title & title under image
                            if ( $category_position == 'above' && $art_title_pos == 'bottom') {
                                echo $this->get_category();
                            }

                            // info above title & under image & title under image,
                            if( $info_pos == 'title' && $art_title_pos == 'bottom' ) {
                                echo $meta_info;
                            }

                            // title under image
                            if( $art_title_pos == 'bottom' ) {
                                echo $this->get_title($title_length, $title_tag);
                            }

                            // info under image
                            if( $info_pos == 'bottom' ) {
                                echo $meta_info;
                            }

                            // excerpt under image
                            if( $art_excerpt_pos == 'bottom' ) {
                                echo $excerpt;
                            }

                            //  custom label
                             if ($hide_label == '') {
                                 echo $extra_cat;
                             }

                            // button under image
                            if( $btn_pos == 'bottom' ) {
                                echo $button;
                            }
                        ?>
                    </div>
                <?php } ?>
            </div>
        </div>

        <?php return ob_get_clean();
    }
}
