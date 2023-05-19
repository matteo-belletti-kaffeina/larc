<?php
/* ---------------------------------------------------------------- */
/* Add Flipbook to Visual Composer
/* ---------------------------------------------------------------- */
if ( function_exists( 'vc_map' ) ) {
	if ( function_exists( 'vc_lean_map' ) ) {
		vc_lean_map( 'responsive-flipbook', 'rfbwp_map_flipbook' );
		vc_lean_map( 'flipbook-popup', 'rfbwp_map_flipbook_popup' );
		vc_lean_map( 'flipbook-shelf', 'rfbwp_map_flipbook_shelf' );
	} else {
		vc_map( rfbwp_map_flipbook() );
		vc_map( rfbwp_map_flipbook_popup() );
		vc_map( rfbwp_map_flipbook_shelf() );
	}

	function rfbwp_vc_style() {
		wp_enqueue_style( 'rfbwp_vc_style', MPC_PLUGIN_ROOT . '/massive-panel/css/vc.css' );
	}

	add_action( 'admin_enqueue_scripts', 'rfbwp_vc_style' );
}

function rfbwp_map_flipbook() {
	$books = rfbwp_get_books_array();

	return array(
		'name'		=> __('Flipbook', 'rfbwp'),
		'base'		=> 'responsive-flipbook',
		'class'		=> '',
		'icon'		=> 'icon-rfbwp-flipbook',
		'category'	=> __('MPC', 'rfbwp'),
		'params'	=> array(
			array(
				'type'			=> 'dropdown',
				'heading'		=> __('Select Flip Book', 'rfbwp'),
				'param_name'	=> 'id',
				'value'			=> $books,
				'std'			=> ' ',
				'admin_label'	=> true,
				'description'	=> __('Select which FlipBook you would like to display.', 'rfbwp')
			),
		)
	);
}

function rfbwp_map_flipbook_popup() {
	$books = rfbwp_get_books_array();

	return array(
		'name'		=> __('Flipbook Popup', 'rfbwp'),
		'base'		=> 'flipbook-popup',
		'class'		=> '',
		'icon'		=> 'icon-rfbwp-flipbook-popup',
		'category'	=> __('MPC', 'rfbwp'),
		'params'	=> array(
			array(
				'type'			=> 'dropdown',
				'heading'		=> __('Select Flip Book', 'rfbwp'),
				'param_name'	=> 'id',
				'value'			=> $books,
				'std'			=> ' ',
				'admin_label'	=> true,
				'description'	=> __('Select which FlipBook you would like to display.', 'rfbwp')
			),
			array(
				'type'			=> 'textarea',
				'heading'		=> __('Popup content', 'rfbwp'),
				'param_name'	=> 'content',
				'value'			=> '',
				'admin_label'	=> true,
				'description'	=> __('Specify text to trigger popup Flipbook.', 'rfbwp')
			),
		)
	);
}

