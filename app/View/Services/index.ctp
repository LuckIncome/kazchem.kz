<section class="page">
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="/">Главная</a></li>
            <li><a>Услуги</a></li>
        </ul>
        <div class="page_title center_title">Услуги</div>
        <div class="services">
            <?php $i =1; ?>
            <?php foreach($data as $item): ?>
                <a class="serv_item" href="/services/<?=$item['Service']['id']?>">
                    <img class="serv_img" src="/img/services/<?=$item['Service']['img']?>" alt="">
                    <div class="serv_info">
                        <!-- <div class="serv_info__title"><?php echo $item['Service']['title']; ?></div> -->
                        <div class="serv_info__title"><?= $this->Text->truncate(strip_tags($item['Service']['title']), 50, array('ellipsis' => '...', 'exact' => true)) ?></div>

                        <div class="serv_info__text">
                            <!-- <?php echo $item['Service']['short_desc']; ?> -->
                            <?= $this->Text->truncate(strip_tags($item['Service']['short_desc']), 140, array('ellipsis' => '...', 'exact' => true)) ?>
                        </div>
                    </div>
                    <div class="serv_title">
                        <div class="serv_name">Услуги</div>
                        <?php if($i <= 10):?>
                            <div class="serv_num">0<?php echo $i ?></div>
                        <?php else: ?>
                            <div class="serv_num"><?php echo $i ?></div>
                        <?php endif ?>
                    </div>
                </a>
             <?php $i++ ?>
            <?php endforeach ?>
        </div>
    </div>
</section>