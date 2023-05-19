<?php
/**
 * The Classic template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage LUXMED
 * @since LUXMED 1.0
 */

$luxmed_blog_style = explode('_', luxmed_get_theme_option('blog_style'));
$luxmed_columns = empty($luxmed_blog_style[1]) ? 2 : max(2, $luxmed_blog_style[1]);
$luxmed_expanded = !luxmed_sidebar_present() && luxmed_is_on(luxmed_get_theme_option('expand_content'));
$luxmed_post_format = get_post_format();
$luxmed_post_format = empty($luxmed_post_format) ? 'standard' : str_replace('post-format-', '', $luxmed_post_format);
$luxmed_animation = luxmed_get_theme_option('blog_animation');

?><div class="<?php echo $luxmed_blog_style[0] == 'classic' ? 'column' : 'masonry_item masonry_item'; ?>-1_<?php echo esc_attr($luxmed_columns); ?>"><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_format_'.esc_attr($luxmed_post_format)
					. ' post_layout_classic post_layout_classic_'.esc_attr($luxmed_columns)
					. ' post_layout_'.esc_attr($luxmed_blog_style[0]) 
					. ' post_layout_'.esc_attr($luxmed_blog_style[0]).'_'.esc_attr($luxmed_columns)
					); ?>
	<?php echo (!luxmed_is_off($luxmed_animation) ? ' data-animation="'.esc_attr(luxmed_get_animation_classes($luxmed_animation)).'"' : ''); ?>
	>

	<?php

	// Featured image
	luxmed_show_post_featured( array( 'thumb_size' => luxmed_get_thumb_size($luxmed_blog_style[0] == 'classic'
													? (strpos(luxmed_get_theme_option('body_style'), 'full')!==false 
															? ( $luxmed_columns > 2 ? 'big' : 'huge' )
															: (	$luxmed_columns > 2
																? ($luxmed_expanded ? 'med' : 'small')
																: ($luxmed_expanded ? 'big' : 'med')
																)
														)
													: (strpos(luxmed_get_theme_option('body_style'), 'full')!==false 
															? ( $luxmed_columns > 2 ? 'masonry-big' : 'full' )
															: (	$luxmed_columns <= 2 && $luxmed_expanded ? 'masonry-big' : 'masonry')
														)
								) ) );

	if ( !in_array($luxmed_post_format, array('link', 'aside', 'status', 'quote')) ) {
		?>
		<div class="post_header entry-header">
			<?php 
			do_action('luxmed_action_before_post_title'); 

			// Post title
			the_title( sprintf( '<h4 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );

			do_action('luxmed_action_before_post_meta'); 

			// Post meta
			luxmed_show_post_meta(array(
				'categories' => true,
				'date' => true,
				'edit' => $luxmed_columns < 3,
				'seo' => false,
				'share' => false,
				'counters' => 'comments',
				)
			);
			?>
		</div><!-- .entry-header -->
		<?php
	}		
	?>

	<div class="post_content entry-content">
		<div class="post_content_inner">
			<?php
			$luxmed_show_learn_more = false; //!in_array($luxmed_post_format, array('link', 'aside', 'status', 'quote'));
			if (has_excerpt()) {
				the_excerpt();
			} else if (strpos(get_the_content('!--more'), '!--more')!==false) {
				the_content( '' );
			} else if (in_array($luxmed_post_format, array('link', 'aside', 'status', 'quote'))) {
				the_content();
			} else if (substr(get_the_content(), 0, 1)!='[') {
				the_excerpt();
			}
			?>
		</div>
		<?php
		// Post meta
		if (in_array($luxmed_post_format, array('link', 'aside', 'status', 'quote'))) {
			luxmed_show_post_meta(array(
				'share' => false,
				'counters' => 'comments'
				)
			);
		}
		// More button
		if ( $luxmed_show_learn_more ) {
			?><p><a class="more-link" href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e('Read more', 'luxmed'); ?></a></p><?php
		}
		?>
	</div><!-- .entry-content -->

</article></div>