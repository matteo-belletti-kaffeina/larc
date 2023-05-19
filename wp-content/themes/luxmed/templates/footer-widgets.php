<?php
/**
 * The template to display the widgets area in the footer
 *
 * @package WordPress
 * @subpackage LUXMED
 * @since LUXMED 1.0.10
 */

// Footer sidebar
$luxmed_footer_name = luxmed_get_theme_option('footer_widgets');
$luxmed_footer_present = !luxmed_is_off($luxmed_footer_name) && is_active_sidebar($luxmed_footer_name);
if ($luxmed_footer_present) { 
	luxmed_storage_set('current_sidebar', 'footer');
	$luxmed_footer_wide = luxmed_get_theme_option('footer_wide');
	ob_start();
	if ( is_active_sidebar($luxmed_footer_name) ) {
		dynamic_sidebar($luxmed_footer_name);
	}
	$luxmed_out = trim(ob_get_contents());
	ob_end_clean();
	if (!empty($luxmed_out)) {
		$luxmed_out = preg_replace("/<\\/aside>[\r\n\s]*<aside/", "</aside><aside", $luxmed_out);
		$luxmed_need_columns = true;	//or check: strpos($luxmed_out, 'columns_wrap')===false;
		if ($luxmed_need_columns) {
			$luxmed_columns = max(0, (int) luxmed_get_theme_option('footer_columns'));
			if ($luxmed_columns == 0) $luxmed_columns = min(6, max(1, substr_count($luxmed_out, '<aside ')));
			if ($luxmed_columns > 1)
				$luxmed_out = preg_replace("/class=\"widget /", "class=\"column-1_".esc_attr($luxmed_columns).' widget ', $luxmed_out);
			else
				$luxmed_need_columns = false;
		}
		?>
		<div class="footer_widgets_wrap widget_area<?php echo !empty($luxmed_footer_wide) ? ' footer_fullwidth' : ''; ?>">
			<div class="footer_widgets_inner widget_area_inner">
				<?php 
				if (!$luxmed_footer_wide) { 
					?><div class="content_wrap"><?php
				}
				if ($luxmed_need_columns) {
					?><div class="columns_wrap"><?php
				}
				do_action( 'luxmed_action_before_sidebar' );
				luxmed_show_layout($luxmed_out);
				do_action( 'luxmed_action_after_sidebar' );
				if ($luxmed_need_columns) {
					?></div><!-- /.columns_wrap --><?php
				}
				if (!$luxmed_footer_wide) {
					?></div><!-- /.content_wrap --><?php
				}
				?>
			</div><!-- /.footer_widgets_inner -->
		</div><!-- /.footer_widgets_wrap -->
		<?php
	}
}
?>