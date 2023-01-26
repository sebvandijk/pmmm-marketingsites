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
    <script>
        window.markerConfig = {
            project: '63d2347bd3d532a8f8336f00',
            source: 'snippet'
        };
    </script>

    <script>
        !function (e, r, a) {
            if (!e.__Marker) {
                e.__Marker = {};
                var t = [], n = {__cs: t};
                ["show", "hide", "isVisible", "capture", "cancelCapture", "unload", "reload", "isExtensionInstalled", "setReporter", "setCustomData", "on", "off"].forEach(function (e) {
                    n[e] = function () {
                        var r = Array.prototype.slice.call(arguments);
                        r.unshift(e), t.push(r)
                    }
                }), e.Marker = n;
                var s = r.createElement("script");
                s.async = 1, s.src = "https://edge.marker.io/latest/shim.js";
                var i = r.getElementsByTagName("script")[0];
                i.parentNode.insertBefore(s, i)
            }
        }(window, document);
    </script>
	
	
	<?php wp_head(); ?>
</head>
<body <?php body_class( ! is_front_page() ? 'subpage' : '' ); ?>>

<?php
$main_menu = get_menu_items_by_registered_slug( 'header_menu' );
?>
<header class="header" id="header">
    <div class="header__outer">

        <div class="header__inner row">
            <div class="header__logo column">
                <a href="<?= home_url() ?>">
                    <span class="sr-only">Homepage</span>
                    <div class="big"><?= svg( 'pmmm-marketing' ) ?></div>

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
								<?php $active = checkActive( $item->object_id ) ? 'active' : ''; ?>
								<?php $target = $item->target ? 'target="_blank" rel="noopener"' : ''; ?>
                                <li class="nav__item <?= $active ?>">
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


    <!-- <header class="header">
		<div class="header__container _container">
			<a href="#" class="header__logo">Menu JS</a>
			<div class="header__menu menu">
				<div class="menu__icon">
					<span></span>
				</div>
				<nav class="menu__body">
					<ul class="menu__list">
						<li><a data-goto=".page__section_1" href="#" class="menu__link active">Section 1</a></li>
						<li><a data-goto=".page__section_2" href="#" class="menu__link">Section 2</a></li>
						<li><a data-goto=".page__section_3" href="#" class="menu__link">Section 3</a></li>
						<li><a data-goto=".page__section_4" href="#" class="menu__link">Section 4</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header> -->