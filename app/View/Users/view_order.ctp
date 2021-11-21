<section class="page">
    <div class="container">
        <div class="cabinet_title title">Личный кабинет</div>
        <div class="cabinet">
            <?php echo $this->element('cabinet_sidebar') ?>
            <?php 
                $products = json_decode($data['Basket']['json'], true);
        
            ?>
            <div class="cabinet_content">
                <div class="cab-area">    
                    <div class="cab-area__top">
                        <span class="cab-area__heading">№ <?=$data['Basket']['id']?></span>                        
                    </div>
                    <div class="zakas-top">
                        <div class="zakas-top__left">
                            <div class="zakas-top__item">
                                Всего товаров: <span><?=$data['Basket']['product_count']?></span>
                            </div>
                            <div class="zakas-top__item">
                                Cтатус: <span><?=$data['Basket']['status']?></span>
                            </div>
                        </div>
                        <div class="zakas-top__right">
                            <?php if($data['Basket']['kp']): ?>
                                <a class="zakas-btn zakas-btn--download" href="/files/basket/<?=$data['Basket']['kp']?>" download>Скачать КП</a>
                            <?php endif ?>
                            <span class="zakas-btn zakas-btn--print">Распечать</span>      
                        </div>    
                    </div>
                    <div class="cab-area__content">
                        <div class="zakaz-bottom_block">
                            <table class="table-zakas">
                                <tr>
                                    <th>Изображение</th>
                                    <th>Наименование</th>   
                                    <th>Кол-во</th>
                                    <th>Ед.измерение</th>
                                    <th>Упаковка</th>
                                </tr>
                                <?php foreach($products as $item): ?>
                                <tr>
                                    <td>
                                        <a class="tr-img" href="<?=$item[4]?>">
                                            <img src="<?=$item[2]?>" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <?=$item[1]?>
                                    </td>
                                    <td>
                                        <?=$item[5]?>
                                    </td>
                                    <td>
                                        <?=$item[6]?>
                                    </td>
                                    <td>
                                        <?=$item[7]?>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </table>
                        </div>
                        <div class="zakas-bot">
                            <a  href="/users/my_orders" class="zakas-bot--back yellow_btn more_btn">Назад</a>
                            <a class="more_btn orange_btn" href="/users/resend_order/<?=$data['Basket']['id']?>">Переотправить заказ</a>
                        </div>
                    </div>    
                </div>
            </div>    
        </div>
    </div>
</section>
