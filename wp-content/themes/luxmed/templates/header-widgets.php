<?php
/**
 * The template to display the widgets area in the header
 *
 * @package WordPress
 * @subpackage LUXMED
 * @since LUXMED 1.0
 */

// Header sidebar
$luxmed_header_name = luxmed_get_theme_option('header_widgets');
$luxmed_header_present = !luxmed_is_off($luxmed_header_name) && is_active_sidebar($luxmed_header_name);
if ($luxmed_header_present) { 
	luxmed_storage_set('current_sidebar', 'header');
	$luxmed_header_wide = luxmed_get_theme_option('header_wide');
	ob_start();
	if ( is_active_sidebar($luxmed_header_name) ) {
		dynamic_sidebar($luxmed_header_name);
	}
	$luxmed_widgets_output = ob_get_contents();
	ob_end_clean();
	if (!empty($luxmed_widgets_output)) {
		$luxmed_widgets_output = preg_replace("/<\/aside>[\r\n\s]*<aside/", "</aside><aside", $luxmed_widgets_output);
		$luxmed_need_columns = strpos($luxmed_widgets_output, 'columns_wrap')===false;
		if ($luxmed_need_columns) {
			$luxmed_columns = max(0, (int) luxmed_get_theme_option('header_columns'));
			if ($luxmed_columns == 0) $luxmed_columns = min(6, max(1, substr_count($luxmed_widgets_output, '<aside ')));
			if ($luxmed_columns > 1)
				$luxmed_widgets_output = preg_replace("/class=\"widget /", "class=\"column-1_".esc_attr($luxmed_columns).' widget ', $luxmed_widgets_output);
			else
				$luxmed_need_columns = false;
		}
		?>
		<div class="header_widgets_wrap widget_area<?php echo !empty($luxmed_header_wide) ? ' header_fullwidth' : ' header_boxed'; ?>">
			<div class="header_widgets_inner widget_area_inner">
				<?php 
				if (!$luxmed_header_wide) { 
					?><div class="content_wrap"><?php
				}
				if ($luxmed_need_columns) {
					?><div class="columns_wrap"><?php
				}
				do_action( 'luxmed_action_before_sidebar' );
				luxmed_show_layout($luxmed_widgets_output);
				do_action( 'luxmed_action_after_sidebar' );
				if ($luxmed_need_columns) {
					?></div>	<!-- /.columns_wrap --><?php
				}
				if (!$luxmed_header_wide) {
					?></div>	<!-- /.content_wrap --><?php
				}
				?>
			</div>	<!-- /.header_widgets_inner -->
		</div>	<!-- /.header_widgets_wrap -->
		<?php
	}
}
?>