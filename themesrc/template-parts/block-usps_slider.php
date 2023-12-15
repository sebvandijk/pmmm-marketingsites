<?php
/* Created by sebvandijk
08/11/2022 - 14:02
*/
if ( isset( $args ) ) {
	$fields = $args;
}
?>

<!-- usps slider -->
<section id="tabs" class="block usps-slider">
	<div class="usps-slider--holder">
		<div class="content-holder">
			<div class="content">
				<?php if ($fields['label']): ?>
					<h6><?= $fields['label'] ?></h6>
				<?php endif; ?>
				<h2><?= $fields['title'] ?></h2>
				<?php if ( is_array( $fields['usps'] ) ) { ?>
				<?= $fields['content'] ?>
				<div class="make-column">
					<?php foreach ( $fields['usps'] as $usp ) { ?>
						<div class="tab"><?= $usp['usp_title'] ?></div>
						<div class="image-holder tab-content">
							<?= wp_get_attachment_image( $usp['usp_image'], 'large' ) ?>
						</div>
					<?php } ?>
				</div>
			</div>
			<?php } ?>
		</div>
		<div class="grey-holder"></div>
	</div>
</section>
<!-- end our brands -->
