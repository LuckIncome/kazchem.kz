<section class="page">
    <div class="container">
        <ul class="breadcrumbs breadcrumbs_center">
            <li><a href="/">Главная</a></li>
            <li><a>Акции</a></li>
        </ul>
        <div class="title">Акции</div>

        <ul class="news">
            <?php foreach($data as $item): ?>
                <li>
                    <div class="news_item">
                        <a class="part_img" href="/<?=$lang?>shares/view/<?=$item['Share']['id']?>">
                            <img src="/img/shares/<?=$item['Share']['img2']?>" alt="">
                        </a>
                        <a class="news_name" href="/<?=$lang?>shares/view/<?=$item['Share']['id']?>"><?php echo $item['Share']['title']; ?></a>
                        <div class="text_item"><?= $this->Text->truncate(strip_tags($item['Share']['body']), 150, array('ellipsis' => '...', 'exact' => true)) ?></div>

                        <a class="more_btn orange_btn" href="/<?=$lang?>shares/view/<?=$item['Share']['id']?>">Читать статью полностью</a>
                    </div>
                </li>
            <?php endforeach ?>
        </ul>

        <?php if($data): ?>
            <div class="pagimation">
                <?php if($paginator['start']): ?>
                    <a href="<?=$paginator['link']?>1" class="p_start pag_btn "> << </a>
                <?php endif ?>

                <?php if($paginator['prev']): ?>
                    <a href="<?=$paginator['link']?><?=$paginator['prev']?>" class="p_prev pag_btn"> < </a>
                <?php endif ?>
                <span class="p_pages"><?=__('Страница')?> <?=$paginator['current_page']?> <?=__('из')?> <?=$paginator['count_pages']?></span>
                <?php if($paginator['next']): ?>
                    <a href="<?=$paginator['link']?><?=$paginator['next']?>" class="p_next pag_btn"> > </a>
                <?php endif ?>

                <?php if($paginator['end']): ?>
                    <a href="<?=$paginator['link']?><?=$paginator['count_pages']?>" class="p_end pag_btn "> >> </a>
                <?php endif ?>
            </div>
        <?php endif ?>
    </div>

    <div class="leaf leaf_1"></div>
    <div class="leaf leaf_2"></div>
    <div class="leaf leaf_3"></div>
</section>



