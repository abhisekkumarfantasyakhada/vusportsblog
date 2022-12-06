<?php

class td_block_text_with_title extends td_block {

    public function get_custom_css() {
        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $unique_block_class = $this->block_uid;

        $compiled_css = '';

        $raw_css =
            "<style>

                /* @f_header */
				.$unique_block_class .block-title a,
				.$unique_block_class .block-title span {
					@f_header
				}
				
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    static function cssMedia( $res_ctx ) {

        $res_ctx->load_font_settings( 'f_header' );

    }

    function render($atts, $content = null) {
        parent::render($atts); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query

//	    if ( base64_decode( $content, true ) && base64_encode( base64_decode( $content, true ) ) === $content && mb_detect_encoding( base64_decode( $content, true ) ) === mb_detect_encoding( $content ) ) {
//			$content = base64_decode( $content );
//		}

        $atts = shortcode_atts(
            array(
                'content' => __('Html code here! Replace this with any non empty text and that\'s it.', TD_THEME_NAME ),
                'el_class' => '',
            ), $atts, 'td_block_text_with_title' );

        if (td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            if (is_null($content) || empty($content)) {
                $content = $atts['content'];
            }
        }

        $buffy = '';
        $buffy .= '<div class="' . $this->get_block_classes() . '" ' . $this->get_block_html_atts() . '>';

		    //get the block js
		    $buffy .= $this->get_block_css();

            $buffy .= $this->get_block_title();
            $buffy .= '<div class="td_mod_wrap td-pb-padding-side td-fix-index">';
                if ( base64_decode( $content, true ) && base64_encode( base64_decode( $content, true ) ) === $content ) {
                    $content = base64_decode( $content );
                }

                // As vc does
                $content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );

                $render_content = true;

                if ( tdc_state::is_live_editor_iframe() || tdc_state::is_live_editor_ajax() ) {
                    $mapped_shortcodes = tdc_mapper::get_mapped_shortcodes();
                    foreach ( $mapped_shortcodes as $base => $mapped_shortcode ) {
                        if ( has_shortcode( $content, $base ) ) {
                            $render_content = false;
                            break;
                        }
                    }
                }

                if ( $render_content ) {
                    $content = do_shortcode( shortcode_unautop( $content ) );
                }

                $buffy .= $content;

            $buffy .= '</div>';
        $buffy .= '</div>';

        return $buffy;
    }
}