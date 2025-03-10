<?php
// Если комментарии включены и есть хотя бы один комментарий
if (have_comments()) : ?>
    <h2 class="comments-title">
        <?php
        // Выводим количество комментариев
        printf(
            _n('Один комментарий', '%1$s комментариев', get_comments_number(), 'textdomain'),
            number_format_i18n(get_comments_number())
        );
        ?>
    </h2>

    <ul class="comment-list">
        <?php
        // Выводим список комментариев
        wp_list_comments(array(
            'style'      => 'ul', // Стиль вывода комментариев (ul или ol)
            'short_ping' => true,  // Включение коротких ответов на комментарии (pingbacks)
            'avatar_size' => 50,   // Размер аватара
        ));
        ?>
    </ul>

    <?php
    // Проверяем, есть ли пагинация для комментариев
    if (get_comment_pages_count() > 1 && get_option('page_comments')) :
    ?>
        <nav class="comment-navigation" role="navigation">
            <h2 class="screen-reader-text"><?php _e('Навигация по комментариям', 'textdomain'); ?></h2>
            <div class="nav-previous"><?php previous_comments_link(__('&larr; Старые комментарии', 'textdomain')); ?></div>
            <div class="nav-next"><?php next_comments_link(__('Новые комментарии &rarr;', 'textdomain')); ?></div>
        </nav>
    <?php endif; // Проверка на пагинацию комментариев

// Если комментариев нет и разрешены комментарии
elseif (comments_open()) : ?>
    <p class="no-comments"><?php _e('Будьте первым, кто оставит комментарий!', 'textdomain'); ?></p>

<?php
// Если комментарии закрыты
else : ?>
    <p class="no-comments"><?php _e('Комментарии закрыты для этой записи.', 'textdomain'); ?></p>
<?php endif; ?>

<!-- Форма добавления комментария -->
<?php if (comments_open()) : ?>
    <div id="respond" class="comment-respond">
        <h3 id="reply-title" class="comment-reply-title"><?php comment_form_title(); ?>
            <small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;"><?php _e('Отменить ответ', 'textdomain'); ?></a></small>
        </h3>

        <?php
        // Показываем форму для добавления комментария
        comment_form(array(
            'title_reply' => __('Оставить комментарий', 'textdomain'),
            'label_submit' => __('Отправить комментарий', 'textdomain'),
        ));
        ?>
    </div>
<?php endif; ?>