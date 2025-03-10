<?php
// Если комментарии включены и есть хотя бы один комментарий
if (have_comments()) : ?>

    <ul class="news_comment-list">
        <?php
        // Выводим список комментариев
        wp_list_comments(array(
            'style'      => 'li', // Стиль вывода комментариев (ul или ol)
            'avatar_size' => 60,   // Размер аватара
        ));
        ?>
    </ul>

<?php

elseif (comments_open()) : ?>
    <p class="news_no-comments"><?php _e('Будьте первым, кто оставит комментарий!', 'textdomain'); ?></p>

<?php

else : ?>
    <p class="news_no-comments"><?php _e('Комментарии закрыты для этой записи.', 'textdomain'); ?></p>
<?php endif; ?>

<!-- Форма добавления комментария -->