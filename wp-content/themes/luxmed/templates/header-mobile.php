<?php
/**
 * The template to show mobile menu
 *
 * @package WordPress
 * @subpackage LUXMED
 * @since LUXMED 1.0
 */
?>
<div class="menu_mobile_overlay"></div>
<div class="menu_mobile menu_mobile_<?php echo esc_attr(luxmed_get_theme_option('menu_mobile_fullscreen') > 0 ? 'fullscreen' : 'narrow'); ?> scheme_dark">
	<div class="menu_mobile_inner">
		<a class="menu_mobile_close icon-cancel"></a><?php

		// Logo
		set_query_var('luxmed_logo_args', array('type' => 'inverse'));
		get_template_part( 'templates/header-logo' );
		set_query_var('luxmed_logo_args', array());

		// Mobile menu
		$luxmed_menu_mobile = luxmed_get_nav_menu('menu_mobile');
		if (empty($luxmed_menu_mobile)) {
			$luxmed_menu_mobile = apply_filters('luxmed_filter_get_mobile_menu', '');
			if (empty($luxmed_menu_mobile)) $luxmed_menu_mobile = luxmed_get_nav_menu('menu_main');
			if (empty($luxmed_menu_mobile)) $luxmed_menu_mobile = luxmed_get_nav_menu();
		}
		if (!empty($luxmed_menu_mobile)) {
			if (!empty($luxmed_menu_mobile))
				$luxmed_menu_mobile = str_replace(
					array('menu_main', 'id="menu-', 'sc_layouts_menu_nav', 'sc_layouts_hide_on_mobile', 'hide_on_mobile'),
					array('menu_mobile', 'id="menu_mobile-', '', '', ''),
					$luxmed_menu_mobile
					);
			if (strpos($luxmed_menu_mobile, '<nav ')===false)
				$luxmed_menu_mobile = sprintf('<nav class="menu_mobile_nav_area">%s</nav>', $luxmed_menu_mobile);
			luxmed_show_layout(apply_filters('luxmed_filter_menu_mobile_layout', $luxmed_menu_mobile));
		}

		// Search field
		do_action('luxmed_action_search', 'normal', 'search_mobile', false);
		
		// Social icons
		luxmed_show_layout(luxmed_get_socials_links(), '<div class="socials_mobile">', '</div>');
		?>
	</div>
</div>
