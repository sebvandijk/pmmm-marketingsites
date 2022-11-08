<?php

add_filter('acf/settings/save_json', 'my_acf_json_save_point');

function my_acf_json_save_point( $path ) {
	// update path
	if( defined('ACFPATH')){
		$path = ACFPATH;
	} else {
		$path = get_stylesheet_directory() . '/inc/field-groups';
	}

	// return
	return $path;
}

function acf_load_category_choices( $field ) {
	$categories = get_categories();
	// reset choices
	$field['choices'] = array();
	// get the textarea value from options page without any categoryatting
	$field['choices']['false'] = 'Choose a category';

	foreach ($categories as $category) {
		$field['choices'][$category->slug] = $category->name;
	}
	// return the field
	return $field;
}
add_filter('acf/load_field/name=category', 'acf_load_category_choices');

add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point( $paths ) {
	// remove original path (optional)
	unset($paths[0]);

	// append path
	if( defined('ACFPATH')){
		$paths[] = ACFPATH;
	} else {
		$paths[] = get_stylesheet_directory() . '/inc/field-groups';
	}

	// return
	return $paths;
}

