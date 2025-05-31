<?php
/*
Template Name: popular
*/
?>
<?php get_header(); ?>
<main>
    <section class="popular container">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => 'product',  // Тип записи
            // 'posts_per_page' => ,    // Количество записей (-1 означает все)
            'post_status' => 'publish', // Только опубликованные записи
            'paged' => $paged, // Текущая страница
        );
        $paged = get_query_var('page') ?: 1;

        $query = new WP_Query($args);
        ?>

        <h3>Популярная мебель</h3>
        <div class="popular-description">
            <p>Во всей нашей мебели используются лучшие материалы.Во всей нашей мебели используются лучшие
                материалы.
            </p>
            <div class="popular-description-nav">
                <?php
                // Вывод пагинации
                echo paginate_links(array(
                    'total' => $query->max_num_pages,
                    'current' => max(1, get_query_var('paged')),
                    'format' => '?paged=%#%',
                    'show_all' => false,
                    'end_size' => 0,
                    'mid_size' => 0,
                    'prev_text' => '<button class="popular-description-nav__btn popular-description-nav__btn--left"></button>', // Стрелка назад
                    'next_text' => '<button class="popular-description-nav__btn popular-description-nav__btn--right"></button>', // Стрелка вперед
                ));
                ?>
            </div>
        </div>

        <ul class="popular-card popular_page-card">
            <?php if ($query->have_posts()) : ?>

                <!-- цикл -->
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <li class="popular-card__item" id="<?php the_ID() ?>">
                        <a href="<?php the_permalink(); ?>">
                            <?php
                            the_post_thumbnail('full', [
                                'class' => 'popular-card__img',
                                'width' => '380',
                                'height' => '247',
                                'alt' => 'Фото популярной мебели',
                                'title' => 'Популярная мебель'
                            ]);
                            ?></a>
                        <div class="popular-card-container">
                            <a href="<?php the_permalink(); ?>">
                                <h4 class="popular-card__title"><?php the_title(); ?></h4>
                            </a>
                            <div class="popular-card__ico">
                                <a id="<?php the_ID() ?>" class="popular-card-like" href="#!"><img src="<?php bloginfo('template_url'); ?>/assets/images/card/heart.svg" alt="" width="10"
                                        height="10"></a>
                                <a href="#!"><img src="<?php bloginfo('template_url'); ?>/assets/images/card/share.svg" alt="" width="10" height="10"></a>
                            </div>
                            <div class="popular-card__price">
                                <?php
                                // Получаем цену из метаполя
                                $price = get_post_meta(get_the_ID(), '_product_price', true);

                                // Если цена существует, выводим её
                                if ($price) {
                                    echo esc_html($price) . ' ₽</p>';
                                } else {
                                    echo '<p>Отсутствует</p>';
                                }
                                ?>
                            </div>
                            <a href="#!" class="popular-card__btn btn">Купить</a>
                        </div>
                    </li>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php esc_html_e('Нет постов'); ?></p>
            <?php endif; ?>
        </ul>

    </section>
</main>
<?php get_template_part('/components/modal'); ?>
<?php get_footer(); ?>