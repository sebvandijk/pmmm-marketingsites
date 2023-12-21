<?php
/**
* The header for our theme
* This is the template that displays all of the <head> section and everything up until <div id="content">
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
* @package pmmm-marketing
*/
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>

  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <link rel="apple-touch-icon" sizes="152x152"
  href="<?= get_template_directory_uri() ?>/assets/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32"
  href="<?= get_template_directory_uri() ?>/assets/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16"
  href="<?= get_template_directory_uri() ?>/assets/favicons/favicon-16x16.png">
  <link rel="manifest" href="<?= get_template_directory_uri() ?>/assets/favicons/site.webmanifest">
  <link rel="mask-icon" href="<?= get_template_directory_uri() ?>/assets/favicons/safari-pinned-tab.svg"
  color="#f5f5f5">
  <meta name="msapplication-TileColor" content="#f5f5f5">
  <meta name="theme-color" content="#f5f5f5">
  <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
  />

  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-MJWMXXF');</script>
  <!-- End Google Tag Manager -->

  <?php wp_head(); ?>
</head>
<body <?php body_class( ! is_front_page() ? 'subpage' : '' ); ?>>

  <?php
  $main_menu = get_menu_items_by_registered_slug( 'header_menu' );
  ?>
  <header class="header" id="header">
    <div class="header__outer">
      <div class="container"></div>

      <div class="header__inner row">
        <div class="header__logo column">
          <a href="<?= home_url() ?>">
            <span class="sr-only">Homepage</span>
            <div class="big"><?= svg( 'maxus-media' ) ?></div>
          </a>
        </div>
        <div class="header__nav column">
          <div class="menu__icon">
            <span></span>
          </div>
          <?php if ( $main_menu ): ?>
            <nav class="nav nav--top" aria-label="Top navigation">
              <ul class="nav__list nav__list--main">
                <?php foreach ( $main_menu as $item ):
                  if ( is_array( $item->classes ) ) {
                    $classes = implode( ' ', $item->classes );
                  } else {
                    $classes = false;
                  }
                  ?>
                  <?php $target = $item->target ? 'target="_blank" rel="noopener"' : ''; ?>
                  <li class="nav__item">
                    <a class="nav__link <?= $classes ?>"
                      href="<?= $item->url ?>" <?= $target ?>>
                      <?= $item->title ?>
                    </a>
                  </li>
                <?php endforeach ?>
              </ul>
            </nav>
          <?php endif; ?>
        </div>

      </div>
    </div>
  </header>
  <main id="main">
