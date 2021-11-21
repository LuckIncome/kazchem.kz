<div class="container">
    <div class="slider-part">
        <div class="big-slider">
        <?php foreach($slides as $item): ?>
            <div>
                <div class="slider-item" style="background-image:url(/img/slides/<?=$item['Slide']['img']?>)">
                    <div class="slider-bot">
                        <span class="slider-bot__heading"><?=$item['Slide']['title']?></span>
                        <p><?=$item['Slide']['description']?></p>
                        <?php if(!empty($item['Slide']['link'])): ?>
                        <a class="btn slider-bot__btn" href="<?=$item['Slide']['link']?>">Подробнее</a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <?php endforeach ?>                     
        </div>

      <!--   <div class="slider-part__right">
            <div class="right-slider">
                <div style="background-image:url(/img/mslider1.jpg)" class="right-slider__item right-slider__item--1"></div>
                <div style="background-image:url(/img/mslider2.jpg)" class="right-slider__item right-slider__item--2"></div>
                <div style="background-image:url(/img/mslider3.jpg)" class="right-slider__item right-slider__item--3"></div>
                <div style="background-image:url(/img/mslider4.jpg)" class="right-slider__item right-slider__item--4"></div>
            </div>
        </div> -->
    </div>
    <div class="section">
        <span class="s-heading">
            Бестселлеры
        </span>
        <div class="best-slider">
        <?php foreach($bestsellers as $item): ?>
            <div>
                <div class="best-item">
                    <a href="/product/<?=$item['Product']['id']?>" class="best-item__heading"><?=$item['Product']['title']?></a>
                    <span class="best-item__under"><?=$item['Designer']['title']?></span>
                    <a href="/product/<?=$item['Product']['id']?>" class="best-item__img" style="background-image:url(/img/products/thumbs/<?=$item['Product']['img']?>)">
                    	<img src="/img/products/thumbs/<?=$item['Product']['img']?>" style="display:none;">
                    </a>
                    <div class="best-bot">
                        <div class="best-item__price">Цена: <span class="item-price"><?=number_format($item['Product']['price'], 0, '', ' ')?></span> KZT</div>                                  
                        <div class="best-item__bot">
                            <a data-fancybox data-src="#<?=($item['Product']['price']) ? 'hidden-content' : 'no-price';?>" href="javascript:;" class="btn <?=($item['Product']['price']) ? 'add-card' : '';?>" data-instack="<?=$item['Product']['in_stock']?>" data-id="<?=$item['Product']['id']?>">В корзину</a>
                            <form action="/collections/add" method="POST">
                                <input type="hidden" name="data[Collection][cookie_id]" value="<?=$cookie?>">
                                <input type="hidden" name="data[Collection][product_id]" value="<?=$item['Product']['id']?>">
                                <?php 
                                    $active = "";
                                    foreach($collection_count as $col){
                                        if($col['Collection']['product_id'] == $item['Product']['id']){
                                            $active = "add-favorites--active";
                                        }
                                    } ?>
                                <button class="add-favorites <?=$active?>" type="submit">
                                    <span class="add-favorites__ico">
                                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="36px" height="32px" viewBox="0 0 510 510" style="enable-background:new 0 0 510 510;" xml:space="preserve">
                                            <g>
                                                <g id="favorite">
                                                    <path  stroke="green" stroke-width="1" d="M255,489.6l-35.7-35.7C86.7,336.6,0,257.55,0,160.65C0,81.6,61.2,20.4,140.25,20.4c43.35,0,86.7,20.4,114.75,53.55C283.05,40.8,326.4,20.4,369.75,20.4C448.8,20.4,510,81.6,510,160.65c0,96.9-86.7,175.95-219.3,293.25L255,489.6z"/>
                                                </g>
                                            </g>
                                            </svg>
                                        </span>
                                </button>
                            </form>
                        </div>
                        <?php if($item['Product']['novelty'] == 1): ?>
	                        <span class="best-bot__new">Новинка</span>
	                    <?php endif ?>
	                    <?php if($item['Product']['discount']): ?>
	                    <span class="best-bot__sales">-<?=$item['Product']['discount']?>%</span>
	                    <?php endif ?>
                    </div>                                  
                </div>
            </div>
        <?php endforeach ?>                                                                                          
        </div>
    </div>
    <div class="section">
        <span class="s-heading">Styleguide</span>                                           
        <ul class="news-ul">
        <?php foreach($styleguides as $item): ?>
            <li>
                <a href="/styleguides/view/<?=$item['Styleguide']['id']?>" class="news-mini">
                    <div  style="background-image:url(/img/styleguides/<?=$item['Styleguide']['img']?>)" class="news-mini__img"></div>
                    <div class="news-mini__bot">
                        <span class="news-mini__heading"><?=$item['Styleguide']['title']?></span>
                        <!-- <span class="news-mini__text">Цвет 2018 года</span> -->
                    </div>
                </a>
            </li>
            <?php endforeach ?>
        </ul>
        <div class="t-center">
            <a class="btn" href="/styleguides">Смотреть все</a>
        </div>
    </div>
    <div class="section">
        <span class="s-heading">Интернет магазин ювелирного мульти брендового бутика Suraya Jewelry</span>
        <div class="seo-text">
            <?=$params['description']?>
        </div>
    </div>  
</div>