<?php
/**
 * Setup theme-specific fonts and colors
 *
 * @package WordPress
 * @subpackage LUXMED
 * @since LUXMED 1.0.22
 */

// Theme init priorities:
// 1 - register filters to add/remove lists items in the Theme Options
// 2 - create Theme Options
// 3 - add/remove Theme Options elements
// 5 - load Theme Options
// 9 - register other filters (for installer, etc.)
//10 - standard Theme init procedures (not ordered)
if ( !function_exists('luxmed_customizer_theme_setup1') ) {
	add_action( 'after_setup_theme', 'luxmed_customizer_theme_setup1', 1 );
	function luxmed_customizer_theme_setup1() {
		
		// -----------------------------------------------------------------
		// -- Theme fonts (Google and/or custom fonts)
		// -----------------------------------------------------------------
		
		// Fonts to load when theme start
		// It can be Google fonts or uploaded fonts, placed in the folder /css/font-face/font-name inside the theme folder
		// Attention! Font's folder must have name equal to the font's name, with spaces replaced on the dash '-'
		// For example: font name 'TeX Gyre Termes', folder 'TeX-Gyre-Termes'
		luxmed_storage_set('load_fonts', array(
			// Google font
			array(
				'name'	 => 'Rubik',
				'family' => 'sans-serif',
				'styles' => '300,300i,400,400i,500,500i,700,700i,900,900i'		// Parameter 'style' used only for the Google fonts
				),
			array(
				'name'	 => 'Lora',
				'family' => 'serif',
				'styles' => '400,400i,700,700i'
				)
		));
		
		// Characters subset for the Google fonts. Available values are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese
		luxmed_storage_set('load_fonts_subset', 'latin,latin-ext');
		
		// Settings of the main tags
		luxmed_storage_set('theme_fonts', array(
			'p' => array(
				'title'				=> esc_html__('Main text', 'luxmed'),
				'description'		=> esc_html__('Font settings of the main text of the site', 'luxmed'),
				'font-family'		=> 'Rubik, sans-serif',
				'font-size' 		=> '1em',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.929em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '',
				'margin-top'		=> '0em',
				'margin-bottom'		=> '1.9em'
				),
			'h1' => array(
				'title'				=> esc_html__('Heading 1', 'luxmed'),
				'font-family'		=> 'Rubik, sans-serif',
				'font-size' 		=> '3.214em',
				'font-weight'		=> '300',
				'font-style'		=> 'normal',
				'line-height'		=> '1.133em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0',
				'margin-top'		=> '1.5em',
				'margin-bottom'		=> '0.5em'
				),
			'h2' => array(
				'title'				=> esc_html__('Heading 2', 'luxmed'),
				'font-family'		=> 'Rubik, sans-serif',
				'font-size' 		=> '2.143em',
				'font-weight'		=> '300',
				'font-style'		=> 'normal',
				'line-height'		=> '1.3em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0',
				'margin-top'		=> '1.8em',
				'margin-bottom'		=> '0.65em'
				),
			'h3' => array(
				'title'				=> esc_html__('Heading 3', 'luxmed'),
				'font-family'		=> 'Rubik, sans-serif',
				'font-size' 		=> '1.4285em',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.45em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0',
				'margin-top'		=> '2.6em',
				'margin-bottom'		=> '0.62em'
				),
			'h4' => array(
				'title'				=> esc_html__('Heading 4', 'luxmed'),
				'font-family'		=> 'Rubik, sans-serif',
				'font-size' 		=> '1.2857em',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.5em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0',
				'margin-top'		=> '3em',
				'margin-bottom'		=> '0.8em'
				),
			'h5' => array(
				'title'				=> esc_html__('Heading 5', 'luxmed'),
				'font-family'		=> 'Rubik, sans-serif',
				'font-size' 		=> '1.214em',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.5294em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0',
				'margin-top'		=> '3.9em',
				'margin-bottom'		=> '0.8em'
				),
			'h6' => array(
				'title'				=> esc_html__('Heading 6', 'luxmed'),
				'font-family'		=> 'Rubik, sans-serif',
				'font-size' 		=> '1.1428em',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.625em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0',
				'margin-top'		=> '3.3em',
				'margin-bottom'		=> '0.8em'
				),
			'logo' => array(
				'title'				=> esc_html__('Logo text', 'luxmed'),
				'description'		=> esc_html__('Font settings of the text case of the logo', 'luxmed'),
				'font-family'		=> 'Rubik, sans-serif',
				'font-size' 		=> '1.8em',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.25em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '1px'
				),
			'button' => array(
				'title'				=> esc_html__('Buttons', 'luxmed'),
				'font-family'		=> 'Rubik, sans-serif',
				'font-size' 		=> '0.7857em',
				'font-weight'		=> '500',
				'font-style'		=> 'normal',
				'line-height'		=> '1.5em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '0.4px'
				),
			'input' => array(
				'title'				=> esc_html__('Input fields', 'luxmed'),
				'description'		=> esc_html__('Font settings of the input fields, dropdowns and textareas', 'luxmed'),
				'font-family'		=> 'Lora, serif',
				'font-size' 		=> '0.9285rem',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '15.5px',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0px'
				),
			'info' => array(
				'title'				=> esc_html__('Post meta', 'luxmed'),
				'description'		=> esc_html__('Font settings of the post meta: date, counters, share, etc.', 'luxmed'),
				'font-family'		=> 'Rubik, sans-serif',
				'font-size' 		=> '12px',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '2.25em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0px',
				'margin-top'		=> '0.4em',
				'margin-bottom'		=> ''
				),
			'menu' => array(
				'title'				=> esc_html__('Main menu', 'luxmed'),
				'description'		=> esc_html__('Font settings of the main menu items', 'luxmed'),
				'font-family'		=> 'Rubik, sans-serif',
				'font-size' 		=> '12px',
				'font-weight'		=> '500',
				'font-style'		=> 'normal',
				'line-height'		=> '2.8333em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '3.5px'
				),
			'submenu' => array(
				'title'				=> esc_html__('Dropdown menu', 'luxmed'),
				'description'		=> esc_html__('Font settings of the dropdown menu items', 'luxmed'),
				'font-family'		=> 'Rubik, sans-serif',
				'font-size' 		=> '11px',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '2.5em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '2px'
				)
		));
		
		
		// -----------------------------------------------------------------
		// -- Theme colors for customizer
		// -- Attention! Inner scheme must be last in the array below
		// -----------------------------------------------------------------
		luxmed_storage_set('schemes', array(
		
			// Color scheme: 'default'
			'default' => array(
				'title'	 => esc_html__('Default', 'luxmed'),
				'colors' => array(
					
					// Whole block border and background
					'bg_color'				=> '#ffffff', // !
					'bd_color'				=> '#e5e5e5',
		
					// Text and links colors
					'text'					=> '#878787', // !
					'text_light'			=> '#9e9e9e', // !
					'text_dark'				=> '#353535', // !
					'text_link'				=> '#2e9dd1', // !
					'text_hover'			=> '#353535', // !
		
					// Alternative blocks (submenu, buttons, tabs, etc.)
					'alter_bg_color'		=> '#f8fafa', // !
					'alter_bg_hover'		=> '#ffffff', // !
					'alter_bd_color'		=> '#ebecec', // !
					'alter_bd_hover'		=> '#edf0f0', // !
					'alter_text'			=> '#878787', // !
					'alter_light'			=> '#838280', // !
					'alter_dark'			=> '#353535', // !
					'alter_link'			=> '#111119', // !
					'alter_hover'			=> '#fc6b4f', // !
		
					// Input fields (form's fields and textarea)
					'input_bg_color'		=> '#f7f9fa', // !
					'input_bg_hover'		=> '#f5f7f7', // !
					'input_bd_color'		=> '#edeff0', // !
					'input_bd_hover'		=> '#e1e2e3', // !
					'input_text'			=> '#878787', // !
					'input_light'			=> '#ababab', // !
					'input_dark'			=> '#221c25', // !
					
					// Inverse blocks (text and links on accented bg)
					'inverse_text'			=> '#ffffff', // !
					'inverse_light'			=> '#ffffff', // !
					'inverse_dark'			=> '#000000', // !
					'inverse_link'			=> '#ffffff', // !
					'inverse_hover'			=> '#1d1d1d', // !
		
					// Additional accented colors (if used in the current theme)
					// For example:
					'accent2'				=> '#599c2a' // !
				
				)
			),

			// Color scheme: 'dark'
			'dark' => array(
				'title'  => esc_html__('Dark', 'luxmed'),
				'colors' => array(
					
					// Whole block border and background
					'bg_color'				=> '#1b2024', // !
					'bd_color'				=> '#1c1b1f',
		
					// Text and links colors
					'text'					=> '#9e9e9e', // !
					'text_light'			=> '#b3b3b3', // !
					'text_dark'				=> '#ffffff', // !
					'text_link'				=> '#2e9dd1', // !
					'text_hover'			=> '#ffffff', // !
		
					// Alternative blocks (submenu, buttons, tabs, etc.)
					'alter_bg_color'		=> '#13171a', // !
					'alter_bg_hover'		=> '#1a1e21', // !
					'alter_bd_color'		=> '#20272c', // !
					'alter_bd_hover'		=> '#13171a', // !
					'alter_text'			=> '#9e9e9e', // !
					'alter_light'			=> '#9e9e9e', // !
					'alter_dark'			=> '#ffffff', // !
					'alter_link'			=> '#fc6b4f', // !
					'alter_hover'			=> '#ffffff', // !
		
					// Input fields (form's fields and textarea)
					'input_bg_color'		=> '#22272b', // !
					'input_bg_hover'		=> '#2d3135', // !
					'input_bd_color'		=> '#22272b', // !
					'input_bd_hover'		=> '#2d3135', // !
					'input_text'			=> '#878787', // !
					'input_light'			=> '#ffffff', // !
					'input_dark'			=> '#ffffff', // !
					
					// Inverse blocks (text and links on accented bg)
					'inverse_text'			=> '#878787', // !
					'inverse_light'			=> '#ffffff', // !
					'inverse_dark'			=> '#ebf4f9', // !
					'inverse_link'			=> '#ffffff', // !
					'inverse_hover'			=> '#1d1d1d', // !
				
					// Additional accented colors (if used in the current theme)
					// For example:
					'accent2'				=> '#599c2a' // !
		
				)
			)
		
		));
	}
}

			
// Additional (calculated) theme-specific colors
// Attention! Don't forget setup custom colors also in the theme.customizer.color-scheme.js
if (!function_exists('luxmed_customizer_add_theme_colors')) {
	function luxmed_customizer_add_theme_colors($colors) {
		if (substr($colors['text'], 0, 1) == '#') {
			$colors['bg_color_0']  = luxmed_hex2rgba( $colors['bg_color'], 0 );
			$colors['bg_color_01']  = luxmed_hex2rgba( $colors['bg_color'], 0.1 );
			$colors['bg_color_02']  = luxmed_hex2rgba( $colors['bg_color'], 0.2 );
			$colors['bg_color_07']  = luxmed_hex2rgba( $colors['bg_color'], 0.7 );
			$colors['bg_color_08']  = luxmed_hex2rgba( $colors['bg_color'], 0.8 );
			$colors['bg_color_09']  = luxmed_hex2rgba( $colors['bg_color'], 0.9 );
			$colors['alter_bg_color_07']  = luxmed_hex2rgba( $colors['alter_bg_color'], 0.7 );
			$colors['alter_bg_color_04']  = luxmed_hex2rgba( $colors['alter_bg_color'], 0.4 );
			$colors['alter_bg_color_02']  = luxmed_hex2rgba( $colors['alter_bg_color'], 0.2 );
			$colors['alter_bd_color_02']  = luxmed_hex2rgba( $colors['alter_bd_color'], 0.2 );
			$colors['text_light_05']  = luxmed_hex2rgba( $colors['text_light'], 0.5 );
			$colors['text_dark_07']  = luxmed_hex2rgba( $colors['text_dark'], 0.7 );
			$colors['text_link_02']  = luxmed_hex2rgba( $colors['text_link'], 0.2 );
			$colors['text_link_07']  = luxmed_hex2rgba( $colors['text_link'], 0.7 );
			$colors['text_link_blend'] = luxmed_hsb2hex(luxmed_hex2hsb( $colors['text_link'], 0, 0, -15 ));
			$colors['accent2_blend'] = luxmed_hsb2hex(luxmed_hex2hsb( $colors['accent2'], 0, 0, -15 ));
			$colors['text_link_blend2'] = luxmed_hsb2hex(luxmed_hex2hsb( $colors['text_link'], 2, -33, 12 ));
			$colors['alter_hover_blend'] = luxmed_hsb2hex(luxmed_hex2hsb( $colors['alter_hover'], 0, 0, -15 ));
			$colors['alter_link_blend'] = luxmed_hsb2hex(luxmed_hex2hsb( $colors['alter_link'], 2, -5, 5 ));
		} else {
			$colors['bg_color_0'] = '{{ data.bg_color_0 }}';
			$colors['bg_color_01'] = '{{ data.bg_color_01 }}';
			$colors['bg_color_02'] = '{{ data.bg_color_02 }}';
			$colors['bg_color_07'] = '{{ data.bg_color_07 }}';
			$colors['bg_color_08'] = '{{ data.bg_color_08 }}';
			$colors['bg_color_09'] = '{{ data.bg_color_09 }}';
			$colors['alter_bg_color_07'] = '{{ data.alter_bg_color_07 }}';
			$colors['alter_bg_color_04'] = '{{ data.alter_bg_color_04 }}';
			$colors['alter_bg_color_02'] = '{{ data.alter_bg_color_02 }}';
			$colors['alter_bd_color_02'] = '{{ data.alter_bd_color_02 }}';
			$colors['text_light_05'] = '{{ data.text_light_05 }}';
			$colors['text_dark_07'] = '{{ data.text_dark_07 }}';
			$colors['text_link_02'] = '{{ data.text_link_02 }}';
			$colors['text_link_07'] = '{{ data.text_link_07 }}';
			$colors['text_link_blend'] = '{{ data.text_link_blend }}';
			$colors['accent2_blend'] = '{{ data.accent2_blend }}';
			$colors['text_link_blend2'] = '{{ data.text_link_blend2 }}';
			$colors['alter_hover_blend'] = '{{ data.alter_hover_blend }}';
			$colors['alter_link_blend'] = '{{ data.alter_link_blend }}';
		}
		return $colors;
	}
}


			
// Additional theme-specific fonts rules
// Attention! Don't forget setup fonts rules also in the theme.customizer.color-scheme.js
if (!function_exists('luxmed_customizer_add_theme_fonts')) {
	function luxmed_customizer_add_theme_fonts($fonts) {
		$rez = array();	
		foreach ($fonts as $tag => $font) {
			//$rez[$tag] = $font;
			if (substr($font['font-family'], 0, 2) != '{{') {
				$rez[$tag.'_font-family'] 		= !empty($font['font-family']) && !luxmed_is_inherit($font['font-family'])
														? 'font-family:' . trim($font['font-family']) . ';' 
														: '';
				$rez[$tag.'_font-size'] 		= !empty($font['font-size']) && !luxmed_is_inherit($font['font-size'])
														? 'font-size:' . luxmed_prepare_css_value($font['font-size']) . ";"
														: '';
				$rez[$tag.'_line-height'] 		= !empty($font['line-height']) && !luxmed_is_inherit($font['line-height'])
														? 'line-height:' . trim($font['line-height']) . ";"
														: '';
				$rez[$tag.'_font-weight'] 		= !empty($font['font-weight']) && !luxmed_is_inherit($font['font-weight'])
														? 'font-weight:' . trim($font['font-weight']) . ";"
														: '';
				$rez[$tag.'_font-style'] 		= !empty($font['font-style']) && !luxmed_is_inherit($font['font-style'])
														? 'font-style:' . trim($font['font-style']) . ";"
														: '';
				$rez[$tag.'_text-decoration'] 	= !empty($font['text-decoration']) && !luxmed_is_inherit($font['text-decoration'])
														? 'text-decoration:' . trim($font['text-decoration']) . ";"
														: '';
				$rez[$tag.'_text-transform'] 	= !empty($font['text-transform']) && !luxmed_is_inherit($font['text-transform'])
														? 'text-transform:' . trim($font['text-transform']) . ";"
														: '';
				$rez[$tag.'_letter-spacing'] 	= !empty($font['letter-spacing']) && !luxmed_is_inherit($font['letter-spacing'])
														? 'letter-spacing:' . trim($font['letter-spacing']) . ";"
														: '';
				$rez[$tag.'_margin-top'] 		= !empty($font['margin-top']) && !luxmed_is_inherit($font['margin-top'])
														? 'margin-top:' . luxmed_prepare_css_value($font['margin-top']) . ";"
														: '';
				$rez[$tag.'_margin-bottom'] 	= !empty($font['margin-bottom']) && !luxmed_is_inherit($font['margin-bottom'])
														? 'margin-bottom:' . luxmed_prepare_css_value($font['margin-bottom']) . ";"
														: '';
			} else {
				$rez[$tag.'_font-family']		= '{{ data["'.$tag.'_font-family"] }}';
				$rez[$tag.'_font-size']			= '{{ data["'.$tag.'_font-size"] }}';
				$rez[$tag.'_line-height']		= '{{ data["'.$tag.'_line-height"] }}';
				$rez[$tag.'_font-weight']		= '{{ data["'.$tag.'_font-weight"] }}';
				$rez[$tag.'_font-style']		= '{{ data["'.$tag.'_font-style"] }}';
				$rez[$tag.'_text-decoration']	= '{{ data["'.$tag.'_text-decoration"] }}';
				$rez[$tag.'_text-transform']	= '{{ data["'.$tag.'_text-transform"] }}';
				$rez[$tag.'_letter-spacing']	= '{{ data["'.$tag.'_letter-spacing"] }}';
				$rez[$tag.'_margin-top']		= '{{ data["'.$tag.'_margin-top"] }}';
				$rez[$tag.'_margin-bottom']		= '{{ data["'.$tag.'_margin-bottom"] }}';
			}
		}
		return $rez;
	}
}


