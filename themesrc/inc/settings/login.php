<?php
function wpb_login_logo() { ?>
    <style>
        body {
            background-color: #E2EBEE !important;
        }

        /* Medium Devices, Desktops */
        @media only screen and (min-width: 992px) {
            #login {


            }
        }


        #login #nav a, #login #backtoblog a {
            color: #1C1E25;
        }

        #login h1 a, .login h1 a {
            background-image: url('<?php echo get_stylesheet_directory_uri()?>/assets/svg/pmmm-marketing.svg');
            height: 100px;
            width: 300px;
            background-size: contain;
            background-position: bottom;
            background-repeat: no-repeat;

            padding-bottom: 10px;
        }
    </style>
<?php }

add_action( 'login_enqueue_scripts', 'wpb_login_logo' );