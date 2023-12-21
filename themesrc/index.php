<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package pmmm-marketing
 */

get_header();

?>
    <article class="block simple-page-header switch-header-colors">
        <div class="simple-page-header__inner">
            <h1 class="simple-page-header__title page-heading">
				<?php single_post_title(); ?>Template ready for development!
            </h1>

        </div>
    </article>

<?php
if ( have_posts() ) :
	?>
    <article class="blog-container">
		<?php
		/* Start the Loop */
		while ( have_posts() ) :
			the_post();
			?>
			
			<?php
			if ( get_template_part( 'template-elements/blog-item' ) === false ) {
				debug( 'template-elements/blog-item.php in the template-elements folder' );
			}
		endwhile;
		?>
    </article>
	<?php
	the_posts_navigation();

else:
	echo "no posts yet";
endif;

get_footer();
