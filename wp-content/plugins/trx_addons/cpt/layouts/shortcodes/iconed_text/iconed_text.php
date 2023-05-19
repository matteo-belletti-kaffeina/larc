<?php
/**
 * Shortcode: Display icons with two text lines
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.6.08
 */

	
// Load required styles and scripts for the frontend
if ( !function_exists( 'trx_addons_sc_layouts_iconed_text_load_scripts_front' ) ) {
	add_action("wp_enqueue_scripts", 'trx_addons_sc_layouts_iconed_text_load_scripts_front');
	function trx_addons_sc_layouts_iconed_text_load_scripts_front() {
		if (trx_addons_is_on(trx_addons_get_option('debug_mode'))) {
			wp_enqueue_style( 'trx_addons-sc_layouts_iconed_text', trx_addons_get_file_url('cpt/layouts/shortcodes/iconed_text/iconed_text.css'), array(), null );
		}
	}
}

	
// Merge shortcode specific styles into single stylesheet
if ( !function_exists( 'trx_addons_sc_layouts_iconed_text_merge_styles' ) ) {
	add_action("trx_addons_filter_merge_styles", 'trx_addons_sc_layouts_iconed_text_merge_styles');
	function trx_addons_sc_layouts_iconed_text_merge_styles($list) {
		$list[] = 'cpt/layouts/shortcodes/iconed_text/iconed_text.css';
		return $list;
	}
}



// trx_sc_layouts_iconed_text
//-------------------------------------------------------------
/*
[trx_sc_layouts_iconed_text id="unique_id" icon="hours" text1="Opened hours" text2="8:00am - 5:00pm"]
*/
if ( !function_exists( 'trx_addons_sc_layouts_iconed_text' ) ) {
	function trx_addons_sc_layouts_iconed_text($atts, $content=null){	
		$atts = trx_addons_sc_prepare_atts('trx_sc_layouts_iconed_text', $atts, array(
			// Individual params
			"type" => "default",
			"icon_type" => '',
			"icon_fontawesome" => "",
			"icon_openiconic" => "",
			"icon_typicons" => "",
			"icon_entypo" => "",
			"icon_linecons" => "",
			"text1" => "",
			"text2" => "",
			"link" => "",
			"hide_on_tablet" => "0",
			"hide_on_mobile" => "0",
			// Common params
			"id" => "",
			"class" => "",
			"css" => ""
			)
		);

		$atts['icon'] = isset( $atts['icon_' . $atts['icon_type']] ) && $atts['icon_' . $atts['icon_type']] != 'empty' ? $atts['icon_' . $atts['icon_type']] : '';
		trx_addons_load_icons($atts['icon_type']);

		ob_start();
		trx_addons_get_template_part(array(
										'cpt/layouts/shortcodes/iconed_text/tpl.'.trx_addons_esc($atts['type']).'.php',
										'cpt/layouts/shortcodes/iconed_text/tpl.default.php'
										),
										'trx_addons_args_sc_layouts_iconed_text',
										$atts
									);
		$output = ob_get_contents();
		ob_end_clean();
		
		return apply_filters('trx_addons_sc_output', $output, 'trx_sc_layouts_iconed_text', $atts, $content);
	}
}


// Add [trx_sc_layouts_iconed_text] in the VC shortcodes list
if (!function_exists('trx_addons_sc_layouts_iconed_text_add_in_vc')) {
	function trx_addons_sc_layouts_iconed_text_add_in_vc() {

		if (!trx_addons_exists_visual_composer()) return;

		add_shortcode("trx_sc_layouts_iconed_text", "trx_addons_sc_layouts_iconed_text");

		vc_lean_map("trx_sc_layouts_iconed_text", 'trx_addons_sc_layouts_iconed_text_add_in_vc_params');
		class WPBakeryShortCode_Trx_Sc_Layouts_Iconed_Text extends WPBakeryShortCode {}
	}
	add_action('init', 'trx_addons_sc_layouts_iconed_text_add_in_vc', 15);
}

// Return params
if (!function_exists('trx_addons_sc_layouts_iconed_text_add_in_vc_params')) {
	function trx_addons_sc_layouts_iconed_text_add_in_vc_params() {
		return apply_filters('trx_addons_sc_map', array(
				"base" => "trx_sc_layouts_iconed_text",
				"name" => esc_html__("Layouts: Iconed text", 'trx_addons'),
				"description" => wp_kses_data( __("Insert icon with two text lines to the custom layout", 'trx_addons') ),
				"category" => esc_html__('ThemeREX', 'trx_addons'),
				"icon" => 'icon_trx_sc_layouts_iconed_text',
				"class" => "trx_sc_layouts_iconed_text",
				"content_element" => true,
				"is_container" => false,
				"show_settings_on_create" => true,
				"params" => array_merge(
					array(
						array(
							"param_name" => "type",
							"heading" => esc_html__("Layout", 'trx_addons'),
							"description" => wp_kses_data( __("Select shortcodes's layout", 'trx_addons') ),
							"std" => "default",
							"value" => apply_filters('trx_addons_sc_type', array(
								esc_html__('Default', 'trx_addons') => 'default',
							), 'trx_sc_layouts_iconed_text' ),
							"type" => "dropdown"
						),
					),
					trx_addons_vc_add_icon_param(''),
					array(
						array(
							"param_name" => "text1",
							"heading" => esc_html__("Text line 1", 'trx_addons'),
							"description" => wp_kses_data( __("Text in the first line.", 'trx_addons') ),
							"admin_label" => true,
							'edit_field_class' => 'vc_col-sm-6',
							"type" => "textfield"
						),
						array(
							"param_name" => "text2",
							"heading" => esc_html__("Text line 2", 'trx_addons'),
							"description" => wp_kses_data( __("Text in the second line.", 'trx_addons') ),
							"admin_label" => true,
							'edit_field_class' => 'vc_col-sm-6',
							"type" => "textfield"
						),
						array(
							"param_name" => "link",
							"heading" => esc_html__("Link URL", 'trx_addons'),
							"description" => wp_kses_data( __("Specify link URL. If empty - show plain text without link", 'trx_addons') ),
							"type" => "textfield"
						)
					),
					trx_addons_vc_add_hide_param(),
					trx_addons_vc_add_id_param()
				)
			), 'trx_sc_layouts_iconed_text');
	}
}
?>