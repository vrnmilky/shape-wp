<section class="customers">
    <div class="container customers__container">
        <div class="customers__left">
            <img src="<?php bloginfo('template_url'); ?>/assets/images/costumers/1.jpg" alt="" width="460" height="493">
        </div>

        <div class="customers__right">
            <h2 class="customers__right-popular">Популярные новости</h2>


            <?php

            $args = array(
                'posts_per_page' => 10,
                'orderby' => 'comment_count',
            );
            // запрос
            $query = new WP_Query($args); ?>

            <?php if ($query->have_posts()) : ?>


                <!-- цикл -->

                <div class="news-slider">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="box">
                            <h3 class="customers__right-title"><?php the_title(); ?></h3>
                            <?php the_post_thumbnail(); ?>
                            <p class="customers__right-text"><?php the_excerpt_rss(); ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>

                <!-- конец цикла -->

                <?php wp_reset_postdata(); ?>
        </div>

    <?php else : ?>
        <p><?php esc_html_e('Нет постов по вашим критериям.'); ?></p>
    <?php endif; ?>

    </div>
    </div>
</section>

