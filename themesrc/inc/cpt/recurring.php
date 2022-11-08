<?php
// Register Custom Post Type
function recurring_post_type() {
	
	$labels = array(
		'name'                  => _x( 'Recurring', 'Post Type General Name', 'pmmm-marketing' ),
		'singular_name'         => _x( 'Recurring', 'Post Type Singular Name', 'pmmm-marketing' ),
		'menu_name'             => __( 'Veelgebruikte blokken', 'pmmm-marketing' ),
		'name_admin_bar'        => __( 'veel.geb. blokken', 'pmmm-marketing' ),
		'archives'              => __( 'Item Archives', 'pmmm-marketing' ),
		'attributes'            => __( 'Item Attributes', 'pmmm-marketing' ),
		'parent_item_colon'     => __( 'Parent Item:', 'pmmm-marketing' ),
		'all_items'             => __( 'All Items', 'pmmm-marketing' ),
		'add_new_item'          => __( 'Add New Item', 'pmmm-marketing' ),
		'add_new'               => __( 'Add New', 'pmmm-marketing' ),
		'new_item'              => __( 'New Item', 'pmmm-marketing' ),
		'edit_item'             => __( 'Edit Item', 'pmmm-marketing' ),
		'update_item'           => __( 'Update Item', 'pmmm-marketing' ),
		'view_item'             => __( 'View Item', 'pmmm-marketing' ),
		'view_items'            => __( 'View Items', 'pmmm-marketing' ),
		'search_items'          => __( 'Search Item', 'pmmm-marketing' ),
		'not_found'             => __( 'Not found', 'pmmm-marketing' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'pmmm-marketing' ),
		'featured_image'        => __( 'Featured Image', 'pmmm-marketing' ),
		'set_featured_image'    => __( 'Set featured image', 'pmmm-marketing' ),
		'remove_featured_image' => __( 'Remove featured image', 'pmmm-marketing' ),
		'use_featured_image'    => __( 'Use as featured image', 'pmmm-marketing' ),
		'insert_into_item'      => __( 'Insert into item', 'pmmm-marketing' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'pmmm-marketing' ),
		'items_list'            => __( 'Items list', 'pmmm-marketing' ),
		'items_list_navigation' => __( 'Items list navigation', 'pmmm-marketing' ),
		'filter_items_list'     => __( 'Filter items list', 'pmmm-marketing' ),
	);
	
	$args = array(
		'label'               => __( 'Recurring', 'pmmm-marketing' ),
		'description'         => __( 'Recurrring Description', 'pmmm-marketing' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'taxonomies'          => array( 'category' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-welcome-write-blog',
		'show_in_admin_bar'   => false,
		'show_in_nav_menus'   => false,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => false,
		'rewrite'             => false,
		'capability_type'     => 'post',
	);
	register_post_type( 'recurring', $args );
	
}

add_action( 'init', 'recurring_post_type', 0 );

?>