//-------------------------------------------------------
//-- Thumb sizes
//-------------------------------------------------------

if ( !function_exists('luxmed_customizer_theme_setup') ) {
	add_action( 'after_setup_theme', 'luxmed_customizer_theme_setup' );
	function luxmed_customizer_theme_setup() {

		// Enable support for Post Thumbnails
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size(370, 0, false);
		
		// Add thumb sizes
		// ATTENTION! If you change list below - check filter's names in the 'trx_addons_filter_get_thumb_size' hook
		$thumb_sizes = apply_filters('luxmed_filter_add_thumb_sizes', array(
			'luxmed-thumb-huge'		=> array(1170, 658, true),
			'luxmed-thumb-big' 		=> array( 760, 428, true),
			'luxmed-thumb-med' 		=> array( 370, 208, true),
			'luxmed-thumb-tiny' 		=> array(  84,  84, true),
			'luxmed-thumb-masonry-big' => array( 760,   0, false),		// Only downscale, not crop
			'luxmed-thumb-masonry'		=> array( 370,   0, false),		// Only downscale, not crop
			)
		);
		$mult = luxmed_get_theme_option('retina_ready', 1);
		if ($mult > 1) $GLOBALS['content_width'] = apply_filters( 'luxmed_filter_content_width', 1170*$mult);
		foreach ($thumb_sizes as $k=>$v) {
			// Add Original dimensions
			add_image_size( $k, $v[0], $v[1], $v[2]);
			// Add Retina dimensions
			if ($mult > 1) add_image_size( $k.'-@retina', $v[0]*$mult, $v[1]*$mult, $v[2]);
		}

	}
}

