<?php
/* Created by sebvandijk
  08/11/2022 - 14:02
*/
if ( isset( $args ) ) {
	$fields = $args;
}

$logos = get_transient( 'brand_logos' );
if ( false === $logos ) {
	$api_url = $fields['api_url'];
	
	$response = wp_remote_get( $api_url );
	if ( is_wp_error( $response ) ) {
		return false;
	}
	
	$logos = json_decode( wp_remote_retrieve_body( $response ), true );
	$logos = explode( ';', $logos );
	
	set_transient( 'brand_logos', $logos, 96 * HOUR_IN_SECONDS );
}


if ( isset( $logos ) && is_array( $logos ) ) {
	$brand_logos = '<div class="marquee">';
	foreach ( $logos as $key => $logo ) {
		if ( $logo != '' ) {
			$brand_logos .= '<figure><img decoding="async" loading="lazy"
                                    src="' . $logo . '"/>
                            </figure>';
		}
	}
	$brand_logos .= '</div>';
}

?>

<!-- other brands -->
<section class="block other-brands">
    <div class="inner centered">
        <h6><?= $fields['label'] ?></h6>
        <h2><?= $fields['title'] ?></h2>
        <div class="content">

            <div class="marquee-full-width">
                <div class="marquee-box">
					<?= $brand_logos ?>
					<?= $brand_logos ?>

                </div>
            </div>
        </div>
    </div>


</section>
<!-- end our brands -->
