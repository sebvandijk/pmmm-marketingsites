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

// breadcrumbs
function filter_wpseo_breadcrumb_separator($this_options_breadcrumbs_sep) {
    return '<i></i>';
};

add_filter('wpseo_breadcrumb_separator', 'filter_wpseo_breadcrumb_separator', 10, 1);

// page body class
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

// dirty trans
function multi_change_translate_text( $translated ) {
$text = array(
'View more' => 'Lees meer',
);
$translated = str_ireplace( array_keys( $text ), $text, $translated );
return $translated;
}
add_filter('gettext', 'multi_change_translate_text', 20 );
