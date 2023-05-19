<?php
/**
 * The template to display the site logo in the footer
 *
 * @package WordPress
 * @subpackage LUXMED
 * @since LUXMED 1.0.10
 */

// Logo
if (luxmed_is_on(luxmed_get_theme_option('logo_in_footer'))) {
	$luxmed_logo_image = '';
	if (luxmed_get_retina_multiplier(2) > 1)
		$luxmed_logo_image = luxmed_get_theme_option( 'logo_footer_retina' );
	if (empty($luxmed_logo_image)) 
		$luxmed_logo_image = luxmed_get_theme_option( 'logo_footer' );
	$luxmed_logo_text   = get_bloginfo( 'name' );
	if (!empty($luxmed_logo_image) || !empty($luxmed_logo_text)) {
		?>
		<div class="footer_logo_wrap">
			<div class="footer_logo_inner">
				<?php
				if (!empty($luxmed_logo_image)) {
					$luxmed_attr = luxmed_getimagesize($luxmed_logo_image);
					echo '<a href="'.esc_url(home_url('/')).'"><img src="'.esc_url($luxmed_logo_image).'" class="logo_footer_image" alt=""'.(!empty($luxmed_attr[3]) ? sprintf(' %s', $luxmed_attr[3]) : '').'></a>' ;
				} else if (!empty($luxmed_logo_text)) {
					echo '<h1 class="logo_footer_text"><a href="'.esc_url(home_url('/')).'">' . esc_html($luxmed_logo_text) . '</a></h1>';
				}
				?>
			</div>
		</div>
		<?php
	}
}
?>