<?php
/* Created by sebvandijk
08/11/2022 - 13:23
*/

if ( isset( $args ) ) {
	$fields = $args;
}
?>

<!-- intro -->
<section class="block intro intro--brands introduction simple-intro">
	<div class="inner">
		<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
		}
		?>
		<h1><?= $fields['title'] ?></h1>
		<h2><?= $fields['subtitle'] ?></h2>
		<div class="content">
			<p class="large"><?= $fields['intro'] ?></p>
		</div>
	</div>
</section>
<!-- end intro -->