if ( !function_exists('luxmed_customizer_image_sizes') ) {
	add_filter( 'image_size_names_choose', 'luxmed_customizer_image_sizes' );
	function luxmed_customizer_image_sizes( $sizes ) {
		$thumb_sizes = apply_filters('luxmed_filter_add_thumb_sizes', array(
			'luxmed-thumb-huge'		=> esc_html__( 'Fullsize image', 'luxmed' ),
			'luxmed-thumb-big'			=> esc_html__( 'Large image', 'luxmed' ),
			'luxmed-thumb-med'			=> esc_html__( 'Medium image', 'luxmed' ),
			'luxmed-thumb-tiny'		=> esc_html__( 'Small square avatar', 'luxmed' ),
			'luxmed-thumb-masonry-big'	=> esc_html__( 'Masonry Large (scaled)', 'luxmed' ),
			'luxmed-thumb-masonry'		=> esc_html__( 'Masonry (scaled)', 'luxmed' ),
			)
		);
		$mult = luxmed_get_theme_option('retina_ready', 1);
		foreach($thumb_sizes as $k=>$v) {
			$sizes[$k] = $v;
			if ($mult > 1) $sizes[$k.'-@retina'] = $v.' '.esc_html__('@2x', 'luxmed' );
		}
		return $sizes;
	}
}

