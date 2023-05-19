<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package WordPress
 * @subpackage LUXMED
 * @since LUXMED 1.0
 */

$luxmed_sidebar_position = luxmed_get_theme_option('sidebar_position');
if (luxmed_sidebar_present()) {
	ob_start();
	$luxmed_sidebar_name = luxmed_get_theme_option('sidebar_widgets');
	luxmed_storage_set('current_sidebar', 'sidebar');
	if ( is_active_sidebar($luxmed_sidebar_name) ) {
		dynamic_sidebar($luxmed_sidebar_name);
	}
	$luxmed_out = trim(ob_get_contents());
	ob_end_clean();
	if (!empty($luxmed_out)) {
		?>
		<div class="sidebar <?php echo esc_attr($luxmed_sidebar_position); ?> widget_area<?php if (!luxmed_is_inherit(luxmed_get_theme_option('sidebar_scheme'))) echo ' scheme_'.esc_attr(luxmed_get_theme_option('sidebar_scheme')); ?>" role="complementary">
			<div class="sidebar_inner">
				<?php
				dynamic_sidebar( 'sidebar_corsi' );
				?>
			</div><!-- /.sidebar_inner -->
		</div><!-- /.sidebar -->
		<?php
	}
}
?>