<?php

/*-----------------------------------------------------------------------------------*/
/*	Flip Book Shortcode
/*-----------------------------------------------------------------------------------*/

global $mpcrf_options;

$books = array();

if( isset( $mpcrf_options[ 'books' ] ) )
	foreach($mpcrf_options['books'] as $book) {
		if($book['rfbwp_fb_name'] != '')
			$books[strtolower(str_replace(" ", "_", $book['rfbwp_fb_name']))] = $book['rfbwp_fb_name'];
	}

$mpc_shortcodes['fb'] = array(
	'preview'   => 'false',
	'shortcode' => '[responsive-flipbook id="{{id}}"]',
	'title'     => __( 'Insert Flip Book', 'rfbwp' ),
	'fields'    => array(
		'id' => array(
			'type'    => 'select',
			'title'   => __( 'Select Flip Book', 'rfbwp' ),
			'desc'    => __( 'Select which FlipBook you would like to display', 'rfbwp' ),
			'options' => $books,
		),
	),
);
$mpc_shortcodes['fbs'] = array(
	'preview'   => 'false',
	'shortcode' => '[flipbook-shelf ids="{{ids}}" style="{{style}}"{{color}}{{image}} titles="{{titles}}"]',
	'title'     => __( 'Insert Flip Book Shelf', 'rfbwp' ),
	'fields'    => array(
		'ids'   => array(
			'type'    => 'multiselect',
			'title'   => __( 'Select flip books', 'rfbwp' ),
			'desc'    => __( 'Select which FlipBooks you would like to display', 'rfbwp' ),
			'options' => $books,
		),
		'style' => array(
			'type'    => 'select',
			'title'   => __( 'Select style', 'rfbwp' ),
			'desc'    => __( 'Select which shelf style you would like to display', 'rfbwp' ),
			'options' => array(
				'classic'      => __( 'Classic', 'rfbwp' ),
				'wood-light'   => __( 'Light Wood', 'rfbwp' ),
				'wood-dark'    => __( 'Dark Wood', 'rfbwp' ),
				'custom-color' => __( 'Custom Color', 'rfbwp' ),
				'custom-image' => __( 'Custom Image', 'rfbwp' ),
			),
		),
		'color' => array(
			'type'  => 'color',
			'title' => __( 'Shelf color', 'rfbwp' ),
			'desc'  => __( 'Select shelf custom color', 'rfbwp' ),
			'std'   => '#e0e0e0',
		),
		'image' => array(
			'type'  => 'image',
			'title' => __( 'Shelf image', 'rfbwp' ),
			'desc'  => __( 'Select shelf custom image', 'rfbwp' ),
			'std'   => '',
		),
		'titles' => array(
			'type'    => 'select',
			'title'   => __( 'Select titles style', 'rfbwp' ),
			'desc'    => __( 'Select which shelf titles style you would like to display', 'rfbwp' ),
			'options' => array(
				'' => '',

				'top-always-light' => __( 'Top, Light, Always on', 'rfbwp' ),
				'top-fade-light'   => __( 'Top, Light, Fade in', 'rfbwp' ),
				'top-scale-light'  => __( 'Top, Light, Scale in', 'rfbwp' ),
				'top-always-dark'  => __( 'Top, Dark, Always on', 'rfbwp' ),
				'top-fade-dark'    => __( 'Top, Dark, Fade in', 'rfbwp' ),
				'top-scale-dark'   => __( 'Top, Dark, Scale in', 'rfbwp' ),

				'middle-always-light' => __( 'Middle, Light, Always on', 'rfbwp' ),
				'middle-fade-light'   => __( 'Middle, Light, Fade in', 'rfbwp' ),
				'middle-scale-light'  => __( 'Middle, Light, Scale in', 'rfbwp' ),
				'middle-always-dark'  => __( 'Middle, Dark, Always on', 'rfbwp' ),
				'middle-fade-dark'    => __( 'Middle, Dark, Fade in', 'rfbwp' ),
				'middle-scale-dark'   => __( 'Middle, Dark, Scale in', 'rfbwp' ),

				'bottom-always-light' => __( 'Bottom, Light, Always on', 'rfbwp' ),
				'bottom-fade-light'   => __( 'Bottom, Light, Fade in', 'rfbwp' ),
				'bottom-scale-light'  => __( 'Bottom, Light, Scale in', 'rfbwp' ),
				'bottom-always-dark'  => __( 'Bottom, Dark, Always on', 'rfbwp' ),
				'bottom-fade-dark'    => __( 'Bottom, Dark, Fade in', 'rfbwp' ),
				'bottom-scale-dark'   => __( 'Bottom, Dark, Scale in', 'rfbwp' ),
			),
		),
	),
);
$mpc_shortcodes['fbp'] = array(
	'preview'   => 'false',
	'shortcode' => '[flipbook-popup id="{{id}}"{{class}}]Specify content here.[/flipbook-popup]',
	'title'     => __( 'Insert Flip Book Popup', 'rfbwp' ),
	'fields'    => array(
		'id' => array(
			'type'    => 'select',
			'title'   => __( 'Select flip book', 'rfbwp' ),
			'desc'    => __( 'Select which FlipBook you would like to display', 'rfbwp' ),
			'options' => $books,
		),
		'class' => array(
			'type'  => 'text',
			'title' => __( 'Specify custom class', 'rfbwp' ),
			'desc'  => __( 'Specify your custom CSS class for FlipBook popup', 'rfbwp' ),
			'std'   => '',
		),
	),
);

/*--------------------------- END Flip Book -------------------------------- */

?>