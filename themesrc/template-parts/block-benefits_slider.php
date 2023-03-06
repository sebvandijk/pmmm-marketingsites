<?php
/* Created by sebvandijk
  08/11/2022 - 14:02
*/
if ( isset( $args ) ) {
	$fields = $args;
}
?>

<!-- benefits slider -->
<section class="block benefits-slider">
	<div class="circle-bg"></div>
	<div class="inner centered">
		<h6><?= $fields['label'] ?></h6>
		<h2><?= $fields['title'] ?></h2>
		<div class="content">
		<?= $fields['content'] ?>
		</div>
	</div>
	<div class="inner mobileDoThings">
	<?php if ( is_array( $fields['benefits'] ) ) { ?>
  	<div class="benefits row">
		<?php foreach ( $fields['benefits'] as $benefit ) { $benefit['benefit_cta']['icon'] = 'arrow'; ?>
    	<div class="benefit">
				<div class="image-holder"><?= wp_get_attachment_image( $benefit['benefit_icon'], 'small' ) ?></div>
  			<h5><?= $benefit['benefit_title'] ?></h5>
        <p class="intro">
					<?= $benefit['benefit_intro'] ?>
        </p>
      </div>
			<?php } ?>
    </div>
		<?php } ?>
	</div>
</section>
<!-- end our brands -->
