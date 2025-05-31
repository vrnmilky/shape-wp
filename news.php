<?php
/*
Template Name: news
*/
?>
<?php get_header(); ?>






<main>

    <div class="container">


        <?php
        $args = array(
            'posts_per_page' => -1,
            'orderby' => 'comment_count'
        );

        $query = new WP_Query($args);

        // Цикл
        if ($query->have_posts()) {
            echo '<div class="container-news">';
            while ($query->have_posts()) {
                $query->the_post();
        ?>
                <div class="news">
                    <h2 class="news-title"><?php the_title(); ?></h2>
                    <?php the_post_thumbnail(); ?>
                    <p class="news-text">
                        <?php the_excerpt_rss(); ?>
                    </p>
                </div>
        <?php
            }
            echo '</div>';
        } else {
            // Постов не найдено
        }

        // Возвращаем оригинальные данные поста. Сбрасываем $post.
        wp_reset_postdata();
        ?>





    </div>
</main>

<?php get_template_part('/components/modal'); ?>
<?php get_footer(); ?>