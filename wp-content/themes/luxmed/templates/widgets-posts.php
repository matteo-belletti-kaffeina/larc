<?php
/**
 * The template to display posts in widgets and/or in the search results
 *
 * @package WordPress
 * @subpackage LUXMED
 * @since LUXMED 1.0
 */

$luxmed_post_id    = get_the_ID();
$luxmed_post_date  = luxmed_get_date();
$luxmed_post_title = get_the_title();
$luxmed_post_link  = get_permalink();
$luxmed_post_author_id   = get_the_author_meta('ID');
$luxmed_post_author_name = get_the_author_meta('display_name');
$luxmed_post_author_url  = get_author_posts_url($luxmed_post_author_id, '');

$luxmed_args = get_query_var('luxmed_args_widgets_posts');
$luxmed_show_date = isset($luxmed_args['show_date']) ? (int) $luxmed_args['show_date'] : 1;
$luxmed_show_image = isset($luxmed_args['show_image']) ? (int) $luxmed_args['show_image'] : 1;
$luxmed_show_author = isset($luxmed_args['show_author']) ? (int) $luxmed_args['show_author'] : 1;
$luxmed_show_counters = isset($luxmed_args['show_counters']) ? (int) $luxmed_args['show_counters'] : 1;
$luxmed_show_categories = isset($luxmed_args['show_categories']) ? (int) $luxmed_args['show_categories'] : 1;

$luxmed_output = luxmed_storage_get('luxmed_output_widgets_posts');

$luxmed_post_counters_output = '';
if ( $luxmed_show_counters ) {
	$luxmed_post_counters_output = '<span class="post_info_item post_info_counters">'
								. luxmed_get_post_counters('')
							. '</span>';
}


$luxmed_output .= '<article class="post_item with_thumb">ciaooo';

if ($luxmed_show_image) {
	$luxmed_post_thumb = get_the_post_thumbnail($luxmed_post_id, luxmed_get_thumb_size('tiny'), array(
		'alt' => get_the_title()
	));
	if ($luxmed_post_thumb) $luxmed_output .= '<div class="post_thumb">' . ($luxmed_post_link ? '<a href="' . esc_url($luxmed_post_link) . '">' : '') . ($luxmed_post_thumb) . ($luxmed_post_link ? '</a>' : '') . '</div>';
}

$luxmed_output .= '<div class="post_content">'
			. ($luxmed_show_categories 
					? '<div class="post_categories">'
						. luxmed_get_post_categories()
						. $luxmed_post_counters_output
						. '</div>' 
					: '')
			. '<h6 class="post_title">' . ($luxmed_post_link ? '<a href="' . esc_url($luxmed_post_link) . '">' : '') . ($luxmed_post_title) . ($luxmed_post_link ? '</a>' : '') . '</h6>'
			. apply_filters('luxmed_filter_get_post_info', 
								'<div class="post_info">'
									. ($luxmed_show_date 
										? '<span class="post_info_item post_info_posted">'
											. ($luxmed_post_link ? '<a href="' . esc_url($luxmed_post_link) . '" class="post_info_date">' : '') 
											. esc_html($luxmed_post_date) 
											. ($luxmed_post_link ? '</a>' : '')
											. '</span>'
										: '')
									. ($luxmed_show_author 
										? '<span class="post_info_item post_info_posted_by">' 
											. esc_html__('by', 'luxmed') . ' ' 
											. ($luxmed_post_link ? '<a href="' . esc_url($luxmed_post_author_url) . '" class="post_info_author">' : '') 
											. esc_html($luxmed_post_author_name) 
											. ($luxmed_post_link ? '</a>' : '') 
											. '</span>'
										: '')
									. (!$luxmed_show_categories && $luxmed_post_counters_output
										? $luxmed_post_counters_output
										: '')
								. '</div>')
		. '</div>'
	. '</article>';
luxmed_storage_set('luxmed_output_widgets_posts', $luxmed_output);
?>