<?php get_header(); ?>

<main>
    <div class="container">
        <?php if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <div class="news_full">
                    <h1 class="news_full__title"><?php the_title(); ?></h1>
                    <div class="news_full__post">
                        <?php the_content(); ?>
                    </div>
                    <div class="news_full__info">
                        <p>Автор: <span><b><?php the_author(); ?></b></span></p>
                        <p><span><?php echo get_the_date(); ?></span></p>
                    </div>
                </div>
        <?php endwhile;
        endif; ?>
        <ul class="news_comment-list">
            <?php comments_template('/comments-news.php'); ?>
        </ul>
        <div class="news_comment-form">
            <?php
            if (comments_open() || get_comments_number()) {
                comment_form();
            }
            ?>
        </div>
</main>

<?php get_footer(); ?>