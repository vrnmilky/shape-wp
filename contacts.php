<?php
/*
Template Name: contacts
*/
?>
<?php get_header(); ?>

<main>
    <div class="contacts">
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
                ?>

                        <div class="contacts_city_item">
                            <h1 class="contacts_city_title"><?php echo esc_html($term->name); ?></h1>
                            <div class="contacts_city_content">

                                <?php
                                $args = array(
                                    'post_type' => 'address',  // Тип записи
                                    'post_status' => 'publish', // Только опубликованные записи
                                    'tax_query'  => array(
                                        array(
                                            'taxonomy' => 'city',
                                            'field'    => 'slug',
                                            'terms'    => $term->slug // Используем slug термина
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
                                ?>

                                        <div class="contacts_city_block">
                                            <div class="contacts_city_map">
                                                <?php echo $map ?>
                                            </div>

                                            <div class="contacts_city_info">
                                                <h2 class="contacts_city_info-title">• Информация •</h2>
                                                <div class="contacts_city_hours">
                                                    <h3 class="contacts_city_subtitle">График работы:</h3>
                                                    <p><?php echo $time ?></p>
                                                </div>

                                                <div class="contacts_city_address">
                                                    <h3 class="contacts_city_subtitle">Адрес:</h3>
                                                    <p><?php echo $address ?></p>
                                                    <h3 class="contacts_city_subtitle">Контакты:</h3>
                                                    <p>
                                                        Телефон для связи:
                                                        <?php echo "<a href='tel:$phone'>$phone</a>" ?>
                                                    </p>
                                                </div>

                                                <?php
                                                if (has_post_thumbnail()) {
                                                    the_post_thumbnail(); // Выводим изображение с заданным размером
                                                } else {
                                                    echo '<img src="' . get_template_directory_uri() . '/assets/images/default-image-office.jpeg" alt="Заглушка" class="default-thumbnail">';
                                                }
                                                ?>
                                            </div>
                                        </div>

                                <?php
                                    }
                                } else {
                                    echo 'Адреса не найдены.';
                                }
                                ?>
                            </div>
                        </div>

                <?php
                    }
                } else {
                    echo 'Города не найдены.';
                }
                ?>



            </div>
        </div>
    </div>
</main>

<?php get_template_part('/components/modal'); ?>
<?php get_footer(); ?>