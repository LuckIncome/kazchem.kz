<section class="page">
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="/">Главная</a></li>
            <li><a  href="/services">Услуги</a></li>
            <li><a><?=$data['Service']['title']?></a></li>
        </ul>
        <div class="page_inner">
            <div class="page_title center_title"><?=$data['Service']['title']?></div>
            <div class="page_top services_top">
                <div class="share_block">
                    <div class="share_text">Поделиться в соц. сетях:</div>
                    <div class="share_links">
                        <!-- <a class="share_btn whatsapp_color" href="https://api.whatsapp.com/send?text=https%3A%2F%2Fyandex.ru%2Fdev%2Fshare%2F&amp;utm_source=share2" rel="nofollow noopener" target="_blank" title="WhatsApp"></a>
                        <a class="share_btn telegram_color" href="tg://msg_url?url=https%3A%2F%2Fyandex.ru%2Fdev%2Fshare%2F&amp;utm_source=share2" rel="nofollow" target="_blank" title="Telegram"></a>
                        <a class="share_btn twitter_color" href="https://twitter.com/intent/tweet?url=https%3A%2F%2Fyandex.ru%2Fdev%2Fshare%2F&amp;utm_source=share2" rel="nofollow noopener" target="_blank" title="Twitter"></a>
                        <a class="share_btn facebook_color" href="https://www.facebook.com/sharer.php?src=sp&amp;u=https%3A%2F%2Fyandex.ru%2Fdev%2Fshare%2F&amp;utm_source=share2" rel="nofollow noopener" target="_blank" title="Facebook"></a> -->

                        <script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                        <script src="https://yastatic.net/share2/share.js"></script>
                        <div class="ya-share2" data-services="facebook,twitter,whatsapp,telegram"></div>
                    </div>
                </div>
                <div class="serv_price">
                    <div class="serv_price__text">Стоимость:</div>
                    <div class="serv_price__item"><span><?=$data['Service']['price']?></span> KZT</div>
                </div>
                <a class="more_btn white_btn project_btn" href="#project_request">Оплатить услугу онлайн</a>
            </div>
            <img class="page_img" src="/img/services/<?=$data['Service']['img']?>" alt="">
            <div class="page_text">
                <?=$data['Service']['body']?>
            </div>
            <div class="green_line"></div>
            <form class="page_form services_form" method="POST" action="/pages/callbackservice" id="project_request">
                <div class="form_title">Оформление</div>
                <input class="form_input" type="text" placeholder="Имя" name="name" required>
                <input class="form_input" type="email" placeholder="Почта" name="email" required>
                <input class="form_input" type="tel" placeholder="Телефон" name="phone" required>
                <input class="form_input" type="hidden"  value="<?=$data['Service']['price']?>" name="price" required>
                <!-- <textarea class="form_input" name="" id="" cols="30" rows="3" placeholder="Комментарий"></textarea> -->
                <select class="form_select form_input" name="type_service" id="">
                    <option value="0" selected disabled>Выберите услугу</option>
                    <?php foreach($services as $item): ?>
                        <option value="<?=$item['Service']['title']; ?>"><?php echo $item['Service']['title']; ?></option>
                     <?php endforeach ?>
                    
                </select>
                <button class="form_btn white_btn more_btn">Оплатить онлайн</button>
            </form>
            <div class="green_line green_line_2"></div>
        </div>
    </div>
</section>

