<?php
/* Created by sebvandijk
  08/11/2022 - 14:02
*/
if ( isset( $args ) ) {
	$fields = $args;
}
$api_url = $fields['api_url'];
if ( $api_url != '' ) {
	
	$logos = get_transient( 'pmmm_brand-logos-' . md5( $api_url ) );
	if ( false === $logos ) {
		
		
		$response = wp_remote_get( $api_url );
		if ( is_wp_error( $response ) ) {
			return false;
		}
		
		$logos = json_decode( wp_remote_retrieve_body( $response ), true );
		$logos = explode( ';', $logos );
		
		set_transient( 'pmmm_brand-logos-' . md5( $api_url ), $logos, 12 * HOUR_IN_SECONDS );
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
}
?>

<!-- other brands -->
<section class="block other-brands">
    <div class="inner centered">
        <h6><?= $fields['label'] ?></h6>
        <h2><?= $fields['title'] ?></h2>
		<?= $fields['content'] ?>
    </div>

    <div class="inner">

        <div class="brands row">
			<?php if ( is_array( $fields['brands'] ) ) { ?>
				<?php foreach ( $fields['brands'] as $brand ) {
					$brand['brand_cta']['icon'] = 'arrow'; ?>
                    <div class="brand">
                        <h5><?= $brand['brand_title'] ?></h5>
                        <div class="image-holder"><?= wp_get_attachment_image( $brand['brand_logo'], 'small' ) ?></div>
						<?= button( $brand['brand_cta'], 'brand' ) ?>
                    </div>
				<?php } ?>
			<?php } ?>
			<?php if ( isset( $brand_logos ) && $brand_logos != '' ) { ?>
                <div class="marquee-full-width">
                    <div class="marquee-box">
						<?= $brand_logos ?>


                    </div>
                </div>
			<?php } ?>
        </div>

    </div>


</section>
<!-- end our brands -->
