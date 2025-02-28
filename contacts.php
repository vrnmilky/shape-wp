<?php
/*
Template Name: contacts
*/
?>
<?php get_header(); ?>
<main>
    <section class="contacts">
        <div class="container">
            <div class="contacts_city">
                <?php
                $terms = get_terms(array(
                    'taxonomy' => 'city',
                    'post_type' => 'address',  // Указываем тип записи, если это необходимо
                    'hide_empty' => false      // Показывать даже пустые термины (если нужно)
                ));

                // Проверяем, есть ли термины
                if (!empty($terms) && !is_wp_error($terms)) {
                    foreach ($terms as $term) {
                        echo '<div class="contacts_city_item contacts_msk">';
                        echo '<div class="contacts_city_title">' . esc_html($term->name) . '</div>';
                        echo '<div class="contacts_city_content">';
                        $args = array(
                            'post_type' => 'address',  // Тип записи
                            'post_status' => 'publish', // Только опубликованные записи
                            'tax_query'  => array(
                                array(
                                    'taxonomy' => 'city',
                                    'field'    => 'slug',
                                    'terms'    => $term
                                )
                            )
                        );
                        $query = new WP_Query($args);
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                $map = get_post_meta(get_the_ID(), '_map_field', true);
                                $phone = get_post_meta(get_the_ID(), '_phone_field', true);
                                $time = get_post_meta(get_the_ID(), '_time_field', true);
                                $address = get_the_title();
                                echo "<div class='contacts_city_map'>$map</div>";
                                the_post_thumbnail();
                                echo "<div class='contacts_city_address'>$address</div>";
                                echo "<div class='contacts_city_phone'>Номер телефона: <a href='tel:$phone'>$phone</a></div>";
                                echo "<div class='contacts_city_time'>$time</a></div>";
                            }
                        } else {
                            echo 'Адреса не найдены.';
                        }

                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo 'Города не найдены.';
                }
                ?>






            </div>
        </div>
    </section>
</main>

<?php get_template_part('/components/modal'); ?>
<?php get_footer(); ?>