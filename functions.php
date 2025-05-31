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


add_action('wp_ajax_count_product', 'count_product');
add_action('wp_ajax_nopriv_count_product', 'count_product');

function count_product()
{
    $countProduct = intval($_POST['size']);
    echo $countProduct;
    wp_die();
}


function remove_empty_paragraphs($content)
{
    $content = preg_replace('/<p>\s*<\/p>/i', '', $content);
    return $content;
}
add_filter('the_content', 'remove_empty_paragraphs');


function custom_comment_form($args)
{
    $args['title_reply'] = 'Оставьте комментарий';
    $args['label_submit'] = 'Отправить';

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
    $args['author_field'] = '<p class="comment-form-author"><label for="author">Ваше имя </label><input id="author" name="author" type="text" value="" size="30" /></p>';
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






function mytheme_comment( $comment, $args, $depth ) {
    $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
    $add_below = ( 'div' === $args['style'] ) ? 'comment' : 'div-comment';
    $classes = 'news_comment-item ' . comment_class( empty( $args['has_children'] ) ? '' : 'parent', null, null, false );
    ?>

    <<?php echo $tag; ?> class='<?php echo $classes; ?>' id='comment-<?php comment_ID(); ?>'>
        <div class='news_comment-avatar'>
            <?php if ( $args['avatar_size'] != 0 ) {
                echo get_avatar( $comment, $args['avatar_size'] );
            } ?>
        </div>
        <div class='news_comment-content'>
            <div class='news_comment-info'>
                <div class='news_comment-name'>
                    <?php printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() ); ?>
                </div>
                <div class='news_comment-date'>
                    <a href='<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>'>
                        <?php
                        printf(
                            __( '%1$s at %2$s' ),
                            get_comment_date(),
                            get_comment_time()
                        ); ?>
                    </a>
                </div>
            </div>

            <?php if ( $comment->comment_approved == '0' ) { ?>
                <em class='comment-awaiting-moderation'>
                    <?php _e( 'Your comment is awaiting moderation.' ); ?>
                </em><br/>
            <?php } ?>

            <div class='news_comment-text'>
                <?php comment_text(); ?>
            </div>

            <div class='news_comment-nav'>
                <ul>
                    <li><?php edit_comment_link( __( 'Редактировать' ), '  ', '' ); ?></li>
                    <li>
                        <?php
                        comment_reply_link(
                            array_merge(
                                $args,
                                array(
                                    'add_below' => $add_below,
                                    'depth'     => $depth,
                                    'max_depth' => $args['max_depth']
                                )
                            )
                        ); ?>
                    </li>
                </ul>
            </div>
        </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </<?php echo $tag; ?>>
    <?php endif;
}


//нужное количество слов
function custom_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'custom_excerpt_length');


function custom_excerpt_more($more) {
    return '... <a class="read_more" href="' . get_permalink() . '">Читать далее</a>';
}
add_filter('excerpt_more', 'custom_excerpt_more');



