<?php
/* Booked Appointments support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('luxmed_booked_theme_setup9')) {
	add_action( 'after_setup_theme', 'luxmed_booked_theme_setup9', 9 );
	function luxmed_booked_theme_setup9() {
		if (luxmed_exists_booked()) {
			add_action( 'wp_enqueue_scripts', 							'luxmed_booked_frontend_scripts', 1100 );
			add_filter( 'luxmed_filter_merge_styles',					'luxmed_booked_merge_styles' );
		}
		if (is_admin()) {
			add_filter( 'luxmed_filter_tgmpa_required_plugins',		'luxmed_booked_tgmpa_required_plugins' );
		}
	}
}

// Check if plugin installed and activated
if ( !function_exists( 'luxmed_exists_booked' ) ) {
	function luxmed_exists_booked() {
		return class_exists('booked_plugin');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'luxmed_booked_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('luxmed_filter_tgmpa_required_plugins',	'luxmed_booked_tgmpa_required_plugins');
	function luxmed_booked_tgmpa_required_plugins($list=array()) {
		if (in_array('booked', luxmed_storage_get('required_plugins'))) {
			$path = luxmed_get_file_dir('plugins/booked/booked.zip');
			$list[] = array(
					'name' 		=> esc_html__('Booked Appointments', 'luxmed'),
					'slug' 		=> 'booked',
					'source' 	=> !empty($path) ? $path : 'upload://booked.zip',
					'required' 	=> false
			);
		}
		return $list;
	}
}
	
// Enqueue plugin's custom styles
if ( !function_exists( 'luxmed_booked_frontend_scripts' ) ) {
	//Handler of the add_action( 'wp_enqueue_scripts', 'luxmed_booked_frontend_scripts', 1100 );
	function luxmed_booked_frontend_scripts() {
		if (luxmed_is_on(luxmed_get_theme_option('debug_mode')) && luxmed_get_file_dir('plugins/booked/booked.css')!='')
			wp_enqueue_style( 'luxmed-booked',  luxmed_get_file_url('plugins/booked/booked.css'), array(), null );
	}
}
	
// Merge custom styles
if ( !function_exists( 'luxmed_booked_merge_styles' ) ) {
	//Handler of the add_filter('luxmed_filter_merge_styles', 'luxmed_booked_merge_styles');
	function luxmed_booked_merge_styles($list) {
		$list[] = 'plugins/booked/booked.css';
		return $list;
	}
}


// Add plugin-specific colors and fonts to the custom CSS
if (luxmed_exists_booked()) { require_once LUXMED_THEME_DIR . 'plugins/booked/booked.styles.php'; }
?>