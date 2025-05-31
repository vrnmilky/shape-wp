<?php
if (have_comments()) :
    wp_list_comments(array(
        'callback' => 'mytheme_comment',
        'avatar_size' => '60'

    ));
else :
?>
    <p class="news_comment-text">Комментарии отсутствуют</p>
<?php
endif;
?>