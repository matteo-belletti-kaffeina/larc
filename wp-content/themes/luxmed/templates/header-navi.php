<?php
/**
 * The template to display the main menu
 *
 * @package WordPress
 * @subpackage LUXMED
 * @since LUXMED 1.0
 */
?>
<div class="top_panel_navi sc_layouts_row sc_layouts_row_type_compact sc_layouts_row_fixed
			scheme_<?php echo esc_attr(luxmed_is_inherit(luxmed_get_theme_option('menu_scheme')) 
												? (luxmed_is_inherit(luxmed_get_theme_option('header_scheme')) 
													? luxmed_get_theme_option('color_scheme') 
													: luxmed_get_theme_option('header_scheme')) 
												: luxmed_get_theme_option('menu_scheme')); ?>">
	<div class="content_wrap">
		<div class="columns_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_left sc_layouts_column_icons_position_left column-1_4">
				<?php
				// Logo
				?><div class="sc_layouts_item"><?php
					get_template_part( 'templates/header-logo' );
				?></div>
			</div><?php
			
			// Attention! Don't place any spaces between columns!
			$col_width = 8;
			?><div class="sc_layouts_column  sc_layouts_column_align_right sc_layouts_column_icons_position_left column-<?php echo $col_width; ?>">
				<div class="sc_layouts_item">
					<?php
					// Main menu
					$luxmed_menu_main = luxmed_get_nav_menu(array(
						'location' => 'menu_main', 
						'class' => 'sc_layouts_menu sc_layouts_menu_default sc_layouts_hide_on_mobile'
						)
					);
					if (empty($luxmed_menu_main)) {
						$luxmed_menu_main = luxmed_get_nav_menu(array(
							'class' => 'sc_layouts_menu sc_layouts_menu_default sc_layouts_hide_on_mobile'
							)
						);
					}
					luxmed_show_layout($luxmed_menu_main);
					// Mobile menu button
					?>
					<div class="sc_layouts_iconed_text sc_layouts_menu_mobile_button">
						<a class="sc_layouts_item_link sc_layouts_iconed_text_link" href="#">
							<span class="sc_layouts_item_icon sc_layouts_iconed_text_icon icon-menu"></span>
						</a>
					</div>
				</div>
			</div><?php
			// Attention! Don't place any spaces between layouts items!
			if (luxmed_get_theme_option('btn_text') !=='' ) {
			?><div class="sc_layouts_column sc_layouts_column_align_right sc_layouts_column_icons_position_left column-1_4 hidden_xs">
				<div class="sc_layouts_item default_custom_btn">
					<div class="custom_btn"><a href="<?php echo esc_url(luxmed_get_theme_option('btn_link')); ?>"><?php echo esc_html(luxmed_get_theme_option('btn_text')); ?></a></div>
				</div>
			</div>
			<?php } ?>
		</div><!-- /.sc_layouts_row -->
	</div><!-- /.content_wrap -->
</div><!-- /.top_panel_navi -->