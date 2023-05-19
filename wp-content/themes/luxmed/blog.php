<?php
/**
 * The template to display blog archive
 *
 * @package WordPress
 * @subpackage LUXMED
 * @since LUXMED 1.0
 */

/*
Template Name: Blog archive
*/

/**
 * Make page with this template and put it into menu
 * to display posts as blog archive
 * You can setup output parameters (blog style, posts per page, parent category, etc.)
 * in the Theme Options section (under the page content)
 * You can build this page in the Visual Composer to make custom page layout:
 * just insert %%CONTENT%% in the desired place of content
 */

// Get template page's content
$luxmed_content = '';
$luxmed_blog_archive_mask = '%%CONTENT%%';
$luxmed_blog_archive_subst = sprintf('<div class="blog_archive">%s</div>', $luxmed_blog_archive_mask);
if ( have_posts() ) {
	the_post(); 
	if (($luxmed_content = apply_filters('the_content', get_the_content())) != '') {
		if (($luxmed_pos = strpos($luxmed_content, $luxmed_blog_archive_mask)) !== false) {
			$luxmed_content = preg_replace('/(\<p\>\s*)?'.$luxmed_blog_archive_mask.'(\s*\<\/p\>)/i', $luxmed_blog_archive_subst, $luxmed_content);
		} else
			$luxmed_content .= $luxmed_blog_archive_subst;
		$luxmed_content = explode($luxmed_blog_archive_mask, $luxmed_content);
		// Add VC custom styles to the inline CSS
		$vc_custom_css = get_post_meta( get_the_ID(), '_wpb_shortcodes_custom_css', true );
		if ( !empty( $vc_custom_css ) ) luxmed_add_inline_css(strip_tags($vc_custom_css));
	}
}

// Prepare args for a new query
$luxmed_args = array(
	'post_status' => current_user_can('read_private_pages') && current_user_can('read_private_posts') ? array('publish', 'private') : 'publish'
);
$luxmed_args = luxmed_query_add_posts_and_cats($luxmed_args, '', luxmed_get_theme_option('post_type'), luxmed_get_theme_option('parent_cat'));
$luxmed_page_number = get_query_var('paged') ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);
if ($luxmed_page_number > 1) {
	$luxmed_args['paged'] = $luxmed_page_number;
	$luxmed_args['ignore_sticky_posts'] = true;
}
$luxmed_ppp = luxmed_get_theme_option('posts_per_page');
if ((int) $luxmed_ppp != 0)
	$luxmed_args['posts_per_page'] = (int) $luxmed_ppp;
// Make a new query
query_posts( $luxmed_args );
// Set a new query as main WP Query
$GLOBALS['wp_the_query'] = $GLOBALS['wp_query'];

// Set query vars in the new query!
if (is_array($luxmed_content) && count($luxmed_content) == 2) {
	set_query_var('blog_archive_start', $luxmed_content[0]);
	set_query_var('blog_archive_end', $luxmed_content[1]);
}

get_template_part('index');
?>