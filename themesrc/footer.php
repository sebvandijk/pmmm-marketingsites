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

<!-- footer -->
<footer class="dark-bg" id="contact">
  <div class="inner">
    <a class="logo" href="<?= home_url() ?>">
      <span class="sr-only">Homepage</span>
      <div class="big"><?= svg( 'maxus-media' ) ?></div>
    </a>
    <?php if ( $legal_menu ): ?>
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
    <?php endif; ?>
  </div>
</footer>
<!-- end footer -->

<?php wp_footer(); ?>

</body>
</html>
