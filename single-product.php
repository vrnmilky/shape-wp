<?php get_header(); ?>

<main>
    <section class="product-detail">
        <div class="container">
            <div class="product-detail-container">
                <div class="product-detail-left">
                    <?php the_post_thumbnail(); ?>
                </div>
                <div class="product-detail-right">
                    <h1 class="product-detail-title"><?php the_title(); ?></h1>
                    <?php
                    // Вывод описания
                    $description = get_post_meta($post->ID, '_product_description', true);
                    if ($description) {
                        echo '<p class="product-detail-text">' . esc_html($description) . '</p>';
                    } else {
                        echo '<p class="product-detail-text">Описание отсутствует</p>';
                    }
                    ?>
                    <?php
                    $price = get_post_meta(get_the_ID(), '_product_price', true);
                    if ($price) {
                        echo '<div class="product-detail-price popular-card__price">' . '<div><span>Цена: </span>' . esc_html($price) . ' ₽' . '</div>' . '<a href="#!" class="popular-card__btn btn">Купить</a>' . '</div>';
                    } else {
                        echo '<p>Отсутствует</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_template_part('/components/modal'); ?>

<?php get_footer(); ?>