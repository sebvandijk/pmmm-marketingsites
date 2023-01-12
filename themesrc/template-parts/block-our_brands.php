<?php
/* Created by sebvandijk
  08/11/2022 - 14:02
*/
if ( isset( $args ) ) {
	$fields = $args;
}
?>

<!-- our brands -->
<section class="block our-brands">
	<div class="circle-bg"></div>
	<div class="inner centered">
		<h6><?= $fields['label'] ?></h6>
		<h2><?= $fields['title'] ?></h2>
		<div class="content">
		<?= $fields['content'] ?>
		</div>
	</div>
	<div class="inner makewide">
	<?php if ( is_array( $fields['brands'] ) ) { ?>
  	<div class="brands row">
		<?php foreach ( $fields['brands'] as $brand ) { $brand['brand_cta']['icon'] = 'arrow'; ?>
    	<div class="brand">
				<div class="image-holder"><?= wp_get_attachment_image( $brand['brand_logo'], 'small' ) ?></div>
  			<h5><?= $brand['brand_title'] ?></h5>
        <p class="intro">
					<?= $brand['brand_intro'] ?>
        </p>
				<?= button( $brand['brand_cta'], 'brand' ) ?>
      </div>
			<?php } ?>
    </div>
		<?php } ?>
	</div>
</section>
<!-- end our brands -->
