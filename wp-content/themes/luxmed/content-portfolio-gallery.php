<?php
/**
 * The Gallery template to display posts
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage LUXMED
 * @since LUXMED 1.0
 */

$luxmed_blog_style = explode('_', luxmed_get_theme_option('blog_style'));
$luxmed_columns = empty($luxmed_blog_style[1]) ? 2 : max(2, $luxmed_blog_style[1]);
$luxmed_post_format = get_post_format();
$luxmed_post_format = empty($luxmed_post_format) ? 'standard' : str_replace('post-format-', '', $luxmed_post_format);
$luxmed_animation = luxmed_get_theme_option('blog_animation');
$luxmed_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_portfolio post_layout_gallery post_layout_gallery_'.esc_attr($luxmed_columns).' post_format_'.esc_attr($luxmed_post_format) ); ?>
	<?php echo (!luxmed_is_off($luxmed_animation) ? ' data-animation="'.esc_attr(luxmed_get_animation_classes($luxmed_animation)).'"' : ''); ?>
	data-size="<?php if (!empty($luxmed_image[1]) && !empty($luxmed_image[2])) echo intval($luxmed_image[1]) .'x' . intval($luxmed_image[2]); ?>"
	data-src="<?php if (!empty($luxmed_image[0])) echo esc_url($luxmed_image[0]); ?>"
	>

	<?php
	$luxmed_image_hover = 'icon';	//luxmed_get_theme_option('image_hover');
	if (in_array($luxmed_image_hover, array('icons', 'zoom'))) $luxmed_image_hover = 'dots';
	// Featured image
	luxmed_show_post_featured(array(
		'hover' => $luxmed_image_hover,
		'thumb_size' => luxmed_get_thumb_size( strpos(luxmed_get_theme_option('body_style'), 'full')!==false || $luxmed_columns < 3 ? 'masonry-big' : 'masonry' ),
		'thumb_only' => true,
		'show_no_image' => true,
		'post_info' => '<div class="post_details">'
							. '<h2 class="post_title"><a href="'.esc_url(get_permalink()).'">'. esc_html(get_the_title()) . '</a></h2>'
							. '<div class="post_description">'
								. luxmed_show_post_meta(array(
									'categories' => true,
									'date' => true,
									'edit' => false,
									'seo' => false,
									'share' => true,
									'counters' => 'comments',
									'echo' => false
									))
								. '<div class="post_description_content">'
									. apply_filters('the_excerpt', get_the_excerpt())
								. '</div>'
								. '<a href="'.esc_url(get_permalink()).'" class="theme_button post_readmore"><span class="post_readmore_label">' . esc_html__('Learn more', 'luxmed') . '</span></a>'
							. '</div>'
						. '</div>'
	));
	?>
</article>