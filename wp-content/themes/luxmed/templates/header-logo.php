<?php
/**
 * The template to display the logo or the site name and the slogan in the Header
 *
 * @package WordPress
 * @subpackage LUXMED
 * @since LUXMED 1.0
 */

$luxmed_args = get_query_var('luxmed_logo_args');

// Site logo
$luxmed_logo_image  = luxmed_get_logo_image(isset($luxmed_args['type']) ? $luxmed_args['type'] : '');
$luxmed_logo_text   = luxmed_is_on(luxmed_get_theme_option('logo_text')) ? get_bloginfo( 'name' ) : '';
$luxmed_logo_slogan = get_bloginfo( 'description', 'display' );
if (!empty($luxmed_logo_image) || !empty($luxmed_logo_text)) {
	?><a class="sc_layouts_logo" href="<?php echo is_front_page() ? '#' : esc_url(home_url('/')); ?>"><?php
		if (!empty($luxmed_logo_image)) {
			$luxmed_attr = luxmed_getimagesize($luxmed_logo_image);
			echo '<img src="'.esc_url($luxmed_logo_image).'" alt=""'.(!empty($luxmed_attr[3]) ? sprintf(' %s', $luxmed_attr[3]) : '').'>' ;
		} else {
			luxmed_show_layout(luxmed_prepare_macros($luxmed_logo_text), '<span class="logo_text">', '</span>');
			luxmed_show_layout(luxmed_prepare_macros($luxmed_logo_slogan), '<span class="logo_slogan">', '</span>');
		}
	?></a><?php
}
?>