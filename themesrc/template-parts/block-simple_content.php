<?php
/* Created by sebvandijk
08/11/2022 - 14:02
*/
if ( isset( $args ) ) {
	$fields = $args;
}
?>

<!-- simple content -->
<section class="block simple-content">
	<div class="inner centered">
		<div class="content">
			<?= $fields['simple_content'] ?>
			<?php if ( is_array( $fields['ad_sizes'] ) ) { ?>
				<!-- size container -->
				<div class="size-container">
					<?php foreach ( $fields['ad_sizes'] as $ad_size ) { ?>
						<div class="size">
							<h5 class="title"><strong><?= $ad_size['title'] ?></strong></h5>
							<div class="image-holder"><?= wp_get_attachment_image( $ad_size['ad_image'], 'large' ) ?></div>
							<div class="content">
								<?= $ad_size['content'] ?>
							</div>
						</div>
					<?php } ?>
				</div>
				<!-- end size container -->
			<?php } ?>
			<!-- table -->
			<?php $table = $fields['table_name'];
			if ( ! empty ( $table ) ) {

				echo '<table border="0">';

				if ( ! empty( $table['caption'] ) ) {

					echo '<caption>' . $table['caption'] . '</caption>';
				}

				if ( ! empty( $table['header'] ) ) {

					echo '<thead>';

					echo '<tr>';

					foreach ( $table['header'] as $th ) {

						echo '<th>';
						echo $th['c'];
						echo '</th>';
					}

					echo '</tr>';

					echo '</thead>';
				}

				echo '<tbody>';

				foreach ( $table['body'] as $tr ) {

					echo '<tr>';

					foreach ( $tr as $td ) {

						echo '<td>';
						echo $td['c'];
						echo '</td>';
					}

					echo '</tr>';
				}

				echo '</tbody>';

				echo '</table>';
			}?>
			<!-- end table -->
		</div>
	</div>
</section>
<!-- end simple content -->

<pre style="background: black;">
<?php
debug( $fields )
?>
</pre>
