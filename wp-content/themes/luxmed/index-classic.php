<?php
/**
 * The template for homepage posts with "Classic" style
 *
 * @package WordPress
 * @subpackage LUXMED
 * @since LUXMED 1.0
 */

luxmed_storage_set('blog_archive', true);

// Load scripts for 'Masonry' layout
if (substr(luxmed_get_theme_option('blog_style'), 0, 7) == 'masonry') {
	wp_enqueue_script( 'classie', luxmed_get_file_url('js/theme.gallery/classie.min.js'), array(), null, true );
	wp_enqueue_script( 'imagesloaded', luxmed_get_file_url('js/theme.gallery/imagesloaded.min.js'), array(), null, true );
	wp_enqueue_script( 'masonry', luxmed_get_file_url('js/theme.gallery/masonry.min.js'), array(), null, true );
	wp_enqueue_script( 'luxmed-gallery-script', luxmed_get_file_url('js/theme.gallery/theme.gallery.js'), array(), null, true );
}

get_header(); 

if (have_posts()) {

	echo get_query_var('blog_archive_start');

	$luxmed_classes = 'posts_container '
						. (substr(luxmed_get_theme_option('blog_style'), 0, 7) == 'classic' ? 'columns_wrap' : 'masonry_wrap');
	$luxmed_stickies = is_home() ? get_option( 'sticky_posts' ) : false;
	$luxmed_sticky_out = is_array($luxmed_stickies) && count($luxmed_stickies) > 0 && get_query_var( 'paged' ) < 1;
	if ($luxmed_sticky_out) {
		?><div class="sticky_wrap columns_wrap"><?php	
	}
	if (!$luxmed_sticky_out) {
		if (luxmed_get_theme_option('first_post_large') && !is_paged() && !in_array(luxmed_get_theme_option('body_style'), array('fullwide', 'fullscreen'))) {
			the_post();
			get_template_part( 'content', 'excerpt' );
		}
		
		?><div class="<?php echo esc_attr($luxmed_classes); ?>"><?php
	}
	while ( have_posts() ) { the_post(); 
		if ($luxmed_sticky_out && !is_sticky()) {
			$luxmed_sticky_out = false;
			?></div><div class="<?php echo esc_attr($luxmed_classes); ?>"><?php
		}
		get_template_part( 'content', $luxmed_sticky_out && is_sticky() ? 'sticky' : 'classic' );
	}
	
	?></div><?php

	luxmed_show_pagination();

	echo get_query_var('blog_archive_end');

} else {

	if ( is_search() )
		get_template_part( 'content', 'none-search' );
	else
		get_template_part( 'content', 'none-archive' );

}

get_footer();
?>