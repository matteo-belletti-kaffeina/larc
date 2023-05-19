<?php
/* Instagram Feed support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('luxmed_instagram_feed_theme_setup9')) {
	add_action( 'after_setup_theme', 'luxmed_instagram_feed_theme_setup9', 9 );
	function luxmed_instagram_feed_theme_setup9() {
		if (is_admin()) {
			add_filter( 'luxmed_filter_tgmpa_required_plugins',		'luxmed_instagram_feed_tgmpa_required_plugins' );
		}
	}
}

// Check if Instagram Feed installed and activated
if ( !function_exists( 'luxmed_exists_instagram_feed' ) ) {
	function luxmed_exists_instagram_feed() {
		return defined('SBIVER');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'luxmed_instagram_feed_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('luxmed_filter_tgmpa_required_plugins',	'luxmed_instagram_feed_tgmpa_required_plugins');
	function luxmed_instagram_feed_tgmpa_required_plugins($list=array()) {
		if (in_array('instagram-feed', luxmed_storage_get('required_plugins')))
			$list[] = array(
					'name' 		=> esc_html__('Instagram Feed', 'luxmed'),
					'slug' 		=> 'instagram-feed',
					'required' 	=> false
				);
		return $list;
	}
}
?>