<?php
/**
 * The template to display the featured image in the single post
 *
 * @package WordPress
 * @subpackage LUXMED
 * @since LUXMED 1.0
 */

if ( get_query_var('luxmed_header_image')=='' && is_singular() && has_post_thumbnail() && in_array(get_post_type(), array('post', 'page')) )  {
	$luxmed_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
}
?>