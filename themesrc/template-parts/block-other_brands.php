<?php
/* Created by sebvandijk
  08/11/2022 - 14:02
*/
if ( isset( $args ) ) {
	$fields = $args;
}

if ( isset( $fields['block_purpose'] ) && $fields['block_purpose'] == 'our_clients' ) {
	$block_mode = 'api_logos';
	switch ( $fields['platform'] ) {
		case 'Solids':
		default:
			$api_url = 'https://solidsprocessing.nl/wp-json/custom-rest/get_logos';
			break;
		case 'Fluids':
			$api_url = 'https://fluidsprocessing.nl/wp-json/custom-rest/get_logos';
			break;
		case 'Lab':
			$api_url = 'https://labinsights.nl/wp-json/custom-rest/get_logos';
			break;
		case 'Maintenance':
			$api_url = 'https://maintenancebenelux.nl/wp-json/custom-rest/get_logos';
			break;
	}
	
	$logos_html = get_transient( 'logos_' . $api_url );
	
	// debug type of logos_html
	
	
	if ( ! $logos_html ) {
		// get the logos using wp_remote_get
		$response = wp_remote_get( $api_url );
		// Check for errors
		if ( is_wp_error( $response ) ) {
			// Handle error
			echo 'Error: ' . $response->get_error_message();
		} else {
			// Get the body of the response
			$body = wp_remote_retrieve_body( $response );
			
			// Decode the JSON string into an associative array
			$data_array = json_decode( $body, true );
			
			// Check if decoding was successful
			if ( $data_array === null ) {
				// Handle JSON decoding error
				echo 'Error decoding JSON';
			} else {
				// Now $data_array contains the data as an associative array
				// create logo html
				$logos_html = '';
				foreach ( $data_array as $logo ) {
					$logos_html .= '<figure><img src="' . $logo . '" /></figure>';
				}
				// set transient
				set_transient( 'logos_' . $api_url, $logos_html, 60 * 60 * 24 );
				
			}
		}
	}
	
	
} else {
	$block_mode = 'our_brands';
}
?>

<!-- other brands -->
<section class="block other-brands">
    <!-- <div class="circle-bg"></div> -->
    <div class="inner centered">
        <h6><?= $fields['label'] ?></h6>
        <h2><?= $fields['title'] ?></h2>
        <div class="content">
			<?= $fields['content'] ?>
        </div>
    </div>
    <div class="inner">
		<?php if ( is_array( $fields['brands'] ) ) { ?>
            <div class="brands row">
				<?php foreach ( $fields['brands'] as $brand ) {
					$brand['brand_cta']['icon'] = 'arrow'; ?>
                    <div class="brand">
                        <h5><?= $brand['brand_title'] ?></h5>
                        <div class="image-holder"><?= wp_get_attachment_image( $brand['brand_logo'], 'small' ) ?></div>
						<?= button( $brand['brand_cta'], 'brand' ) ?>
                    </div>
				<?php } ?>
            </div>
		<?php } ?>
		<?php if ( $block_mode == 'api_logos' ): ?>
            <!--        create marquee with logos  -->
			<?php if ( isset( $logos_html ) ): ?>
                <div class="marquee-full-width">
                    <div class="marquee-box">
                        <div class="marquee">
							<?= $logos_html ?>
                        </div>
                    </div>
                </div>
			<?php endif; ?>
		<?php endif; ?>

    </div>
</section>
<!-- end our brands -->
