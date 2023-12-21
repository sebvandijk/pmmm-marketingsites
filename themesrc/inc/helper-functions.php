<?php
/**
 * Helper function to get the relative permalink based on post id
 */

function debug( $debug ) {
	print_r( '<pre style="background-color: white; color: black;">' );
	print_r( $debug );
	print_r( '</pre>' );
}

function perror( $debug ) {
	error_log( print_r( $debug, 1 ) );
}
