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
$luxmed_columns = empty($luxmed_blog_style[1]) ? 1 : max(1, $luxmed_blog_style[1]);
$luxmed_expanded = !luxmed_sidebar_present() && luxmed_is_on(luxmed_get_theme_option('expand_content'));
$luxmed_post_format = get_post_format();
$luxmed_post_format = empty($luxmed_post_format) ? 'standard' : str_replace('post-format-', '', $luxmed_post_format);
$luxmed_animation = luxmed_get_theme_option('blog_animation');

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_chess post_layout_chess_'.esc_attr($luxmed_columns).' post_format_'.esc_attr($luxmed_post_format) ); ?>
	<?php echo (!luxmed_is_off($luxmed_animation) ? ' data-animation="'.esc_attr(luxmed_get_animation_classes($luxmed_animation)).'"' : ''); ?>
	>

	<?php
	// Add anchor
	if ($luxmed_columns == 1 && shortcode_exists('trx_sc_anchor')) {
		echo do_shortcode('[trx_sc_anchor id="post_'.esc_attr(get_the_ID()).'" title="'.esc_attr(get_the_title()).'"]');
	}

	// Featured image
	luxmed_show_post_featured( array(
											'class' => $luxmed_columns == 1 ? 'trx-stretch-height' : '',
											'show_no_image' => true,
											'thumb_bg' => true,
											'thumb_size' => luxmed_get_thumb_size(
																	strpos(luxmed_get_theme_option('body_style'), 'full')!==false
																		? ( $luxmed_columns > 1 ? 'huge' : 'original' )
																		: (	$luxmed_columns > 2 ? 'big' : 'huge')
																	)
											) 
										);

	?><div class="post_inner"><div class="post_inner_content"><?php 

		?><div class="post_header entry-header"><?php 
			do_action('luxmed_action_before_post_title'); 

			// Post title
			the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
			
			do_action('luxmed_action_before_post_meta'); 

			// Post meta
			$luxmed_post_meta = luxmed_show_post_meta(array(
									'categories' => true,
									'date' => true,
									'edit' => $luxmed_columns == 1,
									'seo' => false,
									'share' => false,
									'counters' => $luxmed_columns < 3 ? 'comments' : '',
									'echo' => false
									)
								);
			luxmed_show_layout($luxmed_post_meta);
		?></div><!-- .entry-header -->
	
		<div class="post_content entry-content">
			<div class="post_content_inner">
				<?php
				$luxmed_show_learn_more = !in_array($luxmed_post_format, array('link', 'aside', 'status', 'quote'));
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
				luxmed_show_layout($luxmed_post_meta);
			}
			// More button
			if ( $luxmed_show_learn_more ) {
				?><p><a class="more-link" href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e('Read more', 'luxmed'); ?></a></p><?php
			}
			?>
		</div><!-- .entry-content -->

	</div></div><!-- .post_inner -->

</article>