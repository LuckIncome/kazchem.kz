<section class="page">
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="/">Главная</a></li>
            <li><a  href="/lands">Земельные участки</a></li>
            <li><a><?=$data['Land']['title']?></a></li>
        </ul>
        <div class="page_inner">
            <div class="page_title center_title"><?=$data['Land']['title']?></div>
            <div class="page_top">
                <div class="share_block">
                    <div class="share_text">Поделиться в соц. сетях:</div>
                    <div class="share_links">
                        <a class="share_btn youtube_color" href="javascript:;" target="_blank"></a>
                        <a class="share_btn instagram_color" href="javascript:;" target="_blank"></a>
                        <a class="share_btn facebook_color" href="https://www.facebook.com/sharer.php?src=sp&amp;u=https%3A%2F%2Fyandex.ru%2Fdev%2Fshare%2F&amp;utm_source=share2" rel="nofollow noopener" target="_blank" title="Facebook"></a>
                    </div>
                </div>
                <a class="more_btn white_btn project_btn" href="#project_request">Обсудить мой проект</a>
            </div>
            <img class="page_img" src="/img/projects/<?=$data['Land']['img']?>" alt="">
            <div class="earth_info">
                <span>Площадь участка: </span> <span><?=$data['Land']['area']?></span>
            </div>
            <div class="page_text">
                <?=$data['Land']['body']?>
            </div>
          
            
        </div>
    </div>
</section>

