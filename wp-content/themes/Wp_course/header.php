<!Doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="header">
    <div class="header_top">
        <img src="assets/img/lines.png" alt="">
    </div>
    <div class="header_content">
        <div class="container">
            <div class="header_content-inner">
                <div class="header_logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="assets/img/logo.png" alt="">
                    </a>
                </div>
                <nav class="menu">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id' => 'primary-menu',
                        )
                    );
                    ?>
                </nav>
            </div>
        </div>
    </div>
</header>
