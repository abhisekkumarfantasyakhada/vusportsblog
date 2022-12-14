<?php
class td_block_social_share extends td_block {

	public function get_custom_css() {
		// $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $in_composer = td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax();
        $in_element = td_global::get_in_element();
        $unique_block_class_prefix = '';
        if( $in_element || $in_composer ) {
            $unique_block_class_prefix = 'tdc-row .';

            if( $in_element && $in_composer ) {
                $unique_block_class_prefix = 'tdc-row-composer .';
            }
        }
        $unique_block_class = $unique_block_class_prefix . $this->block_uid;

        $compiled_css = '';

		$raw_css =
			"<style>

				/* @style_general_single_post_share */
				.td_block_social_share {
                  margin-bottom: 23px;
                  padding: 20px;
                }
                .tdb-share-classic {
                  position: relative;
                  height: 20px;
                  margin-bottom: 15px;
                }

				
				
				/* @align_center */
				.$unique_block_class .td-post-sharing,
				.$unique_block_class .tdb-share-classic {
					text-align: center;
				}
				/* @align_right */
				.$unique_block_class .td-post-sharing,
				.$unique_block_class .tdb-share-classic {
					text-align: right;
				}
				/* @f_share */
				.$unique_block_class .td-social-share-text {
					@f_share
				}
				/* @f_txt */
				.$unique_block_class .td-social-network {
					@f_txt
				}
				
				/* @share_i_color */
				.$unique_block_class .td-social-expand-tabs-icon,
				.$unique_block_class .td-icon-share {
					color: @share_i_color;
				}
				/* @share_color */
				.$unique_block_class .td-social-share-text .td-social-but-text {
					color: @share_color;
				}
				.$unique_block_class .td-social-handler .td-social-but-text:before {
					background-color: @share_color;
				}
				/* @share_bg_color */
				.$unique_block_class .td-social-share-text,
				.$unique_block_class .td-social-handler {
					background-color: @share_bg_color;
				}
				.$unique_block_class .td-social-share-text:after {
					border-color: transparent transparent transparent @share_bg_color;
				}
				/* @share_b_color */
				.$unique_block_class .td-social-handler {
					border-color: @share_b_color;
				}
				.$unique_block_class .td-social-share-text:before {
					border-color: transparent transparent transparent @share_b_color;
				}
				
				/* @btn_i_color */
				.$unique_block_class .td-social-network .td-social-but-icon i {
					color: @btn_i_color;
				}
				/* @btn_color */
				.$unique_block_class .td-social-network .td-social-but-text {
					color: @btn_color;
				}
				.$unique_block_class .td-social-network .td-social-but-text:before {
					background-color: @btn_color;
				}
				/* @btn_bg_color */
				.$unique_block_class .td-ps-bg .td-social-network div,
				.$unique_block_class .td-ps-icon-bg .td-social-network .td-social-but-icon,
				.$unique_block_class .td-ps-dark-bg .td-social-network div {
					background-color: @btn_bg_color;
				}
				.$unique_block_class .td-ps-icon-arrow .td-social-but-icon:after {
				    border-left-color: @btn_bg_color;
				}
				.$unique_block_class .td-ps-border-colored .td-social-but-text {
				    border-color: @btn_bg_color;
				}
			
				/* @btn_b_color */
				.$unique_block_class .td-ps-border .td-social-sharing-button .td-social-but-icon,
				.$unique_block_class .td-ps-border .td-social-sharing-button .td-social-but-text,
				.$unique_block_class .td-ps-border .td-social-sharing-button .td-social-handler {
					border-color: @btn_b_color;
				}
				
			</style>";


		$td_css_res_compiler = new td_css_res_compiler( $raw_css );
		$td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->get_all_atts() );

		$compiled_css .= $td_css_res_compiler->compile_css();
		return $compiled_css;
	}

	static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_general_single_post_share', 1 );

		/*-- FONTS -- */
		$res_ctx->load_font_settings( 'f_share' );
		$res_ctx->load_font_settings( 'f_txt' );

		/*-- COLORS -- */
		$res_ctx->load_settings_raw( 'share_i_color', $res_ctx->get_shortcode_att('share_i_color') );
		$res_ctx->load_settings_raw( 'share_color', $res_ctx->get_shortcode_att('share_color') );
		$res_ctx->load_settings_raw( 'share_bg_color', $res_ctx->get_shortcode_att('share_bg_color') );
		$res_ctx->load_settings_raw( 'share_b_color', $res_ctx->get_shortcode_att('share_b_color') );

		$res_ctx->load_settings_raw( 'btn_i_color', $res_ctx->get_shortcode_att('btn_i_color') );
		$res_ctx->load_settings_raw( 'btn_color', $res_ctx->get_shortcode_att('btn_color') );
		$res_ctx->load_settings_raw( 'btn_bg_color', $res_ctx->get_shortcode_att('btn_bg_color') );
		$res_ctx->load_settings_raw( 'btn_b_color', $res_ctx->get_shortcode_att('btn_b_color') );

		// content align
		$content_align = $res_ctx->get_shortcode_att('content_align_horizontal');
		if ( $content_align == 'content-horiz-center' ) {
			$res_ctx->load_settings_raw( 'align_center', 1 );
		} else if ( $content_align == 'content-horiz-right' ) {
			$res_ctx->load_settings_raw( 'align_right', 1 );
		}
	}

    /**
     * Disable loop block features. This block does not use a loop and it doesn't need to run a query.
     */
    function __construct() {
        parent::disable_loop_block_features();
    }

    function render( $atts, $content = null ) {
        parent::render( $atts ); // sets the live atts, $this->atts, $this->block_uid, $this->td_query (it runs the query)

        // remove top border
        $block_classes = str_replace('td-pb-border-top', '', $this->get_block_classes());

        $buffy = ''; // output buffer

        $buffy .= '<div class="' . $block_classes . '" ' . $this->get_block_html_atts() . '>';

	        // get the block css
	        $buffy .= $this->get_block_css();

	        // get the js for this block
	        $buffy .= $this->get_block_js();

        $like_share_style = 'style1';
        if ( isset($atts['like_share_style']) ) {
            $like_share_style = $atts['like_share_style'];
        }

        $share_text_show = true;
        if ( isset($atts['like_share_text']) && $atts['like_share_text'] === 'yes' ) {
            $share_text_show = false;
        }

		    $buffy .= td_social_sharing::render_generic(array(
                'services' => td_api_social_sharing_styles::_helper_get_enabled_socials(),
                'style' => $like_share_style,
                'share_text_show' => $share_text_show,
                'el_class' => ''
            ), $this->block_uid);

	    $buffy .= '</div>';

        return $buffy;
    }
}