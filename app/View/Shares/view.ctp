<section class="page page_section page_section_inner">
    <div class="container">
        <div class="page_block">
            <div class="page_content">
                <ul class="breadcrumbs">
                    <li><a href="/<?=$lang?>">Главная</a></li>
                    <li><a>Акции</a></li>
                    <li><a><?=$data['Share']['title']?></a></li>
                </ul>                
                <div class="akcia-part">
                    <div class="akcia-part__left">                        
                        <div class="akcia-inner">                            
                            <div class="akcia-inner__img">
                                <img src="/img/shares/<?=$data['Share']['img']?>" alt="">
                            </div>
                            <div class="akcia-heading"><?=$data['Share']['title']?></div>
                            <div class="akcia_text">
                                <div class="page_text text_item">
                                    <?=$data['Share']['body']?>
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
                        <div class="sidebar_form_block mb_normal">
                            <div class="small_title">Оставить заявку</div>
                            <form class="sidebar_form" action="/requests/share" method="POST">
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
                                <input type="hidden" name="data[Request][page]" value="<?=$data['Share']['title']?>">
                                <button class="form_btn orange_btn" type="submit">Зарегистрироваться</button>
                            </form>
                        </div>

                        <?php foreach($other_shares as $item): ?>
                           	<a class="akcia" style="display:block;" href="/<?=$lang?>shares/view/<?=$item['Share']['id']?>">
                        		<img style="display:block;width:100%;object-fit: cover;" src="/img/shares/<?=$item['Share']['img2']?>">    	
                            </a>                        
                        <?php endforeach ?>
                    </div>    
                </div>
                <!-- <div class="title small_title"><?=$data['Share']['title']?></div> -->
            </div>
            
        </div>
    </div>
</section>