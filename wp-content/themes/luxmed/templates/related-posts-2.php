<?php
/**
 * The template 'Style 2' to displaying related posts
 *
 * @package WordPress
 * @subpackage LUXMED
 * @since LUXMED 1.0
 */

$luxmed_link = get_permalink();
$luxmed_post_format = get_post_format();
$luxmed_post_format = empty($luxmed_post_format) ? 'standard' : str_replace('post-format-', '', $luxmed_post_format);
?><div id="post-<?php the_ID(); ?>" 
	<?php post_class( 'related_item related_item_style_2 post_format_'.esc_attr($luxmed_post_format) ); ?>><?php
	luxmed_show_post_featured(array(
		'thumb_size' => luxmed_get_thumb_size( 'big' ),
		'show_no_image' => true,
		'singular' => false
		)
	);
	?><div class="post_header entry-header"><?php
		if ( in_array(get_post_type(), array( 'post', 'attachment' ) ) ) {
			luxmed_show_post_meta(array(
					'categories' => true,
					'date' => true,
					'author' => true,
					'edit' => false,
					'seo' => false,
					'share' => false,
					'counters' => '',
				)
			);
		}
		?>
		<h4 class="post_title entry-title"><a href="<?php echo esc_url($luxmed_link); ?>"><?php echo the_title(); ?></a></h4>
	</div>
</div>