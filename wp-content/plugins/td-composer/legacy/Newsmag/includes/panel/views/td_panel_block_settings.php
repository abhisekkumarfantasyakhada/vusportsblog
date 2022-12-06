<!-- Thumbs on Modules/Blocks -->
<?php
    echo td_panel_generator::ajax_box('Thumbs on Modules/Blocks', array(
        'td_ajax_calling_file' => basename(__FILE__),
        'td_ajax_box_id' => 'td_thumbs_on_modules_and_blocks',
        ), '', 'td_panel_box_thumb_on_modules'
    );
?>





<!-- Category label on modules -->
<?php echo td_panel_generator::box_start('Category tag on Modules/Blocks', false); ?>

    <div class="td-box-row">
        <div class="td-box-description td-box-full">
            <span class="td-box-title">More information:</span>
            <p>From here you can show or hide the category tag from modules. <a target="_blank" href="http://forum.tagdiv.com/modules/" >Read more about modules</a></p>
        </div>
        <div class="td-box-row-margin-bottom"></div>
    </div>



    <?php
    foreach (td_api_module::get_all() as $td_module_class => $td_module_array) {
        if ($td_module_array['category_label'] === true) {
            ?>
            <!-- <?php printf( '%1$s', $td_module_array['text'] ) ?> -->
            <div class="td-box-row">
                <div class="td-box-description">
                    <span class="td-box-title"><?php printf( '%1$s', $td_module_array['text'] . td_panel_generator::helper_generate_used_on_block_list($td_module_array['used_on_blocks']) ) ?></span>
                    <p>Hide or show the category tag</p>
                </div>
                <div class="td-box-control-full">
                    <?php
                    echo td_panel_generator::checkbox(array(
                        'ds' => 'td_option',
                        'option_id' => 'tds_category_' . td_api_module::_helper_get_module_name_from_class($td_module_class),
                        'true_value' => 'yes',
                        'false_value' => ''
                    ));
                    ?>
                </div>
            </div>
            <?php
        }
    }

    ?>
<?php echo td_panel_generator::box_end();?>


<!-- Meta info on Modules/Blocks -->
<?php echo td_panel_generator::box_start('Meta info on Modules/Blocks', false); ?>

<!-- Show author name -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">SHOW AUTHOR NAME</span>
        <p>Enable or disable the author name (on blocks and modules)</p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::checkbox(array(
            'ds' => 'td_option',
            'option_id' => 'tds_m_show_author_name',
            'true_value' => '',
            'false_value' => 'hide'
        ));
        ?>
    </div>
</div>

<!-- Show date -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">SHOW DATE</span>
        <p>Enable or disable the post date (on blocks and modules)</p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::checkbox(array(
            'ds' => 'td_option',
            'option_id' => 'tds_m_show_date',
            'true_value' => '',
            'false_value' => 'hide'
        ));
        ?>
    </div>
</div>

<!-- Show modified date -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">SHOW MODIFIED DATE</span>
        <p>Show the modified post date instead of published date on blocks and modules (Show Date must be active)</p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::checkbox(array(
            'ds' => 'td_option',
            'option_id' => 'tds_m_show_modified_date',
            'true_value' => 'yes',
            'false_value' => ''
        ));
        ?>
    </div>
</div>


<!-- Show custom label -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">SHOW CUSTOM CATEGORY LABEL</span>
        <p>Show custom category label name, this will appear on modules/blocks like a category tag (on blocks and modules)</p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::checkbox(array(
            'ds' => 'td_option',
            'option_id' => 'tds_m_show_custom_category_label',
            'true_value' => 'yes',
            'false_value' => ''
        ));
        ?>
    </div>
</div>

<!-- SHow comment count -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">SHOW COMMENT COUNT</span>
        <p>Enable or disable comment number (on blocks and modules)</p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::checkbox(array(
            'ds' => 'td_option',
            'option_id' => 'tds_m_show_comments',
            'true_value' => '',
            'false_value' => 'hide'
        ));
        ?>
    </div>
</div>

<!-- Show Reviews -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">SHOW REVIEW</span>
        <p>Enable or disable reviews (on blocks and modules)</p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::checkbox(array(
            'ds' => 'td_option',
            'option_id' => 'tds_m_show_review',
            'true_value' => '',
            'false_value' => 'hide'
        ));
        ?>
    </div>
</div>

<!-- Show Nofollow -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">ADD NOFOLLOW</span>
        <p>Add or remove nofollow on thumb link (on blocks and modules)</p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::checkbox(array(
            'ds' => 'td_option',
            'option_id' => 'tds_m_nofollow_image',
            'true_value' => 'yes',
            'false_value' => ''
        ));
        ?>
    </div>
</div>

<?php if( defined( 'TD_SUBSCRIPTION' )) { ?>

<!-- Show Exclusive label -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">SHOW EXCLUSIVE (Opt-In Builder)</span>
        <p>Enable or disable exclusive (on blocks and modules)</p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::checkbox(array(
            'ds' => 'td_option',
            'option_id' => 'tds_m_show_exclusive',
            'true_value' => '',
            'false_value' => 'hide'
        ));
        ?>
    </div>
</div>
    <?php } ?>

