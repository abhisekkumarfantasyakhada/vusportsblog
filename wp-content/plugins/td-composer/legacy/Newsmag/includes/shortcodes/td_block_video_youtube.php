<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 30.12.2014
 * Time: 13:27
 */


require_once(TDC_PATH . '/legacy/common/wp_booster/td_video_playlist_render.php');


//class for youtube playlist shortcode
class td_block_video_youtube extends td_block {

    function render($atts, $content = null) {
        return td_video_playlist_render::render_generic($atts, 'youtube', $this->get_wrapper_class());
    }
}