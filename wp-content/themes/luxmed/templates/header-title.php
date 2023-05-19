<?php
/**
 * The template to display the page title and breadcrumbs
 *
 * @package WordPress
 * @subpackage LUXMED
 * @since LUXMED 1.0
 */

// Page (category, tag, archive, author) title

if ( luxmed_need_page_title() ) {
	luxmed_sc_layouts_showed('title', true);
	luxmed_sc_layouts_showed('postmeta', true);
	?>
	<div class="top_panel_title sc_layouts_row sc_layouts_row_type_normal">
		<div class="content_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_center">
				<div class="sc_layouts_item">
					<div class="sc_layouts_title">
						<?php
						// Post meta on the single post
						if ( is_single() )  {
							?><div class="sc_layouts_title_meta"><?php
								luxmed_show_post_meta(array(
									'date' => true,
									'categories' => true,
									'seo' => true,
									'share' => false,
									'counters' => 'views,comments,likes'
									)
								);
							?></div><?php
						}
						
						// Blog/Post title
						?><div class="sc_layouts_title_title"><?php
							$luxmed_blog_title = luxmed_get_blog_title();
							$luxmed_blog_title_text = $luxmed_blog_title_class = $luxmed_blog_title_link = $luxmed_blog_title_link_text = '';
							if (is_array($luxmed_blog_title)) {
								$luxmed_blog_title_text = $luxmed_blog_title['text'];
								$luxmed_blog_title_class = !empty($luxmed_blog_title['class']) ? ' '.$luxmed_blog_title['class'] : '';
								$luxmed_blog_title_link = !empty($luxmed_blog_title['link']) ? $luxmed_blog_title['link'] : '';
								$luxmed_blog_title_link_text = !empty($luxmed_blog_title['link_text']) ? $luxmed_blog_title['link_text'] : '';
							} else
								$luxmed_blog_title_text = $luxmed_blog_title;
							?>
							<h1 class="sc_layouts_title_caption<?php echo esc_attr($luxmed_blog_title_class); ?>"><?php
								$luxmed_top_icon = luxmed_get_category_icon();
								if (!empty($luxmed_top_icon)) {
									$luxmed_attr = luxmed_getimagesize($luxmed_top_icon);
									?><img src="<?php echo esc_url($luxmed_top_icon); ?>" alt="" <?php if (!empty($luxmed_attr[3])) luxmed_show_layout($luxmed_attr[3]);?>><?php
								}
								echo wp_kses_data($luxmed_blog_title_text);
							?></h1>
							<?php
							if (!empty($luxmed_blog_title_link) && !empty($luxmed_blog_title_link_text)) {
								?><a href="<?php echo esc_url($luxmed_blog_title_link); ?>" class="theme_button theme_button_small sc_layouts_title_link"><?php echo esc_html($luxmed_blog_title_link_text); ?></a><?php
							}
							
							// Category/Tag description
							if ( is_category() || is_tag() || is_tax() ) 
								the_archive_description( '<div class="sc_layouts_title_description">', '</div>' );
		
						?></div><?php
	
						// Breadcrumbs
						?><div class="sc_layouts_title_breadcrumbs"><?php
							do_action( 'luxmed_action_breadcrumbs');
						?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>