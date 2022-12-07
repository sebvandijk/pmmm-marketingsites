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
		<?php
		$table = $fields['table_name'];

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
		</div>
	</div>
</section>
<!-- end simple content -->
