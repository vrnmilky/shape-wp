<?php
/*
Template Name: Особенности
*/
?>
<?php get_header(); ?>
<main>
<section class="popular container">
    <h3>Популярная мебель</h3>
    <div class="popular-description">
        <p>Во всей нашей мебели используются лучшие материалы.Во всей нашей мебели используются лучшие
            материалы.
        </p>
        <div class="popular-description-nav">
            <button class="popular-description-nav__btn">
                <img src="<?php bloginfo('template_url'); ?>/assets/images/arrow2.svg" alt="" width="16" height="16">
            </button>
            <button class="popular-description-nav__btn">
                <img src="<?php bloginfo('template_url'); ?>/assets/images/arrow1.svg" alt="" width="16" height="16">
            </button>
        </div>
    </div>
    <ul class="popular-card">

    <?php

    $countProduct = 2;

    $args = array(
        'post_type' => 'product',  // Тип записи
        'posts_per_page' => $countProduct,    // Количество записей (-1 означает все)
        'post_status' => 'publish' // Только опубликованные записи
    );

    $query = new WP_Query( $args );
    if ( $query->have_posts() ) : 
        while ( $query->have_posts() ) : $query->the_post();
        ?>

                <li class="popular-card__item" id="<?php the_ID() ?>">
                    <?php
                    the_post_thumbnail('full', [
                        'class' => 'popular-card__img',
                        'width' => '380',
                        'height' => '247',
                    ]);
                    ?>
                    <div class="popular-card-container">
                        <h4 class="popular-card__title"><?php the_title(); ?></h4>
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


                <?php 
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>Товары не найдены.</p>';
    endif;
    ?>
    </ul>
</section>
</main>
<?php get_template_part('/components/modal'); ?>
<?php get_footer(); ?>