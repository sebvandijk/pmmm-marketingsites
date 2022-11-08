<?php
/* Created by sebvandijk
  08/11/2022 - 14:02
*/
if ( isset( $args ) ) {
	$fields = $args;
}
?>
<section class="block our-brands">

    <label><?= $fields['label'] ?></label>
    <h2><?= $fields['title'] ?></h2>
    <div class="content">
		<?= $fields['content'] ?>
    </div>
	
	<?php
	if ( is_array( $fields['brands'] ) ) {
		?>
        <div class="brands">
			<?php
			foreach ( $fields['brands'] as $brand ) {
				$brand['brand_cta']['icon'] = 'arrow';
				?>
                <div class="brand">
					<?= wp_get_attachment_image( $brand['brand_logo'], 'small' ) ?>
                    <h3><?= $brand['brand_title'] ?></h3>
                    <p class="intro">
						<?= $brand['brand_intro'] ?>
                    </p>
					<?= button( $brand['brand_cta'] ) ?>
                </div>
				<?php
			}
			
			?>
        </div>
		<?php
	}
	
	?>

</section>