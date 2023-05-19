<?php
/**
 * The template to display default site footer
 *
 * @package WordPress
 * @subpackage LUXMED
 * @since LUXMED 1.0.10
 */

$luxmed_footer_scheme =  luxmed_is_inherit(luxmed_get_theme_option('footer_scheme')) ? luxmed_get_theme_option('color_scheme') : luxmed_get_theme_option('footer_scheme');
$luxmed_footer_id = str_replace('footer-custom-', '', luxmed_get_theme_option("footer_style"));
?>
<footer class="footer_wrap footer_custom footer_custom_<?php echo esc_attr($luxmed_footer_id); 
						?> footer_custom_<?php echo esc_attr(sanitize_title(get_the_title($luxmed_footer_id))); 
						?> scheme_<?php echo esc_attr($luxmed_footer_scheme); 
						?>">
	<?php
    // Custom footer's layout
    do_action('luxmed_action_show_layout', $luxmed_footer_id);
	?>
</footer><!-- /.footer_wrap -->
