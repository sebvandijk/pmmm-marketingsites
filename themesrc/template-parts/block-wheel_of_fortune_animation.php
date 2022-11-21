<?php
/* Created by sebvandijk
  08/11/2022 - 14:37
*/

if ( isset( $args ) ) {
	$fields = $args;
	$icon1  = wp_get_attachment_image( $fields['elements'][1]['icon'], 'large' );
	$icon2  = wp_get_attachment_image( $fields['elements'][2]['icon'], 'large' );
	$icon3  = wp_get_attachment_image( $fields['elements'][3]['icon'], 'large' );
	$icon4  = wp_get_attachment_image( $fields['elements'][4]['icon'], 'large' );
	$icon5  = wp_get_attachment_image( $fields['elements'][0]['icon'], 'large' );
}

?>

<!-- wheel-of-fortune -->
<section class="block wheel-of-fortune">
	<div class="inner">
		<div class="row">
			<div class="animation-holder">
				<div class="label">
					<h4><?= $fields['top_label'] ?></h4>
				</div>

				<div class="circle">
					<div class="inner-circle">
						<h4><?= $fields['center_title'] ?></h4>
						<span><?= $fields['center_content'] ?></span>
					</div>
					<div class="rotator">
						<div class="animation-section section-1">
							<?= $fields['elements'][1]['label'] ?>
							<div class="image-holder"><?= $icon1 ?></div>
						</div>
						<div class="animation-section section-2">
							<?= $fields['elements'][2]['label'] ?>
							<div class="image-holder"><?= $icon2 ?></div>
						</div>
						<div class="animation-section section-3">
							<?= $fields['elements'][3]['label'] ?>
							<div class="image-holder"><?= $icon3 ?></div>
						</div>
						<div class="animation-section section-4">
							<?= $fields['elements'][4]['label'] ?>
							<div class="image-holder"><?= $icon4 ?></div>
						</div>
						<div class="animation-section section-5">
							<?= $fields['elements'][0]['label'] ?>
							<div class="image-holder"><?= $icon5 ?></div>
						</div>
					</div>
				</div>

				<div class="label">
					<h4><?= $fields['bottom_label'] ?></h4>
				</div>

			</div>
			<div class="content-holder">
				<h3><?= $fields['title'] ?></h3>
				<div class="content">
					<?= $fields['content'] ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end wheel of fortune -->
