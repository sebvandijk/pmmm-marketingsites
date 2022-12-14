<?php

/**
 * Functions page
 * @author       dvlpr
 * @package      Wordpress
 * @subpackage   pmmm-marketing
 * @version      1.0
 * @since        1.0
 */

//===================
// Enqueue scripts and styles.
//===================
function themeScripts() {

	if ( $_SERVER['SERVER_NAME'] == 'localhost' ) {
		// dev
		wp_enqueue_script( 'pmmm-marketing-scripts-dev', 'http://localhost:8000/site.js' );
	} else {
		$include_url = get_template_directory_uri();
		$include_url = str_replace( 'https://', '//', $include_url );

		//live
		wp_enqueue_style( 'theme-css', $include_url . '/assets/site.css', array(), date( "is" ), false );
		wp_enqueue_script( 'theme-appjs', $include_url . '/assets/site.js', array(), date( "is" ), true );
	}

}

add_action( 'wp_enqueue_scripts', 'themeScripts' );

function button( $args, $opt_classes = false ) {
	if ( ! isset( $args['classes'] ) ) {
		$args['classes'] = false;
	}

	if ( isset( $args['icon'] ) ) {
		$args['classes'] .= ' icon ' . $args['icon'];
	}


	if ( isset( $opt_classes ) ) {
		$args['classes'] .= ' ' . $opt_classes;
	}

	if ( ! isset( $args['target'] ) ) {
		$args['target'] = '_self';
	}

	if ( isset( $args['title'] ) && isset( $args['url'] ) && isset( $args['target'] ) ) {
		echo '<a href="' . $args['url'] . '" class="button   ' . $args['classes'] . '" target="' . $args['target'] . '">'?>
		<?php
		if ( isset( $args['icon'] ) ) {
			echo svg( $args['icon'] );
		}
		echo $args['title'];
		echo '</a>';

	} else {
		$button = false;
	}

	return false;
}

//===================
require_once( 'inc/includes.php' );

//tims magie
add_filter('nav_menu_css_class', 'add_active_class', 10, 2 );

function add_active_class($classes, $item) {

  if( $item->menu_item_parent == 0 &&
    in_array( 'current-menu-item', $classes ) ||
    in_array( 'current-menu-ancestor', $classes ) ||
    in_array( 'current-menu-parent', $classes ) ||
    in_array( 'current_page_parent', $classes ) ||
    in_array( 'current_page_ancestor', $classes )
    ) {

    $classes[] = "active";
  }

  return $classes;
}
