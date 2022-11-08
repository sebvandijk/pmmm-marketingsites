<?php

//===================
// Define menu-locations
//===================
function register_custom_nav_menus() {
	register_nav_menus( array(
		'header_menu'       => 'Header menu',
		'footer_legal_menu' => 'Footer legal menu',
	) );
}

if ( function_exists( 'register_nav_menu' ) ) {
	add_action( 'after_setup_theme', 'register_custom_nav_menus' );
}

//===================
// Function to get menus by slug
//===================
function get_menu_items_by_registered_slug( $menu_slug ) {
	$menu_items = array();
	if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_slug ] ) ) {
		$menu = get_term( $locations[ $menu_slug ] );
		if ( isset( $menu->term_id ) ) {
			$menu_items = wp_get_nav_menu_items( $menu->term_id );
		}
	}
	
	return $menu_items;
}

//
// if (function_exists('acf_add_options_page')) {
//
// 	acf_add_options_page(array(
// 		'page_title' 	=> 'pmmm-marketing Settings',
// 		'menu_title'	=> 'pmmm-marketing Settings',
// 		'menu_slug' 	=> 'theme-general-settings',
// 		'capability'	=> 'edit_posts',
// 		'redirect'		=> false
// 	));
// }


/**
 * ACF Options Page
 */

if ( function_exists( 'acf_add_options_page' ) ) {
	
	
	// Main Theme Settings Page
	$parent = acf_add_options_page( array(
		'page_title' => 'Theme General Settings',
		'menu_title' => 'Theme Settings',
		'redirect'   => 'Theme Settings',
	) );
	
	//
	// Global Options
	// Same options on all languages. e.g., social profiles links
	//
	
	acf_add_options_sub_page( array(
		'page_title' => 'Global Options',
		'menu_title' => __( 'Global Options', 'text-domain' ),
		'menu_slug'  => "theme-general-settings",
		'parent'     => $parent['menu_slug']
	) );
	
	//
	// Language Specific Options
	// Translatable options specific languages. e.g., social profiles links
	//

//	$languages = array( 'nl' );
//
//	foreach ( $languages as $lang ) {
//		acf_add_options_sub_page( array(
//			'page_title' => 'Options (' . strtoupper( $lang ) . ')',
//			'menu_title' => __( 'Options (' . strtoupper( $lang ) . ')', 'text-domain' ),
//			'menu_slug'  => "options-${lang}",
//			'post_id'    => 'option',
//			'parent'     => $parent['menu_slug']
//		) );
//	}

}