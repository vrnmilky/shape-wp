<?php
add_action('wp_enqueue_scripts', 'theme_name_scripts');
function theme_name_scripts()
{

    // Подключаем основной CSS файл
    wp_enqueue_style('main', get_template_directory_uri() . '/styles/main.css');


    $custom_font_css = "
        @font-face {
            font-family: 'Open Sans';
            src: url('" . get_template_directory_uri() . "/assets/fonts/OpenSans-Medium.woff2') format('woff2');
            font-weight: 500;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Montserrat';
            src: url('" . get_template_directory_uri() . "/assets/fonts/Montserrat-Bold.woff2') format('woff2');
            font-weight: bold;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Open Sans';
            src: url('" . get_template_directory_uri() . "/assets/fonts/OpenSans-Regular.woff2') format('woff2');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }
        @font-face {
            font-family: 'Open Sans';
            src: url('" . get_template_directory_uri() . "/assets/fonts/OpenSans-Bold.woff2') format('woff2');
            font-weight: 700;
            font-style: normal;
            font-display: swap;
        }
    ";
    wp_add_inline_style('main', $custom_font_css);


    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);

    // Массив с изображениями для мебели
    $images = array(
        'Гостинная' => get_template_directory_uri() . '/assets/images/furniture/living-room.jpg',
        'Кухня' => get_template_directory_uri() . '/assets/images/furniture/kitchen.jpg',
        'Столовая' => get_template_directory_uri() . '/assets/images/furniture/dining-room.jpg',
        'Офис' => get_template_directory_uri() . '/assets/images/furniture/office.jpg',
        'Спальня' => get_template_directory_uri() . '/assets/images/furniture/bed-room.jpg',
        'Прихожая' => get_template_directory_uri() . '/assets/images/furniture/hallway.jpg',
    );

    wp_localize_script('main', 'images', $images);
}


function my_theme_setup()
{
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'shape'), // Регистрируем основное меню
    ));
}
add_action('after_setup_theme', 'my_theme_setup');


add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('custom-logo ');
?>