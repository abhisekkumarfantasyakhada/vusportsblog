<!doctype html >
<!--[if IE 8]>    <html class="ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>    <html class="ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <title><?php wp_title('|', true, 'right'); ?></title>
    <meta charset="<?php bloginfo( 'charset' );?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php
    wp_head(); /** we hook up in wp_booster @see td_wp_booster_functions::hook_wp_head */
    ?>
</head>

<body <?php body_class() ?> itemscope="itemscope" itemtype="<?php echo td_global::$http_or_https?>://schema.org/WebPage">
<?php do_action( 'td_wp_body_open' ) ?>

    <?php /* scroll to top */
    $td_hide_totop_on_mob = '';
    if (td_util::get_option('tds_to_top_on_mobile') !== 'show') {
        $td_hide_totop_on_mob = ' td-hide-scroll-up-on-mob';
    }

    if ( td_util::get_option('tds_to_top') != 'hide' ) {
    ?>
    <div class="td-scroll-up <?php echo $td_hide_totop_on_mob ?>"  style="display:none;"><i class="td-icon-menu-up"></i></div>

    <?php } ?>

    <?php load_template( TDC_PATH_LEGACY . '/parts/menu-mobile.php', true);?>
    <?php load_template( TDC_PATH_LEGACY . '/parts/search.php', true);?>


    <div id="td-outer-wrap">
    <?php //this is closing in the footer.php file ?>

        <div class="td-outer-container">
        <?php //this is closing in the footer.php file ?>

            <?php
            /*
             * loads the header template set in Theme Panel -> Header area
             * the template files are located in ../parts/header
             */
            td_api_header_style::show_header();

            do_action('td_wp_booster_after_header'); //used by unique articles