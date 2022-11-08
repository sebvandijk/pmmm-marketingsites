<?php
//===================
// Add theme support
//===================
function theme_name_setup() {
	add_theme_support( 'align-wide' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_post_type_support( 'page', 'excerpt' );
}

add_action( 'after_setup_theme', 'theme_name_setup' );

# CLEANUP
function dvlpr_clean_header() {
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
}

add_action( 'init', 'dvlpr_clean_header' );


add_filter( 'style_loader_src', 'dvlpr_remove_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'dvlpr_remove_ver_css_js', 9999 );

function dvlpr_remove_ver_css_js( $src ) {
	// hide wp version, but allow voor main css en js
	if ( strpos( $src, 'ver=' ) && ! strpos( $src, 'site' ) ) {
		$src = remove_query_arg( 'ver', $src );
	}
	
	return $src;
}

//disable gutenberg
add_filter( 'use_block_editor_for_post', '__return_false', 10 );
add_filter( 'use_block_editor_for_post_type', '__return_false', 10 );


add_action( 'admin_menu', 'dvlpr_remove_menus' );
function dvlpr_remove_menus() {
	// remove_menu_page( 'edit.php' );
	remove_menu_page( 'edit-comments.php' );
}

function remove_dashboard_widgets() {
	global $wp_meta_boxes;
	
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now'] );
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] );
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] );
	update_user_meta( get_current_user_id(), 'show_welcome_panel', false );
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
	remove_meta_box( 'rg_forms_dashboard', 'dashboard', 'side' );
}

add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets' );

function smartwp_remove_wp_block_library_css() {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
}

add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

function defer_parsing_of_js( $url ) {
	if ( is_user_logged_in() ) {
		return $url;
	} //don't break WP Admin
	if ( false === strpos( $url, '.js' ) ) {
		return $url;
	}
	
	// if ( strpos( $url, 'jquery.js' ) ) return $url;
	return str_replace( ' src', ' defer src', $url );
}

add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );


function disable_embeds_code_init() {
	
	// Remove the REST API endpoint.
	remove_action( 'rest_api_init', 'wp_oembed_register_route' );
	
	// Turn off oEmbed auto discovery.
	add_filter( 'embed_oembed_discover', '__return_false' );
	
	// Don't filter oEmbed results.
	remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
	
	// Remove oEmbed discovery links.
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	
	// Remove oEmbed-specific JavaScript from the front-end and back-end.
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
	add_filter( 'tiny_mce_plugins', 'disable_embeds_tiny_mce_plugin' );
	
	// Remove all embeds rewrite rules.
	add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
	
	// Remove filter of the oEmbed result before any HTTP requests are made.
	remove_filter( 'pre_oembed_result', 'wp_filter_pre_oembed_result', 10 );
}

add_action( 'init', 'disable_embeds_code_init', 9999 );

function disable_embeds_tiny_mce_plugin( $plugins ) {
	return array_diff( $plugins, array( 'wpembed' ) );
}

function disable_embeds_rewrites( $rules ) {
	foreach ( $rules as $rule => $rewrite ) {
		if ( false !== strpos( $rewrite, 'embed=true' ) ) {
			unset( $rules[ $rule ] );
		}
	}
	
	return $rules;
}