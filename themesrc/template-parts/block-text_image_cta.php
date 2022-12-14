<?php
/* Created by sebvandijk
  08/11/2022 - 13:45
*/

/* Created by sebvandijk
  08/11/2022 - 13:23
*/

if ( isset( $args ) ) {
	$fields = $args;
}
$image                       	= wp_get_attachment_image( $fields['image'], 'large' );
$fields['cta_button']['icon'] = 'arrow';
?>

<!-- text-image-cta -->
<section class="block text-image-cta">
	<div class="inner">
		<div class="row">
			<div class="content-holder">
				<h6><?= $fields['label'] ?></h6>
				<h3><?= $fields['title'] ?></h3>
				<div class="content">
					<?= $fields['content'] ?>
				</div>
			</div>
			<div class="image-holder">
				<div class="cta-holder">
					<h4><?= $fields['cta_title'] ?></h4>
					<?= button( $fields['cta_button'], 'brand' ) ?>
				</div>
				<?= $image ?>
			</div>
		</div>
	</div>
</section>
<!-- end text-image-cta -->
