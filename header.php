<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DudeShape</title>
    <?php wp_head(); ?>
    <!-- Подключение CSS Slick -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

    <!-- Подключение JS Slick -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>


</head>

<body>
    <header class="header">
        <div class="container">
            <nav class="nav">
                <div class="nav__container">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="nav__logo">DudeShape</a>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'nav__list',
                        'container_class' => 'menu__container',
                        'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                        'fallback_cb'    => false,
                    ));
                    ?>
                    <div class="nav__actions">
                        <a class="nav__actions--search" href="#!"><img src="<?php bloginfo('template_url'); ?>/assets/icons/loupe.svg" alt="Поиск"></a>
                        <a class="nav__actions--menu" href="#!"><span></span><span></span><span></span></a>
                    </div>
                </div>
            </nav>

        </div>

    </header>