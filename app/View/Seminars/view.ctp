<section class="page page_section page_section_inner">
    <div class="container">
        <div class="page_block">
            <div class="page_content">
                <ul class="breadcrumbs">
                    <li><a href="/<?=$lang?>">Главная</a></li>
                    <li><a href="/<?=$lang?>seminars">Семинары</a></li>
                    <li><a><?=$data['Seminar']['title']?></a></li>
                </ul>
                <div class="akcia-part">
                    <div class="akcia-part__left">
                        <div class="akcia-inner seminar_inner"> 
                            <div sytle="min-height:250px;height:auto;" class="akcia-inner__img">
                                <img src="/img/seminars/<?=$data['Seminar']['img2']?>" alt="">
                            </div>       
                            <!-- <div class="akcia-heading"><?=$data['Seminar']['title']?></div> -->
                            <div class="akcia_text">
                                <div class="page_text text_item">
                                    <?=$data['Seminar']['body']?>
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
                     <div class="akcia-part__right">
                        <div class="sidebar_form_block">
                            <div class="small_title">Оставить заявку</div>
                            <form class="sidebar_form" action="/requests/seminar" method="POST">
                                <div class="input_block">
                                    <div class="input_name">ФИО</div>
                                    <input placeholder="Введите ФИО" class="form_input" type="text" name="data[Request][name]" required="">
                                </div>
                                <div class="input_block">
                                    <div class="input_name">Контактный телефон</div>
                                    <input placeholder="+7(__)__ __ __" class="form_input" type="tel" name="data[Request][phone]" required="">
                                </div>
                                <div class="input_block">
                                    <div class="input_name">Название компании</div>
                                    <input placeholder="Введите название" class="form_input" type="text" name="data[Request][company]" required="">
                                </div>
                                <div class="input_block">
                                    <div class="input_name">Электронная почта</div>
                                    <input placeholder="Введите почту" class="form_input" type="email" name="data[Request][email]" required="">
                                </div>
                                <input type="hidden" name="data[Request][page]" value="<?=$data['Seminar']['title']?>">
                                <button class="form_btn orange_btn" type="submit">Зарегистрироваться</button>
                            </form>
                        </div>
                        <h3 class="sidebar-title" style="margin-top:-60px;font-size:19px;">Прошедшие семинары</h3>
                        <ul class="news-right">
                        <?php foreach($other_news as $item): ?>
                            <li>
                                <div class="news_item">
                                    <a class="part_img" href="/<?=$lang?>seminars/view/<?=$item['Seminar']['id']?>">
                                        <img src="/img/seminars/<?=$item['Seminar']['img']?>" alt="">
                                    </a>                                                                    
                                    <a class="news_name" href="/<?=$lang?>seminars/view/<?=$item['Seminar']['id']?>"><?php echo $item['Seminar']['title']; ?></a>
                                    <a class="more_btn orange_btn" href="/<?=$lang?>seminars/view/<?=$item['Seminar']['id']?>">Подробнее</a>
                                </div>
                            </li>
                        <?php endforeach ?>
                        </ul>
                    </div>   
                </div>                
            </div>
        </div>
    </div>
</section>