<?php
/**
 * The template for displaying archive pages
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package pmmm-marketing
 */

get_header();
?>
    <section class="Archive">
        <div class="archive grid__row">
			<?php
			// The Loop
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					echo get_template_part( 'template-parts/archive-tile', get_post_type(), array( 'id' => get_the_id() ) );
				}
			}
			?>
        </div>
    </section>
<?php
get_footer();