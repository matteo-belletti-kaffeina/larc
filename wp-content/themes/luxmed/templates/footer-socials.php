<?php
/**
 * The template to display the socials in the footer
 *
 * @package WordPress
 * @subpackage LUXMED
 * @since LUXMED 1.0.10
 */


// Socials
if ( luxmed_is_on(luxmed_get_theme_option('socials_in_footer')) && ($luxmed_output = luxmed_get_socials_links()) != '') {
	?>
	<div class="footer_socials_wrap socials_wrap">
		<div class="footer_socials_inner">
			<?php luxmed_show_layout($luxmed_output); ?>
		</div>
	</div>
	<?php
}
?>