<?php echo td_panel_generator::box_end();?>

<!-- Video modal on blocks and modules -->
<?php echo td_panel_generator::box_start('Modal video pop up', false); ?>

<!-- Enable video modal on blocks and modules -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">Modal video pop up </span>
        <p>Enable or disable modal video globally</p>

    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::checkbox(array(
            'ds' => 'td_option',
            'option_id' => 'tds_m_show_modal_video',
            'true_value' => '',
            'false_value' => 'hide'
        ));
        ?>
    </div>
</div>


<!-- Modal Video Popup Ad -->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">Ad code:</span>
        <p>Paste your ad code here.</p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::textarea(array(
            'ds' => 'td_option',
            'option_id' => 'tds_modal_video_ad'
        ));
        ?>
    </div>
</div>

<!-- A title for the Ad-->
<div class="td-box-row">
    <div class="td-box-description">
        <span class="td-box-title">AD title:</span>

        <p>A title for the Ad, like - <strong>Advertisement</strong> - if you leave it blank the ad spot will not have a title.</p>
    </div>
    <div class="td-box-control-full">
        <?php
        echo td_panel_generator::input( array(
            'ds'        => 'td_option',
            'option_id' => 'tds_modal_video_ad_title'
        ) );
        ?>
    </div>
</div>


<?php echo td_panel_generator::box_end();?>


<!-- 7 days post sorting -->
<?php echo td_panel_generator::box_start('24/48 hours and 7 days post sorting', false ); ?>

<!-- text -->
<div class="td-box-row">
    <div class="td-box-description td-box-full">
        <ul>
            <li>When you enable this option new sorting options will work and will be selectable on each block (last 24/48 hours and last 7 days popular).</li>
            <li>These sorting options will pick posts that are popular in the last 24/48 hours or 7 days, ordered by page views.</li>
            <li>Please note that this option comes with a small performance penalty and it does not work well with caching plugins yet. When caching is enabled the sorting will be an estimation of the popularity in the last 24/48 hours or 7 days.</li>
        </ul>
    </div>
    <div class="td-box-row-margin-bottom"></div>
</div>

<!-- use 7 days post sorting -->
<div class="td-box-row">
    <div class="td-box-description" style="width: 400px;">
        <span class="td-box-title">USE LAST 24/48 HOURS & 7 DAYS POST SORTING</span>
        <p>Enable or disable the popular last 24/48 hours & 7 days sorting.</p>
    </div>
    <div class="td-box-control-full" style="width: 320px;">
        <?php
        echo td_panel_generator::checkbox(
            array(
                'ds' => 'td_option',
                'option_id' => 'tds_p_enable_7_days_count',
                'true_value' => 'enabled',
                'false_value' => ''
            )
        );
        ?>
    </div>
</div>

<?php echo td_panel_generator::box_end();?>



    <hr>
    <div class="td-section-separator">Block predefined style</div>

    <!-- STYLE 1 CSS ------------------------------------------------------------------------->
    <?php
    echo td_panel_generator::ajax_box('Style 1 - Red', array(
            'td_ajax_calling_file' => basename(__FILE__),
            'td_ajax_box_id' => 'td_style_1_red'
        ), '', 'td_panel_box_style_1_red'
    );
    ?>



    <!-- STYLE 2 CSS ------------------------------------------------------------------------->
    <?php
    echo td_panel_generator::ajax_box('Style 2 - Black', array(
            'td_ajax_calling_file' => basename(__FILE__),
            'td_ajax_box_id' => 'td_style_2_black'
        ), '', 'td_panel_box_style_2_black'
    );
    ?>



    <!-- STYLE 3 CSS ------------------------------------------------------------------------->
    <?php
    echo td_panel_generator::ajax_box('Style 3 - Orange', array(
            'td_ajax_calling_file' => basename(__FILE__),
            'td_ajax_box_id' => 'td_style_3_orange'
        ), '', 'td_panel_box_style_3_orange'
    );
    ?>



    <!-- STYLE 4 CSS ------------------------------------------------------------------------->
    <?php
    echo td_panel_generator::ajax_box('Style 4 - Yellow', array(
            'td_ajax_calling_file' => basename(__FILE__),
            'td_ajax_box_id' => 'td_style_4_yellow'
        ), '', 'td_panel_box_style_4_yellow'
    );
    ?>



    <!-- STYLE 5 CSS ------------------------------------------------------------------------->
    <?php
    echo td_panel_generator::ajax_box('Style 5 - Green', array(
            'td_ajax_calling_file' => basename(__FILE__),
            'td_ajax_box_id' => 'td_style_5_green'
        ), '', 'td_panel_box_style_5_green'
    );
    ?>



    <!-- STYLE 6 CSS ------------------------------------------------------------------------->
    <?php
    echo td_panel_generator::ajax_box('Style 6 - Pink', array(
            'td_ajax_calling_file' => basename(__FILE__),
            'td_ajax_box_id' => 'td_style_6_pink'
        ), '', 'td_panel_box_style_6_pink'
    );

