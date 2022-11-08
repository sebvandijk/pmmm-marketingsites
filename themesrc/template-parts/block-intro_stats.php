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
<section class="block intro-stats">
	
	
	<?= button( $fields['cta1_color'], 'brand' ) ?>
	<?= button( $fields['cta2_link'], 'naked' ) ?>
	
	<?= $image ?>
	<?php
	if ( is_array( $fields['stat'] ) ) { ?>
        <div class="stats-container">
		<?= $fields['stats_label'] ?>
		<?php
		foreach ( $fields['stat'] as $stat ) {
			?>
            <div class="stat">
                <span class="number"><?= $stat['number'] ?></span><?= $stat['plus'] ? '<sup>+</sup>' : false ?>
            </div>
            <div class="label">
				<?= $stat['label'] ?>
            </div>
			
			<?php
		}
		?>
        </div><?php
	}
	
	?>
	<?php debug( $fields ) ?>

</section>