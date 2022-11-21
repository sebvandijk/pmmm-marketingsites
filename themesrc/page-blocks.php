<?php
/**
 * Template Name: Content blocks
 */

get_header();

while ( have_posts() ) :
	the_post();
	$blocks = get_fields( get_the_ID() );

	?>
    <div class="block-holder">
		<?php
		if ( isset( $blocks ) && is_array( $blocks ) && is_array( $blocks['content_blocks'] ) ) {
			foreach ( $blocks['content_blocks'] as $block ) {
				if ( get_template_part( 'template-parts/block', str_replace( "&", "and", $block['acf_fc_layout'] ), $block ) === false ) {
					debug( 'Missing template: ' . str_replace( "&", "and", $block['acf_fc_layout'] ) );
					debug( 'Create block-' . str_replace( "&", "and", $block['acf_fc_layout'] ) . '.php in the template-parts folder' );
				}
			}
		}
		?>
    </div>
<?php
endwhile; // End of the loop.

get_footer();
