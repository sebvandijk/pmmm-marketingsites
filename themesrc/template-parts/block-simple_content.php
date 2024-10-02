<?php
/* Created by sebvandijk
08/11/2022 - 14:02
*/
if ( isset( $args ) ) {
	$fields = $args;
}
?>

<!-- simple content -->
<section id="buy" class="block simple-content">
	<?php $side = $fields['side_content'];
	if ( ! empty ( $side ) ) { ?>
    <div class="inner centered withSide">
        <div class="side_content">
			<?= $fields['side_content'] ?>
        </div>
        <div class="content withSide">
			<?php } ?>
			<?php $side = $fields['side_content'];
			if ( empty ( $side ) ) { ?>
            <div class="inner centered">
                <div class="content">
					<?php } ?>
					<?php
					$content = $fields['simple_content'];
					// the content filter
					$content = apply_filters( 'the_content', $content );
					echo $content;
					?>
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
					} ?>
                    <!-- end table -->
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
                </div>
            </div>
</section>
<!-- end simple content -->
