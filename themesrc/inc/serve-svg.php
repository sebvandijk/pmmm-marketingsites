<?php

function svg( $svg_name, $name_only = true ) {
	
	if ( $name_only ) {
		$tpl = get_template_directory() . '/assets/svg/' . $svg_name . '.svg';
	} else {
		$tpl = $svg_name;
	}
	
	
	if ( file_exists( $tpl ) ) {
		ob_start();
		include( $tpl );
		
		return ob_get_clean();
	} else {
		// Or throw an error on the template
		debug( 'File (' . $tpl . ') does not exist' );
	}
}