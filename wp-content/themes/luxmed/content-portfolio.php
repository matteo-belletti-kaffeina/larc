<?php
/**
 * The Portfolio template to display the content
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

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_portfolio post_layout_portfolio_'.esc_attr($luxmed_columns).' post_format_'.esc_attr($luxmed_post_format) ); ?>
	<?php echo (!luxmed_is_off($luxmed_animation) ? ' data-animation="'.esc_attr(luxmed_get_animation_classes($luxmed_animation)).'"' : ''); ?>
	>

	<?php
	$luxmed_image_hover = luxmed_get_theme_option('image_hover');
	// Featured image
	luxmed_show_post_featured(array(
		'thumb_size' => luxmed_get_thumb_size(strpos(luxmed_get_theme_option('body_style'), 'full')!==false || $luxmed_columns < 4 ? 'masonry-big' : 'masonry'),
		'show_no_image' => true,
		'class' => $luxmed_image_hover == 'dots' ? 'hover_with_info' : '',
		'post_info' => $luxmed_image_hover == 'dots' ? '<div class="post_info">'.esc_html(get_the_title()).'</div>' : ''
	));
	?>
</article>