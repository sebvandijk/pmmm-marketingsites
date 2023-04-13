<?php
/* Created by sebvandijk
  08/11/2022 - 13:23
*/

if ( isset( $args ) ) {
	$fields = $args;
}
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
				<a href="#brands" class="button scroll-icon arrow brand">
					<div class="svg-holder">
						<svg width="10px" height="6px" viewBox="0 0 10 6" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
						<title>arrow</title>
							<g id="1440*900" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<g id="PM-1440*900-Home:full" transform="translate(-140.000000, -449.000000)" fill="#FFFFFF">
									<g id="button" transform="translate(120.000000, 176.000000)">
										<g transform="translate(0.000000, 252.000000)">
										<path d="M27.4214805,21.1402122 L29.8471718,23.5659035 C30.0207381,23.7394698 30.0400233,24.0088942 29.9050272,24.2037623 L29.8471718,24.2730102 L27.2603942,26.8597878 C27.065132,27.05505 26.7485495,27.05505 26.5532874,26.8597878 L26.4771947,26.7836951 C26.2819325,26.5884329 26.2819325,26.2718505 26.4771947,26.0765883 L28.002,24.55 L20.5,24.5500098 C20.2238576,24.5500098 20,24.3261521 20,24.0500098 L20,23.9423984 C20,23.666256 20.2238576,23.4423984 20.5,23.4423984 L28.076,23.442 L26.5980094,21.9636833 C26.4027472,21.7684211 26.4027472,21.4518386 26.5980094,21.2565765 L26.7143737,21.1402122 C26.9096358,20.94495 27.2262183,20.94495 27.4214805,21.1402122 Z" id="arrow"></path>
										</g>
									</g>
								</g>
							</g>
						</svg>
					</div>
					<?= $fields['cta1_color'] ?>
				</a>
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
