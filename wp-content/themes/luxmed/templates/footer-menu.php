<?php
/**
 * The template to display menu in the footer
 *
 * @package WordPress
 * @subpackage LUXMED
 * @since LUXMED 1.0.10
 */

// Footer menu
$luxmed_menu_footer = luxmed_get_nav_menu('menu_footer');
if (!empty($luxmed_menu_footer)) {
	?>
	<div class="footer_menu_wrap">
		<div class="footer_menu_inner">
			<?php luxmed_show_layout($luxmed_menu_footer); ?>
		</div>
	</div>
	<?php
}
?>