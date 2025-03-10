<?php

add_action('wp_head', 'myajax_data', 8);
function myajax_data()
{
    $data = [
        'url' => admin_url('admin-ajax.php'),
    ];
?>
    <script id="myajax_data">
        myajax = <?= wp_json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>
    </script>
<?php
}


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
    wp_enqueue_script('like', get_template_directory_uri() . '/js/like.js', array(), '1.0.0', true);
    wp_enqueue_script('modal', get_template_directory_uri() . '/js/modal.js', array(), '1.0.0', true);
    wp_enqueue_script('phoneFormat', get_template_directory_uri() . '/js/phoneFormat.js', array(), '1.0.0', true);
    wp_enqueue_script('popularPost', get_template_directory_uri() . '/js/popularPost.js', array(), '1.0.0', true);
    wp_enqueue_script('contactsPage', get_template_directory_uri() . '/js/contactsPage.js', array(), '1.0.0', true);

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

// http://localhost:8080/wp-admin/admin-ajax.php?action=count_product?size=1

add_action('wp_ajax_count_product', 'count_product');
add_action('wp_ajax_nopriv_count_product', 'count_product');

function count_product()
{
    $countProduct = intval($_POST['size']);
    echo $countProduct;
    wp_die();
}


// Удалить пустые P
function remove_empty_paragraphs($content)
{
    // Удаляет пустые <p></p>
    $content = preg_replace('/<p>\s*<\/p>/i', '', $content);
    return $content;
}
add_filter('the_content', 'remove_empty_paragraphs');


function custom_comment_form($args)
{
    // Изменим стандартные аргументы
    $args['title_reply'] = 'Оставьте комментарий';
    $args['label_submit'] = 'Отправить';

    // Стилизация отдельных полей
    $args['comment_field'] =
        '<p class="news_comment_form-comment">
            <label for="comment" class="news_comment_form-label">Ваш комментарий:</label>
            <textarea
              id="comment"
              name="comment"
              aria-required="true"
              class="news_comment_form-text"
            ></textarea>
          </p>';
    $args['author_field'] = '<p class="comment-form-author"><label for="author">Ваше имя</label><input id="author" name="author" type="text" value="" size="30" /></p>';
    $args['email_field'] = '<p class="comment-form-email"><label for="email">Ваш email</label><input id="email" name="email" type="email" value="" size="30" /></p>';
    return $args;
}
add_filter('comment_form_defaults', 'custom_comment_form');

add_filter('comment_form_default_fields', 'comment_form_default_add_my_fields');
function comment_form_default_add_my_fields($fields)
{
    unset($fields['url']);

    return $fields;
}
