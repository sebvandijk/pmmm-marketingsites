<?php
/* Created by sebvandijk
  08/11/2022 - 14:02
*/
if ( isset( $args ) ) {
	$fields = $args;
}

$logos = get_transient( 'brand_logos' );
if ( false === $logos ) {
	// get logos trough api call and use the wordpress internal get method to load the api: https://solidsprocessing.nl/wp-json/custom-rest/get_logos
	$response = wp_remote_get( 'https://solidsprocessing.nl/wp-json/custom-rest/get_logos' );
	if ( is_wp_error( $response ) ) {
		return false;
	}
	$logos = json_decode( wp_remote_retrieve_body( $response ), true );
	debug( $logos );
	
	
	set_transient( 'brand_logos', $logos, 12 * HOUR_IN_SECONDS );
}

?>

<!-- other brands -->
<section class="block other-brands">
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
    </div>
</section>
<!-- end our brands -->
