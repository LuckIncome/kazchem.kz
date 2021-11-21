<section class="page page_section page_section_inner">
    <div class="container">
        <div class="page_block">
            <div class="page_content">
                <ul class="breadcrumbs">
                    <li><a href="/<?=$lang?>">Главная</a></li>
                    <li><a href="/<?=$lang?>news">Новости</a></li>
                    <li><a><?=$data['News']['title']?></a></li>
                </ul>

                <div class="title title_left"><?=$data['News']['title']?></div>

                <div class="news_inner">
                    <div class="news_inner_img">
                        <img src="/img/news/<?=$data['News']['img']?>" alt="">
                    </div>

                    <div class="news_inner_text">
                        <div class="page_text text_item">
                            <?=$data['News']['body']?>
                        </div>
                        <div class="share_block">
                            <div class="share_text">Поделиться в соц. сетях:</div>
                            <script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                            <script src="https://yastatic.net/share2/share.js"></script>
                            <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,whatsapp,telegram"></div>
                        </div>
                    </div>
                </div>
                <!-- <div class="title small_title"><?=$data['News']['title']?></div> -->
            </div>
            
        </div>
    </div>
</section>
<!-- <section class="page">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="/">Главная</a></li>
                    <li><a>Новость Kazchem пример 1</a></li>
                </ul>
                <div class="title title_left">Новость Kazchem пример 1</div>

                <div class="news_inner">
                    <div class="news_inner_img">
                        <img src="img/inner_main.jpg" alt="">
                    </div>

                    <div class="news_inner_text">
                        <div class="page_text text_item">
                            <p>Специалисты отдела агрохимии и токсикологии Волгоградского филиала ФГБУ «Ростовский референтный центр Россельхознадзора» провели отбор образцов для проведения листовой диагностики уровня минерального питания томатов, выращиваемых на гидропонике в тепличном хозяйстве ООО «Агрофирма «Волжская», в фазу созревания первых плодов. Для диагностики отбирались листья с 50 растений с 5 яруса сверху на главном стебле.</p>
                            <p>Данные проведенного в Испытательной лаборатории филиала анализа показали, что макро- и микроэлементы содержатся в растениях на оптимальном уровне-параметре. Однако в результате анализа в образцах было также выявлено превышение норм содержания нитратного азота, на основе чего организации-заказчику выданы рекомендации по снижению концентрации азота в питательном растворе и внесении более оптимальных доз минеральных удобрений.</p>
                            <p>
                                <img src="img/inner_img.jpg" alt="">
                            </p>
                            <p>Специалисты отдела агрохимии и токсикологии Волгоградского филиала ФГБУ «Ростовский референтный центр Россельхознадзора» провели отбор образцов для проведения листовой диагностики уровня минерального питания томатов, выращиваемых на гидропонике в тепличном хозяйстве ООО «Агрофирма «Волжская», в фазу созревания первых плодов. Для диагностики отбирались листья с 50 растений с 5 яруса сверху на главном стебле.</p>
                            <p>Данные проведенного в Испытательной лаборатории филиала анализа показали, что макро- и микроэлементы содержатся в растениях на оптимальном уровне-параметре. Однако в результате анализа в образцах было также выявлено превышение норм содержания нитратного азота, на основе чего организации-заказчику выданы рекомендации по снижению концентрации азота в питательном растворе и внесении более оптимальных доз минеральных удобрений.</p>
                        </div>
                        <div class="share_block">
                            <div class="share_text">Поделиться в соц. сетях:</div>
                            <script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                            <script src="https://yastatic.net/share2/share.js"></script>
                            <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,whatsapp,telegram"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <section class="gray">
            <div class="container">
                <div class="small_title small_title_center">Другие новости</div>

                <?=$this->element('sidebar');?>

                <!-- <div class="news">
                    <div class="news_item">
                        <a class="part_img" href="news_inner.html">
                            <img src="img/news_1.png" alt="">
                        </a>
                        <a class="news_name" href="news_inner.html">Новость Kazchem пример 1</a>
                        <div class="text_item">
                            <p>С другой стороны, выбранный нами инновационный путь, в своём классическом представлении, допускает внедрение первоочередных требований.</p>
                        </div>
                        <a class="more_btn orange_btn" href="news_inner.html">Подробнее</a>
                    </div>
                    <div class="news_item">
                        <a class="part_img" href="news_inner.html">
                            <img src="img/news_2.png" alt="">
                        </a>
                        <a class="news_name" href="news_inner.html">Новость Kazchem пример 2</a>
                        <div class="text_item">
                            <p>С другой стороны, выбранный нами инновационный путь, в своём классическом представлении, допускает внедрение первоочередных требований.</p>
                        </div>
                        <a class="more_btn orange_btn" href="news_inner.html">Подробнее</a>
                    </div>
                    <div class="news_item">
                        <a class="part_img" href="javscript:;">
                            <img src="img/news_3.png" alt="">
                        </a>
                        <a class="news_name" href="javascript:;">Новость Kazchem пример 3</a>
                        <div class="text_item">
                            <p>С другой стороны, выбранный нами инновационный путь, в своём классическом представлении, допускает внедрение первоочередных требований.</p>
                        </div>
                        <a class="more_btn orange_btn" href="javascript:;">Подробнее</a>
                    </div>
                </div> -->
            </div>
        </section>