// Remove some thumb-sizes from the ThemeREX Addons list
if ( !function_exists( 'luxmed_customizer_trx_addons_add_thumb_sizes' ) ) {
	add_filter( 'trx_addons_filter_add_thumb_sizes', 'luxmed_customizer_trx_addons_add_thumb_sizes');
	function luxmed_customizer_trx_addons_add_thumb_sizes($list=array()) {
		if (is_array($list)) {
			foreach ($list as $k=>$v) {
				if (in_array($k, array(
								'trx_addons-thumb-huge',
								'trx_addons-thumb-big',
								'trx_addons-thumb-medium',
								'trx_addons-thumb-tiny',
								'trx_addons-thumb-masonry-big',
								'trx_addons-thumb-masonry',
								)
							)
						) unset($list[$k]);
			}
		}
		return $list;
	}
}

// and replace removed styles with theme-specific thumb size
if ( !function_exists( 'luxmed_customizer_trx_addons_get_thumb_size' ) ) {
	add_filter( 'trx_addons_filter_get_thumb_size', 'luxmed_customizer_trx_addons_get_thumb_size');
	function luxmed_customizer_trx_addons_get_thumb_size($thumb_size='') {
		return str_replace(array(
							'trx_addons-thumb-huge',
							'trx_addons-thumb-huge-@retina',
							'trx_addons-thumb-big',
							'trx_addons-thumb-big-@retina',
							'trx_addons-thumb-medium',
							'trx_addons-thumb-medium-@retina',
							'trx_addons-thumb-tiny',
							'trx_addons-thumb-tiny-@retina',
							'trx_addons-thumb-masonry-big',
							'trx_addons-thumb-masonry-big-@retina',
							'trx_addons-thumb-masonry',
							'trx_addons-thumb-masonry-@retina',
							),
							array(
							'luxmed-thumb-huge',
							'luxmed-thumb-huge-@retina',
							'luxmed-thumb-big',
							'luxmed-thumb-big-@retina',
							'luxmed-thumb-med',
							'luxmed-thumb-med-@retina',
							'luxmed-thumb-tiny',
							'luxmed-thumb-tiny-@retina',
							'luxmed-thumb-masonry-big',
							'luxmed-thumb-masonry-big-@retina',
							'luxmed-thumb-masonry',
							'luxmed-thumb-masonry-@retina',
							),
							$thumb_size);
	}
}
?>