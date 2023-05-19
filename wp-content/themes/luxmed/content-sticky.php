<?php
/**
 * The Sticky template to display the sticky posts
 *
 * Used for index/archive
 *
 * @package WordPress
 * @subpackage LUXMED
 * @since LUXMED 1.0
 */

$luxmed_columns = max(1, min(3, count(get_option( 'sticky_posts' ))));
$luxmed_post_format = get_post_format();
$luxmed_post_format = empty($luxmed_post_format) ? 'standard' : str_replace('post-format-', '', $luxmed_post_format);
$luxmed_animation = luxmed_get_theme_option('blog_animation');

?><div class="column-1_<?php echo esc_attr($luxmed_columns); ?>"><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_sticky post_format_'.esc_attr($luxmed_post_format) ); ?>
	<?php echo (!luxmed_is_off($luxmed_animation) ? ' data-animation="'.esc_attr(luxmed_get_animation_classes($luxmed_animation)).'"' : ''); ?>
	>

	<?php
	if ( is_sticky() && is_home() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	if ( !in_array($luxmed_post_format, array('link', 'aside', 'status', 'quote')) ) {
		?>
		<div class="post_header entry-header">
			<?php

			// Post meta
			luxmed_show_post_meta(array(
					'categories' => true,
					'date' => true,
					'author' => false,
					'edit' => false,
					'seo' => false,
					'share' => false,
					'counters' => ''	//comments,likes,views - comma separated in any combination
				)
			);

			// Post title
			the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );

			// Post meta
			luxmed_show_post_meta(array(
					'categories' => false,
					'date' => false,
					'author' => true,
					'edit' => false,
					'seo' => false,
					'share' => false,
					'counters' => 'comments'	//comments,likes,views - comma separated in any combination
				)
			);
			?>
		</div><!-- .entry-header -->
		<?php
	}

	// Featured image
	luxmed_show_post_featured(array(
		'thumb_size' => luxmed_get_thumb_size($luxmed_columns==1 ? 'big' : ($luxmed_columns==2 ? 'med' : 'avatar'))
	));
	?>
</article></div>