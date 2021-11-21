<section class="page">
    <div class="container">
        <div class="cabinet_title title">Личный кабинет</div>
        <div class="cabinet">
            <?php echo $this->element('cabinet_sidebar') ?>
            <div class="cabinet_content">
                <div class="cab-area">
                    <div class="cab_content_head">Семинары</div>
                    <div class="cab_content_body seminar_list">
                        <?php foreach($data as $item): ?>
                        <div class="seminar_item">
                            <div class="seminar_content">
                                <div class="seminar_img">
                                    <img src="/img/seminars/<?=$item['Seminar']['img']?>" alt="">
                                </div>
                                <div class="seminar_text">
                                    <a class="seminar_name" href="/<?=$lang?>seminars/view/<?=$item['Seminar']['id']?>"><?=$item['Seminar']['title']?></a>
                                    <div class="text_item">
                                        <p><?= $this->Text->truncate(strip_tags($item['Seminar']['body']), 128, array('ellipsis' => '...', 'exact' => true)) ?></p>
                                    </div>
                                    <a class="seminar_btn" href="/<?=$lang?>seminars/view/<?=$item['Seminar']['id']?>">Подробнее о семинаре</a>
                                </div>
                            </div>
                            <div class="seminar_date">
                                <div class="seminar_date_block">
                                    <div class="seminar_date_num"><?=$this->Common->get_day($item['Seminar']['date'])?></div>
                                    <div class="seminar_date_text"><?=$this->Common->get_month_title($item['Seminar']['date'])?></div>
                                </div>
                                <div class="seminar_date_text"><?php echo $this->Time->format($item['Seminar']['date'], '%H:%M', 'invalid'); ?></div>
                            </div>
                        </div>
                        <?php endforeach ?>
                        
                        <!-- <div class="media_list">
                            <ul class="news">
                                <?php foreach($data as $item): ?>
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
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <section class="page">
    <div class="container">
        <ul class="breadcrumbs breadcrumbs_center">
            <li><a href="/">Главная</a></li>
            <li><a>Семинары</a></li>
        </ul>
        <div class="title">Семинары</div>

        <ul class="news">
            <?php foreach($data as $item): ?>
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

        <?php if($data): ?>
            <div class="pagimation">
                <?php if($paginator['start']): ?>
                    <a href="<?=$paginator['link']?>" class="p_start pag_btn "> << </a>
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
 -->


