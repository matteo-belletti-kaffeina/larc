<?php
/**
 * The template to display default site header
 *
 * @package WordPress
 * @subpackage LUXMED
 * @since LUXMED 1.0
 */

$luxmed_header_css = $luxmed_header_image = '';
$luxmed_header_video = luxmed_get_header_video();
if (true || empty($luxmed_header_video)) {
	$luxmed_header_image = get_header_image();
	if (luxmed_is_on(luxmed_get_theme_option('header_image_override')) && apply_filters('luxmed_filter_allow_override_header_image', true)) {
		if (is_category()) {
			if (($luxmed_cat_img = luxmed_get_category_image()) != '')
				$luxmed_header_image = $luxmed_cat_img;
		} else if (is_singular() || luxmed_storage_isset('blog_archive')) {
			if (has_post_thumbnail()) {
				$luxmed_header_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
				if (is_array($luxmed_header_image)) $luxmed_header_image = $luxmed_header_image[0];
			} else
				$luxmed_header_image = '';
		}
	}
}

?><header class="top_panel top_panel_default<?php
					echo !empty($luxmed_header_image) || !empty($luxmed_header_video) ? ' with_bg_image' : ' without_bg_image';
					if ($luxmed_header_video!='') echo ' with_bg_video';
					if ($luxmed_header_image!='') echo ' '.esc_attr(luxmed_add_inline_css_class('background-image: url('.esc_url($luxmed_header_image).');'));
					if (is_single() && has_post_thumbnail()) echo ' with_featured_image';
					if (luxmed_is_on(luxmed_get_theme_option('header_fullheight'))) echo ' header_fullheight trx-stretch-height';
					?> scheme_<?php echo esc_attr(luxmed_is_inherit(luxmed_get_theme_option('header_scheme')) 
													? luxmed_get_theme_option('color_scheme') 
													: luxmed_get_theme_option('header_scheme'));
					?>"><?php

	// Background video
	if (!empty($luxmed_header_video)) {
		get_template_part( 'templates/header-video' );
	}
	
	// Main menu
	if (luxmed_get_theme_option("menu_style") == 'top') {
		get_template_part( 'templates/header-navi' );
	}

	// Page title and breadcrumbs area
	get_template_part( 'templates/header-title');

	// Header widgets area
	get_template_part( 'templates/header-widgets' );

	// Header for single posts
	get_template_part( 'templates/header-single' );

?></header>