<?php
/**
 * The template to display the copyright info in the footer
 *
 * @package WordPress
 * @subpackage LUXMED
 * @since LUXMED 1.0.10
 */

// Copyright area
$luxmed_footer_scheme =  luxmed_is_inherit(luxmed_get_theme_option('footer_scheme')) ? luxmed_get_theme_option('color_scheme') : luxmed_get_theme_option('footer_scheme');
$luxmed_copyright_scheme = luxmed_is_inherit(luxmed_get_theme_option('copyright_scheme')) ? $luxmed_footer_scheme : luxmed_get_theme_option('copyright_scheme');
?> 
<div class="footer_copyright_wrap scheme_<?php echo esc_attr($luxmed_copyright_scheme); ?>">
	<div class="footer_copyright_inner">
		<div class="content_wrap">
			<div class="copyright_text"><?php
				// Replace {{...}} and [[...]] on the <i>...</i> and <b>...</b>
				$luxmed_copyright = luxmed_prepare_macros(luxmed_get_theme_option('copyright'));
				if (!empty($luxmed_copyright)) {
					// Replace {date_format} on the current date in the specified format
					if (preg_match("/(\\{[\\w\\d\\\\\\-\\:]*\\})/", $luxmed_copyright, $luxmed_matches)) {
						$luxmed_copyright = str_replace($luxmed_matches[1], date(str_replace(array('{', '}'), '', $luxmed_matches[1])), $luxmed_copyright);
					}
					// Display copyright
					echo wp_kses_data(nl2br($luxmed_copyright));
				}
			?></div>
		</div>
	</div>
</div>
