<?php
/**
 * The template to display single post
 *
 * @package WordPress
 * @subpackage LUXMED
 * @since LUXMED 1.0
 */

get_header();
while ( have_posts() ) { the_post();

	get_template_part( 'content', get_post_format() );

	// Related posts.
	/*luxmed_show_related_posts(array('orderby' => 'rand',
									'posts_per_page' => max(2, min(4, luxmed_get_theme_option('related_posts')))
									),
								luxmed_get_theme_option('related_style')
								);
*/
}

get_footer('corsi');
?>