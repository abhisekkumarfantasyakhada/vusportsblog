<?php if (td_util::get_option('tds_top_bar') != 'hide_top_bar') { ?>

    <div class="td-top-bar-container top-bar-style-2">
        <?php require_once('top-widget.php'); ?>
        <?php require_once('top-menu.php'); ?>
    </div>

<?php }
if ( !is_user_logged_in() ) {
    require_once('td-login-modal.php');
} ?>