<?php
/* Created by sebvandijk
  08/11/2022 - 14:39
*/

if ( isset( $args ) ) {
	$fields = $args;
}
$image                         = wp_get_attachment_image( $fields['image'], 'medium' );
$fields['contact_cta']['icon'] = 'arrow';

if ( isset( $fields['show_block'] ) && $fields['show_block'] == 'no' ) {
	return;
}
?>

<section class="block contact">
    <div class="inner">
        <div class="row">
            <div class="image-holder">
				<?= $image ?>
            </div>
            <h5><?= $fields['content'] ?></h5>
			<?= button( $fields['contact_cta'], 'brand' ) ?>
        </div>
    </div>
</section>
