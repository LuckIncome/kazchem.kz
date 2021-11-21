<section class="page page_section page_section_inner">
    <div class="container">
        <div class="page_block">
            <div class="page_content">
                <ul class="breadcrumbs">
                    <li><a href="/<?=$lang?>">Главная</a></li>
                    <li><a href="/<?=$lang?>news">Новости</a></li>
                    <li><a><?=$data['News']['title']?></a></li>
                </ul>
                <div class="akcia-part">
                    <div class="akcia-part__left">
                        <div class="akcia-inner news_inner"> 
						<div class="news__date"><?=$data['News']['date']?></div>
                            <div class="akcia-inner__img">
                                <img src="/img/news/<?=$data['News']['img2']?>" alt="">
                            </div> 
                            <div class="akcia_text">
                                <div class="akcia-heading"><?=$data['News']['title']?></div>
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
                        <?php if($images): ?>
                        <div class="news_gal_block">
                            <div class="news_gallery">
                                <?php foreach($images as $item): ?>
                                <div>
                                    <div class="news_gal_item" data-fancybox="news_gal" data-src="/img/images/<?=$item['Image']['img']?>">
                                        <img src="/img/images/thumbs/<?=$item['Image']['img']?>" alt="">
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </div>
                            <div class="news_controls">
                                <div class="comment_arrows team_arrows"></div>
                                <div class="comment_dots team_dots"></div>
                            </div>
                        </div> 
                        <?php endif ?>
                     </div>
                     <div class="akcia-part__right">
                        <div class="news-subscribe">
                            <span class="news-subscribe__heading">Подпишитесь на рассылку новостей</span>
                            <form action="/subscribers/add" method="POST">
                                <input placeholder="Введите ваше имя" type="text" name="data[Subscriber][name]" required>
                                <input placeholder="Введите почту" type="text" name="data[Subscriber][email]" required>
                                <button class="orange_btn" type="submit">Подписаться</button>
                            </form>
                        </div>
                        <ul class="news-right">
                        <?php foreach($other_news as $item): ?>
                            <li>
                                <div class="news_item">
                                    <a class="part_img" href="/<?=$lang?>news/view/<?=$item['News']['id']?>">
                                        <img src="/img/news/<?=$item['News']['img']?>" alt="">
                                    </a>                                                                    
                                    <a class="news_name" href="/<?=$lang?>news/view/<?=$item['News']['id']?>"><?php echo $item['News']['title']; ?></a>
                                    <a class="more_btn orange_btn" href="/<?=$lang?>news/view/<?=$item['News']['id']?>">Подробнее</a>
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