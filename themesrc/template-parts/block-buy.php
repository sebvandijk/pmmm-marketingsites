<?php
/* Created by sebvandijk
  08/11/2022 - 14:02
*/
if ( isset( $args ) ) {
	$fields = $args;
}
?>

<!-- buy -->
<section id="buy" class="block buy">
	<div class="inner centered">
		<h6><?= $fields['label'] ?></h6>
		<h2><?= $fields['title'] ?></h2>
		<div class="content">
		<?= $fields['content'] ?>
		</div>
	</div>

	<?php if ( is_array( $fields['package'] ) ) { ?>
  <div class="packages row">
		<?php foreach ( $fields['package'] as $singlepackage ) { $singlepackage['package_cta']['icon'] = 'arrow'; ?>
		<?php $selected = $singlepackage['most_chosen'];
		if( $selected && in_array('yes', $selected) ): ?>
		<div class="package selected">
		<?php else : ?>
		<div class="package">

		<?php endif; ?>
			<h5><?= $singlepackage['package_title'] ?></h5>
			<div class="package-price">
				<span class="price"><?= $singlepackage['package_price'] ?></span>
				<span class="amount"><?= $singlepackage['package_amount'] ?></span>
			</div>
			<?php foreach ( $singlepackage['package_line'] as $package_line ) { ?>
			<div class="package_line">
				<span class="left"><?= $package_line['left'] ?></span>
				<span class="right"><?= $package_line['right'] ?></span>
			</div>
			<?php } ?>
			<?= button( $singlepackage['package_cta'], 'brand-ghost' ) ?>
    </div>
		<?php } ?>
  </div>
	<?php } ?>
	<?php if ($fields['additional_content']): ?>
	<div class="inner centered additional">
		<div class="content">
			<?= $fields['additional_content'] ?>
		</div>
	</div>
	<?php endif; ?>

</section>
<!-- end buy -->
