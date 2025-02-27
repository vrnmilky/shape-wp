<section class="trusted">
    <h2 class="trusted__title">
        Доверяют 20,000+ компаний
    </h2>


    <?php
    $query = new WP_Query([
        'post_type' => 'partners',
        'posts_per_page' => 6,
        'order'    => 'ASC'
    ]);
    if ($query->have_posts()) {
        echo '<ul class="trusted__row">';
        while ($query->have_posts()) {
            $query->the_post();
            echo '<li>';
            the_post_thumbnail();
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo 'Постов нету!';
    }

    wp_reset_postdata();
    ?>
</section>