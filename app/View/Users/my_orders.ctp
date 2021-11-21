<section class="page">
    <div class="container">
        <div class="cabinet_title title">Личный кабинет</div>
        <div class="cabinet">
            <?php echo $this->element('cabinet_sidebar') ?>
            <div class="cabinet_content">
                <div class="cab-area">    
                    <div class="cab-area__top">
                        Мои заказы
                    </div>
                    <ul class="zakas-list">
                    	<li>
                            <div class="zakas-item zakas-item--top">
                                <div class="zakas-item__row">№</div>                                
                                <div class="zakas-item__row">Кол-во товаров</div>                                
                                <div class="zakas-item__row">Дата</div>    
                                <div class="zakas-item__row">Статус</div>    
                                <div class="zakas-item__row">Ссылка</div>    
                            </div>
                        </li>
                        <?php foreach($data as $item): ?>
                        <li>
                            <div class="zakas-item">
                                <div class="zakas-item__row"><?=$item['Basket']['id']?></div>                                
                                <div class="zakas-item__row"><?=$item['Basket']['product_count']?></div>                                
                                <div class="zakas-item__row"><?php echo $this->Time->format($item['Basket']['created'], '%d.%m.%Y', '-'); ?> </div>    
                                <div class="zakas-item__row"><?=$item['Basket']['status']?></div>    
                                <div class="zakas-item__row">    
                                    <a class="more_btn orange_btn" href="/<?=$lang?>users/view_order/<?=$item['Basket']['id']?>">Подробнее</a>                                    
                                </div>
                            </div>
                        </li>
                        <?php endforeach ?>
                    </ul>  
                </div>
            </div>    
        </div>
    </div>
</section>
