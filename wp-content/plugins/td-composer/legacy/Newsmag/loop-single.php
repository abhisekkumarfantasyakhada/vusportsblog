<?php
/**
 * The single post loop Default template
 **/

if (have_posts()) {
    the_post();

    $td_mod_single = new td_module_single($post);

    ?>


    <article id="post-<?php echo esc_attr( $td_mod_single->post->ID ) ?>" class="<?php echo join(' ', get_post_class());?>" <?php $td_mod_single->show_item_scope() ?>>
        <div class="td-post-header td-pb-padding-side">
            <?php echo td_page_generator::get_single_breadcrumbs($td_mod_single->title) ?>

            <?php $td_mod_single->show_category() ?>

            <header>
                <?php $td_mod_single->show_title() ?>


                <?php if (!empty($td_mod_single->td_post_theme_settings['td_subtitle'])) { ?>
                    <p class="td-post-sub-title"><?php printf( '%1$s', $td_mod_single->td_post_theme_settings['td_subtitle'] ) ?></p>
                <?php } ?>


                <div class="meta-info">

                    <?php $td_mod_single->show_author() ?>
                    <?php $td_mod_single->show_date(false, false) ?>
                    <?php $td_mod_single->show_modified_date() ?>
                    <?php $td_mod_single->show_views() ?>
                    <?php $td_mod_single->show_comments() ?>
                </div>
            </header>
        </div>

        <?php if ( td_util::tdc_is_installed() ) {
            echo $td_mod_single->get_social_sharing_top();
        } ?>

        <div class="td-post-content td-pb-padding-side">

        <?php
        // override the default featured image by the templates (single.php and home.php/index.php - blog loop)
        if (!empty(td_global::$load_featured_img_from_template)) {
            if ( td_util::tdc_is_installed() ) {
                $td_mod_single->show_image(td_global::$load_featured_img_from_template);
            } else {
                $td_mod_single->show_image('full');
            }
        } else {
            if ( td_util::tdc_is_installed() ) {
                $td_mod_single->show_image('td_640x0');
            } else {
                $td_mod_single->show_image('full');
            }
        }
        ?>

        <?php $td_mod_single->show_content() ?>
        </div>


        <footer>
            <?php $td_mod_single->show_post_pagination() ?>
            <?php $td_mod_single->show_review() ?>

            <div class="td-post-source-tags td-pb-padding-side">
                <?php $td_mod_single->show_source_and_via() ?>
                <?php $td_mod_single->show_the_tags() ?>
            </div>

            <?php if ( td_util::tdc_is_installed() ) {
                echo $td_mod_single->get_social_sharing_bottom();
            } ?>
            <?php $td_mod_single->show_next_prev_posts() ?>
            <?php $td_mod_single->show_author_box() ?>
	        <?php $td_mod_single->show_item_scope_meta() ?>
        </footer>

    </article> <!-- /.post -->

    <?php if ( td_util::tdc_is_installed() ) {
        echo $td_mod_single->related_posts();
    } ?>

<?php
} else {
    //no posts
    echo td_page_generator::no_posts();
}