function rfbwp_map_flipbook_shelf() {
	$books = rfbwp_get_books_array();

	$books_shelf = array();

	foreach( $books as $key => $value ) {
		$books_shelf[] = array( 'value' => $value, 'label' => $key );
	}

	return array(
		'name'		=> __('Flipbook Shelf', 'rfbwp'),
		'base'		=> 'flipbook-shelf',
		'class'		=> '',
		'icon'		=> 'icon-rfbwp-flipbook-shelf',
		'category'	=> __('MPC', 'rfbwp'),
		'params'	=> array(
			array(
				'type'			=> 'autocomplete',
				'heading'		=> __( 'Select flip books', 'rfbwp' ),
				'param_name'	=> 'ids',
				'description'	=> __( 'Select which FlipBooks you would like to display.', 'rfbwp' ),
				'settings'		=> array(
					'multiple'	=> true,
					'values'	=> $books_shelf,
				),
				'admin_label'	=> true,
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> __('Select style', 'rfbwp'),
				'param_name'	=> 'style',
				'value'			=> array(
					__( 'Classic', 'rfbwp' )		=> 'classic',
					__( 'Light Wood', 'rfbwp' )		=> 'wood-light' ,
					__( 'Dark Wood', 'rfbwp' )		=> 'wood-dark',
					__( 'Custom Color', 'rfbwp' )	=> 'custom-color',
					__( 'Custom Image', 'rfbwp' )	=> 'custom-image',
				),
				'std'			=> 'classic',
				'admin_label'	=> true,
				'description'	=> __('Select which shelf style you would like to display.', 'rfbwp')
			),
			array(
				'type'			=> 'colorpicker',
				'param_name'	=> 'color',
				'heading'		=> __( 'Shelf color', 'rfbwp' ),
				'description'	=> __( 'Select shelf custom color', 'rfbwp' ),
				'std'			=> '',
				'admin_label'	=> true,
				'dependency'	=> array(
					'element'	=> 'style',
					'value'		=> array( 'custom-color' ),
				),
			),
			array(
				'type'			=> 'attach_image',
				'param_name'	=> 'image',
				'heading'		=> __( 'Shelf image', 'rfbwp' ),
				'description'	=> __( 'Select shelf custom image', 'rfbwp' ),
				'std'			=> '',
				'admin_label'	=> false,
				'dependency'	=> array(
					'element'	=> 'style',
					'value'		=> array( 'custom-image' ),
				),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> __('Select titles style', 'rfbwp'),
				'param_name'	=> 'titles',
				'value'			=> array(
					'' => '',

					__( 'Top, Light, Always on', 'rfbwp' ) => 'top-always-light',
					__( 'Top, Light, Fade in', 'rfbwp' )   => 'top-fade-light',
					__( 'Top, Light, Scale in', 'rfbwp' )  => 'top-scale-light',
					__( 'Top, Dark, Always on', 'rfbwp' )  => 'top-always-dark',
					__( 'Top, Dark, Fade in', 'rfbwp' )    => 'top-fade-dark',
					__( 'Top, Dark, Scale in', 'rfbwp' )   => 'top-scale-dark',

					__( 'Middle, Light, Always on', 'rfbwp' ) => 'middle-always-light',
					__( 'Middle, Light, Fade in', 'rfbwp' )   => 'middle-fade-light',
					__( 'Middle, Light, Scale in', 'rfbwp' )  => 'middle-scale-light',
					__( 'Middle, Dark, Always on', 'rfbwp' )  => 'middle-always-dark',
					__( 'Middle, Dark, Fade in', 'rfbwp' )    => 'middle-fade-dark',
					__( 'Middle, Dark, Scale in', 'rfbwp' )   => 'middle-scale-dark',

					__( 'Bottom, Light, Always on', 'rfbwp' ) => 'bottom-always-light',
					__( 'Bottom, Light, Fade in', 'rfbwp' )   => 'bottom-fade-light',
					__( 'Bottom, Light, Scale in', 'rfbwp' )  => 'bottom-scale-light',
					__( 'Bottom, Dark, Always on', 'rfbwp' )  => 'bottom-always-dark',
					__( 'Bottom, Dark, Fade in', 'rfbwp' )    => 'bottom-fade-dark',
					__( 'Bottom, Dark, Scale in', 'rfbwp' )   => 'bottom-scale-dark',
				),
				'std'			=> '',
				'admin_label'	=> true,
				'description'	=> __('Select which shelf titles style you would like to display.', 'rfbwp')
			),
		)
	);
}

function rfbwp_get_books_array() {
	global $mpcrf_options;

	$books = array();

	$books[ ' ' ] = ' ';
	if( isset( $mpcrf_options[ 'books' ] ) ) {
		foreach( $mpcrf_options[ 'books' ] as $book ) {
			if( $book['rfbwp_fb_name'] != '' ) {
				$books[ $book[ 'rfbwp_fb_name' ] ] = strtolower( str_replace( " ", "_", $book[ 'rfbwp_fb_name' ] ) );
			}
		}
	}

	return $books;
}