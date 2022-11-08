<?php
/**
 * The template for displaying all single posts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package pmmm-marketing
 */

get_header();
if ( ! get_post_type() == 'product' || get_post_type() == 'location' ) {
	if ( get_template_part( 'template-parts/content', get_post_type() . '-single' ) === false ) {
		echo 'cant load: ' . 'template-parts/content-' . get_post_type() . '-single';
	}
	
} else {
	the_content();
}

get_footer();