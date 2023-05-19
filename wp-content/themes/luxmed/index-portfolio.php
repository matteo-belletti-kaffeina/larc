<?php
/**
 * The template for homepage posts with "Portfolio" style
 *
 * @package WordPress
 * @subpackage LUXMED
 * @since LUXMED 1.0
 */

luxmed_storage_set('blog_archive', true);

// Load scripts for both 'Gallery' and 'Portfolio' layouts!
wp_enqueue_script( 'classie', luxmed_get_file_url('js/theme.gallery/classie.min.js'), array(), null, true );
wp_enqueue_script( 'imagesloaded', luxmed_get_file_url('js/theme.gallery/imagesloaded.min.js'), array(), null, true );
wp_enqueue_script( 'masonry', luxmed_get_file_url('js/theme.gallery/masonry.min.js'), array(), null, true );
wp_enqueue_script( 'luxmed-gallery-script', luxmed_get_file_url('js/theme.gallery/theme.gallery.js'), array(), null, true );

get_header(); 

if (have_posts()) {

	echo get_query_var('blog_archive_start');

	$luxmed_stickies = is_home() ? get_option( 'sticky_posts' ) : false;
	$luxmed_sticky_out = is_array($luxmed_stickies) && count($luxmed_stickies) > 0 && get_query_var( 'paged' ) < 1;
	
	// Show filters
	$luxmed_cat = luxmed_get_theme_option('parent_cat');
	$luxmed_post_type = luxmed_get_theme_option('post_type');
	$luxmed_taxonomy = luxmed_get_post_type_taxonomy($luxmed_post_type);
	$luxmed_show_filters = luxmed_get_theme_option('show_filters');
	$luxmed_tabs = array();
	if (!luxmed_is_off($luxmed_show_filters)) {
		$luxmed_args = array(
			'type'			=> $luxmed_post_type,
			'child_of'		=> $luxmed_cat,
			'orderby'		=> 'name',
			'order'			=> 'ASC',
			'hide_empty'	=> 1,
			'hierarchical'	=> 0,
			'exclude'		=> '',
			'include'		=> '',
			'number'		=> '',
			'taxonomy'		=> $luxmed_taxonomy,
			'pad_counts'	=> false
		);
		$luxmed_portfolio_list = get_terms($luxmed_args);
		if (is_array($luxmed_portfolio_list) && count($luxmed_portfolio_list) > 0) {
			$luxmed_tabs[$luxmed_cat] = esc_html__('All', 'luxmed');
			foreach ($luxmed_portfolio_list as $luxmed_term) {
				if (isset($luxmed_term->term_id)) $luxmed_tabs[$luxmed_term->term_id] = $luxmed_term->name;
			}
		}
	}
	if (count($luxmed_tabs) > 0) {
		$luxmed_portfolio_filters_ajax = true;
		$luxmed_portfolio_filters_active = $luxmed_cat;
		$luxmed_portfolio_filters_id = 'portfolio_filters';
		if (!is_customize_preview())
			wp_enqueue_script('jquery-ui-tabs', false, array('jquery', 'jquery-ui-core'), null, true);
		?>
		<div class="portfolio_filters luxmed_tabs luxmed_tabs_ajax">
			<ul class="portfolio_titles luxmed_tabs_titles">
				<?php
				foreach ($luxmed_tabs as $luxmed_id=>$luxmed_title) {
					?><li><a href="<?php echo esc_url(luxmed_get_hash_link(sprintf('#%s_%s_content', $luxmed_portfolio_filters_id, $luxmed_id))); ?>" data-tab="<?php echo esc_attr($luxmed_id); ?>"><?php echo esc_html($luxmed_title); ?></a></li><?php
				}
				?>
			</ul>
			<?php
			$luxmed_ppp = luxmed_get_theme_option('posts_per_page');
			if (luxmed_is_inherit($luxmed_ppp)) $luxmed_ppp = '';
			foreach ($luxmed_tabs as $luxmed_id=>$luxmed_title) {
				$luxmed_portfolio_need_content = $luxmed_id==$luxmed_portfolio_filters_active || !$luxmed_portfolio_filters_ajax;
				?>
				<div id="<?php echo esc_attr(sprintf('%s_%s_content', $luxmed_portfolio_filters_id, $luxmed_id)); ?>"
					class="portfolio_content luxmed_tabs_content"
					data-blog-template="<?php echo esc_attr(luxmed_storage_get('blog_template')); ?>"
					data-blog-style="<?php echo esc_attr(luxmed_get_theme_option('blog_style')); ?>"
					data-posts-per-page="<?php echo esc_attr($luxmed_ppp); ?>"
					data-post-type="<?php echo esc_attr($luxmed_post_type); ?>"
					data-taxonomy="<?php echo esc_attr($luxmed_taxonomy); ?>"
					data-cat="<?php echo esc_attr($luxmed_id); ?>"
					data-parent-cat="<?php echo esc_attr($luxmed_cat); ?>"
					data-need-content="<?php echo (false===$luxmed_portfolio_need_content ? 'true' : 'false'); ?>"
				>
					<?php
					if ($luxmed_portfolio_need_content) 
						luxmed_show_portfolio_posts(array(
							'cat' => $luxmed_id,
							'parent_cat' => $luxmed_cat,
							'taxonomy' => $luxmed_taxonomy,
							'post_type' => $luxmed_post_type,
							'page' => 1,
							'sticky' => $luxmed_sticky_out
							)
						);
					?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	} else {
		luxmed_show_portfolio_posts(array(
			'cat' => $luxmed_cat,
			'parent_cat' => $luxmed_cat,
			'taxonomy' => $luxmed_taxonomy,
			'post_type' => $luxmed_post_type,
			'page' => 1,
			'sticky' => $luxmed_sticky_out
			)
		);
	}

	echo get_query_var('blog_archive_end');

} else {

	if ( is_search() )
		get_template_part( 'content', 'none-search' );
	else
		get_template_part( 'content', 'none-archive' );

}

get_footer();
?>