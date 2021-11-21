<section class="page">
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="/">Главная</a></li>
            <li><a  href="/projects">Проекты</a></li>
            <li><a><?=$data['Project']['title']?></a></li>
        </ul>
        <div class="page_inner">
            <div class="page_title center_title"><?=$data['Project']['title']?></div>
            <div class="page_top">
                <div class="share_block">
                    <div class="share_text">Поделиться в соц. сетях:</div>
                    <div class="share_links">
                        <script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                        <script src="https://yastatic.net/share2/share.js"></script>
                        <div class="ya-share2" data-services="facebook,twitter,whatsapp,telegram"></div>
                    </div>
                </div>
                <a class="more_btn white_btn project_btn" href="#project_request">Обсудить мой проект</a>
            </div>
            <img class="page_img" src="/img/projects/<?=$data['Project']['img']?>" alt="">
            <div class="page_text">
                <?=$data['Project']['body']?>
            </div>
            <div class="green_line"></div>
            <form class="page_form"  method="POST" action="/pages/callback" id="project_request">
                <div class="form_title">Оставить заявку на услугу</div>
                <input class="form_input" type="text" name="name" placeholder="Имя" required>
                        <input class="form_input" type="email" name="email" placeholder="Почта" required>
                        <input class="form_input" type="tel" name="phone" placeholder="Телефон" required>
                        <textarea class="form_input" name="body" id="" cols="30" rows="3" placeholder="Комментарий"></textarea>
                <button class="form_btn white_btn more_btn">Отправить</button>
            </form>
            <div class="green_line green_line_2"></div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="title center_title">Другие проекты</div>
        <div class="project_grid">
            <?php foreach($other_projects as $item): ?>
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