<footer class="footer">


    <div class="container">
        <nav class="footer-nav">

            <ul class="footer-first footer-list">
                <li class="footer-item footer-title"><a href="#!" class="footer-nav__logo">DudeShape</a></li>
                <li class="footer-item"><a href="#!">Lorem ipsum dolor sit amet, conse <br>
                        ctetur adipiscing elit, sed eiusmod <br> tempor incididunt ut labore .</a></li>
                <li class="footer-item footer-subtitle">Мы в соц. сетях:</li>
                <li class="footer-item footer-social">
                    <a href="#!"><img src="<?php bloginfo('template_url'); ?>/assets/images/footer/face.png" alt="" width="20" height="20"></a>
                    <a href="#!"><img src="<?php bloginfo('template_url'); ?>/assets/images/footer/twit.png" alt="" width="20" height="20"></a>
                    <a href="#!"><img src="<?php bloginfo('template_url'); ?>/assets/images/footer/inst.png" alt="" width="20" height="20"></a>
                    <a href="#!"><img src="<?php bloginfo('template_url'); ?>/assets/images/footer/you.png" alt="" width="20" height="20"></a>
                </li>
            </ul>



            <ul class="footer-tour footer-list">
                <li class="footer-item footer-title">Виртуальный тур</li>
                <li class="footer-item"><a href="#!">Функции</a></li>
                <li class="footer-item"><a href="#!">Цены</a></li>
                <li class="footer-item"><a href="#!">Продукция</a></li>
                <li class="footer-item"><a href="#!">Поддрежка</a></li>
            </ul>

            <ul class="footer-company footer-list">
                <li class="footer-item footer-title">Наша компания</li>
                <li class="footer-item"><a href="#!">О нас</a></li>
                <li class="footer-item"><a href="#!">Блог</a></li>
                <li class="footer-item"><a href="#!">СМИ</a></li>
                <li class="footer-item"><a href="#!">Обратная связь</a></li>
            </ul>


            <ul class="footer-sub footer-list">
                <li class="footer-item footer-title">Подписаться</li>
                <li class="footer-item footer-item-text">Подпишитесь, чтобы быть <br> вкурсе последних<br> новостей
                </li>
                <li class="footer-item">
                    <form class="footer-sub-form">
                        <input class="footer-sub-form__input" type="email" placeholder="Email Address">
                        <button class="footer-sub-form__btn"><img src="<?php bloginfo('template_url'); ?>/assets/images/footer/arrow.svg"
                                alt=""></button>
                    </form></a>
                </li>
            </ul>
        </nav>


    </div>
    <div class="footer-copy">
        Copyright @ 2025. Crafted with love.
    </div>
</footer>


<script type="text/javascript">
    $(document).ready(function(){
        $('.news-slider').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 5000,
            arrows: true,
            dots: true
        });
    });
</script>

<?php wp_footer(); ?> 
</body>

</html>