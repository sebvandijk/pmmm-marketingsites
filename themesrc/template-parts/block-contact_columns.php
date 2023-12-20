<?php
/* Created by sebvandijk
  08/11/2022 - 14:02
*/
if ( isset( $args ) ) {
	$fields = $args;
}
?>

<!-- other brands -->
<section class="block other-brands contact">
	<div class="inner">
	<?php if ( is_array( $fields['brands'] ) ) { ?>
  	<div class="brands row">
		<?php foreach ( $fields['brands'] as $brand ) { ?>
    	<div class="brand">
				<div class="image-holder"><?= wp_get_attachment_image( $brand['brand_logo'], 'small' ) ?></div>
				<h5><?= $brand['brand_title'] ?></h5>
				<?= $brand['brand_content'] ?>
      </div>
			<?php } ?>
    </div>
		<?php } ?>
	</div>
</section>
<!-- end our brands -->
