<?php

?>


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
            <a class="popular-description-nav__btn" href="<?php echo get_permalink(get_page_by_path('popular')); ?>">
                <img src="<?php bloginfo('template_url'); ?>/assets/images/arrow1.svg" alt="" width="16" height="16">
            </a>
        </div>
    </div>
    <ul class="popular-card">

        <?php
        global $post;
        $myposts = get_posts([
            'numberposts' => $countProduct,
            'category_name'    => 'Популярное',
        ]);

        if ($myposts) {
            foreach ($myposts as $post) {
                setup_postdata($post);
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
                            <?php the_content(); ?>
                        </div>
                        <a href="#!" class="popular-card__btn btn">Купить</a>
                    </div>
                </li>


        <?php
            }
        }

        wp_reset_postdata(); // Сбрасываем $post
        ?>

    </ul>
</section>