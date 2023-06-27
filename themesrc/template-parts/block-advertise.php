<?php
/* Created by sebvandijk
  08/11/2022 - 14:39
*/
if ( isset( $args ) ) {
	$fields = $args;
}
$image                        = wp_get_attachment_image( $fields['image'], 'large' );
$fields['cta']['icon'] = 'arrow';
?>

<!-- advertise -->
<section class="block advertise">
	<div class="inner-round">
		<div class="row">
			<div class="image-holder">
				<?= $image ?>
			</div>
			<div class="content-holder">
				<h6><?= $fields['label'] ?></h6>
				<h3><?= $fields['title'] ?></h3>
				<div class="content">
					<?= $fields['content'] ?>
				</div>
				<?= button( $fields['cta'], 'ghost' ) ?>
		   </div>
		</div>
	</div>
</section>
<!-- end advertise -->
