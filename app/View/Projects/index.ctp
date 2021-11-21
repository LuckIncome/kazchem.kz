<section class="page">
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="/">Главная</a></li>
            <li><a>Проекты</a></li>
        </ul>
        <div class="page_title center_title">Проекты</div>
        <div class="project_grid">
            <?php foreach($data as $item): ?>
                <div class="project_item">
                    <a class="project_img" href="/projects/<?=$item['Project']['id']?>">
                        <img src="/img/projects/<?=$item['Project']['img']?>" alt="">
                    </a>
                    <div class="about_project">
                        <a class="project_name" href="/projects/<?=$item['Project']['id']?>"> <?php echo $item['Project']['title']; ?></a>
                        <div class="project_info">
                            <div class="project_info__row">
                                <span>Стадия проекта:</span>
                                <span class="project_status"> <?php echo $item['Project']['status']; ?></span>
                            </div>
                            <div class="project_info__row">
                                <span>Дата реализации: </span>
                                <span class="project_date">  <?=$this->Common->beauty_date($item['Project']['date']);?> года</span>
                            </div>
                        </div>
                        <div class="text_item">
                            <p><?php echo $item['Project']['short_desc']; ?></p>
                        </div>
                    </div>
                    <a class="project_more" href="/projects/<?=$item['Project']['id']?>">подробнее о проекте</a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>