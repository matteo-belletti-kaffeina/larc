<?php
/**
 * The template to display the team member's page
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.2
 */

global $TRX_ADDONS_STORAGE;

get_header();

while ( have_posts() ) { the_post();
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'team_member_page itemscope' ); ?>
		itemscope itemtype="http://schema.org/Article">
		
		<section class="team_member_header">	

			<?php
			$meta = get_post_meta(get_the_ID(), 'trx_addons_options', true);

			// Image
			if ( !trx_addons_sc_layouts_showed('featured') && has_post_thumbnail() ) {
				?><div class="team_member_featured">
					<div class="team_member_avatar">
						<?php
						the_post_thumbnail( trx_addons_get_thumb_size('masonry'), array(
									'alt' => get_the_title(),
									'itemprop' => 'image'
									)
								);
						?>
					</div>
				</div>
				<?php
			}
			
			// Title and Description
			?><div class="team_member_description"><?php
				if ( !trx_addons_sc_layouts_showed('title') ) {
					?><h2 class="team_member_title"><?php the_title(); ?></h2><?php
				}
				?>
				<?php
				if (!empty($meta['brief_info'])) {
					?>
					<div class="team_member_brief_info">
						<h5 class="team_member_brief_info_title"><?php esc_attr_e('Brief info', 'trx_addons'); ?></h5>
						<div class="team_member_brief_info_text"><?php	the_content( );		?></div>
					</div>
					<?php
				}
				?>
			</div>

		</section>
		</article><?php

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
}

get_footer();
?>