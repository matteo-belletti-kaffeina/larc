<?php
/**
 * The Footer: widgets area, logo, footer menu and socials
 *
 * @package WordPress
 * @subpackage LUXMED
 * @since LUXMED 1.0
 */

						// Widgets area inside page content
						luxmed_create_widgets_area('widgets_below_content');
						?>				
					</div><!-- </.content> -->

					<?php
					// Show main sidebar
					get_sidebar();

					// Widgets area below page content
					luxmed_create_widgets_area('widgets_below_page');

					$luxmed_body_style = luxmed_get_theme_option('body_style');
					if ($luxmed_body_style != 'fullscreen') {
						?></div><!-- </.content_wrap> --><?php
					}
					?>
			</div><!-- </.page_content_wrap> -->

			<?php
			// Footer
			$luxmed_footer_style = luxmed_get_theme_option("footer_style");
			if (strpos($luxmed_footer_style, 'footer-custom-')===0) $luxmed_footer_style = 'footer-custom';
			get_template_part( "templates/{$luxmed_footer_style}");
			?>

		</div><!-- /.page_wrap -->

	</div><!-- /.body_wrap -->

	<?php if (luxmed_is_on(luxmed_get_theme_option('debug_mode')) && luxmed_get_file_dir('images/makeup.jpg')!='') { ?>
		<img src="<?php echo esc_url(luxmed_get_file_url('images/makeup.jpg')); ?>" id="makeup">
	<?php } ?>

	<?php wp_footer(); ?>

</body>
</html>