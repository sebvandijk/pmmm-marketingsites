<?php
/* Created by sebvandijk
  08/11/2022 - 13:23
*/

if ( isset( $args ) ) {
	$fields = $args;
}
$fields['cta1_color']['icon'] = 'arrow';
$fields['cta2_link']['icon']  = 'arrow';
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
			<?= button( $fields['cta1_color'], 'brand' ) ?>
			<?= button( $fields['cta2_link'], 'naked' ) ?>
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
		<?php if ( is_array( $fields['stat'] ) ) { ?>
    <div class="stats-container">
			<h6><?= $fields['stats_label'] ?></h6>
			<?php foreach ( $fields['stat'] as $stat ) { ?>
      <div class="stat">
      	<span class="number"><?= $stat['number'] ?><i><?= $stat['plus'] ? '<sup>+</sup>' : false ?></i></span>
				<div class="label">
					<?= $stat['label'] ?>
				</div>
      </div>
			<?php } ?>
    </div>
		<?php } ?>
	</div>
</section>
<!-- end stats -->

<!-- background correction -->
<div class="background-correction"></div>
<!-- end background correction -->
