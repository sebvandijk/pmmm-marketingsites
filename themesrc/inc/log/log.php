<?php

function l_error( $message ) {   
	$time = date( "Y-m-d H:i", strtotime('+2 hours') );
	$date = date("Y-m-d");
	$ban = "#$time\t$message\r\n"; 
	$file = WP_CONTENT_DIR. "/uploads/logs/" . $date . '-log.txt'; 
	$open = fopen( $file, "a" ); 
	$write = fwrite( $open, $ban ); 
	fclose( $open );
}

?>