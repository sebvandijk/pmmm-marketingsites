<?php
/* Created by sebvandijk
  08/11/2022 - 13:23
*/

if ( isset( $args ) ) {
	$fields = $args;
}
$fields['cta1_color']['icon'] = 'arrow';
if ($fields['cta2_link']):
$fields['cta2_link']['icon']  = 'arrow';
endif;
$image                        = wp_get_attachment_image( $fields['image'], 'large' );
?>

<!-- intro -->
<section class="block intro introduction">
	<div class="inner">
		<h1><?= $fields['title'] ?></h1>
		<div class="content">
			<p class="large"><?= $fields['intro'] ?></p>
		</div>
		<div class="button-row">
			<?php if ($fields['cta1_color']): ?>
			<?= button( $fields['cta1_color'], 'brand' ) ?>
			<?php endif; ?>
			<?php if ($fields['cta2_link']): ?>
			<?= button( $fields['cta2_link'], 'naked' ) ?>
			<?php endif; ?>
		</div>
	</div>
</section>
<!-- end intro -->

<!-- stats -->
<section class="block stats inner-round">
	<div class="row">
		<div class="image-holder">
			<?= $image ?>
		</div>
    <div class="stats-container">
			<?= $fields['stat'] ?>
    </div>
	</div>
</section>
<!-- end stats -->

<!-- background correction -->
<div class="background-correction"></div>
<!-- end background correction -->
