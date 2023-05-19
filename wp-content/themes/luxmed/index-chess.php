<?php
/**
 * The template for homepage posts with "Chess" style
 *
 * @package WordPress
 * @subpackage LUXMED
 * @since LUXMED 1.0
 */

luxmed_storage_set('blog_archive', true);

get_header(); 

if (have_posts()) {

	echo get_query_var('blog_archive_start');

	$luxmed_stickies = is_home() ? get_option( 'sticky_posts' ) : false;
	$luxmed_sticky_out = is_array($luxmed_stickies) && count($luxmed_stickies) > 0 && get_query_var( 'paged' ) < 1;
	if ($luxmed_sticky_out) {
		?><div class="sticky_wrap columns_wrap"><?php	
	}
	if (!$luxmed_sticky_out) {
		?><div class="chess_wrap posts_container"><?php
	}
	while ( have_posts() ) { the_post(); 
		if ($luxmed_sticky_out && !is_sticky()) {
			$luxmed_sticky_out = false;
			?></div><div class="chess_wrap posts_container"><?php
		}
		get_template_part( 'content', $luxmed_sticky_out && is_sticky() ? 'sticky' :'chess' );
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