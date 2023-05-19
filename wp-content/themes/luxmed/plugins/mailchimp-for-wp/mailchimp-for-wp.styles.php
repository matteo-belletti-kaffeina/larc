<?php
// Add plugin-specific colors and fonts to the custom CSS
if (!function_exists('luxmed_mailchimp_get_css')) {
	add_filter('luxmed_filter_get_css', 'luxmed_mailchimp_get_css', 10, 4);
	function luxmed_mailchimp_get_css($css, $colors, $fonts, $scheme='') {
		
		if (isset($css['fonts']) && $fonts) {
			$css['fonts'] .= <<<CSS

CSS;
		
			
			$rad = luxmed_get_border_radius();
			$css['fonts'] .= <<<CSS

CSS;
		}

		
		if (isset($css['colors']) && $colors) {
			$css['colors'] .= <<<CSS

.mc4wp-form input[type="email"] {
	background-color: {$colors['input_bg_color']};
	border-color: {$colors['input_bd_color']};
	color: {$colors['input_text']};
}

CSS;
		}

		return $css;
	}
}
?>