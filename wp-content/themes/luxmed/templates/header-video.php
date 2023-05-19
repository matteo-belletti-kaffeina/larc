<?php
/**
 * The template to display the background video in the header
 *
 * @package WordPress
 * @subpackage LUXMED
 * @since LUXMED 1.0.14
 */
$luxmed_header_video = luxmed_get_header_video();
$luxmed_embed_video = '';
if (!empty($luxmed_header_video) && !luxmed_is_from_uploads($luxmed_header_video)) {
	if (luxmed_is_youtube_url($luxmed_header_video) && preg_match('/[=\/]([^=\/]*)$/', $luxmed_header_video, $matches) && !empty($matches[1])) {
		?><div id="background_video" data-youtube-code="<?php echo esc_attr($matches[1]); ?>"></div><?php
	} else {
		global $wp_embed;
		if (false && is_object($wp_embed)) {
			$luxmed_embed_video = do_shortcode($wp_embed->run_shortcode( '[embed]' . trim($luxmed_header_video) . '[/embed]' ));
			$luxmed_embed_video = luxmed_make_video_autoplay($luxmed_embed_video);
		} else {
			$luxmed_header_video = str_replace('/watch?v=', '/embed/', $luxmed_header_video);
			$luxmed_header_video = luxmed_add_to_url($luxmed_header_video, array(
				'feature' => 'oembed',
				'controls' => 0,
				'autoplay' => 1,
				'showinfo' => 0,
				'modestbranding' => 1,
				'wmode' => 'transparent',
				'enablejsapi' => 1,
				'origin' => home_url(),
				'widgetid' => 1
			));
			$luxmed_embed_video = '<iframe src="' . esc_url($luxmed_header_video) . '" width="1170" height="658" allowfullscreen="0" frameborder="0"></iframe>';
		}
		?><div id="background_video"><?php luxmed_show_layout($luxmed_embed_video); ?></div><?php
	}
}
?>