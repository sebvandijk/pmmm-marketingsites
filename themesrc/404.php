<?php
/**
 * The template for displaying 404 pages (not found)
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @package pmmm-marketing
 */

get_header();
$page = get_page_by_path( '404-page-not-found' );
if ( $page ) {
	$id = $page->ID;
	
	$blocks = get_fields( $id );
	if ( isset( $blocks ) && is_array( $blocks ) && is_array( $blocks['block'] ) ) {
		foreach ( $blocks['block'] as $block ) {
			get_template_part( 'template-parts/block', $block['acf_fc_layout'], $block );
		}
	}
} else {
	?>
    <h3>404 page not found</h3>
	<?php
}

get_footer();