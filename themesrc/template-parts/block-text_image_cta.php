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
$image                        = wp_get_attachment_image( $fields['image'], 'large' );
$fields['cta_button']['icon'] = 'arrow';
?>
<section class="block text-image-cta">
	<?php debug( $fields ) ?>
	<?= $image ?>
</section>