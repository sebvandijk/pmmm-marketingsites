<?php
/**
 * The template for displaying the footer
 * Contains the closing of the #content div and all content after.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package pmmm-marketing
 */

// footer menu managed trough custom fields
$legal_menu = get_menu_items_by_registered_slug( 'footer_legal_menu' );
?>

</main><!-- started in header.php -->
<footer class="brand-bg" id="contact">

    <div class="legal row">
		<?php if ( $legal_menu ): ?>
            <nav class="nav nav--top" aria-label="Top navigation">
                <ul class="nav__list nav__list--main">
					<?php foreach ( $legal_menu as $item ): ?>
						<?php $target = $item->target ? 'target="_blank" rel="noopener"' : ''; ?>
                        <li class="nav__item">
                            <a class="nav__link" href="<?= $item->url ?>" <?= $target ?>>
								<?= $item->title ?>
                            </a>
                        </li>
					<?php endforeach ?>
                </ul>
            </nav>
		<?php endif; ?>

    </div>

</footer>

<?php wp_footer(); ?>

</body>
</html>